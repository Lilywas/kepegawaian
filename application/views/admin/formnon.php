<!-- Begin Page Content -->
<div class="container-fluid">

  <div>
    <h4 class="font-weight-bold text-black">Tambah Data Pegawai</h4>
  </div><br>
  <form method="POST" action="<?= filter_var(site_url('addpegawai/simpannonpns'), FILTER_SANITIZE_URL) ?>" enctype="multipart/form-data">
    <div class="card bg-light">
      <div class="card bg-light mb-3" style="margin: 7px">
        <div class="card-header">Informasi Umum</div>
        <div class="card-body">
          <div class="form-row small text-danger">*) Wajib diisi</div><br>
          <div class="form-row">
            <div class="form-group col-md-3">
              <label>Nama Lengkap <span style="color: red">*</span></label>
              <input type="text" class="form-control" name="nama" value="<?= filter_var(set_value('nama'), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>">
            </div>
            <div class="form-group col-md-3">
              <label>Jenis Kelamin <span style="color: red">*</span></label>
              <select class="form-control" name="jk" required="">
                <option value="">----Pilih----</option>
                <option <?= filter_var(set_select('jk', 'Laki-laki'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>Laki-laki</option>
                <option <?= filter_var(set_select('jk', 'Perempuan'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>Perempuan</option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label>Tempat Lahir <span style="color: red">*</span></label>
              <input type="text" class="form-control" name="tempat_lahir" value="<?= filter_var(set_value('tempat_lahir'), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>" required="">
            </div>
            <div class="form-group col-md-3">
              <label>Tanggal Lahir <span style="color: red">*</span></label>
              <input type="date" class="form-control" name="tgl_lahir" value="<?= filter_var(set_value('tgl_lahir'), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>" required="">
            </div>
          </div>
          <div class="form-group">
            <label>Alamat <span style="color: red">*</span></label>
            <input type="text" class="form-control" name="alamat" value="<?= filter_var(set_value('alamat'), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>" required="">
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Agama <span style="color: red">*</span></label>
              <select class="form-control" name="agama" required="">
                <option value="">----Pilih----</option>
                <option value="Islam" <?= filter_var(set_select('agama', 'Islam'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>Islam</option>
                <option value="Kristen" <?= filter_var(set_select('agama', 'Kristen'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>Kristen</option>
                <option value="Katholik" <?= filter_var(set_select('agama', 'Katholik'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>Katholik</option>
                <option value="Hindu" <?= filter_var(set_select('agama', 'Hindu'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>Hindu</option>
                <option value="Buddha" <?= filter_var(set_select('agama', 'Buddha'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>Buddha</option>
                <option value="Konghucu" <?= filter_var(set_select('agama', 'Konghucu'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>Konghucu</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Pendidikan Terakhir <span style="color: red">*</span></label>
              <select class="form-control" name="pend">
                <option value="">----Pilih----</option>
                <option value="SD" <?= filter_var(set_select('pend', 'SD'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>SD</option>
                <option value="SMP" <?= filter_var(set_select('pend', 'SMP'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>SMP</option>
                <option value="SMA/K" <?= filter_var(set_select('pend', 'SMA/K'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>SMA/K</option>
                <option value="D1" <?= filter_var(set_select('pend', 'D1'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>D1</option>
                <option value="D2" <?= filter_var(set_select('pend', 'D2'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>D2</option>
                <option value="D3" <?= filter_var(set_select('pend', 'D3'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>D3</option>
                <option value="D4" <?= filter_var(set_select('pend', 'D4'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>D4</option>
                <option value="S1" <?= filter_var(set_select('pend', 'S1'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>S1</option>
                <option value="S2" <?= filter_var(set_select('pend', 'S2'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>S2</option>
                <option value="S3" <?= filter_var(set_select('pend', 'S3'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>S3</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Jurusan</label>
              <input type="text" class="form-control" value="<?= filter_var(set_value('jurusan'), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>" name="jurusan">
            </div>
          </div>
        </div>
      </div>
      <div class="card bg-light mb-3" style="margin: 7px">
        <div class="card-header">Data Kontak</div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>No HP <span style="color: red">*</span></label>
              <input type="text" class="form-control" name="hp" value="<?= filter_var(set_value('hp'), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>" required="">
            </div>
            <div class="form-group col-md-4">
              <label>email</label>
              <input type="email" class="form-control" name="email" value="<?= filter_var(set_value('email'), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>">
              <?= filter_var(form_error('email', '<small class="text-danger pl-3">', '</small>'), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>
            </div>
          </div>
        </div>
      </div>
      <div class="card bg-light mb-3" style="margin: 7px">
        <div class="card-header">Data Pelengkap</div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Unit Kerja <span style="color: red">*</span></label>
              <select id="unit" class="form-control" name="unit_master" required>
                <option value="">----Pilih----</option>
                <?php
                foreach ($unit as $key) { ?>
                  <option value="<?= filter_var($key['id_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"><?= filter_var($key['nama_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Sub Unit Kerja</label>
              <select class="sub form-control" name="sub_unit_master">
                <option value="">----Pilih----</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Jabatan</label>
              <input type="text" class="form-control" name="jabatan" value="Non-ASN" readonly>
            </div>
            <div class="form-group col-md-4">
              <label>Bagian <span style="color: red">*</span></label>
              <select class="form-control" name="bagian" required>
                <option value="">----Pilih----</option>
                <option <?= filter_var(set_select('bagian', 'Administrasi'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>Administrasi</option>
                <option <?= filter_var(set_select('bagian', 'Front Office'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>Front Office</option>
                <option <?= filter_var(set_select('bagian', 'Petugas Kesehatan'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>Petugas Kesehatan</option>
                <option <?= filter_var(set_select('bagian', 'Driver'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>Driver</option>
                <option <?= filter_var(set_select('bagian', 'Kebersihan'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>Kebersihan</option>
                <option <?= filter_var(set_select('bagian', 'Keamanan'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>Keamanan</option>
                <option <?= filter_var(set_select('bagian', 'Petugas Lapangan'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>Petugas Lapangan</option>
                <option <?= filter_var(set_select('bagian', 'Petugas Teknik Listrik'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>Petugas Teknik Listrik</option>
                <option <?= filter_var(set_select('bagian', 'Petugas Teknik Audio Visual'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>Petugas Teknik Audio Visual</option>
                <option <?= filter_var(set_select('bagian', 'Lainnya'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>>Lainnya</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Tanggal Mulai Kerja</label>
              <input type="date" class="form-control" name="tgl_kerja" value="<?= filter_var(set_value('tgl_kerja'), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>">
            </div>
          </div>
        </div>
      </div>
      <button style="margin-bottom: 10px" type="submit" name="simpan" class="btn btn-primary btn-block">
        Simpan Data
      </button>
    </div>
  </form>
</div>