<?php
class PDF extends FPDF {
        function Header(){
        }

        function Footer(){
            // $this->SetY(-190);
            // $this->Ln();
            // $this->Ln();
            // $this->Ln();
            // $this->Ln();
            // $this->SetX(155);
            // $this->Cell(40,4,'Printed By : ');
            // $this->Ln();
            // $this->SetFont('Times','I',8);
            // $this->SetX(155);
            // $this->Cell(40,4,'Page '.$this->PageNo().'/{nb}');
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
    }
    
    foreach ($getDataNotaHdr as $hdr) {
        $TanggalNota = $hdr->TanggalNota;
        $Nama_speedboad = $hdr->Nama_speedboad;
        $NoLppt = $hdr->NoLppt;
        $Nama_sopir = $hdr->Nama_sopir;
        $Keperluan = $hdr->Keperluan;
        $Rute = $hdr->Rute;
    }

    $pdf = new PDF('P','mm','A4');
    
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFillColor(255,255,255);
    $abs1 = $pdf->GetY();
    $pdf->SetX(18);
    $pdf->Image(base_url().'assets/layouts/layout3/img/logopt.png',24,11,12,12);
    $pdf->SetXY(47,$pdf->GetY()+2);
    $pdf->SetFont('Times','',11);
    $pdf->Cell(105,5,'PT RIAU SAKTI UNITED PLANTATIONS',0,0,'L');
    $pdf->Cell(15,5,'Dept',0,0,'L');
    $pdf->Cell(40,5,': SKT',0,0,'L');
    $pdf->SetXY(47,$pdf->GetY()+5);
    $pdf->Line(45, $pdf->GetY(), 200, $pdf->GetY());
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(105,5,'LAPORAN PERTANGGUNG JAWABAN PERJALANAN DINAS',0,0,'L');
    $pdf->SetFont('Times','',10);
    $pdf->Cell(15,5,'Tgl',0,0,'L');
    $pdf->Cell(10,5,': '.date('d-m-Y'),0,0,'L');
    $pdf->Line(15, $pdf->GetY()+7, 200, $pdf->GetY()+7);
    $pdf->Line(45, $abs1, 45, $pdf->GetY()+7);
    $pdf->Line(152, $abs1, 152, $pdf->GetY()+7);

    $pdf->Ln(10);
    $pdf->SetFont('Times','',10);
    $pdf->SetX(20);
    $pdf->Cell(25,4,'Tanggal Nota',0,0);
    $pdf->SetX(45);
    $pdf->Cell(50,4,': '.date('d-m-Y',strtotime($TanggalNota)),0,0);
    $pdf->SetX(115);
    $pdf->Cell(25,4,'Speedboat',0,0);
    $pdf->SetX(140);
    $pdf->Cell(70,4,': '.$Nama_speedboad,0,0);

    $pdf->Ln(5);
    $pdf->SetFont('Times','',10);
    $pdf->SetX(20);
    $pdf->Cell(25,4,'No.Lppt',0,0);
    $pdf->SetX(45);
    $pdf->Cell(50,4,': '.$NoLppt,0,0);
    $pdf->SetX(115);
    $pdf->Cell(25,4,'Nama Operator',0,0);
    $pdf->SetX(140);
    $pdf->Cell(70,4,': '.$Nama_sopir,0,0);

    $pdf->Ln(5);
    $pdf->SetFont('Times','',10);
    // $pdf->SetX(20);
    // $pdf->Cell(25,4,'Keperluan',0,0);
    // $pdf->SetX(45);
    // $pdf->MultiCell(50,4,': '.$Keperluan,0,'L');
    $pdf->SetX(115);
    $pdf->Cell(25,4,'Route',0,0);
    $pdf->SetX(140);
    $pdf->Cell(2,4,':',0,0);
    $pdf->SetXY(142,$pdf->GetY());
    $pdf->MultiCell(55,4,$Rute,0,'L');
    $pdf->Ln(7);
    $pdf->SetFont('Times','B',9);
    $pdf->SetX(20);
    $pdf->Cell(10,5,'No','LT',0,'C');
    $pdf->SetX(30);
    $pdf->Cell(55,5,'Keperluan','LT',0,'C');
    $pdf->SetX(85);
    $pdf->Cell(70,5,'Tanggal','LT',0,'C');
    $pdf->SetX(155);
    $pdf->Cell(40,5,'Jam','LTR',0,'C');
    $pdf->Ln();
    $pdf->SetX(20);
    $pdf->Cell(10,5,'','LB');
    $pdf->SetX(30);
    $pdf->Cell(55,5,'','LB');
    $pdf->SetX(85);
    $pdf->Cell(35,5,'Berangkat','LTB',0,'C');
    $pdf->SetX(120);
    $pdf->Cell(35,5,'Kembali','LTB',0,'C');
    $pdf->SetX(155);
    $pdf->Cell(40,5,'','LBR',0,'C');
    $pdf->Ln();
    $i=1;
    $yawal = $pdf->GetY();
    foreach ($getDetailPerjalanan as $prj){
        $y = $pdf->GetY();
        $pdf->SetFont('Times','',9);
        $pdf->SetXY(20,$y);
        $pdf->MultiCell(10,5,$i,0,'C');
        $pdf->SetXY(30,$y);
        $pdf->MultiCell(55,5,$prj->Keperluan,0,1,'L');
        $pdf->SetXY(85,$y);
        $pdf->MultiCell(35,5,date('d-m-Y',strtotime($prj->Tgl_berangkat)),0,'C');
        $pdf->SetXY(120,$y);
        $pdf->MultiCell(35,5,date('d-m-Y',strtotime($prj->Tgl_kembali)),0,'C');
        $pdf->SetXY(155,$y);
        $pdf->MultiCell(40,5,date('H:i:s',strtotime($prj->Jam)),0,'C');
        $pdf->Ln();
        
        
        $y5 = $pdf->GetY();
        $pdf->Line(20, $yawal, 20, $y5);
        $pdf->Line(30, $yawal, 30, $y5);
        $pdf->Line(85, $yawal, 85, $y5);
        $pdf->Line(120, $yawal, 120, $y5);
        $pdf->Line(155, $yawal, 155, $y5);
        $pdf->Line(195, $yawal, 195, $y5);
        $pdf->Line(20, $y5, 195, $y5);
        $i++;
    }

    $pdf->Ln(2);
    $pdf->SetFont('Times','B',9);
    $pdf->SetX(20);
    $pdf->Cell(10,5,'No','LTB',0,'C');
    $pdf->SetX(30);
    $pdf->Cell(55,5,'Keterangan','LTB',0,'C');
    $pdf->SetX(85);
    $pdf->Cell(35,5,'Volume','LTB',0,'C');
    $pdf->SetX(120);
    $pdf->Cell(15,5,'Satuan','LTB',0,'C');
    $pdf->SetX(135);
    $pdf->Cell(20,5,'Harga(Rp)','LTB',0,'C');
    $pdf->SetX(155);
    $pdf->Cell(40,5,'Total(Rp)','LTBR',0,'C');
    $pdf->Ln();
    $pdf->SetFont('Times','',9);
    $totaldue = 0;
    $i=1;
    $yawal = $pdf->GetY();
    foreach ($getDataNotaDtl as $dtl){
        $totaldue += $dtl->Total;
        $y = $pdf->GetY();
        $pdf->SetXY(20,$y);
        $pdf->Cell(10,5,$i,0,0,'C');
        $pdf->SetXY(30,$y);
        $pdf->Cell(55,5,$dtl->Keterangan,0,0,'C');
        $pdf->SetXY(85,$y);
        $pdf->Cell(35,5,$dtl->Volume,0,0,'C');
        $pdf->SetXY(120,$y);
        $pdf->Cell(15,5,$dtl->Nama,0,0,'C');
        $pdf->SetXY(135,$y);
        $pdf->Cell(20,5,number_format($dtl->Harga,2),0,0,'R');
        $pdf->SetXY(155,$y);
        $pdf->Cell(40,5,number_format($dtl->Total,2),0,0,'R');
        $pdf->Ln();
        
        
        $y5 = $pdf->GetY();
        $pdf->Line(20, $yawal, 20, $y5);
        $pdf->Line(30, $yawal, 30, $y5);
        $pdf->Line(85, $yawal, 85, $y5);
        $pdf->Line(120, $yawal, 120, $y5);
        $pdf->Line(135, $yawal, 135, $y5);
        $pdf->Line(155, $yawal, 155, $y5);
        $pdf->Line(195, $yawal, 195, $y5);
        $pdf->Line(20, $y5, 195, $y5);
        $i++;
    }
   
        $pdf->Ln();
        $pdf->SetFont('Times','B',9);
        $pdf->SetXY(135,$pdf->GetY()-5);
        $pdf->cell(20,5,'Grand Total','LB');
        $pdf->SetXY(155,$pdf->GetY());
        $pdf->cell(40,5,number_format($totaldue,2),'LBR',0,'R');
        $pdf->Ln();


    $pdf->Ln(2);
    $pdf->SetFont('Times','B',9);
    $pdf->SetX(20);
    $pdf->Cell(10,5,'No','LTB',0,'C');
    $pdf->SetX(30);
    $pdf->Cell(90,5,'Beban (Dept)','LTB',0,'C');
    $pdf->SetX(120);
    $pdf->Cell(75,5,'Jumlah Beban (Rp)','LTBR',0,'C');
    $pdf->Ln();
    $pdf->SetFont('Times','',9);
    $totaldue = 0;
    $i=1;
    $yawal = $pdf->GetY();
    foreach ($getDataBeban as $g){
        $totaldue += $g->TotalBeban;
        $y = $pdf->GetY();
        $pdf->SetXY(20,$y);
        $pdf->MultiCell(10,5,$i,0,'C');
        $pdf->SetXY(30,$y);
        $pdf->MultiCell(90,5,$g->Beban,0,'C');
        $pdf->SetXY(120,$y);
        $pdf->SetFont('Times','B',9);
        $pdf->Cell(75,5,number_format($g->TotalBeban,2),'LBR',0,'R');
        $pdf->Ln();
        
        
        $y5 = $pdf->GetY();
        $pdf->Line(20, $yawal, 20, $y5);
        $pdf->Line(30, $yawal, 30, $y5);
        $pdf->Line(120, $yawal, 120, $y5);
        $pdf->Line(195, $yawal, 195, $y5);
        $pdf->Line(20, $y5, 195, $y5);
        $i++;
    }
    $pdf->SetFont('Times','B',9);
    foreach($getDataApprove as $app) {
        if($app->Approve1 == 1 && $app->Approve2 == 1) {
            $pdf->SetXY(20,$pdf->GetY()+5);
            $pdf->MultiCell(195,5,'Dokumen ini telah disetujui secara elektronik. Tanda Tangan Tidak Diperlukan',0,'L');
            $pdf->SetXY(20,$pdf->GetY()+2);
            $pdf->MultiCell(195,5,'Tanggal Efektif : '.date('d-m-Y',strtotime($app->Approve2_date)),0,'L');
        }else{
            $pdf->SetXY(20,$pdf->GetY()+5);
            $pdf->MultiCell(195,5,'Dokumen ini BELUM DISETUJUI',0,'L');
        }
    }

    $abs2 = $pdf->GetY()+2;

    $pdf->Line(15, $abs1, 15, $abs2);
    $pdf->Line(200, $abs1, 200, $abs2);
    $pdf->Line(15, $abs1, 200, $abs1);
    $pdf->Line(15, $abs2, 200, $abs2);

    $pdf->Output();
    
    ?>