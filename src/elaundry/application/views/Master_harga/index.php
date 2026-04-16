<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase"> Master Harga</span>
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
                                    <a href="<?php echo site_url('Master_harga/tambahData') ?>" class="btn green">
                                        Tambah Data <i class="fa fa-plus-square"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Kode Suplier</th>
                                <th>Nama Suplier</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($dataharga as $get): ?>
                                <tr>
                                    <td><?php echo date('d-M-Y',strtotime($get->tanggal))?></td>
                                    <td><?php echo $get->kode_suplier?></td>
                                    <td style="font: green;">
                                       <?php echo $get->nama_suplier?>
                                    </td>
                                    <td><?php if($get->create_date !=NULL){echo date('d M Y', strtotime($get->create_date));} ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-sm purple" onclick="detail(this.id)" id="<?php echo $get->suplierID?>">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-danger" href="<?php echo base_url('Master_harga/deleteHdr/'.$get->headerID)?>">
                                            <i class="fa fa-trash"></i>
                                        </a>
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

<!-- Modal -->
<div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detail Data Master :</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="inputdetail" name="iddetail">
                <div id="idDetail">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Javascript Modal -->
<script type="text/javascript">
    function detail(clicked_id){
        $.post("<?php echo site_url();?>Master_harga/ModalDetail?id="+clicked_id, function (data){
            $('#idDetail').html(data);
        });
        $('#MyModal').modal('show');
    }

</script>