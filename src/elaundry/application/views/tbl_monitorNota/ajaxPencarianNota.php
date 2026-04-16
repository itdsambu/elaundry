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
<div class="form-group">   
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr bgcolor="#dbdbdb">
                <th class="text-center">No</th>
                <th class="text-center">No Lppt</th>
                <th class="text-center">Tanggal Nota</th>
                <th class="text-center">Speedboat</th>
                <th class="text-center">Route</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
            foreach($getDataNotaHdr as $hdr){?>
            <tr style="height: 50px">
                <td class="text-center"><?php echo $no++?></td>
                <td class="text-left"><?php echo $hdr->NoLppt?></td>
                <td class="text-center"><?php echo date('d-M-Y',strtotime($hdr->TanggalNota))?></td>
                <td class="text-center"><?php echo $hdr->Nama_speedboad?></td>
                <td class="text-center"><?php echo $hdr->Rute?></td>
                <td class="text-center">
                    <a href="<?php echo base_url('MonitorNotaPerjalananDinas/detailNota/'.$hdr->NotaHeaderID);?>" class="btn green-meadow">
                        <i class="fa fa-eye"></i>
                    Detail</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
        <tfoot>
            <!-- <?php 
            $no=1;
            foreach($getTotalNota as $tt){?>
            <tr>
                <td class="text-right" colspan="5">Grade Total</td>
                <td class="text-right">Rp.<?php echo number_format($tt->Jumlah,0,',','.')?></td>
            </tr>
            <?php }?> -->
        </tfoot>
    </table>
</div>
<!-- <div class="form-group">
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
            <td class="text-center"><?php //echo $no++?></td>
            <td class="text-left"><?php //echo $bbn->Beban?></td>
            <td class="text-right">Rp.<?php //echo number_format($bbn->TotalBeban,0,',','.')?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
</div> -->
<!-- <div class="form-group">
    <?php foreach($getDataApprove as $app) { ?>
        <?php if($app->Approve1 == 1 && $app->Approve2 == 1) {
            //echo "<b>Dokumen ini telah disetujui secara elektronik. Tanda Tangan Tidak Diperlukan <br> Tanggal Efektif : 01/01/2019</b>";
        }else{
            //echo '';
        }
    }?>
</div>
<div class="form-group">
    <a href="<?php //echo base_url('MonitorNotaPerjalananDinas/'.$tglAwal.'/'.$tglAkhir.'/'.$speedID)?>" class="btn btn-sm green-meadow">
        <i class="fa fa-file-excel-o"></i>
        Excel
    </a>
</div> -->