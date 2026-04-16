<?php
class style_helper
{
  public static $AUDITOR = "Auditor";
}

class exelstyles
{
  var $PT_STYLE =
  array(
    'fill'   => array(
      'type'    => PHPExcel_Style_Fill::FILL_SOLID
    ),
    'font' => array(
      'bold'    => true,
      'name' => 'Trebuchet MS',
      'size' => 12
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
  );


  var $headerStyle = array(
    'fill'   => array(
      'type'    => PHPExcel_Style_Fill::FILL_SOLID
    ),
    'font' => array(
      'bold'    => true,
      'name' => 'Trebuchet MS',
      'size' => 7
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
  );


  var $headerStyleKiri = array(
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
      'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
      'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
      'wrap'       => true
    ),
  );

  var $headerStyleLeftTop = array(
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
  );

  var $headerStyleRightTop = array(
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
  );

  var $headerStyleLeftBottomTop =  array(
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
  );

  var $headerStyleRightBottomTop = array(
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
  );
  var $DetailheaderStyle = array(
    'fill'   => array(
      'type'    => PHPExcel_Style_Fill::FILL_SOLID
    ),
    'font' => array(
      'bold'    => true,
      'name' => 'Trebuchet MS',
      'size' => 8
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
  );
  var $bodyStyle = array(
    'fill'   => array(
      'type'  => PHPExcel_Style_Fill::FILL_SOLID,
      'color' => array('argb' => 'FFFFFFFF')
    ),
    'font'   => array(
      'name' => 'Trebuchet MS',
      'size'  => 8
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
  );

  var $bodyStyle_garis = array(
    'fill'   => array(
      'type'  => PHPExcel_Style_Fill::FILL_SOLID,
      'color' => array('argb' => 'FFFFFFFF')
    ),
    'font'   => array(
      'name' => 'Trebuchet MS',
      'size'  => 8,
      'strike' => true
    ),
    'numberformat'   => array(
      'code' => PHPExcel_Style_NumberFormat::FORMAT_TEXT
    ),
    // 'borders' => array(
    //   'bottom'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
    //   'right'   => array('style' => PHPExcel_Style_Border::BORDER_THIN),
    //   'left'    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
    //   'top'     => array('style' => PHPExcel_Style_Border::BORDER_THIN)
    // ),
    'alignment' => array(
      'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
      'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
      'wrap'     => true
    ),
  );

  var $bodyStyleAlignLeft = array(
        'fill'   => array(
        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('argb' => 'FFFFFFFF')
      ),
        'font'   => array(
        'name' => 'Trebuchet MS',
        'size'  => 8
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
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'wrap'     => true
      ),
    );

  var $bodyStyleLeft = array(
    'fill'   => array(
      'type'  => PHPExcel_Style_Fill::FILL_SOLID,
      'color' => array('argb' => 'FFFFFFFF')
    ),
    'font'   => array(
      'name' => 'Trebuchet MS',
      'size'  => 10
    ),
    'numberformat'   => array(
      'code' => PHPExcel_Style_NumberFormat::FORMAT_TEXT
    ),
    'borders' => array(
      'left'    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
    ),
    'alignment' => array(
      'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
      'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
      'wrap'     => true
    ),
  );
  var $bodyStyleRight = array(
    'fill'   => array(
      'type'  => PHPExcel_Style_Fill::FILL_SOLID,
      'color' => array('argb' => 'FFFFFFFF')
    ),
    'font'   => array(
      'name' => 'Trebuchet MS',
      'size'  => 10
    ),
    'numberformat'   => array(
      'code' => PHPExcel_Style_NumberFormat::FORMAT_TEXT
    ),
    'borders' => array(
      'right'   => array('style' => PHPExcel_Style_Border::BORDER_THIN)
    ),
    'alignment' => array(
      'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
      'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
      'wrap'     => true
    ),
  );

  var $noborderStyle = array(
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
  );

  var $footerStyleLeftbottom = array(
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
  );
  var $footerStyleRightbottom = array(
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
      'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
      'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
      'wrap'       => true
    ),
  );
}
