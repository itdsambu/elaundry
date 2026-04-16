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
           <th>Tanggal : <?php echo date('d-M-Y',strtotime($tanggalawal))?> s/d <?php echo date('d-M-Y',strtotime($tanggalakhir))?> <br><br></th>
        </tr>
        <!-- <tr>
            <th colspan="10">Tanggal : <?php echo $tanggalAkhir?> </th>
        </tr>  -->
    </thead>
</table>
<table class="table table-bordered table-hover table-striped" border="1">
    <thead>
       <tr style="background-color: #36D7B7;">
            <th class="text-center">No</th>
            <th class="text-center">Nama Item</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Satuan</th>
            <th class="text-center">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        foreach ($getData as $get) {?>
        <tr style="height: 50px;">
            <td class="text-center"><?php echo $no++;?></td>
            <td class="text-left">
                <a onclick="view(this.id)" id="<?php echo $get->ItemID?>">
                    <?php echo $get->nama_item?>
                    <input type="hidden" id="tglAwal" value="<?php echo $tanggalawal?>">
                    <input type="hidden" id="tglAkhir" value="<?php echo $tanggalakhir?>">
                </a>
            </td>
            <td class="text-center"><?php echo $get->Quantity?></td>
            <td class="text-center"><?php echo $get->abbr?></td>
            <td class="text-right"><strong>Rp.<?php echo number_format($get->Grand,2)?></strong></td>
        </tr>
    <?php }?>
        <tr>
            <td colspan="4" class="text-center"><strong>Grand Total</strong></td>
        <?php foreach ($getGrandTotal as $gt) { ?>
            <td colspan="4" class="text-right"><strong>Rp.<?php echo number_format($gt->Total,2)?></td>
        <?php } ?>
        </tr>
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
        <?php 
            foreach($getApprove as $app) { 
                if($app->Komplit == 1){
                    $komplit = "APPROVE";
                }else{
                    $komplit = "";
                }if($app->Approve_kabag == 1){
                    $approve1 = "APPROVE";
                }else{
                    $approve1 = "";
                }if ($app->Approve_vgm == 1) {
                    $approve2 = "APPROVE";
                }else{
                    $approve2 = "";
                }
            ?>
        <tr style="height: 100px;">
            <td class="text-center"  width="200" style="vertical-align: middle; text-align: center;">
                <h3>
                    <strong>
                        <?php echo $komplit ?>
                    </strong>
                </h3>
            </td>
            <td class="text-center"  width="200" style="vertical-align: middle; text-align: center;">
                <h3>
                    <strong>
                        <?php echo $approve1 ?>
                    </strong>
                </h3>
            </td>
            <td class="text-center"  width="200" style="vertical-align: middle; text-align: center;">
            <h3>
                    <strong>
                        <?php echo $approve2 ?>
                    </strong>
                </h3>
            </td>
        </tr>
        <tr>
            <td>Nama &nbsp;&nbsp;&nbsp;: <?php echo $app->KomplitBy?> </td>
            <td>Nama &nbsp;&nbsp;&nbsp;: <?php echo $app->Approve_kabagBy?></td>
            <td>Nama &nbsp;&nbsp;&nbsp;: Minandar</td>
        </tr>
        <tr>
            <td>Jabatan : OPERATOR</td>
            <td>Jabatan : KD SKT</td>
            <td>Jabatan : VGM</td>
        </tr>
        <tr>
            <td>Tanggal : <?php echo date('d-M-Y',strtotime($app->KomplitDate))?></td>
            <td>Tanggal : <?php echo date('d-M-Y',strtotime($app->Approve_kabagDate))?></td>
            <td>Tanggal : <?php echo date('d-M-Y',strtotime($app->Approve_vgmDate))?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<div class="text-left">
    <!-- <a target="blank" href="<?php //echo base_url('MonitoringRekapPembelian/ExportExcelAllitem/'.$tanggalawal.'/'.$tanggalakhir);?>" class="btn green-seagreen">
        <i class="fa fa-file-excel-o"></i>
        Export Excel
    </a> -->
    <a target="blank" href="<?php echo base_url('MonitoringRekapPembelian/ExportPdfAllitem/'.$tanggalawal.'/'.$tanggalakhir);?>" class="btn blue">
        <i class="icon-printer"></i>
        Export PDF
    </a>
</div>


<!-- Modal -->
<div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detail Belanja Item PerSuplier :</h4>
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
        var tglAwal  = $('#tglAwal').val();
        var tglAkhir = $('#tglAkhir').val();

        $.ajax({
            type: "POST",
            dataType :"html",
            url : "<?php echo base_url('MonitoringRekapPembelian/ModalDetailItemPersuplier')?>"+"/"+clicked_id+"/"+tglAwal+"/"+tglAkhir,
            success: function(msg){
                if(msg == ''){
                    alert('Tidak Ada Data');
                }else{
                    $("#idDetail").html(msg);
                }
            }
        });

        $('#MyModal').modal('show');
    };
</script>
