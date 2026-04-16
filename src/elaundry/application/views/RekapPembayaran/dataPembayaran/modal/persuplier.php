<div class="row">
	<div class="col-lg-12">
                <tr>
                	<?php foreach ($getSuplier as $gs){ ?>
                    <th>SUPLIER : <?php echo $gs->nama_suplier ?></th>
                <?php } ?>
                </tr>
                <br>
                <tr>
                    <th>PERIODE : <?php echo date('d-M-Y',strtotime($tglAwal))?>  s/d  <?php echo date('d-M-Y',strtotime($tglAkhir))?> </th>
                    <th class="text" type ="hidden" value="<?php echo $suplierid?>"></th>
                </tr><br>
		<table class="table table-hover table-bordered" id="table">
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">Nama Item</th>
					<th class="text-center">Quantity</th>
					<th class="text-center">Satuan</th>
					<th class="text-center">Total</th>
					<th class="text-center">Keterangan</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no=1;
				foreach($getData as $get){?>
				<tr>
					<td class="text-center"><?php echo $no++;?></td>
					<td class="text-left"><?php echo $get->nama_item?></td>
					<td class="text-center"><?php echo $get->Quantity?></td>
					<td class="text-center"><?php echo $get->abbr?></td>
					<td class="text-right">Rp.<?php echo number_format($get->Total)?></td>
					<td class="text-right"><?php echo $get->Keterangan?></td>
				</tr>
				<?php }?>
			</tbody>
			<tfoot>
				<?php foreach($getTotal as $row){?>
				<tr>
					<td colspan="4" class="text-right">Grand Total</td>
					<td class="text-right">Rp.<?php echo number_format($row->GrandTotal);?></td>
				</tr>
				<?php }?>
			</tfoot>
		</table>
<div class="modal-footer">
    <a target="blank" href="<?php echo base_url('RekapPembayaran/ExportPdfModalSuplier/'.$suplierid.'/'.$tglAwal.'/'.$tglAkhir);?>" class="btn blue">
        <i class="icon-printer"></i>
        Export PDF
    </a>
</div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').dataTable({
    } );
</script>