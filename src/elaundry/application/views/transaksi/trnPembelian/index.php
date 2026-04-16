<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-th-list"></i>
                        <span class="caption-subject bold uppercase"> Pembelian</span>
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
                                    <a href="<?php echo site_url('Pembelian/input') ?>" class="btn green">
                                        Tambah Data <i class="fa fa-plus-square"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Pembelian/komplit') ?>">
                            <table class="table table-striped table-bordered table-hover table-header-fixed" id="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>No Ref</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Suplier</th>
                                        <th>Kategori</th>
                                        <th>Upload Nota</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($getData as $get){?>
                                        <tr>
                                            <td>
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="checkboxes" name="txtheaderid[]" value="<?php echo $get->HeaderID;?>"/>
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td><?php echo $get->No_ref?></td>
                                            <td><?php echo $get->TanggalTransaksi?></td>
                                            <td><?php echo $get->Nama_suplier?></td>
                                            <td><?php if($get->Kategori_hdr == 1){echo 'Perlengkapan Dapur';}else{echo 'Perawatan Mess';}?></td>
                                            <td><?php if($get->UploadFile == 1){echo '<p style="color: green;">Sudah</p>';}else{echo '<p style="color: red;">Belum</p>';}?></td>
                                            <td class="text-right">Rp.
                                                <?php foreach($getTotal as $row){
                                                    if($get->HeaderID == $row->HeaderID){
                                                        echo number_format($row->Total);
                                                    }
                                                }?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('Pembelian/updateData/'.$get->HeaderID.'/'.$get->SuplierID)?>" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-sm purple" onclick="detail(this.id)" id="<?php echo $get->HeaderID?>">
                                                    <i class="fa fa-eye"></i>
                                                    Detail
                                                </a>
                                                <a class="btn btn-sm green-meadow" onclick="Nota(this.id)" id="<?php echo $get->HeaderID?>">
                                                    <i class="fa fa-file-image-o"></i>
                                                    Nota
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="fa fa-trash"></i>
                                                    
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </form>
                    </div>
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

<!-- Modal Edit Data -->
<div class="modal fade" id="MyModalDetail" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detail Pembelian</h4>
            </div>
            <div class="modal-body">
                <div id="detail">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Javascript Modal -->
<script type="text/javascript">
    function detail(clicked_id){
        // alert(clicked_id);
        $.post("<?php echo site_url();?>Pembelian/getDetail?id="+clicked_id, function (data){
            $('#detail').html(data);
        });
        $('#MyModalDetail').modal('show');
    }

</script>

<!-- Modal Edit Data -->
<div class="modal fade" id="MyModalNota" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Nota Pembelian</h4>
            </div>
            <div class="modal-body">
                <div id="Nota">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Javascript Modal -->
<script type="text/javascript">
    function Nota(clicked_id){
        // alert(clicked_id);
        $.post("<?php echo site_url();?>Pembelian/getNota?id="+clicked_id, function (data){
            $('#Nota').html(data);
        });
        $('#MyModalNota').modal('show');
    }

</script>