<?php
class PDF extends FPDF {
        function Header(){
            
          $abs1 = $this->GetY();
          $this->Line(15, $abs1, 200, $abs1);
          $this->SetX(18);
          $this->Image(base_url().'assets/layouts/layout3/img/logopt.png',17,12,23,23);
          $this->SetXY(47,$this->GetY()+2);
          $this->SetFont('Times','',11);
          $this->Cell(150,5,'PT. RIAU SAKTI UNITED PLANTATIONS',0,0,'C');
          // $this->Cell(12,8,'Dept',0,0,'L');
          // $this->Cell(20,8,': SKT',0,0,'L');
          $this->SetXY(47,$this->GetY()+10);
          $this->Line(45, $this->GetY(), 200, $this->GetY());
          $this->SetFont('Times','B',11);
          $this->MultiCell(150,12,'LAPORAN REKAP BELANJA DAPUR MESS MANAGER',0,'C');
          // $this->SetFont('Times','',10);
          // $this->Cell(12,5,'Periode',0,0,'L');
          // $this->Cell(10,5,':',0,0,'L');
          // $this->SetXY(171,$this->GetY());
          // $this->MultiCell(32,5,$this->tgl_awal.' s/d '.$this->tgl_akhir,0,'L');
          $this->Line(15, $this->GetY()+5, 200, $this->GetY()+5);
          $this->Line(45, $abs1, 45, $this->GetY()+5);
          $this->Line(15, $abs1, 15, $this->GetY()+5);
          $this->Line(200, $abs1, 200, $this->GetY()+5);
          // $this->Line(155, $abs1, 155, $this->GetY()+5);

            $this->Ln(10);
            $this->SetFont('Times','',11);
            $this->SetXY(15,$this->GetY());
            $this->Cell(15,5,'Suplier :',0,'L');
            $this->SetX(30);
            $this->MultiCell(190,5,$this->suplier,0,'L');
            $this->SetXY(15,$this->GetY());
            $this->Cell(15,5,'Periode : ',0,'L');
            $this->SetXY(30,$this->GetY());
            $this->Cell(190,5,$this->tgl_awal.' s/d '.$this->tgl_akhir,0,'L');

          $this->Ln(10);
          $this->SetFont('Times','B',9);
          $this->SetX(15);
          $this->Cell(10,5,'No','LTB',0,'C');
          $this->SetX(25);
          $this->Cell(60,5,'Nama Item','LTB',0,'C');
          $this->SetX(85);
          $this->Cell(15,5,'Quantity','LTB',0,'C');
          $this->SetX(100);
          $this->Cell(15,5,'Satuan','LTB',0,'C');
          $this->SetX(115);
          $this->Cell(30,5,'Total (Rp)','LTBR',0,'C');
          $this->SetX(145);
          $this->Cell(55,5,'Keterangan','LTBR',0,'C');
          $this->Ln(5);

        }

        function Footer(){
            $this->SetY(-35);
            $this->Ln();
            $this->Ln();
            $this->Ln();
            $this->Ln();
            $this->SetX(250);
            $this->Cell(40,4,'Printed By : ');
            $this->Ln();
            $this->SetFont('Times','I',8);
            $this->SetX(250);
            $this->Cell(40,4,'Page '.$this->PageNo().'/{nb}');
        }

        // this_Rotate (untuk watermark)
        // http://www.fpdf.org/en/script/script2.php
        var $angle=0;

        function Rotate($angle,$x=-1,$y=-1)
        {
            if($x==-1)
                $x=$this->x;
            if($y==-1)
                $y=$this->y;
            if($this->angle!=0)
                $this->_out('Q');
            $this->angle=$angle;
            if($angle!=0)
            {
                $angle*=M_PI/180;
                $c=cos($angle);
                $s=sin($angle);
                $cx=$x*$this->k;
                $cy=($this->h-$y)*$this->k;
                $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
            }
        }

        function _endpage()
        {
            if($this->angle!=0)
            {
                $this->angle=0;
                $this->_out('Q');
            }
            parent::_endpage();
        }
        
        function RotatedText($x,$y,$txt,$angle)
        {
            //Text rotated around its origin
            $this->Rotate($angle,$x,$y);
            $this->Text($x,$y,$txt);
            $this->Rotate(0);
        }

        function RotatedImage($file,$x,$y,$w,$h,$angle)
        {
            //Image rotated around its upper-left corner
            $this->Rotate($angle,$x,$y);
            $this->Image($file,$x,$y,$w,$h);
            $this->Rotate(0);
        }
    }

    foreach ($getSuplier as $key) {
        $suplier = $key->nama_suplier;
    }

    $tgl_awal   = date('d-M-Y',strtotime($tglAwal));
    $tgl_akhir  = date('d-M-Y',strtotime($tglAkhir));

    $pdf = new PDF('P','mm','A4');
    $pdf->suplier = $suplier;
    $pdf->tgl_awal = $tgl_awal;
    $pdf->tgl_akhir = $tgl_akhir;
    
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Times','',9);
   
    $totaldue = 0;
    $i=1;
    $yawal = $pdf->GetY();
      foreach($getData as $get){

        $y = $pdf->GetY();
        $pdf->SetX(15);
        $pdf->Cell(10,5,$i,'LTB',0,'C');
        $pdf->SetX(25);
        $pdf->Cell(60,5,$get->nama_item,'LTB',0,'L');
        $pdf->SetX(85);
        $pdf->Cell(15,5,$get->Quantity,'LTB',0,'C');
        $pdf->SetX(100);
        $pdf->Cell(15,5,$get->abbr,'LTB',0,'C');
        $pdf->SetX(115);
        $pdf->Cell(30,5,number_format($get->Total),'LTBR',0,'R');
        $pdf->SetX(145);
        $pdf->Cell(55,5,$get->Keterangan,'LTBR',0,'R');
        $pdf->Ln();
        
        
        // $y5 = $pdf->GetY();
        // $pdf->Line(15, $yawal, 15, $y5);
        // $pdf->Line(35, $yawal, 35, $y5);
        // $pdf->Line(110, $yawal, 110, $y5);
        // $pdf->Line(155, $yawal, 155, $y5);
        // $pdf->Line(200, $yawal, 200, $y5);
        // $pdf->Line(15, $y5, 200, $y5);

        // if ($y5 > 240) {
        //     $y6 = $pdf->GetY() - 5;
        //     $pdf->AddPage();
        // }
        $i++;
      }

      foreach($getTotal as $gt){   
        $pdf->Ln(5);
        $pdf->SetFont('Times','B',9);
        $pdf->SetXY(15,$pdf->GetY()-5);
        $pdf->cell(100,5,'Grand Total','LB',0,'C');
        $pdf->SetXY(115,$pdf->GetY());
        $pdf->cell(30,5,'Rp. '.number_format($gt->GrandTotal,2),'LBR',0,'R');
        $pdf->SetXY(145,$pdf->GetY());
        $pdf->cell(55,5,'','LBR',0,'R');
        $pdf->Ln(5);
    }

    // $pdf->Ln(10);

    // foreach($getDataApp as $app) {
    //     if($app->Approve_vgmBy == 'BAMBANG HARYANTO'){
    //         $gmBy = "Minandar";
    //         $jab = "VGM";
    //     }else{
    //         $gmBy = "I Made Hartanaya";
    //         $jab = "General Manager";
    //     }

    //     if($app->Komplit == 1){
    //         $komplit = base_url().'tandatangan/Karyawan/4958.png';
    //     }else{
    //         $komplit = "";
    //     }

    //     if($app->Approve_kabag == 1){
    //         $app1 = base_url().'tandatangan/Karyawan/1459.png';
    //     }else{
    //         $app1 = '';
    //     }

    //     if($app->Approve_vgmBy == 'BAMBANG HARYANTO'){
    //         if($app->Approve_vgm == 1){ 
    //             $app2 = base_url().'tandatangan/Karyawan/1486.png';
    //         }else{
    //             $app2 = '';
    //         }
    //     }else{
    //         if($app->Approve_vgm == 1){ 
    //             $app2 = base_url().'tandatangan/Karyawan/1468.png';
    //         }else{
    //             $app2 = '';
    //         }
    //     }

    //     $pdf->SetXY(20,$pdf->GetY()+5);
    //         $pdf->SetFont('Times','',11);
    //         $pdf->SetXY(15,$pdf->GetY()-5);
    //         $pdf->Cell(65,5,'Dilaporkan Oleh','LBRT',0,'C');
    //         $pdf->SetX(80,$pdf->GetY());
    //         $pdf->Cell(60,5,'Diperiksa Oleh','BRT',0,'C');
    //         $pdf->SetX(140,$pdf->GetY());
    //         $pdf->Cell(60,5,'Disetujui Oleh','BRT',0,'C');
        
    //     $pdf->SetXY(20,$pdf->GetY()+5);
    //         $pdf->SetXY(15,$pdf->GetY());
    //         $pdf->Image($komplit,40,$pdf->GetY()-1,15,15);
    //         $pdf->Cell(65,15,'','LBRT',0,'C');
    //         $pdf->SetX(80,$pdf->GetY());
    //         $pdf->Image($app1,100,$pdf->GetY()-1,15,15);
    //         $pdf->Cell(60,15,'','BRT',0,'C');
    //         $pdf->SetX(140,$pdf->GetY());
    //         $pdf->Image($app2,170,$pdf->GetY()-1,15,15);
    //         $pdf->Cell(60,15,'','BRT',0,'C');

    //     $pdf->SetXY(20,$pdf->GetY()+15);
    //         $pdf->SetX(15,$pdf->GetY());
    //         $pdf->Cell(65,5,'Nama    : '.$app->KomplitBy,'LBRT');
    //         $pdf->SetX(80,$pdf->GetY());
    //         $pdf->Cell(60,5,'Nama    : '.$app->Approve_kabagBy,'BRT');
    //         $pdf->SetX(140,$pdf->GetY());
    //         $pdf->Cell(60,5,'Nama    : '.$gmBy,'BRT');

    //     $pdf->SetXY(20,$pdf->GetY()+5);
    //         $pdf->SetX(15,$pdf->GetY());
    //         $pdf->Cell(65,5,'Jabatan  : '.'Operator','LBRT');
    //         $pdf->SetX(80,$pdf->GetY());
    //         $pdf->Cell(60,5,'Jabatan  : '.'Kadept SKT','BRT');
    //         $pdf->SetX(140,$pdf->GetY());
    //         $pdf->Cell(60,5,'Jabatan  : '.$jab,'BRT');

    //     $pdf->SetXY(20,$pdf->GetY()+5);
    //         $pdf->SetX(15,$pdf->GetY());
    //         $pdf->Cell(65,5,'Tanggal : '.date('d-m-Y',strtotime($app->KomplitDate)),'LBRT');
    //         $pdf->SetX(80,$pdf->GetY());
    //         $pdf->Cell(60,5,'Tanggal : '.date('d-m-Y',strtotime($app->Approve_kabagDate)),'BRT');
    //         $pdf->SetX(140,$pdf->GetY());
    //         $pdf->Cell(60,5,'Tanggal : '.date('d-m-Y',strtotime($app->Approve_vgmDate)),'BRT');
    // }

    $pdf->Output();
    
    ?>