</div>

<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span style="line-height: 1.5; font-size: 15px;">Copyright &copy; <?php echo site_name ?> <?= Date('Y') ?><br>Sistem Informasi Kepegawaian</span>
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
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>
<script src="<?php echo base_url('assets/chart.js/Chart.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.min.js"></script>

<?php
if ($this->uri->segment('1') == 'kompetensi' || $this->uri->segment('1') == 'subunit' || $this->uri->segment('1') == 'unit' || $this->uri->segment('1') == 'listpegawai' && $this->uri->segment('2') != 'edit_pegawai'){
	?>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url('assets/js/demo/datatables-demo.js');?>"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('table.display').DataTable();
		});
	</script>
<?php } ?>


<?php
if ($this->uri->segment('1') == 'addpegawai' || $this->uri->segment('2') == 'edit_pegawai'){
	?>
	<script src="<?php echo base_url('assets/jquery/jquery.js'); ?>"></script>
	<!--load jquery ui js file-->
	<script src="<?php echo base_url('assets/jquery-ui-1.12.1/jquery-ui.js'); ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
		$(function() {
			$("#datepicker").datepicker({
				dateFormat: 'yy-mm-dd'
			});

		});
		$(function() {
			$("#datepicker2").datepicker({
				dateFormat: 'yy-mm-dd'
			});

		});
	</script>
<?php } ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#unit').change(function(){
			var id=$(this).val();
			$.ajax({
				url : "<?php echo site_url('listpegawai/get_sub_unit');?>",
				method : "POST",
				data : {id: id},
				async : false,
				dataType : 'json',
				success: function(data){
					var html = '';
					var i;
					html = '<option>----Pilih----</option>';
					for(i=0; i<data.length; i++){
						html += '<option value="'+data[i].id_sub_unit+'">'+data[i].keterangan+'</option>';
					}
					$('.sub').html(html);

				}
			});
		});
	});
</script>
<script type="text/javascript">
	$("input").on("change", function() {
		this.setAttribute(
			"data-date",
			moment(this.value, "YYYY-MM-DD")
			.format( this.getAttribute("data-date-format") )
			)
	}).trigger("change")
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datepicker.js'); ?>"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('.tanggal').datepicker({
			format: "yyyy-mm-dd",
			autoclose:true,
			todayHighlight:true
		});
	});
</script>

<?php 
if ($this->uri->segment('1') == 'home'){
	$this->load->view("admin/includes/chart");
}
?>

</body>

</html>
