// Nama cache yang digunakan untuk menyimpan file
const cacheName = "v3"; // Ganti versi cache setiap ada perubahan besar

// Daftar file yang akan disimpan dalam cache saat pertama kali diinstall
const preCache = [
    "/", // Halaman utama
    "/index.php", // Halaman utama PHP (fallback jika offline)
    "/assets/css/sb-admin-2.min.css", // CSS utama
    "/assets/vendor/fontawesome-free/css/all.min.css", // Font Awesome
    "/assets/vendor/bootstrap/js/bootstrap.bundle.min.js", // Bootstrap JS
    "/assets/vendor/jquery/jquery.min.js" // jQuery
];

// Event install: Menyimpan file dalam cache saat pertama kali service worker diinstall
self.addEventListener("install", (event) => {
    console.log("Service Worker: Installing...");

    // Langsung aktifkan versi terbaru tanpa menunggu reload halaman
    self.skipWaiting();

    event.waitUntil(
        caches.open(cacheName).then(cache => {
            return cache.addAll(preCache)
                .then(() => console.log("Pre-cache sukses!"))
                .catch(error => console.error("Pre-cache gagal:", error));
        })
    );
});

// Event activate: Menghapus cache lama saat ada update
self.addEventListener("activate", (event) => {
    console.log("Service Worker: Activated");
    
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.filter(name => name !== cacheName)
                    .map(name => caches.delete(name))
            );
        })
    );
    
    self.clients.claim(); // Memastikan SW langsung mengontrol halaman tanpa reload
});

// Event fetch: Menggunakan strategi caching Stale-While-Revalidate
self.addEventListener("fetch", (event) => {
    event.respondWith(
        caches.open(cacheName).then(cache => {
            return cache.match(event.request).then(cachedResponse => {
                const fetchPromise = fetch(event.request).then(networkResponse => {
                    if (networkResponse.ok) {
                        cache.put(event.request, networkResponse.clone()); // Perbarui cache dengan versi terbaru
                    }
                    return networkResponse;
                }).catch(() => cachedResponse); // Jika gagal (offline), gunakan cache

                return cachedResponse || fetchPromise; // Pakai cache dulu jika ada
            });
        }).catch(() => caches.match("/index.php")) // Fallback ke index.php jika tidak ada di cache
    );
});

// Event message: Memungkinkan update PWA tanpa menunggu reload
self.addEventListener("message", (event) => {
    if (event.data.action === "skipWaiting") {
        self.skipWaiting();
    }
});
