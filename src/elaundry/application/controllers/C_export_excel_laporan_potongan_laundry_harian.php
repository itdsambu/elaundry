<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
ini_set('max_execution_time', -1);
class C_export_excel_laporan_potongan_laundry_harian extends CI_Controller
{
    private $xls;
    private $spreadsheet;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('M_RekapPotongan'));
        $this->load->library(array('table', 'form_validation', 'excel'));
        ///load  excel ////
        $this->xls            = new exelstyles();
        $this->spreadsheet    = new Excel();
        $this->sheet          = $this->spreadsheet->getActiveSheet();
        ///end load excel///
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    function exportxls()
    {
        $year   = $this->uri->segment(3);
        $month  = $this->uri->segment(4);

        if ($month == '01') {
            $lessOneMonth = '12';
            $lessOneYear  = $year +1;
        } else if ($month == '02') {
            $lessOneMonth = $month +1;
            $lessOneYear  = $year;
        } else {
            $lessOneMonth = $month +1;
            $lessOneYear  = $year;
        }

        if ($lessOneMonth >= 9) {
            $result = $lessOneMonth;
        } else {
            $result = "0$lessOneMonth";
        }

        if ($month == '01') {
            $PeriodeApprove   = $lessOneYear.'-'.$result.'-26';
        } else {
            $PeriodeApprove   = $year.'-'.$month.'-26';
        }

        $PeriodeApprove       = $year.'-'.$month.'-16';

        $bukaBuku             = $year.'-'.$month.'-01';
        $tutpBuku             = $year.'-'.$month.'-16';

        $bukaBuku2            = $year.'-'.$month.'-16';
        $tutpBuku2            = $year.'-'.$result . '-01';
        
        if ((int)$month == 1) {
            $result           = 'Januari';
        } elseif ((int)$month == 2) {
            $result = 'Februari';
        } elseif ((int)$month == 3) {
            $result = 'Maret';
        } elseif ((int)$month == 4) {
            $result = 'April';
        } elseif ((int)$month == 5) {
            $result = 'Mei';
        } elseif ((int)$month == 6) {
            $result = 'Juni';
        } elseif ((int)$month == 7) {
            $result = 'Juli';
        } elseif ((int)$month == 8) {
            $result = 'Agustus';
        } elseif ((int)$month == 9) {
            $result = 'September';
        } elseif ((int)$month == 10) {
            $result = 'Oktober';
        } elseif ((int)$month == 11) {
            $result = 'November';
        } elseif ((int)$month == 12) {
            $result = 'Desember';
        } else {
            $result = 'Bulan Tidak Valid';
        }
        

        $periode1       = $this->M_RekapPotongan->getRekapHarianPr1($PeriodeApprove, $bukaBuku, $tutpBuku);
        $periode2       = $this->M_RekapPotongan->getRekapHarianPr2($PeriodeApprove, $bukaBuku2, $tutpBuku2);

        $periodeTgl1    = '01-'.$month.'-'.$year .' s/d '. '15-'.$month.'-'.$year;
        $periodeTgl2    = '16-'.$month.'-'.$year .' s/d '. '31-'.$month.'-'.$year;

        $frmcop         = $this->config->item("company");

        $no   = 1;
        $no2  = 1;
        foreach ($periode1 as $row) {
            $nomorP1[]          = $no++;
            $NamaP1[]           = $row->Nama;
            $NikP1[]            = $row->Nik;
            $DeptAbbrP1[]       = $row->DeptAbbr;
            $PerusahaanP1[]     = $row->Perusahaan;
            $TotalTagihanP1[]   = $row->TotalTagihan;
        }

        foreach ($periode1 as $val) {
            $tagihanP1[] = $val->TotalTagihan;
        }
        $totalAll1 = 0;
        foreach ($tagihanP1 as $nilaiP1) {
            $totalAll1 += $nilaiP1;
        }
        
        foreach ($periode2 as $row2) {
            $nomorP2[]          = $no2++;
            $NamaP2[]           = $row2->Nama;
            $NikP2[]            = $row2->Nik;
            $DeptAbbrP2[]       = $row2->DeptAbbr;
            $PerusahaanP2[]     = $row2->Perusahaan;
            $TotalTagihanP2[]   = $row2->TotalTagihan;
        }

        foreach ($periode2 as $val2) {
            $tagihanP2[] = $val2->TotalTagihan;
        }
        $totalAll2 = 0;
        foreach ($tagihanP2 as $nilaiP2) {
            $totalAll2 += $nilaiP2;
        }

        // style
        $PTStyle                    = new PHPExcel_Style();
        $headerStyle                = new PHPExcel_Style();
        $headerStyleKiri            = new PHPExcel_Style();
        $headerStyleLeftTop         = new PHPExcel_Style();
        $headerStyleRightTop        = new PHPExcel_Style();
        $headerStyleLeftBottomTop   = new PHPExcel_Style();
        $headerStyleRightBottomTop  = new PHPExcel_Style();
        $DetailheaderStyle          = new PHPExcel_Style();
        $bodyStyle                  = new PHPExcel_Style();
        $bodyStyle_garis            = new PHPExcel_Style();
        $bodyStyleAlignLeft         = new PHPExcel_Style();
        $noborderStyle              = new PHPExcel_Style();
        $bodyStyleLeft              = new PHPExcel_Style();
        $bodyStyleRight             = new PHPExcel_Style();
        $footerStyleLeftbottom      = new PHPExcel_Style();
        $footerStyleRightbottom     = new PHPExcel_Style();

        $PTStyle->applyFromArray($this->xls->PT_STYLE);
        $headerStyle->applyFromArray($this->xls->headerStyle);
        $headerStyleLeftTop->applyFromArray($this->xls->headerStyleLeftTop);
        $headerStyleRightTop->applyFromArray($this->xls->headerStyleRightTop);
        $headerStyleLeftBottomTop->applyFromArray($this->xls->headerStyleLeftBottomTop);
        $headerStyleRightBottomTop->applyFromArray($this->xls->headerStyleRightBottomTop);
        $DetailheaderStyle->applyFromArray($this->xls->DetailheaderStyle);
        $bodyStyle->applyFromArray($this->xls->bodyStyle);
        $bodyStyle_garis->applyFromArray($this->xls->bodyStyle_garis);
        $bodyStyleAlignLeft->applyFromArray($this->xls->bodyStyleAlignLeft);
        $noborderStyle->applyFromArray($this->xls->noborderStyle);
        $bodyStyleLeft->applyFromArray($this->xls->bodyStyleLeft);
        $bodyStyleRight->applyFromArray($this->xls->bodyStyleRight);
        $footerStyleLeftbottom->applyFromArray($this->xls->footerStyleLeftbottom);
        $footerStyleRightbottom->applyFromArray($this->xls->footerStyleRightbottom);
        // end style

        $obj = new Excel();

        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setPath('assets/layouts/layout3/img/logopt.png');
        
        // Periode 1
        $objPHPExcel = $obj->createSheet(0)->setTitle('Periode 1 ' .$result . ' ' .$year);

        $objPHPExcel->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $objPHPExcel->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
        $objPHPExcel->getPageSetup()->setFitToPage(false);
        $objPHPExcel->getPageSetup()->setScale(75);
        $objPHPExcel->getPageMargins()->setLeft(0.2);
        $objPHPExcel->getPageMargins()->setRight(0.2);
        $objPHPExcel->getPageMargins()->setBottom(0.2);
        $objPHPExcel->getPageMargins()->setTop(0.2);
        $objPHPExcel->getPageSetup()->setHorizontalCentered(true);
        $objPHPExcel->getPageSetup()->setVerticalCentered(true);

        $range = array();
        $rangeCol = "BA";
        for ($y = "A", $rangeCol++; $y != $rangeCol; $y++) {
            $range[] = $y;
        }

        foreach ($range as $columnID) {
            $objPHPExcel->getColumnDimension($columnID)->setWidth(3);
        }

        for ($a = 0; $a < 500; $a++) {
            $objPHPExcel->getRowDimension($a)->setRowHeight(15);
        }

        $count1 = count($periode1);
        $jml_data_perpage = 50;
        if ($count1 < $jml_data_perpage) {
            $jml_page1 = 1;
        } else {
            if (($count1 % $jml_data_perpage) == 0) {
                $jml_page1 = $count1 / $jml_data_perpage;
            } else {
                $jml_page1 = floor(($count1 / $jml_data_perpage)) + 1;
            }
        }

        $jml_row_perpage  = 62;
        // Periode 1
        for ($i1 = 0 ; $i1 < $jml_page1; $i1++) {
            $start_row        = ($i1 * $jml_row_perpage) + 1;
            $finish_row       = ((($i1 * $jml_row_perpage) + 1) + ($jml_row_perpage));

            $start_detail     = ($i1 * $jml_data_perpage);
            $finish_detail    = (($i1 * $jml_data_perpage) + ($jml_data_perpage - 1));

            // Periode 1
            $gbr = '$objDrawing' . $i1;
            $gbr = new PHPExcel_Worksheet_Drawing();
            $gbr->setPath('assets/layouts/layout3/img/logopt.png');
            $gbr->setWidthAndHeight(45, 45);
            $gbr->setWorksheet($objPHPExcel);
            $gbr->setCoordinates('B' . $start_row);

            $objPHPExcel->mergeCells('A' . $start_row . ':D' . ($start_row + 1));
            $objPHPExcel->mergeCells('E' . $start_row . ':AP' . ($start_row + 1))->setCellValue('E' . $start_row,  $frmcop);
            $objPHPExcel->mergeCells('AQ' . $start_row . ':AS' . $start_row)->setCellValue('AQ' . $start_row, 'Dok');
            $objPHPExcel->mergeCells('AT' . $start_row . ':BA' . $start_row)->setCellValue('AT' . $start_row, ': RLPL/GAF/' .$year.'/'.$month);
            $objPHPExcel->mergeCells('AQ' . ($start_row + 1) . ':AS' . ($start_row + 1))->setCellValue('AQ' . ($start_row + 1), 'Periode');
            $objPHPExcel->mergeCells('AT' . ($start_row + 1) . ':BA' . ($start_row + 1))->setCellValue('AT' . ($start_row + 1), ':' .$result . ' ' .$year);

            $objPHPExcel->mergeCells('A' . ($start_row + 2) . ':D' . ($start_row + 3))->setCellValue('A' . ($start_row + 2), 'JUDUL');
            $objPHPExcel->mergeCells('E' . ($start_row + 2) . ':AP' . ($start_row + 2))->setCellValue('E' . ($start_row + 2), 'LAPORAN POTONGAN LAUNDRY');
            $objPHPExcel->mergeCells('E' . ($start_row + 3) . ':AP' . ($start_row + 3))->setCellValue('E' . ($start_row + 3), 'PERIODE TANGGAL : ' . $periodeTgl1);
            $objPHPExcel->mergeCells('AQ' . ($start_row + 2) . ':AS' . ($start_row + 3))->setCellValue('AQ' . ($start_row + 2), 'Page');
            $objPHPExcel->mergeCells('AT' . ($start_row + 2) . ':BA' . ($start_row + 3))->setCellValue('AT' . ($start_row + 2), ': ' . ($i1 + 1) . ' Dari ' . $jml_page1);

            $objPHPExcel->setSharedStyle($noborderStyle, 'A' . ($start_row + 2) . ':BA' . ($start_row + 3));
            $objPHPExcel->setSharedStyle($headerStyle, 'A' . ($start_row) . ':AP' . ($start_row + 3));
            $objPHPExcel->setSharedStyle($headerStyleLeftTop, 'AQ' . ($start_row) . ':BA' . ($start_row + 3));
            $objPHPExcel->setSharedStyle($headerStyleRightTop, 'AT' . $start_row . ':BA' . ($start_row + 3));
            $objPHPExcel->setSharedStyle($headerStyleLeftBottomTop, 'AQ' . ($start_row + 2) . ':BA' . ($start_row + 3));
            $objPHPExcel->setSharedStyle($headerStyleRightBottomTop, 'AT' . ($start_row + 2) . ':BA' . ($start_row + 3));
            $objPHPExcel->setSharedStyle($PTStyle, 'E' . ($start_row) . ':AP' . ($start_row + 3));
            $objPHPExcel->getStyle('AT' . ($start_row) . ':BA' . ($start_row))->getFont()->setSize(10);

            $objPHPExcel->setSharedStyle($noborderStyle, 'A' . ($start_row + 4) . ':BA' . ($start_row + 6));
            $objPHPExcel->setSharedStyle($bodyStyleRight, 'BA' . ($start_row + 4) . ':BA' . ($start_row + 6));
            $objPHPExcel->setSharedStyle($bodyStyleLeft, 'A' . ($start_row + 4) . ':A' . ($start_row + 6));

            $objPHPExcel->mergeCells('B' . ($start_row + 5) . ':D' . ($start_row + 5))->setCellValue('B' . ($start_row + 5), "Kategori");
            $objPHPExcel->mergeCells('E' . ($start_row + 5) . ':R' . ($start_row + 5))->setCellValue('E' . ($start_row + 5), ': Potong Gaji (Harian/Borongan)');

            $rowTable = $start_row + 6;
            $objPHPExcel->mergeCells('B' . ($rowTable + 1) . ':D' . ($rowTable + 2))->setCellValue('B' . ($rowTable + 1), "No");
            $objPHPExcel->mergeCells('E' . ($rowTable + 1) . ':Y' . ($rowTable + 2))->setCellValue('E' . ($rowTable + 1), "Nama");
            $objPHPExcel->mergeCells('Z' . ($rowTable + 1) . ':AC' . ($rowTable + 2))->setCellValue('Z' . ($rowTable + 1), "NIK");
            $objPHPExcel->mergeCells('AD' . ($rowTable + 1) . ':AI' . ($rowTable + 2))->setCellValue('AD' . ($rowTable + 1), "Dept");
            $objPHPExcel->mergeCells('AJ' . ($rowTable + 1) . ':AO' . ($rowTable + 2))->setCellValue('AJ' . ($rowTable + 1), "CV/KYW");
            $objPHPExcel->mergeCells('AP' . ($rowTable + 1) . ':AZ' . ($rowTable + 2))->setCellValue('AP' . ($rowTable + 1), "Jumlah (Rupiah)");

            $objPHPExcel->setSharedStyle($bodyStyleRight, 'BA' . ($rowTable) . ':BA' . ($rowTable + 3));
            $objPHPExcel->setSharedStyle($bodyStyleLeft, 'A' . ($rowTable) . ':A' . ($rowTable + 3));
            $objPHPExcel->setSharedStyle($DetailheaderStyle, 'B' . ($rowTable + 1) . ':AZ' . ($rowTable + 2));
            $objPHPExcel->getStyle('B' . ($rowTable + 1) . ':AZ' . ($rowTable + 2))->getFont()->setBold(true);

            $rowDetail1 = $rowTable + 3;
            for ($a = $start_detail; $a <= $finish_detail; $a++) { 
                isset($nomorP1[$a]) ? $numP1[$a] = $nomorP1[$a] : $numP1[$a] = "";
                isset($NamaP1[$a]) ? $nameP1[$a] = $NamaP1[$a] : $nameP1[$a] = "";

                isset($NikP1[$a]) ? $nikP1[$a] = $NikP1[$a] : $nikP1[$a] = "";

                isset($DeptAbbrP1[$a]) ? $deptP1[$a] = $DeptAbbrP1[$a] : $deptP1[$a] = "";
                isset($PerusahaanP1[$a]) ? $cvP1[$a] = $PerusahaanP1[$a] : $cvP1[$a] = "";
                isset($TotalTagihanP1[$a]) ? $bayarP1[$a] = $TotalTagihanP1[$a] : $bayarP1[$a] = "";

                $objPHPExcel->mergeCells('B' . $rowDetail1 . ':D' . $rowDetail1)->setCellValue('B' . $rowDetail1, $numP1[$a]);
                $objPHPExcel->mergeCells('E' . $rowDetail1 . ':Y' . $rowDetail1)->setCellValue('E' . $rowDetail1, $nameP1[$a]);
                $objPHPExcel->mergeCells('Z' . $rowDetail1 . ':AC' . $rowDetail1)->setCellValue('Z' . $rowDetail1, $nikP1[$a]);
                $objPHPExcel->mergeCells('AD' . $rowDetail1 . ':AI' . $rowDetail1)->setCellValue('AD' . $rowDetail1, $deptP1[$a]);
                $objPHPExcel->mergeCells('AJ' . $rowDetail1 . ':AO' . $rowDetail1)->setCellValue('AJ' . $rowDetail1, $cvP1[$a]);
                $objPHPExcel->mergeCells('AP' . $rowDetail1 . ':AZ' . $rowDetail1)->setCellValue('AP' . $rowDetail1, $bayarP1[$a]);

                $objPHPExcel->setSharedStyle($noborderStyle, 'A' . ($rowDetail1 + 1) . ':BA' . ($rowDetail1 + 1));
                $objPHPExcel->setSharedStyle($bodyStyle, 'B' . $rowDetail1 . ':BA' . $rowDetail1);
                $objPHPExcel->setSharedStyle($bodyStyleAlignLeft, 'E' . $rowDetail1 . ':Q' . $rowDetail1);

                $objPHPExcel->setSharedStyle($bodyStyleRight, 'BA' . ($rowDetail1) . ':BA' . ($rowDetail1 + 1));
                $objPHPExcel->setSharedStyle($bodyStyleLeft, 'A' . ($rowDetail1) . ':A' . ($rowDetail1 + 1));
                $objPHPExcel->getStyle('B' .  $rowDetail1 . ':AZ' .  $rowDetail1)->getFont()->setBold(false);
                $objPHPExcel->getStyle('B' . ($rowDetail1) . ':AZ' . ($rowDetail1))->getFont()->setSize(10);
                $rowDetail1++;
            }

            $totalP1 = $rowDetail1;
            $objPHPExcel->mergeCells('B' . ($totalP1) . ':AO' . ($totalP1))->setCellValue('B' . ($totalP1), "TOTAL");
            $objPHPExcel->mergeCells('B' . ($totalP1 + 1) . ':F' . ($totalP1 + 1))->setCellValue('B' . ($totalP1 + 1), "TERBILANG");
            $objPHPExcel->mergeCells('AP' . ($totalP1) . ':AZ' . ($totalP1))->setCellValue('AP' . ($totalP1), rupiah($totalAll1));
            $objPHPExcel->mergeCells('G' . ($totalP1 + 1) . ':AZ' . ($totalP1 + 1))->setCellValue('G' . ($totalP1 + 1), terbilang($totalAll1));

            $objPHPExcel->setSharedStyle($bodyStyleRight, 'BA' . ($totalP1) . ':BA' . ($totalP1 + 1));
            $objPHPExcel->setSharedStyle($bodyStyleLeft, 'A' . ($totalP1) . ':A' . ($totalP1 + 1));
            $objPHPExcel->setSharedStyle($DetailheaderStyle, 'B' . ($totalP1) . ':AZ' . ($totalP1 + 1));

            $objPHPExcel->setSharedStyle($bodyStyleAlignLeft, 'B' . $totalP1 . ':AO' . $totalP1);
            $objPHPExcel->setSharedStyle($bodyStyleAlignLeft, 'B' . ($totalP1 + 1) . ':F' . ($totalP1 + 1));

            $objPHPExcel->getStyle('B' . ($totalP1) . ':AZ' . ($totalP1))->getFont()->setBold(true);

            $footer1 = $totalP1 + 1;
            $objPHPExcel->mergeCells('A' . ($footer1 + 1) . ':Q' . ($footer1 + 1))->setCellValue('A' . ($footer1 + 1));
            $objPHPExcel->getStyle('R' . ($footer1 + 1) . ':BA' . ($footer1 + 1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objPHPExcel->mergeCells('R' . ($footer1 + 1) . ':BA' . ($footer1 + 1))->setCellValue('R' . ($footer1 + 1));
            $objPHPExcel->setSharedStyle($footerStyleLeftbottom, 'A' . ($footer1 + 1) . ':Q' . ($footer1 + 1));
            $objPHPExcel->setSharedStyle($footerStyleRightbottom, 'R' . ($footer1 + 1) . ':BA' . ($footer1 + 1));
            $objPHPExcel->setBreak('A' . ($footer1 + 1),  PHPExcel_Worksheet::BREAK_ROW);
        }

        // periode 2 Set Baru

        $objPHPExcel2 = $obj->createSheet(1)->setTitle('Periode 2 ' .$result .' '. $year);
        $objPHPExcel2->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $objPHPExcel2->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
        $objPHPExcel2->getPageSetup()->setFitToPage(false);
        $objPHPExcel2->getPageSetup()->setScale(75);
        $objPHPExcel2->getPageMargins()->setLeft(0.2);
        $objPHPExcel2->getPageMargins()->setRight(0.2);
        $objPHPExcel2->getPageMargins()->setBottom(0.2);
        $objPHPExcel2->getPageMargins()->setTop(0.2);
        $objPHPExcel2->getPageSetup()->setHorizontalCentered(true);
        $objPHPExcel2->getPageSetup()->setVerticalCentered(true);

        $range = array();
        $rangeCol = "BA";
        for ($y = "A", $rangeCol++; $y != $rangeCol; $y++) {
            $range[] = $y;
        }

        foreach ($range as $columnID) {
            $objPHPExcel2->getColumnDimension($columnID)->setWidth(3);
        }

        for ($a = 0; $a < 500; $a++) {
            $objPHPExcel2->getRowDimension($a)->setRowHeight(15);
        }

        $count2 = count($periode2);
        $jml_data_perpage2 = 50;
        if ($count2 < $jml_data_perpage2) {
            $jml_page2 = 1;
        } else {
            if (($count2 % $jml_data_perpage2) == 0) {
                $jml_page2 = $count2 / $jml_data_perpage2;
            } else {
                $jml_page2 = floor(($count2 / $jml_data_perpage2)) + 1;
            }
        }

        $jml_row_perpage2  = 62;
        // Periode 2
        for ($i2 = 0 ; $i2 < $jml_page2; $i2++) {
            $start_row2        = ($i2 * $jml_row_perpage2) + 1;
            $finish_row2       = ((($i2 * $jml_row_perpage2) + 1) + ($jml_row_perpage2));

            $start_detail2    = ($i2 * $jml_data_perpage2);
            $finish_detail2   = (($i2 * $jml_data_perpage2) + ($jml_data_perpage2 - 1));
            
            $gbr = '$objDrawing' . $i2;
            $gbr = new PHPExcel_Worksheet_Drawing();
            $gbr->setPath('assets/layouts/layout3/img/logopt.png');
            $gbr->setWidthAndHeight(45, 45);
            $gbr->setWorksheet($objPHPExcel2);
            $gbr->setCoordinates('B' . $start_row2);

            $objPHPExcel2->mergeCells('A' . $start_row2 . ':D' . ($start_row2 + 1));
            $objPHPExcel2->mergeCells('E' . $start_row2 . ':AP' . ($start_row2 + 1))->setCellValue('E' . $start_row2,  $frmcop);
            $objPHPExcel2->mergeCells('AQ' . $start_row2 . ':AS' . $start_row2)->setCellValue('AQ' . $start_row2, 'Dok');
            $objPHPExcel2->mergeCells('AT' . $start_row2 . ':BA' . $start_row2)->setCellValue('AT' . $start_row2, ': RLPL/GAF/' .$year.'/'.$month);
            $objPHPExcel2->mergeCells('AQ' . ($start_row2 + 1) . ':AS' . ($start_row2 + 1))->setCellValue('AQ' . ($start_row2 + 1), 'Periode');
            $objPHPExcel2->mergeCells('AT' . ($start_row2 + 1) . ':BA' . ($start_row2 + 1))->setCellValue('AT' . ($start_row2 + 1), ':' .$result . ' ' .$year);

            $objPHPExcel2->mergeCells('A' . ($start_row2 + 2) . ':D' . ($start_row2 + 3))->setCellValue('A' . ($start_row2 + 2), 'JUDUL');
            $objPHPExcel2->mergeCells('E' . ($start_row2 + 2) . ':AP' . ($start_row2 + 2))->setCellValue('E' . ($start_row2 + 2), 'LAPORAN POTONGAN LAUNDRY');
            $objPHPExcel2->mergeCells('E' . ($start_row2 + 3) . ':AP' . ($start_row2 + 3))->setCellValue('E' . ($start_row2 + 3), 'PERIODE TANGGAL : ' . $periodeTgl2);
            $objPHPExcel2->mergeCells('AQ' . ($start_row2 + 2) . ':AS' . ($start_row2 + 3))->setCellValue('AQ' . ($start_row2 + 2), 'Page');
            $objPHPExcel2->mergeCells('AT' . ($start_row2 + 2) . ':BA' . ($start_row2 + 3))->setCellValue('AT' . ($start_row2 + 2), ': ' . ($i2 + 1) . ' Dari ' . $jml_page2);

            $objPHPExcel2->setSharedStyle($noborderStyle, 'A' . ($start_row2 + 2) . ':BA' . ($start_row2 + 3));
            $objPHPExcel2->setSharedStyle($headerStyle, 'A' . ($start_row2) . ':AP' . ($start_row2 + 3));
            $objPHPExcel2->setSharedStyle($headerStyleLeftTop, 'AQ' . ($start_row2) . ':BA' . ($start_row2 + 3));
            $objPHPExcel2->setSharedStyle($headerStyleRightTop, 'AT' . $start_row2 . ':BA' . ($start_row2 + 3));
            $objPHPExcel2->setSharedStyle($headerStyleLeftBottomTop, 'AQ' . ($start_row2 + 2) . ':BA' . ($start_row2 + 3));
            $objPHPExcel2->setSharedStyle($headerStyleRightBottomTop, 'AT' . ($start_row2 + 2) . ':BA' . ($start_row2 + 3));
            $objPHPExcel2->setSharedStyle($PTStyle, 'E' . ($start_row2) . ':AP' . ($start_row2 + 3));
            $objPHPExcel2->getStyle('AT' . ($start_row2) . ':BA' . ($start_row2))->getFont()->setSize(10);

            $objPHPExcel2->setSharedStyle($noborderStyle, 'A' . ($start_row2 + 4) . ':BA' . ($start_row2 + 6));
            $objPHPExcel2->setSharedStyle($bodyStyleRight, 'BA' . ($start_row2 + 4) . ':BA' . ($start_row2 + 6));
            $objPHPExcel2->setSharedStyle($bodyStyleLeft, 'A' . ($start_row2 + 4) . ':A' . ($start_row2 + 6));

            $objPHPExcel2->mergeCells('B' . ($start_row2 + 5) . ':D' . ($start_row2 + 5))->setCellValue('B' . ($start_row2 + 5), "Kategori");
            $objPHPExcel2->mergeCells('E' . ($start_row2 + 5) . ':R' . ($start_row2 + 5))->setCellValue('E' . ($start_row2 + 5), ': Potong Gaji (Harian/Borongan)');

            $rowTable2 = $start_row2 + 6;
            $objPHPExcel2->mergeCells('B' . ($rowTable2 + 1) . ':D' . ($rowTable2 + 2))->setCellValue('B' . ($rowTable2 + 1), "No");
            $objPHPExcel2->mergeCells('E' . ($rowTable2 + 1) . ':Y' . ($rowTable2 + 2))->setCellValue('E' . ($rowTable2 + 1), "Nama");
            $objPHPExcel2->mergeCells('Z' . ($rowTable2 + 1) . ':AC' . ($rowTable2 + 2))->setCellValue('Z' . ($rowTable2 + 1), "NIK");
            $objPHPExcel2->mergeCells('AD' . ($rowTable2 + 1) . ':AI' . ($rowTable2 + 2))->setCellValue('AD' . ($rowTable2 + 1), "Dept");
            $objPHPExcel2->mergeCells('AJ' . ($rowTable2 + 1) . ':AO' . ($rowTable2 + 2))->setCellValue('AJ' . ($rowTable2 + 1), "CV/KYW");
            $objPHPExcel2->mergeCells('AP' . ($rowTable2 + 1) . ':AZ' . ($rowTable2 + 2))->setCellValue('AP' . ($rowTable2 + 1), "Jumlah (Rupiah)");

            $objPHPExcel2->setSharedStyle($bodyStyleRight, 'BA' . ($rowTable2) . ':BA' . ($rowTable2 + 3));
            $objPHPExcel2->setSharedStyle($bodyStyleLeft, 'A' . ($rowTable2) . ':A' . ($rowTable2 + 3));
            $objPHPExcel2->setSharedStyle($DetailheaderStyle, 'B' . ($rowTable2 + 1) . ':AZ' . ($rowTable2 + 2));
            $objPHPExcel2->getStyle('B' . ($rowTable2 + 1) . ':AZ' . ($rowTable2 + 2))->getFont()->setBold(true);

            $rowDetail2 = $rowTable2 + 3;
            for ($b = $start_detail2; $b <= $finish_detail2; $b++) { 
                isset($nomorP2[$b]) ? $numP2[$b] = $nomorP2[$b] : $numP2[$b] = "";
                isset($NamaP2[$b]) ? $nameP2[$b] = $NamaP2[$b] : $nameP2[$b] = "";

                isset($NikP2[$b]) ? $nikP2[$b] = $NikP2[$b] : $nikP2[$b] = "";

                isset($DeptAbbrP2[$b]) ? $deptP2[$b] = $DeptAbbrP2[$b] : $deptP2[$b] = "";
                isset($PerusahaanP2[$b]) ? $cvP2[$b] = $PerusahaanP2[$b] : $cvP2[$b] = "";
                isset($TotalTagihanP2[$b]) ? $bayarP2[$b] = $TotalTagihanP2[$b] : $bayarP2[$b] = "";

                $objPHPExcel2->mergeCells('B' . $rowDetail2 . ':D' . $rowDetail2)->setCellValue('B' . $rowDetail2, $numP2[$b]);
                $objPHPExcel2->mergeCells('E' . $rowDetail2 . ':Y' . $rowDetail2)->setCellValue('E' . $rowDetail2, $nameP2[$b]);
                $objPHPExcel2->mergeCells('Z' . $rowDetail2 . ':AC' . $rowDetail2)->setCellValue('Z' . $rowDetail2, $nikP2[$b]);
                $objPHPExcel2->mergeCells('AD' . $rowDetail2 . ':AI' . $rowDetail2)->setCellValue('AD' . $rowDetail2, $deptP2[$b]);
                $objPHPExcel2->mergeCells('AJ' . $rowDetail2 . ':AO' . $rowDetail2)->setCellValue('AJ' . $rowDetail2, $cvP2[$b]);
                $objPHPExcel2->mergeCells('AP' . $rowDetail2 . ':AZ' . $rowDetail2)->setCellValue('AP' . $rowDetail2, $bayarP2[$b]);

                $objPHPExcel2->setSharedStyle($noborderStyle, 'A' . ($rowDetail2 + 1) . ':BA' . ($rowDetail2 + 1));
                $objPHPExcel2->setSharedStyle($bodyStyle, 'B' . $rowDetail2 . ':BA' . $rowDetail2);
                $objPHPExcel2->setSharedStyle($bodyStyleAlignLeft, 'E' . $rowDetail2 . ':Q' . $rowDetail2);

                $objPHPExcel2->setSharedStyle($bodyStyleRight, 'BA' . ($rowDetail2) . ':BA' . ($rowDetail2 + 1));
                $objPHPExcel2->setSharedStyle($bodyStyleLeft, 'A' . ($rowDetail2) . ':A' . ($rowDetail2 + 1));
                $objPHPExcel2->getStyle('B' .  $rowDetail2 . ':AZ' .  $rowDetail2)->getFont()->setBold(false);
                $objPHPExcel2->getStyle('B' . ($rowDetail2) . ':AZ' . ($rowDetail2))->getFont()->setSize(10);
                $rowDetail2++;
            }

            $totalP2 = $rowDetail2;
            $objPHPExcel2->mergeCells('B' . ($totalP2) . ':AO' . ($totalP2))->setCellValue('B' . ($totalP2), "TOTAL");
            $objPHPExcel2->mergeCells('B' . ($totalP2 + 1) . ':F' . ($totalP2 + 1))->setCellValue('B' . ($totalP2 + 1), "TERBILANG");
            $objPHPExcel2->mergeCells('AP' . ($totalP2) . ':AZ' . ($totalP2))->setCellValue('AP' . ($totalP2), rupiah($totalAll2));
            $objPHPExcel2->mergeCells('G' . ($totalP2 + 1) . ':AZ' . ($totalP2 + 1))->setCellValue('G' . ($totalP2 + 1), terbilang($totalAll2));

            $objPHPExcel2->setSharedStyle($bodyStyleRight, 'BA' . ($totalP2) . ':BA' . ($totalP2 + 1));
            $objPHPExcel2->setSharedStyle($bodyStyleLeft, 'A' . ($totalP2) . ':A' . ($totalP2 + 1));
            $objPHPExcel2->setSharedStyle($DetailheaderStyle, 'B' . ($totalP2) . ':AZ' . ($totalP2 + 1));

            $objPHPExcel2->setSharedStyle($bodyStyleAlignLeft, 'B' . $totalP2 . ':AO' . $totalP2);
            $objPHPExcel2->setSharedStyle($bodyStyleAlignLeft, 'B' . ($totalP2 + 1) . ':F' . ($totalP2 + 1));

            $objPHPExcel2->getStyle('B' . ($totalP2) . ':AZ' . ($totalP2))->getFont()->setBold(true);

            $footer2 = $totalP2 + 1;
            $objPHPExcel2->mergeCells('A' . ($footer2 + 1) . ':Q' . ($footer2 + 1))->setCellValue('A' . ($footer2 + 1));
            $objPHPExcel2->getStyle('R' . ($footer2 + 1) . ':BA' . ($footer2 + 1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objPHPExcel2->mergeCells('R' . ($footer2 + 1) . ':BA' . ($footer2 + 1))->setCellValue('R' . ($footer2 + 1));
            $objPHPExcel2->setSharedStyle($footerStyleLeftbottom, 'A' . ($footer2 + 1) . ':Q' . ($footer2 + 1));
            $objPHPExcel2->setSharedStyle($footerStyleRightbottom, 'R' . ($footer2 + 1) . ':BA' . ($footer2 + 1));
            $objPHPExcel2->setBreak('A' . ($footer2 + 1),  PHPExcel_Worksheet::BREAK_ROW);
        }
        
       
        ob_clean();
        header('Content-Type: text/html; charset=utf-8');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename=LAPORAN POTONGAN LAUNDRY PERIODE '.$result.' '.$year .'.xls');
        $objWriter = PHPExcel_IOFactory::createWriter($obj, 'Excel5');
        $objWriter->save('php://output');
        exit();
        ob_end_clean();
    }
}