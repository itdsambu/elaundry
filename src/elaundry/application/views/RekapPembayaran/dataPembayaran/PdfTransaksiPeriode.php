<?php
class PDF extends FPDF {
        function Header(){
          $abs1 = $this->GetY();
          $this->Line(15, $abs1, 280, $abs1);
          $this->SetX(18);
          $this->Image(base_url().'assets/layouts/layout3/img/logopt.png',18,12,23,23);
          $this->SetXY(47,$this->GetY()+3);
          $this->SetFont('Times','',11);
          $this->Cell(188,5,'PT RIAU SAKTI UNITED PLANTATIONS',0,0,'C');
          $this->Cell(10,3,'Dept',0,0,'L');
          $this->Cell(30,3,': SKT',0,0,'L');
          $this->SetXY(40,$this->GetY()+4);
          $this->Line(235, $this->GetY(), 280, $this->GetY());
          $this->SetFont('Times','B',12);
          $this->Cell(195,5,'',0,0,'C');
          $this->SetFont('Times','',12);
          $this->Cell(15,8,'Periode',0,0,'L');
          $this->Cell(30,8,': '.$this->periode,0,0,'L');
          $this->SetXY(40,$this->GetY()+7);
          $this->Line(45, $this->GetY(), 280, $this->GetY());//
          $this->SetFont('Times','B',12);
          $this->Cell(195,12,'LAPORAN REKAP BELANJA DAPUR MESS MANAGER',0,0,'C');
          $this->SetFont('Times','',10);
          $this->Cell(10,5,'Tgl',0,0,'L');
          $this->Cell(30,5,': ',0,0,'L');
          $this->SetXY(250,$this->GetY());
          $this->MultiCell(30,5,date('d-M-Y',strtotime($this->tgl_awal)).' s/d '.date('d-M-Y',strtotime($this->tgl_akhir)),0,'L');
          $this->Line(15, $this->GetY()+5, 280, $this->GetY()+5);
          $this->Line(45, $abs1, 45, $this->GetY()+5);
          $this->Line(15, $abs1, 15, $this->GetY()+5);
          $this->Line(280, $abs1, 280, $this->GetY()+5);
          $this->Line(235, $abs1, 235, $this->GetY()+5);

          $this->Ln(10);
          $y = $this->GetY();
          $this->SetFont('Times','B',9);
          $this->SetXY(15, $y);
          $this->Cell(20,10,'Tanggal','R',0,'C');
          $this->SetXY(35, $y);
          $this->Cell(55,10,'Uraian','LR',0,'C');
          $this->SetXY(90, $y);
          $this->Cell(10,10,'QTY','LR',0,'C');
          $this->SetXY(100, $y);
          $this->Cell(10,10,'Satuan','LR',0,'C');
          $this->SetXY(110, $y);
          $this->Cell(25,10,'Harga(Rp)','LR',0,'C');
          $this->SetXY(135, $y);
          $this->Cell(25,10,'Dapur(Rp)','LR',0,'C');
          $this->SetXY(160, $y);
          $this->Cell(25,10,'Snack','LR',0,'C');
          $this->SetXY(185, $y);
          $this->MultiCell(25,5,'Peralatan (Inventaris)',0,'C');
          $this->Line(210, $y, 210, $y+10);
          $this->SetXY(210, $y);
          $this->MultiCell(25,5,'Perawatan Mess',0,'C');
          $this->Line(235, $y, 235, $y+10);
          $this->SetXY(235, $y);
          $this->Cell(45,10,'Keterangan','LR',0,'C');
          $this->Line(15, $y, 280, $y);
          $this->Line(15, $y, 15, $y+10);
          $this->Line(280, $y, 280, $y+10);
          $this->Line(15, $y+10, 280, $y+10);
          $this->Ln();

           // $this->SetFont('ARIAL', 'B', 50);
           //      $this->SetTextColor(255,192,203);
           //      $this->RotatedText(52, 190, 'C A N C E L L E D', 40);
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

        // PDF_Rotate (untuk watermark)
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

        function NbLines($w, $txt) {
            //Computes the number of lines a MultiCell of width w will take
            $cw = &$this->CurrentFont['cw'];
            if ($w == 0) {
                $w = $this->w - $this->rMargin - $this->x;
            }
            $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
            $s = str_replace("\r", '', $txt);
            $nb = strlen($s);
            if ($nb > 0 and $s[$nb - 1] == "\n") {
                $nb--;
            }
            $sep = -1;
            $i = 0;
            $j = 0;
            $l = 0;
            $nl = 1;
            while ($i < $nb) {
                $c = $s[$i];
                if ($c == "\n") {
                    $i++;
                    $sep = -1;
                    $j = $i;
                    $l = 0;
                    $nl++;
                    continue;
                }
                if ($c == ' ') {
                    $sep = $i;
                }
                $l+=$cw[$c];
                if ($l > $wmax) {
                    if ($sep == -1) {
                        if ($i == $j) {
                            $i++;
                        }
                    } else {
                        $i = $sep + 1;
                    }
                    $sep = -1;
                    $j = $i;
                    $l = 0;
                    $nl++;
                } else {
                    $i++;
                }
            }
            return $nl;
        }
    }

    $tgl_awal   = $tglAwal;
    $tgl_akhir  = $tglAkhir;
    $periode    = $periode;

    $pdf = new PDF('L','mm','A4');
    $pdf->tgl_awal  = $tgl_awal;
    $pdf->tgl_akhir = $tgl_akhir;
    $pdf->periode   = $periode;

    
    
    
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
        $pdf->MultiCell(20,5,date('d-m-Y', strtotime($get->Tgl_transaksi)),0,'C');
        $pdf->SetXY(35,$y);
        $pdf->MultiCell(55,5,$get->nama_item,0,'L');
        $pdf->SetXY(90,$y);
        $pdf->MultiCell(10,5,$get->Quantity,0,'C');
        $pdf->SetXY(100,$y);
        $pdf->MultiCell(10,5,$get->abbr,0,'C');
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(25,5,number_format($get->Harga,2),0,'R');
        $pdf->SetXY(135,$y);
    if($get->kategoriID != 18){
        $pdf->MultiCell(25,5,number_format($get->Total,2),0,'R');
        $pdf->SetXY(160,$y);
    }else{
        $pdf->MultiCell(25,5,'',0,'R');
        $pdf->SetXY(160,$y);
    }
        $pdf->MultiCell(25,3,'',0,'R');
        $pdf->SetXY(185,$y);
    if($get->kategoriID == 18){
        $pdf->MultiCell(25,5,number_format($get->Total,2),0,'R');
        $pdf->SetXY(210,$y);
    }else{
        $pdf->MultiCell(25,3,'',0,'R');
        $pdf->SetXY(210,$y);
    }
        $pdf->MultiCell(25,3,'',0,'R');
        $pdf->SetXY(235,$y);
        $pdf->MultiCell(45,3,$get->Keterangan,0,'L');
        $pdf->Ln();
        
        
        $y5 = $pdf->GetY();
        $pdf->Line(15, $yawal, 15, $y5);
        $pdf->Line(35, $yawal, 35, $y5);
        $pdf->Line(90, $yawal, 90, $y5);
        $pdf->Line(100, $yawal, 100, $y5);
        $pdf->Line(110, $yawal, 110, $y5);
        $pdf->Line(135, $yawal, 135, $y5);
        $pdf->Line(160, $yawal, 160, $y5);
        $pdf->Line(185, $yawal, 185, $y5);
        $pdf->Line(210, $yawal, 210, $y5);
        $pdf->Line(235, $yawal, 235, $y5);
        $pdf->Line(280, $yawal, 280, $y5);
        $pdf->Line(15, $y5, 280, $y5);

        if ($y5 > 175) {
            $y6 = $pdf->GetY() - 5;
            $pdf->AddPage();
        }
        $i++;
      }
      foreach($getDataTotal as $gt){   
        $pdf->Ln(5);
        $pdf->SetFont('Times','B',9);
        $pdf->SetXY(15,$pdf->GetY()-5);
        $pdf->cell(120,5,'Grand Total','LB');
        $pdf->SetXY(135,$pdf->GetY());
        $pdf->cell(25,5,number_format($gt->GrandTotal,2),'LBR',0,'R');
        $pdf->SetX(160,$pdf->GetY());
        $pdf->Cell(25,5,number_format($totaldue,2),'LBR',0,'R');
    foreach($get_dataTotalPeralatan as $get){
        $pdf->SetX(185,$pdf->GetY());
        $pdf->Cell(25,5,number_format($get->GrandTotalPeralatan,2),'LBR',0,'R');
    }
        $pdf->SetX(210,$pdf->GetY());
        $pdf->Cell(25,5,number_format($totaldue,2),'LBR',0,'R');
        $pdf->SetX(235,$pdf->GetY());
        $pdf->Cell(45,5,'','LBR',0,'R');
        $pdf->Ln(5);
    }

    $pdf->SetFont('Times','B',9);
    foreach($getDataApp as $app) {
        if($app->Approve_kabag == 1 && $app->Approve_vgm == 1) {
            $pdf->SetXY(20,$pdf->GetY()+5);
            $pdf->MultiCell(195,5,'Dokumen ini telah disetujui secara elektronik. Tanda Tangan Tidak Diperlukan',0,'L');
            $pdf->SetXY(20,$pdf->GetY()+2);
            $pdf->MultiCell(195,5,'Tanggal Efektif : '.date('d-m-Y',strtotime($app->Approve_vgmDate)),0,'L');
        }else{
            $pdf->SetXY(20,$pdf->GetY()+5);
            $pdf->MultiCell(195,5,'Dokumen ini BELUM DISETUJUI',0,'L');
        }
    }

    //     $pdf->Ln(10);
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

    // $pdf->Ln(7);
    
    
   
    
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