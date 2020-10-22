<?php
$jk = array(
  'Laki-laki' => 'Laki-laki',
  'Perempuan' => 'Perempuan'
);

$agama = array(
  'Islam' => 'Islam',
  'Kristen' => 'Kristen',
  'Katholik' => 'Katholik',
  'Hindu' => 'Hindu',
  'Buddha' => 'Buddha',
  'Konghucu' => 'Konghucu'
);

$pangkat = array(
  'Juru Muda (I/A)' => 'Juru Muda (I/A)',
  'Juru Muda Tingkat I (I/B)' => 'Juru Muda Tingkat I (I/B)',
  'Juru (I/C)' => 'Juru (I/C)',
  'Juru Tingkat I (I/D)' => 'Juru Tingkat I (I/D)',
  'Pengatur Muda (II/A)' => 'Pengatur Muda (II/A)',
  'Pengatur Muda Tingkat I (II/B)' => 'Pengatur Muda Tingkat I (II/B)',
  'Pengatur (II/C)' => 'Pengatur (II/C)',
  'Pengatur Tingkat I (II/D)' => 'Pengatur Tingkat I (II/D)',
  'Penata Muda (III/A)' => 'Penata Muda (III/A)',
  'Penata Muda Tingkat I (III/B)' => 'Penata Muda Tingkat I (III/B)',
  'Penata (III/C)' => 'Penata (III/C)',
  'Penata Tingkat I (III/D)' => 'Penata Tingkat I (III/D)',
  'Pembina (IV/A)' => 'Pembina (IV/A)',
  'Pembina Tingkat I (IV/B)' => 'Pembina Tingkat I (IV/B)',
  'Pembina Utama Muda (IV/C)' => 'Pembina Utama Muda (IV/C)',
  'Pembina Utama Madya (IV/D)' => 'Pembina Utama Madya (IV/D)',
  'Pembina Utama (IV/E)' => 'Pembina Utama (IV/E)'
);

$pendidikan = array(
  'SD' => 'SD',
  'SMP' => 'SMP',
  'SMA/K' => 'SMA/K',
  'D1' => 'D1',
  'D2' => 'D2',
  'D3' => 'D3',
  'D4' => 'D4',
  'S1' => 'S1',
  'S2' => 'S2',
  'S3' => 'S3'
);

$jabatan = array(
  'umum' => 'Fungsional Umum',
  'khusus' => 'Fungsional Khusus',
  'struktural' => 'struktural'
);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <div>
    <h4 class="font-weight-bold text-black">Edit Data Pegawai</h4>
  </div>
  <div class="card bg-light">
    <form method="POST" action="<?= filter_var(site_url('listpegawai/update_pns'), FILTER_SANITIZE_URL) ?>" enctype="multipart/form-data">
      <input hidden type="text" name="id_pegawai" value="<?= filter_var($dataPegawai['id_pegawai'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>">
      <div class="card bg-light mb-3" style="margin: 7px">
        <div class="card-header">Informasi Umum</div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>NIP </label>
              <input type="text" class="form-control" name="nip" value="<?= filter_var($dataPegawai['nip'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>">
            </div>
            <div class="form-group col-md-4">
              <label>Nama Lengkap </label>
              <input type="text" class="form-control" name="nama" value="<?= filter_var($dataPegawai['nama'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>">
            </div>
            <div class="form-group col-md-4">
              <label>Jenis Kelamin </label>
              <input type="text" class="form-control" name="jk" value="<?= filter_var($dataPegawai['jk'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Tempat Lahir </label>
              <input type="text" class="form-control" name="tempat_lahir" value="<?= filter_var($dataPegawai['tempat_lahir'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>" readonly>
            </div>
            <div class="form-group col-md-4">
              <label>Tanggal Lahir </label>
              <?php
              $tgl = $dataPegawai['tgl_lahir'];
              ?>
              <input type="date" data-date="" data-date-format="DD/MM/YYYY" name="tgl_lahir" class="form-control" value="<?= filter_var($tgl, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>">
            </div>
            <div class="form-group col-md-4">
              <label>Agama </label>
              <select class="form-control" name="agama">
                <option value="">----Pilih----</option>
                <?php
                foreach ($agama as $key => $jenis) {
                  if ($key == $dataPegawai['agama']) { ?>
                    <option value="<?= filter_var($key, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>" selected><?= filter_var($jenis, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></option>
                  <?php } else { ?>
                    <option value="<?= filter_var($key, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"><?= filter_var($jenis, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></option>
                <?php }
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <label>Alamat </label>
            <input type="text" class="form-control" name="alamat" value="<?= filter_var($dataPegawai['alamat'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>">
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Pendidikan Terakhir</label>
              <select class="form-control" name="pend">
                <option value="">----Pilih----</option>
                <?php
                foreach ($pendidikan as $key => $jenis) {
                  if ($key == $dataPegawai['pend']) { ?>
                    <option value="<?= filter_var($key, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>" selected><?= filter_var($jenis, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></option>
                  <?php } else { ?>
                    <option value="<?= filter_var($key, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"><?= filter_var($jenis, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></option>
                <?php }
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Jurusan</label>
              <input type="text" class="form-control" name="jurusan" value="<?= filter_var($dataPegawai['jurusan'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>">
            </div>
          </div>
        </div>
      </div>
      <div class="card bg-light mb-3" style="margin: 7px">
        <div class="card-header">Data Kontak</div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>No HP </label>
              <input type="text" class="form-control" name="hp" value="<?= filter_var($dataPegawai['hp'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>">
            </div>
            <div class="form-group col-md-4">
              <label>email </label>
              <input type="email" class="form-control" name="email" value="<?= filter_var($dataPegawai['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>">
            </div>
          </div>
        </div>
      </div>
      <div class="card bg-light mb-3" style="margin: 7px">
        <div class="card-header">Data Pelengkap</div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Pangkat/Golongan </label>
              <select class="form-control" name="pangkat">
                <option value="">----Pilih----</option>
                <?php
                foreach ($pangkat as $key => $value) {
                  if ($key == $dataPegawai['pangkat']) {
                ?>
                    <option selected=""><?= filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></option>
                  <?php } else {
                  ?>
                    <option><?= filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></option>
                <?php }
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Unit Kerja </label>
              <select id="unit" class="form-control" name="unit_master">
                <option value="">----Pilih----</option>
                <?php
                $unitkerja = $dataPegawai['unit_kerja_pegawai'];
                foreach ($unit as $key) {
                  if ($unitkerja == $key['id_unit']) { ?>
                    <option value="<?= filter_var($key['id_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>" selected><?= filter_var($key['nama_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></option>
                  <?php } else { ?>
                    <option value="<?= filter_var($key['id_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"><?= filter_var($key['nama_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></option>
                <?php }
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Sub Unit Kerja </label>
              <select class="sub form-control" name="sub_unit_master">
                <option value="">----Pilih----</option>
                <?php
                $subunit = $dataPegawai['sub_pegawai'];
                if ($subunit == NULL || $subunit == '0') {
                  foreach ($subnull as $key) { ?>
                    <option value="<?= filter_var($key['id_sub_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"><?= filter_var($key['keterangan'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></option>
                    <?php }
                } else {
                  foreach ($sub as $key) {
                    if ($subunit == $key['id_sub_unit']) { ?>
                      <option value="<?= filter_var($key['id_sub_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>" selected><?= filter_var($key['keterangan'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></option>
                    <?php } else { ?>
                      <option value="<?= filter_var($key['id_sub_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"><?= filter_var($key['keterangan'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></option>
                <?php }
                  }
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Jabatan </label>
              <select class="form-control" name="jabatan">
                <option value="">----Pilih----</option>
                <?php
                foreach ($jabatan as $key => $jenis) {
                  if ($key == $dataPegawai['jabatan']) { ?>
                    <option value="<?= filter_var($key, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>" selected><?= filter_var($jenis, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></option>
                  <?php } else { ?>
                    <option value="<?= filter_var($key, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"><?= filter_var($jenis, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></option>
                <?php }
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Bagian </label>
              <input type="text" class="form-control" name="bagian" value="<?= filter_var($dataPegawai['bagian'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>">
            </div>
            <div class="form-group col-md-4">
              <label>Tanggal Mulai Kerja</label>
              <?php
              $tgl = $dataPegawai['tgl_kerja'];
              ?>
              <input type="date" data-date="" data-date-format="DD/MM/YYYY" name="tgl_kerja" class="form-control" value="<?= filter_var($tgl, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Usia Pensiun </label>
              <input type="text" class="form-control" name="pensiun" value="<?= filter_var($dataPegawai['pensiun'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>">
            </div>
          </div>
        </div>
      </div>
      <button style="margin-bottom: 10px" type="submit" value="1" name="simpan" class="btn btn-primary btn-block">
        Simpan Data
      </button>
    </form>
  </div>
  <br>
</div>