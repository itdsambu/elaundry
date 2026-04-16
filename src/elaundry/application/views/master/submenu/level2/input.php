<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-file-text"></i>
                        <span class="caption-subject bold uppercase"> Menu Level 2</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Level2/save') ?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Menu Header</label>
                                        <div class="col-lg-5">
                                            <select class="form-control select2" id="MenuHeader" name="MenuHeader">
                                                <option>Pilih</option>
                                                <?php foreach($getMenu1 as $set){
                                                    echo "<option value=".$set->MenuID.">".$set->MenuID." - ".$set->MenuLabel."</option>";
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Menu ID</label>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" id="MenuID" name="MenuID">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Menu Name</label>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" id="MenuName" name="MenuName">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Menu Label</label>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" id="MenuLabel" name="MenuLabel">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Menu Icon</label>
                                        <div class="col-lg-5">
                                            <textarea class="form-control" rows="2" id="MenuIcon" name="MenuIcon"><i class="fa fa-angle-double-right"></i></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Menu Link</label>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" id="MenuLabel" name="MenuLink">
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