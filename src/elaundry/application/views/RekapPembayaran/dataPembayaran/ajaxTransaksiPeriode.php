<?php
    $bulana = array(
        '1'    => 'Januari',
        '2'    => 'Februari',
        '3'    => 'Maret',
        '4'    => 'April',
        '5'    => 'Mei',
        '6'    => 'Juni',
        '7'    => 'Juli',
        '8'    => 'Agustus',
        '9'    => 'September',
        '10'    => 'Oktober',
        '11'    => 'November',
        '12'    => 'Desember',
    );
?>
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
           <th>Periode : <?php echo $periode?> - <?php echo $bulana[$bulan]?> <br><br></th>
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
            <th class="text-center">NO REF</th>
            <th class="text-center">Uraian</th>
            <th colspan="2" class="text-center">QTY</th>
            <th class="text-center">Harga (Rp)</th>
            <th class="text-center">Dapur (Rp)</th>
            <th class="text-center">Snack</th>
            <th class="text-center">Peralatan (Inventaris)</th>
            <th class="text-center">Perawatan Mess</th>
            <th class="text-center">Keterangan</th>
            <!-- <th class="text-center">Action</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        foreach ($getData as $get) {?>
        <tr style="height: 50px;">
            <td class="text-center"><?php echo $no++;?></td>
            <td class="text-center"><?php echo $get->No_ref?></td>
            <td class="text-center"><?php echo $get->nama_item?></td>
            <td class="text-center"><?php echo $get->Quantity?></td>
            <td class="text-center"><?php echo $get->abbr?></td>
            <td class="text-center"><?php echo number_format($get->Harga,2,',','.');?></td>
            <td class="text-center"><?php if($get->kategoriID != '18'){ echo number_format($get->Total,2,',','.');} else{'';}?></td>
            <td class="text-center"></td>
            <td class="text-center"><?php if($get->kategoriID == '18'){ echo number_format($get->Total,2,',','.');} else{'';} ?></td>
            <td class="text-center"></td>
            <td class="text-center"><?php echo $get->Keterangan?></td>
        </tr>
    <?php }?>
    <?php
        $no=1;
        foreach ($getDataTotal as $gt) {?>
        <tr style="height: 50px;">
            <td class="text-center"><strong>Grand Total</strong></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"><strong>Rp. <?php echo number_format($gt->GrandTotal,2,',','.');?></strong></td>
            <td class="text-center"></td>
            <?php foreach($get_dataTotalPeralatan as $get) {?>
            <td class="text-center"><strong>Rp. <?php echo number_format($get->GrandTotalPeralatan,2,',','.');?></strong></td>
        <?php } ?>
            <td class="text-center"></td>
            <td class="text-center"></td>
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
        <?php foreach($getDataApp as $app) {
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
    <?php }?>
    </tbody>
</table>
<div class="text-left">
    <!-- <a target="blank" href="<?php //echo base_url('MonitoringRekapPembelian/exportRekapPerPeriode/'.$periode.'/'.$bulan);?>" class="btn green-seagreen">
        <i class="fa fa-file-excel-o"></i>
        Export Excel
    </a> -->
    <a target="blank" href="<?php echo base_url('MonitoringRekapPembelian/ExportPdfRekapPeriode/'.$periode.'/'.$bulan.'/'.$tahun);?>" class="btn blue">
        <i class="icon-printer"></i>
        Export PDF
    </a>
</div>
</div>


<!-- Modal -->
<!-- <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detail Monitoring :</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="inputdetail" name="iddetail">
                <div id="idDetail">
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Javascript Modal -->
<!-- <script type="text/javascript">
    function detail(clicked_id){
        $.post("<?php echo site_url();?>MonitoringRekapPembelian/ModalDetail?id="+clicked_id, function (data){
            $('#idDetail').html(data);
        });
        $('#MyModal').modal('show');
    }

</script> -->