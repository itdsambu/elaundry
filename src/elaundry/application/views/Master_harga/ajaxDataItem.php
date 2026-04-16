<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

<?php if($cekSuplier == NULL){?>
  <table class="table table-bordered table-hover" id="dataTables2">
    <thead>
       <tr>
            <th class="text-center">Nomor</th>
            <th class="text-center">Nama Item</th>
            <th class="text-center">Kategori</th>
            <th class="text-center">Satuan</th>
            <th class="text-center">Harga</th>
            <!-- <th class="text-center">Inactive</th> -->
       </tr>
    </thead>
    <tbody>
      <?php 
      $no=1;
      foreach($dataItem as $itm){?>
      <tr>
        <td class="text-center"><?php echo $no++?></td>
        <td class="text-center">
          <input type="text" name="txtnamaitem[]" id="namaitem" class="form-control" value="<?php   echo $itm->nama_item?>">
          <input type="hidden" name="txtitemid[]" id="itemid" class="form-control" value="<?php echo $itm->itemID?>">
        </td>
        <td class="text-center">
          <input type="text" name="txtkategori[]" id="kategori" class="form-control" value="<?php   echo $itm->nama_kategori?>">
          <input type="hidden" name="txtkategoriid[]" id="kategoriid" class="form-control" value="<?php echo $itm->kategoriID?>">
        </td>
        <td class="text-center">
          <input type="text" name="txtsatuan[]" id="satuan" class="form-control" value="<?php   echo $itm->abbr?>">
          <input type="hidden" name="txtsatuanid[]" id="satuanid" class="form-control" value="<?php echo $itm->satuanID?>">
        </td>
        <td class="text-center">
          <input type="text" name="txtharga[]" id="harga" class="form-control" value="">
        </td>
      </tr>
      <?php }?>
    </tbody>
</table>
<?php }else{ ?>
  <table class="table table-bordered table-hover" id="dataTables2">
    <thead>
       <tr>
            <th class="text-center">Nomor</th>
            <th class="text-center">Nama Item</th>
            <th class="text-center">Kategori</th>
            <th class="text-center">Satuan</th>
            <th class="text-center">Harga</th>
            <!-- <th class="text-center">Inactive</th> -->
       </tr>
    </thead>
    <tbody>
      <?php 
      $no=1;
      foreach($dataItem as $itm){?>
      <tr>
        <td class="text-center"><?php echo $no++?></td>
        <td class="text-center">
          <input type="text" name="txtnamaitem[]" id="namaitem" class="form-control" value="<?php echo $itm->nama_item?>">
          <input type="hidden" name="txtitemid[]" id="itemid" class="form-control" value="<?php echo $itm->itemID?>">
        </td>
        <td class="text-center">
          <input type="text" name="txtkategori[]" id="kategori" class="form-control" value="<?php   echo $itm->nama_kategori?>">
          <input type="hidden" name="txtkategoriid[]" id="kategoriid" class="form-control" value="<?php echo $itm->kategoriID?>">
        </td>
        <td class="text-center">
          <input type="text" name="txtsatuan[]" id="satuan" class="form-control" value="<?php   echo $itm->abbr?>">
          <input type="hidden" name="txtsatuanid[]" id="satuanid" class="form-control" value="<?php echo $itm->satuanID?>">
        </td>
        <td class="text-center">
          <input type="text" name="txtharga[]" id="harga" class="form-control" value="<?php foreach($getData as $get){if($get->itemID == $itm->itemID){echo $get->harga;}} ?>">
          <input type="hidden" name="txtdetailid[]" id="detailid" class="form-control" value="<?php foreach($getData as $get){if($get->itemID == $itm->itemID){echo $get->detailID;}} ?>">
        </td>
      </tr>
      <?php }?>
    </tbody>
</table>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTables2').dataTable();
    });
</script>
<script type="text/javascript">
  $('#harga').number(true,0);
</script>