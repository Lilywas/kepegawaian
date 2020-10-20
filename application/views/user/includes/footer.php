</div>


<footer class="sticky-footer" style="background-color: rgba(140, 169, 222, 0.8);">
	<div class="container my-auto">
		<div class="copyright text-center text-md my-auto" style="color: black">
			<span style="line-height: 1.5">Copyright &copy; <?= site_name ?> <?= Date('Y') ?><br>Sistem Informasi Kepegawaian</span>
		</div>
	</div>
</footer>
</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scrolltop -->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- JavaScript -->
<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>

<?php
if ($this->uri->segment('1') == 'pegawai') {
?>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('table.display').DataTable();
		});

		function tampil_riwayat_ajax(id_pegawai) {
			$.ajax({
				url: '<?= site_url('pegawai/detail'); ?>',
				type: 'post',
				data: {
					id_pegawai: id_pegawai
				},
				success: function(response) {
					if (response.sukses) {
						$(".viewmodal")
							.html(response.sukses)
							.show();
						$("#modalKomp").modal("show");
					}
				}
			});
		}
	</script>

<?php } ?>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/chart.js/Chart.min.js') ?>"></script>
<script src="<?= base_url('assets/chart.js/Chart.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

<?php
if ($this->uri->segment('1') == '' || $this->uri->segment('1') == 'home') {
	$this->load->view("admin/includes/chart");
}
?>

</body>

</html>