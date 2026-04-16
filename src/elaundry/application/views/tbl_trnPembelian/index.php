<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-th-list"></i>
                        <span class="caption-subject bold uppercase">Data Transaksi Pembelian</span>
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
                                    <a href="<?php echo site_url('Pembelian/tambahData') ?>" class="btn green">
                                        Tambah Data <i class="fa fa-plus-square"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Pembelian/komplitData') ?>">
                        <div>
                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" >
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" onchange="checkAll(this)">
                                            <span></span>
                                        </label>
                                    </th>
                                    <th>No Ref</th>
                                    <th>Tanggal</th>
                                    <th>Nama Suplier</th>
                                    <th>Kategori</th>
                                    <th>Upload Nota</th>
                                    <th>Total</th>
                                    <th>Action</th>
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
                                    <td class="text-center"><?php echo $get->nama_suplier?></td>
                                    <td class="text-center">
                                        <?php if($get->Kategori == 1){
                                            echo 'Barang Dapur';
                                        }else{
                                            echo 'Perawatan Mess';
                                        }?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($get->UploadFile == 1){
                                            echo '<p style="color: green;">Sudah</p>';
                                        }else{
                                            echo '<p style="color: red;">Belum</p>';
                                        }?>
                                    </td>
                                    <td class="text-right">Rp.
                                        <?php foreach($getTotal as $row){
                                            if($get->HeaderID == $row->HeaderID){
                                                echo number_format($row->Total);
                                            }
                                        }?>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('Pembelian/editData/'.$get->HeaderID.'/'.$get->SuplierID)?>">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-sm purple" id="<?php echo $get->HeaderID?>" onclick="detail(this.id)">
                                            <i class="fa fa-eye"></i>
                                            Detail
                                        </a>
                                        <a class="btn btn-sm green-seagreen" onclick="view(this.id)" id="<?php echo $get->HeaderID?>">
                                            <i class="fa fa-file-image-o"></i>
                                             Nota
                                        </a>
                                        <a class="btn btn-sm btn-danger" href="<?php echo base_url('Pembelian/hapusData/'.$get->HeaderID)?>">
                                            <i class="fa fa-trash"></i>
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" class="text-right">Grand Total</td>
                                    <td class="text-right">Rp.
                                        <?php foreach($getGrandTotal as $key){
                                            echo number_format($key->GrandTotal);
                                        }?>
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                        <div>
                            <button name="submit" id="submit" class="btn btn-sm btn-primary">
                                Submit
                            </button>
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

<!-- Modal Edit Data -->
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
        $.post("<?php echo site_url();?>Pembelian/viewFile?id="+clicked_id, function (data){
            $('#view').html(data);
        });
        $('#MyModalView').modal('show');
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
        // alert(clicked_id);
        $.post("<?php echo site_url();?>Pembelian/ModalDetail?id="+clicked_id, function (data){
            $('#idDetail').html(data);
        });
        $('#MyModal').modal('show');
    }

</script>
