<div>
<table class="table table-bordered table-hover table-striped">
   <thead>
    <tr>
        <th rowspan="3" width="10%" ><img src="<?php echo base_url();?>assets\layouts\layout3\img\logopt.png"></th>
        <th colspan="10" width="60%" class="text-center"><h5><strong>PT. RIAU SAKTI UNITED PLANTATIONS</strong></h5></th>
        <th colspan="2" width="20%" scope="col" >Nomor &nbsp;&nbsp;&nbsp;: 1 Dari 1</th> 
        <input type="hidden" value=""  name="">
    </tr>
    <tr>
       
        <th rowspan="2" colspan="10" width="60%" scope="col" style="text-align: center;"><pre><h5><b>LAPORAN REKAP BULANAN PEMAKAIAN FOTOCOPY DAN RISOGRAPH / SHEET <br><br> PT. RIAU SAKTI UNITED PLANTATIONS</b></h5><h5><strong></strong></h5></pre></th>
        <th colspan="2" width="20%" scope="col" >Bulan &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $bulan ?></th>
    </tr> 
    <tr>
        
        <th  colspan="13">Tahun &nbsp;&nbsp;&nbsp;: <?php echo $tahun ?></th>
        
    </tr>
</table>
<table class="table table-bordered table-hover table-striped" border="1">
    <thead>
        <tr class="bordered" >
            <td rowspan="3" clospan="1" class="text-center"><br><br><strong>NO</strong></td>
            <td rowspan="3" clospan="1" class="text-center"><br><br><strong>DIV</strong></td>
            <td rowspan="3" clospan="1" class="text-center"><br><br><strong>DEPT / BAG</strong></td>
            <td rowspan="1" colspan="9" class="text-center"><strong>Fotocopy</strong></td>
            <td rowspan="1" colspan="9" class="text-center"><strong>Risograph/Sheet</strong></td>
            <td rowspan="3" clospan="1" class="text-center"><br><br><strong>TOTAL<br>(RP)</strong></td>
            <td rowspan="3" clospan="1" class="text-center"><font color="#006c12"><br><br>%</font></td>
        </tr>
        <tr class="bordered">
            <td rowspan="1" colspan="5" class="text-center"><strong>Kertas HVS/Fotocopy</strong></td>
            <td rowspan="1" colspan="4" class="text-center"><strong>BURAM</strong></td>
            <td rowspan="1" colspan="5" class="text-center"><strong>Kertas HVS/Fotocopy</strong></td>
            <td rowspan="1" colspan="4" class="text-center"><strong>BURAM</strong></td>
        </tr>
        <tr class="bordered">
           <td rowspan="1" colspan="1" class="text-center"><strong>F4</strong></td>
           <td rowspan="1" colspan="1" class="text-center"><strong>A4</strong></td>
           <td rowspan="1" colspan="1" class="text-center"><strong>B5</strong></td>
           <td rowspan="1" colspan="1" class="text-center"><strong>A3</strong></td>
           <td rowspan="1" colspan="1" class="text-center"><strong>B4</strong></td>
           <td rowspan="1" colspan="1" class="text-center"><strong>F4</strong></td>
           <td rowspan="1" colspan="1" class="text-center"><strong>A4</strong></td>
           <td rowspan="1" colspan="1" class="text-center"><strong>B5</strong></td>
           <td rowspan="1" colspan="1" class="text-center"><strong>B4</strong></td>
                                <!--RISOGRAPH/SHEET -->
           <td rowspan="1" colspan="1" class="text-center"><strong>F4</strong></td>
           <td rowspan="1" colspan="1" class="text-center"><strong>A4</strong></td>
           <td rowspan="1" colspan="1" class="text-center"><strong>B5</strong></td>
           <td rowspan="1" colspan="1" class="text-center"><strong>A3</strong></td>
           <td rowspan="1" colspan="1" class="text-center"><strong>B4</strong></td>
           <td rowspan="1" colspan="1" class="text-center"><strong>F4</strong></td>
           <td rowspan="1" colspan="1" class="text-center"><strong>A4</strong></td>
           <td rowspan="1" colspan="1" class="text-center"><strong>B5</strong></td>
           <td rowspan="1" colspan="1" class="text-center"><strong>B4</strong></td>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no=1;
        foreach($departemen as $a ){
        ?>
       <tr height="30">
            <td class="text-center">
                <?php echo $no++?>
            </td>
            <td class="text-center">
                <?php echo $a->Divisi ?>
            </td>
            <td class="text-center">
                <?php
                    echo $a->Singkatan_dept;
                ?>
            </td>
            <td class="text-center">
               <?php foreach($jumlahtotal as $b){
                    if($a->ID_dept == $b->ID_dept && $b->Type_kertas==1 && $b->ID_kertas==58){
                        echo number_format($b->Totalkertasfotocopy);
                    }
                }?>
            </td>
            <td class="text-center">
                <?php foreach($jumlahtotal as $b){
                    if($a->ID_dept == $b->ID_dept && $b->Type_kertas==1 && $b->ID_kertas==59){
                        echo number_format($b->Totalkertasfotocopy);
                    }
                }?>
            </td>
            <td class="text-center">
                <?php foreach($jumlahtotal as $b){
                    if($a->ID_dept == $b->ID_dept && $b->Type_kertas==1 && $b->ID_kertas==60){
                        echo number_format($b->Totalkertasfotocopy);
                    }
                }?>
            </td>
            <td class="text-center">
                <?php foreach($jumlahtotal as $b){
                    if($a->ID_dept == $b->ID_dept && $b->Type_kertas==1 && $b->ID_kertas==61){
                       echo number_format($b->Totalkertasfotocopy);
                    }
                }?>
            </td>
            <td class="text-center">
                <?php foreach($jumlahtotal as $b){
                    if($a->ID_dept == $b->ID_dept && $b->Type_kertas==1 && $b->ID_kertas==66){
                       echo number_format($b->Totalkertasfotocopy);
                    }
                }?>
            </td>
            <td class="text-center">
                <?php foreach($jumlahtotal as $b){
                    if($a->ID_dept == $b->ID_dept && $b->Type_kertas==1 && $b->ID_kertas==63){
                        echo number_format($b->Totalkertasfotocopy);
                    }
                }?>
            </td>
            <td class="text-center">
                <?php foreach($jumlahtotal as $b){
                    if($a->ID_dept == $b->ID_dept && $b->Type_kertas==1 && $b->ID_kertas==62){
                        echo number_format($b->Totalkertasfotocopy);
                    }
                }?>
            </td>
            <td class="text-center">
                <?php foreach($jumlahtotal as $b){
                    if($a->ID_dept == $b->ID_dept && $b->Type_kertas==1 && $b->ID_kertas==64){
                        echo number_format($b->Totalkertasfotocopy);
                    }
                }?>
            </td>
            <td class="text-center">
                <?php foreach($jumlahtotal as $b){
                    if($a->ID_dept == $b->ID_dept && $b->Type_kertas==1 && $b->ID_kertas==65){
                        echo number_format($b->Totalkertasfotocopy);
                    }
                }?>
            </td>
            <td class="text-center">
                <?php foreach($jumlahtotal as $b){
                    if($a->ID_dept == $b->ID_dept && $b->Type_kertas==0 && $b->ID_kertas==68){
                        echo number_format($b->Totalkertasfotocopy);
                    }
                }?>
            </td>
            <td class="text-center">
                <?php foreach($jumlahtotal as $b){
                    if($a->ID_dept == $b->ID_dept && $b->Type_kertas==0 && $b->ID_kertas==67){
                        echo number_format($b->Totalkertasfotocopy);
                    }
                }?>
            </td>
            <td class="text-center">
                <?php foreach($jumlahtotal as $b){
                    if($a->ID_dept == $b->ID_dept && $b->Type_kertas==0 && $b->ID_kertas==69){
                        echo number_format($b->Totalkertasfotocopy);
                    }
                }?>
            </td>
            <td class="text-center">
                <?php foreach($jumlahtotal as $b){
                    if($a->ID_dept == $b->ID_dept && $b->Type_kertas==0 && $b->ID_kertas==70){
                        echo number_format($b->Totalkertasfotocopy);
                    }
                }?>
            </td>
            <td class="text-center">
                <?php foreach($jumlahtotal as $b){
                    if($a->ID_dept == $b->ID_dept && $b->Type_kertas==0 && $b->ID_kertas==71){
                        echo number_format($b->Totalkertasfotocopy);
                    }
                }?>
            </td>
            <td class="text-center">
                <?php foreach($jumlahtotal as $b){
                    if($a->ID_dept == $b->ID_dept && $b->Type_kertas==0 && $b->ID_kertas==73){
                        echo number_format($b->Totalkertasfotocopy);
                    }
                }?>
            </td>
            <td class="text-center">
                <?php foreach($jumlahtotal as $b){
                    if($a->ID_dept == $b->ID_dept && $b->Type_kertas==0 && $b->ID_kertas==72){
                        echo number_format($b->Totalkertasfotocopy);
                    }
                }?>
            </td>
            <td class="text-center">
                <?php foreach($jumlahtotal as $b){
                    if($a->ID_dept == $b->ID_dept && $b->Type_kertas==0 && $b->ID_kertas==74){
                        echo number_format($b->Totalkertasfotocopy);
                    }
                }?>
            </td>
            <td class="text-center">
                <?php foreach($jumlahtotal as $b){
                    if($a->ID_dept == $b->ID_dept && $b->Type_kertas==0 && $b->ID_kertas==75){
                        echo number_format($b->Totalkertasfotocopy);
                    }
                }?>
            </td>
            <td class="text-right">
                <?php
                    foreach($jumlahuang as $e){
                        if ($a->ID_dept == $e->ID_dept) {
                            echo number_format($e->Total);
                        }
                    }
                ?>
            </td>
            <td class="text-center">
                <?php
                    foreach($persentaseperdept as $f){
                       if($a->ID_dept == $f->ID_dept){
                        echo number_format($f->persentase,2);
                       }
                    }
                ?>
            </td>
        </tr>
        <?php }?>
        <tr>
            <td colspan="3" class="text-center" style="background-color: #62d3dd"><strong>TOTAL KERTAS</strong></td>
            <td class="text-center" style="background-color: #62d3dd">
               <?php 
                foreach($get_total as $c){
                    if($c->ID_kertas == 58){
                        echo number_format($c->TotalkertasperID);
                    }
                }
               ?>
            </td>
            <td class="text-center" style="background-color: #62d3dd">
               <?php 
                foreach($get_total as $c){
                    if($c->ID_kertas == 59){
                        echo number_format($c->TotalkertasperID);
                    }
                }
            ?>
            </td>
            <td class="text-center" style="background-color: #62d3dd">
                 <?php 
                foreach($get_total as $c){
                    if($c->ID_kertas == 60){
                        echo number_format($c->TotalkertasperID);
                    }
                }
            ?>
            </td>
            <td class="text-center" style="background-color: #62d3dd">
                 <?php 
                foreach($get_total as $c){
                    if($c->ID_kertas == 61){
                         echo number_format($c->TotalkertasperID);
                    }
                }
            ?>
            </td>
            <td class="text-center" style="background-color: #62d3dd">
                 <?php 
                foreach($get_total as $c){
                    if($c->ID_kertas == 66){
                         echo number_format($c->TotalkertasperID);
                    }
                }
            ?>
            </td>
            <td class="text-center" style="background-color: #62d3dd">
                 <?php 
                foreach($get_total as $c){
                    if($c->ID_kertas == 63){
                         echo number_format($c->TotalkertasperID);
                    }
                }
            ?>
            </td>
            <td class="text-center" style="background-color: #62d3dd">
                 <?php 
                foreach($get_total as $c){
                    if($c->ID_kertas == 62){
                         echo number_format($c->TotalkertasperID);
                    }
                }
            ?>
            </td>
            <td class="text-center" style="background-color: #62d3dd">
                 <?php 
                foreach($get_total as $c){
                    if($c->ID_kertas == 64){
                         echo number_format($c->TotalkertasperID);
                    }
                }
            ?>
            </td>
            <td class="text-center" style="background-color: #62d3dd">
                 <?php 
                foreach($get_total as $c){
                    if($c->ID_kertas == 65){
                         echo number_format($c->TotalkertasperID);
                    }
                }
            ?>
            </td>
            <td class="text-center" style="background-color: #62d3dd">
                 <?php 
                foreach($get_total as $c){
                    if($c->ID_kertas == 68){
                         echo number_format($c->TotalkertasperID);
                    }
                }
            ?>
            </td>
            <td class="text-center" style="background-color: #62d3dd">
                 <?php 
                foreach($get_total as $c){
                    if($c->ID_kertas == 67){
                         echo number_format($c->TotalkertasperID);
                    }
                }
            ?>
            </td>
            <td class="text-center" style="background-color: #62d3dd">
                 <?php 
                foreach($get_total as $c){
                    if($c->ID_kertas == 69){
                         echo number_format($c->TotalkertasperID);
                    }
                }
            ?>
            </td>
            <td class="text-center" style="background-color: #62d3dd">
                <?php 
                foreach($get_total as $c){
                    if($c->ID_kertas == 70){
                         echo number_format($c->TotalkertasperID);
                    }
                }
            ?>
            </td>
            <td class="text-center" style="background-color: #62d3dd">
                 <?php 
                foreach($get_total as $c){
                    if($c->ID_kertas == 71){
                        echo number_format($c->TotalkertasperID);
                    }
                }
            ?>
            </td>
            <td class="text-center" style="background-color: #62d3dd">
                 <?php 
                foreach($get_total as $c){
                    if($c->ID_kertas == 73){
                         echo number_format($c->TotalkertasperID);
                    }
                }
            ?>
            </td>
            <td class="text-center" style="background-color: #62d3dd">
                 <?php 
                foreach($get_total as $c){
                    if($c->ID_kertas == 72){
                         echo number_format($c->TotalkertasperID);
                    }
                }
            ?>
            <td class="text-center" style="background-color: #62d3dd">
                 <?php 
                foreach($get_total as $c){
                    if($c->ID_kertas == 74){
                         echo number_format($c->TotalkertasperID);
                    }
                }
            ?>
            </td>
            <td class="text-center" style="background-color: #62d3dd">
                <?php 
                foreach($get_total as $c){
                    if($c->ID_kertas == 75){
                         echo number_format($c->TotalkertasperID);
                    }
                }
            ?>
            </td>
            <td colspan="2" rowspan="2" class="text-right" style="background-color: #32C5D2"> <br><h4 style="color: #ffffff"><strong>RP.
                <?php foreach($jumlahtotaluang as $e){
                   echo number_format($e->JumlahTotalUang);
                }?>
                
            </strong></h4></td>
        </tr>
        <tr>
            <td colspan="3" class="text-center" style="background-color: #d3f3f5"><strong>STANDAR HARGA</strong></td>
            <td class="text-center" style="background-color: #d3f3f5">
                 <?php
                    foreach($masterkertas as $d){
                        if($d->ID_kertas==58 && $d->Harga_perside != 0){
                            echo $d->TotalHargaFotocopy;
                        }
                    }
                 ?>
            </td>
            <td class="text-center" style="background-color: #d3f3f5">
                 <?php
                    foreach($masterkertas as $d){
                        if($d->ID_kertas==59 && $d->Harga_perside != 0){
                            echo $d->TotalHargaFotocopy;
                        }
                    }
                 ?>
            </td>
            <td class="text-center" style="background-color: #d3f3f5">
                 <?php
                    foreach($masterkertas as $d){
                        if($d->ID_kertas==60 && $d->Harga_perside != 0){
                            echo $d->TotalHargaFotocopy;
                        }
                    }
                 ?>
            </td>
            <td class="text-center" style="background-color: #d3f3f5">
             <?php
                    foreach($masterkertas as $d ){
                        if($d->ID_kertas==61 && $d->Harga_perside != 0){
                            echo $d->TotalHargaFotocopy;
                        }
                    }
                 ?>
            </td>
            <td class="text-center" style="background-color: #d3f3f5">
                 <?php
                    foreach($masterkertas as $d){
                        if($d->ID_kertas==66 && $d->Harga_perside != 0){
                            echo $d->TotalHargaFotocopy;
                        }
                    }
                 ?>
            </td>
            <td class="text-center" style="background-color: #d3f3f5">
                <?php
                    foreach($masterkertas as $d){
                        if($d->ID_kertas==63 && $d->Harga_perside != 0){
                            echo $d->TotalHargaFotocopy;
                        }
                    }
                 ?>
            </td>
            <td class="text-center" style="background-color: #d3f3f5">
               <?php
                    foreach($masterkertas as $d){
                        if($d->ID_kertas==62 && $d->Harga_perside != 0){
                            echo $d->TotalHargaFotocopy;
                        }
                    }
                 ?>
            </td>
            <td class="text-center" style="background-color: #d3f3f5">
                <?php
                    foreach($masterkertas as $d){
                        if($d->ID_kertas==64 && $d->Harga_perside != 0){
                            echo $d->TotalHargaFotocopy;
                        }
                    }
                 ?>
            </td>
            <td class="text-center" style="background-color: #d3f3f5">
                <?php
                    foreach($masterkertas as $d){
                        if($d->ID_kertas==65 && $d->Harga_perside != 0){
                            echo $d->TotalHargaFotocopy;
                        }
                    }
                 ?>
            </td>
            <td class="text-center" style="background-color: #d3f3f5">
               <?php
                    foreach($masterkertas as $d){
                        if($d->ID_kertas==68 && $d->Harga_perside != 0){
                            echo $d->TotalHargaFotocopy;
                        }
                    }
                 ?>
            </td>
            <td class="text-center" style="background-color: #d3f3f5">
                <?php
                    foreach($masterkertas as $d){
                        if($d->ID_kertas==67 && $d->Harga_perside != 0){
                            echo $d->TotalHargaFotocopy;
                        }
                    }
                 ?>
            </td>
            <td class="text-center" style="background-color: #d3f3f5">
                <?php
                    foreach($masterkertas as $d){
                        if($d->ID_kertas==69 && $d->Harga_perside != 0){
                            echo $d->TotalHargaFotocopy;
                        }
                    }
                 ?>
            </td>
            <td class="text-center" style="background-color: #d3f3f5">
                <?php
                    foreach($masterkertas as $d){
                        if($d->ID_kertas==70 && $d->Harga_perside != 0){
                            echo $d->TotalHargaFotocopy;
                        }
                    }
                 ?>
            </td>
            <td class="text-center" style="background-color: #d3f3f5">
                <?php
                    foreach($masterkertas as $d){
                        if($d->ID_kertas==71 && $d->Harga_perside != 0){
                            echo $d->TotalHargaFotocopy;
                        }
                    }
                 ?>
            </td>
            <td class="text-center" style="background-color: #d3f3f5">
               <?php
                    foreach($masterkertas as $d){
                        if($d->ID_kertas==73 && $d->Harga_perside != 0){
                            echo $d->TotalHargaFotocopy;
                        }
                    }
                 ?>
            </td>
            <td class="text-center" style="background-color: #d3f3f5">
                <?php
                    foreach($masterkertas as $d){
                        if($d->ID_kertas==72 && $d->Harga_perside != 0){
                            echo $d->TotalHargaFotocopy;
                        }
                    }
                 ?>
            </td>
            <td class="text-center" style="background-color: #d3f3f5">
                <?php
                    foreach($masterkertas as $d){
                        if($d->ID_kertas==74 && $d->Harga_perside != 0){
                            echo $d->TotalHargaFotocopy;
                        }
                    }
                 ?>
            </td>
            <td class="text-center" style="background-color: #d3f3f5">
                <?php
                    foreach($masterkertas as $d){
                        if($d->ID_kertas==75 && $d->Harga_perside != 0){
                            echo $d->TotalHargaFotocopy;
                        }
                    }
                 ?>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="text-center" ><strong>PERSENTASE</strong></td>
            <td colspan="5" class="text-left" >Jumlah Kertas : 
                <?php foreach($jmlseluruhkertas as $jml){
                    if($jml->Type_kertas == 1){
                        echo number_format($jml->Totalseluruhkertas);
                    }
                }?>  
                 <strong>Lembar</strong>
            </td>
            <td colspan="4" class="text-right" >
               <?php foreach($persentase as $prsnt){
                    if($prsnt->Type_kertas == 1){
                        echo $prsnt->TotalHasil;
                    }
                }?>
             %</td>
            <td colspan="5" class="text-left" >Jumlah Kertas : 
                <?php foreach($jmlseluruhkertas as $jml){
                    if($jml->Type_kertas == 0){
                        echo number_format($jml->Totalseluruhkertas);
                    }
                }?>  
                 <strong>Lembar</strong>
            </td>
            <td colspan="4" class="text-right">
                 <?php foreach($persentase as $prsnt){
                    if($prsnt->Type_kertas == 0){
                        echo $prsnt->TotalHasil;
                    }
                }?>
             %</td>
            <td colspan="2" class="text-right"><strong>100 %</strong></td>
        </tr>
    </tbody>
</table>
<table class="table table-bordered table-hover table-striped" border="1">
    <thead>
        <tr style="background-color: #32c5d2">
            <td rowspan="1" class="text-center" width="15%"><strong><font color="#034a70">JENIS KERTAS</font></strong></td>
            <td rowspan="1" colspan="5" class="text-center"><strong><font color="#034a70">Kertas HVS</font></strong></td>
            <td rowspan="1" colspan="4" class="text-center"><strong><font color="#034a70">BURAM</font></strong></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan="1" class="text-center">UKURAN</td>
            <td rowspan="1" colspan="1" class="text-center"><strong>F4</strong></td>
            <td rowspan="1" colspan="1" class="text-center"><strong>A4</strong></td>
            <td rowspan="1" colspan="1" class="text-center"><strong>B5</strong></td>
            <td rowspan="1" colspan="1" class="text-center"><strong>A3</strong></td>
            <td rowspan="1" colspan="1" class="text-center"><strong>B4</strong></td>
            <td rowspan="1" colspan="1" class="text-center"><strong>F4</strong></td>
            <td rowspan="1" colspan="1" class="text-center"><strong>A4</strong></td>
            <td rowspan="1" colspan="1" class="text-center"><strong>B5</strong></td>
            <td rowspan="1" colspan="1" class="text-center"><strong>B4</strong></td>
            
        </tr>
        <tr>
            <td rowspan="1" class="text-center">JUMLAH (RIM)</td>
            <td rowspan="1" colspan="1" class="text-center">
                 <?php foreach($jumlahrim as $rim){
                        if($rim->Ukuran == 'F4' && $rim->Jenis_kertas==0){
                            echo round($rim->Jumlahrimperkertas,2);
                        }
                    }?>
            </td>
            <td rowspan="1" colspan="1" class="text-center">
                <?php foreach($jumlahrim as $rim){
                    if($rim->Ukuran == 'A4' && $rim->Jenis_kertas==0){
                        echo round($rim->Jumlahrimperkertas,2);
                    }
                }?>
            </td>
            <td rowspan="1" colspan="1" class="text-center">
                <?php foreach($jumlahrim as $rim){
                    if($rim->Ukuran == 'B5' && $rim->Jenis_kertas==0){
                        echo round($rim->Jumlahrimperkertas,2);
                    }
                }?>
            </td>
            <td rowspan="1" colspan="1" class="text-center">
                <?php foreach($jumlahrim as $rim){
                    if($rim->Ukuran == 'A3' && $rim->Jenis_kertas==0){
                        echo round($rim->Jumlahrimperkertas,2);
                    }
                }?>
            </td>
            <td rowspan="1" colspan="1" class="text-center">
                <?php foreach($jumlahrim as $rim){
                    if($rim->Ukuran == 'B4' && $rim->Jenis_kertas==0){
                        echo round($rim->Jumlahrimperkertas,2);
                    }
                }?>
            </td>
             <td rowspan="1" colspan="1" class="text-center">
            <?php foreach($jumlahrim as $rim){
                if($rim->Ukuran == 'A4' && $rim->Jenis_kertas==1){
                    echo round($rim->Jumlahrimperkertas,2);
                }
            }?>
        </td>
        <td rowspan="1" colspan="1" class="text-center">
            <?php foreach($jumlahrim as $rim){
                if($rim->Ukuran == 'F4' && $rim->Jenis_kertas==1){
                    echo round($rim->Jumlahrimperkertas,2);
                }
            }?>
        </td>
        <td rowspan="1" colspan="1" class="text-center">
            <?php foreach($jumlahrim as $rim){
                if($rim->Ukuran == 'B5' && $rim->Jenis_kertas==1){
                    echo round($rim->Jumlahrimperkertas,2);
                }
            }?>
        </td>
        <td rowspan="1" colspan="1" class="text-center">
            <?php foreach($jumlahrim as $rim){
                if($rim->Ukuran == 'B4' && $rim->Jenis_kertas==1){
                   echo round($rim->Jumlahrimperkertas,2);
                }
            }?>
        </td>
        </tr>
        <tr>
             <?php foreach($totalrim as $tr){?>
                <td rowspan="1" class="text-center">TOTAL (RIM)</td>
                <td rowspan="1" colspan="9" class="text-center">
                   <h4 style="color: red"><strong><?php echo round($tr->JumlahRim,2) ?></strong></h4>
                   
                </td>
            <?php }?>
        </tr>
    </tbody>
</table>
<table class="table table-bordered table-hover table-striped" >
    <thead>
        <tr>
            <th class="text-center" width="30%">OPERATOR</th>
            <th class="text-center" width="30%">ADM SKT</th>
            <th class="text-center" width="30%">KD. SKT </th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($approve as $app){
                if($app->Approve_status2 == 1){
                    $approve2 = "APPROVE";
                }else{
                    $approve2 = "";
                }if ($app->Approve_status3 == 1) {
                    $approve3 = "APPROVE";
                }else{
                    $approve3 = "";
                }

        ?>
        <tr height="100"> 
            <td class="text-center"  width="200" style="vertical-align: middle; text-align: center;">
                <h3>
                    <strong>
                        APPROVE
                    </strong>
                </h3>
            </td>
            <td class="text-center" width="200" style="vertical-align: middle; text-align: center;">
                <h3>
                    <strong>
                        <?php echo $approve2 ?>
                    </strong>
                </h3>
            </td>
            <td class="text-center" width="200" style="vertical-align: middle; text-align: center;">
                <h3>
                    <strong>
                         <?php echo $approve3; ?>
                    </strong>
                </h3>
            </td>
        </tr> 
        <tr>    
        <td><p>
            Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 
                ZULKIFLI B <strong></strong> <br>
            Jabatan &nbsp;&nbsp; :
                &nbsp;OPERATOR<br>
            Tanggal &nbsp;&nbsp; : 
                <?php if($app->Komplit == 1){
                    echo date('d-m-Y',strtotime($app->Komplit_date));
                }else{
                    echo '';
                } ?>
        </p></td>
        <td><p>
            Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 
                <?php echo $app->Approve_by2 ?> <strong></strong> <br>
            Jabatan &nbsp;&nbsp; :
                &nbsp;KASI SKT <br>
            Tanggal &nbsp;&nbsp; : 
                <?php if($app->Approve_status2 == 1){
                    echo date('d-m-Y',strtotime($app->Approve_date2)) ;
                }else{
                    echo '';
                }?>
        </p></td>
        <td><p>
            Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 
                <?php echo $app->Approve_by3 ?> 
            <strong></strong> <br>
            Jabatan &nbsp;&nbsp; :
                &nbsp;KD.SKT <br>
            Tanggal &nbsp;&nbsp; : 
            <?php if($app->Approve_status3 == 1){
                echo date('d-m-Y',strtotime($app->Approve_date)) ;
            }else{
                echo '';
            }?>
        </p></td>
        </tr> 
        <?php }?>
</tbody>
</table>
<div class="text-left">
    <a href="<?php echo base_url('Monitoringrekapfotocopy/exportexcell/'.$tahun.'/'.$bulan);?>" class="btn green-seagreen">
        <i class="fa fa-file-excel-o"></i> 
         Export To Excell
    </a>
</div> 