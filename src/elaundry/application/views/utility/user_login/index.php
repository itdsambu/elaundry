<script src="<?php echo base_url(); ?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-th-list"></i>
                        <span class="caption-subject bold uppercase"> Management User</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- alert -->
                    <?php if ($this->input->get('msg') == "success") {
                        echo "<div class='alert alert-success'>";
                        echo "<strong>Sukses !!!</strong> Data berhasil disimpan.";
                        echo "</div>";
                    } elseif ($this->input->get('msg') == "failed") {
                        echo "<div class='alert alert-danger'>";
                        echo "<strong>Gagal !!!</strong> Data tidak dapat disimpan.";
                        echo "</div>";
                    } ?>

                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="btn-group pull-right">
                                    <a href="<?php echo site_url('User_login/input') ?>" class="btn green">
                                        Tambah Data <i class="fa fa-plus-square"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-bordered table-hover" id="table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <!-- <th>Departemen</th> -->
                                <th>Jabatan</th>
                                <th>Group User</th>
                                <th>Petugas</th>
                                <th>InActive</th>
                                <th>Created Date</th>
                                <th>Updated Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($getUser as $get) : ?>
                                <tr>
                                    <td><?php echo $get->LoginID ?></td>
                                    <td><?php echo $get->NamaUser ?></td>
                                    <!-- <td><?php //echo $get->Singkatan_dept 
                                                ?></td> -->
                                    <td><?php echo $get->Nama_jab ?></td>
                                    <td><?php echo $get->GroupName ?></td>
                                    <td>
                                        <?php
                                        if ($get->status_petugas == '1') {
                                            echo "<span class='badge badge-success'>Ya</span>";
                                        } else {
                                            echo "<span class='badge badge-secondary'>Tidak</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($get->NotActive == 0) {
                                            echo "<span class='badge badge-success'>Active</span>";
                                        } else {
                                            echo "<span class='badge badge-danger'>Not Active</span>";
                                        } ?>
                                    </td>
                                    <td><?php if ($get->CreatedDate != NULL) {
                                            echo date('d M Y', strtotime($get->CreatedDate));
                                        } ?></td>
                                    <td><?php if ($get->UpdateDate != NULL) {
                                            echo date('d M Y', strtotime($get->UpdateDate));
                                        } ?></td>
                                    <td>
                                        <a href="<?php echo site_url('User_login/update') . "/" . $get->LoginID; ?>" class="btn btn-icon-only blue" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo site_url('User_login/resetPassword') . "/" . $get->LoginID; ?>" class="btn btn-icon-only yellow" title="Reset" onClick="return confirm('Reset password <?php echo $get->NamaUser ?> ?')"><i class="fa fa-unlock-alt"></i></a>
                                        <a href="<?php echo site_url('User_login/delete') . "/" . $get->LoginID; ?>" class="btn btn-icon-only red" title="Hapus" onClick="return confirm('Hapus user <?php echo $get->NamaUser ?> ?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table').dataTable({
            "order": [0, 'asc'],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "pageLength": 10
        });
    });
</script>