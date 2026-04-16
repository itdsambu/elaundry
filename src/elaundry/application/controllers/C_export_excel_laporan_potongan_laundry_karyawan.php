<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
ini_set('max_execution_time', -1);
class C_export_excel_laporan_potongan_laundry_karyawan extends CI_Controller
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
            $lessOneYear  = $year -1;
        } else if ($month == '02') {
            $lessOneMonth = $month -1;
            $lessOneYear  = $year;
        } else {
            $lessOneMonth = $month -1;
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

        $TransAwal        = $year.'-'.$month.'-26';
        $TransAkhir       = $lessOneYear.'-'.$result.'-26';

        $periodeAwal      = '26-' . $result . '-' . $lessOneYear;
        $peiodeAkhir      = '25-' . $month . '-' . $year;
        
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
        
        $periodeTgl   = $periodeAwal .' s/d '. $peiodeAkhir;
        $dataRekap    = $this->M_RekapPotongan->getDataRekapKaryawan($PeriodeApprove, $TransAwal, $TransAkhir);

        $frmcop         = $this->config->item("company");

        $no   = 1;
        $no2  = 1;
        foreach ($dataRekap as $row) {
            $nomor[]        = $no++;
            $Nama[]         = $row->Nama;
            $Nik[]          = $row->Nik;
            $DeptAbbr[]     = $row->DeptAbbr;
            $Perusahaan[]   = $row->Perusahaan;
            $TotalTagihan[] = $row->TotalTagihan;
        }

        foreach ($dataRekap as $val) {
            $tagihan[] = $val->TotalTagihan;
        }
        $totalAll = 0;
        foreach ($tagihan as $nilai) {
            $totalAll += $nilai;
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
        $objPHPExcel = $obj->createSheet(0)->setTitle('Periode Bulan' .$result . ' ' .$year);

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

        $count1 = count($dataRekap);
        $jml_data_perpage = 50;
        if ($count1 < $jml_data_perpage) {
            $jml_page = 1;
        } else {
            if (($count1 % $jml_data_perpage) == 0) {
                $jml_page = $count1 / $jml_data_perpage;
            } else {
                $jml_page = floor(($count1 / $jml_data_perpage)) + 1;
            }
        }

        $jml_row_perpage  = 62;
        // Periode 1
        for ($i1 = 0 ; $i1 < $jml_page; $i1++) {
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
            $objPHPExcel->mergeCells('E' . ($start_row + 3) . ':AP' . ($start_row + 3))->setCellValue('E' . ($start_row + 3), 'PERIODE TANGGAL : ' . $periodeTgl);
            $objPHPExcel->mergeCells('AQ' . ($start_row + 2) . ':AS' . ($start_row + 3))->setCellValue('AQ' . ($start_row + 2), 'Page');
            $objPHPExcel->mergeCells('AT' . ($start_row + 2) . ':BA' . ($start_row + 3))->setCellValue('AT' . ($start_row + 2), ': ' . ($i1 + 1) . ' Dari ' . $jml_page);

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
            $objPHPExcel->mergeCells('E' . ($start_row + 5) . ':R' . ($start_row + 5))->setCellValue('E' . ($start_row + 5), ': Potong Gaji (Karyawan)');

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
                isset($nomor[$a]) ? $num[$a] = $nomor[$a] : $num[$a] = "";
                isset($Nama[$a]) ? $name[$a] = $Nama[$a] : $name[$a] = "";

                isset($Nik[$a]) ? $nik[$a] = $Nik[$a] : $nik[$a] = "";

                isset($DeptAbbr[$a]) ? $dept[$a] = $DeptAbbr[$a] : $dept[$a] = "";
                isset($Perusahaan[$a]) ? $cv[$a] = $Perusahaan[$a] : $cv[$a] = "";
                isset($TotalTagihan[$a]) ? $bayar[$a] = $TotalTagihan[$a] : $bayar[$a] = "";

                $objPHPExcel->mergeCells('B' . $rowDetail1 . ':D' . $rowDetail1)->setCellValue('B' . $rowDetail1, $num[$a]);
                $objPHPExcel->mergeCells('E' . $rowDetail1 . ':Y' . $rowDetail1)->setCellValue('E' . $rowDetail1, $name[$a]);
                $objPHPExcel->mergeCells('Z' . $rowDetail1 . ':AC' . $rowDetail1)->setCellValue('Z' . $rowDetail1, $nik[$a]);
                $objPHPExcel->mergeCells('AD' . $rowDetail1 . ':AI' . $rowDetail1)->setCellValue('AD' . $rowDetail1, $dept[$a]);
                $objPHPExcel->mergeCells('AJ' . $rowDetail1 . ':AO' . $rowDetail1)->setCellValue('AJ' . $rowDetail1, $cv[$a]);
                $objPHPExcel->mergeCells('AP' . $rowDetail1 . ':AZ' . $rowDetail1)->setCellValue('AP' . $rowDetail1, $bayar[$a]);

                $objPHPExcel->setSharedStyle($noborderStyle, 'A' . ($rowDetail1 + 1) . ':BA' . ($rowDetail1 + 1));
                $objPHPExcel->setSharedStyle($bodyStyle, 'B' . $rowDetail1 . ':BA' . $rowDetail1);
                $objPHPExcel->setSharedStyle($bodyStyleAlignLeft, 'E' . $rowDetail1 . ':Q' . $rowDetail1);

                $objPHPExcel->setSharedStyle($bodyStyleRight, 'BA' . ($rowDetail1) . ':BA' . ($rowDetail1 + 1));
                $objPHPExcel->setSharedStyle($bodyStyleLeft, 'A' . ($rowDetail1) . ':A' . ($rowDetail1 + 1));
                $objPHPExcel->getStyle('B' .  $rowDetail1 . ':AZ' .  $rowDetail1)->getFont()->setBold(false);
                $objPHPExcel->getStyle('B' . ($rowDetail1) . ':AZ' . ($rowDetail1))->getFont()->setSize(10);
                $rowDetail1++;
            }

            $totalRow = $rowDetail1;
            $objPHPExcel->mergeCells('B' . ($totalRow) . ':AO' . ($totalRow))->setCellValue('B' . ($totalRow), "TOTAL");
            $objPHPExcel->mergeCells('B' . ($totalRow + 1) . ':F' . ($totalRow + 1))->setCellValue('B' . ($totalRow + 1), "TERBILANG");
            $objPHPExcel->mergeCells('AP' . ($totalRow) . ':AZ' . ($totalRow))->setCellValue('AP' . ($totalRow), rupiah($totalAll));
            $objPHPExcel->mergeCells('G' . ($totalRow + 1) . ':AZ' . ($totalRow + 1))->setCellValue('G' . ($totalRow + 1), terbilang($totalAll));

            $objPHPExcel->setSharedStyle($bodyStyleRight, 'BA' . ($totalRow) . ':BA' . ($totalRow + 1));
            $objPHPExcel->setSharedStyle($bodyStyleLeft, 'A' . ($totalRow) . ':A' . ($totalRow + 1));
            $objPHPExcel->setSharedStyle($DetailheaderStyle, 'B' . ($totalRow) . ':AZ' . ($totalRow + 1));

            $objPHPExcel->setSharedStyle($bodyStyleAlignLeft, 'B' . $totalRow . ':AO' . $totalRow);
            $objPHPExcel->setSharedStyle($bodyStyleAlignLeft, 'B' . ($totalRow + 1) . ':F' . ($totalRow + 1));

            $objPHPExcel->getStyle('B' . ($totalRow) . ':AZ' . ($totalRow))->getFont()->setBold(true);

            $footer = $totalRow + 1;
            $objPHPExcel->mergeCells('A' . ($footer + 1) . ':Q' . ($footer + 1))->setCellValue('A' . ($footer + 1));
            $objPHPExcel->getStyle('R' . ($footer + 1) . ':BA' . ($footer + 1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objPHPExcel->mergeCells('R' . ($footer + 1) . ':BA' . ($footer + 1))->setCellValue('R' . ($footer + 1));
            $objPHPExcel->setSharedStyle($footerStyleLeftbottom, 'A' . ($footer + 1) . ':Q' . ($footer + 1));
            $objPHPExcel->setSharedStyle($footerStyleRightbottom, 'R' . ($footer + 1) . ':BA' . ($footer + 1));
            $objPHPExcel->setBreak('A' . ($footer + 1),  PHPExcel_Worksheet::BREAK_ROW);
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