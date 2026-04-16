<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
ini_set('max_execution_time', -1);
class C_export_excel_rekap_laundry_harian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('M_Laundry_Rekap'));
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }


    function export_excel()
    {
        $this->load->library("excel");
        $nik          = $this->uri->segment(3);
        $tanggal_awal = $this->uri->segment(4);
        $tanggal_akhir = $this->uri->segment(5);

        // $v_nama_bln = array(
        //         '01' => 'JANUARI',
        //         '02' => 'FEBRUARI',
        //         '03' => 'MARET',
        //         '04' => 'APRIL',
        //         '05' => 'MEI',
        //         '06' => 'JUNI',
        //         '07' => 'JULI',
        //         '08' => 'AGUSTUS',
        //         '09' => 'SEPTEMBER',
        //         '10' => 'OKTOBER',
        //         '11' => 'NOVEMBER',
        //         '12' => 'DESEMBER',
        // );

        // $v_romawi_bln = array(
        //         '01' => 'I',
        //         '02' => 'II',
        //         '03' => 'III',
        //         '04' => 'IV',
        //         '05' => 'V',
        //         '06' => 'VI',
        //         '07' => 'VII',
        //         '08' => 'VIII',
        //         '09' => 'IX',
        //         '10' => 'X',
        //         '11' => 'XI',
        //         '12' => 'XII',
        // );

        $data         = $this->M_Laundry_Rekap->get_data_header($nik, $tanggal_awal, $tanggal_akhir);
        // print_r($data);
        // exit;



        foreach ($data as $key) {

            $penerima_ldy = $key->CreatedBy;
        }

        if (!empty($data)) {
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

            $objPHPExcel->getActiveSheet()->setTitle($penerima_ldy);
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

            $objPHPExcel->getActiveSheet()->setTitle($penerima_ldy);
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('C1', 'PT PULAU SAMBU')->getStyle("C1")->applyFromArray($style);
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A3', 'JUDUL')->getStyle("A3")->applyFromArray($style);
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('C3', 'REKAP HARIAN LAUNDRY')->getStyle("C3")->applyFromArray($style);
            if ($tanggal_awal == $tanggal_akhir) {
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('P1', 'Dok')
                    ->setCellValue('P2', 'Periode')
                    ->setCellValue('P3', 'Hal')
                    ->setCellValue('Q1', ': ')
                    ->setCellValue('Q2', ': ' . date("d-m-Y", strtotime($tanggal_awal)))
                    ->setCellValue('Q3', ': 01 dari 01');
            } else {
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('P1', 'Dok')
                    ->setCellValue('P2', 'Periode')
                    ->setCellValue('P3', 'Hal')
                    ->setCellValue('Q1', ': ')
                    ->setCellValue('Q2', ': ' . date("d-m-Y", strtotime($tanggal_awal)) . ' - ' . date("d-m-Y", strtotime($tanggal_akhir)))
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
                ->setCellValue('A4', 'Pengawas : ' . $penerima_ldy);

            $objPHPExcel->getActiveSheet()->getStyle("A4:R4")->applyFromArray($styleleft);

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A5', 'No')
                ->setCellValue('B5', 'Nama')
                ->setCellValue('D5', 'NIK')
                ->setCellValue('E5', 'DEPT')
                ->setCellValue('F5', 'CV')
                ->setCellValue('G5', 'Tanggal Terima Cucian')
                ->setCellValue('I5', 'Jumlah')
                ->setCellValue('I6', 'BAJU')
                ->setCellValue('J6', 'CELANA PANJANG')
                ->setCellValue('L6', 'CELANA PENDEK')
                ->setCellValue('N6', 'JAKET')
                ->setCellValue('O6', 'SPRAI/SELIMUT')
                ->setCellValue('Q6', 'LAIN2')
                ->setCellValue('R6', 'ket');

            $objPHPExcel->getActiveSheet()->mergeCells("A5:A6");
            $objPHPExcel->getActiveSheet()->mergeCells("B5:C6");
            $objPHPExcel->getActiveSheet()->mergeCells("D5:D6");
            $objPHPExcel->getActiveSheet()->mergeCells("E5:E6");
            $objPHPExcel->getActiveSheet()->mergeCells("F5:F6");
            $objPHPExcel->getActiveSheet()->mergeCells("G5:H6");
            $objPHPExcel->getActiveSheet()->mergeCells("I5:R5");
            $objPHPExcel->getActiveSheet()->mergeCells("J6:K6");
            $objPHPExcel->getActiveSheet()->mergeCells("L6:M6");
            $objPHPExcel->getActiveSheet()->mergeCells("O6:P6");
            // $objPHPExcel->getActiveSheet()->mergeCells("K5:L6");
            // $objPHPExcel->getActiveSheet()->mergeCells("M5:M6");
            // $objPHPExcel->getActiveSheet()->mergeCells("N5:O6");
            // $objPHPExcel->getActiveSheet()->mergeCells("P5:Q6");
            // $objPHPExcel->getActiveSheet()->mergeCells("R5:R6");
            // $objPHPExcel->getActiveSheet()->mergeCells("S5:S6");

            $objPHPExcel->getActiveSheet()->getStyle("A5:R6")->applyFromArray($style);

            // // $objPHPExcel->getActiveSheet()
            // //     ->getStyle('G5:N5')
            // //     ->getAlignment()
            // //     ->setWrapText(true); 

            $ex                        = $objPHPExcel->setActiveSheetIndex(0);
            $no                        = 1;
            $counter                   = 7;

            $all_total_baju = 0;
            $all_total_celana_panjang     = 0;
            $all_total_celana_pendek         = 0;
            $all_total_jaket         = 0;
            $all_total_spraiselimut         = 0;
            $all_total_lain         = 0;

            foreach ($data as $row) :
                $idheader = $row->ID;
                $row->baju = 0;
                $row->celana_panjang = 0;
                $row->celana_pendek = 0;
                $row->jaket = 0;
                $row->sprai_selimut = 0;
                $row->lain = 0;
                $col = $this->M_Laundry_Rekap->get_detail_harian($idheader);

                foreach ($col as $hasil) {
                    if ($hasil->id_item == '4' || $hasil->id_item == '3' || $hasil->id_item == '13' || $hasil->id_item == '16' || $hasil->id_item == '19') {
                        $row->baju = $row->baju + $hasil->jumlah;
                    } else if ($hasil->id_item == '10') {
                        $row->celana_panjang = $row->celana_panjang + $hasil->jumlah;
                    } else if ($hasil->id_item == '11') {
                        $row->celana_pendek = $row->celana_pendek + $hasil->jumlah;
                    } else if ($hasil->id_item == '5') {
                        $row->jaket = $row->jaket + $hasil->jumlah;
                    } else if ($hasil->id_item == '24' || $hasil->id_item == '8') {
                        $row->sprai_selimut = $row->sprai_selimut + $hasil->jumlah;
                    } else {
                        $row->lain = $row->lain + $hasil->jumlah;
                    }
                }

                $all_total_baju += $row->baju;
                $all_total_celana_panjang     += $row->celana_panjang;
                $all_total_celana_pendek         += $row->celana_pendek;
                $all_total_jaket         += $row->jaket;
                $all_total_spraiselimut         += $row->sprai_selimut;
                $all_total_lain         += $row->lain;

                $objPHPExcel->getActiveSheet()->mergeCells("B" . $counter . ":C" . $counter);
                $objPHPExcel->getActiveSheet()->mergeCells("G" . $counter . ":H" . $counter);
                $objPHPExcel->getActiveSheet()->mergeCells("J" . $counter . ":K" . $counter);
                $objPHPExcel->getActiveSheet()->mergeCells("L" . $counter . ":M" . $counter);
                $objPHPExcel->getActiveSheet()->mergeCells("O" . $counter . ":P" . $counter);
                //     $objPHPExcel->getActiveSheet()->mergeCells("K".$counter.":L".$counter);
                //     $objPHPExcel->getActiveSheet()->mergeCells("N".$counter.":O".$counter);
                //     $objPHPExcel->getActiveSheet()->mergeCells("P".$counter.":Q".$counter);

                $ex->setCellValue('A' . $counter, $no++)->getStyle('A' . $counter)->applyFromArray($stylecenter);
                $ex->setCellValue('B' . $counter, $row->Nama)->getStyle('B' . $counter)->applyFromArray($styleleft);
                $ex->setCellValue('D' . $counter, $row->NIK)->getStyle('D' . $counter)->applyFromArray($styleleft);
                $ex->setCellValue('E' . $counter, $row->DeptAbbr)->getStyle('E' . $counter)->applyFromArray($styleleft);
                $ex->setCellValue('F' . $counter, $row->Perusahaan)->getStyle('F' . $counter)->applyFromArray($styleleft);
                $ex->setCellValue('G' . $counter, date("d-m-Y", strtotime($row->TglTransaksi)))->getStyle('G' . $counter)->applyFromArray($stylecenter);
                $ex->setCellValue('I' . $counter, $row->baju)->getStyle('I' . $counter)->applyFromArray($stylecenter);
                $ex->setCellValue('J' . $counter, $row->celana_panjang)->getStyle('J' . $counter)->applyFromArray($stylecenter);
                $ex->setCellValue('L' . $counter, $row->celana_pendek)->getStyle('L' . $counter)->applyFromArray($stylecenter);
                $ex->setCellValue('N' . $counter, $row->jaket)->getStyle('N' . $counter)->applyFromArray($stylecenter);
                $ex->setCellValue('O' . $counter, $row->sprai_selimut)->getStyle('O' . $counter)->applyFromArray($stylecenter);
                $ex->setCellValue('Q' . $counter, $row->lain)->getStyle('Q' . $counter)->applyFromArray($stylecenter);
                //     $ex->setCellValue('S' .$counter, $row->TtlBiaya)->getStyle('S' .$counter)->applyFromArray($stylecenter);
                //     // $ex->setCellValue('J' .$counter, $row->total_tagihan)->getStyle('J' .$counter)->applyFromArray($styleright_bold);
                //     // $ex->setCellValue('L' .$counter, $row->ket_pembayaran)->getStyle('L' .$counter)->applyFromArray($stylecenter);

                $counter = $counter + 1;
            endforeach;

            // // $objPHPExcel->getActiveSheet()->mergeCells("A".$counter.":E".$counter);
            $objPHPExcel->getActiveSheet()->mergeCells("G" . $counter . ":H" . $counter);
            $objPHPExcel->getActiveSheet()->mergeCells("J" . $counter . ":K" . $counter);
            $objPHPExcel->getActiveSheet()->mergeCells("L" . $counter . ":M" . $counter);
            $objPHPExcel->getActiveSheet()->mergeCells("O" . $counter . ":P" . $counter);

            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G' . $counter, 'TOTAL')->getStyle("G" . $counter)->applyFromArray($style);

            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I' . $counter, $all_total_baju)->getStyle("I" . $counter)->applyFromArray($styleright_bold);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J' . $counter, $all_total_celana_panjang)->getStyle("J" . $counter)->applyFromArray($styleright_bold);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L' . $counter, $all_total_celana_pendek)->getStyle("L" . $counter)->applyFromArray($styleright_bold);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('N' . $counter, $all_total_jaket)->getStyle("N" . $counter)->applyFromArray($styleright_bold);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('O' . $counter, $all_total_spraiselimut)->getStyle("O" . $counter)->applyFromArray($styleright_bold);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q' . $counter, $all_total_lain)->getStyle("Q" . $counter)->applyFromArray($styleright_bold);
            // $objPHPExcel->getActiveSheet()->getStyle("G".$counter ":R".$counter)->applyFromArray($styleArray)
            // // $objPHPExcel->getActiveSheet()->getStyle('F8:N'.$counter)->getNumberFormat()->setFormatCode('#,##0');


            $objPHPExcel->getActiveSheet()->getStyle("G" . ($counter) . ":Q" . ($counter))->applyFromArray($styleArray);

            $objPHPExcel->getActiveSheet()->getStyle("A1:R" . ($counter - 1))->applyFromArray($styleArray);


            $objPHPExcel->getActiveSheet()->mergeCells("A" . $counter . ":F" . ($counter));
            $objPHPExcel->getActiveSheet()->getStyle("A" . $counter . ":F" . ($counter))->applyFromArray($styleArray2);

            $objPHPExcel->getActiveSheet()->mergeCells("A" . ($counter + 1) . ":Q" . ($counter + 1));
            $objPHPExcel->getActiveSheet()->getStyle("A" . ($counter + 1) . ":Q" . ($counter + 1))->applyFromArray($stylebotom);

            $objPHPExcel->getActiveSheet()->mergeCells("R" . ($counter) . ":R" . ($counter + 1));
            $objPHPExcel->getActiveSheet()->getStyle("R" . ($counter) . ":R" . ($counter + 1))->applyFromArray($stylerightbotom);
            ob_clean();

            header('Last-Modified:' . gmdate("D, d M Y H:i:s") . 'GMT');
            header('Chace-Control: no-store, no-cache, must-revalation');
            header('Chace-Control: post-check=0, pre-check=0', FALSE);
            header('Pragma: no-cache');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename=" Laporan Harian Laundry ' . $penerima_ldy . '.xls"');

            ob_end_clean();
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            exit();
        }
    }
}
