<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-th-list"></i>
                        <span class="caption-subject bold uppercase">Data Transaksi Pergantian Tinta</span>
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
                                    <a href="<?php echo site_url('Transaksipergantiantinta/tambah') ?>" class="btn green">
                                        Tambah Data <i class="fa fa-plus-square"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Transaksipergantiantinta/komplit') ?>">
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
                                    <th>Nama Mesin</th>
                                    <th>Nama Tinta</th>
                                    <th>Tanggal Pergantian</th>
                                    <th>Status Data</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($listpergantiantinta as $get): 
                                    if($get->Komplit == 1){
                                        $komplit    = "Komplit";
                                    }else{
                                        $komplit = "Tidak Komplit";
                                    }
                                    ?>
                                    <tr>
                                        <td class="text-center">
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes" name="idtrans[]" value="<?php echo $get->ID_pergantiantinta;?>"/>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td><?php echo $get->Merek ?> <?php echo $get->Type_mesin ?></td>
                                        <td><?php echo $get->Merek_tinta ?> <?php echo $get->Type_tinta ?>  <?php echo $get->Jenis_tinta?></td>
                                        <td><?php echo date('d-m-Y',strtotime($get->Tgl_pergantiantinta)) ?></td>
                                        <td><?php echo $komplit ?></td>
                                        <td align="center">
                                            <a href="<?php echo site_url('Transaksipergantiantinta/edit/' .$get->ID_pergantiantinta); ?>" class="btn blue">  
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
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
