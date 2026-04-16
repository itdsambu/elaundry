<?php foreach($getData as $hrg){?>
<input type="hidden" name="txtDtlHarga" id="dtlharga" class="form-control" value="<?php echo $hrg->detilID?>">
<input type="text" name="txtHarga[]" id="harga" class="form-control" value="<?php echo number_format($hrg->harga)?>">
<?php }?>