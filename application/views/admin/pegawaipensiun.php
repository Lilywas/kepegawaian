<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- -------------------- PEGAWAI AKTIF -------------------- -->
  <h1 class="h3 mb-2 text-gray-800 text-center"><?= 'Daftar Pegawai Akan Pensiun'?></h1>
  <hr>
  <?php echo $this->session->flashdata('msg_berhasil'); ?>
  <?php echo $this->session->flashdata('msg_gagal'); ?>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active"  data-toggle="tab" href="#satu" role="tab" aria-controls="satu" aria-selected="true"><?= 'Tahun '.Date('Y'); ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  data-toggle="tab" href="#dua" role="tab" aria-controls="dua" aria-selected="false"><?= 'Tahun '. (Date('Y') + 1); ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  data-toggle="tab" href="#tiga" role="tab" aria-controls="tiga" aria-selected="false"><?= 'Tahun '. (Date('Y') + 2); ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  data-toggle="tab" href="#empat" role="tab" aria-controls="empat" aria-selected="false"><?= 'Tahun '. (Date('Y') + 3); ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  data-toggle="tab" href="#lima" role="tab" aria-controls="lima" aria-selected="false"><?= 'Tahun '. (Date('Y') + 4); ?></a>
    </li>
  </ul>

  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="satu" role="tabpanel" aria-labelledby="">
      <br>
      <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="card col-lg-12 shadow mb-4">
          <div class="card-body">
            <div class="table-responsive">
              <table class="display table table-bordered" id="" width="100%" cellspacing="0">
                <thead style="text-align: center;">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Status Pegawai</th>
                    <th>NIP</th>
                    <th>Jenis Kelamin</th>
                    <th>Usia</th>
                    <th>Pangkat / Golongan</th>
                    <th>Jabatan</th>
                    <th>No Telp</th>
                    <th></th> <!-- ubah status -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($pegawai as $item) { 
                    $nip = $item['tanggal_lahir'];
                    $thn = substr($nip, 0, 4);
                    $usia = Date('Y') - $thn;
                    $pensiun = $item['pensiun'];
                    if ($usia == $pensiun){
                      $no++;
                      ?>
                      <tr>
                        <td style="text-align: center;"><?php echo $no; ?></td>
                        <td><a href="#" data-toggle="modal" data-target="#detailModal<?=$item['id_pegawai'];?>"><?php echo htmlspecialchars($item['nama']); ?></a></td>
                        <td style="text-align: center;">PNS</td>
                        <td><?php echo htmlspecialchars($item['nip']); ?></td>
                        <td><?php echo htmlspecialchars($item['jk']); ?></td>
                        <td><?php echo $usia; ?></td>
                        <td><?php echo htmlspecialchars($item['pangkat']); ?></td>
                        <td><?php echo htmlspecialchars($item['jenis_jabatan']); ?></td>
                        <td><?php echo htmlspecialchars($item['no_telp']); ?></td>
                        <td style="vertical-align: middle;">
                          <!-- Tombol Ubah Status -->
                          <button id="button_ubah" onclick="ubah_status_pegawai(<?php echo htmlspecialchars($item['id_pegawai']); ?>)" value="<?php echo $item['id_pegawai']; ?>" data-toggle="modal" data-target="#ubahStatusModal" class="btn btn-info" title="Ubah Status Pegawai"><i class="fas fa-fw fa-info-circle"></i></button>
                        </td>
                      </tr>

                    <?php } } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="tab-pane fade" id="dua" role="tabpanel" aria-labelledby="">
        <br>
        <div class="row">

          <!-- Earnings (Monthly) Card Example -->
          <div class="card col-lg-12 shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="display table table-bordered" id="" width="100%" cellspacing="0">
                  <thead style="text-align: center;">
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Status Pegawai</th>
                      <th>NIP</th>
                      <th>Jenis Kelamin</th>
                      <th>Usia</th>
                      <th>Pangkat / Golongan</th>
                      <th>Jabatan</th>
                      <th>No Telp</th>
                      <th></th> <!-- ubah status -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                    foreach ($pegawai as $item) { 
                      $nip = $item['tanggal_lahir'];
                      $thn = substr($nip, 0, 4);
                      $usia = (Date('Y') + 1) - $thn;
                      $pensiun = $item['pensiun'];
                      if ($usia == $pensiun){
                        $no++;
                        ?>
                        <tr>
                          <td style="text-align: center;"><?php echo $no; ?></td>
                          <td><a href="#" data-toggle="modal" data-target="#detailModal<?=$item['id_pegawai'];?>"><?php echo htmlspecialchars($item['nama']); ?></a></td>
                          <td style="text-align: center;">PNS</td>
                          <td><?php echo htmlspecialchars($item['nip']); ?></td>
                          <td><?php echo htmlspecialchars($item['jk']); ?></td>
                          <td><?php echo $usia; ?></td>
                          <td><?php echo htmlspecialchars($item['pangkat']); ?></td>
                          <td><?php echo htmlspecialchars($item['jenis_jabatan']); ?></td>
                          <td><?php echo htmlspecialchars($item['no_telp']); ?></td>
                          <td style="vertical-align: middle;">
                            <!-- Tombol Ubah Status -->
                            <button id="button_ubah" onclick="ubah_status_pegawai(<?php echo htmlspecialchars($item['id_pegawai']); ?>)" value="<?php echo $item['id_pegawai']; ?>" data-toggle="modal" data-target="#ubahStatusModal" class="btn btn-info" title="Ubah Status Pegawai"><i class="fas fa-fw fa-info-circle"></i></button>
                          </td>
                        </tr>

                      <?php } } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="tiga" role="tabpanel" aria-labelledby="">
          <br>
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="card col-lg-12 shadow mb-4">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="display table table-bordered" id="" width="100%" cellspacing="0">
                    <thead style="text-align: center;">
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status Pegawai</th>
                        <th>NIP</th>
                        <th>Jenis Kelamin</th>
                        <th>Usia</th>
                        <th>Pangkat / Golongan</th>
                        <th>Jabatan</th>
                        <th>No Telp</th>
                        <th></th> <!-- ubah status -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($pegawai as $item) { 
                        $nip = $item['tanggal_lahir'];
                        $thn = substr($nip, 0, 4);
                        $usia = (Date('Y') + 2) - $thn;
                        $pensiun = $item['pensiun'];
                        if ($usia == $pensiun){
                          $no++;
                          ?>
                          <tr>
                            <td style="text-align: center;"><?php echo $no; ?></td>
                            <td><a href="#" data-toggle="modal" data-target="#detailModal<?=$item['id_pegawai'];?>"><?php echo htmlspecialchars($item['nama']); ?></a></td>
                            <td style="text-align: center;">PNS</td>
                            <td><?php echo htmlspecialchars($item['nip']); ?></td>
                            <td><?php echo htmlspecialchars($item['jk']); ?></td>
                            <td><?php echo $usia; ?></td>
                            <td><?php echo htmlspecialchars($item['pangkat']); ?></td>
                            <td><?php echo htmlspecialchars($item['jenis_jabatan']); ?></td>
                            <td><?php echo htmlspecialchars($item['no_telp']); ?></td>
                            <td style="vertical-align: middle;">
                              <!-- Tombol Ubah Status -->
                              <button id="button_ubah" onclick="ubah_status_pegawai(<?php echo htmlspecialchars($item['id_pegawai']); ?>)" value="<?php echo $item['id_pegawai']; ?>" data-toggle="modal" data-target="#ubahStatusModal" class="btn btn-info" title="Ubah Status Pegawai"><i class="fas fa-fw fa-info-circle"></i></button>
                            </td>
                          </tr>

                        <?php } } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="empat" role="tabpanel" aria-labelledby="">
            <br>
            <div class="row">

              <!-- Earnings (Monthly) Card Example -->
              <div class="card col-lg-12 shadow mb-4">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="display table table-bordered" id="" width="100%" cellspacing="0">
                      <thead style="text-align: center;">
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Status Pegawai</th>
                          <th>NIP</th>
                          <th>Jenis Kelamin</th>
                          <th>Usia</th>
                          <th>Pangkat / Golongan</th>
                          <th>Jabatan</th>
                          <th>No Telp</th>
                          <th></th> <!-- ubah status -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 0;
                        foreach ($pegawai as $item) { 
                          $nip = $item['tanggal_lahir'];
                          $thn = substr($nip, 0, 4);
                          $usia = (Date('Y') + 3) - $thn;
                          $pensiun = $item['pensiun'];
                          if ($usia == $pensiun){
                            $no++;
                            ?>
                            <tr>
                              <td style="text-align: center;"><?php echo $no; ?></td>
                              <td><a href="#" data-toggle="modal" data-target="#detailModal<?=$item['id_pegawai'];?>"><?php echo htmlspecialchars($item['nama']); ?></a></td>
                              <td style="text-align: center;">PNS</td>
                              <td><?php echo htmlspecialchars($item['nip']); ?></td>
                              <td><?php echo htmlspecialchars($item['jk']); ?></td>
                              <td><?php echo $usia; ?></td>
                              <td><?php echo htmlspecialchars($item['pangkat']); ?></td>
                              <td><?php echo htmlspecialchars($item['jenis_jabatan']); ?></td>
                              <td><?php echo htmlspecialchars($item['no_telp']); ?></td>
                              <td style="vertical-align: middle;">
                                <!-- Tombol Ubah Status -->
                                <button id="button_ubah" onclick="ubah_status_pegawai(<?php echo htmlspecialchars($item['id_pegawai']); ?>)" value="<?php echo $item['id_pegawai']; ?>" data-toggle="modal" data-target="#ubahStatusModal" class="btn btn-info" title="Ubah Status Pegawai"><i class="fas fa-fw fa-info-circle"></i></button>
                              </td>
                            </tr>

                          <?php } } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="lima" role="tabpanel" aria-labelledby="">
              <br>
              <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="card col-lg-12 shadow mb-4">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display table table-bordered" id="" width="100%" cellspacing="0">
                        <thead style="text-align: center;">
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status Pegawai</th>
                            <th>NIP</th>
                            <th>Jenis Kelamin</th>
                            <th>Usia</th>
                            <th>Pangkat / Golongan</th>
                            <th>Jabatan</th>
                            <th>No Telp</th>
                            <th></th> <!-- ubah status -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 0;
                          foreach ($pegawai as $item) { 
                            $nip = $item['tanggal_lahir'];
                            $thn = substr($nip, 0, 4);
                            $usia = (Date('Y') + 4) - $thn;
                            $pensiun = $item['pensiun'];
                            if ($usia == $pensiun){
                              $no++;
                              ?>
                              <tr>
                                <td style="text-align: center;"><?php echo $no; ?></td>
                                <td><a href="#" data-toggle="modal" data-target="#detailModal<?=$item['id_pegawai'];?>"><?php echo htmlspecialchars($item['nama']); ?></a></td>
                                <td style="text-align: center;">PNS</td>
                                <td><?php echo htmlspecialchars($item['nip']); ?></td>
                                <td><?php echo htmlspecialchars($item['jk']); ?></td>
                                <td><?php echo $usia; ?></td>
                                <td><?php echo htmlspecialchars($item['pangkat']); ?></td>
                                <td><?php echo htmlspecialchars($item['jenis_jabatan']); ?></td>
                                <td><?php echo htmlspecialchars($item['no_telp']); ?></td>
                                <td style="vertical-align: middle;">
                                  <!-- Tombol Ubah Status -->
                                  <button id="button_ubah" onclick="ubah_status_pegawai(<?php echo htmlspecialchars($item['id_pegawai']); ?>)" value="<?php echo $item['id_pegawai']; ?>" data-toggle="modal" data-target="#ubahStatusModal" class="btn btn-info" title="Ubah Status Pegawai"><i class="fas fa-fw fa-info-circle"></i></button>
                                </td>
                              </tr>

                            <?php } } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- Content Row -->


          <!-- /.container-fluid -->

          <!-- MODAL UBAH STATUS -->
          <div class="modal fade" id="ubahStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ubah Status Pegawai</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form role="form" enctype="multipart/form-data" action="<?php echo site_url('Listpegawai/ubah_status_pensiun/');?>" method="POST">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Ubah status menjadi</label>
                      <input type="text" name="status" class="form-control" value="Tidak Aktif" readonly>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Selesai Kerja</label>
                      <input type="date" class="form-control" name="tgl_selesai">
                    </div>
                    <div class="form-group">
                      <label>Keterangan <span style="color: red">*wajib diisi</span></label>
                      <input type="text" name="ket" class="form-control" value="Pensiun" readonly>
                    </div>
                    <input hidden id="id_pegawai" type="text" name="id_pegawai" value="">
                  </div>

                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" value="1" name="simpan" class="btn btn-primary"> Simpan
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- MODAL DETAIL PEGAWAI -->
          <?php
          foreach ($pegawai as $item) {
            ?>
            <div class="modal fade" id="detailModal<?=$item['id_pegawai'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pegawai</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <table style="border: 0; vertical-align: top;">
                      <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= htmlspecialchars($item['nama']); ?></td>
                      </tr>
                      <tr>
                        <td>Status Kepegawaian</td>
                        <td>:</td>
                        <?php
                        if ($item['status'] == 'p'){
                          ?>
                          <td>PNS</td>
                        <?php } else{
                          ?>
                          <td>Non-PNS</td>
                        <?php } ?>
                      </tr>
                      <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <?php
                        if ($item['status'] == 'p'){
                          ?>
                          <td><?= htmlspecialchars($item['nip']); ?></td>
                        <?php } else{
                          ?>
                          <td>-</td>
                        <?php } ?>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?= htmlspecialchars($item['jk']); ?></td>
                      </tr>
                      <tr>
                        <td>Tempat, Tanggal Lahir</td>
                        <td>:</td>
                        <?php
                        $tempat = $item['tempat_lahir'];
                        $tmp = ucwords(strtolower($tempat));
                        $tgl = $item['tanggal_lahir'];
                        $bln = substr($tgl, 5, 2);
                        $hari = substr($tgl, 8, 2);
                        $tahun = substr($tgl, 0, 4);
                        $recap = [
                          '01' => 'Januari',
                          '02' => 'Februari',
                          '03' => 'Maret',
                          '04' => 'April',
                          '05' => 'Mei',
                          '06' => 'Juni',
                          '07' => 'Juli',
                          '08' => 'Agustus',
                          '09' => 'September',
                          '10' => 'Oktober',
                          '11' => 'November',
                          '12' => 'Desember'
                        ];
                        foreach ($recap as $key => $value) {
                          if ($key == $bln){
                            ?>
                            <td><?= $tmp. ', '. $hari .' '. $value .' '. $tahun;?></td>
                          <?php }
                          elseif ($tmp == NULL){
                            ?>
                            <td><?= '-, '. $hari .' '. $value .' '. $tahun;?></td>
                          <?php } 
                        }?>
                      </tr>
                      <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td><?= htmlspecialchars($item['agama']); ?></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= ucwords(strtolower(htmlspecialchars($item['alamat']))); ?></td>
                      </tr>
                      <tr>
                        <td>Pendidikan Terakhir</td>
                        <td>:</td>
                        <td><?= htmlspecialchars($item['pend_terakhir']); ?></td>
                      </tr>
                      <tr>
                        <td>Jurusan</td>
                        <td>:</td>
                        <?php
                        $pend = $item['pend_terakhir'];
                        if ($pend == 'SD'){
                          ?>
                          <td>-</td>
                        <?php }
                        if ($pend == 'SMP'){
                          ?>
                          <td>-</td>
                        <?php } 
                        else { ?>
                          <td><?= strtoupper(strtolower(htmlspecialchars($item['jurusan']))); ?></td>
                        <?php } ?>
                      </tr>
                      <tr>
                        <td>Nomor HP</td>
                        <td>:</td>
                        <?php
                        if ($item['no_telp'] != NULL){
                          ?>
                          <td><?= htmlspecialchars($item['no_telp']); ?></td>
                        <?php }
                        else {
                          ?>
                          <td>-</td>
                        <?php } ?>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>:</td>
                        <?php
                        if ($item['email'] != NULL){
                          ?>
                          <td><?= htmlspecialchars($item['email']); ?></td>
                        <?php }
                        else {
                          ?>
                          <td>-</td>
                        <?php } ?>
                      </tr>
                      <tr>
                        <td>Pangkat/Golongan</td>
                        <td>:</td>
                        <?php 
                        if ($item['status'] == 'p'){
                          ?>
                          <td><?= htmlspecialchars($item['pangkat']); ?></td>
                        <?php }
                        else {
                          ?>
                          <td>-</td>
                        <?php } ?>
                      </tr>
                      <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <?php
                        $jabatan = $item['jabatan'];
                        $recap = [
                          'umum' => 'Fungsional Umum',
                          'khusus' => 'Fungsional Khusus',
                          'struktural' => 'Struktural',
                          'non' => 'Non-PNS'
                        ];
                        foreach ($recap as $key => $value) {
                          if ($key == $jabatan){
                            ?>
                            <td><?= $value; ?></td>
                          <?php } }?>
                        </tr>
                        <tr>
                          <td>Jenis Jabatan</td>
                          <td>:</td>
                          <td><?= ucwords(strtolower(htmlspecialchars($item['jenis_jabatan']))); ?></td>
                        </tr>
                        <tr>
                          <td>Unit Kerja</td>
                          <td>:</td>
                          <td><?= htmlspecialchars($item['nama_unitkerja']); ?></td>
                        </tr>
                        <tr>
                          <td>Sub Unit Kerja</td>
                          <td>:</td>
                          <?php 
                          if ($item['nama_subunit'] != NULL){
                            ?>
                            <td><?= htmlspecialchars($item['nama_subunit']); ?></td>
                          <?php }
                          else{
                            ?>
                            <td>-</td>
                          <?php } ?>
                        </tr>
                        <tr>
                          <td>Status Kerja</td>
                          <td>:</td>
                          <?php
                          if ($item['status_kerja'] == 1){
                            ?>
                            <td>Aktif</td>
                          <?php }
                          else {
                            ?>
                            <td>Tidak Aktif</td>
                          <?php }
                          ?>
                        </tr>
                        <tr>
                          <td>Tanggal Mulai Kerja</td>
                          <td>:</td>
                          <td><?= htmlspecialchars($item['tanggal_mulai_kerja']); ?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>

            <script type="text/javascript">
              function ubah_status_pegawai(id_pegawai)
              {
                var data_id = document.getElementById('id_pegawai');
                data_id.value = id_pegawai;
              }

            </script>
