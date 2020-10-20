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

$jenis_jabatan = array(
  'Administrasi' => 'Administrasi',
  'Front Office' => 'Front Office',
  'Petugas Kesehatan' => 'Petugas Kesehatan',
  'Driver' => 'Driver',
  'Kebersihan' => 'Kebersihan',
  'Keamanan' => 'Keamanan',
  'Petugas Lapangan' => 'Petugas Lapangan',
  'Petugas Teknik Listrik' => 'Petugas Teknik Listrik',
  'Petugas Teknik Audio Visual' => 'Petugas Teknik Audio Visual',
  'Lainnya' => 'Lainnya'
);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <div>
    <h4 class="font-weight-bold text-black">Edit Data Pegawai</h4>
  </div>
  <form method="POST" action="<?= site_url('listpegawai/update_non') ?>" enctype="multipart/form-data">
    <input hidden type="text" id="id" name="id_pegawai" value="<?= $dataPegawai['id_pegawai']; ?>">
    <div class="card bg-light">
      <div class="card bg-light mb-3" style="margin: 7px">
        <div class="card-header">Informasi Umum</div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-3">
              <label>Nama Lengkap </label>
              <input type="text" class="form-control" name="nama" value="<?= $dataPegawai['nama']; ?>">
            </div>
            <div class="form-group col-md-3">
              <label>Jenis Kelamin </label>
              <select class="form-control" name="jk" disabled>
                <option value="">----Pilih----</option>
                <?php
                foreach ($jk as $key => $jenis) {
                  echo ($key == $dataPegawai['jk']) ? '<option value="' . $key . '" selected>' . $jenis . '</option>'
                    : '<option value="' . $key . '">' . $jenis . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label>Tempat Lahir </label>
              <input type="text" class="form-control" name="tempat_lahir" value="<?= $dataPegawai['tempat_lahir']; ?>" readonly>
            </div>
            <div class="form-group col-md-3">
              <label>Tanggal Lahir </label>
              <?php
              $tgl = $dataPegawai['tgl_lahir'];
              ?>
              <input type="date" data-date="" data-date-format="DD/MM/YYYY" name="tgl_lahir" class="form-control" value="<?= htmlspecialchars($tgl) ?>">
            </div>
          </div>
          <div class="form-group">
            <label>Alamat </label>
            <input type="text" class="form-control" name="alamat" value="<?= $dataPegawai['alamat']; ?>">
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Agama </label>
              <select class="form-control" name="agama">
                <option value="">----Pilih----</option>
                <?php
                foreach ($agama as $key => $jenis) {
                  echo ($key == $dataPegawai['agama']) ? '<option value="' . $key . '" selected>' . $jenis . '</option>'
                    : '<option value="' . $key . '">' . $jenis . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Pendidikan Terakhir</label>
              <select class="form-control" name="pend">
                <option value="">----Pilih----</option>
                <?php
                foreach ($pendidikan as $key => $jenis) {
                  echo ($key == $dataPegawai['pend']) ? '<option value="' . $key . '" selected>' . $jenis . '</option>'
                    : '<option value="' . $key . '">' . $jenis . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Jurusan</label>
              <input type="text" class="form-control" name="jurusan" value="<?= $dataPegawai['jurusan'] ?>">
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
              <input type="text" class="form-control" name="hp" value="<?= $dataPegawai['hp'] ?>">
            </div>
            <div class="form-group col-md-4">
              <label>email </label>
              <input type="email" class="form-control" name="email" value="<?= $dataPegawai['email'] ?>">
            </div>
          </div>
        </div>
      </div>
      <div class="card bg-light mb-3" style="margin: 7px">
        <div class="card-header">Data Pelengkap</div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Unit Kerja </label>
              <select id="unit" class="form-control" name="unit_master">
                <option value="">----Pilih----</option>
                <?php
                $unitkerja = $dataPegawai['unit_kerja_pegawai'];
                foreach ($unit as $key) {
                  echo ($unitkerja == $key['id_unit']) ? '<option value="' . $key['id_unit'] . '" selected>' . $key['nama_unit'] . '</option>'
                    : '<option value="' . $key['id_unit'] . '" >' . $key['nama_unit'] . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Sub Unit Kerja </label>
              <select class="sub form-control" name="sub_unit_master">
                <option value="">----Pilih----</option>
                <?php
                $subunit = $dataPegawai['sub_pegawai'];
                if ($subunit == NULL || $subunit == '0') {
                  foreach ($subnull as $key) {
                    echo '<option value="' . $key['id_sub_unit'] . '" >' . $key['keterangan'] . '</option>';
                  }
                } elseif ($subunit != NULL || $subunit != '0') {
                  foreach ($sub as $key) {
                    echo ($subunit == $key['id_sub_unit']) ? '<option value="' . $key['id_sub_unit'] . '" selected>' . $key['keterangan'] . '</option>'
                      : '<option value="' . $key['id_sub_unit'] . '" >' . $key['keterangan'] . '</option>';
                  }
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Jabatan </label>
              <input type="text" class="form-control" name="sub_unit" value="Non-ASN" readonly>
            </div>
            <div class="form-group col-md-4">
              <label>Bagian </label>
              <select class="form-control" name="bagian">
                <option value="">----Pilih----</option>
                <?php
                foreach ($jenis_jabatan as $key => $jenis) {
                  echo ($key == $dataPegawai['bagian']) ? '<option value="' . $key . '" selected>' . $jenis . '</option>'
                    : '<option value="' . $key . '">' . $jenis . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Tanggal Mulai Kerja</label>
              <?php
              $tgl = $dataPegawai['tgl_kerja'];
              ?>
              <input type="date" data-date="" data-date-format="DD/MM/YYYY" name="tgl_kerja" class="form-control" value="<?= htmlspecialchars($tgl) ?>">
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<button type="submit" value="1" name="simpan" class="btn btn-primary btn-block">
  Simpan Data
</button>
</div>
</form>
</div>