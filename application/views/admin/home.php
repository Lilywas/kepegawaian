<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Content Row -->
  <div class="row">

    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <a href="<?= site_url('listpegawai')?>"><div class="text-md font-weight-bold text-primary text-uppercase mb-1">Jumlah Pegawai Aktif</div></a>
              <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_aktif;?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-5x text-gray-500"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <a href="<?= site_url('listpegawai/pensiun')?>"><div class="text-md font-weight-bold text-warning text-uppercase mb-1"><?= "Jumlah Pegawai Akan Pensiun Tahun ".Date('Y');?></div></a>
              <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $total1;?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-clock fa-5x text-gray-500"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->
  <div>
    <h4 class="font-weight-bold text-center text-danger">Grafik Informasi Umum Kepegawaian</h4>
  </div>
  <hr>
  <div class="row">

    <div class="col-xl-6 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Jenis Pegawai</h6>
          <span class="ml-auto"><button type="button" id="exportpegawaichart" class="btn btn-danger btn-sm"><i class="far fa-fw fa-file-pdf"></i> Export .pdf</button></span>
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
          <span class="ml-auto"><button type="button" id="exportjkchart" class="btn btn-danger btn-sm"><i class="far fa-fw fa-file-pdf"></i> Export .pdf</button></span>
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
          <span class="ml-auto"><button type="button" id="exportagamachart" class="btn btn-danger btn-sm"><i class="far fa-fw fa-file-pdf"></i> Export .pdf</button></span>
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
          <span class="ml-auto"><button type="button" id="exportumurchart" class="btn btn-danger btn-sm"><i class="far fa-fw fa-file-pdf"></i> Export .pdf</button></span>
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
          <span class="ml-auto"><button type="button" id="exportpendchart" class="btn btn-danger btn-sm"><i class="far fa-fw fa-file-pdf"></i> Export .pdf</button></span>
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
          <?php 
          if ($komp != NULL){ //kalau data kompetensi null, tombol export tidak muncul
            ?>
            <span class="ml-auto"><button type="button" id="exportkompchart" class="btn btn-danger btn-sm"><i class="far fa-fw fa-file-pdf"></i> Export .pdf</button></span>
          <?php }
          ?>
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

    <div class="col-xl-6 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Jenis Kelamin</h6>
          <span class="ml-auto"><button type="button" id="exportjkpnsnonchart" class="btn btn-danger btn-sm"><i class="far fa-fw fa-file-pdf"></i> Export .pdf</button></span>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-bar" style="position: relative; height:100%; width:100%">
            <canvas id="jkpnsnonchart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6 col-lg-5">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Pendidikan Terakhir</h6>
          <span class="ml-auto"><button type="button" id="exportpendpnsnonchart" class="btn btn-danger btn-sm"><i class="far fa-fw fa-file-pdf"></i> Export .pdf</button></span>
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
          <span class="ml-auto"><button type="button" id="exportumurpnschart" class="btn btn-danger btn-sm"><i class="far fa-fw fa-file-pdf"></i> Export .pdf</button></span>
        </div>
        <!-- Card Body -->
        <div class="card-body">
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
          <span class="ml-auto"><button type="button" id="exportpensiunchart" class="btn btn-danger btn-sm"><i class="far fa-fw fa-file-pdf"></i> Export .pdf</button></span>
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
          <span class="ml-auto"><button type="button" id="exportgolpnschart" class="btn btn-danger btn-sm"><i class="far fa-fw fa-file-pdf"></i> Export .pdf</button></span>
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

