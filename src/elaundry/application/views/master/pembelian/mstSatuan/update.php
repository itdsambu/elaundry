<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-file-text"></i>
                        <span class="caption-subject bold uppercase"> Satuan</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php foreach($getData as $set): ?>
                        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Satuan/saveupdate') ?>">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Nama Satuan</label>
                                            <div class="col-lg-5">
                                                <input type="hidden" name="txtsatuanid" id="txtsatuanid" class="form-control" value="<?php echo $set->SatuanID?>">
                                                <input type="text" class="form-control" id="txtnamasatuan" name="txtnamasatuan" placeholder="Input Satuan" value="<?php echo $set->Satuan?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Abbr</label>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" id="txtabbr" name="txtabbr" placeholder="Input Abbr" value="<?php echo $set->Abbr?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">InActive</label>
                                            <div class="col-lg-5">
                                                <select type="text" class="form-control" id="txtinactive" name="txtinactive" placeholder="Input Inactive">
                                                    <?php if($set->InActive == 1){?>
                                                        <option value="1" selected="">Aktif</option>
                                                        <option value="0">Tidak aktif</option>
                                                    <?php }else{?>
                                                        <option value="1">Aktif</option>
                                                        <option value="0" selected="">Tidak aktif</option>
                                                    <?php }?>
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
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>