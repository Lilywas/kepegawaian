<!-- Begin Page Content -->
<div class="container-fluid">

  <div>
    <h4 class="font-weight-bold text-black">Tambah Data Pegawai</h4>
  </div><br>
  <form method="POST" action="<?= site_url('addpegawai/simpannonpns') ?>" enctype="multipart/form-data">
    <div class="card bg-light">
      <div class="card bg-light mb-3" style="margin: 7px">
        <div class="card-header">Informasi Umum</div>
        <div class="card-body">
          <div class="form-row small text-danger">*) Wajib diisi</div><br>
          <div class="form-row">
            <div class="form-group col-md-3">
              <label>Nama Lengkap <span style="color: red">*</span></label>
              <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama') ?>">
            </div>
            <div class="form-group col-md-3">
              <label>Jenis Kelamin <span style="color: red">*</span></label>
              <select class="form-control" name="jk" required="">
                <option value="">----Pilih----</option>
                <option <?php echo set_select('jk', 'Laki-laki'); ?>>Laki-laki</option>
                <option <?php echo set_select('jk', 'Perempuan'); ?>>Perempuan</option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label>Tempat Lahir <span style="color: red">*</span></label>
              <input type="text" class="form-control" name="tempat_lahir" value="<?php echo set_value('tempat_lahir') ?>" required="">
            </div>
            <div class="form-group col-md-3">
              <label>Tanggal Lahir <span style="color: red">*</span></label>
              <input type="date" class="form-control" name="tgl_lahir" value="<?php echo set_value('tgl_lahir') ?>" required="">
            </div>
          </div>
          <div class="form-group">
            <label>Alamat <span style="color: red">*</span></label>
            <input type="text" class="form-control" name="alamat" value="<?php echo set_value('alamat') ?>" required="">
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Agama <span style="color: red">*</span></label>
              <select class="form-control" name="agama" required="">
                <option value="">----Pilih----</option>
                <option value="Islam" <?php echo set_select('agama', 'Islam'); ?>>Islam</option>
                <option value="Kristen" <?php echo set_select('agama', 'Kristen'); ?>>Kristen</option>
                <option value="Katholik" <?php echo set_select('agama', 'Katholik'); ?>>Katholik</option>
                <option value="Hindu" <?php echo set_select('agama', 'Hindu'); ?>>Hindu</option>
                <option value="Buddha" <?php echo set_select('agama', 'Buddha'); ?>>Buddha</option>
                <option value="Konghucu" <?php echo set_select('agama', 'Konghucu'); ?>>Konghucu</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Pendidikan Terakhir <span style="color: red">*</span></label>
              <select class="form-control" name="pend">
                <option value="">----Pilih----</option>
                <option value="SD" <?php echo set_select('pend', 'SD'); ?>>SD</option>
                <option value="SMP" <?php echo set_select('pend', 'SMP'); ?>>SMP</option>
                <option value="SMA/K" <?php echo set_select('pend', 'SMA/K'); ?>>SMA/K</option>
                <option value="D1" <?php echo set_select('pend', 'D1'); ?>>D1</option>
                <option value="D2" <?php echo set_select('pend', 'D2'); ?>>D2</option>
                <option value="D3" <?php echo set_select('pend', 'D3'); ?>>D3</option>
                <option value="D4" <?php echo set_select('pend', 'D4'); ?>>D4</option>
                <option value="S1" <?php echo set_select('pend', 'S1'); ?>>S1</option>
                <option value="S2" <?php echo set_select('pend', 'S2'); ?>>S2</option>
                <option value="S3" <?php echo set_select('pend', 'S3'); ?>>S3</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Jurusan</label>
              <input type="text" class="form-control" value="<?php echo set_value('jurusan') ?>" name="jurusan">
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
              <input type="text" class="form-control" name="hp" value="<?php echo set_value('hp') ?>" required="">
            </div>
            <div class="form-group col-md-4">
              <label>email</label>
              <input type="email" class="form-control" name="email" value="<?php echo set_value('email') ?>">
              <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
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
                foreach ($unit as $key) {
                  echo '<option value="' . $key['id_unit'] . '" >' . $key['nama_unit'] . '</option>';
                }
                ?>
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
                <option <?php echo set_select('bagian', 'Administrasi'); ?>>Administrasi</option>
                <option <?php echo set_select('bagian', 'Front Office'); ?>>Front Office</option>
                <option <?php echo set_select('bagian', 'Petugas Kesehatan'); ?>>Petugas Kesehatan</option>
                <option <?php echo set_select('bagian', 'Driver'); ?>>Driver</option>
                <option <?php echo set_select('bagian', 'Kebersihan'); ?>>Kebersihan</option>
                <option <?php echo set_select('bagian', 'Keamanan'); ?>>Keamanan</option>
                <option <?php echo set_select('bagian', 'Petugas Lapangan'); ?>>Petugas Lapangan</option>
                <option <?php echo set_select('bagian', 'Petugas Teknik Listrik'); ?>>Petugas Teknik Listrik</option>
                <option <?php echo set_select('bagian', 'Petugas Teknik Audio Visual'); ?>>Petugas Teknik Audio Visual</option>
                <option <?php echo set_select('bagian', 'Lainnya'); ?>>Lainnya</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Tanggal Mulai Kerja</label>
              <input type="date" class="form-control" name="tgl_kerja" value="<?php echo set_value('tgl_kerja') ?>">
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