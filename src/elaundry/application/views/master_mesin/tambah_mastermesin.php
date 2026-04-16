<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-ship"></i>
                        <span class="caption-subject bold uppercase"> Tambah dan Edit Mesin</span>
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
                                            <input type="hidden" readonly="readonly" name="idmesin" class="form-control" value="<?php echo $idmesin?>">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Type Kertas</label>
                                            <div class="col-lg-4">
                                                <select  name="typekertas" class="form-control">
                                                    <option value="1">FOTOCOPY</option>
                                                    <option value="0">RISOGRAPH</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Merek Mesin</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="merekmesin" class="form-control" value="<?php echo $merekmesin?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Type Mesin</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="typemesin" class="form-control" value="<?php echo $typemesin ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Maximum Copy</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="maximum" class="form-control" value="<?php echo $maximum ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Fitur</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="fitur" class="form-control" value="<?php echo $fitur ?>">
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