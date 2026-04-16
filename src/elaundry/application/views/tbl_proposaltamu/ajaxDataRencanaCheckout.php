<div class="form-group">
	<label class="col-lg-2 control-label">Rencana Checkout</label>
	    <div class="col-lg-2">
	        <input type="date" name="txtRencanaCheckout" class="form-control" value="<?php echo date('Y-m-d',strtotime($checkout))?>" readonly>
	    </div>
	    <div class="col-lg-2">
	        <input type="time" name="txtjamcheckout" id="txtjamcheckout" class="form-control">
	    </div>
</div>
