<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-file-text"></i>
                        <span class="caption-subject bold uppercase"> Management Akses Sub Departemen</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Akses_dept/save') ?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Group User</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Group Name</label>
                                                <div class="col-lg-5">
                                                   <select class="form-control" name="groupname" id="groupname">
                                                       <option value="">--Pilih--</option>
                                                       <?php foreach($getGroupUser as $set){
                                                            echo "<option value=".$set->GroupID.">".$set->GroupName."</option>";
                                                        } ?>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Menu Akses</h3>
                                        </div>
                                        <div class="panel-body">
                                            <?php foreach ($getDepartemen as $row1):
                                                echo "<div class='col-lg-3'>";
                                                echo "<ul class='list-group'>";
                                                echo "<li class='list-group-item'>";
                                                echo "<label class='mt-checkbox'>";
                                                echo "<i class='fa fa-angle-double-right'></i> <b>".$row1->Singkatan_dept."*</b>";
                                                echo "<input type='checkbox' value='".$row1->ID_dept."' name='checkbox[]'>";
                                                echo "<span></span>";
                                                echo "</label>";
                                                echo "</li>";

                                                echo "</ul>";
                                                echo "</div>";
                                            endforeach; ?>
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