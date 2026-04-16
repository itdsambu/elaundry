<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Laundry_excel_rekap3 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_Laundry_Rekap');
        $this->load->library('session');
        $this->load->library("excel");
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    public function create_excel($post_thn_laporan)
    {
        $get_nama_laporan    = $this->uri->segment(3);
        $get_tipe_laporan    = $this->uri->segment(4);
        $get_bln_laporan     = $this->uri->segment(5);
        $get_thn_laporan     = $this->uri->segment(6);
        $get_tanggal_awal    = $this->uri->segment(7);
        $get_tanggal_akhir   = $this->uri->segment(8);
        $get_periode_laporan = $this->uri->segment(9);
        $get_pos_ldy         = $this->uri->segment(10);

        $nama_laporan    = (isset($get_nama_laporan)    && trim($get_nama_laporan)    != '-') ? $get_nama_laporan    : NULL;
        $tipe_laporan    = (isset($get_tipe_laporan)    && trim($get_tipe_laporan)    != '-') ? $get_tipe_laporan    : NULL;
        $bln_laporan     = (isset($get_bln_laporan)     && trim($get_bln_laporan)     != '-') ? $get_bln_laporan     : NULL;
        $thn_laporan     = (isset($get_thn_laporan)     && trim($get_thn_laporan)     != '-') ? $get_thn_laporan     : NULL;
        $tanggal_awal    = (isset($get_tanggal_awal)    && trim($get_tanggal_awal)    != '-') ? date("Y-m-d", strtotime($get_tanggal_awal))    : NULL;
        $tanggal_akhir   = (isset($get_tanggal_akhir)   && trim($get_tanggal_akhir)   != '-') ? date("Y-m-d", strtotime($get_tanggal_akhir))   : NULL;
        $periode_laporan = (isset($get_periode_laporan) && trim($get_periode_laporan) != '-') ? $get_periode_laporan : NULL;
        $pos_ldy         = (isset($get_pos_ldy)         && trim($get_pos_ldy)         != '-') ? $get_pos_ldy         : NULL;

        $detail_laporan            = $this->M_Laundry_Rekap->get_detail_rekap3($nama_laporan, $thn_laporan, $pos_ldy);
        $detail_laporan_allperiode = $this->M_Laundry_Rekap->get_detail_rekap3_allperiodee($pos_ldy);
        $dt_allpos_laundry         = $this->M_Laundry_Rekap->get_allpos_laundry();

        // =============================================
        // STYLE ARRAYS
        // =============================================
        $PTStyleArr = [
            'fill'         => ['fillType' => Fill::FILL_SOLID],
            'font'         => ['bold' => true, 'name' => 'Trebuchet MS', 'size' => 14],
            'numberFormat' => ['formatCode' => NumberFormat::FORMAT_TEXT],
            'borders'      => [
                'bottom' => ['borderStyle' => Border::BORDER_THIN],
                'right'  => ['borderStyle' => Border::BORDER_THIN],
                'left'   => ['borderStyle' => Border::BORDER_THIN],
                'top'    => ['borderStyle' => Border::BORDER_THIN],
            ],
            'alignment'    => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
        ];
        $headerStyleArr = [
            'fill'         => ['fillType' => Fill::FILL_SOLID],
            'font'         => ['bold' => true, 'name' => 'Trebuchet MS', 'size' => 10],
            'numberFormat' => ['formatCode' => NumberFormat::FORMAT_TEXT],
            'borders'      => [
                'bottom' => ['borderStyle' => Border::BORDER_THIN],
                'right'  => ['borderStyle' => Border::BORDER_THIN],
                'left'   => ['borderStyle' => Border::BORDER_THIN],
                'top'    => ['borderStyle' => Border::BORDER_THIN],
            ],
            'alignment'    => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
        ];
        $headerStyleRightArr = [
            'fill'         => ['fillType' => Fill::FILL_SOLID],
            'font'         => ['bold' => false, 'name' => 'Trebuchet MS', 'size' => 10],
            'numberFormat' => ['formatCode' => NumberFormat::FORMAT_TEXT],
            'borders'      => ['right' => ['borderStyle' => Border::BORDER_THIN]],
            'alignment'    => ['horizontal' => Alignment::HORIZONTAL_LEFT, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
        ];
        $headerStyleLeftArr = [
            'fill'         => ['fillType' => Fill::FILL_SOLID],
            'font'         => ['bold' => false, 'name' => 'Trebuchet MS', 'size' => 10],
            'numberFormat' => ['formatCode' => NumberFormat::FORMAT_TEXT],
            'borders'      => ['left' => ['borderStyle' => Border::BORDER_THIN]],
            'alignment'    => ['horizontal' => Alignment::HORIZONTAL_LEFT, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
        ];
        $headerStyleRightTopArr = [
            'fill'      => ['fillType' => Fill::FILL_SOLID],
            'font'      => ['bold' => false, 'name' => 'Trebuchet MS', 'size' => 10],
            'borders'   => ['right' => ['borderStyle' => Border::BORDER_THIN], 'top' => ['borderStyle' => Border::BORDER_THIN]],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
        ];
        $headerStyleLeftTopArr = [
            'fill'      => ['fillType' => Fill::FILL_SOLID],
            'font'      => ['bold' => false, 'name' => 'Trebuchet MS', 'size' => 10],
            'borders'   => ['left' => ['borderStyle' => Border::BORDER_THIN], 'top' => ['borderStyle' => Border::BORDER_THIN]],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
        ];
        $headerStyleRightbottomArr = [
            'fill'      => ['fillType' => Fill::FILL_SOLID],
            'font'      => ['bold' => false, 'name' => 'Trebuchet MS', 'size' => 10],
            'borders'   => ['right' => ['borderStyle' => Border::BORDER_THIN], 'bottom' => ['borderStyle' => Border::BORDER_THIN]],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
        ];
        $headerStyleLeftBottomArr = [
            'fill'      => ['fillType' => Fill::FILL_SOLID],
            'font'      => ['bold' => false, 'name' => 'Trebuchet MS', 'size' => 10],
            'borders'   => ['left' => ['borderStyle' => Border::BORDER_THIN], 'bottom' => ['borderStyle' => Border::BORDER_THIN]],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
        ];
        $headerStyleRightBottomTopArr = [
            'fill'      => ['fillType' => Fill::FILL_SOLID],
            'font'      => ['bold' => false, 'name' => 'Trebuchet MS', 'size' => 10],
            'borders'   => ['right' => ['borderStyle' => Border::BORDER_THIN], 'bottom' => ['borderStyle' => Border::BORDER_THIN], 'top' => ['borderStyle' => Border::BORDER_THIN]],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
        ];
        $headerStyleLeftBottomTopArr = [
            'fill'      => ['fillType' => Fill::FILL_SOLID],
            'font'      => ['bold' => false, 'name' => 'Trebuchet MS', 'size' => 10],
            'borders'   => ['left' => ['borderStyle' => Border::BORDER_THIN], 'bottom' => ['borderStyle' => Border::BORDER_THIN], 'top' => ['borderStyle' => Border::BORDER_THIN]],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
        ];
        $noborderStyleArr = [
            'fill'         => ['fillType' => Fill::FILL_SOLID],
            'font'         => ['bold' => false, 'name' => 'Trebuchet MS', 'size' => 10],
            'numberFormat' => ['formatCode' => NumberFormat::FORMAT_TEXT],
            'alignment'    => ['horizontal' => Alignment::HORIZONTAL_LEFT, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
        ];
        $DetailheaderStyleArr = [
            'fill'         => ['fillType' => Fill::FILL_SOLID],
            'font'         => ['bold' => false, 'name' => 'Trebuchet MS', 'size' => 10],
            'numberFormat' => ['formatCode' => NumberFormat::FORMAT_TEXT],
            'borders'      => [
                'bottom' => ['borderStyle' => Border::BORDER_THIN],
                'right'  => ['borderStyle' => Border::BORDER_THIN],
                'left'   => ['borderStyle' => Border::BORDER_THIN],
                'top'    => ['borderStyle' => Border::BORDER_THIN],
            ],
            'alignment'    => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
        ];
        $bodyStyleArr = [
            'fill'         => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'FFFFFFFF']],
            'font'         => ['name' => 'Times New Roman', 'size' => 10],
            'numberFormat' => ['formatCode' => NumberFormat::FORMAT_TEXT],
            'borders'      => [
                'bottom' => ['borderStyle' => Border::BORDER_THIN],
                'right'  => ['borderStyle' => Border::BORDER_THIN],
                'left'   => ['borderStyle' => Border::BORDER_THIN],
                'top'    => ['borderStyle' => Border::BORDER_THIN],
            ],
            'alignment'    => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
        ];
        $footerStyleRightbottomArr = [
            'fill'         => ['fillType' => Fill::FILL_SOLID],
            'font'         => ['bold' => false, 'name' => 'Trebuchet MS', 'size' => 10],
            'numberFormat' => ['formatCode' => NumberFormat::FORMAT_TEXT],
            'borders'      => ['right' => ['borderStyle' => Border::BORDER_THIN], 'bottom' => ['borderStyle' => Border::BORDER_THIN]],
            'alignment'    => ['horizontal' => Alignment::HORIZONTAL_RIGHT, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
        ];
        $footerStyleLeftbottomArr = [
            'fill'         => ['fillType' => Fill::FILL_SOLID],
            'font'         => ['bold' => false, 'name' => 'Trebuchet MS', 'size' => 10],
            'numberFormat' => ['formatCode' => NumberFormat::FORMAT_TEXT],
            'borders'      => ['left' => ['borderStyle' => Border::BORDER_THIN], 'bottom' => ['borderStyle' => Border::BORDER_THIN]],
            'alignment'    => ['horizontal' => Alignment::HORIZONTAL_LEFT, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
        ];

        // =============================================
        // PROSES DATA
        // =============================================
        $number                  = 0;
        $total_cash              = 0;
        $total_potong_gaji       = 0;
        $total_lainnya           = 0;
        $total_berat_cash        = 0;
        $total_berat_potong_gaji = 0;
        $total_berat_lainnya     = 0;

        $dtl_number = $dtl_mth = $dtl_monthname = $dtl_periode = [];
        $dtl_potong_gaji = $dtl_cash = $dtl_lainnya = [];
        $dtl_berat_potong_gaji = $dtl_berat_cash = $dtl_berat_lainnya = [];
        $dtl_em_potong_gaji = $dtl_em_cash = $dtl_em_lainnya = [];
        $dtl_jml_harga = $dtl_jml_berat = $dtl_jml_em = [];
        $dtl_rekap_jns = $dtl_rekap_status_pekerja = $dtl_rekap_tanggal_awal = $dtl_rekap_tanggal_akhir = [];
        $dtl_rekap_bulan = $dtl_rekap_tahun = $dtl_create_by = $dtl_create_date = $dtl_create_comp = $dtl_create_status = [];
        $dtl_app1_by = $dtl_app1_date = $dtl_app1_comp = $dtl_app1_status = $dtl_app1_jabatan = $dtl_app1_personalid = $dtl_app1_personalstatus = [];
        $dtl_app2_by = $dtl_app2_date = $dtl_app2_comp = $dtl_app2_status = $dtl_app2_jabatan = $dtl_app2_personalid = $dtl_app2_personalstatus = [];
        $dtl_app3_by = $dtl_app3_date = $dtl_app3_comp = $dtl_app3_status = $dtl_app3_jabatan = $dtl_app3_personalid = $dtl_app3_personalstatus = [];
        $dtl_app4_by = $dtl_app4_date = $dtl_app4_comp = $dtl_app4_status = $dtl_app4_jabatan = $dtl_app4_personalid = $dtl_app4_personalstatus = [];
        $dtl_rekap_id = [];
        $vdtl_periode = '';

        foreach ($detail_laporan as $detail_laporan_row) {
            $number++;
            $hrg_cash = is_numeric($detail_laporan_row->cash) ? $detail_laporan_row->cash : 0;
            $hrg_potong_gaji = is_numeric($detail_laporan_row->potong_gaji) ? $detail_laporan_row->potong_gaji : 0;
            $hrg_lainnya = is_numeric($detail_laporan_row->lainnya) ? $detail_laporan_row->lainnya : 0;

            if (is_numeric($detail_laporan_row->cash)) $total_cash += $detail_laporan_row->cash;
            if (is_numeric($detail_laporan_row->potong_gaji)) $total_potong_gaji += $detail_laporan_row->potong_gaji;
            if (is_numeric($detail_laporan_row->lainnya)) $total_lainnya += $detail_laporan_row->lainnya;

            if (is_numeric($detail_laporan_row->berat_cash)) {
                $total_berat_cash += $detail_laporan_row->berat_cash;
                $brt_cash = $detail_laporan_row->berat_cash;
                $efektifitas_mesin_cash = number_format((($detail_laporan_row->berat_cash / 3432) * 100), 2);
            } else {
                $brt_cash = 0;
                $efektifitas_mesin_cash = 0;
            }

            if (is_numeric($detail_laporan_row->berat_potong_gaji)) {
                $total_berat_potong_gaji += $detail_laporan_row->berat_potong_gaji;
                $brt_potong_gaji = $detail_laporan_row->berat_potong_gaji;
                $efektifitas_mesin_potong_gaji = number_format((($detail_laporan_row->berat_potong_gaji / 3432) * 100), 2);
            } else {
                $brt_potong_gaji = 0;
                $efektifitas_mesin_potong_gaji = 0;
            }

            if (is_numeric($detail_laporan_row->berat_lainnya)) {
                $total_berat_lainnya += $detail_laporan_row->berat_lainnya;
                $brt_lainnya = $detail_laporan_row->berat_lainnya;
                $efektifitas_mesin_lainnya = number_format((($detail_laporan_row->berat_lainnya / 3432) * 100), 2);
            } else {
                $brt_lainnya = 0;
                $efektifitas_mesin_lainnya = 0;
            }

            $dtl_number[]               = $number;
            $dtl_mth[]                  = $detail_laporan_row->mth;
            $dtl_monthname[]            = $detail_laporan_row->monthname;
            $dtl_periode[]              = $detail_laporan_row->periode;
            $dtl_potong_gaji[]          = $detail_laporan_row->potong_gaji;
            $dtl_cash[]                 = $detail_laporan_row->cash;
            $dtl_lainnya[]              = $detail_laporan_row->lainnya;
            $dtl_berat_potong_gaji[]    = $detail_laporan_row->berat_potong_gaji;
            $dtl_berat_cash[]           = $detail_laporan_row->berat_cash;
            $dtl_berat_lainnya[]        = $detail_laporan_row->berat_lainnya;
            $dtl_em_potong_gaji[]       = $efektifitas_mesin_potong_gaji;
            $dtl_em_cash[]              = $efektifitas_mesin_cash;
            $dtl_em_lainnya[]           = $efektifitas_mesin_lainnya;
            $dtl_jml_harga[]            = $hrg_cash + $hrg_potong_gaji + $hrg_lainnya;
            $dtl_jml_berat[]            = $brt_cash + $brt_potong_gaji + $brt_lainnya;
            $dtl_jml_em[]               = number_format(($efektifitas_mesin_cash + $efektifitas_mesin_potong_gaji + $efektifitas_mesin_lainnya), 2);
            $dtl_rekap_jns[]            = $detail_laporan_row->rekap_jns;
            $dtl_rekap_status_pekerja[] = $detail_laporan_row->rekap_status_pekerja;
            $dtl_rekap_tanggal_awal[]   = $detail_laporan_row->rekap_tanggal_awal;
            $dtl_rekap_tanggal_akhir[]  = $detail_laporan_row->rekap_tanggal_akhir;
            $dtl_rekap_bulan[]          = $detail_laporan_row->rekap_bulan;
            $dtl_rekap_tahun[]          = $detail_laporan_row->rekap_tahun;
            $dtl_create_by[]            = $detail_laporan_row->create_by;
            $dtl_create_date[]          = $detail_laporan_row->create_date;
            $dtl_create_comp[]          = $detail_laporan_row->create_comp;
            $dtl_create_status[]        = $detail_laporan_row->create_status;
            $dtl_app1_by[]              = $detail_laporan_row->app1_by;
            $dtl_app1_date[]            = (trim($detail_laporan_row->app1_date) != '') ? date("d-m-Y", strtotime($detail_laporan_row->app1_date)) : $detail_laporan_row->app1_date;
            $dtl_app1_comp[]            = $detail_laporan_row->app1_comp;
            $dtl_app1_status[]          = $detail_laporan_row->app1_status;
            $dtl_app2_by[]              = $detail_laporan_row->app2_by;
            $dtl_app2_date[]            = (trim($detail_laporan_row->app2_date) != '') ? date("d-m-Y", strtotime($detail_laporan_row->app2_date)) : $detail_laporan_row->app2_date;
            $dtl_app2_comp[]            = $detail_laporan_row->app2_comp;
            $dtl_app2_status[]          = $detail_laporan_row->app2_status;
            $dtl_app3_by[]              = $detail_laporan_row->app3_by;
            $dtl_app3_date[]            = (trim($detail_laporan_row->app3_date) != '') ? date("d-m-Y", strtotime($detail_laporan_row->app3_date)) : $detail_laporan_row->app3_date;
            $dtl_app3_comp[]            = $detail_laporan_row->app3_comp;
            $dtl_app3_status[]          = $detail_laporan_row->app3_status;
            $dtl_app4_by[]              = $detail_laporan_row->app4_by;
            $dtl_app4_date[]            = (trim($detail_laporan_row->app4_date) != '') ? date("d-m-Y", strtotime($detail_laporan_row->app4_date)) : $detail_laporan_row->app4_date;
            $dtl_app4_comp[]            = $detail_laporan_row->app4_comp;
            $dtl_app4_status[]          = $detail_laporan_row->app4_status;
            $dtl_rekap_id[]             = $detail_laporan_row->rekap_id;
            $dtl_app1_jabatan[]         = $detail_laporan_row->app1_jabatan;
            $dtl_app2_jabatan[]         = $detail_laporan_row->app2_jabatan;
            $dtl_app3_jabatan[]         = $detail_laporan_row->app3_jabatan;
            $dtl_app4_jabatan[]         = $detail_laporan_row->app4_jabatan;
            $dtl_app1_personalid[]      = $detail_laporan_row->app1_personalid;
            $dtl_app2_personalid[]      = $detail_laporan_row->app2_personalid;
            $dtl_app3_personalid[]      = $detail_laporan_row->app3_personalid;
            $dtl_app4_personalid[]      = $detail_laporan_row->app4_personalid;
            $dtl_app1_personalstatus[]  = $detail_laporan_row->app1_personalstatus;
            $dtl_app2_personalstatus[]  = $detail_laporan_row->app2_personalstatus;
            $dtl_app3_personalstatus[]  = $detail_laporan_row->app3_personalstatus;
            $dtl_app4_personalstatus[]  = $detail_laporan_row->app4_personalstatus;

            if (trim($detail_laporan_row->periode) != '') {
                $vdtl_periode = $detail_laporan_row->periode;
            }
        }

        $all_periode_total_cash              = 0;
        $all_periode_total_potong_gaji       = 0;
        $all_periode_total_lainnya           = 0;
        $all_periode_total_berat_cash        = 0;
        $all_periode_total_berat_potong_gaji = 0;
        $all_periode_total_berat_lainnya     = 0;
        $all_periode_periode                 = [];

        foreach ($detail_laporan_allperiode as $row) {
            $all_periode_periode[]               = $row->periode;
            $all_periode_total_cash              += $row->cash;
            $all_periode_total_potong_gaji       += $row->potong_gaji;
            $all_periode_total_lainnya           += $row->lainnya;
            $all_periode_total_berat_cash        += $row->berat_cash;
            $all_periode_total_berat_potong_gaji += $row->berat_potong_gaji;
            $all_periode_total_berat_lainnya     += $row->berat_lainnya;
        }

        $vpost_pos_ldy = '';
        foreach ($dt_allpos_laundry as $row) {
            if ($row->detail_id == $pos_ldy) {
                $vpost_pos_ldy = "- " . $row->nama_laundry . ' (' . $row->alamat . ')';
                break;
            }
        }

        $jml_mth           = count($dtl_mth);
        $vdtl_last_periode = ($vdtl_periode != '') ? (float)substr($vdtl_periode, 5) : 0;
        $jml_page          = 2;
        $jml_page2         = 2;
        $jml_row_perpage   = 14;
        $jml_row_perpage2  = 41;

        // =============================================
        // BUAT SPREADSHEET
        // =============================================
        $obj         = new Excel();
        $objPHPExcel = $obj->getActiveSheet();

        $objPHPExcel->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
        $objPHPExcel->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);
        $objPHPExcel->getPageSetup()->setFitToPage(false);
        $objPHPExcel->getPageSetup()->setScale(60);
        $objPHPExcel->getPageMargins()->setLeft(0.5);
        $objPHPExcel->getPageMargins()->setRight(0.5);
        $objPHPExcel->getPageMargins()->setBottom(0.5);
        $objPHPExcel->getPageMargins()->setTop(0.5);

        $range = [
            'A',
            'B',
            'C',
            'D',
            'E',
            'F',
            'G',
            'H',
            'I',
            'J',
            'K',
            'L',
            'M',
            'N',
            'O',
            'P',
            'Q',
            'R',
            'S',
            'T',
            'U',
            'V',
            'W',
            'X',
            'Y',
            'Z',
            'AA',
            'AB',
            'AC',
            'AD',
            'AE',
            'AF',
            'AG',
            'AH',
            'AI',
            'AJ',
            'AK',
            'AL',
            'AM',
            'AN',
            'AO',
            'AP',
            'AQ',
            'AR',
            'AS',
            'AT',
            'AU',
            'AV',
            'AW',
            'AX',
            'AY',
            'AZ',
            'BA',
            'BB',
            'BC',
            'BD',
            'BE',
            'BF',
            'BG',
            'BH',
            'BI',
            'BJ',
            'BK',
            'BL',
            'BM',
            'BN',
            'BO',
            'BP',
            'BQ',
            'BR',
            'BS',
            'BT',
            'BU',
            'BV',
            'BW',
            'BX',
            'BY'
        ];
        foreach ($range as $columnID) {
            $objPHPExcel->getColumnDimension($columnID)->setWidth(3);
        }
        $objPHPExcel->getColumnDimension('BS')->setWidth(6);
        $objPHPExcel->getColumnDimension('BT')->setWidth(6);

        $range2 = [
            'G',
            'H',
            'I',
            'J',
            'K',
            'L',
            'M',
            'N',
            'O',
            'P',
            'Q',
            'R',
            'S',
            'T',
            'U',
            'V',
            'W',
            'X',
            'Y',
            'Z',
            'AA',
            'AB',
            'AC',
            'AD',
            'AE',
            'AF',
            'AG',
            'AH',
            'AI',
            'AJ',
            'AK',
            'AL',
            'AM',
            'AN',
            'AO',
            'AP',
            'AQ',
            'AR',
            'AS',
            'AT',
            'AU',
            'AV',
            'AW',
            'AX',
            'AY',
            'AZ',
            'BA',
            'BB'
        ];
        foreach ($range2 as $columnID) {
            $objPHPExcel->getColumnDimension($columnID)->setWidth(4);
        }
        $objPHPExcel->getColumnDimension('BY')->setWidth(6);

        $hide = ['BC', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BK', 'BL', 'BM', 'BN', 'BO', 'BP', 'BQ', 'BR'];
        foreach ($hide as $col) {
            $objPHPExcel->getColumnDimension($col)->setOutlineLevel(1);
            $objPHPExcel->getColumnDimension($col)->setVisible(false);
            $objPHPExcel->getColumnDimension($col)->setCollapsed(true);
        }

        $no_urut = -1;

        for ($i3 = 0; $i3 < $jml_page2; $i3++) {
            $start_row  = ($i3 * $jml_row_perpage2) + 1;

            // Logo
            if (file_exists(FCPATH . 'assets/layouts/layout3/img/logopt.png')) {
                $gbr = new Drawing();
                $gbr->setPath(FCPATH . 'assets/layouts/layout3/img/logopt.png');
                $gbr->setWorksheet($objPHPExcel);
                $gbr->setOffsetX(20);
                $gbr->setOffsetY(5);
                $gbr->setWidth(60);
                $gbr->setHeight(44);
                $gbr->setCoordinates('B' . $start_row);
            }

            // Header PT
            $objPHPExcel->mergeCells('A' . $start_row . ':F' . ($start_row + 2));
            $objPHPExcel->mergeCells('G' . $start_row . ':BR' . ($start_row + 2));
            $objPHPExcel->setCellValue('G' . $start_row, 'PT PULAU SAMBU');

            $objPHPExcel->mergeCells('BS' . $start_row . ':BT' . $start_row);
            $objPHPExcel->setCellValue('BS' . $start_row, 'Dok');
            $objPHPExcel->mergeCells('BU' . $start_row . ':BY' . $start_row);
            $objPHPExcel->setCellValue('BU' . $start_row, ': RLPL/HOS/' . $thn_laporan);

            $objPHPExcel->mergeCells('BS' . ($start_row + 1) . ':BT' . ($start_row + 2));
            $objPHPExcel->setCellValue('BS' . ($start_row + 1), 'Periode');
            $objPHPExcel->mergeCells('BU' . ($start_row + 1) . ':BY' . ($start_row + 2));
            $objPHPExcel->setCellValue('BU' . ($start_row + 1), ': ' . $thn_laporan);

            $objPHPExcel->mergeCells('BS' . ($start_row + 3) . ':BT' . ($start_row + 3));
            $objPHPExcel->setCellValue('BS' . ($start_row + 3), 'Page');
            $objPHPExcel->mergeCells('BU' . ($start_row + 3) . ':BY' . ($start_row + 3));
            $objPHPExcel->setCellValue('BU' . ($start_row + 3), ': ' . ($i3 + 1) . ' of ' . $jml_page2);

            $objPHPExcel->mergeCells('A' . ($start_row + 3) . ':F' . ($start_row + 3));
            $objPHPExcel->setCellValue('A' . ($start_row + 3), 'JUDUL');
            $objPHPExcel->mergeCells('G' . ($start_row + 3) . ':BR' . ($start_row + 3));
            $objPHPExcel->setCellValue('G' . ($start_row + 3), 'LAPORAN PENDAPATAN LAUNDRY ' . $vpost_pos_ldy);

            // Style header
            $objPHPExcel->getStyle('A' . $start_row . ':F' . ($start_row + 2))->applyFromArray($headerStyleArr);
            $objPHPExcel->getStyle('G' . $start_row . ':BR' . ($start_row + 1))->applyFromArray($PTStyleArr);
            $objPHPExcel->getStyle('BS' . $start_row . ':BT' . $start_row)->applyFromArray($headerStyleLeftTopArr);
            $objPHPExcel->getStyle('BS' . ($start_row + 1) . ':BT' . ($start_row + 2))->applyFromArray($headerStyleLeftBottomTopArr);
            $objPHPExcel->getStyle('BS' . ($start_row + 3) . ':BT' . ($start_row + 3))->applyFromArray($headerStyleLeftBottomArr);
            $objPHPExcel->getStyle('BU' . $start_row . ':BY' . $start_row)->applyFromArray($headerStyleRightTopArr);
            $objPHPExcel->getStyle('BU' . ($start_row + 1) . ':BY' . ($start_row + 2))->applyFromArray($headerStyleRightBottomTopArr);
            $objPHPExcel->getStyle('BU' . ($start_row + 3) . ':BY' . ($start_row + 3))->applyFromArray($headerStyleRightbottomArr);
            $objPHPExcel->getStyle('A' . ($start_row + 3) . ':BR' . ($start_row + 3))->applyFromArray($headerStyleArr);

            $objPHPExcel->mergeCells('A' . ($start_row + 4) . ':AL' . ($start_row + 4));
            $objPHPExcel->mergeCells('AM' . ($start_row + 4) . ':BY' . ($start_row + 4));
            $objPHPExcel->getStyle('A' . ($start_row + 4) . ':AL' . ($start_row + 4))->applyFromArray($headerStyleLeftArr);
            $objPHPExcel->getStyle('AM' . ($start_row + 4) . ':BY' . ($start_row + 4))->applyFromArray($headerStyleRightArr);

            $arr_nama_bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

            $chr_g = 71;
            $chr_h = 72;
            $chr_i = 73;
            $chr_j = 74;
            $chr_k = 75;
            $chr_l = 76;
            $chr_m = 77;
            $chr_n = 78;
            $chr_o = 79;
            $chr_p = 80;
            $chr_q = 81;
            $chr_r = 82;
            $chr_s = 83;
            $chr_t = 84;
            $chr_u = 85;
            $chr_v = 86;

            // Helper closure untuk convert chr index ke Excel column name
            $toChrCol = function ($val) {
                if ($val < 91) return chr($val);
                elseif ($val < 116) return 'A' . chr($val - 26);
                else return 'B' . chr($val - 52);
            };

            for ($i2 = 0; $i2 < $jml_page; $i2++) {
                $base_row = ($i2 * $jml_row_perpage) + ($start_row + 5);

                // Header No & Jenis Pembayaran
                $objPHPExcel->mergeCells('A' . $base_row . ':A' . ($base_row + 2));
                $objPHPExcel->setCellValue('A' . $base_row, "No");
                $objPHPExcel->mergeCells('B' . $base_row . ':F' . ($base_row + 2));
                $objPHPExcel->setCellValue('B' . $base_row, "Jenis\nPembayaran");

                $objPHPExcel->mergeCells('BS' . $base_row . ':BY' . $base_row);
                $objPHPExcel->setCellValue('BS' . $base_row, "Total");
                $objPHPExcel->mergeCells('BS' . ($base_row + 1) . ':BT' . ($base_row + 2));
                $objPHPExcel->setCellValue('BS' . ($base_row + 1), "Kg");
                $objPHPExcel->mergeCells('BU' . ($base_row + 1) . ':BY' . ($base_row + 2));
                $objPHPExcel->setCellValue('BU' . ($base_row + 1), "Rupiah");

                $objPHPExcel->getStyle('A' . $base_row . ':F' . ($base_row + 2))->applyFromArray($DetailheaderStyleArr);
                $objPHPExcel->getStyle('BS' . $base_row . ':BY' . ($base_row + 2))->applyFromArray($DetailheaderStyleArr);

                // Baris data: Cash, Potong Gaji, Lainnya, Total
                $objPHPExcel->mergeCells('A' . ($base_row + 3) . ':A' . ($base_row + 3));
                $objPHPExcel->setCellValue('A' . ($base_row + 3), "1");
                $objPHPExcel->mergeCells('B' . ($base_row + 3) . ':F' . ($base_row + 3));
                $objPHPExcel->setCellValue('B' . ($base_row + 3), "Cash");

                $objPHPExcel->mergeCells('A' . ($base_row + 4) . ':A' . ($base_row + 4));
                $objPHPExcel->setCellValue('A' . ($base_row + 4), "2");
                $objPHPExcel->mergeCells('B' . ($base_row + 4) . ':F' . ($base_row + 4));
                $objPHPExcel->setCellValue('B' . ($base_row + 4), "Potong Gaji");

                $objPHPExcel->mergeCells('A' . ($base_row + 5) . ':A' . ($base_row + 5));
                $objPHPExcel->setCellValue('A' . ($base_row + 5), "3");
                $objPHPExcel->mergeCells('B' . ($base_row + 5) . ':F' . ($base_row + 5));
                $objPHPExcel->setCellValue('B' . ($base_row + 5), "Lainnya");

                $objPHPExcel->mergeCells('A' . ($base_row + 6) . ':F' . ($base_row + 6));
                $objPHPExcel->setCellValue('A' . ($base_row + 6), "Total");

                $objPHPExcel->getStyle('A' . ($base_row + 3) . ':F' . ($base_row + 5))->applyFromArray($bodyStyleArr);
                $objPHPExcel->getStyle('A' . ($base_row + 6) . ':F' . ($base_row + 6))->applyFromArray($DetailheaderStyleArr);

                $objPHPExcel->mergeCells('A' . ($base_row + 7) . ':F' . ($base_row + 13));
                $objPHPExcel->getStyle('A' . ($base_row + 7) . ':F' . ($base_row + 13))->applyFromArray($headerStyleLeftArr);

                for ($i = 0; $i < 3; $i++) {
                    $idx = (($i2 * 3) + $i) + ($i3 * 6);

                    $chr_g_x = $toChrCol(($i * 16) + $chr_g);
                    $chr_h_x = $toChrCol(($i * 16) + $chr_h);
                    $chr_i_x = $toChrCol(($i * 16) + $chr_i);
                    $chr_j_x = $toChrCol(($i * 16) + $chr_j);
                    $chr_k_x = $toChrCol(($i * 16) + $chr_k);
                    $chr_l_x = $toChrCol(($i * 16) + $chr_l);
                    $chr_m_x = $toChrCol(($i * 16) + $chr_m);
                    $chr_n_x = $toChrCol(($i * 16) + $chr_n);
                    $chr_o_x = $toChrCol(($i * 16) + $chr_o);
                    $chr_p_x = $toChrCol(($i * 16) + $chr_p);
                    $chr_q_x = $toChrCol(($i * 16) + $chr_q);
                    $chr_r_x = $toChrCol(($i * 16) + $chr_r);
                    $chr_s_x = $toChrCol(($i * 16) + $chr_s);
                    $chr_t_x = $toChrCol(($i * 16) + $chr_t);
                    $chr_u_x = $toChrCol(($i * 16) + $chr_u);
                    $chr_v_x = $toChrCol(($i * 16) + $chr_v);

                    // Format nilai
                    $ndt_potong_gaji  = isset($dtl_potong_gaji[$idx])  && trim($dtl_potong_gaji[$idx])  != '' ? number_format($dtl_potong_gaji[$idx],  0, ',', '.') : (isset($dtl_potong_gaji[$idx])  ? '-' : '');
                    $ndt_cash         = isset($dtl_cash[$idx])         && trim($dtl_cash[$idx])         != '' ? number_format($dtl_cash[$idx],         0, ',', '.') : (isset($dtl_cash[$idx])         ? '-' : '');
                    $ndt_lainnya      = isset($dtl_lainnya[$idx])      && trim($dtl_lainnya[$idx])      != '' ? number_format($dtl_lainnya[$idx],      0, ',', '.') : (isset($dtl_lainnya[$idx])      ? '-' : '');

                    $ndt_berat_potong_gaji = isset($dtl_berat_potong_gaji[$idx]) && trim($dtl_berat_potong_gaji[$idx]) != '' ? number_format($dtl_berat_potong_gaji[$idx], 2, ',', '.') : (isset($dtl_berat_potong_gaji[$idx]) ? '-' : '');
                    $ndt_berat_cash        = isset($dtl_berat_cash[$idx])        && trim($dtl_berat_cash[$idx])        != '' ? number_format($dtl_berat_cash[$idx],        2, ',', '.') : (isset($dtl_berat_cash[$idx])        ? '-' : '');
                    $ndt_berat_lainnya     = isset($dtl_berat_lainnya[$idx])     && trim($dtl_berat_lainnya[$idx])     != '' ? number_format($dtl_berat_lainnya[$idx],     2, ',', '.') : (isset($dtl_berat_lainnya[$idx])     ? '-' : '');

                    $ndt_em_potong_gaji = (isset($dtl_em_potong_gaji[$idx]) && $dtl_em_potong_gaji[$idx] > 0) ? number_format($dtl_em_potong_gaji[$idx], 2, ',', '.') : '';
                    $ndt_em_cash        = (isset($dtl_em_cash[$idx])        && $dtl_em_cash[$idx]        > 0) ? number_format($dtl_em_cash[$idx],        2, ',', '.') : '';
                    $ndt_em_lainnya     = (isset($dtl_em_lainnya[$idx])     && $dtl_em_lainnya[$idx]     > 0) ? number_format($dtl_em_lainnya[$idx],     2, ',', '.') : '';

                    $ndt_jml_berat = (isset($dtl_jml_berat[$idx]) && $dtl_jml_berat[$idx] > 0) ? number_format($dtl_jml_berat[$idx], 2, ',', '.') : '-';
                    $ndt_jml_harga = (isset($dtl_jml_harga[$idx]) && $dtl_jml_harga[$idx] > 0) ? number_format($dtl_jml_harga[$idx], 0, ',', '.') : '-';
                    $ndt_jml_em    = (isset($dtl_jml_em[$idx])    && $dtl_jml_em[$idx]    > 0) ? number_format($dtl_jml_em[$idx],    2, ',', '.') : '-';

                    $ndt_app1_by      = isset($dtl_app1_by[$idx])      && trim($dtl_app1_by[$idx])      != '' ? $dtl_app1_by[$idx]      : '-';
                    $ndt_app1_date    = isset($dtl_app1_date[$idx])    && trim($dtl_app1_date[$idx])    != '' ? $dtl_app1_date[$idx]    : '-';
                    $ndt_app1_jabatan = isset($dtl_app1_jabatan[$idx]) && trim($dtl_app1_jabatan[$idx]) != '' ? $dtl_app1_jabatan[$idx] : '-';
                    $ndt_app2_by      = (isset($dtl_app2_by[$idx])     && trim($dtl_app2_by[$idx])      != '') ? 'REYNALD ALEX'          : '-';
                    $ndt_app2_date    = isset($dtl_app2_date[$idx])    && trim($dtl_app2_date[$idx])    != '' ? $dtl_app2_date[$idx]    : '-';
                    $ndt_app2_jabatan = (isset($dtl_app2_jabatan[$idx]) && trim($dtl_app2_jabatan[$idx]) != '') ? 'General Manager'       : '-';

                    // Header bulan
                    $objPHPExcel->mergeCells($chr_g_x . $base_row . ':' . $chr_v_x . $base_row);
                    $objPHPExcel->setCellValue($chr_g_x . $base_row, $arr_nama_bulan[$idx] ?? '');

                    $objPHPExcel->mergeCells($chr_g_x . ($base_row + 1) . ':' . $chr_i_x . ($base_row + 2));
                    $objPHPExcel->setCellValue($chr_g_x . ($base_row + 1), "Kg");
                    $objPHPExcel->mergeCells($chr_j_x . ($base_row + 1) . ':' . $chr_q_x . ($base_row + 2));
                    $objPHPExcel->setCellValue($chr_j_x . ($base_row + 1), "Rupiah");
                    $objPHPExcel->mergeCells($chr_r_x . ($base_row + 1) . ':' . $chr_v_x . ($base_row + 2));
                    $objPHPExcel->setCellValue($chr_r_x . ($base_row + 1), "% Efektifitas\nMesin");
                    $objPHPExcel->getStyle($chr_g_x . $base_row . ':' . $chr_v_x . ($base_row + 2))->applyFromArray($DetailheaderStyleArr);

                    // Data cash
                    $objPHPExcel->mergeCells($chr_g_x . ($base_row + 3) . ':' . $chr_i_x . ($base_row + 3));
                    $objPHPExcel->setCellValue($chr_g_x . ($base_row + 3), $ndt_berat_cash);
                    $objPHPExcel->mergeCells($chr_j_x . ($base_row + 3) . ':' . $chr_q_x . ($base_row + 3));
                    $objPHPExcel->setCellValue($chr_j_x . ($base_row + 3), $ndt_cash);
                    $objPHPExcel->mergeCells($chr_r_x . ($base_row + 3) . ':' . $chr_v_x . ($base_row + 3));
                    $objPHPExcel->setCellValue($chr_r_x . ($base_row + 3), $ndt_em_cash);

                    // Data potong gaji
                    $objPHPExcel->mergeCells($chr_g_x . ($base_row + 4) . ':' . $chr_i_x . ($base_row + 4));
                    $objPHPExcel->setCellValue($chr_g_x . ($base_row + 4), $ndt_berat_potong_gaji);
                    $objPHPExcel->mergeCells($chr_j_x . ($base_row + 4) . ':' . $chr_q_x . ($base_row + 4));
                    $objPHPExcel->setCellValue($chr_j_x . ($base_row + 4), $ndt_potong_gaji);
                    $objPHPExcel->mergeCells($chr_r_x . ($base_row + 4) . ':' . $chr_v_x . ($base_row + 4));
                    $objPHPExcel->setCellValue($chr_r_x . ($base_row + 4), $ndt_em_potong_gaji);

                    // Data lainnya
                    $objPHPExcel->mergeCells($chr_g_x . ($base_row + 5) . ':' . $chr_i_x . ($base_row + 5));
                    $objPHPExcel->setCellValue($chr_g_x . ($base_row + 5), $ndt_berat_lainnya);
                    $objPHPExcel->mergeCells($chr_j_x . ($base_row + 5) . ':' . $chr_q_x . ($base_row + 5));
                    $objPHPExcel->setCellValue($chr_j_x . ($base_row + 5), $ndt_lainnya);
                    $objPHPExcel->mergeCells($chr_r_x . ($base_row + 5) . ':' . $chr_v_x . ($base_row + 5));
                    $objPHPExcel->setCellValue($chr_r_x . ($base_row + 5), $ndt_em_lainnya);

                    // Total
                    $objPHPExcel->mergeCells($chr_g_x . ($base_row + 6) . ':' . $chr_i_x . ($base_row + 6));
                    $objPHPExcel->setCellValue($chr_g_x . ($base_row + 6), $ndt_jml_berat);
                    $objPHPExcel->mergeCells($chr_j_x . ($base_row + 6) . ':' . $chr_q_x . ($base_row + 6));
                    $objPHPExcel->setCellValue($chr_j_x . ($base_row + 6), $ndt_jml_harga);
                    $objPHPExcel->mergeCells($chr_r_x . ($base_row + 6) . ':' . $chr_v_x . ($base_row + 6));
                    $objPHPExcel->setCellValue($chr_r_x . ($base_row + 6), $ndt_jml_em);

                    $objPHPExcel->getStyle($chr_g_x . ($base_row + 3) . ':' . $chr_v_x . ($base_row + 5))->applyFromArray($bodyStyleArr);
                    $objPHPExcel->getStyle($chr_g_x . ($base_row + 6) . ':' . $chr_v_x . ($base_row + 6))->applyFromArray($DetailheaderStyleArr);

                    // TTD area
                    $objPHPExcel->mergeCells($chr_g_x . ($base_row + 7) . ':' . $chr_n_x . ($base_row + 7));
                    $objPHPExcel->setCellValue($chr_g_x . ($base_row + 7), "Dibuat Oleh");
                    $objPHPExcel->mergeCells($chr_o_x . ($base_row + 7) . ':' . $chr_v_x . ($base_row + 7));
                    $objPHPExcel->setCellValue($chr_o_x . ($base_row + 7), "Disetujui Oleh");

                    // TTD app1
                    if (isset($dtl_app1_personalid[$idx]) && $dtl_app1_personalid[$idx] != '' && isset($dtl_app1_personalstatus[$idx]) && $dtl_app1_personalstatus[$idx] != '') {
                        if ($dtl_app1_personalstatus[$idx] == 2) {
                            $base_path_app1 = FCPATH . 'assets/foto/TTD_TK/' . $dtl_app1_personalid[$idx] . '.PNG';
                        } else {
                            $base_path_app1 = FCPATH . 'assets/foto/TTD_KRY/' . $dtl_app1_personalid[$idx] . '_0_0.PNG';
                        }
                        if (file_exists($base_path_app1)) {
                            $_img = new Drawing();
                            $_img->setPath($base_path_app1);
                            $_img->setWidthAndHeight(200, 100);
                            $_img->setOffsetY(5);
                            $_img->setOffsetX(5);
                            $_img->setResizeProportional(true);
                            $_img->setWorksheet($objPHPExcel);
                            $_img->setCoordinates($chr_h_x . ($base_row + 8));
                        }
                    }

                    // TTD app2
                    if (isset($dtl_app2_personalid[$idx]) && $dtl_app2_personalid[$idx] != '' && isset($dtl_app2_personalstatus[$idx]) && $dtl_app2_personalstatus[$idx] != '') {
                        $approved2_path = FCPATH . 'assets/approved2.png';
                        if (file_exists($approved2_path)) {
                            $_img2 = new Drawing();
                            $_img2->setPath($approved2_path);
                            $_img2->setWidthAndHeight(130, 80);
                            $_img2->setOffsetY(5);
                            $_img2->setOffsetX(5);
                            $_img2->setResizeProportional(true);
                            $_img2->setWorksheet($objPHPExcel);
                            $_img2->setCoordinates($chr_q_x . ($base_row + 8));
                        }
                    }

                    $objPHPExcel->mergeCells($chr_g_x . ($base_row + 8) . ':' . $chr_n_x . ($base_row + 9));
                    $objPHPExcel->mergeCells($chr_o_x . ($base_row + 8) . ':' . $chr_v_x . ($base_row + 9));
                    $objPHPExcel->getStyle($chr_g_x . ($base_row + 7) . ':' . $chr_v_x . ($base_row + 9))->applyFromArray($headerStyleArr);

                    // Info nama/jabatan/tanggal
                    $objPHPExcel->mergeCells($chr_g_x . ($base_row + 10) . ':' . $chr_h_x . ($base_row + 10));
                    $objPHPExcel->setCellValue($chr_g_x . ($base_row + 10), "Nama");
                    $objPHPExcel->mergeCells($chr_i_x . ($base_row + 10) . ':' . $chr_n_x . ($base_row + 10));
                    $objPHPExcel->setCellValue($chr_i_x . ($base_row + 10), ": " . $ndt_app1_by);
                    $objPHPExcel->mergeCells($chr_o_x . ($base_row + 10) . ':' . $chr_p_x . ($base_row + 10));
                    $objPHPExcel->setCellValue($chr_o_x . ($base_row + 10), "Nama");
                    $objPHPExcel->mergeCells($chr_q_x . ($base_row + 10) . ':' . $chr_v_x . ($base_row + 10));
                    $objPHPExcel->setCellValue($chr_q_x . ($base_row + 10), ": " . $ndt_app2_by);

                    $objPHPExcel->mergeCells($chr_g_x . ($base_row + 11) . ':' . $chr_h_x . ($base_row + 11));
                    $objPHPExcel->setCellValue($chr_g_x . ($base_row + 11), "Jabatan");
                    $objPHPExcel->mergeCells($chr_i_x . ($base_row + 11) . ':' . $chr_n_x . ($base_row + 11));
                    $objPHPExcel->setCellValue($chr_i_x . ($base_row + 11), ": " . $ndt_app1_jabatan);
                    $objPHPExcel->mergeCells($chr_o_x . ($base_row + 11) . ':' . $chr_p_x . ($base_row + 11));
                    $objPHPExcel->setCellValue($chr_o_x . ($base_row + 11), "Jabatan");
                    $objPHPExcel->mergeCells($chr_q_x . ($base_row + 11) . ':' . $chr_v_x . ($base_row + 11));
                    $objPHPExcel->setCellValue($chr_q_x . ($base_row + 11), ": " . $ndt_app2_jabatan);

                    $objPHPExcel->mergeCells($chr_g_x . ($base_row + 12) . ':' . $chr_h_x . ($base_row + 12));
                    $objPHPExcel->setCellValue($chr_g_x . ($base_row + 12), "Tanggal");
                    $objPHPExcel->mergeCells($chr_i_x . ($base_row + 12) . ':' . $chr_n_x . ($base_row + 12));
                    $objPHPExcel->setCellValue($chr_i_x . ($base_row + 12), ": " . $ndt_app1_date);
                    $objPHPExcel->mergeCells($chr_o_x . ($base_row + 12) . ':' . $chr_p_x . ($base_row + 12));
                    $objPHPExcel->setCellValue($chr_o_x . ($base_row + 12), "Tanggal");
                    $objPHPExcel->mergeCells($chr_q_x . ($base_row + 12) . ':' . $chr_v_x . ($base_row + 12));
                    $objPHPExcel->setCellValue($chr_q_x . ($base_row + 12), ": " . $ndt_app2_date);

                    $objPHPExcel->getStyle($chr_g_x . ($base_row + 10) . ':' . $chr_h_x . ($base_row + 12))->applyFromArray($headerStyleLeftBottomTopArr);
                    $objPHPExcel->getStyle($chr_i_x . ($base_row + 10) . ':' . $chr_n_x . ($base_row + 12))->applyFromArray($headerStyleRightBottomTopArr);
                    $objPHPExcel->getStyle($chr_o_x . ($base_row + 10) . ':' . $chr_p_x . ($base_row + 12))->applyFromArray($headerStyleLeftBottomTopArr);
                    $objPHPExcel->getStyle($chr_q_x . ($base_row + 10) . ':' . $chr_v_x . ($base_row + 12))->applyFromArray($headerStyleRightBottomTopArr);

                    $objPHPExcel->mergeCells($chr_g_x . ($base_row + 13) . ':' . $chr_v_x . ($base_row + 13));
                    $objPHPExcel->getStyle($chr_g_x . ($base_row + 13) . ':' . $chr_v_x . ($base_row + 13))->applyFromArray($noborderStyleArr);
                } // end for $i

                // Row heights
                for ($rh = 0; $rh <= 7; $rh++) {
                    $objPHPExcel->getRowDimension($base_row + $rh)->setRowHeight(20);
                }
                $objPHPExcel->getRowDimension($base_row + 8)->setRowHeight(40);
                $objPHPExcel->getRowDimension($base_row + 9)->setRowHeight(40);
                for ($rh = 10; $rh <= 12; $rh++) {
                    $objPHPExcel->getRowDimension($base_row + $rh)->setRowHeight(20);
                }

                // Kolom Total (BS:BY) per baris
                $no_urut++;

                $vtotal_berat_cash        = ($vdtl_last_periode > ($no_urut * 3) && $vdtl_last_periode <= ($no_urut * 3 + 3) && $total_berat_cash > 0) ? number_format($total_berat_cash, 2, ',', '.') : '';
                $vtotal_cash              = ($vdtl_last_periode > ($no_urut * 3) && $vdtl_last_periode <= ($no_urut * 3 + 3) && $total_cash > 0) ? number_format($total_cash, 0, ',', '.') : '';
                $vtotal_berat_potong_gaji = ($vdtl_last_periode > ($no_urut * 3) && $vdtl_last_periode <= ($no_urut * 3 + 3) && $total_berat_potong_gaji > 0) ? number_format($total_berat_potong_gaji, 2, ',', '.') : '';
                $vtotal_potong_gaji       = ($vdtl_last_periode > ($no_urut * 3) && $vdtl_last_periode <= ($no_urut * 3 + 3) && $total_potong_gaji > 0) ? number_format($total_potong_gaji, 0, ',', '.') : '';
                $vtotal_berat_lainnya     = ($vdtl_last_periode > ($no_urut * 3) && $vdtl_last_periode <= ($no_urut * 3 + 3) && $total_berat_lainnya > 0) ? number_format($total_berat_lainnya, 2, ',', '.') : '';
                $vtotal_lainnya           = ($vdtl_last_periode > ($no_urut * 3) && $vdtl_last_periode <= ($no_urut * 3 + 3) && $total_lainnya > 0) ? number_format($total_lainnya, 0, ',', '.') : '';
                $vtotal_all_kg            = ($vdtl_last_periode > ($no_urut * 3) && $vdtl_last_periode <= ($no_urut * 3 + 3) && ($total_berat_cash + $total_berat_potong_gaji + $total_berat_lainnya) > 0) ? number_format(($total_berat_cash + $total_berat_potong_gaji + $total_berat_lainnya), 2, ',', '.') : '';
                $vtotal_all_rp            = ($vdtl_last_periode > ($no_urut * 3) && $vdtl_last_periode <= ($no_urut * 3 + 3) && ($total_cash + $total_potong_gaji + $total_lainnya) > 0) ? number_format(($total_cash + $total_potong_gaji + $total_lainnya), 0, ',', '.') : '';

                $objPHPExcel->mergeCells('BS' . ($base_row + 3) . ':BT' . ($base_row + 3));
                $objPHPExcel->setCellValue('BS' . ($base_row + 3), $vtotal_berat_cash);
                $objPHPExcel->mergeCells('BU' . ($base_row + 3) . ':BY' . ($base_row + 3));
                $objPHPExcel->setCellValue('BU' . ($base_row + 3), $vtotal_cash);

                $objPHPExcel->mergeCells('BS' . ($base_row + 4) . ':BT' . ($base_row + 4));
                $objPHPExcel->setCellValue('BS' . ($base_row + 4), $vtotal_berat_potong_gaji);
                $objPHPExcel->mergeCells('BU' . ($base_row + 4) . ':BY' . ($base_row + 4));
                $objPHPExcel->setCellValue('BU' . ($base_row + 4), $vtotal_potong_gaji);

                $objPHPExcel->mergeCells('BS' . ($base_row + 5) . ':BT' . ($base_row + 5));
                $objPHPExcel->setCellValue('BS' . ($base_row + 5), $vtotal_berat_lainnya);
                $objPHPExcel->mergeCells('BU' . ($base_row + 5) . ':BY' . ($base_row + 5));
                $objPHPExcel->setCellValue('BU' . ($base_row + 5), $vtotal_lainnya);

                $objPHPExcel->mergeCells('BS' . ($base_row + 6) . ':BT' . ($base_row + 6));
                $objPHPExcel->setCellValue('BS' . ($base_row + 6), $vtotal_all_kg);
                $objPHPExcel->mergeCells('BU' . ($base_row + 6) . ':BY' . ($base_row + 6));
                $objPHPExcel->setCellValue('BU' . ($base_row + 6), $vtotal_all_rp);

                $objPHPExcel->getStyle('BS' . ($base_row + 3) . ':BY' . ($base_row + 5))->applyFromArray($bodyStyleArr);
                $objPHPExcel->getStyle('BS' . ($base_row + 6) . ':BY' . ($base_row + 6))->applyFromArray($DetailheaderStyleArr);

                $objPHPExcel->mergeCells('BS' . ($base_row + 7) . ':BY' . ($base_row + 13));
                $objPHPExcel->getStyle('BS' . ($base_row + 7) . ':BY' . ($base_row + 13))->applyFromArray($headerStyleRightArr);

                $last_row = $base_row + 13;
            } // end for $i2

            // =============================================
            // FOOTER / SUMMARY SECTION
            // =============================================
            $v_nama_bln = [
                '01' => 'JANUARI',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER'
            ];

            $total_allperiode_cash_kg       = $all_periode_total_berat_cash        > 0 ? number_format($all_periode_total_berat_cash,        2, ',', '.') : '-';
            $total_allperiode_cash_rp       = $all_periode_total_cash              > 0 ? number_format($all_periode_total_cash,              0, ',', '.') : '-';
            $total_allperiode_potonggaji_kg = $all_periode_total_berat_potong_gaji > 0 ? number_format($all_periode_total_berat_potong_gaji, 2, ',', '.') : '-';
            $total_allperiode_potonggaji_rp = $all_periode_total_potong_gaji       > 0 ? number_format($all_periode_total_potong_gaji,       0, ',', '.') : '-';
            $total_allperiode_lainnya_kg    = $all_periode_total_berat_lainnya     > 0 ? number_format($all_periode_total_berat_lainnya,     2, ',', '.') : '-';
            $total_allperiode_lainnya_rp    = $all_periode_total_lainnya           > 0 ? number_format($all_periode_total_lainnya,           0, ',', '.') : '-';
            $total_allperiode_kg = (($all_periode_total_berat_cash + $all_periode_total_berat_potong_gaji + $all_periode_total_berat_lainnya) > 0) ? number_format(($all_periode_total_berat_cash + $all_periode_total_berat_potong_gaji + $all_periode_total_berat_lainnya), 2, ',', '.') : '-';
            $total_allperiode_rp = (($all_periode_total_cash + $all_periode_total_potong_gaji + $all_periode_total_lainnya) > 0) ? number_format(($all_periode_total_cash + $all_periode_total_potong_gaji + $all_periode_total_lainnya), 0, ',', '.') : '-';

            $range_periode = '';
            if (count($all_periode_periode) > 0) {
                $first = reset($all_periode_periode);
                $last  = end($all_periode_periode);
                $range_periode = $v_nama_bln[substr($first, 5, 2)] . "-" . substr($first, 0, 4) . " S/D " . $v_nama_bln[substr($last, 5, 2)] . "-" . substr($last, 0, 4);
            }

            $fr = $last_row + 1; // footer row start

            $objPHPExcel->mergeCells('A' . $fr . ':A' . $fr);
            $objPHPExcel->mergeCells('B' . $fr . ':I' . $fr);
            $objPHPExcel->setCellValue('B' . $fr, "Ket :");
            $objPHPExcel->mergeCells('J' . $fr . ':P' . $fr);
            $objPHPExcel->mergeCells('Q' . $fr . ':AI' . $fr);
            $objPHPExcel->setCellValue('Q' . $fr, "TOTAL " . $range_periode);
            $objPHPExcel->mergeCells('AM' . $fr . ':AV' . $fr);
            $objPHPExcel->mergeCells('AW' . $fr . ':AW' . $fr);
            $objPHPExcel->mergeCells('AX' . $fr . ':BY' . $fr);

            $objPHPExcel->mergeCells('B' . ($fr + 1) . ':I' . ($fr + 1));
            $objPHPExcel->setCellValue('B' . ($fr + 1), "Awal mesin produksi");
            $objPHPExcel->mergeCells('J' . ($fr + 1) . ':P' . ($fr + 1));
            $objPHPExcel->setCellValue('J' . ($fr + 1), ": 19 Maret 2020");
            $objPHPExcel->mergeCells('Q' . ($fr + 1) . ':W' . ($fr + 1));
            $objPHPExcel->setCellValue('Q' . ($fr + 1), "Jenis Pembayaran");
            $objPHPExcel->mergeCells('X' . ($fr + 1) . ':AC' . ($fr + 1));
            $objPHPExcel->setCellValue('X' . ($fr + 1), "Kg");
            $objPHPExcel->mergeCells('AD' . ($fr + 1) . ':AI' . ($fr + 1));
            $objPHPExcel->setCellValue('AD' . ($fr + 1), "Rupiah");
            $objPHPExcel->mergeCells('AM' . ($fr + 1) . ':AV' . ($fr + 1));
            $objPHPExcel->setCellValue('AM' . ($fr + 1), "% Efektifitas Mesin");
            $objPHPExcel->mergeCells('AW' . ($fr + 1) . ':AW' . ($fr + 1));
            $objPHPExcel->mergeCells('AX' . ($fr + 1) . ':BY' . ($fr + 1));

            $objPHPExcel->mergeCells('B' . ($fr + 2) . ':I' . ($fr + 2));
            $objPHPExcel->setCellValue('B' . ($fr + 2), "Jumlah mesin");
            $objPHPExcel->mergeCells('J' . ($fr + 2) . ':P' . ($fr + 2));
            $objPHPExcel->setCellValue('J' . ($fr + 2), ": 2 unit");
            $objPHPExcel->mergeCells('Q' . ($fr + 2) . ':W' . ($fr + 2));
            $objPHPExcel->setCellValue('Q' . ($fr + 2), "Cash");
            $objPHPExcel->mergeCells('X' . ($fr + 2) . ':AC' . ($fr + 2));
            $objPHPExcel->setCellValue('X' . ($fr + 2), $total_allperiode_cash_kg);
            $objPHPExcel->mergeCells('AD' . ($fr + 2) . ':AI' . ($fr + 2));
            $objPHPExcel->setCellValue('AD' . ($fr + 2), $total_allperiode_cash_rp);
            $objPHPExcel->mergeCells('AM' . ($fr + 2) . ':AV' . ($fr + 2));
            $objPHPExcel->setCellValue('AM' . ($fr + 2), "(Jumlah kg per bulan dibagi 3432) * 100%");
            $objPHPExcel->mergeCells('AW' . ($fr + 2) . ':AW' . ($fr + 2));
            $objPHPExcel->mergeCells('AX' . ($fr + 2) . ':BY' . ($fr + 2));

            $objPHPExcel->mergeCells('B' . ($fr + 3) . ':I' . ($fr + 3));
            $objPHPExcel->setCellValue('B' . ($fr + 3), "Target");
            $objPHPExcel->mergeCells('J' . ($fr + 3) . ':P' . ($fr + 3));
            $objPHPExcel->setCellValue('J' . ($fr + 3), ": Per hari 132 Kg");
            $objPHPExcel->mergeCells('Q' . ($fr + 3) . ':W' . ($fr + 3));
            $objPHPExcel->setCellValue('Q' . ($fr + 3), "Potong Gaji");
            $objPHPExcel->mergeCells('X' . ($fr + 3) . ':AC' . ($fr + 3));
            $objPHPExcel->setCellValue('X' . ($fr + 3), $total_allperiode_potonggaji_kg);
            $objPHPExcel->mergeCells('AD' . ($fr + 3) . ':AI' . ($fr + 3));
            $objPHPExcel->setCellValue('AD' . ($fr + 3), $total_allperiode_potonggaji_rp);
            $objPHPExcel->mergeCells('AM' . ($fr + 3) . ':AV' . ($fr + 3));
            $objPHPExcel->mergeCells('AX' . ($fr + 3) . ':BY' . ($fr + 3));

            $objPHPExcel->mergeCells('J' . ($fr + 4) . ':P' . ($fr + 4));
            $objPHPExcel->setCellValue('J' . ($fr + 4), ": Per bulan 3.432 Kg");
            $objPHPExcel->mergeCells('Q' . ($fr + 4) . ':W' . ($fr + 4));
            $objPHPExcel->setCellValue('Q' . ($fr + 4), "Lainnya");
            $objPHPExcel->mergeCells('X' . ($fr + 4) . ':AC' . ($fr + 4));
            $objPHPExcel->setCellValue('X' . ($fr + 4), $total_allperiode_lainnya_kg);
            $objPHPExcel->mergeCells('AD' . ($fr + 4) . ':AI' . ($fr + 4));
            $objPHPExcel->setCellValue('AD' . ($fr + 4), $total_allperiode_lainnya_rp);
            $objPHPExcel->mergeCells('AX' . ($fr + 4) . ':BY' . ($fr + 4));

            $objPHPExcel->mergeCells('Q' . ($fr + 5) . ':W' . ($fr + 5));
            $objPHPExcel->setCellValue('Q' . ($fr + 5), "Total");
            $objPHPExcel->mergeCells('X' . ($fr + 5) . ':AC' . ($fr + 5));
            $objPHPExcel->setCellValue('X' . ($fr + 5), $total_allperiode_kg);
            $objPHPExcel->mergeCells('AD' . ($fr + 5) . ':AI' . ($fr + 5));
            $objPHPExcel->setCellValue('AD' . ($fr + 5), $total_allperiode_rp);

            // Footer styles
            $objPHPExcel->getStyle('A' . $fr . ':A' . ($fr + 5))->applyFromArray($headerStyleLeftArr);
            $objPHPExcel->getStyle('B' . $fr . ':AL' . ($fr + 4))->applyFromArray($noborderStyleArr);
            $objPHPExcel->getStyle('Q' . $fr . ':AI' . ($fr + 1))->applyFromArray($DetailheaderStyleArr);
            $objPHPExcel->getStyle('Q' . ($fr + 2) . ':AI' . ($fr + 4))->applyFromArray($bodyStyleArr);
            $objPHPExcel->getStyle('Q' . ($fr + 5) . ':AI' . ($fr + 5))->applyFromArray($DetailheaderStyleArr);
            $objPHPExcel->getStyle('AM' . ($fr + 1) . ':AV' . ($fr + 1))->applyFromArray($headerStyleLeftTopArr);
            $objPHPExcel->getStyle('AM' . ($fr + 2) . ':AV' . ($fr + 2))->applyFromArray($headerStyleLeftBottomArr);
            $objPHPExcel->getStyle('AW' . ($fr + 1) . ':AW' . ($fr + 1))->applyFromArray($headerStyleRightTopArr);
            $objPHPExcel->getStyle('AW' . ($fr + 2) . ':AW' . ($fr + 2))->applyFromArray($headerStyleRightbottomArr);
            $objPHPExcel->getStyle('AM' . ($fr + 3) . ':AW' . ($fr + 4))->applyFromArray($noborderStyleArr);
            $objPHPExcel->getStyle('AX' . $fr . ':BY' . ($fr + 5))->applyFromArray($headerStyleRightArr);

            $objPHPExcel->mergeCells('A' . ($fr + 5) . ':P' . ($fr + 5));
            $objPHPExcel->mergeCells('AJ' . ($fr + 5) . ':BY' . ($fr + 5));
            $objPHPExcel->mergeCells('A' . ($fr + 6) . ':BY' . ($fr + 6));
            $objPHPExcel->getStyle('A' . ($fr + 6) . ':BX' . ($fr + 6))->applyFromArray($footerStyleLeftbottomArr);
            $objPHPExcel->getStyle('BY' . ($fr + 6) . ':BY' . ($fr + 6))->applyFromArray($footerStyleRightbottomArr);
            $objPHPExcel->getStyle('AJ' . ($fr + 6) . ':BY' . ($fr + 6))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

            // Page break
            $objPHPExcel->setBreak('A' . ($fr + 7), Worksheet::BREAK_ROW);
        } // end for $i3

        // =============================================
        // OUTPUT
        // =============================================
        while (ob_get_level()) ob_end_clean();

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Pendapatan Laundry (Management) ' . $thn_laporan . '.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = IOFactory::createWriter($obj, 'Xls');
        $objWriter->save('php://output');
        exit();
    }
}
