<label class="col-lg-3 control-label">Tinta</label>
<div class="col-lg-9">
    <select type="text" class="form-control" id="txttinta" name="txttinta">
    	<option value="">--Pilih--</option>
        <?php foreach($tinta as $get){?>
        <option value="<?php echo $get->TintaID?>"><?php echo $get->Merek_tinta?></option>
        <?php }?>
    </select>
</div>

<script type="text/javascript">
	
</script>