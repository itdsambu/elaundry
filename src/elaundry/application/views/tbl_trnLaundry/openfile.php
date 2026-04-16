<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover table-header-fixed">
		<?php if ($link_upload != '') {
			// echo  base_url() . $link_upload . $id;
			// die; 
		?>
			<tr>
				<td class="text-center"><img src="<?php echo base_url() ?><?php echo $link_upload . $id ?>.jpg" height="500px" width="450px" alt="Maaf File Tidak Ada ..!!"></td>
			</tr>
		<?php } else { ?>
			<tr>
				<td class="text-center"><b>Foto Tidak ada</b></td>
			</tr>
		<?php } ?>
	</table>
</div>