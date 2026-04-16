<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>

<table class="table table-bordered table-hover" id="dataTables-perbandinganHarga">
  <thead>
      <tr>
        <th class="text-center">Nama Item</th>
        <th class="text-center">Nama Suplier</th>
        <th class="text-center">Satuan</th>
        <th class="text-center">Harga (Rp.)</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach($getMstHarga as $get){?>
    <tr>
      <td class="text-center"><?php echo $get->nama_item?></td>
      <td class="text-center"><?php echo $get->nama_suplier?></td>
      <td class="text-center"><?php echo $get->abbr ?></td>
      <td class="text-center">Rp.<?php echo number_format($get->harga) ?></td>
    </tr>
  <?php }?>
  </tbody>
</table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTables-perbandinganHarga').dataTable();
    });
</script>