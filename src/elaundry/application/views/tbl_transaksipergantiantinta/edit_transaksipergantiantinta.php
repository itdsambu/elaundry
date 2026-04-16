<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase">Edit Transaksi Pergantian Tinta</span>
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
                                            <input type="hidden" readonly="readonly" name="idpergantian" class="form-control" value="<?php echo $idpergantian?>">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nama Mesin</label>
                                        <div class="col-lg-4">
                                            <select name="idmesin" class="form-control">
                                                <option>--Pilih--</option>
                                                <?php foreach($mastermesin as $msn){
                                                    if($idmesin == $msn->ID_mesinfotocopy){?>
                                                        <option value="<?php echo $msn->ID_mesinfotocopy ?>" selected><?php echo $msn->Merek ?> <?php echo $msn->Type_mesin ?></option>
                                                    <?php }else{?>
                                                        <option value="<?php echo $msn->ID_mesinfotocopy ?>"><?php echo $msn->Merek ?> <?php echo $msn->Type_mesin ?></option>
                                                <?php } }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nama Tinta</label>
                                            <div class="col-lg-4">
                                               <select name="idtinta" class="form-control">
                                                   <option>--Pilih--</option>
                                                   <?php foreach($mastertinta as $tinta){
                                                        if($idtinta == $tinta->ID_tinta){?>
                                                            <option value="<?php echo $tinta->ID_tinta ?>" selected><?php echo $tinta->Merek_tinta ?>  <?php echo $tinta->Type_tinta ?>  <?php echo $tinta->Jenis_tinta ?></option>
                                                        <?php }else{?>
                                                            <option value="<?php echo $tinta->ID_tinta ?>"><?php echo $tinta->Merek_tinta ?>  <?php echo $tinta->Type_tinta ?>  <?php echo $tinta->Jenis_tinta ?></option>
                                                   <?php } }?>
                                               </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Tanggal Pergantian </label>
                                        <div class="col-lg-4">
                                            <input type="date" name="tglpergantian" class="form-control" value="<?php echo date('Y-m-d',strtotime($tglpergantian)) ?>">
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