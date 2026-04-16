<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laundry_excel_rekap3 extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('M_Laundry_Rekap');
    // $this->load->model('M_user');
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

    // var_dump($get_nama_laporan);
    // die;

    if (isset($get_nama_laporan) && trim($get_nama_laporan) != '-') {
      $nama_laporan = $get_nama_laporan;
    } else {
      $nama_laporan = NULL;
    }
    if (isset($get_tipe_laporan) && trim($get_tipe_laporan) != '-') {
      $tipe_laporan = $get_tipe_laporan;
    } else {
      $tipe_laporan = NULL;
    }
    if (isset($get_bln_laporan) && trim($get_bln_laporan) != '-') {
      $bln_laporan = $get_bln_laporan;
    } else {
      $bln_laporan = NULL;
    }
    if (isset($get_thn_laporan) && trim($get_thn_laporan) != '-') {
      $thn_laporan = $get_thn_laporan;
    } else {
      $thn_laporan = NULL;
    }
    if (isset($get_tanggal_awal) && trim($get_tanggal_awal) != '-') {
      $tanggal_awal = date("Y-m-d", strtotime($get_tanggal_awal));
    } else {
      $tanggal_awal = NULL;
    }
    if (isset($get_tanggal_akhir) && trim($get_tanggal_akhir) != '-') {
      $tanggal_akhir = date("Y-m-d", strtotime($get_tanggal_akhir));
    } else {
      $tanggal_akhir = NULL;
    }
    if (isset($get_periode_laporan) && trim($get_periode_laporan) != '-') {
      $periode_laporan = $get_periode_laporan;
    } else {
      $periode_laporan = NULL;
    }
    if (isset($get_pos_ldy) && trim($get_pos_ldy) != '-') {
      $pos_ldy = $get_pos_ldy;
    } else {
      $pos_ldy = NULL;
    }

    if (isset($thn_laporan)) {
      $str_thn = $thn_laporan;
    } else {
      $str_thn = '';
    }

    $detail_laporan            = $this->M_Laundry_Rekap->get_detail_rekap3($nama_laporan, $thn_laporan, $pos_ldy);
    $detail_laporan_allperiode = $this->M_Laundry_Rekap->get_detail_rekap3_allperiodee($pos_ldy);
    $dt_allpos_laundry         = $this->M_Laundry_Rekap->get_allpos_laundry();

    $PTStyle                      = new PHPExcel_Style();
    $headerStyle                  = new PHPExcel_Style();
    $DetailheaderStyle            = new PHPExcel_Style();
    $DetailheaderVerticalStyle    = new PHPExcel_Style();
    $bodyStyle                    = new PHPExcel_Style();
    $cellred                      = new PHPExcel_Style();
    $headerStyleOutline           = new PHPExcel_Style();
    $headerStyleRight             = new PHPExcel_Style();
    $headerStyleLeft              = new PHPExcel_Style();
    $headerStyleRightTop          = new PHPExcel_Style();
    $headerStyleLeftTop           = new PHPExcel_Style();
    $headerStyleRightbottom       = new PHPExcel_Style();
    $headerStyleLeftBottom        = new PHPExcel_Style();
    $headerStyleRightBottomTop    = new PHPExcel_Style();
    $headerStyleLeftBottomTop     = new PHPExcel_Style();

    $noborderStyle                = new PHPExcel_Style();
    $rightborderStyle             = new PHPExcel_Style();
    $DetailheaderRightTopStyle    = new PHPExcel_Style();
    $DetailheaderRightStyle       = new PHPExcel_Style();
    $DetailheaderLeftStyle        = new PHPExcel_Style();
    $DetailheaderRightBottomStyle = new PHPExcel_Style();

    $footerStyleRightbottom       = new PHPExcel_Style();
    $footerStyleLeftbottom        = new PHPExcel_Style();

    $PTStyle->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => true,
          'name' => 'Trebuchet MS',
          'size' => 14
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'right'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'left'   => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'top'    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );

    $headerStyle->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => true,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'right'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'left'   => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'top'    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );

    $headerStyleRight->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => false,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'right'  => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );

    $headerStyleLeft->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => false,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'left'  => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );

    $headerStyleRightTop->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => false,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'right'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'top'    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );

    $headerStyleLeftTop->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => false,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'left'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'top'    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );

    $headerStyleRightbottom->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => false,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'right'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'bottom'    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );

    $headerStyleLeftBottom->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => false,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'left'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'bottom'    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );

    $headerStyleRightBottomTop->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => false,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'right'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'bottom'    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'top'    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );

    $headerStyleLeftBottomTop->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => false,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'left'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'bottom'    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'top'    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );

    $noborderStyle->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => false,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );

    $rightborderStyle->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => false,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'right'  => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );

    $DetailheaderStyle->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => false,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'right'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'left'   => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'top'    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );

    $DetailheaderVerticalStyle->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => false,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'right'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'left'   => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'top'    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_BOTTOM,
          'wrap'       => true
        ),
      )
    );

    $DetailheaderRightTopStyle->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => true,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'right'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'top'    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );
    $DetailheaderRightBottomStyle->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => true,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'right'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'bottom'    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );
    $DetailheaderRightStyle->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => true,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'right'  => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );

    $DetailheaderLeftStyle->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => true,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'left'  => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );

    $footerStyleRightbottom->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => false,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'right'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'bottom'    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          //'top'    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );

    $footerStyleLeftbottom->applyFromArray(
      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
          'bold'    => false,
          'name' => 'Trebuchet MS',
          'size' => 10
        ),
        'numberformat'   => array(
          'code'    => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'left'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'bottom'    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          //'top'    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
          'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'       => true
        ),
      )
    );

    $bodyStyle->applyFromArray(
      array(
        'fill'   => array(
          'type'  => PHPExcel_Style_Fill::FILL_SOLID,
          'color' => array('argb' => 'FFFFFFFF')
        ),
        'font'   => array(
          'name' => 'Times New Roman',
          'size'  => 10
        ),
        'numberformat'   => array(
          'code' => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'bottom'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'right'   => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'left'    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'top'     => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'     => true
        ),
      )
    );

    $cellred->applyFromArray(

      array(
        'fill'   => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID,
          'color'   => array('rgb' => 'ff0000')
        ),
        'font'   => array(
          'bold'    => true
        ),
        'numberformat'   => array(
          'code' => PHPExcel_Style_NumberFormat::FORMAT_TEXT
        ),
        'borders' => array(
          'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'right'   => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'left'      => array('style' => PHPExcel_Style_Border::BORDER_THIN),
          'top'     => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          'wrap'     => true
        ),


      )
    );

    $obj = new Excel();

    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setPath('assets/layouts/layout3/img/logopt.png');

    $number                  = 0;
    $total_cash              = 0;
    $total_potong_gaji       = 0;
    $total_lainnya           = 0;
    $total_berat_cash        = 0;
    $total_berat_potong_gaji = 0;
    $total_berat_lainnya     = 0;
    $jml_mth                 = 0;

    foreach ($detail_laporan as $detail_laporan_row) {
      $number++;

      if (is_numeric($detail_laporan_row->cash)) {
        $total_cash += $detail_laporan_row->cash;
        $hrg_cash = $detail_laporan_row->cash;
      } else {
        $hrg_cash = 0;
      }
      if (is_numeric($detail_laporan_row->potong_gaji)) {
        $total_potong_gaji += $detail_laporan_row->potong_gaji;
        $hrg_potong_gaji = $detail_laporan_row->potong_gaji;
      } else {
        $hrg_potong_gaji = 0;
      }
      if (is_numeric($detail_laporan_row->lainnya)) {
        $total_lainnya += $detail_laporan_row->lainnya;
        $hrg_lainnya = $detail_laporan_row->lainnya;
      } else {
        $hrg_lainnya = 0;
      }
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
      
      if (trim($detail_laporan_row->app1_date) != '') {
        $dtl_app1_date[] =  date("d-m-Y", strtotime($detail_laporan_row->app1_date));
      } else {
        $dtl_app1_date[] =  $detail_laporan_row->app1_date;
      }
      $dtl_app1_comp[]            = $detail_laporan_row->app1_comp;
      $dtl_app1_status[]          = $detail_laporan_row->app1_status;

      $dtl_app2_by[]              = $detail_laporan_row->app2_by;
      
      if (trim($detail_laporan_row->app2_date) != '') {
        $dtl_app2_date[] =  date("d-m-Y", strtotime($detail_laporan_row->app2_date));
      } else {
        $dtl_app2_date[] =  $detail_laporan_row->app2_date;
      }
      $dtl_app2_comp[]            = $detail_laporan_row->app2_comp;
      $dtl_app2_status[]          = $detail_laporan_row->app2_status;

      $dtl_app3_by[]              = $detail_laporan_row->app3_by;
      if (trim($detail_laporan_row->app3_date) != '') {
        $dtl_app3_date[] =  date("d-m-Y", strtotime($detail_laporan_row->app3_date));
      } else {
        $dtl_app3_date[] =  $detail_laporan_row->app3_date;
      }
      $dtl_app3_comp[]            = $detail_laporan_row->app3_comp;
      $dtl_app3_status[]          = $detail_laporan_row->app3_status;
      $dtl_app4_by[]              = $detail_laporan_row->app4_by;
      if (trim($detail_laporan_row->app4_date) != '') {
        $dtl_app4_date[] =  date("d-m-Y", strtotime($detail_laporan_row->app4_date));
      } else {
        $dtl_app4_date[] =  $detail_laporan_row->app4_date;
      }
      $dtl_app4_comp[]           = $detail_laporan_row->app4_comp;
      $dtl_app4_status[]         = $detail_laporan_row->app4_status;
      $dtl_rekap_id[]            = $detail_laporan_row->rekap_id;
      $dtl_app1_jabatan[]        = $detail_laporan_row->app1_jabatan;
      $dtl_app2_jabatan[]        = $detail_laporan_row->app2_jabatan;
      $dtl_app3_jabatan[]        = $detail_laporan_row->app3_jabatan;
      $dtl_app4_jabatan[]        = $detail_laporan_row->app4_jabatan;

      $dtl_app1_personalid[]     = $detail_laporan_row->app1_personalid;
      $dtl_app2_personalid[]     = $detail_laporan_row->app2_personalid;
      $dtl_app3_personalid[]     = $detail_laporan_row->app3_personalid;
      $dtl_app4_personalid[]     = $detail_laporan_row->app4_personalid;

      $dtl_app1_personalstatus[] = $detail_laporan_row->app1_personalstatus;
      $dtl_app2_personalstatus[] = $detail_laporan_row->app2_personalstatus;
      $dtl_app3_personalstatus[] = $detail_laporan_row->app3_personalstatus;
      $dtl_app4_personalstatus[] = $detail_laporan_row->app4_personalstatus;

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

    foreach ($detail_laporan_allperiode as $detail_laporan_allperiode_row) {
      $all_periode_periode[]               = $detail_laporan_allperiode_row->periode;

      $all_periode_total_cash              += $detail_laporan_allperiode_row->cash;
      $all_periode_total_potong_gaji       += $detail_laporan_allperiode_row->potong_gaji;
      $all_periode_total_lainnya           += $detail_laporan_allperiode_row->lainnya;
      $all_periode_total_berat_cash        += $detail_laporan_allperiode_row->berat_cash;
      $all_periode_total_berat_potong_gaji += $detail_laporan_allperiode_row->berat_potong_gaji;
      $all_periode_total_berat_lainnya     += $detail_laporan_allperiode_row->berat_lainnya;
    }

    $vpost_pos_ldy = '';
    foreach ($dt_allpos_laundry as $dt_allpos_laundry_row) {
      if ($dt_allpos_laundry_row->detail_id == $pos_ldy) {
        $vpost_pos_ldy = "- " . $dt_allpos_laundry_row->nama_laundry . ' (' . $dt_allpos_laundry_row->alamat . ')';
        break;
      }
    }

    $jml_mth           = count($dtl_mth);

    if (isset($vdtl_periode)) {
      $vdtl_last_periode = (float)substr($vdtl_periode, 5);
    } else {
      $vdtl_last_periode = 0;
    }

    $count            = count($detail_laporan);
    $jml_data_perpage = 4;

    $jml_page         = 2;
    $jml_page2        = 2;

    $jml_row_perpage  = 14;
    $jml_row_perpage2 = 41;

    $objPHPExcel      = $obj->createSheet(0);

    $objPHPExcel->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    $objPHPExcel->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

    $objPHPExcel->getPageSetup()->setFitToPage(false);
    $objPHPExcel->getPageSetup()->setScale(60);
    $objPHPExcel->getPageMargins()->setLeft(0.5);
    $objPHPExcel->getPageMargins()->setRight(0.5);
    $objPHPExcel->getPageMargins()->setBottom(0.5);
    $objPHPExcel->getPageMargins()->setTop(0.5);

    $range = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ', 'BA', 'BB', 'BC', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BK', 'BL', 'BM', 'BN', 'BO', 'BP', 'BQ', 'BR', 'BS', 'BT', 'BU', 'BV', 'BW', 'BX', 'BY');
    foreach ($range as $columnID) {
      $objPHPExcel->getRowDimension($columnID)->setRowHeight(17);
      $objPHPExcel->getColumnDimension($columnID)->setWidth(3);
    }

    $objPHPExcel->getColumnDimension('BS')->setWidth(6);
    $objPHPExcel->getColumnDimension('BT')->setWidth(6);

    $range2 = array('G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ', 'BA', 'BB');
    $range3 = array('BY');
    foreach ($range2 as $columnID2) {
      $objPHPExcel->getColumnDimension($columnID2)->setWidth(4);
    }
    foreach ($range3 as $columnID3) {
      $objPHPExcel->getColumnDimension($columnID3)->setWidth(6);
    }

    // kolom lama kosong di hide aja, lagi males geser2 :D
    $hide = array('BC', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BK', 'BL', 'BM', 'BN', 'BO', 'BP', 'BQ', 'BR');
    foreach ($hide as $columnHRF) {
      $objPHPExcel->getColumnDimension($columnHRF)->setOutlineLevel(1);
      $objPHPExcel->getColumnDimension($columnHRF)->setVisible(false);
      $objPHPExcel->getColumnDimension($columnHRF)->setCollapsed(true);
    }

    $no_urut = -1;

    for ($i3 = 0; $i3 < $jml_page2; $i3++) {
      $start_row = ($i3 * $jml_row_perpage2) + 1;
      $finish_row = ((($i3 * $jml_row_perpage2) + 1) + ($jml_row_perpage2));

      $gbr = '$objDrawing';

      $gbr = new PHPExcel_Worksheet_Drawing();
      $gbr->setPath('assets/layouts/layout3/img/logopt.png');
      $gbr->setWorksheet($objPHPExcel);
      $gbr->setOffsetX(20);
      $gbr->setOffsetY(5);
      $gbr->setWidth(60);
      $gbr->setHeight(44); // logo height
      $gbr->setCoordinates('B' . $start_row);


      // print_r($thn_laporan); die();

      $objPHPExcel->mergeCells('A' . $start_row . ':F' . ($start_row + 2));
      $objPHPExcel->mergeCells('G' . $start_row . ':BR' . ($start_row + 2))->setCellValue('G' . $start_row, 'PT PULAU SAMBU');

      $objPHPExcel->mergeCells('BS' . $start_row . ':BT' . $start_row)->setCellValue('BS' . $start_row, 'Dok');
      $objPHPExcel->mergeCells('BU' . $start_row . ':BY' . $start_row)->setCellValue('BU' . $start_row, ': ' . 'RLPL/HOS/' . $thn_laporan);

      $objPHPExcel->mergeCells('BS' . ($start_row + 1) . ':BT' . ($start_row + 2))->setCellValue('BS' . ($start_row + 1), 'Periode');
      $objPHPExcel->mergeCells('BU' . ($start_row + 1) . ':BY' . ($start_row + 2))->setCellValue('BU' . ($start_row + 1), ': ' . $thn_laporan);

      $objPHPExcel->mergeCells('BS' . ($start_row + 3) . ':BT' . ($start_row + 3))->setCellValue('BS' . ($start_row + 3), 'Page');
      $objPHPExcel->mergeCells('BU' . ($start_row + 3) . ':BY' . ($start_row + 3))->setCellValue('BU' . ($start_row + 3), ': ' . ($i3 + 1) . ' of ' . $jml_page2);

      $objPHPExcel->mergeCells('A' . ($start_row + 3) . ':F' . ($start_row + 3))->setCellValue('A' . ($start_row + 3), 'JUDUL');
      $objPHPExcel->mergeCells('G' . ($start_row + 3) . ':BR' . ($start_row + 3))->setCellValue('G' . ($start_row + 3), 'LAPORAN PENDAPATAN LAUNDRY ' . $vpost_pos_ldy);

      $objPHPExcel->setSharedStyle($headerStyle, 'A' . $start_row . ':F' . ($start_row + 2)); //Style Logo
      $objPHPExcel->setSharedStyle($PTStyle, 'G' . $start_row . ':BR' . ($start_row + 1)); //Style Nama PT
      $objPHPExcel->setSharedStyle($headerStyleLeftTop, 'BS' . $start_row . ':BT' . $start_row); //Kiri atas sesuai urutan star
      $objPHPExcel->setSharedStyle($headerStyleLeftBottomTop, 'BS' . ($start_row + 1) . ':BT' . ($start_row + 2));
      $objPHPExcel->setSharedStyle($headerStyleLeftBottom, 'BS' . ($start_row + 3) . ':BT' . ($start_row + 3)); //Kiri bawah sesuai urutan star
      $objPHPExcel->setSharedStyle($headerStyleRightTop, 'BU' . $start_row . ':BY' . $start_row); //Kanan atas sesuai urutan star
      $objPHPExcel->setSharedStyle($headerStyleRightBottomTop, 'BU' . ($start_row + 1) . ':BY' . ($start_row + 2));
      $objPHPExcel->setSharedStyle($headerStyleRightbottom, 'BU' . ($start_row + 3) . ':BY' . ($start_row + 3)); //Kanan bawah sesuai urutan star
      $objPHPExcel->setSharedStyle($headerStyle, 'A' . ($start_row + 3) . ':BR' . ($start_row + 3)); //Style Title

      $objPHPExcel->mergeCells('A' . ($start_row + 4) . ':AL' . ($start_row + 4))->setCellValue('A' . ($start_row + 4), '');
      $objPHPExcel->mergeCells('AM' . ($start_row + 4) . ':BY' . ($start_row + 4))->setCellValue('AM' . ($start_row + 4), '');

      $objPHPExcel->setSharedStyle($headerStyleLeft, 'A' . ($start_row + 4) . ':AL' . ($start_row + 4));
      $objPHPExcel->setSharedStyle($headerStyleRight, 'AM' . ($start_row + 4) . ':BY' . ($start_row + 4));

      $arr_nama_bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

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

      for ($i2 = 0; $i2 < $jml_page; $i2++) {

        $objPHPExcel->mergeCells('A' . (($i2 * $jml_row_perpage) + ($start_row + 5)) . ':A' . (($i2 * $jml_row_perpage) + ($start_row + 7)))->setCellValue('A' . (($i2 * $jml_row_perpage) + ($start_row + 5)), "No");
        $objPHPExcel->mergeCells('B' . (($i2 * $jml_row_perpage) + ($start_row + 5)) . ':F' . (($i2 * $jml_row_perpage) + ($start_row + 7)))->setCellValue('B' . (($i2 * $jml_row_perpage) + ($start_row + 5)), "Jenis\nPembayaran");

        $objPHPExcel->mergeCells('BS' . (($i2 * $jml_row_perpage) + ($start_row + 5)) . ':BY' . (($i2 * $jml_row_perpage) + ($start_row + 5)))->setCellValue('BS' . (($i2 * $jml_row_perpage) + ($start_row + 5)), "Total");

        $objPHPExcel->mergeCells('BS' . (($i2 * $jml_row_perpage) + ($start_row + 6)) . ':BT' . (($i2 * $jml_row_perpage) + ($start_row + 7)))->setCellValue('BS' . (($i2 * $jml_row_perpage) + ($start_row + 6)), "Kg");
        $objPHPExcel->mergeCells('BU' . (($i2 * $jml_row_perpage) + ($start_row + 6)) . ':BY' . (($i2 * $jml_row_perpage) + ($start_row + 7)))->setCellValue('BU' . (($i2 * $jml_row_perpage) + ($start_row + 6)), "Rupiah");

        $objPHPExcel->setSharedStyle($DetailheaderStyle, 'A' . (($i2 * $jml_row_perpage) + ($start_row + 5)) . ':F' . (($i2 * $jml_row_perpage) + ($start_row + 7)));
        $objPHPExcel->setSharedStyle($DetailheaderStyle, 'BS' . (($i2 * $jml_row_perpage) + ($start_row + 5)) . ':BY' . (($i2 * $jml_row_perpage) + ($start_row + 7)));

        $objPHPExcel->mergeCells('A' . (($i2 * $jml_row_perpage) + ($start_row + 8)) . ':A' . (($i2 * $jml_row_perpage) + ($start_row + 8)))->setCellValue('A' . (($i2 * $jml_row_perpage) + ($start_row + 8)), "1");
        $objPHPExcel->mergeCells('B' . (($i2 * $jml_row_perpage) + ($start_row + 8)) . ':F' . (($i2 * $jml_row_perpage) + ($start_row + 8)))->setCellValue('B' . (($i2 * $jml_row_perpage) + ($start_row + 8)), "Cash");

        $objPHPExcel->mergeCells('A' . (($i2 * $jml_row_perpage) + ($start_row + 9)) . ':A' . (($i2 * $jml_row_perpage) + ($start_row + 9)))->setCellValue('A' . (($i2 * $jml_row_perpage) + ($start_row + 9)), "2");
        $objPHPExcel->mergeCells('B' . (($i2 * $jml_row_perpage) + ($start_row + 9)) . ':F' . (($i2 * $jml_row_perpage) + ($start_row + 9)))->setCellValue('B' . (($i2 * $jml_row_perpage) + ($start_row + 9)), "Potong Gaji");

        $objPHPExcel->mergeCells('A' . (($i2 * $jml_row_perpage) + ($start_row + 10)) . ':A' . (($i2 * $jml_row_perpage) + ($start_row + 10)))->setCellValue('A' . (($i2 * $jml_row_perpage) + ($start_row + 10)), "3");
        $objPHPExcel->mergeCells('B' . (($i2 * $jml_row_perpage) + ($start_row + 10)) . ':F' . (($i2 * $jml_row_perpage) + ($start_row + 10)))->setCellValue('B' . (($i2 * $jml_row_perpage) + ($start_row + 10)), "Lainnya");

        $objPHPExcel->mergeCells('A' . (($i2 * $jml_row_perpage) + ($start_row + 11)) . ':F' . (($i2 * $jml_row_perpage) + ($start_row + 11)))->setCellValue('A' . (($i2 * $jml_row_perpage) + ($start_row + 11)), "Total");

        $objPHPExcel->setSharedStyle($bodyStyle, 'A' . (($i2 * $jml_row_perpage) + ($start_row + 8)) . ':F' . (($i2 * $jml_row_perpage) + ($start_row + 10)));
        $objPHPExcel->setSharedStyle($DetailheaderStyle, 'A' . (($i2 * $jml_row_perpage) + ($start_row + 11)) . ':F' . (($i2 * $jml_row_perpage) + ($start_row + 11)));

        $objPHPExcel->mergeCells('A' . (($i2 * $jml_row_perpage) + ($start_row + 12)) . ':F' . (($i2 * $jml_row_perpage) + ($start_row + 18)))->setCellValue('A' . (($i2 * $jml_row_perpage) + ($start_row + 12)), "");
        $objPHPExcel->setSharedStyle($headerStyleLeft, 'A' . (($i2 * $jml_row_perpage) + ($start_row + 12)) . ':F' . (($i2 * $jml_row_perpage) + ($start_row + 18)));

        for ($i = 0; $i < 3; $i++) {
          if ((($i * 16) + $chr_g) < 91) {
            $chr_g_x = chr(($i * 16) + $chr_g);
          } elseif (((($i * 16) + $chr_g) >= 91) && (($i * 16) + $chr_g) < 116) {
            $chr_g_x = 'A' . chr((($i * 16) + $chr_g) - 26);
          } else {
            $chr_g_x = 'B' . chr((($i * 16) + $chr_g) - 52);
          }

          if ((($i * 16) + $chr_h) < 91) {
            $chr_h_x = chr(($i * 16) + $chr_h);
          } elseif (((($i * 16) + $chr_h) >= 91) && (($i * 16) + $chr_h) < 116) {
            $chr_h_x = 'A' . chr((($i * 16) + $chr_h) - 26);
          } else {
            $chr_h_x = 'B' . chr((($i * 16) + $chr_h) - 52);
          }

          if ((($i * 16) + $chr_i) < 91) {
            $chr_i_x = chr(($i * 16) + $chr_i);
          } elseif (((($i * 16) + $chr_i) >= 91) && (($i * 16) + $chr_i) < 116) {
            $chr_i_x = 'A' . chr((($i * 16) + $chr_i) - 26);
          } else {
            $chr_i_x = 'B' . chr((($i * 16) + $chr_i) - 52);
          }

          if ((($i * 16) + $chr_j) < 91) {
            $chr_j_x = chr(($i * 16) + $chr_j);
          } elseif (((($i * 16) + $chr_j) >= 91) && (($i * 16) + $chr_j) < 116) {
            $chr_j_x = 'A' . chr((($i * 16) + $chr_j) - 26);
          } else {
            $chr_j_x = 'B' . chr((($i * 16) + $chr_j) - 52);
          }

          if ((($i * 16) + $chr_k) < 91) {
            $chr_k_x = chr(($i * 16) + $chr_k);
          } elseif (((($i * 16) + $chr_k) >= 91) && (($i * 16) + $chr_k) < 116) {
            $chr_k_x = 'A' . chr((($i * 16) + $chr_k) - 26);
          } else {
            $chr_k_x = 'B' . chr((($i * 16) + $chr_k) - 52);
          }

          if ((($i * 16) + $chr_l) < 91) {
            $chr_l_x = chr(($i * 16) + $chr_l);
          } elseif (((($i * 16) + $chr_l) >= 91) && (($i * 16) + $chr_l) < 116) {
            $chr_l_x = 'A' . chr((($i * 16) + $chr_l) - 26);
          } else {
            $chr_l_x = 'B' . chr((($i * 16) + $chr_l) - 52);
          }

          if ((($i * 16) + $chr_m) < 91) {
            $chr_m_x = chr(($i * 16) + $chr_m);
          } elseif (((($i * 16) + $chr_m) >= 91) && (($i * 16) + $chr_m) < 116) {
            $chr_m_x = 'A' . chr((($i * 16) + $chr_m) - 26);
          } else {
            $chr_m_x = 'B' . chr((($i * 16) + $chr_m) - 52);
          }

          if ((($i * 16) + $chr_n) < 91) {
            $chr_n_x = chr(($i * 16) + $chr_n);
          } elseif (((($i * 16) + $chr_n) >= 91) && (($i * 16) + $chr_n) < 116) {
            $chr_n_x = 'A' . chr((($i * 16) + $chr_n) - 26);
          } else {
            $chr_n_x = 'B' . chr((($i * 16) + $chr_n) - 52);
          }

          if ((($i * 16) + $chr_o) < 91) {
            $chr_o_x = chr(($i * 16) + $chr_o);
          } elseif (((($i * 16) + $chr_o) >= 91) && (($i * 16) + $chr_o) < 116) {
            $chr_o_x = 'A' . chr((($i * 16) + $chr_o) - 26);
          } else {
            $chr_o_x = 'B' . chr((($i * 16) + $chr_o) - 52);
          }

          if ((($i * 16) + $chr_p) < 91) {
            $chr_p_x = chr(($i * 16) + $chr_p);
          } elseif (((($i * 16) + $chr_p) >= 91) && (($i * 16) + $chr_p) < 116) {
            $chr_p_x = 'A' . chr((($i * 16) + $chr_p) - 26);
          } else {
            $chr_p_x = 'B' . chr((($i * 16) + $chr_p) - 52);
          }

          if ((($i * 16) + $chr_q) < 91) {
            $chr_q_x = chr(($i * 16) + $chr_q);
          } elseif (((($i * 16) + $chr_q) >= 91) && (($i * 16) + $chr_q) < 116) {
            $chr_q_x = 'A' . chr((($i * 16) + $chr_q) - 26);
          } else {
            $chr_q_x = 'B' . chr((($i * 16) + $chr_q) - 52);
          }

          if ((($i * 16) + $chr_r) < 91) {
            $chr_r_x = chr(($i * 16) + $chr_r);
          } elseif (((($i * 16) + $chr_r) >= 91) && (($i * 16) + $chr_r) < 116) {
            $chr_r_x = 'A' . chr((($i * 16) + $chr_r) - 26);
          } else {
            $chr_r_x = 'B' . chr((($i * 16) + $chr_r) - 52);
          }

          if ((($i * 16) + $chr_s) < 91) {
            $chr_s_x = chr(($i * 16) + $chr_s);
          } elseif (((($i * 16) + $chr_s) >= 91) && (($i * 16) + $chr_s) < 116) {
            $chr_s_x = 'A' . chr((($i * 16) + $chr_s) - 26);
          } else {
            $chr_s_x = 'B' . chr((($i * 16) + $chr_s) - 52);
          }

          if ((($i * 16) + $chr_t) < 91) {
            $chr_t_x = chr(($i * 16) + $chr_t);
          } elseif (((($i * 16) + $chr_t) >= 91) && (($i * 16) + $chr_t) < 116) {
            $chr_t_x = 'A' . chr((($i * 16) + $chr_t) - 26);
          } else {
            $chr_t_x = 'B' . chr((($i * 16) + $chr_t) - 52);
          }

          if ((($i * 16) + $chr_u) < 91) {
            $chr_u_x = chr(($i * 16) + $chr_u);
          } elseif (((($i * 16) + $chr_u) >= 91) && (($i * 16) + $chr_u) < 116) {
            $chr_u_x = 'A' . chr((($i * 16) + $chr_u) - 26);
          } else {
            $chr_u_x = 'B' . chr((($i * 16) + $chr_u) - 52);
          }

          if ((($i * 16) + $chr_v) < 91) {
            $chr_v_x = chr(($i * 16) + $chr_v);
          } elseif (((($i * 16) + $chr_v) >= 91) && (($i * 16) + $chr_v) < 116) {
            $chr_v_x = 'A' . chr((($i * 16) + $chr_v) - 26);
          } else {
            $chr_v_x = 'B' . chr((($i * 16) + $chr_v) - 52);
          }

          if (isset($dtl_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))]) != '') {
              $ndt_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))] = number_format(($dtl_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))]), 0, ',', '.');
            } else {
              $ndt_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }
          if (isset($dtl_cash[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_cash[((($i2 * 3) + $i) + ($i3 * 6))]) != '') {
              $ndt_cash[((($i2 * 3) + $i) + ($i3 * 6))] = number_format(($dtl_cash[((($i2 * 3) + $i) + ($i3 * 6))]), 0, ',', '.');
            } else {
              $ndt_cash[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_cash[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }
          if (isset($dtl_lainnya[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_lainnya[((($i2 * 3) + $i) + ($i3 * 6))]) != '') {
              $ndt_lainnya[((($i2 * 3) + $i) + ($i3 * 6))] = number_format(($dtl_lainnya[((($i2 * 3) + $i) + ($i3 * 6))]), 0, ',', '.');
            } else {
              $ndt_lainnya[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_lainnya[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }

          if (isset($dtl_berat_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_berat_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))]) != '') {
              $ndt_berat_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))] = number_format(($dtl_berat_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))]), 2, ',', '.');
            } else {
              $ndt_berat_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_berat_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }
          if (isset($dtl_berat_cash[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_berat_cash[((($i2 * 3) + $i) + ($i3 * 6))]) != '') {
              $ndt_berat_cash[((($i2 * 3) + $i) + ($i3 * 6))] = number_format(($dtl_berat_cash[((($i2 * 3) + $i) + ($i3 * 6))]), 2, ',', '.');
            } else {
              $ndt_berat_cash[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_berat_cash[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }
          if (isset($dtl_berat_lainnya[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_berat_lainnya[((($i2 * 3) + $i) + ($i3 * 6))]) != '') {
              $ndt_berat_lainnya[((($i2 * 3) + $i) + ($i3 * 6))] = number_format(($dtl_berat_lainnya[((($i2 * 3) + $i) + ($i3 * 6))]), 2, ',', '.');
            } else {
              $ndt_berat_lainnya[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_berat_lainnya[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }

          if (isset($dtl_em_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_em_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))]) != '' && trim($dtl_em_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))]) > 0) {
              $ndt_em_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))] = number_format(($dtl_em_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))]), 2, ',', '.');
            } else {
              $ndt_em_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))] = '';
            }
          } else {
            $ndt_em_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }
          if (isset($dtl_em_cash[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_em_cash[((($i2 * 3) + $i) + ($i3 * 6))]) != '' && trim($dtl_em_cash[((($i2 * 3) + $i) + ($i3 * 6))]) > 0) {
              $ndt_em_cash[((($i2 * 3) + $i) + ($i3 * 6))] = number_format(($dtl_em_cash[((($i2 * 3) + $i) + ($i3 * 6))]), 2, ',', '.');
            } else {
              $ndt_em_cash[((($i2 * 3) + $i) + ($i3 * 6))] = '';
            }
          } else {
            $ndt_em_cash[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }
          if (isset($dtl_em_lainnya[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_em_lainnya[((($i2 * 3) + $i) + ($i3 * 6))]) != '' && trim($dtl_em_lainnya[((($i2 * 3) + $i) + ($i3 * 6))]) > 0) {
              $ndt_em_lainnya[((($i2 * 3) + $i) + ($i3 * 6))] = number_format(($dtl_em_lainnya[((($i2 * 3) + $i) + ($i3 * 6))]), 2, ',', '.');
            } else {
              $ndt_em_lainnya[((($i2 * 3) + $i) + ($i3 * 6))] = '';
            }
          } else {
            $ndt_em_lainnya[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }

          if (isset($dtl_app1_by[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_app1_by[((($i2 * 3) + $i) + ($i3 * 6))]) != '') {
              $ndt_app1_by[((($i2 * 3) + $i) + ($i3 * 6))] = $dtl_app1_by[((($i2 * 3) + $i) + ($i3 * 6))];
            } else {
              $ndt_app1_by[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_app1_by[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }

            // if (isset($dtl_app2_by[((($i2 * 3) + $i) + ($i3 * 6))])) {
            //     if ($dtl_app2_by[((($i2 * 3) + $i) + ($i3 * 6))] != '') {
            //         $appPakRey = 'REYNALD ALEX';
            //     } else {
            //         $appPakRey = $dtl_app2_by[((($i2 * 3) + $i) + ($i3 * 6))];
            //     }
            // } else {
            //     $ndt_app2_by[((($i2 * 3) + $i) + ($i3 * 6))] = '';
            // }

          if (isset($dtl_app1_date[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_app1_date[((($i2 * 3) + $i) + ($i3 * 6))]) != '') {
              $ndt_app1_date[((($i2 * 3) + $i) + ($i3 * 6))] = $dtl_app1_date[((($i2 * 3) + $i) + ($i3 * 6))];
            } else {
              $ndt_app1_date[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_app1_date[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }

          if (isset($dtl_app2_comp[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_app2_comp[((($i2 * 3) + $i) + ($i3 * 6))]) != '') {
              $ndt_app2_comp[((($i2 * 3) + $i) + ($i3 * 6))] = $dtl_app2_comp[((($i2 * 3) + $i) + ($i3 * 6))];
            } else {
              $ndt_app2_comp[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_app2_by[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }

          if (isset($dtl_app1_comp[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_app1_comp[((($i2 * 3) + $i) + ($i3 * 6))]) != '') {
              $ndt_app1_comp[((($i2 * 3) + $i) + ($i3 * 6))] = $dtl_app1_comp[((($i2 * 3) + $i) + ($i3 * 6))];
            } else {
              $ndt_app1_comp[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_app1_by[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }

          if (isset($dtl_app2_status[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_app2_status[((($i2 * 3) + $i) + ($i3 * 6))]) != '') {
              $ndt_app2_status[((($i2 * 3) + $i) + ($i3 * 6))] = $dtl_app2_status[((($i2 * 3) + $i) + ($i3 * 6))];
            } else {
              $ndt_app2_status[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_app2_by[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }

          if (isset($dtl_app1_status[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_app1_status[((($i2 * 3) + $i) + ($i3 * 6))]) != '') {
              $ndt_app1_status[((($i2 * 3) + $i) + ($i3 * 6))] = $dtl_app1_status[((($i2 * 3) + $i) + ($i3 * 6))];
            } else {
              $ndt_app1_status[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_app1_by[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }
          
          if (isset($dtl_app1_jabatan[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_app1_jabatan[((($i2 * 3) + $i) + ($i3 * 6))]) != '') {
              $ndt_app1_jabatan[((($i2 * 3) + $i) + ($i3 * 6))] = $dtl_app1_jabatan[((($i2 * 3) + $i) + ($i3 * 6))];
            } else {
              $ndt_app1_jabatan[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_app1_jabatan[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }

          // if(isset($dtl_app3_by[((($i2*3)+$i)+($i3*6))])){if(trim($dtl_app3_by[((($i2*3)+$i)+($i3*6))])!=''){$ndt_app3_by[((($i2*3)+$i)+($i3*6))] = $dtl_app3_by[((($i2*3)+$i)+($i3*6))];}else{$ndt_app3_by[((($i2*3)+$i)+($i3*6))] = '-';}}else{$ndt_app3_by[((($i2*3)+$i)+($i3*6))] = '';}
          if (isset($dtl_app2_by[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_app2_by[((($i2 * 3) + $i) + ($i3 * 6))]) != '') {
              $ndt_app2_by[((($i2 * 3) + $i) + ($i3 * 6))] = 'REYNALD ALEX';
            } else {
              $ndt_app2_by[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_app2_by[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }
          if (isset($dtl_app2_date[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_app2_date[((($i2 * 3) + $i) + ($i3 * 6))]) != '') {
              $ndt_app2_date[((($i2 * 3) + $i) + ($i3 * 6))] = $dtl_app2_date[((($i2 * 3) + $i) + ($i3 * 6))];
            } else {
              $ndt_app2_date[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_app2_date[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }
          if (isset($dtl_app2_comp[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_app2_comp[((($i2 * 3) + $i) + ($i3 * 6))]) != '') {
              $ndt_app2_comp[((($i2 * 3) + $i) + ($i3 * 6))] = $dtl_app2_comp[((($i2 * 3) + $i) + ($i3 * 6))];
            } else {
              $ndt_app2_comp[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_app2_by[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }
          if (isset($dtl_app2_status[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_app2_status[((($i2 * 3) + $i) + ($i3 * 6))]) != '') {
              $ndt_app2_status[((($i2 * 3) + $i) + ($i3 * 6))] = $dtl_app2_status[((($i2 * 3) + $i) + ($i3 * 6))];
            } else {
              $ndt_app2_status[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_app2_by[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }
          // if(isset($dtl_app3_jabatan[((($i2*3)+$i)+($i3*6))])){if(trim($dtl_app3_jabatan[((($i2*3)+$i)+($i3*6))])!=''){$ndt_app3_jabatan[((($i2*3)+$i)+($i3*6))] = $dtl_app3_jabatan[((($i2*3)+$i)+($i3*6))];}else{$ndt_app3_jabatan[((($i2*3)+$i)+($i3*6))] = '-';}}else{$ndt_app3_jabatan[((($i2*3)+$i)+($i3*6))] = '';}
          if (isset($dtl_app2_jabatan[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_app2_jabatan[((($i2 * 3) + $i) + ($i3 * 6))]) != '') {
              $ndt_app2_jabatan[((($i2 * 3) + $i) + ($i3 * 6))] = 'General Manager';
            } else {
              $ndt_app2_jabatan[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_app2_jabatan[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }

          if (isset($dtl_jml_berat[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_jml_berat[((($i2 * 3) + $i) + ($i3 * 6))]) != '' && trim($dtl_jml_berat[((($i2 * 3) + $i) + ($i3 * 6))]) > 0) {
              $ndt_jml_berat[((($i2 * 3) + $i) + ($i3 * 6))] = number_format(($dtl_jml_berat[((($i2 * 3) + $i) + ($i3 * 6))]), 2, ',', '.');
            } else {
              $ndt_jml_berat[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_jml_berat[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }
          if (isset($dtl_jml_harga[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_jml_harga[((($i2 * 3) + $i) + ($i3 * 6))]) != '' && trim($dtl_jml_harga[((($i2 * 3) + $i) + ($i3 * 6))]) > 0) {
              $ndt_jml_harga[((($i2 * 3) + $i) + ($i3 * 6))] = number_format(($dtl_jml_harga[((($i2 * 3) + $i) + ($i3 * 6))]), 0, ',', '.');
            } else {
              $ndt_jml_harga[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_jml_harga[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }
          if (isset($dtl_jml_em[((($i2 * 3) + $i) + ($i3 * 6))])) {
            if (trim($dtl_jml_em[((($i2 * 3) + $i) + ($i3 * 6))]) != '' && trim($dtl_jml_em[((($i2 * 3) + $i) + ($i3 * 6))]) > 0) {
              $ndt_jml_em[((($i2 * 3) + $i) + ($i3 * 6))] = number_format(($dtl_jml_em[((($i2 * 3) + $i) + ($i3 * 6))]), 2, ',', '.');
            } else {
              $ndt_jml_em[((($i2 * 3) + $i) + ($i3 * 6))] = '-';
            }
          } else {
            $ndt_jml_em[((($i2 * 3) + $i) + ($i3 * 6))] = '';
          }

          $objPHPExcel->mergeCells($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 5)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 5)))->setCellValue($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 5)), $arr_nama_bulan[((($i2 * 3) + $i) + ($i3 * 6))]);

          $objPHPExcel->mergeCells($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 6)) . ':' . $chr_i_x . (($i2 * $jml_row_perpage) + ($start_row + 7)))->setCellValue($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 6)), "Kg");
          $objPHPExcel->mergeCells($chr_j_x . (($i2 * $jml_row_perpage) + ($start_row + 6)) . ':' . $chr_q_x . (($i2 * $jml_row_perpage) + ($start_row + 7)))->setCellValue($chr_j_x . (($i2 * $jml_row_perpage) + ($start_row + 6)), "Rupiah");
          $objPHPExcel->mergeCells($chr_r_x . (($i2 * $jml_row_perpage) + ($start_row + 6)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 7)))->setCellValue($chr_r_x . (($i2 * $jml_row_perpage) + ($start_row + 6)), "% Efektifitas\nMesin");

          $objPHPExcel->setSharedStyle($DetailheaderStyle, $chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 5)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 7)));

          $objPHPExcel->mergeCells($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 8)) . ':' . $chr_i_x . (($i2 * $jml_row_perpage) + ($start_row + 8)))->setCellValue($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 8)), $ndt_berat_cash[((($i2 * 3) + $i) + ($i3 * 6))]);
          $objPHPExcel->mergeCells($chr_j_x . (($i2 * $jml_row_perpage) + ($start_row + 8)) . ':' . $chr_q_x . (($i2 * $jml_row_perpage) + ($start_row + 8)))->setCellValue($chr_j_x . (($i2 * $jml_row_perpage) + ($start_row + 8)), $ndt_cash[((($i2 * 3) + $i) + ($i3 * 6))]);
          $objPHPExcel->mergeCells($chr_r_x . (($i2 * $jml_row_perpage) + ($start_row + 8)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 8)))->setCellValue($chr_r_x . (($i2 * $jml_row_perpage) + ($start_row + 8)), $ndt_em_cash[((($i2 * 3) + $i) + ($i3 * 6))]);

          $objPHPExcel->mergeCells($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 9)) . ':' . $chr_i_x . (($i2 * $jml_row_perpage) + ($start_row + 9)))->setCellValue($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 9)), $ndt_berat_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))]);
          $objPHPExcel->mergeCells($chr_j_x . (($i2 * $jml_row_perpage) + ($start_row + 9)) . ':' . $chr_q_x . (($i2 * $jml_row_perpage) + ($start_row + 9)))->setCellValue($chr_j_x . (($i2 * $jml_row_perpage) + ($start_row + 9)), $ndt_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))]);
          $objPHPExcel->mergeCells($chr_r_x . (($i2 * $jml_row_perpage) + ($start_row + 9)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 9)))->setCellValue($chr_r_x . (($i2 * $jml_row_perpage) + ($start_row + 9)), $ndt_em_potong_gaji[((($i2 * 3) + $i) + ($i3 * 6))]);

          $objPHPExcel->mergeCells($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 10)) . ':' . $chr_i_x . (($i2 * $jml_row_perpage) + ($start_row + 10)))->setCellValue($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 10)), $ndt_berat_lainnya[((($i2 * 3) + $i) + ($i3 * 6))]);
          $objPHPExcel->mergeCells($chr_j_x . (($i2 * $jml_row_perpage) + ($start_row + 10)) . ':' . $chr_q_x . (($i2 * $jml_row_perpage) + ($start_row + 10)))->setCellValue($chr_j_x . (($i2 * $jml_row_perpage) + ($start_row + 10)), $ndt_lainnya[((($i2 * 3) + $i) + ($i3 * 6))]);
          $objPHPExcel->mergeCells($chr_r_x . (($i2 * $jml_row_perpage) + ($start_row + 10)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 10)))->setCellValue($chr_r_x . (($i2 * $jml_row_perpage) + ($start_row + 10)), $ndt_em_lainnya[((($i2 * 3) + $i) + ($i3 * 6))]);

          $objPHPExcel->mergeCells($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 11)) . ':' . $chr_i_x . (($i2 * $jml_row_perpage) + ($start_row + 11)))->setCellValue($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 11)), $ndt_jml_berat[((($i2 * 3) + $i) + ($i3 * 6))]);
          $objPHPExcel->mergeCells($chr_j_x . (($i2 * $jml_row_perpage) + ($start_row + 11)) . ':' . $chr_q_x . (($i2 * $jml_row_perpage) + ($start_row + 11)))->setCellValue($chr_j_x . (($i2 * $jml_row_perpage) + ($start_row + 11)), $ndt_jml_harga[((($i2 * 3) + $i) + ($i3 * 6))]);
          $objPHPExcel->mergeCells($chr_r_x . (($i2 * $jml_row_perpage) + ($start_row + 11)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 11)))->setCellValue($chr_r_x . (($i2 * $jml_row_perpage) + ($start_row + 11)), $ndt_jml_em[((($i2 * 3) + $i) + ($i3 * 6))]);

          $objPHPExcel->setSharedStyle($bodyStyle, $chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 8)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 10)));
          $objPHPExcel->setSharedStyle($DetailheaderStyle, $chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 11)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 11)));

          $objPHPExcel->mergeCells($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 12)) . ':' . $chr_n_x . (($i2 * $jml_row_perpage) + ($start_row + 12)))->setCellValue($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 12)), "Dibuat Oleh");
          $objPHPExcel->mergeCells($chr_o_x . (($i2 * $jml_row_perpage) + ($start_row + 12)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 12)))->setCellValue($chr_o_x . (($i2 * $jml_row_perpage) + ($start_row + 12)), "Disetujui Oleh");

            //tampil ttd

            // print_r($dtl_app1_personalid); exit();

            if ($dtl_app1_personalid[((($i2 * 3) + $i) + ($i3 * 6))] != '' && $dtl_app1_personalstatus[((($i2 * 3) + $i) + ($i3 * 6))] != '') {
                $_img = '$objDrawing' . ((($i2 * 3) + $i) + ($i3 * 6));
                if ($dtl_app1_personalstatus[((($i2 * 3) + $i) + ($i3 * 6))] == 2) {
                    $base_path_app1 = 'assets/foto/TTD_TK/' . $dtl_app1_personalid[((($i2 * 3) + $i) + ($i3 * 6))] . '.PNG';
                } else {
                    $base_path_app1 = 'assets/foto/TTD_KRY/' . $dtl_app1_personalid[((($i2 * 3) + $i) + ($i3 * 6))] . '_0_0.PNG';
                }
                // print_r($base_path_app1); die();
                if (file_exists(FCPATH . '' . $base_path_app1)) {
                    $_img = new PHPExcel_Worksheet_Drawing();
                    $_img->setPath($base_path_app1);
                    $_img->setWidthAndHeight(200, 100);
                    $_img->setOffsetY(5);
                    $_img->setOffsetX(5);
                    $_img->setResizeProportional(true);
                    $_img->setWorksheet($objPHPExcel);
                    $_img->setCoordinates($chr_h_x . (($i2 * $jml_row_perpage) + ($start_row + 13)));
                }
            }

          if ($dtl_app2_personalid[((($i2 * 3) + $i) + ($i3 * 6))] != '' && $dtl_app2_personalstatus[((($i2 * 3) + $i) + ($i3 * 6))] != '') {
            $_img2 = '$objDrawing' . ((($i2 * 3) + $i) + ($i3 * 6));
            if (file_exists(FCPATH . 'assets/approved2.png')) {
              $_img2 = new PHPExcel_Worksheet_Drawing();
              $_img2->setPath('assets/approved2.png');
              $_img2->setWidthAndHeight(130, 80);
              $_img2->setOffsetY(5);
              $_img2->setOffsetX(5);
              $_img2->setResizeProportional(true);
              $_img2->setWorksheet($objPHPExcel);
              $_img2->setCoordinates($chr_q_x . (($i2 * $jml_row_perpage) + ($start_row + 13)));
            }
          }

          $objPHPExcel->mergeCells($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 13)) . ':' . $chr_n_x . (($i2 * $jml_row_perpage) + ($start_row + 14)))->setCellValue($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 13)), "");
          $objPHPExcel->mergeCells($chr_o_x . (($i2 * $jml_row_perpage) + ($start_row + 13)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 14)))->setCellValue($chr_o_x . (($i2 * $jml_row_perpage) + ($start_row + 13)), "");

          $objPHPExcel->setSharedStyle($headerStyle, $chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 12)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 14)));


          $objPHPExcel->mergeCells($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 15)) . ':' . $chr_h_x . (($i2 * $jml_row_perpage) + ($start_row + 15)))->setCellValue($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 15)), "Nama");
          $objPHPExcel->mergeCells($chr_i_x . (($i2 * $jml_row_perpage) + ($start_row + 15)) . ':' . $chr_n_x . (($i2 * $jml_row_perpage) + ($start_row + 15)))->setCellValue($chr_i_x . (($i2 * $jml_row_perpage) + ($start_row + 15)), ": " . $ndt_app1_by[((($i2 * 3) + $i) + ($i3 * 6))]);
          $objPHPExcel->mergeCells($chr_o_x . (($i2 * $jml_row_perpage) + ($start_row + 15)) . ':' . $chr_p_x . (($i2 * $jml_row_perpage) + ($start_row + 15)))->setCellValue($chr_o_x . (($i2 * $jml_row_perpage) + ($start_row + 15)), "Nama");
          $objPHPExcel->mergeCells($chr_q_x . (($i2 * $jml_row_perpage) + ($start_row + 15)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 15)))->setCellValue($chr_q_x . (($i2 * $jml_row_perpage) + ($start_row + 15)), ": " . $ndt_app2_by[((($i2 * 3) + $i) + ($i3 * 6))]);
        //   $objPHPExcel->mergeCells($chr_q_x . (($i2 * $jml_row_perpage) + ($start_row + 15)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 15)))->setCellValue($chr_q_x . (($i2 * $jml_row_perpage) + ($start_row + 15)), ": " . $ndt_app2_by[((($i2 * 3) + $i) + ($i3 * 6))]);

          $objPHPExcel->mergeCells($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 16)) . ':' . $chr_h_x . (($i2 * $jml_row_perpage) + ($start_row + 16)))->setCellValue($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 16)), "Jabatan");
          $objPHPExcel->mergeCells($chr_i_x . (($i2 * $jml_row_perpage) + ($start_row + 16)) . ':' . $chr_n_x . (($i2 * $jml_row_perpage) + ($start_row + 16)))->setCellValue($chr_i_x . (($i2 * $jml_row_perpage) + ($start_row + 16)), ": " . $ndt_app1_jabatan[((($i2 * 3) + $i) + ($i3 * 6))]);
          $objPHPExcel->mergeCells($chr_o_x . (($i2 * $jml_row_perpage) + ($start_row + 16)) . ':' . $chr_p_x . (($i2 * $jml_row_perpage) + ($start_row + 16)))->setCellValue($chr_o_x . (($i2 * $jml_row_perpage) + ($start_row + 16)), "Jabatan");
          $objPHPExcel->mergeCells($chr_q_x . (($i2 * $jml_row_perpage) + ($start_row + 16)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 16)))->setCellValue($chr_q_x . (($i2 * $jml_row_perpage) + ($start_row + 16)), ": " . $ndt_app2_jabatan[((($i2 * 3) + $i) + ($i3 * 6))]);

          $objPHPExcel->mergeCells($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 17)) . ':' . $chr_h_x . (($i2 * $jml_row_perpage) + ($start_row + 17)))->setCellValue($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 17)), "Tanggal");
          $objPHPExcel->mergeCells($chr_i_x . (($i2 * $jml_row_perpage) + ($start_row + 17)) . ':' . $chr_n_x . (($i2 * $jml_row_perpage) + ($start_row + 17)))->setCellValue($chr_i_x . (($i2 * $jml_row_perpage) + ($start_row + 17)), ": " . $ndt_app1_date[((($i2 * 3) + $i) + ($i3 * 6))]);
          $objPHPExcel->mergeCells($chr_o_x . (($i2 * $jml_row_perpage) + ($start_row + 17)) . ':' . $chr_p_x . (($i2 * $jml_row_perpage) + ($start_row + 17)))->setCellValue($chr_o_x . (($i2 * $jml_row_perpage) + ($start_row + 17)), "Tanggal");
          $objPHPExcel->mergeCells($chr_q_x . (($i2 * $jml_row_perpage) + ($start_row + 17)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 17)))->setCellValue($chr_q_x . (($i2 * $jml_row_perpage) + ($start_row + 17)), ": " . $ndt_app2_date[((($i2 * 3) + $i) + ($i3 * 6))]);

          $objPHPExcel->setSharedStyle($headerStyleLeftBottomTop, $chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 15)) . ':' . $chr_h_x . (($i2 * $jml_row_perpage) + ($start_row + 17)));
          $objPHPExcel->setSharedStyle($headerStyleRightBottomTop, $chr_i_x . (($i2 * $jml_row_perpage) + ($start_row + 15)) . ':' . $chr_n_x . (($i2 * $jml_row_perpage) + ($start_row + 17)));

          $objPHPExcel->setSharedStyle($headerStyleLeftBottomTop, $chr_o_x . (($i2 * $jml_row_perpage) + ($start_row + 15)) . ':' . $chr_p_x . (($i2 * $jml_row_perpage) + ($start_row + 17)));
          $objPHPExcel->setSharedStyle($headerStyleRightBottomTop, $chr_q_x . (($i2 * $jml_row_perpage) + ($start_row + 15)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 17)));

          $objPHPExcel->mergeCells($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 18)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 18)))->setCellValue($chr_g_x . (($i2 * $jml_row_perpage) + ($start_row + 18)), "");

          $objPHPExcel->setSharedStyle($noborderStyle, $chr_r_x . (($i2 * $jml_row_perpage) + ($start_row + 18)) . ':' . $chr_v_x . (($i2 * $jml_row_perpage) + ($start_row + 18)));

          $objPHPExcel->getRowDimension(($i2 * $jml_row_perpage) + ($start_row + 5))->setRowHeight(20);
          $objPHPExcel->getRowDimension(($i2 * $jml_row_perpage) + ($start_row + 6))->setRowHeight(20);
          $objPHPExcel->getRowDimension(($i2 * $jml_row_perpage) + ($start_row + 7))->setRowHeight(20);
          $objPHPExcel->getRowDimension(($i2 * $jml_row_perpage) + ($start_row + 8))->setRowHeight(20);
          $objPHPExcel->getRowDimension(($i2 * $jml_row_perpage) + ($start_row + 9))->setRowHeight(20);
          $objPHPExcel->getRowDimension(($i2 * $jml_row_perpage) + ($start_row + 10))->setRowHeight(20);
          $objPHPExcel->getRowDimension(($i2 * $jml_row_perpage) + ($start_row + 11))->setRowHeight(20);
          $objPHPExcel->getRowDimension(($i2 * $jml_row_perpage) + ($start_row + 12))->setRowHeight(20);
          $objPHPExcel->getRowDimension(($i2 * $jml_row_perpage) + ($start_row + 13))->setRowHeight(40);
          $objPHPExcel->getRowDimension(($i2 * $jml_row_perpage) + ($start_row + 14))->setRowHeight(40);
          $objPHPExcel->getRowDimension(($i2 * $jml_row_perpage) + ($start_row + 15))->setRowHeight(20);
          $objPHPExcel->getRowDimension(($i2 * $jml_row_perpage) + ($start_row + 16))->setRowHeight(20);
          $objPHPExcel->getRowDimension(($i2 * $jml_row_perpage) + ($start_row + 17))->setRowHeight(20);
        }

        $no_urut++;

        if ($vdtl_last_periode > ($no_urut * 3) && $vdtl_last_periode <= ($no_urut * 3 + 3) && $total_berat_cash > 0) {
          $vtotal_berat_cash = number_format(($total_berat_cash), 2, ',', '.');
        } else {
          $vtotal_berat_cash = '';
        }

        if ($vdtl_last_periode > ($no_urut * 3) && $vdtl_last_periode <= ($no_urut * 3 + 3) && $total_cash > 0) {
          $vtotal_cash = number_format(($total_cash), 0, ',', '.');
        } else {
          $vtotal_cash = '';
        }

        if ($vdtl_last_periode > ($no_urut * 3) && $vdtl_last_periode <= ($no_urut * 3 + 3) && $total_berat_potong_gaji > 0) {
          $vtotal_berat_potong_gaji = number_format(($total_berat_potong_gaji), 2, ',', '.');
        } else {
          $vtotal_berat_potong_gaji = '';
        }

        if ($vdtl_last_periode > ($no_urut * 3) && $vdtl_last_periode <= ($no_urut * 3 + 3) && $total_potong_gaji > 0) {
          $vtotal_potong_gaji = number_format(($total_potong_gaji), 0, ',', '.');
        } else {
          $vtotal_potong_gaji = '';
        }

        if ($vdtl_last_periode > ($no_urut * 3) && $vdtl_last_periode <= ($no_urut * 3 + 3) && $total_berat_lainnya > 0) {
          $vtotal_berat_lainnya = number_format(($total_berat_lainnya), 2, ',', '.');
        } else {
          $vtotal_berat_lainnya = '';
        }

        if ($vdtl_last_periode > ($no_urut * 3) && $vdtl_last_periode <= ($no_urut * 3 + 3) && $total_lainnya > 0) {
          $vtotal_lainnya = number_format(($total_lainnya), 0, ',', '.');
        } else {
          $vtotal_lainnya = '';
        }

        if ($vdtl_last_periode > ($no_urut * 3) && $vdtl_last_periode <= ($no_urut * 3 + 3) && ($total_berat_cash + $total_berat_potong_gaji + $total_berat_lainnya) > 0) {
          $vtotal_all_kg = number_format((($total_berat_cash + $total_berat_potong_gaji + $total_berat_lainnya)), 2, ',', '.');
        } else {
          $vtotal_all_kg = '';
        }

        if ($vdtl_last_periode > ($no_urut * 3) && $vdtl_last_periode <= ($no_urut * 3 + 3) && ($total_cash + $total_potong_gaji + $total_lainnya) > 0) {
          $vtotal_all_rp = number_format((($total_cash + $total_potong_gaji + $total_lainnya)), 0, ',', '.');
        } else {
          $vtotal_all_rp = '';
        }

        $objPHPExcel->mergeCells('BS' . (($i2 * $jml_row_perpage) + ($start_row + 8)) . ':BT' . (($i2 * $jml_row_perpage) + ($start_row + 8)))->setCellValue('BS' . (($i2 * $jml_row_perpage) + ($start_row + 8)), $vtotal_berat_cash);
        $objPHPExcel->mergeCells('BU' . (($i2 * $jml_row_perpage) + ($start_row + 8)) . ':BY' . (($i2 * $jml_row_perpage) + ($start_row + 8)))->setCellValue('BU' . (($i2 * $jml_row_perpage) + ($start_row + 8)), $vtotal_cash);

        $objPHPExcel->mergeCells('BS' . (($i2 * $jml_row_perpage) + ($start_row + 9)) . ':BT' . (($i2 * $jml_row_perpage) + ($start_row + 9)))->setCellValue('BS' . (($i2 * $jml_row_perpage) + ($start_row + 9)), $vtotal_berat_potong_gaji);
        $objPHPExcel->mergeCells('BU' . (($i2 * $jml_row_perpage) + ($start_row + 9)) . ':BY' . (($i2 * $jml_row_perpage) + ($start_row + 9)))->setCellValue('BU' . (($i2 * $jml_row_perpage) + ($start_row + 9)), $vtotal_potong_gaji);

        $objPHPExcel->mergeCells('BS' . (($i2 * $jml_row_perpage) + ($start_row + 10)) . ':BT' . (($i2 * $jml_row_perpage) + ($start_row + 10)))->setCellValue('BS' . (($i2 * $jml_row_perpage) + ($start_row + 10)), $vtotal_berat_lainnya);
        $objPHPExcel->mergeCells('BU' . (($i2 * $jml_row_perpage) + ($start_row + 10)) . ':BY' . (($i2 * $jml_row_perpage) + ($start_row + 10)))->setCellValue('BU' . (($i2 * $jml_row_perpage) + ($start_row + 10)), $vtotal_lainnya);

        $objPHPExcel->mergeCells('BS' . (($i2 * $jml_row_perpage) + ($start_row + 11)) . ':BT' . (($i2 * $jml_row_perpage) + ($start_row + 11)))->setCellValue('BS' . (($i2 * $jml_row_perpage) + ($start_row + 11)), $vtotal_all_kg);
        $objPHPExcel->mergeCells('BU' . (($i2 * $jml_row_perpage) + ($start_row + 11)) . ':BY' . (($i2 * $jml_row_perpage) + ($start_row + 11)))->setCellValue('BU' . (($i2 * $jml_row_perpage) + ($start_row + 11)), $vtotal_all_rp);

        $objPHPExcel->setSharedStyle($bodyStyle, 'BS' . (($i2 * $jml_row_perpage) + ($start_row + 8)) . ':BY' . (($i2 * $jml_row_perpage) + ($start_row + 10)));
        $objPHPExcel->setSharedStyle($DetailheaderStyle, 'BS' . (($i2 * $jml_row_perpage) + ($start_row + 11)) . ':BY' . (($i2 * $jml_row_perpage) + ($start_row + 11)));

        $objPHPExcel->mergeCells('BS' . (($i2 * $jml_row_perpage) + ($start_row + 12)) . ':BY' . (($i2 * $jml_row_perpage) + ($start_row + 18)))->setCellValue('BS' . (($i2 * $jml_row_perpage) + ($start_row + 12)), "");
        $objPHPExcel->setSharedStyle($headerStyleRight, 'BS' . (($i2 * $jml_row_perpage) + ($start_row + 12)) . ':BY' . (($i2 * $jml_row_perpage) + ($start_row + 18)));

        $last_row = (($i2 * $jml_row_perpage) + ($start_row + 18));
      }

      $v_nama_bln = array(
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
        '12' => 'DESEMBER',
      );

      if ($all_periode_total_berat_cash > 0) {
        $total_allperiode_cash_kg = number_format(($all_periode_total_berat_cash), 2, ',', '.');
      } else {
        $total_allperiode_cash_kg = '-';
      }

      if ($all_periode_total_cash > 0) {
        $total_allperiode_cash_rp = number_format(($all_periode_total_cash), 0, ',', '.');
      } else {
        $total_allperiode_cash_rp = '-';
      }

      if ($all_periode_total_berat_potong_gaji > 0) {
        $total_allperiode_potonggaji_kg = number_format(($all_periode_total_berat_potong_gaji), 2, ',', '.');
      } else {
        $total_allperiode_potonggaji_kg = '-';
      }

      if ($all_periode_total_potong_gaji > 0) {
        $total_allperiode_potonggaji_rp = number_format(($all_periode_total_potong_gaji), 0, ',', '.');
      } else {
        $total_allperiode_potonggaji_rp = '-';
      }

      if ($all_periode_total_berat_lainnya > 0) {
        $total_allperiode_lainnya_kg = number_format(($all_periode_total_berat_lainnya), 2, ',', '.');
      } else {
        $total_allperiode_lainnya_kg = '-';
      }

      if ($all_periode_total_lainnya > 0) {
        $total_allperiode_lainnya_rp = number_format(($all_periode_total_lainnya), 0, ',', '.');
      } else {
        $total_allperiode_lainnya_rp = '-';
      }

      if (($all_periode_total_berat_cash + $all_periode_total_berat_potong_gaji + $all_periode_total_berat_lainnya) > 0) {
        $total_allperiode_kg = number_format(($all_periode_total_berat_cash + $all_periode_total_berat_potong_gaji + $all_periode_total_berat_lainnya), 2, ',', '.');
      } else {
        $total_allperiode_kg = '-';
      }

      if (($all_periode_total_cash + $all_periode_total_potong_gaji + $all_periode_total_lainnya) > 0) {
        $total_allperiode_rp = number_format(($all_periode_total_cash + $all_periode_total_potong_gaji + $all_periode_total_lainnya), 0, ',', '.');
      } else {
        $total_allperiode_rp = '-';
      }

      if (count($all_periode_periode) > 0) {
        $range_periode = $v_nama_bln[substr(reset($all_periode_periode), 5, 6)] . "-" . substr(reset($all_periode_periode), 0, 4) . " S/D " . $v_nama_bln[substr(end($all_periode_periode), 5, 6)] . "-" . substr(end($all_periode_periode), 0, 4);
      } else {
        $range_periode = '';
      }

      $objPHPExcel->mergeCells('A' . ($last_row + 1) . ':A' . ($last_row + 1))->setCellValue('A' . ($last_row + 1), "");
      $objPHPExcel->mergeCells('B' . ($last_row + 1) . ':I' . ($last_row + 1))->setCellValue('B' . ($last_row + 1), "Ket :");
      $objPHPExcel->mergeCells('J' . ($last_row + 1) . ':P' . ($last_row + 1))->setCellValue('J' . ($last_row + 1), "");
      $objPHPExcel->mergeCells('Q' . ($last_row + 1) . ':AI' . ($last_row + 1))->setCellValue('Q' . ($last_row + 1), "TOTAL " . $range_periode);
      $objPHPExcel->mergeCells('AM' . ($last_row + 1) . ':AV' . ($last_row + 1))->setCellValue('AM' . ($last_row + 1), "");
      $objPHPExcel->mergeCells('AW' . ($last_row + 1) . ':AW' . ($last_row + 1))->setCellValue('AW' . ($last_row + 1), "");
      $objPHPExcel->mergeCells('AX' . ($last_row + 1) . ':BY' . ($last_row + 1))->setCellValue('AX' . ($last_row + 1), "");

      $objPHPExcel->mergeCells('A' . ($last_row + 2) . ':A' . ($last_row + 2))->setCellValue('A' . ($last_row + 2), "");
      $objPHPExcel->mergeCells('B' . ($last_row + 2) . ':I' . ($last_row + 2))->setCellValue('B' . ($last_row + 2), "Awal mesin produksi");
      $objPHPExcel->mergeCells('J' . ($last_row + 2) . ':P' . ($last_row + 2))->setCellValue('J' . ($last_row + 2), ": 19 Maret 2020");
      $objPHPExcel->mergeCells('Q' . ($last_row + 2) . ':W' . ($last_row + 2))->setCellValue('Q' . ($last_row + 2), "Jenis Pembayaran");
      $objPHPExcel->mergeCells('X' . ($last_row + 2) . ':AC' . ($last_row + 2))->setCellValue('X' . ($last_row + 2), "Kg");
      $objPHPExcel->mergeCells('AD' . ($last_row + 2) . ':AI' . ($last_row + 2))->setCellValue('AD' . ($last_row + 2), "Rupiah");
      $objPHPExcel->mergeCells('AM' . ($last_row + 2) . ':AV' . ($last_row + 2))->setCellValue('AM' . ($last_row + 2), "% Efektifitas Mesin");
      $objPHPExcel->mergeCells('AW' . ($last_row + 2) . ':AW' . ($last_row + 2))->setCellValue('AW' . ($last_row + 2), "");
      $objPHPExcel->mergeCells('AX' . ($last_row + 2) . ':BY' . ($last_row + 2))->setCellValue('AX' . ($last_row + 2), "");

      $objPHPExcel->mergeCells('A' . ($last_row + 3) . ':A' . ($last_row + 3))->setCellValue('A' . ($last_row + 3), "");
      $objPHPExcel->mergeCells('B' . ($last_row + 3) . ':I' . ($last_row + 3))->setCellValue('B' . ($last_row + 3), "Jumlah mesin");
      $objPHPExcel->mergeCells('J' . ($last_row + 3) . ':P' . ($last_row + 3))->setCellValue('J' . ($last_row + 3), ": 2 unit");
      $objPHPExcel->mergeCells('Q' . ($last_row + 3) . ':W' . ($last_row + 3))->setCellValue('Q' . ($last_row + 3), "Cash");
      $objPHPExcel->mergeCells('X' . ($last_row + 3) . ':AC' . ($last_row + 3))->setCellValue('X' . ($last_row + 3), $total_allperiode_cash_kg);
      $objPHPExcel->mergeCells('AD' . ($last_row + 3) . ':AI' . ($last_row + 3))->setCellValue('AD' . ($last_row + 3), $total_allperiode_cash_rp);
      $objPHPExcel->mergeCells('AM' . ($last_row + 3) . ':AV' . ($last_row + 3))->setCellValue('AM' . ($last_row + 3), "(Jumlah kg per bulan dibagi 3432) * 100%");
      $objPHPExcel->mergeCells('AW' . ($last_row + 3) . ':AW' . ($last_row + 3))->setCellValue('AW' . ($last_row + 3), "");
      $objPHPExcel->mergeCells('AX' . ($last_row + 3) . ':BY' . ($last_row + 3))->setCellValue('AX' . ($last_row + 3), "");

      $objPHPExcel->mergeCells('A' . ($last_row + 4) . ':A' . ($last_row + 4))->setCellValue('A' . ($last_row + 4), "");
      $objPHPExcel->mergeCells('B' . ($last_row + 4) . ':I' . ($last_row + 4))->setCellValue('B' . ($last_row + 4), "Target");
      $objPHPExcel->mergeCells('J' . ($last_row + 4) . ':P' . ($last_row + 4))->setCellValue('J' . ($last_row + 4), ": Per hari 132 Kg");
      $objPHPExcel->mergeCells('Q' . ($last_row + 4) . ':W' . ($last_row + 4))->setCellValue('Q' . ($last_row + 4), "Potong Gaji");
      $objPHPExcel->mergeCells('X' . ($last_row + 4) . ':AC' . ($last_row + 4))->setCellValue('X' . ($last_row + 4), $total_allperiode_potonggaji_kg);
      $objPHPExcel->mergeCells('AD' . ($last_row + 4) . ':AI' . ($last_row + 4))->setCellValue('AD' . ($last_row + 4), $total_allperiode_potonggaji_rp);
      $objPHPExcel->mergeCells('AM' . ($last_row + 4) . ':AV' . ($last_row + 4))->setCellValue('AM' . ($last_row + 4), "");
      $objPHPExcel->mergeCells('AW' . ($last_row + 4) . ':AW' . ($last_row + 4))->setCellValue('AW' . ($last_row + 4), "");
      $objPHPExcel->mergeCells('AX' . ($last_row + 4) . ':BY' . ($last_row + 4))->setCellValue('AX' . ($last_row + 4), "");

      $objPHPExcel->mergeCells('A' . ($last_row + 5) . ':A' . ($last_row + 5))->setCellValue('A' . ($last_row + 5), "");
      $objPHPExcel->mergeCells('B' . ($last_row + 5) . ':I' . ($last_row + 5))->setCellValue('B' . ($last_row + 5), "");
      $objPHPExcel->mergeCells('J' . ($last_row + 5) . ':P' . ($last_row + 5))->setCellValue('J' . ($last_row + 5), ": Per bulan 3.432 Kg");
      $objPHPExcel->mergeCells('Q' . ($last_row + 5) . ':W' . ($last_row + 5))->setCellValue('Q' . ($last_row + 5), "Lainnya");
      $objPHPExcel->mergeCells('X' . ($last_row + 5) . ':AC' . ($last_row + 5))->setCellValue('X' . ($last_row + 5), $total_allperiode_lainnya_kg);
      $objPHPExcel->mergeCells('AD' . ($last_row + 5) . ':AI' . ($last_row + 5))->setCellValue('AD' . ($last_row + 5), $total_allperiode_lainnya_rp);
      $objPHPExcel->mergeCells('AM' . ($last_row + 5) . ':AV' . ($last_row + 5))->setCellValue('AM' . ($last_row + 5), "");
      $objPHPExcel->mergeCells('AW' . ($last_row + 5) . ':AW' . ($last_row + 5))->setCellValue('AW' . ($last_row + 5), "");
      $objPHPExcel->mergeCells('AX' . ($last_row + 5) . ':BY' . ($last_row + 5))->setCellValue('AX' . ($last_row + 5), "");

      $objPHPExcel->mergeCells('Q' . ($last_row + 6) . ':W' . ($last_row + 6))->setCellValue('Q' . ($last_row + 6), "Total");
      $objPHPExcel->mergeCells('X' . ($last_row + 6) . ':AC' . ($last_row + 6))->setCellValue('X' . ($last_row + 6), $total_allperiode_kg);
      $objPHPExcel->mergeCells('AD' . ($last_row + 6) . ':AI' . ($last_row + 6))->setCellValue('AD' . ($last_row + 6), $total_allperiode_rp);

      $objPHPExcel->setSharedStyle($headerStyleLeft, 'A' . ($last_row + 1) . ':A' . ($last_row + 6));
      $objPHPExcel->setSharedStyle($noborderStyle, 'B' . ($last_row + 1) . ':AL' . ($last_row + 5));
      $objPHPExcel->setSharedStyle($noborderStyle, 'AM' . ($last_row + 1) . ':BB' . ($last_row + 1));

      $objPHPExcel->setSharedStyle($DetailheaderStyle, 'Q' . ($last_row + 1) . ':AI' . ($last_row + 2));
      $objPHPExcel->setSharedStyle($bodyStyle, 'Q' . ($last_row + 3) . ':AI' . ($last_row + 5));
      $objPHPExcel->setSharedStyle($DetailheaderStyle, 'Q' . ($last_row + 6) . ':AI' . ($last_row + 6));

      $objPHPExcel->setSharedStyle($headerStyleLeftTop, 'AM' . ($last_row + 2) . ':AV' . ($last_row + 2));
      $objPHPExcel->setSharedStyle($headerStyleLeftBottom, 'AM' . ($last_row + 3) . ':AV' . ($last_row + 3));
      $objPHPExcel->setSharedStyle($headerStyleRightTop, 'AW' . ($last_row + 2) . ':AW' . ($last_row + 2));
      $objPHPExcel->setSharedStyle($headerStyleRightbottom, 'AW' . ($last_row + 3) . ':AW' . ($last_row + 3));
      $objPHPExcel->setSharedStyle($noborderStyle, 'AM' . ($last_row + 4) . ':AW' . ($last_row + 5));
      $objPHPExcel->setSharedStyle($headerStyleRight, 'AX' . ($last_row + 1) . ':BY' . ($last_row + 6));

      $objPHPExcel->mergeCells('A' . ($last_row + 6) . ':P' . ($last_row + 6))->setCellValue('A' . ($last_row + 6), '');
      $objPHPExcel->mergeCells('AJ' . ($last_row + 6) . ':BY' . ($last_row + 6))->setCellValue('AJ' . ($last_row + 6), '');
      $objPHPExcel->mergeCells('A' . ($last_row + 7) . ':BY' . ($last_row + 7))->setCellValue('A' . ($last_row + 7), '');

      $objPHPExcel->setSharedStyle($noborderStyle, 'A' . ($last_row + 7) . ':P' . ($last_row + 7));
      $objPHPExcel->setSharedStyle($noborderStyle, 'AJ' . ($last_row + 7) . ':BY' . ($last_row + 7));

      $objPHPExcel->getStyle('AJ' . ($last_row + 7) . ':BY' . ($last_row + 7))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

      $objPHPExcel->setSharedStyle($footerStyleLeftbottom, 'A' . ($last_row + 7) . ':BX' . ($last_row + 7));
      $objPHPExcel->setSharedStyle($footerStyleRightbottom, 'BY' . ($last_row + 7) . ':BY' . ($last_row + 7));

      $objPHPExcel->setBreak('A' . ($last_row + 8),  PHPExcel_Worksheet::BREAK_ROW);
    }

    ob_clean();
    header('Content-Type: text/html; charset=utf-8');
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename=Laporan Pendapatan Laundry (Management) ' . $thn_laporan . '.xls');
    $objWriter = PHPExcel_IOFactory::createWriter($obj, 'Excel5');
    $objWriter->save('php://output');
    exit();
    ob_end_clean();
  }
}
