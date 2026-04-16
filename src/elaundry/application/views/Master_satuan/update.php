<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase"> Edit Satuan</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('Master_suplier/updateData')?>">
                        <div class="form-body">
                            <div class="row">
                                <?php foreach($getData as $get){?>
                                <div class="col-lg-12">
                                <input type="hidden" name="txtsatuanid" id="satuanid" class="form-control" value="<?php echo $get->satuanID?>">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nama Satuan</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="txtnamasatuan" id="amasatuan" class="form-control" autocomplete="off" value="<?php echo $get->nama_satuan?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Singkatan Satuan</label>
                                        <div class="col-lg-4">
                                           <input type="text" name="txtabbrsatuan" id="abbrsatuan" class="form-control" autocomplete="off" value="<?php echo $get->abbr?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Status</label>
                                        <div class="col-lg-4">
                                            <select name="txtStatus" id="status" class="form-control">
                                                <option value="1">Aktif</option>
                                                <option value="0">Non Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn green">Submit</button>
                                    <a class="btn default" href="javascript:history.back()">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>