<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase">Approve Issue Tamu</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('Approve/approveDept')?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-striped table-bordered table-hover" id="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center" rowspan="3">
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" >
                                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" onchange="checkAll(this)">
                                                        <span></span>
                                                    </label>
                                                </th>
                                                <th class="text-center" rowspan="3">ID</th>
                                                <th class="text-center" rowspan="1" colspan="4">Rencana</th>
                                                <th class="text-center" rowspan="3">Intansi</th>
                                                <th class="text-center" rowspan="3">Alamat</th>
                                                <th class="text-center" rowspan="3">Jml Tamu</th>
                                                <th class="text-center" rowspan="3">Keperluan</th>
                                                <th class="text-center" rowspan="3">Durasi</th>
                                                <th class="text-center" rowspan="3">Status Inap</th>
                                                <th class="text-center" rowspan="3">Actions</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2" rowspan="1" class="text-center">CheckIn</th>
                                                <th colspan="2" rowspan="1" class="text-center">CheckOut</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Jam</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Jam</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        foreach($getDataIssue as $get){?>
                                            <tr>
                                                <td class="text-center">
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" name="txtidtrans[]" value="<?php echo $get->HeaderID?>"/>
                                                        <span></span>
                                                    </label>
                                                </td>
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
                                                <td class="text-center"><?php echo $get->Keperluan?></td>
                                                <td class="text-center"><?php echo $get->Durasi?></td>
                                                <td class="text-center"><?php echo $get->Status_inap?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-sm purple-sharp" id="<?php echo $get->HeaderID?>" onclick="detail(this.id)">
                                                        <i class="fa fa-eye"></i>
                                                        Detail
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
