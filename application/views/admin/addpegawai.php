<!-- Begin Page Content -->
<div class="container-fluid">

  <div>
    <h4 class="font-weight-bold text-black">Tambah Data Pegawai</h4>
  </div>
  
  <form method="POST" action="<?= site_url('addpegawai/simpanpns')?>" enctype="multipart/form-data">
    <div class="card bg-light">
      <div class="card bg-light mb-3" style="margin: 7px">
        <div class="card-header">Informasi Umum</div>
        <div class="card-body">
          <div class="form-row small text-danger">*) Wajib diisi</div><br>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>NIP <span style="color: red">*</span></label>
              <input type="text" class="form-control" name="nip">
            </div>
            <div class="form-group col-md-4">
              <label>Nama Lengkap <span style="color: red">*</span></label>
              <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group col-md-4">
              <label>Jenis Kelamin <span style="color: red">*</span></label>
              <select class="form-control" name="jk" required="">
                <option value="">----Pilih----</option>
                <option>Laki-laki</option>
                <option>Perempuan</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Agama <span style="color: red">*</span></label>
              <select class="form-control" name="agama" required="">
                <option value="">----Pilih----</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katholik">Katholik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Tempat Lahir <span style="color: red">*</span></label>
              <input type="text" class="form-control" name="tempat_lahir" required>
            </div>
            <div class="form-group col-md-4">
              <label>Tanggal Lahir <span style="color: red">*</span></label>
              <input type="text" id="datepicker" class="form-control" name="tgl_lahir" placeholder="yyyy-mm-dd" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col md-8">
              <label>Alamat <span style="color: red">*</span></label>
              <input type="text" class="form-control" name="alamat" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Pendidikan Terakhir <span style="color: red">*</span></label>
              <select class="form-control" name="pend">
                <option value="">----Pilih----</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA/K">SMA/K</option>
                <option value="D1">D1</option>
                <option value="D2">D2</option>
                <option value="D3">D3</option>
                <option value="D4">D4</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Jurusan</label>
              <input type="text" class="form-control" name="jurusan">
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
              <input type="text" class="form-control" name="hp" required>
            </div>
            <div class="form-group col-md-4">
              <label>email</label>
              <input type="email" class="form-control" name="email">
            </div>
          </div>
        </div>
      </div>
      <div class="card bg-light mb-3" style="margin: 7px">
        <div class="card-header">Data Pelengkap</div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Pangkat/Golongan <span style="color: red">*</span></label>
              <select class="form-control" name="pangkat" required>
                <option value="">----Pilih----</option>
                <option>Juru Muda (I/A)</option>
                <option>Juru Muda Tingkat I (I/B)</option>
                <option>Juru (I/C)</option>
                <option>Juru Tingkat I (I/D)</option>
                <option>Pengatur Muda (II/A)</option>
                <option>Pengatur Muda Tingkat I (II/B)</option>
                <option>Pengatur (II/C)</option>
                <option>Pengatur Tingkat I (II/D)</option>
                <option>Penata Muda (III/A)</option>
                <option>Penata Muda Tingkat I (III/B)</option>
                <option>Penata (III/C)</option>
                <option>Penata Tingkat I (III/D)</option>
                <option>Pembina (IV/A)</option>
                <option>Pembina Tingkat I (IV/B)</option>
                <option>Pembina Utama Muda (IV/C)</option>
                <option>Pembina Utama Madya (IV/D)</option>
                <option>Pembina Utama (IV/E)</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Unit Kerja <span style="color: red">*</span></label>
              <select id="unit" class="form-control" name="unit_master" required>
                <option value="">----Pilih----</option>
                <?php
                foreach ($unit as $key) 
                {
                  echo '<option value="'.$key['id_unit'].'" >'.$key['nama_unit'].'</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Sub Unit Kerja</label>
              <select class="sub form-control" name="sub_unit_master">
                <option value="">----Pilih----</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Jabatan <span style="color: red">*</span></label>
              <select class="form-control" name="jabatan" required>
                <option value="">----Pilih----</option>
                <option value="umum">Fungsional Umum</option>
                <option value="khusus">Fungsional Khusus</option>
                <option value="struktural">Struktural</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Bagian <span style="color: red">*</span></label>
              <input type="text" class="form-control" name="bagian" required>
            </div>
            <div class="form-group col-md-4">
              <label>Tanggal Mulai Kerja</label>
              <input type="date" class="form-control" name="tgl_kerja">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Usia Pensiun </label>
              <input type="text" class="form-control" name="pensiun" value="58"> 
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


