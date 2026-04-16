<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase"> Edit Inventaris</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('Inventory/updateData')?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php foreach($getData as $get){?>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Nama Item</label>
                                                <div class="col-lg-4">
                                                    <input type="hidden" name="txtinventoryid" id="txtinventoryid" class="form-control" value="<?php echo $get->InventoryID?>">
                                                    <input type="text" name="txtnamaitem" id="txtnamaitem" class="form-control" placeholder="Input Nama Item" value="<?php echo $get->Nama_item?>">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">InActive</label>
                                                <div class="col-lg-4">
                                                    <select name="txtinactive" class="form-control">
                                                        <?php if($get->InActive == 1){?>
                                                            <option value="1" selected="">Aktif</option>
                                                            <option value="0">Tidak Aktif</option>
                                                        <?php }else{?>
                                                            <option value="1">Aktif</option>
                                                            <option value="0" selected="">Tidak Aktif</option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                        </div>
                                    </div>
                                    <?php }?>
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