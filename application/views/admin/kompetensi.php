<!-- Begin Page Content -->
<div class="container-fluid">
  <h2 class="h3 mb-2 text-gray-800 text-center">Kompetensi Bidang <strong><?= filter_var($pegawai['nama'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></strong></h2>
  <hr>
  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="card col-lg-12 shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <?php
          if ($this->session->flashdata('msg_berhasil')) { ?>
            <div class="alert alert-success" role="alert"><?= filter_var($this->session->flashdata('msg_berhasil'), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>
          <?php }
          if ($this->session->flashdata('msg_gagal')) { ?>
            <div class="alert alert-success" role="alert"><?= filter_var($this->session->flashdata('msg_gagal'), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>
          <?php }
          ?>
          <button onclick="get_id(<?= filter_var($pegawai['id_pegawai'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>)" value="<?= filter_var($pegawai['id_pegawai'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" data-toggle="modal" data-target="#add_komp" class="btn btn-success">Tambah Kompetensi Bidang</button><br><br>
          <table class="display table table-bordered" id="" width="100%" cellspacing="0">
            <thead style="text-align: center;">
              <tr>
                <th>No</th>
                <th>Kompetensi Bidang</th>
                <th>Keterangan</th>
                <th></th> <!-- edit -->
                <th></th> <!-- hapus -->
              </tr>
            </thead>
            <tbody>
              <?php
              $nomor = 0;
              foreach ($dataKom as $item) {
                $nomor++; ?>
                <tr>
                  <td style="text-align: center;"><?= filter_var($nomor, FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></td>
                  <td><?= filter_var($item['kompetensi'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></td>
                  <td><?= filter_var($item['keterangan'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></td>
                  <td style="vertical-align: middle; text-align: center;">
                    <!-- Tombol Edit -->
                    <button data-toggle="modal" data-target="#edit_komp<?= filter_var($item['id_kompetensi'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" class="btn btn-warning"><i class="far fa-fw fa-edit"></i> Edit</button>
                  </td>
                  <td style="vertical-align: middle; text-align: center;">
                    <!-- Tombol Hapus -->
                    <button onclick="hapus_kompetensi(<?= filter_var($item['id_kompetensi'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>)" value="<?= filter_var($item['id_kompetensi'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" data-toggle="modal" data-target="#hapusKomp" class="btn btn-danger"><i class="far fa-fw fa-trash-alt"></i> Hapus</button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- -------------------- RIWAYAT UNIT KERJA ---------------------------------------------------------------------->
  <h2 class="h3 mb-2 text-gray-800 text-center">Riwayat Unit Kerja <strong><?= filter_var($pegawai['nama'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></strong></h2>
  <hr>
  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="card col-lg-12 shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <?php
          if ($this->session->flashdata('msg_riwayat_berhasil')) { ?>
            <div class="alert alert-success" role="alert"><?= filter_var($this->session->flashdata('msg_riwayat_berhasil'), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>
          <?php }
          if ($this->session->flashdata('msg_riwayat_gagal')) { ?>
            <div class="alert alert-success" role="alert"><?= filter_var($this->session->flashdata('msg_riwayat_gagal'), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>
          <?php }
          ?>
          <button onclick="get_riwayat_id(<?= filter_var($pegawai['id_pegawai'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>)" value="<?= filter_var($pegawai['id_pegawai'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" data-toggle="modal" data-target="#add_riwayat" class="btn btn-success">Tambah Riwayat Unit Kerja</button><br><br>
          <table class="display table table-bordered" id="" width="100%" cellspacing="0">
            <thead style="text-align: center;">
              <tr>
                <th>No</th>
                <th>Unit Kerja</th>
                <th>Sub Unit Kerja</th>
                <th>Tanggal Mulai Kerja</th>
                <th>Tanggal Selesai Kerja</th>
                <th></th> <!-- edit -->
                <th></th> <!-- hapus -->
              </tr>
            </thead>
            <tbody>
              <?php
              $nomor = 0;
              foreach ($dataRiwayat as $item) {
                $nomor++; ?>
                <tr>
                  <td style="text-align: center;"><?= filter_var($nomor, FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></td>
                  <td><?= filter_var($item['unit_kerja'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></td>
                  <td><?= filter_var($item['sub_unit_kerja'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></td>
                  <td><?= filter_var($item['tanggal_mulai'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></td>
                  <td><?= filter_var($item['tanggal_selesai'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></td>
                  <td style="vertical-align: middle; text-align: center;">
                    <!-- Tombol Edit -->
                    <button data-toggle="modal" data-target="#edit_riwayat<?= filter_var($item['id_riwayat_unit_kerja'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" class="btn btn-warning"><i class="far fa-fw fa-edit"></i> Edit</button>
                  </td>
                  <td style="vertical-align: middle; text-align: center;">
                    <!-- Tombol Hapus -->
                    <button onclick="hapus_riwayat(<?= filter_var($item['id_riwayat_unit_kerja'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>)" value="<?= filter_var($item['id_riwayat_unit_kerja'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" data-toggle="modal" data-target="#hapusRiwayat" class="btn btn-danger"><i class="far fa-fw fa-trash-alt"></i> Hapus</button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- /.container-fluid -->


<!------------------------------------------------------------------------------------------------------------------------------------>
<!-- MODAL TAMBAH KOMPETENSI --------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="add_komp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kompetensi Bidang</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <form role="form" enctype="multipart/form-data" action="<?= filter_var(site_url('Kompetensi/addkomp/'), FILTER_SANITIZE_URL); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Kompetensi Bidang</label>
            <select class="form-control" name="komp" required>
              <option value="">----Pilih------</option>
              <option>Sertifikat TOC</option>
              <option>Sertifikat MOT</option>
              <option>Kompetensi IT</option>
              <option>Lainnya</option>
            </select>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" class="form-control" name="ket">
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

<!------------------------------------------------------------------------------------------------------------------------------------------->
<!-- MODAL TAMBAH RIWAYAT UNIT KERJA -------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="add_riwayat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Riwayat Unit Kerja</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <form role="form" enctype="multipart/form-data" action="<?= filter_var(site_url('Kompetensi/addriwayat/'), FILTER_SANITIZE_URL); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Unit Kerja<span style="color: red">*</span></label>
            <input type="text" name="unit" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Sub Unit Kerja<span style="color: red">*</span></label>
            <input type="text" name="sub_unit" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Tanggal Mulai Kerja</label>
            <input type="text" class="tanggal form-control" name="tgl_mulai" placeholder="yyyy-mm-dd">
          </div>
          <div class="form-group">
            <label>Tanggal Selesai Kerja</label>
            <input type="text" class="tanggal form-control" name="tgl_selesai" placeholder="yyyy-mm-dd">
          </div>
          <input hidden id="id_pegawai2" type="text" name="id_pegawai" value="">
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

<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!-- MODAL UBAH KOMPETENSI ------------------------------------------------------------------------------------------------------------------->
<?php
foreach ($dataKom as $item) {
?>
  <div class="modal fade" id="edit_komp<?= filter_var($item['id_kompetensi'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Kompetensi Bidang</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <form role="form" enctype="multipart/form-data" action="<?= filter_var(site_url('Kompetensi/editkomp/'), FILTER_SANITIZE_URL); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <?php
              $kompetensi = array(
                'Sertifikat TOC' => 'Sertifikat TOC',
                'Sertifikat MOT' => 'Sertifikat MOT',
                'Kompetensi IT' => 'Kompetensi IT',
                'Lainnya' => 'Lainnya'
              );
              ?>
              <label>Kompetensi Bidang</label>
              <select class="form-control" name="komp" required>
                <option value="">----Pilih------</option>
                <?php
                foreach ($kompetensi as $key => $jenis) {
                  $kmp = $item['kompetensi'];
                  if ($key == $kmp) { ?>
                    <option selected><?= filter_var($jenis, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></option>
                  <?php } else { ?>
                    <option><?= filter_var($jenis, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></option>
                <?php }
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" class="form-control" name="ket" value="<?= filter_var($item['keterangan'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>">
            </div>
            <input hidden type="text" name="id_pegawai" value="<?= filter_var($item['id_pegawai'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>">
            <input hidden type="text" name="id_kompetensi" value="<?= filter_var($item['id_kompetensi'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>">
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
<?php } ?>

<!------------------------------------------------------------------------------------------------------------------------------------------>
<!-- MODAL EDIT RIWAYAT UNIT KERJA --------------------------------------------------------------------------------------------------------->
<?php
foreach ($dataRiwayat as $item) {
?>
  <div class="modal fade" id="edit_riwayat<?= filter_var($item['id_riwayat_unit_kerja'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Riwayat Unit Kerja</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <form role="form" enctype="multipart/form-data" action="<?= filter_var(site_url('Kompetensi/editriwayat/'), FILTER_SANITIZE_URL); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label>Unit Kerja<span style="color: red">*</span></label>
              <input type="text" name="unit" class="form-control" value="<?= filter_var($item['unit_kerja'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" required>
            </div>
            <div class="form-group">
              <label>Sub Unit Kerja<span style="color: red">*</span></label>
              <input type="text" class="form-control" name="sub_unit" value="<?= filter_var($item['sub_unit_kerja'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>">
            </div>
            <div class="form-group">
              <label>Tanggal Mulai Kerja</label>
              <input type="text" class="tanggal form-control" name="tgl_mulai" placeholder="yyyy-mm-dd" value="<?= filter_var($item['tanggal_mulai'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>">
            </div>
            <div class="form-group">
              <label>Tanggal Selesai Kerja</label>
              <input type="text" class="tanggal form-control" name="tgl_selesai" placeholder="yyyy-mm-dd" value="<?= filter_var($item['tanggal_selesai'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>">
            </div>
            <input hidden type="text" name="id_pegawai" value="<?= filter_var($item['id_pegawai'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>">
            <input hidden type="text" name="id_riwayat_unit_kerja" value="<?= filter_var($item['id_riwayat_unit_kerja'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>">
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
<?php } ?>

<!------------------------------------------------------------------------------------------------------------------------------------->
<!-- MODAL HAPUS KOMPETENSI ----------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="hapusKomp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <form role="form" enctype="multipart/form-data" action="<?= filter_var(site_url('Kompetensi/delete_komp/'), FILTER_SANITIZE_URL); ?>" method="POST">
        <div class="modal-body">
          <p>Anda yakin ingin menghapus data kompetensi bidang ?</p>
          <input hidden id="id_hapus_komp" type="text" name="id_kompetensi" value="">
        </div>

        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
          <button type="submit" value="1" name="simpan" class="btn btn-danger"> Hapus
          </button>
        </div>

      </form>
    </div>
  </div>
</div>

<!------------------------------------------------------------------------------------------------------------------------------------------->
<!-- MODAL HAPUS RIWAYAT UNIT KERJA --------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="hapusRiwayat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <form role="form" enctype="multipart/form-data" action="<?= filter_var(site_url('Kompetensi/delete_riwayat/', FILTER_SANITIZE_URL)); ?>" method="POST">
        <div class="modal-body">
          <p>Anda yakin ingin menghapus data riwayat unit kerja ?</p>
          <input hidden id="id_hapus_riwayat" type="text" name="id_riwayat" value="">
        </div>

        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
          <button type="submit" value="1" name="simpan" class="btn btn-danger"> Hapus
          </button>
        </div>

      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function get_id(id_pegawai) {
    var data_id = document.getElementById('id_pegawai');
    var klik = 1;
    data_id.value = id_pegawai;
  }
</script>
<script type="text/javascript">
  function get_riwayat_id(id_pegawai) {
    var data_id = document.getElementById('id_pegawai2');
    var klik = 1;
    data_id.value = id_pegawai;
  }
</script>
<script type="text/javascript">
  function hapus_kompetensi(id_kompetensi) {
    var data_id = document.getElementById('id_hapus_komp');
    data_id.value = id_kompetensi;
  }

  function hapus_riwayat(id_riwayat_unit_kerja) {
    var data_id = document.getElementById('id_hapus_riwayat');
    data_id.value = id_riwayat_unit_kerja;
  }
</script>