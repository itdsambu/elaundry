<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-ship"></i>
                        <span class="caption-subject bold uppercase"> Tambah dan Edit Item</span>
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
                                            <input type="hidden" readonly="readonly" name="Id_Item" class="form-control" value="<?php echo $Id_Item ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nama Item</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="NamaItem" class="form-control" value="<?php echo $NamaItem ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Singkatan</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="singkatan" class="form-control" value="<?php echo $singkatan ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nama Kategory</label>
                                        <div class="col-lg-4">
                                            <select name="Id_Kategory" class="form-control">
                                                <option value="">-Pilih-</option>
                                                <?php foreach ($list_kategory as $kategory) { ?>
                                                    <option value="<?= $kategory->Id_Kategory ?>" <?php if ($kategory->Id_Kategory == $Id_Kategory) {
                                                                                                        echo 'selected';
                                                                                                    } ?>><?= $kategory->NamaKategory ?></option>
                                                <?php } ?>
                                            </select>
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