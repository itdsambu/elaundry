<table class="table table-bordered table-hover table-striped" width="100%" >
   <thead>
    <tr>
        <th rowspan="2" width="8%" class="text-center">
            <img src="<?php echo base_url();?>assets\layouts\layout3\img\logopt.png">
        </th>
        <th colspan="10" width="65%" class="text-center">
            <p>PT RIAU SAKTI UNITED PLANTATIONS</p>
        </th>
        <th>
           <div class="form-group">
               <label class="col-lg-1 control-label">Dept</label>
               <label class="col-lg-6 control-label">: SKT</label>
           </div>
        </th>
    </tr>
    <tr>
        <th colspan="10" class="text-center">
            <p>LAPORAN PENANGGUNG JAWABAN PERJALANAN DINAS</p>
        </th>
        <th>
           <div class="form-group" width="15%">
               <label class="col-lg-1 control-label">Tgl</label>
               <label class="col-lg-6 control-label">: <?php echo date('d-M-Y',strtotime($tglAwal))?> s.d <?php echo  date('d-M-Y',strtotime($tglAkhir))?></label>
           </div>
        </th>
    </tr>
   </thead>
</table>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>
                <div class="row">
                    <div class="col-md-12">
                        <?php foreach($getDataNotaHdr as $get){?>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">NO.LPPT </label>
                                <label class="col-lg-7 control-label"> : <?php echo $get->NoLppt?></label>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Nama Operator </label>
                                <label class="col-lg-7 control-label"> : <?php echo $get->Nama_sopir?></label>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Tanggal Berangkat </label>
                                <label class="col-lg-7 control-label"> : <?php echo date('d-M-Y',strtotime($get->TanggalBerangkat))?></label>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Keperluan </label>
                                <label class="col-lg-8 control-label"> : <?php echo $get->Keperluan?></label>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Jam </label>
                                <label class="col-lg-7 control-label"> : <?php echo $get->JamBerangkat?></label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Speedboat </label>
                                <label class="col-lg-7 control-label"> : <?php echo $get->Nama_speedboad?></label>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Route </label>
                                <label class="col-lg-7 control-label"> : <?php echo $get->Nama_sopir?></label>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Tanggal Kembali </label>
                                <label class="col-lg-7 control-label"> : <?php echo date('d-M-Y',strtotime($get->TanggalKembali))?></label>
                            </div>
                        </div>
                        <?php }?>
                    </div>                            
                </div>
            </th>
        </tr>
    </thead>
</table>
<div class="form-group">   
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr bgcolor="#dbdbdb">
                <th class="text-center">No</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Volume</th>
                <th class="text-center">Satuan</th>
                <th class="text-center">Harga (Rp)</th>
                <th class="text-center">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
            foreach($getDataNotaDtl as $dtl){?>
            <tr style="height: 50px">
                <td class="text-center"><?php echo $no++?></td>
                <td class="text-left"><?php echo $dtl->Keterangan?></td>
                <td class="text-center"><?php echo $dtl->Volume?></td>
                <td class="text-center"><?php echo $dtl->Nama?></td>
                <td class="text-center">Rp.<?php echo number_format($dtl->Harga,0,',','.')?></td>
                <td class="text-center">Rp.<?php echo number_format($dtl->Total,0,',','.')?></td>
            </tr>
            <?php }?>
        </tbody>
        <tfoot>
            <?php 
            $no=1;
            foreach($getTotalNota as $tt){?>
            <tr>
                <td class="text-right" colspan="5">Grade Total</td>
                <td class="text-right">Rp.<?php echo number_format($tt->Jumlah,0,',','.')?></td>
            </tr>
            <?php }?>
        </tfoot>
    </table>
</div>
<div class="form-group">
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th class="text-center">Nomor</th>
            <th class="text-center">Beban</th>
            <th class="text-center">Total Bagi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no=1;
        foreach($getDataBeben as $bbn){?>
        <tr>
            <td class="text-center"><?php echo $no++?></td>
            <td class="text-left"><?php echo $bbn->Beban?></td>
            <td class="text-right">Rp.<?php echo number_format($bbn->TotalBeban,0,',','.')?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
</div>
<div class="form-group">
    <?php foreach($getDataApprove as $app) { ?>
        <?php if($app->Approve1 == 1 && $app->Approve2 == 1) {
            echo "<b>Dokumen ini telah disetujui secara elektronik. Tanda Tangan Tidak Diperlukan <br> Tanggal Efektif : 01/01/2019</b>";
        }else{
            echo '';
        }
    }?>
</div>
<div class="form-group">
    <a href="<?php echo base_url('MonitorNotaPerjalananDinas/'.$tglAwal.'/'.$tglAkhir.'/'.$speedID)?>" class="btn btn-sm green-meadow">
        <i class="fa fa-file-excel-o"></i>
        Excel
    </a>
</div>