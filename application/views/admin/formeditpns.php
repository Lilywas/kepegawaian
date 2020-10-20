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
    <form method="POST" action="<?= site_url('listpegawai/update_pns') ?>" enctype="multipart/form-data">
      <input hidden type="text" name="id_pegawai" value="<?= $dataPegawai['id_pegawai']; ?>">
      <div class="card bg-light mb-3" style="margin: 7px">
        <div class="card-header">Informasi Umum</div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>NIP </label>
              <input type="text" class="form-control" name="nip" value="<?php print_r($dataPegawai['nip']); ?>">
            </div>
            <div class="form-group col-md-4">
              <label>Nama Lengkap </label>
              <input type="text" class="form-control" name="nama" value="<?php print_r($dataPegawai['nama']); ?>">
            </div>
            <div class="form-group col-md-4">
              <label>Jenis Kelamin </label>
              <select class="form-control" name="jk">
                <option value="">----Pilih----</option>
                <?php
                foreach ($jk as $key => $jenis) {
                  echo ($key == $dataPegawai['jk']) ? '<option value="' . $key . '" selected>' . $jenis . '</option>'
                    : '<option value="' . $key . '">' . $jenis . '</option>';
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Tempat Lahir </label>
              <input type="text" class="form-control" name="tempat_lahir" value="<?php print_r($dataPegawai['tempat_lahir']) ?>">
            </div>
            <div class="form-group col-md-4">
              <label>Tanggal Lahir </label>
              <?php
              $tgl = $dataPegawai['tgl_lahir'];
              ?>
              <input type="date" data-date="" data-date-format="DD/MM/YYYY" name="tgl_lahir" class="form-control" value="<?php print_r($tgl) ?>">
            </div>
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
          </div>
          <div class="form-row">
            <label>Alamat </label>
            <input type="text" class="form-control" name="alamat" value="<?php print_r($dataPegawai['alamat']); ?>">
          </div>
          <div class="form-row">
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
              <input type="text" class="form-control" name="jurusan" value="<?php print_r($dataPegawai['jurusan']) ?>">
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
              <input type="text" class="form-control" name="hp" value="<?php print_r($dataPegawai['hp']) ?>">
            </div>
            <div class="form-group col-md-4">
              <label>email </label>
              <input type="email" class="form-control" name="email" value="<?php print_r($dataPegawai['email']) ?>">
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
                  echo ($key == $dataPegawai['pangkat']) ? '<option selected="">' . $value . '</option>' : '<option>' . $value . '</option>';
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
                  echo ($unitkerja == $key['id_unit']) ? '<option value="' . $key['id_unit'] . '" selected>' . $key['nama_unit'] . '</option>'
                    : '<option value="' . $key['id_unit'] . '" >' . $key['nama_unit'] . '</option>';
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
              <select class="form-control" name="jabatan">
                <option value="">----Pilih----</option>
                <?php
                foreach ($jabatan as $key => $jenis) {
                  echo ($key == $dataPegawai['jabatan']) ? '<option value="' . $key . '" selected>' . $jenis . '</option>'
                    : '<option value="' . $key . '">' . $jenis . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Bagian </label>
              <input type="text" class="form-control" name="bagian" value="<?php print_r($dataPegawai['bagian']) ?>">
            </div>
            <div class="form-group col-md-4">
              <label>Tanggal Mulai Kerja</label>
              <?php
              $tgl = $dataPegawai['tgl_kerja'];
              ?>
              <input type="date" data-date="" data-date-format="DD/MM/YYYY" name="tgl_kerja" class="form-control" value="<?php print_r($tgl) ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Usia Pensiun </label>
              <input type="text" class="form-control" name="pensiun" value="<?php print_r($dataPegawai['pensiun']) ?>">
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