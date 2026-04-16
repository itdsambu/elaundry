<div class="row">
	<div class="col-lg-12">
		<table class="table table-hover table-bordered" id="table">
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">Suplier</th>
					<th class="text-center">Quantity (Belanja)</th>
					<th class="text-center">Total</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no=1;
				foreach($getData as $get){?>
				<tr>
					<td class="text-center"><?php echo $no++;?></td>
					<td class="text-left"><?php echo $get->nama_suplier?></td>
					<td class="text-center"><?php echo $get->Quantity?></td>
					<td class="text-right">Rp.<?php echo number_format($get->Total)?></td>
				</tr>
				<?php }?>
			</tbody>
			<tfoot>
				<?php foreach($getTotal as $row){?>
					<tr>
						<td colspan="2" class="text-right">Grand Total</td>
						<td class="text-center"><?php echo $row->TotalQuantity?></td>
						<td class="text-right">Rp.<?php echo number_format($row->GrandTotal)?></td>
					</tr>
				<?php }?>
			</tfoot>
		</table>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').dataTable({
    } );
</script>