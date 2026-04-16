<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-ship"></i>
                        <span class="caption-subject bold uppercase"> Tambah dan Edit Beban</span>
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
                                                <input type="hidden" readonly="readonly" name="idbeban" class="form-control" value="<?php echo $idbeban ?>">
                                            </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-lg-2 control-label">Beban</label>
                                            <div class="col-lg-4">
                                                <input type="text" name="beban" class="form-control" value="<?php echo $beban ?>">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <?php 
                                            if($tipetransaksi == 1){
                                                $internal  = "checked";
                                                $eksternal = "";
                                            }elseif($tipetransaksi == 0){
                                                $internal  = "";
                                                $eksternal = "checked" ;
                                            }?>
                                        <label class="col-lg-2 control-label">Tipe Transaksi</label>
                                            <div class="col-lg-4">
                                                <label class="radio-inline"><input name="tipetransaksi" type="radio" value="1" required="">INTERNAL</label>
                                                <label class="radio-inline"><input name="tipetransaksi" type="radio" value="0" required="">EKSTERNAL</label>
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