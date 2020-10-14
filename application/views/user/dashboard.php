<div class="jumbotron jumbotron-fluid" style="background-image: url(<?php echo base_url('assets/img/img.png');?>); padding-top: 6rem;">
  <div class="container-fluid text-center" >
    <!-- <div class="card-img-overlay" > -->
      <h6 class="display-4" style="color: white; font-size: 4vw">Selamat Datang di</h6>
      <h4 class="lead" style="color: white; font-size: 4.5vw; font-family: 'Kreon', serif; line-height: 1.5;">Sistem Informasi Kepegawaian</h4>
      <hr><br>
      <a class="btn btn-primary btn-lg text-ehite" href="<?= site_url('pegawai'); ?>" role="button" style="border-radius: 2.5vw;">Lihat Daftar Pegawai</a>
      <!-- </div> -->
    </div>
  </div>

  <!-- Begin Page Content -->
  <div class="container-fluid" style="padding-left: 6vw; padding-right: 6vw;">

    <div>
      <h4 class="font-weight-bold text-center text-danger">Grafik Informasi Umum Kepegawaian</h4>
    </div>
    <hr>
    <div class="row">

      <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Jenis Pegawai</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-pie">
              <canvas id="pegawaichart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-6 col-lg-5">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Jenis Kelamin</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-pie">
              <canvas id="jkchart"></canvas>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- baris dua -->
    <div class="row">

      <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Agama</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-pie">
              <canvas id="agamachart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-6 col-lg-5">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Umur</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-pie">
              <canvas id="umurchart"></canvas>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- baris tiga -->
    <div class="row">

      <div class="col-xl-6 col-lg-5">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Pendidikan Terakhir</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-pie">
              <canvas id="pendchart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kompetensi Bidang Pegawai</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-pie">
              <?php
              if ($komp == NULL){
                ?>
                <p style="text-align: center; vertical-align: middle;">Belum ada data kompetensi bidang yang tersimpan</p>
              <?php }
              else {
                ?>
                <canvas id="kompchart"></canvas>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>


    <br>
    <div>
      <h4 class="font-weight-bold text-center text-danger">Grafik Informasi PNS dan Non-PNS</h4>
    </div>
    <hr>

    <div class="row" >

      <div class="col-xl-6">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Jenis Kelamin</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area" style="position: relative; height:100%; width:100%">
              <canvas id="jkpnsnonchart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-6">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Pendidikan Terakhir</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area" style="position: relative; height:100%; width:100%">
              <canvas id="pendpnsnonchart"></canvas>
            </div>
          </div>
        </div>
      </div>

    </div>

    <br>
    <div>
      <h4 class="font-weight-bold text-center text-danger">Grafik Informasi Spesifik PNS</h4>
    </div>
    <hr>

    <div class="row">

      <div class="col-xl-6">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Rentang Usia PNS</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body" style="height: 100%">
            <div class="chart-area" style="position: relative; height:100%; width:100%">
              <canvas id="umurpnschart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Jumlah PNS Akan Pensiun</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area" style="position: relative; height:100%; width:100%">
              <canvas id="pensiunchart"></canvas>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row">

      <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Jumlah PNS Tiap Golongan</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area" style="position: relative; height:100%; width:100%">
              <canvas id="golpnschart"></canvas>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
  <!-- /.container-fluid -->

