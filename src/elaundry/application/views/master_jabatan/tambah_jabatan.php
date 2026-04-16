<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase"> Tambah dan Edit Jabatan</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo $action ?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="hidden" readonly="readonly" name="id_jab" class="form-control" value="<?php echo $idjab?>">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nama Jabatan</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="nama_jab" class="form-control" value="<?php echo $nmajab?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Singkatan Jab</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="singk_jab" class="form-control" value="<?php echo $singkjab ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Status</label>
                                            <div class="col-lg-4">
                                                <select name="status" class="form-control">
                                                    <option value="1" <?php if($status == 1){echo "selected";} ?> >Aktif</option>
                                                    <option value="0" <?php if($status == 0){echo "selected";}?> >Non Aktif</option>
                                                </select>
                                            </div>
                                    </div>
                                </div>
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