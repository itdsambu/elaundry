<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-file-text"></i>
                        <span class="caption-subject bold uppercase"> Management User</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php
                    // print_r($getUser);
                    // print_r($getJab);
                    ?>
                    <?php foreach ($getUser as $set) : ?>
                        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('User_login/saveupdate') ?>">
                            <div class="form-body">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Username</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" id="LoginID" name="LoginID" value="<?php echo $set->LoginID ?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nama user</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" id="NamaUser" name="NamaUser" value="<?php echo $set->NamaUser ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Departemen</label>
                                        <div class="col-lg-4">
                                            <select class="form-control select2" id="DeptID" name="DeptID">
                                                <?php foreach ($getDept as $key) :
                                                    if ($set->DeptID == $key->deptid) {
                                                        echo "<option value='" . $set->DeptID . "' selected>" . $key->deptabbr . "</option>";
                                                    } else {
                                                        echo "<option value='" . $set->DeptID . "'>" . $key->deptabbr . "</option>";
                                                    }
                                                endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Jabatan</label>
                                        <div class="col-lg-4">
                                            <select class="form-control select2" id="JabID" name="JabID">
                                                <?php foreach ($getJab as $key) :
                                                    if ($set->JabID == $key->ID_jab) {
                                                        echo "<option value='" . $key->ID_jab . "' selected>" . $key->Nama_jab . "</option>";
                                                    } else {
                                                        echo "<option value='" . $key->ID_jab . "'>" . $key->Nama_jab . "</option>";
                                                    }
                                                endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Group User</label>
                                        <div class="col-lg-4">
                                            <select class="form-control select2" id="GroupID" name="GroupID">
                                                <?php foreach ($getGroup as $key) :
                                                    if ($set->GroupID == $key->GroupID) {
                                                        echo "<option value='" . $key->GroupID . "' selected>" . $key->GroupName . "</option>";
                                                    } else {
                                                        echo "<option value='" . $key->GroupID . "'>" . $key->GroupName . "</option>";
                                                    }
                                                endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Petugas Laundry</label>
                                        <div class="col-lg-4">
                                            <div class="mt-radio-inline">
                                                <?php if ($set->status_petugas == 1) {
                                                    $ac = "checked";
                                                    $na = "";
                                                } else {
                                                    $ac = "";
                                                    $na = "checked";
                                                } ?>
                                                <label class="mt-radio">
                                                    <input type="radio" name="Petugas" id="Active" value="1" <?php echo $ac ?>> Ya
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="Petugas" id="NotActive" value="0" <?php echo $na ?>> Tidak
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">InActive</label>
                                        <div class="col-lg-4">
                                            <div class="mt-radio-inline">
                                                <?php if ($set->NotActive == 0) {
                                                    $ac = "checked";
                                                    $na = "";
                                                } else {
                                                    $ac = "";
                                                    $na = "checked";
                                                } ?>
                                                <label class="mt-radio">
                                                    <input type="radio" name="InActive" id="Active" value="0" <?php echo $ac ?>> Active
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="InActive" id="NotActive" value="1" <?php echo $na ?>> Not Active
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <!-- <div class="col-lg-offset-1 col-lg-11"> -->
                                    <div class="col-lg-4">
                                        <div class="pull-right">
                                            <button type="submit" class="btn green">Submit</button>
                                            <a class="btn default" href="javascript:history.back()">Kembali</a>
                                        </div>
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