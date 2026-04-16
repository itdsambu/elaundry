<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-file-text"></i>
                        <span class="caption-subject bold uppercase"> Departemen</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php foreach($getData as $set): ?>
                        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Departemen/saveupdate') ?>">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        </div>
                                        <div class="form-group">
                                           <label class="col-lg-2 control-label">Abbr</label>
                                            <div class="col-lg-5">
                                                <input type="hidden" class="form-control" id="txtdeptid" name="txtdeptid" value="<?php echo $set->DeptID?>">
                                                <input type="text" class="form-control" id="txtabbr" name="txtabbr" value="<?php echo $set->Abbr?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Deprtemen</label>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" id="txtnama" name="txtnama" value="<?php echo $set->Nama?>">
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