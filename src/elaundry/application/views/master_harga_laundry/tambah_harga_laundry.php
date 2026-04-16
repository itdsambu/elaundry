<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-ship"></i>
                        <span class="caption-subject bold uppercase"> Tambah dan Edit Harga</span>
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
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label"></label>
                                        <div class="col-lg-4">
                                            <input type="hidden" readonly="readonly" name="IDLayanan" class="form-control" value="<?php echo $IDLayanan ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Jenis Layanan</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="JenisLayanan" class="form-control" value="<?php echo $JenisLayanan ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Biaya</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="Biaya" class="form-control" pattern="[0-9]*" value="<?php echo $Biaya ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Status</label>
                                        <div class="col-lg-4">
                                            <select name="NotActive" class="form-control">
                                                <option value="1" <?php if ($NotActive == 1) {
                                                                        echo 'selected';
                                                                    } ?>>Not Active</option>
                                                <option value="0" <?php if ($NotActive == 0) {
                                                                        echo 'selected';
                                                                    } ?>>Active</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Kilat</label>
                                        <div class="col-lg-4">
                                            <select name="is_kilat" class="form-control">
                                                <option value="0" <?php if ($is_kilat == 0) {
                                                                        echo 'selected';
                                                                    } ?>>Tidak</option>
                                                <option value="1" <?php if ($is_kilat == 1) {
                                                                        echo 'selected';
                                                                    } ?>>Ya</option>
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