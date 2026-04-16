<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase">Data Approval Perawatan</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('Approve_perawatan/approveVgm')?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table  class="table table-striped table-bordered table-hover table-header-fixed" id="table">
                                        <thead>
                                            <tr>
                                                <th width="3%" class="text-center">
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" >
                                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" onchange="checkAll(this)">
                                                        <span></span>
                                                    </label>
                                                </th>
                                                <th class="text-center">No Ref</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Nama Suplier</th>
                                                <th class="text-center">Kategori</th>
                                                <th class="text-center">CreatedBy</th>
                                                <th class="text-center">UpdateBy</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($getData as $get){?>
                                            <tr>
                                                <td class="text-center">
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" name="txtheaderid[]" value="<?php echo $get->HeaderID;?>"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td class="text-center"><?php echo $get->No_ref?></td>
                                                <td class="text-center"><?php echo date('d-M-Y',strtotime($get->Tgl_transaksi))?></td>
                                                <td class="text-center"><?php echo $get->Nama_suplier?></td>
                                                <td class="text-center"><?php echo $get->Kategori?></td>
                                                <td class="text-center">
                                                    <?php echo $get->CreatedBy?>
                                                    <br>
                                                    <?php if($get->CreatedDate != NULL){ 
                                                        echo date('d-M-Y',strtotime($get->CreatedDate)) ;
                                                    }else{
                                                        echo '';
                                                    }?></td>
                                                <td class="text-center">
                                                    <?php echo $get->UpdateBy?>
                                                    <br>
                                                    <?php if($get->UpdateDate != NULL){ 
                                                        echo date('d-M-Y',strtotime($get->UpdateDate)) ;
                                                    }else{
                                                        echo '';
                                                    }?>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-sm purple" onclick="detail(this.id)" id="<?php echo $get->HeaderID?>">
                                                        <i class="fa fa-eye"></i>
                                                        Detail
                                                    </a>
                                                    <a class="btn btn-sm btn-danger" onclick="tolak(this.id)" id="<?php echo $get->HeaderID?>">
                                                        <i class="fa fa-close"></i>
                                                        Tolak
                                                    </a>
                                                    <a class="btn btn-sm green-seagreen" onclick="view(this.id)" id="<?php echo $get->HeaderID?>">
                                                        <i class="fa fa-file-image-o"></i>
                                                         Nota
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-lg-2">
                                    <button type="submit" class="btn green">Approve</button>
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
<script type="text/javascript">
    function checkAll(ele) {
        var checkList = document.getElementsByTagName('input');

        if (ele.checked) {
            for (var i = 0; i < checkList.length; i++) {
                if (checkList[i].type == 'checkbox') {
                    checkList[i].checked = true;
                }
            }
        } else {
            for (var i = 0; i < checkList.length; i++) {
                console.log(i)
                if (checkList[i].type == 'checkbox') {
                    checkList[i].checked = false;
                }
            }
        }
    }
</script>

<!-- Modal -->
<div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detail Transaksi :</h4>
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
        $.post("<?php echo site_url();?>Perawatan_mess/ModalDetail?id="+clicked_id, function (data){
            $('#idDetail').html(data);
        });
        $('#MyModal').modal('show');
    }

</script>

<!-- Modal -->
<div class="modal fade" id="MyModalTolak" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Keterangan :</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="keterangan" name="txtKeterangan">
                <div id="tolak">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Javascript Modal -->
<script type="text/javascript">
    function tolak(clicked_id){
        $.post("<?php echo site_url();?>Approve_perawatan/modalTolakVgm?id="+clicked_id, function (data){
            $('#tolak').html(data);
        });
        $('#MyModalTolak').modal('show');
    }

</script>

<!-- Modal View Nota -->
<div class="modal fade" id="MyModalView" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Image Nota :</h4>
            </div>
            <div class="modal-body">
                <!-- <input type="hidden" id="inputdetail" name="iddetail"> -->
                <div id="view">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Javascript Modal -->
<script type="text/javascript">
    function view(clicked_id){
        // alert(clicked_id);
        $.post("<?php echo site_url();?>Perawatan_mess/viewFile?id="+clicked_id, function (data){
            $('#view').html(data);
        });
        $('#MyModalView').modal('show');
    }

</script>

<!-- Modal -->
