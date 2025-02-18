<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Titik Kumpul Evakuasi</h1>
    <a href="?halaman=evakuasi&aksi=tambah_evakuasi"
      class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-home fa-sm text-white-50"></i>
      Tambah Data</a>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal"
      data-target="#logoutModal">
      <i class="fas fa-sign-out-alt fa-sm text-white-50"></i> Logout </a>

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
          <div class="modal-body">Pilih "Keluar" untuk keluar dari sistem.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <a class="btn btn-primary" href="index.php">Keluar</a>
          </div>
        </div>
      </div>
    </div>

  </div>


  <div class="row">
    <div class="col-xl-12 col-lg-7">
      <div class="card shadow mb-12">
        <div class="card-header py-12">
          <h6 class="m-0 font-weight-bold text-primary">List Data Titik Kumpul Evakuasi</h6>
        </div>


        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Alamat</th>
                  <th class="text-center">No HP</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'backend/select_evakuasi.php';
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
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