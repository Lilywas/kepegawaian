<!-- Begin Page Content -->
<div class="container-fluid">
  <h2 class="h3 mb-2 text-gray-800 text-center">Daftar Unit Kerja</strong></h2>
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
          <button data-toggle="modal" data-target="#add_unit" class="btn btn-success">Tambah Unit Kerja</button><br><br>
          <table class="display table table-bordered" id="" width="100%" cellspacing="0">
            <thead style="text-align: center;">
              <tr>
                <th>No</th>
                <th>Nama Unit Kerja</th>
                <th></th> <!-- edit -->
                <th></th> <!-- hapus -->
              </tr>
            </thead>
            <tbody>
              <?php
              $nomor = 0;
              foreach ($unit as $item) {
                $nomor++; ?>
                <tr>
                  <td style="text-align: center;"><?= filter_var($nomor, FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></td>
                  <td><?= filter_var($item['nama_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></td>
                  <td style="vertical-align: middle; text-align: center;">
                    <!-- Tombol Edit -->
                    <button data-toggle="modal" data-target="#edit_unit<?= filter_var($item['id_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" class="btn btn-warning"><i class="far fa-fw fa-edit" title="Edit Unit kerja"></i></button>
                  </td>
                  <td style="vertical-align: middle; text-align: center;">
                    <!-- Tombol Ubah Status -->
                    <button onclick="hapus_unit(<?= filter_var($item['id_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>)" value="<?= filter_var($item['id_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" data-toggle="modal" data-target="#hapusUnit" class="btn btn-danger" title="Hapus Unit Kerja"><i class="far fa-fw fa-trash-alt"></i></button>
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

<!-- MODAL TAMBAH UNIT KERJA -->
<div class="modal fade" id="add_unit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Unit Kerja</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <form role="form" enctype="multipart/form-data" action="<?= filter_var(site_url('Unit/addunit/'), FILTER_SANITIZE_URL); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Unit Kerja <span style="color: red">*wajib diisi</span></label>
            <input type="text" name="unit" class="form-control" required>
          </div>
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


<!-- MODAL UBAH UNIT -->
<?php
foreach ($unit as $item) {
?>
  <div class="modal fade" id="edit_unit<?= filter_var($item['id_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Unit Kerja</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <form role="form" enctype="multipart/form-data" action="<?= filter_var(site_url('Unit/editunit/'), FILTER_SANITIZE_URL); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label>Unit Kerja <span style="color: red">*wajib diisi</span></label>
              <input type="text" name="unit" class="form-control" value="<?= filter_var($item['nama_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" required>
            </div>
            <input hidden type="text" name="id_unit" value="<?= filter_var($item['id_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>">
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


<!-- MODAL HAPUS UNIT -->
<div class="modal fade" id="hapusUnit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <form role="form" enctype="multipart/form-data" action="<?= filter_var(site_url('Unit/delete_unit/'), FILTER_SANITIZE_URL); ?>" method="POST">
        <div class="modal-body">
          <p>Data sub unit kerja yang berada di bawah unit kerja ini akan ikut terhapus dan tidak bisa dikembalikan. Anda yakin ingin menghapus data unit kerja ini ?</p>
          <input hidden id="id_unit" type="text" name="id_unit" value="">
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
  function hapus_unit(id_unit) {
    var data_id = document.getElementById('id_unit');
    data_id.value = id_unit;
  }
</script>