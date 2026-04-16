<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase"> Tambah Item</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('Master_Item/simpanData')?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Kode Item </label>
                                            <div class="col-lg-4">
                                                <input type="text" name="txtkodeitem" id="kodeitem" class="form-control" readonly="" value="<?php echo $hitungKode.'/Item'.'/RSUP-IND'.'/'.date('d-M-Y');?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nama Item</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="txtNamaitem" id="namaitem" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Kategori</label>
                                        <div class="col-lg-4">
                                           <select class="form-control" name="txtKategori" id="kategori">
                                               <option>--Pilih--</option>
                                               <?php foreach($getDataKategori as $row){?>
                                                    <option value="<?php echo $row->kategoriID?>"><?php echo $row->nama_kategori?></option>
                                                <?php }?>
                                           </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Satuan</label>
                                        <div class="col-lg-4">
                                            <select class="form-control" name="txtSatuan" id="satuan">
                                                <option>--Pilih--</option>
                                                <?php foreach($getDataSatuan as $stn){?>
                                                    <option value="<?php echo $stn->satuanID ?>"><?php echo $stn->abbr?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Status</label>
                                        <div class="col-lg-4">
                                            <select class="form-control" name="txtStatus" id="status">
                                                <option value="1">Aktif</option>
                                                <option value="0">Tidak Aktif</option>
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
                                    <a class="btn default" href="javascript:history.back()">
                                        Kembali
                                    </a>
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