<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase"> Tambah dan Edit Departemen</span>
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
                                        <input type="hidden" readonly="readonly" name="id_dept" class="form-control" value="<?php echo $iddept ?>">
                                        <label class="col-lg-2 control-label">Divisi</label>
                                            <div class="col-lg-4">
                                                <select class="form-control" id="inputDivisi" name="divisi">
                                                    <option value="ALL_DEVISI">ALL DIVISI</option>
                                                    <option value="UTILITY">UTILITY</option>
                                                    <option value="SUPPORT">SUPPORT</option>
                                                    <option value="GENERAL">GENERAL</option>
                                                    <option value="KELAPA">KELAPA</option>
                                                    <option value="NANAS">NANAS</option>
                                                    <option value="CAN MAKING LINE">CAN MAKING LINE</option>
                                                    <option value="QUALITY">QUALITY</option>
                                                    <option value="FINANCE & CONTROL">FINANCE & CONTROL</option>
                                                    <option value="MATERIAL">MATERIAL</option> 
                                                    <option value="SKL">SKL</option>
                                                    <option value="KEBUN">KEBUN</option>
                                                    <option value="LAIN - LAIN">LAIN - LAIN</option>
                                                 </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nama Departemen</label>
                                            <div class="col-lg-4">
                                                <input type="text" name="nama_dept" class="form-control" value="<?php echo $namadept ?>">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Singkatan</label>
                                            <div class="col-lg-4">
                                                <input type="text" name="singkatan_dept" class="form-control" value="<?php echo $singkdept ?>" >
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Set Active</label>
                                            <div class="col-lg-4">
                                                <label class="radio-inline"><input name="inactive" type="radio" value="1" required=""> Active</label>
                                                <label class="radio-inline"><input name="inactive" type="radio" value="0" required=""> Not Active</label>
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