<?php
class PDF extends FPDF {
        function Header(){
            
          $abs1 = $this->GetY();
          $this->Line(15, $abs1, 200, $abs1);
          $this->SetX(18);
          $this->Image(base_url().'assets/layouts/layout3/img/logopt.png',17,12,23,23);
          $this->SetXY(47,$this->GetY()+2);
          $this->SetFont('Times','',11);
          $this->Cell(110,5,'PT RIAU SAKTI UNITED PLANTATIONS',0,0,'C');
          $this->Cell(10,8,'Dept',0,0,'L');
          $this->Cell(20,8,': SKT',0,0,'L');
          $this->SetXY(47,$this->GetY()+10);
          $this->Line(45, $this->GetY(), 200, $this->GetY());
          $this->SetFont('Times','B',11);
          $this->Cell(110,10,'LAPORAN REKAP BELANJA DAPUR MESS MANAGER',0,0,'C');
          $this->SetFont('Times','',10);
          $this->Cell(10,5,'Tgl',0,0,'L');
          $this->Cell(5,5,':',0,0,'L');
          $this->SetXY(170,$this->GetY());
          $this->MultiCell(30,5,$this->tgl_awal.' s/d '.$this->tgl_akhir,0,'L');
          $this->Line(15, $this->GetY()+5, 200, $this->GetY()+5);
          $this->Line(45, $abs1, 45, $this->GetY()+5);
          $this->Line(15, $abs1, 15, $this->GetY()+5);
          $this->Line(200, $abs1, 200, $this->GetY()+5);
          $this->Line(155, $abs1, 155, $this->GetY()+5);


          $this->Ln(10);
          $this->SetFont('Times','B',9);
          $this->SetX(15);
          $this->Cell(20,5,'No','LTB',0,'C');
          $this->SetX(35);
          $this->Cell(90,5,'Nama Item','LTB',0,'C');
          $this->SetX(125);
          $this->Cell(15,5,'QTY','LTB',0,'C');
          $this->SetX(140);
          $this->Cell(15,5,'Satuan','LTB',0,'C');
          $this->SetX(155);
          $this->Cell(45,5,'Total','LTBR',0,'C');
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

    $tgl_awal   = date('d-M-Y',strtotime($tanggalawal));
    $tgl_akhir  = date('d-M-Y',strtotime($tanggalakhir));

    $pdf = new PDF('P','mm','A4');
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
        $pdf->SetXY(15,$y);
        $pdf->MultiCell(20,5,$i,0,'C');
        $pdf->SetXY(35,$y);
        $pdf->MultiCell(90,5,$get->nama_item,0,'L');
        $pdf->SetXY(125,$y);
        $pdf->MultiCell(15,5,$get->Quantity,0,'C');
        $pdf->SetXY(140,$y);
        $pdf->MultiCell(15,5,$get->abbr,0,'C');
        $pdf->SetXY(155,$y);
        $pdf->MultiCell(45,5,'Rp. '.number_format($get->Grand,2),0,'R');
        $pdf->Ln();
        
        
        $y5 = $pdf->GetY();
        $pdf->Line(15, $yawal, 15, $y5);
        $pdf->Line(35, $yawal, 35, $y5);
        $pdf->Line(125, $yawal, 125, $y5);
        $pdf->Line(140, $yawal, 140, $y5);
        $pdf->Line(155, $yawal, 155, $y5);
        $pdf->Line(200, $yawal, 200, $y5);
        $pdf->Line(15, $y5, 200, $y5);

        if ($y5 > 240) {
            $y6 = $pdf->GetY() - 5;
            $pdf->AddPage();
        }
        $i++;
      }
        foreach($getGrandTotal as $gt){
        $pdf->Ln(5);
        $pdf->SetFont('Times','B',9);
        $pdf->SetXY(15,$pdf->GetY()-5);
        $pdf->cell(140,5,'Grand Total','LB');
        $pdf->SetXY(155,$pdf->GetY());
        $pdf->cell(45,5,number_format($gt->Total,2),'LBR',0,'R');
        $pdf->SetX(235,$pdf->GetY());
        $pdf->Cell(45,5,'','LBR',0,'R');
        $pdf->Ln(5);
    }
    $pdf->SetFont('Times','B',9);
    foreach($getApprove as $app) {
        if($app->Approve_vgm == 1) {
            $pdf->SetXY(20,$pdf->GetY()+5);
            $pdf->MultiCell(195,5,'Dokumen ini telah disetujui secara elektronik. Tanda Tangan Tidak Diperlukan',0,'L');
            $pdf->SetXY(20,$pdf->GetY()+2);
            $pdf->MultiCell(195,5,'Tanggal Efektif : '.date('d-m-Y',strtotime($app->Approve_vgmDate)),0,'L');
        }else{
            $pdf->SetXY(20,$pdf->GetY()+5);
            $pdf->MultiCell(195,5,'Dokumen ini BELUM DISETUJUI',0,'L');
        }
    }

    // $pdf->Ln(10);
    //     $pdf->SetFont('Times','',11);
    //     $pdf->SetXY(135,$pdf->GetY()-5);
    //     $pdf->Cell(50,5,'Dilaporkan Oleh','LBRT');
    //     $pdf->SetX(185,$pdf->GetY());
    //     $pdf->Cell(50,5,'Diperiksa Oleh','BRT');
    //     $pdf->SetX(235,$pdf->GetY());
    //     $pdf->Cell(45,5,'Disetujui Oleh','BRT');
    // $pdf->Ln();
    //     $pdf->SetXY(135,$pdf->GetY());
    //     $pdf->Cell(50,15,'','LBRT');
    //     $pdf->SetX(185,$pdf->GetY());
    //     $pdf->Cell(50,15,'','BRT');
    //     $pdf->SetX(235,$pdf->GetY());
    //     $pdf->Cell(45,15,'','BRT');
    // $pdf->Ln();
    //     $pdf->SetX(135,$pdf->GetY());
    //     $pdf->Cell(50,5,'Nama    :','LBRT');
    //     $pdf->SetX(185,$pdf->GetY());
    //     $pdf->Cell(50,5,'Nama    :','BRT');
    //     $pdf->SetX(235,$pdf->GetY());
    //     $pdf->Cell(45,5,'Nama    :','BRT');
    // $pdf->Ln();
    //     $pdf->SetX(135,$pdf->GetY());
    //     $pdf->Cell(50,5,'Jabatan  :','LBRT');
    //     $pdf->SetX(185,$pdf->GetY());
    //     $pdf->Cell(50,5,'Jabatan  :','BRT');
    //     $pdf->SetX(235,$pdf->GetY());
    //     $pdf->Cell(45,5,'Jabatan  :','BRT');
    // $pdf->Ln();
    //     $pdf->SetX(135,$pdf->GetY());
    //     $pdf->Cell(50,5,'Tanggal :','LBRT');
    //     $pdf->SetX(185,$pdf->GetY());
    //     $pdf->Cell(50,5,'Tanggal :','BRT');
    //     $pdf->SetX(235,$pdf->GetY());
    //     $pdf->Cell(45,5,'Tanggal :','BRT');
    // $pdf->Ln();
    
    
    // $pdf->SetFont('Times','',9);
    // $pdf->SetXY(155,$y7);
    // $pdf->cell(10,4,($maintotal > 0 ? $currency : ''),'LB',0,'L');
    // $pdf->SetXY(165, $y7);
    // $pdf->cell(34,4,($maintotal > 0 ? number_format($maintotal,2) : ''),'BR',0,'R');
    // $pdf->Ln();
    // $pdf->SetXY(155,$y7 + 4);
    // $pdf->cell(10,4,($discount > 0 ? $currency : ''),'LB',0,'L');
    // $pdf->SetXY(165, $y7 + 4);
    // $pdf->cell(34,4,($discount > 0 ? number_format($discount,2) : ''),'BR',0,'R');
    // $pdf->Ln();
    // $pdf->SetXY(155,$y7 + 8);
    // $pdf->cell(10,4,($freight > 0 ? $currency : ''),'LB',0,'L');
    // $pdf->SetXY(165, $y7 + 8);
    // $pdf->cell(34,4,($freight > 0 ? number_format($freight,2) : ''),'BR',0,'R');
    // $pdf->Ln();
    // $pdf->SetXY(155,$y7 + 12);
    // $pdf->cell(10,4,($tax > 0 ? $currency : ''),'LB',0,'L');
    // $pdf->SetXY(165, $y7 + 12);
    // $pdf->cell(34,4,($tax > 0 ? number_format($taxprice,2) : ''),'BR',0,'R');
    // $pdf->Ln();
    // $pdf->SetXY(155,$y7 + 16);
    // $pdf->cell(10,4,($totaldue > 0 ? $currency : ''),'LB',0,'L');
    // $pdf->SetXY(165, $y7 + 16);
    // $pdf->cell(34,4,($totaldue > 0 ? number_format($totaldue,2) : ''),'BR',0,'R');
    // $pdf->Ln();
    
    // $pdf->SetFont('Times','B',10);
    // $pdf->SetX(11);
    // $pdf->Cell(26,4,'Shipping Via');
    // $pdf->SetX(40);
    // $pdf->Cell(26,4,':');
    // $pdf->SetFont('Times','',10);
    // $pdf->SetX(42);
    // $pdf->Cell(34,4,$r->via);
    // $pdf->Ln();
    

    // $pdf->SetFont('Times','B',10);
    // $pdf->SetX(11);
    // $pdf->Cell(26,4,'Country Of Origin');
    // $pdf->SetX(40);
    // $pdf->Cell(26,4,':');
    // $pdf->SetFont('Times','',10);
    // $pdf->SetX(42);
    // if($country != ''){
    //  $pdf->Cell(34,4,$country->country_name);    
    // }
    
    // $pdf->Ln();
    
    // $pdf->SetFont('Times','B',10);
    // $pdf->SetX(11);
    // $pdf->Cell(34,4,'Remarks');
    // $pdf->SetX(40);
    // $pdf->Cell(26,4,':');
    // $pdf->SetFont('Times','',9);
    // $pdf->SetX(42);
    // $pdf->MultiCell(100,5,str_replace("<br />", "",$r->remark));
    // $pdf->Ln();
    
    // $pdf->SetY(-29);
    // $pdf->SetX(155);
    // $pdf->Cell(40,4,'','B');
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',9);
    // $pdf->SetX(155);
    // $pdf->Cell(40,4,'Approve By',0,0,'C');
    // $pdf->SetFont('Times','',8);

    $pdf->Output();
    
    ?>