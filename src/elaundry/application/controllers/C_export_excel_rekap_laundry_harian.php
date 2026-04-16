<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

ini_set('max_execution_time', -1);

use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\IOFactory;

class C_export_excel_rekap_laundry_harian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_Laundry_Rekap');
        $this->load->library('excel');
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    function export_excel()
    {
        $nik           = $this->uri->segment(3);
        $tanggal_awal  = $this->uri->segment(4);
        $tanggal_akhir = $this->uri->segment(5);

        $data = $this->M_Laundry_Rekap->get_data_header($nik, $tanggal_awal, $tanggal_akhir);

        if (empty($data)) {
            return;
        }

        $penerima_ldy = '';
        foreach ($data as $key) {
            $penerima_ldy = $key->CreatedBy;
        }

        // =============================================
        // STYLE ARRAYS
        // =============================================
        $style = [
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical'   => Alignment::VERTICAL_CENTER,
            ],
            'font' => ['bold' => true],
        ];

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ];

        $styleArray2 = [
            'fill'         => ['fillType' => Fill::FILL_SOLID],
            'font'         => ['bold' => false, 'name' => 'Times New Roman', 'size' => 12],
            'numberFormat' => ['formatCode' => NumberFormat::FORMAT_TEXT],
            'alignment'    => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'vertical'   => Alignment::VERTICAL_CENTER,
                'wrapText'   => true,
            ],
        ];

        $stylebotom = [
            'fill'         => ['fillType' => Fill::FILL_SOLID],
            'font'         => ['bold' => false, 'name' => 'Times New Roman', 'size' => 12],
            'numberFormat' => ['formatCode' => NumberFormat::FORMAT_TEXT],
            'borders'      => ['bottom' => ['borderStyle' => Border::BORDER_THIN]],
            'alignment'    => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'vertical'   => Alignment::VERTICAL_CENTER,
                'wrapText'   => true,
            ],
        ];

        $stylerightbotom = [
            'fill'         => ['fillType' => Fill::FILL_SOLID],
            'font'         => ['bold' => false, 'name' => 'Times New Roman', 'size' => 12],
            'numberFormat' => ['formatCode' => NumberFormat::FORMAT_TEXT],
            'borders'      => [
                'bottom' => ['borderStyle' => Border::BORDER_THIN],
                'right'  => ['borderStyle' => Border::BORDER_THIN],
            ],
            'alignment'    => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'vertical'   => Alignment::VERTICAL_CENTER,
                'wrapText'   => true,
            ],
        ];

        $stylecenter = [
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical'   => Alignment::VERTICAL_CENTER,
            ],
        ];

        $styleleft = [
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'vertical'   => Alignment::VERTICAL_CENTER,
            ],
        ];

        $styleright_bold = [
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical'   => Alignment::VERTICAL_CENTER,
            ],
            'font' => ['bold' => true],
        ];

        // =============================================
        // BUAT SPREADSHEET
        // =============================================
        $objPHPExcel = new Excel();
        $sheet       = $objPHPExcel->getActiveSheet();
        $sheet->setTitle(mb_substr($penerima_ldy, 0, 31)); // max 31 karakter untuk sheet title

        // Column widths
        $colWidths = [
            'A' => 5,
            'B' => 17,
            'C' => 17,
            'D' => 17,
            'E' => 17,
            'F' => 30,
            'G' => 12,
            'H' => 12,
            'I' => 12,
            'J' => 12,
            'K' => 12,
            'L' => 12,
            'M' => 14,
            'N' => 10,
            'O' => 10,
            'P' => 12,
            'Q' => 12,
            'R' => 12,
            'S' => 12,
        ];
        foreach ($colWidths as $col => $width) {
            $sheet->getColumnDimension($col)->setWidth($width);
        }

        $sheet->getRowDimension('1')->setRowHeight(20);
        $sheet->getRowDimension('2')->setRowHeight(20);
        $sheet->getRowDimension('3')->setRowHeight(20);

        // =============================================
        // HEADER
        // =============================================

        // Logo
        $logoPath = FCPATH . 'assets/layouts/layout3/img/logopt.png';
        if (file_exists($logoPath)) {
            $objDrawing = new Drawing();
            $objDrawing->setName('Logo');
            $objDrawing->setDescription('Logo');
            $objDrawing->setPath($logoPath);
            $objDrawing->setOffsetX(20);
            $objDrawing->setOffsetY(5);
            $objDrawing->setCoordinates('B1');
            $objDrawing->setWidth(60);
            $objDrawing->setHeight(44);
            $objDrawing->setWorksheet($sheet);
        }

        // Nama PT & Judul
        $sheet->mergeCells('A1:B2');
        $sheet->mergeCells('C1:O2');
        $sheet->setCellValue('C1', 'PT PULAU SAMBU');
        $sheet->getStyle('C1')->applyFromArray($style);

        $sheet->mergeCells('A3:B3');
        $sheet->mergeCells('C3:O3');
        $sheet->setCellValue('A3', 'JUDUL');
        $sheet->getStyle('A3')->applyFromArray($style);
        $sheet->setCellValue('C3', 'REKAP HARIAN LAUNDRY');
        $sheet->getStyle('C3')->applyFromArray($style);

        // Info Dok/Periode/Hal
        $sheet->mergeCells('Q1:R1');
        $sheet->mergeCells('Q2:R2');
        $sheet->mergeCells('Q3:R3');
        $sheet->setCellValue('P1', 'Dok');
        $sheet->setCellValue('P2', 'Periode');
        $sheet->setCellValue('P3', 'Hal');
        $sheet->setCellValue('Q1', ': ');

        if ($tanggal_awal == $tanggal_akhir) {
            $sheet->setCellValue('Q2', ': ' . date("d-m-Y", strtotime($tanggal_awal)));
        } else {
            $sheet->setCellValue('Q2', ': ' . date("d-m-Y", strtotime($tanggal_awal)) . ' - ' . date("d-m-Y", strtotime($tanggal_akhir)));
        }
        $sheet->setCellValue('Q3', ': 01 dari 01');

        // Pengawas
        $sheet->mergeCells('A4:R4');
        $sheet->setCellValue('A4', 'Pengawas : ' . $penerima_ldy);
        $sheet->getStyle('A4:R4')->applyFromArray($styleleft);

        // =============================================
        // HEADER TABEL (baris 5-6)
        // =============================================
        $sheet->mergeCells('A5:A6');
        $sheet->mergeCells('B5:C6');
        $sheet->mergeCells('D5:D6');
        $sheet->mergeCells('E5:E6');
        $sheet->mergeCells('F5:F6');
        $sheet->mergeCells('G5:H6');
        $sheet->mergeCells('I5:R5');
        $sheet->mergeCells('J6:K6');
        $sheet->mergeCells('L6:M6');
        $sheet->mergeCells('O6:P6');

        $sheet->setCellValue('A5', 'No');
        $sheet->setCellValue('B5', 'Nama');
        $sheet->setCellValue('D5', 'NIK');
        $sheet->setCellValue('E5', 'DEPT');
        $sheet->setCellValue('F5', 'CV');
        $sheet->setCellValue('G5', 'Tanggal Terima Cucian');
        $sheet->setCellValue('I5', 'Jumlah');
        $sheet->setCellValue('I6', 'BAJU');
        $sheet->setCellValue('J6', 'CELANA PANJANG');
        $sheet->setCellValue('L6', 'CELANA PENDEK');
        $sheet->setCellValue('N6', 'JAKET');
        $sheet->setCellValue('O6', 'SPRAI/SELIMUT');
        $sheet->setCellValue('Q6', 'LAIN2');
        $sheet->setCellValue('R6', 'ket');

        $sheet->getStyle('A5:R6')->applyFromArray($style);

        // =============================================
        // DATA ROWS
        // =============================================
        $no      = 1;
        $counter = 7;

        $all_total_baju          = 0;
        $all_total_celana_panjang = 0;
        $all_total_celana_pendek  = 0;
        $all_total_jaket          = 0;
        $all_total_spraiselimut   = 0;
        $all_total_lain           = 0;

        foreach ($data as $row) {
            $idheader = $row->ID;
            $row->baju          = 0;
            $row->celana_panjang = 0;
            $row->celana_pendek  = 0;
            $row->jaket          = 0;
            $row->sprai_selimut  = 0;
            $row->lain           = 0;

            $col = $this->M_Laundry_Rekap->get_detail_harian($idheader);
            foreach ($col as $hasil) {
                if (in_array($hasil->id_item, ['4', '3', '13', '16', '19'])) {
                    $row->baju += $hasil->jumlah;
                } elseif ($hasil->id_item == '10') {
                    $row->celana_panjang += $hasil->jumlah;
                } elseif ($hasil->id_item == '11') {
                    $row->celana_pendek += $hasil->jumlah;
                } elseif ($hasil->id_item == '5') {
                    $row->jaket += $hasil->jumlah;
                } elseif (in_array($hasil->id_item, ['24', '8'])) {
                    $row->sprai_selimut += $hasil->jumlah;
                } else {
                    $row->lain += $hasil->jumlah;
                }
            }

            $all_total_baju          += $row->baju;
            $all_total_celana_panjang += $row->celana_panjang;
            $all_total_celana_pendek  += $row->celana_pendek;
            $all_total_jaket          += $row->jaket;
            $all_total_spraiselimut   += $row->sprai_selimut;
            $all_total_lain           += $row->lain;

            // Merge cells per baris
            $sheet->mergeCells("B{$counter}:C{$counter}");
            $sheet->mergeCells("G{$counter}:H{$counter}");
            $sheet->mergeCells("J{$counter}:K{$counter}");
            $sheet->mergeCells("L{$counter}:M{$counter}");
            $sheet->mergeCells("O{$counter}:P{$counter}");

            // Set nilai & style
            $sheet->setCellValue("A{$counter}", $no++);
            $sheet->getStyle("A{$counter}")->applyFromArray($stylecenter);

            $sheet->setCellValue("B{$counter}", $row->Nama);
            $sheet->getStyle("B{$counter}")->applyFromArray($styleleft);

            $sheet->setCellValue("D{$counter}", $row->NIK);
            $sheet->getStyle("D{$counter}")->applyFromArray($styleleft);

            $sheet->setCellValue("E{$counter}", $row->DeptAbbr);
            $sheet->getStyle("E{$counter}")->applyFromArray($styleleft);

            $sheet->setCellValue("F{$counter}", $row->Perusahaan);
            $sheet->getStyle("F{$counter}")->applyFromArray($styleleft);

            $sheet->setCellValue("G{$counter}", date("d-m-Y", strtotime($row->TglTransaksi)));
            $sheet->getStyle("G{$counter}")->applyFromArray($stylecenter);

            $sheet->setCellValue("I{$counter}", $row->baju);
            $sheet->getStyle("I{$counter}")->applyFromArray($stylecenter);

            $sheet->setCellValue("J{$counter}", $row->celana_panjang);
            $sheet->getStyle("J{$counter}")->applyFromArray($stylecenter);

            $sheet->setCellValue("L{$counter}", $row->celana_pendek);
            $sheet->getStyle("L{$counter}")->applyFromArray($stylecenter);

            $sheet->setCellValue("N{$counter}", $row->jaket);
            $sheet->getStyle("N{$counter}")->applyFromArray($stylecenter);

            $sheet->setCellValue("O{$counter}", $row->sprai_selimut);
            $sheet->getStyle("O{$counter}")->applyFromArray($stylecenter);

            $sheet->setCellValue("Q{$counter}", $row->lain);
            $sheet->getStyle("Q{$counter}")->applyFromArray($stylecenter);

            $counter++;
        }

        // =============================================
        // BARIS TOTAL
        // =============================================
        $sheet->mergeCells("G{$counter}:H{$counter}");
        $sheet->mergeCells("J{$counter}:K{$counter}");
        $sheet->mergeCells("L{$counter}:M{$counter}");
        $sheet->mergeCells("O{$counter}:P{$counter}");

        $sheet->setCellValue("G{$counter}", 'TOTAL');
        $sheet->getStyle("G{$counter}")->applyFromArray($style);

        $sheet->setCellValue("I{$counter}", $all_total_baju);
        $sheet->getStyle("I{$counter}")->applyFromArray($styleright_bold);

        $sheet->setCellValue("J{$counter}", $all_total_celana_panjang);
        $sheet->getStyle("J{$counter}")->applyFromArray($styleright_bold);

        $sheet->setCellValue("L{$counter}", $all_total_celana_pendek);
        $sheet->getStyle("L{$counter}")->applyFromArray($styleright_bold);

        $sheet->setCellValue("N{$counter}", $all_total_jaket);
        $sheet->getStyle("N{$counter}")->applyFromArray($styleright_bold);

        $sheet->setCellValue("O{$counter}", $all_total_spraiselimut);
        $sheet->getStyle("O{$counter}")->applyFromArray($styleright_bold);

        $sheet->setCellValue("Q{$counter}", $all_total_lain);
        $sheet->getStyle("Q{$counter}")->applyFromArray($styleright_bold);

        // Style border total row & semua data
        $sheet->getStyle("G{$counter}:Q{$counter}")->applyFromArray($styleArray);
        $sheet->getStyle("A1:R" . ($counter - 1))->applyFromArray($styleArray);

        $sheet->mergeCells("A{$counter}:F{$counter}");
        $sheet->getStyle("A{$counter}:F{$counter}")->applyFromArray($styleArray2);

        $sheet->mergeCells("A" . ($counter + 1) . ":Q" . ($counter + 1));
        $sheet->getStyle("A" . ($counter + 1) . ":Q" . ($counter + 1))->applyFromArray($stylebotom);

        $sheet->mergeCells("R{$counter}:R" . ($counter + 1));
        $sheet->getStyle("R{$counter}:R" . ($counter + 1))->applyFromArray($stylerightbotom);

        // =============================================
        // OUTPUT
        // =============================================
        while (ob_get_level()) ob_end_clean();

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Harian Laundry ' . $penerima_ldy . '.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = IOFactory::createWriter($objPHPExcel, 'Xls');
        $objWriter->save('php://output');
        exit();
    }
}
