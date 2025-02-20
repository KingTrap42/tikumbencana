<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="theme-color" content="#f8fafc" />
  <link rel="manifest" href="manifest.json" />

  <title>Dashboard</title>

  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="../assets/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../assets/css/sweetalert.css" rel="stylesheet">
  <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- API Map -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
    integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
    crossorigin=""></script>

</head>
<!--SideBar-->

<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <img src="../assets/img/tikum.png" alt="Icon" style="width: 60px; height: 60px;">
        </div>
        <div class="sidebar-brand-text mx-3">Titik Kumpul Evakuasi<sup></sup></div>
      </a>
      <hr class="sidebar-divider my-0">

      <li class="nav-item active">
        <a class="nav-link" href="?halaman=beranda">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Beranda</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item active">
        <a class="nav-link" href="../admin/login.php"><i class="fas fa-fw fa-home"></i><span>Tambah Data</span></a>
      </li>

      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>


          </ul>
        </nav>

        <?php
        include 'page.php';
        ?>

      </div>


    </div>


  </div>

  <a class="scroll-to-top rounded" href="#" id="scrollToTop">
    <i class="fas fa-angle-up"></i>
  </a>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda ingin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "keluar" untuk keluar dari sistem</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sweetalert.min.js"></script>

  <script src="../assets/js/sb-admin-2.min.js"></script>

  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script src="../assets/js/demo/datatables-demo.js"></script>
  <script>
    $(document).ready(function () {
      $("#sidebarToggleTop").click(function () {
        $("body").toggleClass("sidebar-toggled");
        $("#accordionSidebar").toggleClass("toggled");

        // Tutup submenu jika sidebar tertutup
        if ($("#accordionSidebar").hasClass("toggled")) {
          $("#accordionSidebar .collapse").removeClass("show");
        }
      });
    });
  </script>

  <script>
    window.addEventListener("load", function () {
      if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('sw.js').then(function (registration) {
          console.log('Service Worker registered with scope:', registration.scope);
        }).catch(function (error) {
          console.log('Service Worker registration failed:', error);
        });
      }
    });
  </script>
  <script>
    $(document).ready(function () {
      $('#dataTables-example').dataTable();
    });
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const scrollToTop = document.getElementById("scrollToTop");

      // Sembunyikan tombol saat halaman dimuat
      scrollToTop.style.display = "none";

      // Tampilkan tombol saat scroll melebihi 300px
      window.addEventListener("scroll", function () {
        if (window.scrollY > 300) {
          scrollToTop.style.display = "block";
        } else {
          scrollToTop.style.display = "none";
        }
      });

      // Smooth scroll ke atas saat tombol diklik
      scrollToTop.addEventListener("click", function (event) {
        event.preventDefault(); // Mencegah link default
        window.scrollTo({
          top: 0,
          behavior: "smooth"
        });
      });
    });
  </script>
  <script>
    $(document).ready(function () {
      $("#sidebarToggleTop").click(function () {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");

        // Jika sidebar tertutup, pastikan submenu juga tertutup
        if ($(".sidebar").hasClass("toggled")) {
          $(".sidebar .collapse").collapse("hide");
        }
      });
    });
  </script>

</body>

</html>