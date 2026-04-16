<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
ini_set('max_execution_time', -1);
class C_export_excel_laporan_potongan_laundry_harian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('M_RekapPotongan'));
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    function export_excel()
    {
        $this->load->library("excel");
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
            $startDate        = "26-$month-$year";
            $completionDate   = "25-02-$year";
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
        

        $periode1 =  $this->M_RekapPotongan->getRekapHarianPr1($PeriodeApprove, $bukaBuku, $tutpBuku);
        $periode2 =  $this->M_RekapPotongan->getRekapHarianPr2($PeriodeApprove, $bukaBuku2, $tutpBuku2);

        $data['periodeTgl1']   = '01-'.$month.'-'.$year .' s/d '. '15-'.$month.'-'.$year;
        $data['periodeTgl2']   = '16-'.$month.'-'.$year .' s/d '. '31-'.$month.'-'.$year;

        
        if (!empty($periode1) && !empty($periode2)) {
            $objPHPExcel = new Excel();
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(17);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(17);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(17);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(17);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(12);
            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(12);
            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(12);
            $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(12);
            $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(12);
            $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(12);
            $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(14);
            $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(12);
            $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(12);
            $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(12);
            $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(12);
            $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
            $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
            $objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

            $style = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
                ),
                'font' => array(
                    'bold' => True
                )
            );

            $styleArray = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
            $styleArray2 = array(
                'fill'   => array(
                    'type'    => PHPExcel_Style_Fill::FILL_SOLID
                ),
                'font' => array(
                    'bold'    => false,
                    'name' => 'Times New Roman',
                    'size' => 12
                ),
                'numberformat'   => array(
                    'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap'       => true
                ),
            );
            $stylebotom = array(
                'fill'   => array(
                    'type'    => PHPExcel_Style_Fill::FILL_SOLID
                ),
                'font' => array(
                    'bold'    => false,
                    'name' => 'Times New Roman',
                    'size' => 12
                ),
                'numberformat'   => array(
                    'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
                ),
                'borders' => array(
                    'bottom'    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap'       => true
                ),
            );
            $stylerightbotom = array(
                'fill'   => array(
                    'type'    => PHPExcel_Style_Fill::FILL_SOLID
                ),
                'font' => array(
                    'bold'    => false,
                    'name' => 'Times New Roman',
                    'size' => 12
                ),
                'numberformat'   => array(
                    'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
                ),
                'borders' => array(
                    'bottom'    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                    'right'    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap'       => true
                ),
            );



            $stylecenter = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
                )
            );

            $styleleft = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
                )
            );

            $styleright = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
                )
            );

            $styleright_bold = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
                ),
                'font' => array(
                    'bold' => True
                )
            );

            $objPHPExcel->getActiveSheet()->setTitle('Laporan Potongan Laundry');
            $objDrawing = new PHPExcel_Worksheet_Drawing();
            $objDrawing->setName('Logo');
            $objDrawing->setDescription('Logo');
            $logo       = 'assets/layouts/layout3/img/logopt.png';
            $objDrawing->setPath($logo);
            $objDrawing->setOffsetX(20);
            $objDrawing->setOffsetY(5);
            $objDrawing->setCoordinates('B1');
            $objDrawing->setWidth(60);
            $objDrawing->setHeight(44);
            $objDrawing->setWorksheet($objPHPExcel->setActiveSheetIndex(0));

            $objPHPExcel->getActiveSheet()->setTitle('Laporan Potongan Laundry');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'PT PULAU SAMBU')->getStyle("C1")->applyFromArray($style);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3', 'JUDUL')->getStyle("A3")->applyFromArray($style);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C3', 'LAPORAN POTONGAN LAUNDRY')->getStyle("C3")->applyFromArray($style);

            if ($year != '') {
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('P1', 'Dok')
                    ->setCellValue('P2', 'Periode')
                    ->setCellValue('P3', 'Hal')
                    ->setCellValue('Q1', ': RLPL/GAF/' .$year .'/'.$month)
                    ->setCellValue('Q2', ': ' . $result .' '.$year)
                    ->setCellValue('Q3', ': 01 dari 01');
            }

            $objPHPExcel->getActiveSheet()->mergeCells("A1:B2");
            $objPHPExcel->getActiveSheet()->mergeCells("C1:O2");
            $objPHPExcel->getActiveSheet()->mergeCells("A3:B3");
            $objPHPExcel->getActiveSheet()->mergeCells("C3:O3");

            $objPHPExcel->getActiveSheet()->mergeCells("Q1:R1");
            $objPHPExcel->getActiveSheet()->mergeCells("Q2:R2");
            $objPHPExcel->getActiveSheet()->mergeCells("Q3:R3");

            $objPHPExcel->getActiveSheet()->mergeCells("A4:R4");

            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Kategori : Potong Gaji (Harian/Borongan)');

            $objPHPExcel->getActiveSheet()->getStyle("A4:C4")->applyFromArray($styleleft);

            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('C4', 'PERIODE TANGGAL :');
            $objPHPExcel->getActiveSheet()->getStyle("A4:C4")->applyFromArray($styleleft);


            ob_clean();

            header('Last-Modified:' . gmdate("D, d M Y H:i:s") . 'GMT');
            header('Chace-Control: no-store, no-cache, must-revalation');
            header('Chace-Control: post-check=0, pre-check=0', FALSE);
            header('Pragma: no-cache');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename=" Laporan Potongan Laundry.xls"');

            ob_end_clean();
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            exit();
        }
    }
}