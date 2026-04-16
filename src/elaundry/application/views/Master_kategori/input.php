<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase"> Tambah Suplier</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('Master_kategori/simpanData')?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-lg-1 control-label">Kategori</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="txtNamaKategori" id="kategori" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-1 control-label">Status</label>
                                        <div class="col-lg-3">
                                           <div class="mt-radio-inline">
                                                <label class="mt-radio">
                                                    <input type="radio" name="txtStatus" id="status" value="1" checked> Aktif
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="txtStatus" id="status" value="0"> Not Aktif
                                                    <span></span>
                                                </label>
                                            </div>
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