<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-file-text"></i>
                        <span class="caption-subject bold uppercase"> Menu Level 1</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php foreach($getUser as $set): ?>
                        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Level1/saveupdate') ?>">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Menu ID</label>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" id="MenuID" name="MenuID" value="<?php echo $set->MenuID?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Menu Name</label>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" id="MenuName" name="MenuName" value="<?php echo $set->MenuName?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Menu Label</label>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" id="MenuLabel" name="MenuLabel" value="<?php echo $set->MenuLabel?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Menu Icon</label>
                                            <div class="col-lg-5">
                                                <textarea class="form-control" rows="2" id="MenuIcon" name="MenuIcon" value=""><?php echo $set->MenuIcon ?></textarea>
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