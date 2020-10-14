<?php  
$bln = Date('m');
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
?>

<!-- Begin Page Content -->
<br><br><br><br>
<div class="container-fluid" style="padding: 0px 50px;">
  <!-- -------------------- PEGAWAI AKTIF -------------------- -->
  <h2 class="h3 mb-2 text-gray-800 text-center">Daftar Pegawai</h2>
  <hr>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active"  data-toggle="tab" href="#aktif" role="tab" aria-controls="aktif" aria-selected="true">Pegawai Aktif</a>
    </li>
    <?php
    foreach ($recap as $key => $value) {
      if (Date('m') == $key){
        ?>
        <li class="nav-item">
          <a class="nav-link"  data-toggle="tab" href="#ultah" role="tab" aria-controls="ultah" aria-selected="false">Pegawai yang Ulang Tahun Bulan <?= $value." ".Date('Y'); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  data-toggle="tab" href="#pensiun" role="tab" aria-controls="pensiun" aria-selected="false">Pegawai yang Akan Pensiun Bulan <?= $value." ".Date('Y'); ?></a>
        </li>
      <?php }
    } ?>
  </ul>

  <div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="aktif" role="tabpanel" aria-labelledby="">
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
                    <th>Status Kepegawaian</th>
                    <th>NIP</th>
                    <th>Jabatan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($pegawai as $item) { 
                    $no++; ?>
                    <tr>
                      <td style="text-align: center; vertical-align: middle;"><?php echo $no; ?></td>
                      <td style="vertical-align: middle;"><a href="#" type="submit" onclick="tampil_riwayat_ajax(<?php echo htmlspecialchars($item['id_pegawai']); ?>)"><?php echo htmlspecialchars($item['nama']); ?></a></td>
                      <?php
                      if ($item['status'] == 'p'){
                        ?>
                        <td style="text-align: center; vertical-align: middle;">PNS</td>
                      <?php } else {
                        ?>
                        <td style="text-align: center; vertical-align: middle;">Non-PNS</td>
                      <?php } ?>
                      <?php
                      if ($item['nip'] == ''){
                        ?>
                        <td style="text-align: center; vertical-align: middle;">-</td>
                      <?php } else {
                        ?>
                        <td style="text-align: center; vertical-align: middle;"><?php echo htmlspecialchars($item['nip']); ?></td>
                      <?php } ?>
                      <td style="text-align: center; vertical-align: middle;"><?php echo ucwords(strtolower(htmlspecialchars($item['jenis_jabatan']))); ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>

    </div> <!-- div tab pane -->

    <div class="tab-pane fade" id="ultah" role="tabpanel" aria-labelledby="">
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
                    <th>NIP</th>
                    <th>Tanggal Lahir</th>
                    <th>Usia</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($pegawai as $item) { 
                    $nip = $item['tanggal_lahir'];
                    $thn = substr($nip, 0, 4);
                    $bln = substr($nip, 5, 2);
                    $tgl = substr($nip, 8, 2);
                    if (Date('m') == $bln){
                      $usia = Date('Y') - $thn;
                      $no++; 
                      ?>
                      <tr>
                        <td style="text-align: center;"><?php echo $no; ?></td>
                        <td><?php echo htmlspecialchars($item['nama']); ?></td>
                        <?php
                        if ($item['nip'] == ''){
                          ?>
                          <td style="text-align: center;">-</td>
                        <?php } else {
                          ?>
                          <td style="text-align: center;"><?php echo htmlspecialchars($item['nip']); ?></td>
                        <?php } ?>
                        <?php 
                        foreach ($recap as $key => $value) {
                          if ($key == $bln){
                            ?>
                            <td style="text-align: center;"><?php echo $tgl ." ". $value ." ". $thn; ; ?></td>
                          <?php } 
                        }
                        ?>
                        <td style="text-align: center;"><?php echo $usia . " Tahun"; ?></td>
                      </tr>
                    <?php } 
                  } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> <!-- row -->

    </div>

    <div class="tab-pane fade" id="pensiun" role="tabpanel" aria-labelledby="">
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
                    <th>NIP</th>
                    <th>Usia</th>
                    <th>Masa Kerja</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($pegawai as $item) {
                    if ($item['status'] == 'p'){
                      $nip = $item['tanggal_lahir'];
                      $tgl = substr($nip, 0, 4);
                      $usia = Date('Y') - $tgl;
                      $bln = substr($nip, 5, 2);
                      $pensiun = $item['pensiun'];
                      if ($usia == $pensiun){
                        $nip1 = $item['nip'];
                        if (Date('m') == $bln){
                          $masa = Date('Y') - (integer) substr($nip1, 8, 4);
                          $no++; 
                          ?>
                          <tr>
                            <td style="text-align: center;"><?php echo $no; ?></td>
                            <td><?php echo htmlspecialchars($item['nama']); ?></td>
                            <td style="text-align: center;"><?php echo htmlspecialchars($item['nip']); ?></td>
                            <td style="text-align: center;"><?php echo $usia; ?></td>
                            <td style="text-align: center;"><?php echo $masa.' Tahun'; ?></td>
                          </tr>
                        <?php } 
                      }
                    } 
                  } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> <!-- row -->
    </div>

  </div>
  <!-- Content Row -->

</div>

<!-- MODAL KOMPETENSI PEGAWAI -->

<div class="modal fade" id="modalKomp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div id="tabelkompetensi">

    </div>
  </div>
</div>
<!-- </div> -->
