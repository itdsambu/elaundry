<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-file-text"></i>
                        <span class="caption-subject bold uppercase"> Suplier</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Suplier/save') ?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Kode</label>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" id="txtkode" name="txtkode" placeholder="Input Kode" value="<?php echo 'SUP - '.$kode.'/RSUP-IND'.'/'.date('d-M-Y');?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nama Suplier</label>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" id="txtnamasuplier" name="txtnamasuplier" placeholder="Input Nama Suplier">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Np. Hendphone</label>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" id="txtno_hp" name="txtno_hp" placeholder="Input No.Hendphone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">No.Telphone</label>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" id="txtnotlpn" name="txtnotlpn" placeholder="Input No.Telphone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Alamat</label>
                                        <div class="col-lg-5">
                                            <textarea type="text" class="form-control" id="txtalamat" name="txtalamat" placeholder="Input Alamat"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">InActive</label>
                                        <div class="col-lg-5">
                                            <select type="text" class="form-control" id="txtinactive" name="txtinactive" placeholder="Input InActive">
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