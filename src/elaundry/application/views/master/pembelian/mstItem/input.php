<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-file-text"></i>
                        <span class="caption-subject bold uppercase"> Item</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Item/save') ?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Kode Item</label>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" id="txtkode" name="txtkode" placeholder="Input Kode" value="<?php echo $kode.'/'.'Item'.'/'.'RSUP-IND'.'/'.date('m-Y') ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nama Item</label>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" id="txtnamaitem" name="txtnamaitem" placeholder="Input Nama Item">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Satuan</label>
                                        <div class="col-lg-5">
                                            <select type="text" class="form-control" id="txtsatuan" name="txtsatuan" placeholder="Input Satuan">
                                                <option value="">--Pilih--</option>
                                                <?php foreach($getMstSatuan as $stn){?>
                                                    <option value="<?php echo $stn->SatuanID?>"><?php echo $stn->Abbr?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Kategori</label>
                                        <div class="col-lg-5">
                                            <select type="text" class="form-control" id="txtkategori" name="txtkategori" placeholder="Input Kategori">
                                                <option value="">--Pilih--</option>
                                                <?php foreach($getMstKategori as $ktg){?>
                                                    <option value="<?php echo $ktg->KategoriID?>"><?php echo $ktg->Kategori?></option>
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
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>