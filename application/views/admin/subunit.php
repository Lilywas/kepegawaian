<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- -------------------- SUB UNIT KERJA -------------------- -->
  <h2 class="h3 mb-2 text-gray-800 text-center">Daftar Sub Unit Kerja</strong></h2>
  <hr>
  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="card col-lg-12 shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <?php
          if ($this->session->flashdata('msg_sub_berhasil')) { ?>
            <div class="alert alert-success" role="alert"><?= filter_var($this->session->flashdata('msg_sub_berhasil'), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>
          <?php }
          if ($this->session->flashdata('msg_sub_gagal')) { ?>
            <div class="alert alert-success" role="alert"><?= filter_var($this->session->flashdata('msg_sub_gagal'), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>
          <?php }
          ?>
          <button data-toggle="modal" data-target="#add_subunit" class="btn btn-success">Tambah Sub Unit Kerja</button><br><br>
          <table class="display table table-bordered" id="" width="100%" cellspacing="0">
            <thead style="text-align: center;">
              <tr>
                <th>No</th>
                <th>Unit Kerja</th>
                <th>Sub Unit Kerja</th>
                <th></th> <!-- edit -->
                <th></th> <!-- hapus -->
              </tr>
            </thead>
            <tbody>
              <?php
              $nomor = 0;
              foreach ($sub as $item) {
                $nomor++; ?>
                <tr>
                  <td style="text-align: center;"><?= filter_var($nomor, FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></td>
                  <td><?= filter_var($item['nama_unitkerja'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></td>
                  <td><?= filter_var($item['keterangan'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></td>
                  <td style="vertical-align: middle; text-align: center;">
                    <!-- Tombol Edit -->
                    <button data-toggle="modal" data-target="#edit_sub<?= filter_var($item['id_sub_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" class="btn btn-warning"><i class="far fa-fw fa-edit" title="Edit Sub Unit Kerja"></i></button>
                  </td>
                  <td style="vertical-align: middle; text-align: center;">
                    <!-- Tombol Hapus -->
                    <button onclick="hapus_sub(<?= filter_var($item['id_sub_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>)" value="<?= filter_var($item['id_sub_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" data-toggle="modal" data-target="#hapusSub" class="btn btn-danger" title="Hapus Sub Unit Kerja"><i class="far fa-fw fa-trash-alt"></i></button>
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


<!-- MODAL TAMBAH SUB UNIT -->
<div class="modal fade" id="add_subunit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Sub Unit Kerja</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <form role="form" enctype="multipart/form-data" action="<?= filter_var(site_url('Subunit/addsub/'), FILTER_SANITIZE_URL); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Unit Kerja <span style="color: red">*wajib diisi</span></label>
            <select class="form-control" name="id_unit" required>
              <option value="">----Pilih----</option>
              <?php
              foreach ($unit as $key) { ?>
                <option value="<?= filter_var($key['id_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"><?= filter_var($key['nama_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Nama Sub Unit Kerja <span style="color: red">*wajib diisi</span></label>
            <input type="text" name="sub" class="form-control" required>
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

<!-- MODAL UBAH SUB UNIT -->
<?php
foreach ($sub as $item) {
?>
  <div class="modal fade" id="edit_sub<?= filter_var($item['id_sub_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Sub Unit Kerja</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <form role="form" enctype="multipart/form-data" action="<?= filter_var(site_url('Subunit/editsub/'), FILTER_SANITIZE_URL); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label>Unit Kerja <span style="color: red">*wajib diisi</span></label>
              <select class="form-control" name="id_unit" required>
                <option value="">----Pilih----</option>
                <?php
                foreach ($unit as $key) {
                  $sub = $item['id_unit'];
                  if ($key['id_unit'] == $sub) { ?>
                    <option value="<?= filter_var($key['id_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>" selected><?= filter_var($key['nama_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></option>
                  <?php } else { ?>
                    <option value="<?= filter_var($key['id_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"><?= filter_var($key['nama_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></option>
                <?php }
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Nama Sub Unit Kerja <span style="color: red">*wajib diisi</span></label>
              <input type="text" name="sub" class="form-control" value="<?= filter_var($item['keterangan'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" required>
            </div>
            <input hidden type="text" name="id_sub" value="<?= filter_var($item['id_sub_unit'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>">
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

<!-- MODAL HAPUS SUB UNIT -->
<div class="modal fade" id="hapusSub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <form role="form" enctype="multipart/form-data" action="<?= filter_var(site_url('Subunit/delete_sub/'), FILTER_SANITIZE_URL); ?>" method="POST">
        <div class="modal-body">
          <p>Anda yakin ingin menghapus data sub unit kerja ini ?</p>
          <input hidden id="id_sub" type="text" name="id_sub" value="">
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
  function hapus_sub(id_sub) {
    var data_id = document.getElementById('id_sub');
    data_id.value = id_sub;
  }
</script>