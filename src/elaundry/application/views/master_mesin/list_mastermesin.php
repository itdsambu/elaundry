<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase"> Mesin</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- alert -->
                    <?php if($this->input->get('msg') == "success"){
                        echo "<div class='alert alert-success'>";
                        echo "<strong>Sukses !!!</strong> Data berhasil disimpan.";
                        echo "</div>";
                    }elseif($this->input->get('msg') == "failed"){
                        echo "<div class='alert alert-danger'>";
                        echo "<strong>Gagal !!!</strong> Data tidak dapat disimpan.";
                        echo "</div>";
                    } ?>

                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="btn-group pull-right">
                                    <a href="<?php echo site_url('Mastermesin/tambah') ?>" class="btn green">
                                        Tambah Data <i class="fa fa-plus-square"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="table">
                        <thead>
                            <tr>
                                <th>Type Kerja</th>
                                <th>Merek Mesin</th>
                                <th>Type Mesin</th>
                                <th>Maximum</th>
                                <th>Fitur</th>
                                <th>Created Date</th>
                                <th>Updated Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listmastermesin as $get): ?>
                                <tr>
                                    <td><?php if($get->Type_kertas == 1){echo 'Fotocopy';}else{echo 'Rishograph';} ?></td>
                                    <td><?php echo $get->Merek ?></td>
                                    <td><?php echo $get->Type_mesin ?></td>
                                    <td><?php echo $get->Maximumcopy ?></td>
                                    <td><?php echo $get->Fitur ?></td>
                                    <td><?php if($get->Created_date!=NULL){echo date('d M Y', strtotime($get->Created_date));} ?></td>
                                    <td><?php if($get->Update_date!=NULL){echo date('d M Y', strtotime($get->Update_date));} ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo site_url('Mastermesin/edit')."/".$get->ID_mesinfotocopy; ?>" class="btn btn-icon-only blue" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo site_url('Mastermesin/hapus')."/".$get->ID_mesinfotocopy; ?>" class="btn btn-icon-only red" title="Hapus" onClick="return confirm('Hapus <?php echo $get->Merek;?> ?')"><i class="fa fa-trash"></i></a>
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
            "order"      : [0, 'asc'],
            "lengthMenu" : [
                            [5, 10, 15, 20, -1],
                            [5, 10, 15, 20, "All"] // change per page values here
                           ],
            "pageLength" : 10
        });
    } );
</script>