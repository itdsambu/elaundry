<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase">Approve Nota Perjalanan Dinas (KASI)</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
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
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('ApproveNota/approveDataKasi')?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-striped table-bordered table-hover" id="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center" rowspan="2">
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" >
                                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" onchange="checkAll(this)">
                                                        <span></span>
                                                    </label>
                                                </th>
                                                <th class="text-center" rowspan="2">Tanggal Nota</th>
                                                <th class="text-center" rowspan="2">No Lppt</th>
                                                <th class="text-center" rowspan="2">Speedboat</th>
                                                <th class="text-center" rowspan="2">Route</th>
                                                <th class="text-center" rowspan="2">Operator</th>
                                                <th class="text-center" rowspan="2">Keperluan</th>
                                                <th class="text-center" rowspan="2">Grand Total</th>
                                                <th class="text-center" rowspan="2">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($getData as $get){?>
                                                <tr>
                                                    <td class="text-center">
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" name="idtrans[]" value="<?php echo $get->NotaHeaderID;?>"/>
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo date('d - M - Y',strtotime($get->TanggalNota))?>
                                                    </td>
                                                    <td class="text-center"><?php echo $get->NoLppt?></td>
                                                    <td class="text-center"><?php echo $get->Nama_speedboad?></td>
                                                    <td class="text-center"><?php echo $get->Rute?></td>
                                                    <td class="text-center"><?php echo $get->Nama_sopir?></td>
                                                    <td class="text-center"><?php echo $get->Keperluan?></td>
                                                    <td class="text-center">Rp.
                                                        <?php foreach($getGrandTotal as $key){
                                                            if($get->NoLppt == $key->NoLppt){
                                                                echo number_format($key->GrandTotal);
                                                        }
                                                    }?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a onclick="view(this.id)" id="<?php echo $get->NotaHeaderID?>" class="btn btn-sm purple">
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

<!-- Javascript Modal -->
<script type="text/javascript">
    function view(clicked_id){
        // alert(clicked_id);
        $.post("<?php echo site_url();?>ApproveNota/getDetail?id="+clicked_id, function (data){
            $('#view').html(data);
        });
        $('#MyModalView').modal('show');
    }

</script>

<!-- Modal -->
<div class="modal fade" id="MyModalView" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detail Transaksi :</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="inputdetail" name="iddetail">
                <div id="view">
                </div>
            </div>
        </div>
    </div>
</div>