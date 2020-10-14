
<!-- Begin Page Content -->
<div class="container-fluid">

  <div>
    <h4 class="font-weight-bold text-black">Edit Data Pegawai</h4>
  </div>
  <div class="card bg-light">
    <form method="POST" action="<?= site_url('listpegawai/edit_pegawai/'.$dataPegawai['id_pegawai'])?>" enctype="multipart/form-data">
      <input hidden type="text" name="id_pegawai" value="<?php echo $dataPegawai['id_pegawai']; ?>">
      <div class="card bg-light mb-3" style="margin: 7px">
        <div class="card-header">Informasi Umum</div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>NIP </label>
              <input type="text" class="form-control" name="nip" value="<?php echo $dataPegawai['nip'];?>" >
            </div>
            <div class="form-group col-md-4">
              <label>Nama Lengkap </label>
              <input type="text" class="form-control" name="nama" value="<?php echo $dataPegawai['nama'];?>" >
            </div>
            <div class="form-group col-md-4">
              <label>Jenis Kelamin </label>
              <select class="form-control" name="jk" >
                <option value="">----Pilih----</option>
                <?php
                foreach ($jk as $key=>$jenis) 
                {
                  if ($key == $dataPegawai['jk'])
                  {
                    echo '<option value="'.$key.'" selected>'.$jenis.'</option>';
                  }
                  else
                  {
                    echo '<option value="'.$key.'">'.$jenis.'</option>';   
                  }
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Tempat Lahir </label>
              <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $dataPegawai['tempat_lahir'];?>">
            </div>
            <div class="form-group col-md-4">
              <label>Tanggal Lahir </label>
              <?php
              $tgl = $dataPegawai['tgl_lahir'];
              ?>
              <input type="date" data-date="" data-date-format="DD/MM/YYYY" name="tgl_lahir" class="form-control" value="<?= htmlspecialchars($tgl)?>">
            </div>
            <div class="form-group col-md-4">
              <label>Agama </label>
              <select class="form-control" name="agama" >
                <option value="">----Pilih----</option>
                <?php
                foreach ($agama as $key=>$jenis) 
                {
                  if ($key == $dataPegawai['agama'])
                  {
                    echo '<option value="'.$key.'" selected>'.$jenis.'</option>';
                  }
                  else
                  {
                    echo '<option value="'.$key.'">'.$jenis.'</option>';   
                  }
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
              <label>Alamat </label>
              <input type="text" class="form-control" name="alamat" value="<?php echo $dataPegawai['alamat'];?>" >
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Pendidikan Terakhir</label>
              <select class="form-control" name="pend">
                <option value="">----Pilih----</option>
                <?php
                foreach ($pendidikan as $key=>$jenis) 
                {
                  if ($key == $dataPegawai['pend'])
                  {
                    echo '<option value="'.$key.'" selected>'.$jenis.'</option>';
                  }
                  else
                  {
                    echo '<option value="'.$key.'">'.$jenis.'</option>';   
                  }
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Jurusan</label>
              <input type="text" class="form-control" name="jurusan" value="<?php echo $dataPegawai['jurusan']?>">
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
              <input type="text" class="form-control" name="hp" value="<?php echo $dataPegawai['hp']?>" >
            </div>
            <div class="form-group col-md-4">
              <label>email </label>
              <input type="email" class="form-control" name="email" value="<?php echo $dataPegawai['email']?>" >
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
              <select class="form-control" name="pangkat" >
                <option value="">----Pilih----</option>
                <?php
                foreach ($pangkat as $key => $value) {
                  if ($key == $dataPegawai['pangkat']){
                    ?>
                    <option selected=""><?= $value;?></option>
                  <?php }
                  else {
                    ?>
                    <option><?= $value;?></option>
                  <?php }
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Unit Kerja </label>
              <select id="unit" class="form-control" name="unit_master" >
                <option value="">----Pilih----</option>
                <?php
                $unitkerja = $dataPegawai['unit_kerja_pegawai'];
                foreach ($unit as $key) 
                {
                  if ($unitkerja == $key['id_unit']){
                    echo '<option value="'.$key['id_unit'].'" selected>'.$key['nama_unit'].'</option>';
                  }
                  else{
                    echo '<option value="'.$key['id_unit'].'" >'.$key['nama_unit'].'</option>';
                  }
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
                if ($subunit == NULL || $subunit == '0'){
                  foreach ($subnull as $key) {
                    echo '<option value="'.$key['id_sub_unit'].'" >'.$key['keterangan'].'</option>';
                  }
                }
                else{
                  foreach ($sub as $key){
                    if ($subunit == $key['id_sub_unit']){
                      echo '<option value="'.$key['id_sub_unit'].'" selected>'.$key['keterangan'].'</option>';
                    }
                    else{
                      echo '<option value="'.$key['id_sub_unit'].'" >'.$key['keterangan'].'</option>';
                    }
                  }
                }
                ?>  
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Jabatan </label>
              <select class="form-control" name="jabatan" >
                <option value="">----Pilih----</option>
                <?php
                foreach ($jabatan as $key=>$jenis) 
                {
                  if ($key == $dataPegawai['jabatan'])
                  {
                    echo '<option value="'.$key.'" selected>'.$jenis.'</option>';
                  }
                  else
                  {
                    echo '<option value="'.$key.'">'.$jenis.'</option>';   
                  }
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Bagian </label>
              <input type="text" class="form-control" name="bagian" value="<?php echo $dataPegawai['bagian']?>" >
            </div>
            <div class="form-group col-md-4">
              <label>Tanggal Mulai Kerja</label>
              <?php
              $tgl = $dataPegawai['tgl_kerja'];
              ?>
              <input type="date" data-date="" data-date-format="DD/MM/YYYY" name="tgl_kerja" class="form-control" value="<?= htmlspecialchars($tgl)?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Usia Pensiun </label>
              <input type="text" class="form-control" name="pensiun" value="<?= $dataPegawai['pensiun']?>"> 
            </div>
          </div>
        </div>
      </div>
      <button style="margin-bottom: 10px" type="submit" name="simpan" class="btn btn-primary btn-block">
        Simpan Data
      </button>
    </form>
  </div>
  <br>
</div>


