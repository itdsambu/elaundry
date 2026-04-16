<link href="<?php echo base_url();?>assets/global/css/components-dendy.css" rel="stylesheet" style="text/css"/>
<page orientation="portrait" format="A4">
<html>
<head>
  <title>CETAK PDF</title>
  <style>
    table {
      border-collapse: collapse;
      table-layout: fixed;width: 630px;
    }
    table td {
      word-wrap: break-word;
      width: 20%;
    }
  </style>
</head>
<body>
  <table style="border: 1px">
    <?php
    foreach ($getDataNotaHdr as $hdr) {?>
      <tr>
       <td rowspan="3" style="border: 0.5px; solid; #000;"><img style="width:100px; height:100px;" src="assets\layouts\layout3\img\logopt.png"></td>
         <td style="border: 0.5px; solid; #000; width:450px; text-align:center; font-size:10px;">PT. RIAU SAKTI UNITED PLANTATIONS (PULAU BURUNG)</td>
      <td style="border: 0.5px; solid; #000; width:160px; font-size: 10px;">Dept : SKT</td>
      </tr>
      <tr>
      <td rowspan="2" style="border: 0.5px; solid; #000; width:400px; text-align:center; font-size:12px;"><b>LAPORAN PERTANGGUNG JAWABAN PERJALANAN DINAS</b></td>
      <td style="border: 0.5px; solid; #000; width:160px; font-size: 10px;">Tgl : <?php echo $hdr->TanggalNota?></td>
    </tr>
  <?php }?>
  </table>
  <br>
  <br>
  <table>
    <?php
    foreach ($getDataNotaHdr as $hdr) {?>
      <tr>
        <td style="height: 25px">Tanggal Nota</td>
        <td style="width: 300px">: <?php echo $hdr->TanggalNota?></td>
        <td>Speedboat</td>
        <td>: <?php echo $hdr->Nama_speedboad?></td>
      </tr>
     <tr>
        <td style="height: 25px">No.Lppt</td>
        <td style="width: 300px">: <?php echo $hdr->NoLppt?></td>
        <td>Nama Operator</td>
        <td>: <?php echo $hdr->Nama_sopir?></td>
      </tr>
      <tr>
        <td style="width: 30px;">Keperluan</td>
        <td style="width: 300px; vertical-align: middle;">:<?php echo $hdr->Keperluan?></td>
        <td style="width: 30px; vertical-align: top;">Route</td>
        <td style="width: 5px; vertical-align: bottom;">: <?php echo str_replace("\r\n", "<br/>",$hdr->Rute)?></td>
      </tr>
    <?php }?>
  </table>
  <br>
  <div align="center">
  <table align="center" width="100%" cellpadding="0" cellspacing="0" style="border: 0.5px; solid; #000; font-size: 12px;">
    <tr>
      <th rowspan="2"  style="border: 0.5px; solid; #000; width:15%; height: 20px; font-size: 13px; text-align: center; vertical-align: middle;">No</th>
      <th colspan="2"  style="border: 0.5px; solid; #000; width:60%; height: 20px; font-size: 13px; text-align: center;vertical-align: middle;">Tanggal</th>
      <th rowspan="2"  style="border: 0.5px; solid; #000; width:20%; height: 20px; font-size: 13px; text-align: center;vertical-align: middle;">Jam</th>
    </tr>
    <tr>
      <th style="border: 0.5px; solid; #000; width:30%; height: 20px; font-size: 13px; text-align: center;vertical-align: middle;">Berangkat</th>
      <th style="border: 0.5px; solid; #000; width:30%; height: 20px; font-size: 13px; text-align: center;vertical-align: middle;">Kembali</th>
    </tr>
    <?php 
    $no=1;
    foreach ($getDetailPerjalanan as $prj)?>
    <th style="border: 0.5px; solid; #000; width:15%; height: 20px; font-size: 13px; text-align: center; vertical-align: middle;"><?php echo $no++?></th>
    <th style="border: 0.5px; solid; #000; width:30%; height: 20px; font-size: 13px; text-align: center;vertical-align: middle;"><?php echo $prj->Tgl_berangkat?></th>
    <th style="border: 0.5px; solid; #000; width:30%; height: 20px; font-size: 13px; text-align: center;vertical-align: middle;"><?php echo $prj->Tgl_kembali?></th>
    <th style="border: 0.5px; solid; #000; width:20%; height: 20px; font-size: 13px; text-align: center;vertical-align: middle;"><?php echo date('H:i:s',strtotime($prj->Jam))?></th>
    <?php ?>
  </table>
</div>
  <br>
  <br>
  <table align="center" width="100%" cellpadding="0" cellspacing="0" style="border: 0.5px; solid; #000; font-size: 12px;">
    <tr>
        <th style="border: 0.5px; solid; #000; width:15%; height: 20px; font-size: 13px; text-align: center; vertical-align: middle;">No</th>
        <th style="border: 0.5px; solid; #000; width:25%; height: 20px; font-size: 13px; text-align: center">Keterangan</th>
        <th style="border: 0.5px; solid; #000; width:10%; height: 20px; font-size: 13px; text-align: center">Volume</th>
        <th style="border: 0.5px; solid; #000; width:10%; height: 20px; font-size: 13px; text-align: center">Satuan</th>
        <th style="border: 0.5px; solid; #000; width:20%; height: 20px; font-size: 13px; text-align: center">Harga (Rp)</th>
        <th style="border: 0.5px; solid; #000; width:20%; height: 20px; font-size: 13px; text-align: center">Total</th>
    </tr>
    <?php 
    $no=1; 
    foreach ($getDataNotaDtl as $dtl) {?>
            <tr>
              <td style="border: 0.5px; solid; #000; width:15%; height: 20px; font-size: 13px; text-align: center; vertical-align: middle;"><?php echo $no++;?></td>
              <td style="border: 0.5px; solid; #000; width:25%; height: 20px; font-size: 13px; text-align: center"><?php echo $dtl->Keterangan?></td>
              <td style="border: 0.5px; solid; #000; width:10%; height: 20px; font-size: 13px; text-align: center"><?php echo $dtl->Volume?></td>
              <td style="border: 0.5px; solid; #000; width:10%; height: 20px; font-size: 13px; text-align: center"><?php echo $dtl->Nama?></td>
              <td style="border: 0.5px; solid; #000; width:20%; height: 20px; font-size: 13px; text-align: right;"><?php echo $dtl->Harga?></td>
              <td style="border: 0.5px; solid; #000; width:20%; height: 20px; font-size: 13px; text-align: right;"><?php echo $dtl->Total?></td>
            </tr>
    <?php } ?>
    <?php
    foreach ($getTotalNota as $gt) {?>
    <tr>
        <td colspan="5" style="border-right: 0.5px; text-align: right;"><b>Grand Total</b></td>
        <td style="border: 0.5px; width: 20%; height: 20px; font-size: 13px; text-align: right;"><b><?php echo $gt->Jumlah?></b></td>
    </tr>
  <?php }?>
  </table>
  <br>
  <br>
  <table align="left" width="100%" cellpadding="0" cellspacing="0" style="border: 0.5px; solid; #000; font-size: 12px;">
<tr>
    <th class="text-center" style="border: 0.5px; solid; #000; width:15%; height: 20px; font-size: 13px; text-align: center; vertical-align: middle;">No</th>
    <th class="text-center" style="border: 0.5px; solid; #000; width:25%; height: 20px; font-size: 13px; text-align: center">Beban</th>
    <th class="text-center" style="border: 0.5px; solid; #000; width:25%; height: 20px; font-size: 13px; text-align: center">Jumlah Beban</th>
</tr>
<?php
$n0=1;
foreach ($getDataBeban as $bbn) {?>
<tr>
    <th style="border: 0.5px; solid; #000; width:15%; height: 20px; font-size: 13px; text-align: center; vertical-align: middle;"><?php echo $no++?></th>
    <th style="border: 0.5px; solid; #000; width:25%; height: 20px; font-size: 13px; text-align: center"><?php echo $bbn->Beban?></th>
    <th style="border: 0.5px; solid; #000; width:25%; height: 20px; font-size: 13px; text-align: center"><?php echo $bbn->TotalBeban?></th>
</tr>
<?php }?>
  </table>
  <br>
  <br>
  <?php
  foreach($getDataApprove as $app) {
    if($app->Approve1 == 1 && $app->Approve2 == 1) {
        echo '<b>Dokumen ini telah disetujui secara elektronik. Tanda Tangan Tidak Diperlukan <br> Tanggal Efektif : 01/01/2019</b>';
    }else{
        echo '<b>Dokumen ini BELUM DISETUJUI</b>';
 }
}?>
</body>
</html>
</page>