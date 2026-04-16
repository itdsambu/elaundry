<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase"> Item</span>
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
                                    <a href="<?php echo site_url('Master_Item/tambahData') ?>" class="btn green">
                                        Tambah Data <i class="fa fa-plus-square"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="table">
                        <thead>
                            <tr>
                                <th>Kode item</th>
                                <th>Nama Item</th>
                                <th>Kategori</th>
                                <th>Satuan</th>
                                <th>Created Date</th>
                                <th>Updated Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($getData as $get): ?>
                                <tr>
                                    <td><?php echo $get->kode_item?></td>
                                    <td><?php echo $get->nama_item?></td>
                                    <td><?php echo $get->nama_kategori?></td>
                                    <td><?php echo $get->abbr?></td>
                                    <td><?php if($get->create_date!=NULL){echo date('d M Y', strtotime($get->create_date));} ?></td>
                                    <td><?php if($get->update_date!=NULL){echo date('d M Y', strtotime($get->update_date));} ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo site_url('Master_Item/editData')."/".$get->itemID; ?>" class="btn btn-icon-only blue" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo site_url('Master_Item/delete')."/".$get->itemID; ?>" class="btn btn-icon-only red" title="Hapus" onClick="return confirm('Hapus <?php echo $get->nama_item;?> ?')"><i class="fa fa-trash"></i></a>
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