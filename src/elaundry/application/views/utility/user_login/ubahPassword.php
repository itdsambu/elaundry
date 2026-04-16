<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-file-text"></i>
                        <span class="caption-subject bold uppercase"> Ubah Password</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- alert -->
                    <?php if($this->input->get('msg') == "success"){
                        echo "<div class='alert alert-success'>";
                        echo "<strong>Sukses !!!</strong> Update Password Berhasil.";
                        echo "</div>";
                    }elseif($this->input->get('msg') == "failed"){
                        echo "<div class='alert alert-danger'>";
                        echo "<strong>Gagal !!!</strong> Update Password Gagal.";
                        echo "</div>";
                    } ?>
                    <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('User_login/updatePassword') ?>">
                        <div class="form-body">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Password Lama</label>
                                    <div class="col-lg-4">
                                        <input type="hidden" id="LoginID" name="LoginID" class="form-control" value="<?php echo $this->session->userdata('user_id');?>"/>
                                        <input type="password" class="form-control" id="OldPass" name="OldPass">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Password Baru</label>
                                    <div class="col-lg-4">
                                        <input type="password" class="form-control" id="passnew" name="passnew">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <!-- <div class="col-lg-offset-1 col-lg-11"> -->
                                <div class="col-lg-6">
                                    <div class="pull-right">
                                        <button type="submit" name="simpan" class="btn green">Submit</button>
                                        <a class="btn default" href="javascript:history.back()">Kembali</a>
                                    </div>
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