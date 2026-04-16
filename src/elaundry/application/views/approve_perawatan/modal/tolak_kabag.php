<div class="row">
    <div class="col-xs-12">
        <form id="formRegistrasi" class="form-horizontal" action="<?php echo base_url('Approval/tolakKabag');?>" method="POST">
           	<div class="widget-main">
           		 <input type="hidden" name="txtID" class="col-sm-3 control-label no-padding-right" value="<?php echo $id?>">
                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea class="col-xs-12 col-sm-11" id="inputKeterangan" name="txtInputKeterangan" placeholder="Input Keterangan"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-8 col-md-9">
                        <button class="btn btn-sm btn-round btn-primary" type="submit">
                            Submit
                        </button>
                        <button class="btn btn-sm btn-round btn-danger" type="reset">
                            <i class="ace-icon fa fa-undo"></i>
                            Reset
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
