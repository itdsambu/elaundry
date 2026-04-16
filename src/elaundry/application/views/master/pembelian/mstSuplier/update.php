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
                    <?php foreach($getData as $set): ?>
                        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Suplier/saveupdate') ?>">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Kode</label>
                                            <div class="col-lg-5">
                                                <input type="hidden" name="txtsuplierid" id="txtsuplierid" class="form-control" value="<?php echo $set->SuplierID?>">
                                                <input type="text" class="form-control" id="txtkode" name="txtkode" placeholder="Input Kode" value="<?php echo $set->Kode?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Nama Suplier</label>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" id="txtnamasuplier" name="txtnamasuplier" placeholder="Input Nama Suplier" value="<?php echo $set->Nama_suplier?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Np. Hendphone</label>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" id="txtno_hp" name="txtno_hp" placeholder="Input No Hendphone" value="<?php echo $set->No_hp?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">No.Telphone</label>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" id="txtnotlpn" name="txtnotlpn" placeholder="Input No Telphone" value="<?php echo $set->NoTelp?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Alamat</label>
                                            <div class="col-lg-5">
                                                <textarea type="text" class="form-control" id="txtalamat" name="txtalamat" placeholder="Input Alamat"><?php echo $set->Alamat?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">InActive</label>
                                            <div class="col-lg-5">
                                                <select type="text" class="form-control" id="txtinactive" name="txtinactive" placeholder="Input InActive">
                                                    <?php if($set->InActive == 1){?>
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