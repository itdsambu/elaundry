<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-th-list"></i>
                        <span class="caption-subject bold uppercase"> Harga</span>
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
                                    <a href="<?php echo site_url('Harga/input') ?>" class="btn green">
                                        Tambah Data <i class="fa fa-plus-square"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="table">
                        <thead>
                            <tr>
                                <th>Tanggal Efektif</th>
                                <th>Suplier</th>
                                <th>No Hendphone</th>
                                <th>No Telephone</th>
                                <th>Alamat</th>
                                <th>Created Date</th>
                                <th>Updated Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($getData as $get){?>
                            <tr>
                                <td><?php echo date('d-M-Y',strtotime($get->Tanggal_efektif ))?></td>
                                <td><?php echo $get->Nama_suplier?></td>
                                <td><?php echo $get->No_hp?></td>
                                <td><?php echo $get->NoTelp?></td>
                                <td><?php echo $get->Alamat?></td>
                                <td><?php if($get->CreatedDate != NULL){echo date('d-M-Y',strtotime($get->CreatedDate));}else{echo "";}?></td>
                                <td><?php if($get->UpdateDate != NULL){echo date('d-M-Y',strtotime($get->UpdateDate));}else{echo "";}?></td>
                                <td>
                                    <a href="#" class="btn btn-sm purple">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php }?>
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