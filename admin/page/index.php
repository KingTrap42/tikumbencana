<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Selamat Datang</h1>
    <button id="installPWA" style="display: none;">Install Aplikasi</button>

  </div>
  <div class="row">
    <div class="col-xl-12 col-lg-7">
      <div class="card shadow mb-12">
        <div class="card-header py-12">
          <h6 class="m-0 font-weight-bold text-primary">Lokasi Titik Kumpul evakuasi</h6>
        </div>
        <div class="card-body">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="../assets/img/image1.JPG" alt="Evakuasi 1">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../assets/img/image2.JPG" alt="Evakuasi 2">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../assets/img/image3.JPG" alt="Evakuasi 3">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../assets/img/image4.JPG" alt="Evakuasi 4">
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Lokasi</h1>
  </div>
  <div class="row">
    <div class="col-xl-12 col-lg-7">
      <div class="card shadow mb-12">
        <div class="card-header py-12">
          <h6 class="m-0 font-weight-bold text-primary">Titik Kumpul Evakuasi</h6>
        </div>
        <div class="card-body">
          <?php
          include "../koneksi/koneksi.php";
          $sql = mysqli_query($koneksi, "select id_evakuasi,lat,lng from tb_evakuasi ");
          $x = $sql->fetch_assoc();
          ?>
          <div class="col-sm-12">
            <style media="screen">
              #mapid {
                height: 500px;
                left-margin: 100 px;
              }
            </style>

            <div id="mapid"></div>
            <script type="text/javascript">
              var mymap = L.map('mapid').setView([<?php echo $x['lat']; ?>, <?php echo $x['lng']; ?>], 18);
              L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYXJtYWRoYW5zeWFyaWZoaWRheWF0IiwiYSI6ImNtNjJta3ozcjB4aGIyaW91em9qenVlYnQifQ.BynkTFmkswh5rdNroyjUqA', {
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoiYXJtYWRoYW5zeWFyaWZoaWRheWF0IiwiYSI6ImNtNjJta3ozcjB4aGIyaW91em9qenVlYnQifQ.BynkTFmkswh5rdNroyjUqA'
              }).addTo(mymap);

              <?php
              include "../koneksi/koneksi.php";
              $sql = mysqli_query($koneksi, "select id_evakuasi,lat,lng from tb_evakuasi ");
              while ($result = $sql->fetch_assoc()) {
                ?>
                var marker = L.marker([<?php echo $result['lat']; ?>, <?php echo $result['lng']; ?>]).addTo(mymap);

              <?php } ?>

            </script>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--untuk halaman depan saat masuk-->