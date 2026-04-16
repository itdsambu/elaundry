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
 $Border= array(
        'borders' => array(    
            'top'   => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis   
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis    
            'bottom'=> array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis    
            'left'  => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis  
            )
        );

 //PENGATURAN LEBAR
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(18);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(12);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(24);
    // $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(9);
    // $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(9);
    // $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(9);
    // $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(24);
    // $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(9);
    // $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(9);
    // $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(9);
    // $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(9);
    // $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(9);
    // $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(15);
    // $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(9);
    // $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(24);
//PENGATURAN TINGGI
    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
    $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(20); 
    $objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(20); 

//PENGATURAN MERGE CELL          
    // HEADER
    $objPHPExcel->getActiveSheet()->mergeCells('C2:K2');
    $objPHPExcel->getActiveSheet()->mergeCells('C3:K4');
    $objPHPExcel->getActiveSheet()->mergeCells('B2:B4');
    // $objPHPExcel->getActiveSheet()->mergeCells('F6:F7');
    // $objPHPExcel->getActiveSheet()->mergeCells('G6:G7');
    // $objPHPExcel->getActiveSheet()->mergeCells('U2:V2');
    // $objPHPExcel->getActiveSheet()->mergeCells('U3:V3');
    // $objPHPExcel->getActiveSheet()->mergeCells('U4:V4');
    // $objPHPExcel->getActiveSheet()->mergeCells('B5:W5');


// GARIS 
    $objPHPExcel->getActiveSheet()->getStyle('B2:M4')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('B2:B4')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('C2:K2')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('C3:K4')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('L2:L2')->applyFromArray($header3);
    $objPHPExcel->getActiveSheet()->getStyle('L3:L3')->applyFromArray($header3);
    $objPHPExcel->getActiveSheet()->getStyle('L4:L4')->applyFromArray($header3);
    $objPHPExcel->getActiveSheet()->getStyle('M2:M2')->applyFromArray($header3);
    $objPHPExcel->getActiveSheet()->getStyle('M3:M3')->applyFromArray($header3);
    $objPHPExcel->getActiveSheet()->getStyle('M4:M4')->applyFromArray($header3);


    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('C2','PT. RSUP-INDUSTRY PULAU BURUNG')
                ->setCellValue('C3','LAPORAN REKAP BELANJA DAPUR MESS MANAGER')

                ->setCellValue('L2','Halaman')
                ->setCellValue('L3','Tanggal')
                ->setCellValue('L4','Periode')
            ;
    $no=1;
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('M2',': '.$no++.' Dari '.'1')
                ->setCellValue('M3',': '.$tglAwal.'/'.$tglAkhir)
                ->setCellValue('M4',': '.$periode)
        ;
 
    //HEADER 2
    // $objPHPExcel->getActiveSheet()->mergeCells('B5:M5');
    $objPHPExcel->getActiveSheet()->mergeCells('C6:E6');
    // $objPHPExcel->getActiveSheet()->mergeCells('M6:N6');
    // $objPHPExcel->getActiveSheet()->mergeCells('O6:P6');

    //GARIS HEADER TABEL 1
    $objPHPExcel->getActiveSheet()->getStyle('B5:M5')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('B6:M6')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('B6:B6')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('C6:E6')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('F6:F6')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('G6:G6')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('H6:H6')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('I6:I6')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('J6:J6')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('K6:K6')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('L6:L6')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('M6:M6')->applyFromArray($style_col);

     $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('B6','TANGGAL')
                ->setCellValue('C6','Uraian Item')
                ->setCellValue('F6','QTY')
                ->setCellValue('G6','Satuan')
                ->setCellValue('H6','Harga')
                ->setCellValue('I6','Dapur')
                ->setCellValue('J6','Snack/ Premi')
                ->setCellValue('K6','Inv.Mess/ Dapur')
                ->setCellValue('L6','Perawatan Mess')
                ->setCellValue('M6','Keterangan')
            ;

    $row=7;
                $no=1;

                foreach($getData as $data_row){

                $objPHPExcel->getActiveSheet()->mergeCells('C'.$row.':E'.$row);
                // $objPHPExcel->getActiveSheet()->mergeCells('I'.$row.':J'.$row);
                // $objPHPExcel->getActiveSheet()->mergeCells('K'.$row.':L'.$row);
                // $objPHPExcel->getActiveSheet()->mergeCells('M'.$row.':N'.$row);
                // $objPHPExcel->getActiveSheet()->mergeCells('O'.$row.':P'.$row);
            
                $objPHPExcel->getActiveSheet()->getStyle('B'.$row.':B'.$row)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('C'.$row.':E'.$row)->applyFromArray($header3);
                $objPHPExcel->getActiveSheet()->getStyle('F'.$row.':F'.$row)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('G'.$row.':G'.$row)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('H'.$row.':H'.$row)->applyFromArray($header4);
                $objPHPExcel->getActiveSheet()->getStyle('I'.$row.':I'.$row)->applyFromArray($header4);
                $objPHPExcel->getActiveSheet()->getStyle('J'.$row.':J'.$row)->applyFromArray($header4);
                $objPHPExcel->getActiveSheet()->getStyle('K'.$row.':K'.$row)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('L'.$row.':L'.$row)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('M'.$row.':M'.$row)->applyFromArray($style_col);

                // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$row,$no++);
                // 
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$row,$data_row->Tgl_transaksi);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$row,ucfirst($data_row->nama_item));
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$row,$data_row->Quantity);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$row,$data_row->abbr);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$row,number_format($data_row->Harga,2,',','.'));
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$row,number_format($data_row->Total,2,',','.'));
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$row);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$row);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$row);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$row,$data_row->Keterangan);
                
             $row++;
            }
        $row1=$row++;
                    foreach($getDataTotal as $gt){

                    $objPHPExcel->getActiveSheet()->mergeCells('B'.$row1.':H'.$row1);

                $objPHPExcel->getActiveSheet()->getStyle('I'.$row1.':I'.$row1)->applyFromArray($Bold);
                $objPHPExcel->getActiveSheet()->getStyle('J'.$row1.':J'.$row1)->applyFromArray($header4);
                $objPHPExcel->getActiveSheet()->getStyle('K'.$row1.':K'.$row1)->applyFromArray($header4);
                $objPHPExcel->getActiveSheet()->getStyle('L'.$row1.':L'.$row1)->applyFromArray($header4);
                $objPHPExcel->getActiveSheet()->getStyle('B'.$row1.':H'.$row1)->applyFromArray($Bold);
                $objPHPExcel->getActiveSheet()->getStyle('M'.$row1.':M'.$row1)->applyFromArray($style_col);

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$row1,'GRAND TOTAL');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$row1,number_format($gt->GrandTotal,2,',','.'));

            $row1++;
        }

        $row2=$row1+2;

                $objPHPExcel->getActiveSheet()->mergeCells('F'.$row2.':H'.$row2);
                $objPHPExcel->getActiveSheet()->mergeCells('I'.$row2.':K'.$row2);
                $objPHPExcel->getActiveSheet()->mergeCells('L'.$row2.':M'.$row2);

                $objPHPExcel->getActiveSheet()->getStyle('F'.$row2.':H'.$row2)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('I'.$row2.':K'.$row2)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('L'.$row2.':M'.$row2)->applyFromArray($style_col);

                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('F'.$row2,'Dilaporkan oleh,')
                            ->setCellValue('I'.$row2,'Diketahui oleh,')
                            ->setCellValue('L'.$row2,'Disetujui oleh,');
                ;
        $row2++;
        $rowheight=70;

                $objPHPExcel->getActiveSheet()->getRowDimension($row2)->setRowHeight($rowheight);

                $objPHPExcel->getActiveSheet()->mergeCells('F'.$row2.':H'.$row2);
                $objPHPExcel->getActiveSheet()->mergeCells('I'.$row2.':K'.$row2);
                $objPHPExcel->getActiveSheet()->mergeCells('L'.$row2.':M'.$row2);

                $objPHPExcel->getActiveSheet()->getStyle('F'.$row2.':H'.$row2)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('I'.$row2.':K'.$row2)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('L'.$row2.':M'.$row2)->applyFromArray($style_col);

                // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F');
                // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I');
                // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L');
        $row2++;

                // $objPHPExcel->getActiveSheet()->mergeCells('J'.$row2.':L'.$row2);
                // $objPHPExcel->getActiveSheet()->mergeCells('M'.$row2.':O'.$row2);
                // $objPHPExcel->getActiveSheet()->mergeCells('P'.$row2.':Q'.$row2);

                $objPHPExcel->getActiveSheet()->getStyle('F'.$row2.':H'.$row2)->applyFromArray($header3);
                $objPHPExcel->getActiveSheet()->getStyle('I'.$row2.':K'.$row2)->applyFromArray($header3);
                $objPHPExcel->getActiveSheet()->getStyle('L'.$row2.':M'.$row2)->applyFromArray($header3);
                // $objPHPExcel->getActiveSheet()->getStyle('K'.$row2.':L'.$row2)->applyFromArray($header3);
                // $objPHPExcel->getActiveSheet()->getStyle('N'.$row2.':O'.$row2)->applyFromArray($header3);
                // $objPHPExcel->getActiveSheet()->getStyle('Q'.$row2.':Q'.$row2)->applyFromArray($header3);

                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('F'.$row2,'Nama ')
                            ->setCellValue('I'.$row2,'Nama ')
                            ->setCellValue('L'.$row2,'Nama ');
                ;

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$row2,': ');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$row2,': ');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$row2,': ');
        $row2++;

                // $objPHPExcel->getActiveSheet()->mergeCells('F'.$row2.':H'.$row2);
                // $objPHPExcel->getActiveSheet()->mergeCells('I'.$row2.':K'.$row2);
                // $objPHPExcel->getActiveSheet()->mergeCells('L'.$row2.':M'.$row2);

                $objPHPExcel->getActiveSheet()->getStyle('F'.$row2.':H'.$row2)->applyFromArray($header3);
                $objPHPExcel->getActiveSheet()->getStyle('I'.$row2.':K'.$row2)->applyFromArray($header3);
                $objPHPExcel->getActiveSheet()->getStyle('L'.$row2.':M'.$row2)->applyFromArray($header3);

                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('F'.$row2,'Jabatan ')
                            ->setCellValue('I'.$row2,'Jabatan ')
                            ->setCellValue('L'.$row2,'Jabatan ');
                ;

                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('G'.$row2,': Operator')
                            ->setCellValue('J'.$row2,': KD SKT')
                            ->setCellValue('M'.$row2,': VGM');
                ;
        $row2++;

                // $objPHPExcel->getActiveSheet()->mergeCells('J'.$row2.':L'.$row2);
                // $objPHPExcel->getActiveSheet()->mergeCells('M'.$row2.':O'.$row2);
                // $objPHPExcel->getActiveSheet()->mergeCells('P'.$row2.':Q'.$row2);

                $objPHPExcel->getActiveSheet()->getStyle('F'.$row2.':H'.$row2)->applyFromArray($header3);
                $objPHPExcel->getActiveSheet()->getStyle('I'.$row2.':K'.$row2)->applyFromArray($header3);
                $objPHPExcel->getActiveSheet()->getStyle('L'.$row2.':M'.$row2)->applyFromArray($header3);

                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('F'.$row2,'Tanggal ')
                            ->setCellValue('I'.$row2,'Tanggal ')
                            ->setCellValue('L'.$row2,'Tanggal ');
                ;

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$row2,': ');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$row2,': ');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$row2,': ');
        $row2++;
    
        $row3 = $row2+1;

     $objPHPExcel->getActiveSheet()->getStyle('B2'.':M'.$row3)->applyFromArray($Border);

    $row3++;


    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setName('logopt');
    $objDrawing->setDescription('logopt');
    $objDrawing->setPath('assets/layouts/layout3/img/logopt.png');
    $objDrawing->setCoordinates('B2');                      
    //setOffsetX works properly
    $objDrawing->setOffsetX(5); 
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
        header('Content-Type: application/vnd-ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Rekap Belanja Dapur Perperiode.xlsx"');        
        // Save Excel 2007 file
        //  " Write to Excel2007 format\n";
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save('php://output');
?>