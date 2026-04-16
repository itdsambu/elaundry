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
           <th>Tanggal : <?php echo date('d-M-Y',strtotime($tglAwal))?> s/d <?php echo date('d-M-Y',strtotime($tglAkhir))?> <br><br></th>
        </tr>
    </thead>
</table>
<table class="table table-bordered table-hover table-striped" border="1">
    <thead>
       <tr style="background-color: #36D7B7;">
            <th class="text-center">No</th>
            <th class="text-center">Nama Suplier</th>
            <th class="text-center">A/N Rekening</th>
            <th class="text-center">No Rekening</th>
            <th class="text-center">Jumlah (Rp.)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        foreach ($getDataRek as $get) { ?>
        <tr style="height: 50px;">
            <td class="text-center"><?php echo $no++;?></td>
            <td><?php echo $get->nama_suplier?></td>
            <td class="text-center"><?php echo $get->nama_rek?></td>
            <td class="text-center"><?php echo $get->nomor_rek?></td>
            <td class="text-right">
                <a onclick="view(this.id)" id="<?php echo $get->SuplierID?>">
                    <input type="hidden" id="tglAwal" value="<?php echo $tglAwal?>">
                    <input type="hidden" id="tglAkhir" value="<?php echo $tglAkhir?>">
                    <?php echo number_format($get->Total)?>
                </a>
            </td>
        </tr>
    <?php } ?>
        <tr style="background-color: #D3D3D3;">
            <th class="text-left">Total Via Transfer</th>
            <th colspan="4"  class="text-right"><?php foreach($getTotalRek as $row){ echo number_format($row->GrandTotal);}?></th> 
        </tr>
    </tbody>
    <tbody>
        <?php
        $no=1;
        foreach ($getDataKas as $get) {?>
        <tr style="height: 50px;">
            <td class="text-center"><?php echo $no++;?></td>
            <td><?php echo $get->nama_suplier?></td>
            <td class="text-center"><?php echo $get->nama_rek?></td>
            <td class="text-center"><?php echo $get->nomor_rek?></td>
            <td class="text-right">
                <a onclick="view(this.id)" id="<?php echo $get->SuplierID?>">
                    <input type="hidden" id="tglAwal" value="<?php echo $tglAwal?>">
                    <input type="hidden" id="tglAkhir" value="<?php echo $tglAkhir?>">
                    <?php echo number_format($get->Total)?>
                </a>
            </td>
        </tr>
    <?php } ?>
        <tr style="background-color: #D3D3D3;">
            <th class="text-left">Total Kas Bon</th>
            <th colspan="4"  class="text-right"><?php foreach($getTotalKas as $row){ echo number_format($row->GrandTotal);}?></th> 
        </tr>
    </tbody>
    <tfoot>
        <tr style="background-color: #808080;">
            <th class="text-left">Grand Total</th>
            <th colspan="4" class="text-right"><?php foreach($getDataTotal as $row){ echo number_format($row->GrandTotal);}?></th>
        </tr>
    </tfoot>
</table>
<div class="form-group">
    <tr>
        <h4><strong> Terbilang : <?php echo $terbilang?> Rupiah</strong></h4>
    </tr>
</div>
<br>
<div class="form-group">
    <?php foreach($getKasBon as $kb){ 
        if($kb->Bulan == 1){
                    $bulan = "Januari";
                }elseif($kb->Bulan == 2){
                    $bulan = "Februari";
                }elseif($kb->Bulan == 3){
                    $bulan = "Maret";
                }elseif($kb->Bulan == 4){
                    $bulan = "April";
                }elseif($kb->Bulan == 5){
                    $bulan = "Mei";
                }elseif($kb->Bulan == 6){
                    $bulan = "Juni";
                }elseif($kb->Bulan == 7){
                    $bulan = "Juli";
                }elseif($kb->Bulan == 8){
                    $bulan = "Agustus";
                }elseif($kb->Bulan == 9){
                    $bulan = "September";
                }elseif($kb->Bulan == 10){
                    $bulan = "Oktober";
                }elseif($kb->Bulan == 11){
                    $bulan = "November";
                }else{
                    $bulan = "Desember";
                }
    ?>
    <tr>
        <h4><strong> Kas Bon Bulan <?php echo $bulan;?> <?php echo $kb->Tahun;?> Periode <?php echo $kb->Periode;?> &emsp;&emsp;&ensp; : Rp. <?php echo number_format($kb->Jumlah);?></strong></h4>
    </tr>
    <tr>
        <h4><strong> Realisasi Belanja Kas Bon &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;<u>: Rp. <?php foreach($getTotalKas as $row){ echo number_format($row->GrandTotal);}?></u></strong></h4>
    </tr>
    <tr>
        <?php foreach($getSisa as $sisa){ ?>
            <?php if($sisa->Sisa < 0) { ?>
        <h4><strong> Sisa yang harus dibayar/ dikembalikan &emsp;&emsp;&emsp;: Rp. (<?php echo number_format(abs($sisa->Sisa));?>)</strong></h4>
            <?php }else{ ?>
        <h4><strong> Sisa yang harus dibayar/ dikembalikan &emsp;&emsp;&ensp;: Rp. <?php echo number_format($sisa->Sisa);?></strong></h4>
            <?php } } ?>
    </tr>
<?php } ?>
</div>
<div class="form-group">
    
</div>
<table class="table table-bordered table-hover table-striped" border="1">
    <thead>
        <tr>
            <th class="text-center">Di Buat Oleh</th>
            <th class="text-center">Di Cek Oleh</th>
            <th class="text-center">Di Setujui Oleh</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($getApprove as $app) {
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
                        <?php if($app->Komplit == 1){?>
                            <img src="<?php echo base_url('tandatangan/Karyawan/4958.png');?>" style="height: 100px;">
                        <?php }else{
                            echo "";
                        } ?>
                    </strong>
                </h3>
            </td>
            <td class="text-center"  width="200" style="vertical-align: middle; text-align: center;">
                <h3>
                    <strong>
                        <?php if($app->Approve_kabag == 1){?>
                            <img src="<?php echo base_url('tandatangan/Karyawan/1459.png');?>" style="height: 100px;">
                        <?php }else{
                            echo "";
                        } ?>
                    </strong>
                </h3>
            </td>
            <td class="text-center"  width="200" style="vertical-align: middle; text-align: center;">
            <h3>
                    <strong>
                        <?php 
                        if($app->Approve_vgmBy == 'BAMBANG HARYANTO'){
                            if($app->Approve_vgm == 1){ ?>
                                <img src="<?php echo base_url('tandatangan/Karyawan/1486.png');?>" style="height: 100px;">
                            <?php }else{
                                echo "";
                            }
                        }else{
                            if($app->Approve_vgm == 1){ ?>
                                <img src="<?php echo base_url('tandatangan/Karyawan/1468.png');?>" style="height: 100px;">
                            <?php }else{
                                echo "";
                            }
                        }
                        ?>
                    </strong>
                </h3>
            </td>
        </tr>
        <tr>
            <td>Nama &nbsp;&nbsp;&nbsp;: <?php echo $app->KomplitBy?></td>
            <td>Nama &nbsp;&nbsp;&nbsp;: <?php echo $app->Approve_kabagBy?></td>
            <td>Nama &nbsp;&nbsp;&nbsp;: <?php if($app->Approve_vgmBy == 'BAMBANG HARYANTO'){echo "Minandar";}else{echo "I Made Hartanaya";}?></td>
        </tr>
        <tr>
            <td>Jabatan : OPERATOR</td>
            <td>Jabatan : KABAG/WAKABAG</td>
            <td>Jabatan : <?php if($app->Approve_vgmBy == 'BAMBANG HARYANTO'){echo "VGM";}else{echo "General Manager";}?></td>
        </tr>
        <tr>
            <td>Tanggal : <?php echo date('d-m-Y', strtotime($app->KomplitDate))?></td>
            <td>Tanggal : <?php echo date('d-m-Y', strtotime($app->Approve_kabagDate))?></td>
            <td>Tanggal : <?php echo date('d-m-Y', strtotime($app->Approve_vgmDate))?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<div class="text-left">
    <a target="blank" href="<?php echo base_url('RekapPembayaran/ExportPdfPerSuplierPerPeriode/'.$periode.'/'.$tglAwal.'/'.$tglAkhir);?>" class="btn blue">
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
        var tglAwal  = $('#tglAwal').val();
        var tglAkhir = $('#tglAkhir').val();

        $.ajax({
            type: "POST",
            dataType :"html",
            url : "<?php echo base_url('RekapPembayaran/ModalDetailPersuplier')?>"+"/"+clicked_id+"/"+tglAwal+"/"+tglAkhir,
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