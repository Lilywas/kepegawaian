<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 text-center">Daftar Pegawai Non Aktif</h1>
  <hr>
  <?= $this->session->flashdata('msg_berhasil'); ?>
  <?= $this->session->flashdata('msg_gagal'); ?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table display table-bordered" width="100%" cellspacing="0">
          <thead style="text-align: center;">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Status Pegawai</th>
              <th>NIP</th>
              <th>Jenis Kelamin</th>
              <th>Pangkat / Golongan</th>
              <th>Jabatan</th>
              <th>No Telp</th>
              <th>Keterangan Tidak Aktif</th>
              <th></th> <!-- ubah status -->
              <!-- <th></th> -->
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 0;
            foreach ($pegawai as $item) {
              $no++; ?>
              <tr>
                <td style="text-align: center;"><?= $no; ?></td>
                <td><a href="#" data-toggle="modal" data-target="#detailModal<?= $item['id_pegawai']; ?>"><?= htmlspecialchars($item['nama']); ?></a></td>
                <td style="text-align: center;"><?php $key = $item['status'];
                                                if ($key == "p") {
                                                  echo "PNS";
                                                } else {
                                                  echo "Non-PNS";
                                                }
                                                ?></td>
                <td><?= htmlspecialchars($item['nip']); ?></td>
                <td><?= htmlspecialchars($item['jk']); ?></td>
                <td><?= htmlspecialchars($item['pangkat']); ?></td>
                <td><?= htmlspecialchars($item['jenis_jabatan']); ?></td>
                <td><?= htmlspecialchars($item['no_telp']); ?></td>
                <td><?= htmlspecialchars($item['keterangan_status_kerja']); ?></td>
                <!--  -->
                <td style="vertical-align: middle;">
                  <!-- Tombol Ubah Status -->
                  <button id="button_ubah" onclick="ubah_status_pegawai(<?= htmlspecialchars($item['id_pegawai']); ?>)" value="<?= $item['id_pegawai']; ?>" data-toggle="modal" data-target="#ubahStatusModal" class="btn btn-info" title="Ubah Status Pegawai"><i class="fas fa-fw fa-info-circle"></i></button>
                </td>
                <!-- <td style="vertical-align: middle;"> -->
                <!-- Tombol Hapus -->
                <!-- <button onclick="hapus_pegawai(<?= htmlspecialchars($item['id_pegawai']); ?>)" value="<?= $item['id_pegawai']; ?>" data-toggle="modal" data-target="#hapusPegawai" class="btn btn-danger"><i class="far fa-fw fa-trash-alt"></i> Hapus</button>
                  </td> -->
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<div class="modal fade" id="ubahStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Status Pegawai</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <form role="form" enctype="multipart/form-data" action="<?= site_url('Listpegawai/aktifkan_pegawai/'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Ubah status menjadi</label>
            <input type="text" name="status" class="form-control" value="Aktif" readonly>
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
  <div class="modal fade" id="detailModal<?= $item['id_pegawai']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Pegawai</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <table style="border: 0">
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><?= htmlspecialchars($item['nama']); ?></td>
            </tr>
            <tr>
              <td>Status Kepegawaian</td>
              <td>:</td>
              <?php
              if ($item['status'] == 'p') {
              ?>
                <td>PNS</td>
              <?php } else {
              ?>
                <td>Non-PNS</td>
              <?php } ?>
            </tr>
            <tr>
              <td>NIP</td>
              <td>:</td>
              <?php
              if ($item['status'] == 'p') {
              ?>
                <td><?= htmlspecialchars($item['nip']); ?></td>
              <?php } else {
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
              $tempat = htmlspecialchars($item['tempat_lahir']);
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
                if ($key == $bln) {
              ?>
                  <td><?= $tmp . ', ' . $hari . ' ' . $value . ' ' . $tahun; ?></td>
              <?php }
              } ?>
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
              if ($pend == 'SD') {
              ?>
                <td>-</td>
              <?php }
              if ($pend == 'SMP') {
              ?>
                <td>-</td>
              <?php } else { ?>
                <td><?= ucwords(strtolower(htmlspecialchars($item['jurusan']))); ?></td>
              <?php } ?>
            </tr>
            <tr>
              <td>Nomor HP</td>
              <td>:</td>
              <td><?= htmlspecialchars($item['no_telp']); ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td>:</td>
              <td><?= htmlspecialchars($item['email']); ?></td>
            </tr>
            <tr>
              <td>Pangkat/Golongan</td>
              <td>:</td>
              <?php
              if ($item['status'] == 'p') {
              ?>
                <td><?= htmlspecialchars($item['pangkat']); ?></td>
              <?php } else {
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
                if ($key == $jabatan) {
              ?>
                  <td><?= $value; ?></td>
              <?php }
              } ?>
            </tr>
            <tr>
              <td>Jenis Jabatan</td>
              <td>:</td>
              <td><?= ucwords(strtolower(htmlspecialchars($item['jenis_jabatan']))); ?></td>
            </tr>
            <tr>
              <td>Unit Kerja</td>
              <td>:</td>
              <?php
              if ($item['nama_unitkerja'] != NULL) {
              ?>
                <td><?= htmlspecialchars($item['nama_unitkerja']); ?></td>
              <?php } else {
              ?>
                <td>-</td>
              <?php } ?>
            </tr>
            <tr>
              <td>Sub Unit Kerja</td>
              <td>:</td>
              <?php
              if ($item['nama_subunit'] != NULL) {
              ?>
                <td><?= htmlspecialchars($item['nama_subunit']); ?></td>
              <?php } else {
              ?>
                <td>-</td>
              <?php } ?>
            </tr>
            <tr>
              <td>Status Kerja</td>
              <td>:</td>
              <?php
              if ($item['status_kerja'] == 1) {
              ?>
                <td>Aktif</td>
              <?php } else {
              ?>
                <td>Tidak Aktif</td>
              <?php }
              ?>
            </tr>
            <tr>
              <td>Keterangan Tidak Aktif</td>
              <td>:</td>
              <td><?= htmlspecialchars($item['keterangan_status_kerja']); ?></td>
            </tr>
            <tr>
              <td>Tanggal Mulai Kerja</td>
              <td>:</td>
              <?php
              $tgl = $item['tanggal_mulai_kerja'];
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
              $ada = 0;
              foreach ($recap as $key => $value) {
                if ($key == $bln) {
                  $ada = 1;
              ?>
                  <td><?= $hari . ' ' . $value . ' ' . $tahun; ?></td>
                <?php }
              }
              if ($ada == 0) {
                ?>
                <td><?= $tgl; ?></td>
              <?php } ?>
            </tr>
            <tr>
              <td>Tanggal Selesai Kerja</td>
              <td>:</td>
              <?php
              $tgl = $item['tanggal_selesai_kerja'];
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
              $ada = 0;
              foreach ($recap as $key => $value) {
                if ($key == $bln) {
                  $ada = 1;
              ?>
                  <td><?= $hari . ' ' . $value . ' ' . $tahun; ?></td>
                <?php }
              }
              if ($ada == 0) {
                ?>
                <td><?= $tgl; ?></td>
              <?php } ?>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<script type="text/javascript">
  function ubah_status_pegawai(id_pegawai) {
    var data_id = document.getElementById('id_pegawai');
    var klik = 1;
    data_id.value = id_pegawai;
  }
</script>