<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-file-text"></i>
                        <span class="caption-subject bold uppercase"> Management Group User</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Groupuser/save') ?>">
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
                                                    <input type="text" class="form-control" id="GroupName" name="GroupName">
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
                                            <?php foreach ($menu1 as $row1):
                                                echo "<div class='col-lg-3'>";
                                                echo "<ul class='list-group'>";
                                                echo "<li class='list-group-item'>";
                                                echo "<label class='mt-checkbox'>";
                                                echo "<i class='fa fa-angle-double-down'></i> <b>".$row1->MenuLabel."*</b>";
                                                echo "<input type='checkbox' value='".$row1->MenuID."' name='checkbox[]'>";
                                                echo "<span></span>";
                                                echo "</label>";
                                                echo "</li>";

                                                    foreach($menu2 as $row2):
                                                        if ($row2->MenuHeader === $row1->MenuID):
                                                            echo "<li class='list-group-item'>";
                                                            echo "<label class='mt-checkbox'> ".$row2->MenuIcon." ".$row2->MenuLabel;
                                                            echo "<input type='checkbox' value='".$row2->MenuID."' name='checkbox[]'>";
                                                            echo "<span></span>";
                                                            echo "</label>";
                                                            echo "</li>";

                                                            foreach($menu3 as $row3):
                                                                if ($row3->MenuHeader === $row2->MenuID):
                                                                    echo "<li class='list-group-item'>";
                                                                    echo "<label class='mt-checkbox'> ".$row3->MenuIcon." ".$row3->MenuLabel;
                                                                    echo "<input type='checkbox' value='".$row3->MenuID."' name='checkbox[]'>";
                                                                    echo "<span></span>";
                                                                    echo "</label>";
                                                                    echo "</li>";
                                                                endif;
                                                            endforeach;

                                                        endif;
                                                    endforeach;

                                                echo "</ul>";
                                                echo "</div>";
                                            endforeach; ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="col-lg-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Button Akses</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-lg-3">
                                                <ul class="list-group">
                                                    <li class='list-group-item'>
                                                        <br>
                                                        <label class='mt-checkbox'>
                                                            <input type='checkbox' value='Restore Laporan' name='btn_restore'>Restore Laporan
                                                            <span></span>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                
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