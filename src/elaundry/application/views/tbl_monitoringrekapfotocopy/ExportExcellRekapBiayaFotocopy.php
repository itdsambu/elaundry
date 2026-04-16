<?php
/** PHPExcel_Writer_Excel2007 */


// Create new PHPExcel object
// echo date('H:i:s') . " Create new PHPExcel object\n";

$objPHPExcel    = new PHPExcel();

$style_col = array(  
    'font'      => array('bold' => FALSE,
                         'name' => 'Times New Roman',
                         'size' => '11'
                        ), // Set font nya jadi bold  
    'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'wrap' =>true, // Set text jadi ditengah secara horizontal (center)    
    'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
 ),
'borders' => array(    
    'left'   => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis   
    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis    
    'bottom'=> array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis    
    'top'  => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis  
    )
);

$header3= array(
        'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT ),// Set text jadi di tengah secara horizontal (middle)  ), 
        'font'=> array('bold'=> false,'name' => 'Times New Roman','size' => '11'), 
        'borders' => array(    
            'top'   => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis   
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis    
            'bottom'=> array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis    
            'left'  => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis  
            )
        );


$header4= array(
        'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT ),// Set text jadi di tengah secara horizontal (middle)  ), 
        'font'=> array('bold'=> false,'name' => 'Times New Roman','size' => '11'), 
        'borders' => array(    
            'top'   => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis   
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis    
            'bottom'=> array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis    
            'left'  => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis  
            )
        );

 $Bold= array(
        'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER ),// Set text jadi di tengah secara horizontal (middle)  ), 
        'font'=> array('bold'=> true,'name' => 'Times New Roman','size' => '11','italic'=> false), 
        'borders' => array(    
            'top'   => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis   
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis    
            'bottom'=> array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis    
            'left'  => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis  
            )
        );

 // Add some data
//PENGATURAN LEBAR
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5,5);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(8);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(10);
//PENGATURAN TINGGI
    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
    $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(20); 
    $objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(20); 

//PENGATURAN MERGE CELL          
    // HEADER
    $objPHPExcel->getActiveSheet()->mergeCells('D2:V2');
    $objPHPExcel->getActiveSheet()->mergeCells('D3:V4');
    $objPHPExcel->getActiveSheet()->mergeCells('B2:C4');
    // $objPHPExcel->getActiveSheet()->mergeCells('U2:V2');
    // $objPHPExcel->getActiveSheet()->mergeCells('U3:V3');
    // $objPHPExcel->getActiveSheet()->mergeCells('U4:V4');
    // $objPHPExcel->getActiveSheet()->mergeCells('B5:W5');


// GARIS 
    $objPHPExcel->getActiveSheet()->getStyle('B2:X4')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('B2:C4')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('D2:V2')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('D3:V4')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('W2:X2')->applyFromArray($header3);
    $objPHPExcel->getActiveSheet()->getStyle('W3:X3')->applyFromArray($header3);
    $objPHPExcel->getActiveSheet()->getStyle('W4:X4')->applyFromArray($header3);


    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('D2','PT. RIAU SAKTI UNITED PLANTATIONS')
                ->setCellValue('D3','LAPORAN REKAP PEMAKAIAN FOTOCOPY ATAU RISOGRAPH/SHEET')

                ->setCellValue('W2','Nomor')
                ->setCellValue('W3','Bulan')
                ->setCellValue('W4','Tahun')
            ;
    $no=1;
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('X2',': '.$no++.' Dari 1')
                ->setCellValue('X3',': '.$bulan)
                ->setCellValue('X4',': '.$tahun)
        ;
 
    // //HEADER 2

    $objPHPExcel->getActiveSheet()->mergeCells('B6:B8');
    $objPHPExcel->getActiveSheet()->mergeCells('C6:C8');
    $objPHPExcel->getActiveSheet()->mergeCells('D6:D8');
    $objPHPExcel->getActiveSheet()->mergeCells('W6:W8');
    $objPHPExcel->getActiveSheet()->mergeCells('X6:X8');
    $objPHPExcel->getActiveSheet()->mergeCells('E6:M6');
    $objPHPExcel->getActiveSheet()->mergeCells('N6:V6');
    $objPHPExcel->getActiveSheet()->mergeCells('E7:I7');
    $objPHPExcel->getActiveSheet()->mergeCells('J7:M7');
    $objPHPExcel->getActiveSheet()->mergeCells('N7:R7');
    $objPHPExcel->getActiveSheet()->mergeCells('S7:V7');


    $objPHPExcel->getActiveSheet()->getStyle('B6:X8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('B6:B8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('C6:C8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('D6:L8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('M6:M8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('N6:V8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('D6:W6')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('D7:X7')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('E6:E8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('F6:F8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('G6:G8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('H6:H8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('I6:I8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('J6:J8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('K6:K8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('L6:L8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('N6:N8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('O6:O8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('P6:P8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('Q6:Q8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('R6:R8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('S6:S8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('T6:T8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('U6:U8')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('W6:W8')->applyFromArray($style_col);
    

    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('B6','NO')
                ->setCellValue('C6','DIVISI')
                ->setCellValue('D6','DEPT')
                ->setCellValue('W6','TOTAL (RP)')
                ->setCellValue('X6','%')
                ->setCellValue('E6','FOTOCOPY')
                ->setCellValue('N6','RISOGRAPH/SHEET')
                ->setCellValue('E7','Kertas HVS/Fotocopy')
                ->setCellValue('J7','BURAM')
                ->setCellValue('N7','Kertas HVS/Fotocopy')
                ->setCellValue('S7','BURAM')

                //UKURAN KERTAS FOTOCOPY
                ->setCellValue('E8','F4')
                ->setCellValue('F8','A4')
                ->setCellValue('G8','B5')
                ->setCellValue('H8','A3')
                ->setCellValue('I8','B4')
                ->setCellValue('J8','F4')
                ->setCellValue('K8','A4')
                ->setCellValue('L8','B5')
                ->setCellValue('M8','B4')

                // UKURAN KERTAS RISOGRAPH/SHEET
                ->setCellValue('N8','F4')
                ->setCellValue('O8','A4')
                ->setCellValue('P8','B5')
                ->setCellValue('Q8','A3')
                ->setCellValue('R8','B4')
                ->setCellValue('S8','F4')
                ->setCellValue('T8','A4')
                ->setCellValue('U8','B5')
                ->setCellValue('V8','B4')
            ;
    $row=9;
    foreach($departemen as $a ){
        $objPHPExcel->getActiveSheet()->getStyle('B'.$row.':B'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$row.':C'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$row.':D'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$row.':E'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$row.':F'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$row.':G'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$row.':H'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('I'.$row.':I'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('J'.$row.':J'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('K'.$row.':K'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('L'.$row.':L'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('M'.$row.':M'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('N'.$row.':N'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('O'.$row.':O'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('P'.$row.':P'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('Q'.$row.':Q'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('R'.$row.':R'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('S'.$row.':S'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('T'.$row.':T'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('U'.$row.':U'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('V'.$row.':V'.$row)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('W'.$row.':W'.$row)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('X'.$row.':X'.$row)->applyFromArray($style_col);

         $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('B'.$row,$no++)
                ->setCellValue('C'.$row,$a->Divisi)
                ->setCellValue('D'.$row,$a->Singkatan_dept)
            ;

        foreach($jumlahtotal as $b){
            if($a->ID_dept == $b->ID_dept && $b->Type_kertas==1 && $b->ID_kertas==58){
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('E'.$row,number_format($b->Totalkertasfotocopy));
            }
         }
         foreach($jumlahtotal as $b){
            if($a->ID_dept == $b->ID_dept && $b->Type_kertas==1 && $b->ID_kertas==59){
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('F'.$row,number_format($b->Totalkertasfotocopy));
            }
         }
         foreach($jumlahtotal as $b){
            if($a->ID_dept == $b->ID_dept && $b->Type_kertas==1 && $b->ID_kertas==60){
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('G'.$row,number_format($b->Totalkertasfotocopy));
            }
         }
         foreach($jumlahtotal as $b){
            if($a->ID_dept == $b->ID_dept && $b->Type_kertas==1 && $b->ID_kertas==61){
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('H'.$row,number_format($b->Totalkertasfotocopy));
            }
         }
         foreach($jumlahtotal as $b){
            if($a->ID_dept == $b->ID_dept && $b->Type_kertas==1 && $b->ID_kertas==66){
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('I'.$row,number_format($b->Totalkertasfotocopy));
            }
         }
         foreach($jumlahtotal as $b){
            if($a->ID_dept == $b->ID_dept && $b->Type_kertas==1 && $b->ID_kertas==63){
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('J'.$row,number_format($b->Totalkertasfotocopy));
            }
         }
         foreach($jumlahtotal as $b){
            if($a->ID_dept == $b->ID_dept && $b->Type_kertas==1 && $b->ID_kertas==62){
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('K'.$row,number_format($b->Totalkertasfotocopy));
            }
         }
         foreach($jumlahtotal as $b){
            if($a->ID_dept == $b->ID_dept && $b->Type_kertas==1 && $b->ID_kertas==64){
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('L'.$row,number_format($b->Totalkertasfotocopy));
            }
         }
         foreach($jumlahtotal as $b){
            if($a->ID_dept == $b->ID_dept && $b->Type_kertas==1 && $b->ID_kertas==65){
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('M'.$row,number_format($b->Totalkertasfotocopy));
            }
         }

         //UKURAN KERTAS RISOGRAPH/SHEET

        foreach($jumlahtotal as $b){
            if($a->ID_dept == $b->ID_dept && $b->Type_kertas==0 && $b->ID_kertas==68){
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('N'.$row,number_format($b->Totalkertasfotocopy));
            }
        }
        foreach($jumlahtotal as $b){
            if($a->ID_dept == $b->ID_dept && $b->Type_kertas==0 && $b->ID_kertas==67){
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('O'.$row,number_format($b->Totalkertasfotocopy));
            }
        }
        foreach($jumlahtotal as $b){
            if($a->ID_dept == $b->ID_dept && $b->Type_kertas==0 && $b->ID_kertas==69){
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('P'.$row,number_format($b->Totalkertasfotocopy));
            }
        }
        foreach($jumlahtotal as $b){
            if($a->ID_dept == $b->ID_dept && $b->Type_kertas==0 && $b->ID_kertas==70){
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('Q'.$row,number_format($b->Totalkertasfotocopy));
            } 
        }
        foreach($jumlahtotal as $b){
            if($a->ID_dept == $b->ID_dept && $b->Type_kertas==0 && $b->ID_kertas==71){
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('R'.$row,number_format($b->Totalkertasfotocopy));
            }
        }
        foreach($jumlahtotal as $b){
            if($a->ID_dept == $b->ID_dept && $b->Type_kertas==0 && $b->ID_kertas==73){
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('S'.$row,number_format($b->Totalkertasfotocopy));
            }
        }
        foreach($jumlahtotal as $b){
            if($a->ID_dept == $b->ID_dept && $b->Type_kertas==0 && $b->ID_kertas==72){
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('T'.$row,number_format($b->Totalkertasfotocopy));
            }
        }
        foreach($jumlahtotal as $b){
            if($a->ID_dept == $b->ID_dept && $b->Type_kertas==0 && $b->ID_kertas==74){
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('U'.$row,number_format($b->Totalkertasfotocopy));
            }
        }
        foreach($jumlahtotal as $b){
            if($a->ID_dept == $b->ID_dept && $b->Type_kertas==0 && $b->ID_kertas==75){
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('V'.$row,number_format($b->Totalkertasfotocopy));
            }
        }

        // TOTAL
        foreach($jumlahuang as $e){
            if ($a->ID_dept == $e->ID_dept) {
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('W'.$row, number_format($e->Total));
            }
        }
        // PERSENTASE
        foreach($persentaseperdept as $f){
           if($a->ID_dept == $f->ID_dept){
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('X'.$row, number_format($f->persentase,2));
           }
        }
    $row++;
}
    $row1=$row;

        $objPHPExcel->getActiveSheet()->mergeCells('B'.$row1.':D'.$row1);

        $objPHPExcel->getActiveSheet()->getStyle('B'.$row1.':B'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$row1.':C'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$row1.':D'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$row1.':E'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$row1.':F'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$row1.':G'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$row1.':H'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('I'.$row1.':I'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('J'.$row1.':J'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('K'.$row1.':K'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('L'.$row1.':L'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('M'.$row1.':M'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('N'.$row1.':N'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('O'.$row1.':O'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('P'.$row1.':P'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('Q'.$row1.':Q'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('R'.$row1.':R'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('S'.$row1.':S'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('T'.$row1.':T'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('U'.$row1.':U'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('V'.$row1.':V'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('W'.$row1.':W'.$row1)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('X'.$row1.':X'.$row1)->applyFromArray($style_col);

         $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('B'.$row1,'TOTAL KERTAS')
            ;

        // TOTAL KERTAS FOTOCOPY
        foreach($get_total as $c){
            if($c->ID_kertas == 58){
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('E'.$row1,number_format($c->TotalkertasperID))
                    ;
            }
        }
        foreach($get_total as $c){
            if($c->ID_kertas == 59){
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('F'.$row1,number_format($c->TotalkertasperID))
                    ;
            }
        }
        foreach($get_total as $c){
            if($c->ID_kertas == 60){
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('G'.$row1,number_format($c->TotalkertasperID))
                    ;
            }
        }
        foreach($get_total as $c){
            if($c->ID_kertas == 61){
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('H'.$row1,number_format($c->TotalkertasperID))
                    ;
            }
        }
        foreach($get_total as $c){
            if($c->ID_kertas == 66){
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('I'.$row1,number_format($c->TotalkertasperID))
                    ;
            }
        }
        foreach($get_total as $c){
            if($c->ID_kertas == 63){
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('J'.$row1,number_format($c->TotalkertasperID))
                    ;
            }
        }
        foreach($get_total as $c){
            if($c->ID_kertas == 62){
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('K'.$row1,number_format($c->TotalkertasperID))
                    ;
            }
        }
        foreach($get_total as $c){
            if($c->ID_kertas == 64){
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('L'.$row1,number_format($c->TotalkertasperID))
                    ;
            }
        }
        foreach($get_total as $c){
            if($c->ID_kertas == 65){
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('M'.$row1,number_format($c->TotalkertasperID))
                    ;
            }
        }

        // TOTAL KERTAS RISOGRAPH/SHEET
        foreach($get_total as $c){
            if($c->ID_kertas == 68){
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('N'.$row1,number_format($c->TotalkertasperID))
                    ;
            }
        }
        foreach($get_total as $c){
            if($c->ID_kertas == 67){
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('O'.$row1,number_format($c->TotalkertasperID))
                    ;
            }
        }
        foreach($get_total as $c){
            if($c->ID_kertas == 69){
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('P'.$row1,number_format($c->TotalkertasperID))
                    ;
            }
        }
        foreach($get_total as $c){
            if($c->ID_kertas == 70){
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('Q'.$row1,number_format($c->TotalkertasperID))
                    ;
            }
        }
        foreach($get_total as $c){
            if($c->ID_kertas == 71){
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('R'.$row1,number_format($c->TotalkertasperID))
                    ;
            }
        }
        foreach($get_total as $c){
            if($c->ID_kertas == 73){
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('S'.$row1,number_format($c->TotalkertasperID))
                    ;
            }
        }
        foreach($get_total as $c){
            if($c->ID_kertas == 72){
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('T'.$row1,number_format($c->TotalkertasperID))
                    ;
            }
        }
        foreach($get_total as $c){
            if($c->ID_kertas == 74){
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('U'.$row1,number_format($c->TotalkertasperID))
                    ;
            }
        }
        foreach($get_total as $c){
            if($c->ID_kertas == 75){
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('V'.$row1,number_format($c->TotalkertasperID))
                    ;
            }
        }
    $row1++;

    $row2=$row1;

        $objPHPExcel->getActiveSheet()->mergeCells('B'.$row2.':D'.$row2);

        $objPHPExcel->getActiveSheet()->getStyle('B'.$row2.':B'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$row2.':C'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$row2.':D'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$row2.':E'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$row2.':F'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$row2.':G'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$row2.':H'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('I'.$row2.':I'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('J'.$row2.':J'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('K'.$row2.':K'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('L'.$row2.':L'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('M'.$row2.':M'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('N'.$row2.':N'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('O'.$row2.':O'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('P'.$row2.':P'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('Q'.$row2.':Q'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('R'.$row2.':R'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('S'.$row2.':S'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('T'.$row2.':T'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('U'.$row2.':U'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('V'.$row2.':V'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('W'.$row2.':W'.$row2)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('X'.$row2.':X'.$row2)->applyFromArray($style_col);

         $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('B'.$row2,'STANDAR HARGA')
            ;

            // HARGA KERTAS FOTOCOPY
            foreach($masterkertas as $d){
                if($d->ID_kertas==58){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('E'.$row2,$d->TotalHargaFotocopy)
                        ;
                }
            }

             foreach($masterkertas as $d){
                if($d->ID_kertas==59){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('F'.$row2,$d->TotalHargaFotocopy)
                        ;
                }
            }
             foreach($masterkertas as $d){
                if($d->ID_kertas==60){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('G'.$row2,$d->TotalHargaFotocopy)
                        ;
                }
            }
             foreach($masterkertas as $d){
                if($d->ID_kertas==61){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('H'.$row2,$d->TotalHargaFotocopy)
                        ;
                }
            }
             foreach($masterkertas as $d){
                if($d->ID_kertas==66){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('I'.$row2,$d->TotalHargaFotocopy)
                        ;
                }
            }
             foreach($masterkertas as $d){
                if($d->ID_kertas==63){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('J'.$row2,$d->TotalHargaFotocopy)
                        ;
                }
            }
             foreach($masterkertas as $d){
                if($d->ID_kertas==62){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('K'.$row2,$d->TotalHargaFotocopy)
                        ;
                }
            }
            foreach($masterkertas as $d){
                if($d->ID_kertas==64 ){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('L'.$row2,$d->TotalHargaFotocopy)
                        ;
                }
            }

             foreach($masterkertas as $d){
                if($d->ID_kertas==65 ){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('M'.$row2,$d->TotalHargaFotocopy)
                        ;
                }
            }


            // HARGA KERTAS RISOGRAPH/SHEET

            foreach($masterkertas as $d){
                if($d->ID_kertas==68 ){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('N'.$row2,$d->TotalHargaFotocopy)
                        ;
                }
            }
            foreach($masterkertas as $d){
                if($d->ID_kertas==67 ){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('O'.$row2,$d->TotalHargaFotocopy)
                        ;
                }
            }
            foreach($masterkertas as $d){
                if($d->ID_kertas==69 ){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('P'.$row2,$d->TotalHargaFotocopy)
                        ;
                }
            }
            foreach($masterkertas as $d){
                if($d->ID_kertas==70 ){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('Q'.$row2,$d->TotalHargaFotocopy)
                        ;
                }
            }
            foreach($masterkertas as $d){
                if($d->ID_kertas==71 ){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('R'.$row2,$d->TotalHargaFotocopy)
                        ;
                }
            }
            foreach($masterkertas as $d){
                if($d->ID_kertas==73 ){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('S'.$row2,$d->TotalHargaFotocopy)
                        ;
                }
            }
            foreach($masterkertas as $d){
                if($d->ID_kertas==72 ){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('T'.$row2,$d->TotalHargaFotocopy)
                        ;
                }
            }
            foreach($masterkertas as $d){
                if($d->ID_kertas==75 ){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('U'.$row2,$d->TotalHargaFotocopy)
                        ;
                }
            }
            foreach($masterkertas as $d){
                if($d->ID_kertas==75 ){
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('V'.$row2,$d->TotalHargaFotocopy)
                        ;
                }
            }
        
    $row2++;


    $row3=$row2;

        $objPHPExcel->getActiveSheet()->mergeCells('B'.$row3.':D'.$row3);
        $objPHPExcel->getActiveSheet()->mergeCells('E'.$row3.':I'.$row3);
        $objPHPExcel->getActiveSheet()->mergeCells('J'.$row3.':M'.$row3);
        $objPHPExcel->getActiveSheet()->mergeCells('N'.$row3.':R'.$row3);
        $objPHPExcel->getActiveSheet()->mergeCells('S'.$row3.':V'.$row3);

        $objPHPExcel->getActiveSheet()->getStyle('B'.$row3.':B'.$row3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$row3.':C'.$row3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$row3.':D'.$row3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$row3.':E'.$row3)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$row3.':F'.$row3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$row3.':G'.$row3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$row3.':H'.$row3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('I'.$row3.':I'.$row3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('J'.$row3.':J'.$row3)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('K'.$row3.':K'.$row3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('L'.$row3.':L'.$row3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('M'.$row3.':M'.$row3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('N'.$row3.':N'.$row3)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('O'.$row3.':O'.$row3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('P'.$row3.':P'.$row3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('Q'.$row3.':Q'.$row3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('R'.$row3.':R'.$row3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('S'.$row3.':S'.$row3)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('T'.$row3.':T'.$row3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('U'.$row3.':U'.$row3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('V'.$row3.':V'.$row3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('W'.$row3.':W'.$row3)->applyFromArray($header4); 
        $objPHPExcel->getActiveSheet()->getStyle('X'.$row3.':X'.$row3)->applyFromArray($style_col);

         $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('B'.$row3,'PERSENTASE')

            ;

            foreach($jmlseluruhkertas as $jml){
                if($jml->Type_kertas == 1){
                     $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('E'.$row3,'Jumlah Kertas  '.number_format($jml->Totalseluruhkertas).'   Lembar')
                        ;
                }
            }

            foreach($persentase as $prsnt){
                    if($prsnt->Type_kertas == 1){
                        $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('J'.$row3, $prsnt->TotalHasil.' %')
                        ;
                    }
                }
            foreach($jmlseluruhkertas as $jml){
                if($jml->Type_kertas == 0){
                     $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('N'.$row3,'Jumlah Kertas   '.number_format($jml->Totalseluruhkertas).'   Lembar')
                        ;
                }
            }
            foreach($persentase as $prsnt){
                if($prsnt->Type_kertas == 0){
                    $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('S'.$row3, $prsnt->TotalHasil.' %')
                    ;
                }
            }

    $row3++;

    $objPHPExcel->getActiveSheet()->mergeCells('W'.$row.':X'.$row2);

    foreach($jumlahtotaluang as $e){
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('W'.$row,number_format($e->JumlahTotalUang))
                    ;
        }

    $count=$row3+1;

        $objPHPExcel->getActiveSheet()->mergeCells('B'.$count.':D'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('E'.$count.':O'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('P'.$count.':X'.$count);

        $objPHPExcel->getActiveSheet()->getStyle('B'.$count.':B'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$count.':C'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$count.':D'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$count.':E'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$count.':F'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$count.':G'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$count.':H'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('I'.$count.':I'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('J'.$count.':J'.$count)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('K'.$count.':K'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('L'.$count.':L'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('M'.$count.':M'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('N'.$count.':N'.$count)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('O'.$count.':O'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('P'.$count.':P'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('Q'.$count.':Q'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('R'.$count.':R'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('S'.$count.':S'.$count)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('T'.$count.':T'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('U'.$count.':U'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('V'.$count.':V'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('W'.$count.':W'.$count)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('X'.$count.':X'.$count)->applyFromArray($style_col);

         $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('B'.$count,'JENIS KERTAS')

            ;
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('E'.$count,'KERTAS HVS')

            ;
         $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('P'.$count,'BURAM')

            ;

    $count++;


    $count=$count;

        $objPHPExcel->getActiveSheet()->mergeCells('B'.$count.':D'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('E'.$count.':F'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('G'.$count.':H'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('I'.$count.':J'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('K'.$count.':L'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('M'.$count.':O'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('P'.$count.':Q'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('R'.$count.':S'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('T'.$count.':U'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('V'.$count.':X'.$count);

        $objPHPExcel->getActiveSheet()->getStyle('B'.$count.':B'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$count.':C'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$count.':D'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$count.':E'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$count.':F'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$count.':G'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$count.':H'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('I'.$count.':I'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('J'.$count.':J'.$count)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('K'.$count.':K'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('L'.$count.':L'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('M'.$count.':M'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('N'.$count.':N'.$count)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('O'.$count.':O'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('P'.$count.':P'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('Q'.$count.':Q'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('R'.$count.':R'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('S'.$count.':S'.$count)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('T'.$count.':T'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('U'.$count.':U'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('V'.$count.':V'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('W'.$count.':W'.$count)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('X'.$count.':X'.$count)->applyFromArray($style_col);

         $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('B'.$count,'UKURAN')

            ;
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('E'.$count,'F4')
            ->setCellValue('G'.$count,'A4')
            ->setCellValue('I'.$count,'B5')
            ->setCellValue('K'.$count,'A3')
            ->setCellValue('M'.$count,'B4')
            ->setCellValue('P'.$count,'F4')
            ->setCellValue('R'.$count,'A4')
            ->setCellValue('T'.$count,'B5')
            ->setCellValue('V'.$count,'B4')
        ;   

    $count++;

    $count=$count;

        $objPHPExcel->getActiveSheet()->mergeCells('B'.$count.':D'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('E'.$count.':F'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('G'.$count.':H'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('I'.$count.':J'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('K'.$count.':L'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('M'.$count.':O'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('P'.$count.':Q'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('R'.$count.':S'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('T'.$count.':U'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('V'.$count.':X'.$count);

        $objPHPExcel->getActiveSheet()->getStyle('B'.$count.':B'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$count.':C'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$count.':D'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$count.':E'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$count.':F'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$count.':G'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$count.':H'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('I'.$count.':I'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('J'.$count.':J'.$count)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('K'.$count.':K'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('L'.$count.':L'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('M'.$count.':M'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('N'.$count.':N'.$count)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('O'.$count.':O'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('P'.$count.':P'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('Q'.$count.':Q'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('R'.$count.':R'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('S'.$count.':S'.$count)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('T'.$count.':T'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('U'.$count.':U'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('V'.$count.':V'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('W'.$count.':W'.$count)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('X'.$count.':X'.$count)->applyFromArray($style_col);

         $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('B'.$count,'JUMLAH (RIM)')
            ;
        foreach($jumlahrim as $rim){
            if($rim->Ukuran == 'F4' && $rim->Jenis_kertas==0){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('E'.$count,round($rim->Jumlahrimperkertas,2))
                ;
            }
        }
        foreach($jumlahrim as $rim){
            if($rim->Ukuran == 'A4' && $rim->Jenis_kertas==0){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('G'.$count,round($rim->Jumlahrimperkertas,2))
                ;
            }
        }
        foreach($jumlahrim as $rim){
            if($rim->Ukuran == 'B5' && $rim->Jenis_kertas==0){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('I'.$count,round($rim->Jumlahrimperkertas,2))
                ;
            }
        }
        foreach($jumlahrim as $rim){
            if($rim->Ukuran == 'A3' && $rim->Jenis_kertas==0){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('K'.$count,round($rim->Jumlahrimperkertas,2))
                ;
            }
        }
        foreach($jumlahrim as $rim){
            if($rim->Ukuran == 'B4' && $rim->Jenis_kertas==0){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('M'.$count,round($rim->Jumlahrimperkertas,2))
                ;
            }
        }
        foreach($jumlahrim as $rim){
            if($rim->Ukuran == 'F4' && $rim->Jenis_kertas==1){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('P'.$count,round($rim->Jumlahrimperkertas,2))
                ;
            }
        }
        foreach($jumlahrim as $rim){
            if($rim->Ukuran == 'A4' && $rim->Jenis_kertas==1){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('R'.$count,round($rim->Jumlahrimperkertas,2))
                ;
            }
        }
        foreach($jumlahrim as $rim){
            if($rim->Ukuran == 'B5' && $rim->Jenis_kertas==1){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('T'.$count,round($rim->Jumlahrimperkertas,2))
                ;
            }
        }
        foreach($jumlahrim as $rim){
            if($rim->Ukuran == 'B4' && $rim->Jenis_kertas==1){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('V'.$count,round($rim->Jumlahrimperkertas,2))
                ;
            }
        }

    $count++;

    $count=$count;

        $objPHPExcel->getActiveSheet()->mergeCells('E'.$count.':X'.$count);
        $objPHPExcel->getActiveSheet()->mergeCells('B'.$count.':D'.$count);
       

        $objPHPExcel->getActiveSheet()->getStyle('B'.$count.':B'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$count.':C'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$count.':D'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$count.':E'.$count)->applyFromArray($Bold);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$count.':F'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$count.':G'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$count.':H'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('I'.$count.':I'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('J'.$count.':J'.$count)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('K'.$count.':K'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('L'.$count.':L'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('M'.$count.':M'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('N'.$count.':N'.$count)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('O'.$count.':O'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('P'.$count.':P'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('Q'.$count.':Q'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('R'.$count.':R'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('S'.$count.':S'.$count)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('T'.$count.':T'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('U'.$count.':U'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('V'.$count.':V'.$count)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('W'.$count.':W'.$count)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('X'.$count.':X'.$count)->applyFromArray($style_col);

         $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('B'.$count,'TOTAL (RIM)')

            ;
        foreach($totalrim as $tr){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('E'.$count,round($tr->JumlahRim,2))
            ;
        }

    $count++;

    $counts=$count+1;

        $objPHPExcel->getActiveSheet()->mergeCells('B'.$counts.':H'.$counts);
        $objPHPExcel->getActiveSheet()->mergeCells('I'.$counts.':P'.$counts);
        $objPHPExcel->getActiveSheet()->mergeCells('Q'.$counts.':X'.$counts);

        $objPHPExcel->getActiveSheet()->getStyle('B'.$counts.':B'.$counts)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$counts.':C'.$counts)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$counts.':D'.$counts)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$counts.':E'.$counts)->applyFromArray($Bold);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$counts.':F'.$counts)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$counts.':G'.$counts)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$counts.':H'.$counts)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('I'.$counts.':I'.$counts)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('J'.$counts.':J'.$counts)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('K'.$counts.':K'.$counts)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('L'.$counts.':L'.$counts)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('M'.$counts.':M'.$counts)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('N'.$counts.':N'.$counts)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('O'.$counts.':O'.$counts)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('P'.$counts.':P'.$counts)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('Q'.$counts.':Q'.$counts)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('R'.$counts.':R'.$counts)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('S'.$counts.':S'.$counts)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('T'.$counts.':T'.$counts)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('U'.$counts.':U'.$counts)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('V'.$counts.':V'.$counts)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('W'.$counts.':W'.$counts)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('X'.$counts.':X'.$counts)->applyFromArray($style_col);

        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('B'.$counts,'OPERATOR')
                ->setCellValue('I'.$counts,'ADM SKT')
                ->setCellValue('Q'.$counts,'KD SKT')

            ;

    $counts++;

    $counts1=$counts;
    $rowheight=70;

    foreach($approve as $app){
        $objPHPExcel->getActiveSheet()->getRowDimension($counts1)->setRowHeight($rowheight);

        $objPHPExcel->getActiveSheet()->mergeCells('B'.$counts1.':H'.$counts1);
        $objPHPExcel->getActiveSheet()->mergeCells('I'.$counts1.':P'.$counts1);
        $objPHPExcel->getActiveSheet()->mergeCells('Q'.$counts1.':X'.$counts1);

        $objPHPExcel->getActiveSheet()->getStyle('B'.$counts1.':B'.$counts1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$counts1.':C'.$counts1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$counts1.':D'.$counts1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$counts1.':E'.$counts1)->applyFromArray($Bold);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$counts1.':F'.$counts1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$counts1.':G'.$counts1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$counts1.':H'.$counts1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('I'.$counts1.':I'.$counts1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('J'.$counts1.':J'.$counts1)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('K'.$counts1.':K'.$counts1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('L'.$counts1.':L'.$counts1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('M'.$counts1.':M'.$counts1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('N'.$counts1.':N'.$counts1)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('O'.$counts1.':O'.$counts1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('P'.$counts1.':P'.$counts1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('Q'.$counts1.':Q'.$counts1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('R'.$counts1.':R'.$counts1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('S'.$counts1.':S'.$counts1)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('T'.$counts1.':T'.$counts1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('U'.$counts1.':U'.$counts1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('V'.$counts1.':V'.$counts1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('W'.$counts1.':W'.$counts1)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('X'.$counts1.':X'.$counts1)->applyFromArray($style_col);

        
        if($app->Approve_status2 == 1){
            $approve2 = "APPROVE";
        }else{
            $approve2 = "";
        }if ($app->Approve_status3 == 1) {
            $approve3 = "APPROVE";
        }else{
            $approve3 = "";
        }
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B'.$counts1,'APPROVE')
                    ->setCellValue('I'.$counts1,' '.$approve3)
                    ->setCellValue('Q'.$counts1,' '.$approve3)
                ;

    $counts1++;


     $counts2=$counts1;
     

        $objPHPExcel->getActiveSheet()->mergeCells('B'.$counts2.':H'.$counts2);
        $objPHPExcel->getActiveSheet()->mergeCells('I'.$counts2.':P'.$counts2);
        $objPHPExcel->getActiveSheet()->mergeCells('Q'.$counts2.':X'.$counts2);

        $objPHPExcel->getActiveSheet()->getStyle('B'.$counts2.':B'.$counts2)->applyFromArray($header3);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$counts2.':C'.$counts2)->applyFromArray($header3);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$counts2.':D'.$counts2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$counts2.':E'.$counts2)->applyFromArray($Bold);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$counts2.':F'.$counts2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$counts2.':G'.$counts2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$counts2.':H'.$counts2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('I'.$counts2.':I'.$counts2)->applyFromArray($header3);
        $objPHPExcel->getActiveSheet()->getStyle('J'.$counts2.':J'.$counts2)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('K'.$counts2.':K'.$counts2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('L'.$counts2.':L'.$counts2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('M'.$counts2.':M'.$counts2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('N'.$counts2.':N'.$counts2)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('O'.$counts2.':O'.$counts2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('P'.$counts2.':P'.$counts2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('Q'.$counts2.':Q'.$counts2)->applyFromArray($header3);
        $objPHPExcel->getActiveSheet()->getStyle('R'.$counts2.':R'.$counts2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('S'.$counts2.':S'.$counts2)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('T'.$counts2.':T'.$counts2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('U'.$counts2.':U'.$counts2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('V'.$counts2.':V'.$counts2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('W'.$counts2.':W'.$counts2)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('X'.$counts2.':X'.$counts2)->applyFromArray($style_col);

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B'.$counts2,'Nama    :'.'  '.'ZULKIFLI B')
                    ->setCellValue('I'.$counts2,'Nama    :'.'  '.$app->Approve_by2)
                    ->setCellValue('Q'.$counts2,'Nama    :'.'  '.$app->Approve_by3)
            ;

    $counts2++;

    $counts3=$counts2;

        $objPHPExcel->getActiveSheet()->mergeCells('B'.$counts3.':H'.$counts3);
        $objPHPExcel->getActiveSheet()->mergeCells('I'.$counts3.':P'.$counts3);
        $objPHPExcel->getActiveSheet()->mergeCells('Q'.$counts3.':X'.$counts3);

        $objPHPExcel->getActiveSheet()->getStyle('B'.$counts3.':B'.$counts3)->applyFromArray($header3);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$counts3.':C'.$counts3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$counts3.':D'.$counts3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$counts3.':E'.$counts3)->applyFromArray($Bold);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$counts3.':F'.$counts3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$counts3.':G'.$counts3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$counts3.':H'.$counts3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('I'.$counts3.':I'.$counts3)->applyFromArray($header3);
        $objPHPExcel->getActiveSheet()->getStyle('J'.$counts3.':J'.$counts3)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('K'.$counts3.':K'.$counts3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('L'.$counts3.':L'.$counts3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('M'.$counts3.':M'.$counts3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('N'.$counts3.':N'.$counts3)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('O'.$counts3.':O'.$counts3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('P'.$counts3.':P'.$counts3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('Q'.$counts3.':Q'.$counts3)->applyFromArray($header3);
        $objPHPExcel->getActiveSheet()->getStyle('R'.$counts3.':R'.$counts3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('S'.$counts3.':S'.$counts3)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('T'.$counts3.':T'.$counts3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('U'.$counts3.':U'.$counts3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('V'.$counts3.':V'.$counts3)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('W'.$counts3.':W'.$counts3)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('X'.$counts3.':X'.$counts3)->applyFromArray($style_col);

         $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B'.$counts3,'Jabatan  :'.' '.'OPERATOR')
                    ->setCellValue('I'.$counts3,'Jabatan  :'.' '.'ADM SKT')
                    ->setCellValue('Q'.$counts3,'Jabatan  :'.' '.'KD SKT')
            ;

    $counts3++;
    $counts4=$counts3;

        $objPHPExcel->getActiveSheet()->mergeCells('B'.$counts4.':H'.$counts4);
        $objPHPExcel->getActiveSheet()->mergeCells('I'.$counts4.':P'.$counts4);
        $objPHPExcel->getActiveSheet()->mergeCells('Q'.$counts4.':X'.$counts4);

        $objPHPExcel->getActiveSheet()->getStyle('B'.$counts4.':B'.$counts4)->applyFromArray($header3);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$counts4.':C'.$counts4)->applyFromArray($header3);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$counts4.':D'.$counts4)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$counts4.':E'.$counts4)->applyFromArray($Bold);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$counts4.':F'.$counts4)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$counts4.':G'.$counts4)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$counts4.':H'.$counts4)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('I'.$counts4.':I'.$counts4)->applyFromArray($header3);
        $objPHPExcel->getActiveSheet()->getStyle('J'.$counts4.':J'.$counts4)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('K'.$counts4.':K'.$counts4)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('L'.$counts4.':L'.$counts4)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('M'.$counts4.':M'.$counts4)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('N'.$counts4.':N'.$counts4)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('O'.$counts4.':O'.$counts4)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('P'.$counts4.':P'.$counts4)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('Q'.$counts4.':Q'.$counts4)->applyFromArray($header3);
        $objPHPExcel->getActiveSheet()->getStyle('R'.$counts4.':R'.$counts4)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('S'.$counts4.':S'.$counts4)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('T'.$counts4.':T'.$counts4)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('U'.$counts4.':U'.$counts4)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('V'.$counts4.':V'.$counts4)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('W'.$counts4.':W'.$counts4)->applyFromArray($header4);
        $objPHPExcel->getActiveSheet()->getStyle('X'.$counts4.':X'.$counts4)->applyFromArray($style_col);

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B'.$counts4,'Tanggal  :'.'  '.date('d-m-Y'))
                    ->setCellValue('I'.$counts4,'Tanggal  :'.'  '.date('d-m-Y',strtotime($app->Approve_date2)))
                    ->setCellValue('Q'.$counts4,'Tanggal  :'.'  '.date('d-m-Y',strtotime($app->Approve_date)))
                ;

    $counts4++;

}
    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setName('logoptrsup');
    $objDrawing->setDescription('logoptrsup');
    $objDrawing->setPath('assets/layouts/layout3/img/logopt.png');
    $objDrawing->setCoordinates('B2');                      
    //setOffsetX works properly
    $objDrawing->setOffsetX(40); 
    $objDrawing->setOffsetY(3);                
    //set width, height
    $objDrawing->setWidth(80); 
    $objDrawing->setHeight(70); 
    $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());


    $objPHPExcel->getActiveSheet()->setTitle('Simple');
        header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
        header('Chace-Control: no-store, no-cache, must-revalation');
        header('Chace-Control: post-check=0, pre-check=0', FALSE);
        header('Pragma: no-cache');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan Rekap Pemakain Fotocopy atau Risograph().xlsx"');        
        // Save Excel 2007 file
        //  " Write to Excel2007 format\n";
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save('php://output');
?>