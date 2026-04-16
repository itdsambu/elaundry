<div>
    <table class="table table-bordered table-hover table-striped" width="100%">
        <thead>
            <tr>
                <th rowspan="2" width="70" height="50">
                    <img src="<?php echo base_url();?>assets\layouts\layout3\img\logopt.png">
                </th>
                <th colspan="10" style="text-align: center;">PT . Riau Sakti United Plantations<br></th>
                <th>Nomor : 1 Dari 1</th>
            </tr>
            <tr>
               <th class="text-center" colspan="10">LAPORAN TRANSAKSI PEMBELIAN BARANG DAPUR / PERAWATAN MESS<br><br></th>
               <th>Tanggal : <?php echo $tglAwal.' s.d '.$tglAkhir?><br><br></th>
            </tr>
            <!-- <tr>
                <td colspan="12">Tanggal : <?php echo $tglAwal.' s.d '.$tglAkhir?></td>
            </tr>  -->
        </thead>
    </table>
    <table class="table table-bordered table-hover table-striped" border="1">
        <thead>
            <tr style="background-color: #36D7B7;">
                <th class="text-center">Nomor</th>
                <th class="text-center">Nama Suplier</th>
                <th class="text-center">Tgl Transaksi</th>
                <th class="text-center">No Ref</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Upload Nota</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
            foreach($getData as $get){?>
            <tr>
                <td class="text-center"><?php echo $no++?></td>
                <td class="text-center"><?php echo $get->nama_suplier?></td>
                <td class="text-center"><?php echo date('d-M-Y',strtotime($get->Tgl_transaksi))?></td>
                <td class="text-center"><?php echo $get->No_ref?></td>
                <td class="text-center">
                    <?php if($get->Kategori == 1){
                        echo 'Barang Dapur';
                    }else{
                        echo 'Perawatan';
                    }?>
                </td>
                <td class="text-center">
                    <textarea class="form-control" readonly=""><?php echo $get->Keterangan?></textarea>
                </td>
                <td class="text-center">
                    <?php if($get->UploadFile == 1){
                        echo '<label class="label label-sm label-primary">Sudah</label>';
                    }else{
                        echo '<label class="label label-sm label-danger">Belum</label>';
                    }?>    
                </td>
                <td class="text-center">
                    <a class="btn btn-sm yellow-soft" onclick="view(this.id)" id="<?php echo $get->Tgl_transaksi?>">
                        <i class="fa fa-eye"></i>
                        Detail
                    </a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    <table class="table table-bordered table-hover table-striped" border="1">
        <thead>
            <tr>
                <th class="text-center">Di Buat Oleh</th>
                <th class="text-center">Di Cek Oleh</th>
                <th class="text-center">Di Setujui Oleh</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($getDataApp as $app){?>
            <tr style="height: 100px;">
                <td class="text-center">
                    <?php if($app->Komplit == 1){?>
                        <img style="width: 100px;height: 100px" src="<?php echo base_url();?>/fileUpload/logo/approve.png">
                    <?php }else{
                        echo '';
                    }?>
                </td>
                <td class="text-center">
                    <?php if($app->Approve_kabag == 1){?>
                        <img style="width: 100px;height: 100px" src="<?php echo base_url();?>/fileUpload/logo/approve.png">
                    <?php }else{
                        echo '';
                    }?>
                </td>
                <td class="text-center">
                    <?php if($app->Approve_vgm == 1){?>
                        <img style="width: 100px;height: 100px" src="<?php echo base_url();?>/fileUpload/logo/approve.png">
                    <?php }else{
                        echo '';
                    }?>
                </td>
            </tr>
            <tr>
                <td>Nama &nbsp;&nbsp;&nbsp;: <?php echo $app->KomplitBy?></td>
                <td>Nama &nbsp;&nbsp;&nbsp;: <?php echo $app->Approve_kabagBy?></td>
                <td>Nama &nbsp;&nbsp;&nbsp;: <?php echo $app->Approve_kabagDate?></td>
            </tr>
            <tr>
                <td>Jabatan : OPERATOR</td>
                <td>Jabatan : KABAG/WAKABAG</td>
                <td>Jabatan : VGM</td>
            </tr>
            <tr>
                <td>Tanggal : 
                    <?php if($app->KomplitDate != NULL){
                        echo date('d-M-Y',strtotime($app->KomplitDate));
                    }else{
                        echo '';
                    }?> 
                </td>
                <td>Tanggal : 
                    <?php if($app->Approve_kabagDate != NULL){
                        echo date('d-M-Y',strtotime($app->Approve_kabagDate));
                    }else{
                        echo '';
                    }?>
                </td>
                <td>Tanggal : 
                    <?php if($app->Approve_vgmDate != NULL){
                        echo date('d-M-Y',strtotime($app->Approve_vgmDate));
                    }else{
                        echo '';
                    }?>
                </td>
            </tr>
             <?php }?>
        </tbody>
    </table>
</div>

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
    function view(clicked_id){
        $.post("<?php echo site_url();?>Pembelian/ModalDetail?id="+clicked_id, function (data){
            $('#idDetail').html(data);
        });
        $('#MyModal').modal('show');
    }

</script>
