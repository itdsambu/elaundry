<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <?php foreach($getInfo as $inf){
                if($inf->Kapasitas == $inf->Jumlah){?>
                    <div class="alert alert-danger">
                        <span class="blink_me">
                            <b>Tidak Ada Kamar Tersedia</b>
                        </span>
                    </div>
                <?php }else{ ?>
                    <div class="alert alert-success">
                        <span class="blink_me">
                            <b>Masih Ada Kamar Tersedia .. !!</b>
                        </span>
                    </div>
                <?php }}?>
        </div>
        <script type="text/javascript">
            function blinker() {
                $('.blink_me').fadeOut(1000);
                $('.blink_me').fadeIn(1000);
            }
            setInterval(blinker, 1000);
        </script>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase">Data Issue Tamu</span>
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
                                    <a href="<?php echo site_url('Proposaltamu/tambahData') ?>" class="btn green">
                                        Tambah Data <i class="fa fa-plus-square"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="table">
                        <thead>
                            <tr>
                                <th rowspan="3" class="text-center">ID</th>
                                <th class="text-center" rowspan="1" colspan="4">Rencana</th>
                                <th rowspan="3" class="text-center">Intansi</th>
                                <th rowspan="3" class="text-center">Alamat</th>
                                <th rowspan="3" class="text-center">Jml Tamu</th>
                                <th rowspan="3" class="text-center">Keperluan</th>
                                <th rowspan="3" class="text-center">Durasi</th>
                                <th rowspan="3" class="text-center">Status Inap</th>
                                <th rowspan="3" class="text-center">Approved</th>
                                <th rowspan="3" class="text-center">Actions</th>
                            </tr>
                            <tr>
                                <th colspan="2" rowspan="1" style="text-align: center;">CheckIn</th>
                                <th colspan="2" rowspan="1" style="text-align: center;">CheckOut</th>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($getData as $get){?>
                                <tr>
                                    <td class="text-center"><?php echo $get->HeaderID?></td>
                                    <td class="text-center"><?php echo date('d-m-Y',strtotime($get->Rencana_checkin))?></td>
                                    <td class="text-center"><?php echo  date('H:i:s',strtotime($get->Rencana_JamCheckIn))?></td>
                                    <td class="text-center"><?php echo  date('d-m-Y',strtotime($get->Rencana_checkout))?></td>
                                    <td class="text-center"><?php echo  date('H:i:s',strtotime($get->Rencana_JamCheckOut))?></td>
                                    <td class="text-center"><?php echo $get->Instansi?></td>
                                    <td class="text-center"><?php echo $get->Alamat?></td>
                                    <td class="text-center">
                                        <?php foreach($getJmlTamu as $row){
                                        if($get->HeaderID == $row->HeaderID){
                                            echo $row->JumlahTamu;
                                        }}?>
                                    </td>
                                    <td ><?php echo $get->Keperluan?></td>
                                    <td class="text-center"><?php echo $get->Durasi?></td>
                                    <td class="text-center"><?php echo $get->Status_inap?></td>
                                    <td class="text-center">
                                        <?php if($get->Approve_dept == NULL){
                                            echo '<span class="label label-sm label-warning">Pending</span>';
                                        }else{
                                            echo '<span class="label label-sm label-success">Approved</span>';
                                        }?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($get->Approve_dept == NULL){?>
                                        <a href="<?php echo base_url('Proposaltamu/editData/'.$get->HeaderID)?>" class="btn btn-sm btn-primary">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-sm purple-sharp" id="<?php echo $get->HeaderID?>" onclick="detail(this.id)">
                                            <i class="fa fa-eye"></i>
                                            Detail
                                        </a>
                                    <?php }else{?>
                                        <a class="btn btn-sm purple-sharp" id="<?php echo $get->HeaderID?>" onclick="detail(this.id)">
                                            <i class="fa fa-eye"></i>
                                            Detail
                                        </a>
                                    <?php }?>
                                        <!-- <a href="<?php //echo base_url('Proposaltamu/hapus/'.$get->HeaderID)?>" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                            Hapus
                                        </a> -->
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
            "order"      : [0, 'desc'],
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
                <h4 class="modal-title">Detail Issue Tamu :</h4>
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
        // alert(clicked_id);
        $.post("<?php echo site_url();?>Proposaltamu/ModalDetailTamu?id="+clicked_id, function (data){
            $('#idDetail').html(data);
        });
        $('#MyModal').modal('show');
    }

</script>