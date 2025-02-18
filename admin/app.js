if ("serviceWorker" in navigator) {
    navigator.serviceWorker.register("/sw.js").then((registration) => {
        console.log("Service Worker terdaftar:", registration);
        
        // Jika ada update service worker, langsung aktifkan
        if (registration.waiting) {
            registration.waiting.postMessage({ action: "skipWaiting" });
        }

        registration.addEventListener("updatefound", () => {
            const newWorker = registration.installing;
            newWorker.addEventListener("statechange", () => {
                if (newWorker.state === "installed" && navigator.serviceWorker.controller) {
                    alert("Aplikasi telah diperbarui. Silakan refresh halaman!");
                }
            });
        });
    }).catch((error) => {
        console.error("Service Worker gagal didaftarkan:", error);
    });
}
let deferredPrompt;

window.addEventListener("beforeinstallprompt", (event) => {
    event.preventDefault(); // Mencegah popup default agar kita bisa buat custom
    deferredPrompt = event;

    // Tampilkan tombol install jika tersedia
    const installBtn = document.getElementById("installPWA");
    if (installBtn) {
        installBtn.style.display = "block";

        installBtn.addEventListener("click", () => {
            deferredPrompt.prompt(); // Tampilkan prompt install

            deferredPrompt.userChoice.then((choiceResult) => {
                if (choiceResult.outcome === "accepted") {
                    console.log("User accepted install PWA");
                } else {
                    console.log("User dismissed install PWA");
                }
                deferredPrompt = null;
            });
        });
    }
});
