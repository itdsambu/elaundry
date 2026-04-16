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

$top = array(  
    'font'      => array('bold' => FALSE,
                         'name' => 'Times New Roman',
                         'size' => '11'
                        ), // Set font nya jadi bold  
    'alignment' => array('vertical' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'wrap' =>true, // Set text jadi ditengah secara horizontal (center)    
    'vertical'  => PHPExcel_Style_Alignment::VERTICAL_TOP // Set text jadi di tengah secara vertical (middle)
 ),
// 'borders' => array(    
//     'left'   => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis   
//     'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis    
//     'bottom'=> array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis    
//     'top'  => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis  
//     )
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
 $BoldItalic= array(
        'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT ),// Set text jadi di tengah secara horizontal (middle)  ), 
        'font'=> array('bold'=> true,'name' => 'Times New Roman','size' => '12','italic'=> true)
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
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(13);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(16);
    // $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(9);
    // $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(9);
    // $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
    // $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(24);
    // $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(9);
    // $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
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
    // $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true); 
    $objPHPExcel->getActiveSheet()->getRowDimension('H')->setRowHeight(-1); 

//PENGATURAN MERGE CELL          
    // HEADER
    $objPHPExcel->getActiveSheet()->mergeCells('C2:H2');
    $objPHPExcel->getActiveSheet()->mergeCells('C3:H4');
    $objPHPExcel->getActiveSheet()->mergeCells('B2:B4');
    // $objPHPExcel->getActiveSheet()->mergeCells('F6:F7');
    // $objPHPExcel->getActiveSheet()->mergeCells('G6:G7');
    // $objPHPExcel->getActiveSheet()->mergeCells('U2:V2');
    // $objPHPExcel->getActiveSheet()->mergeCells('U3:V3');
    // $objPHPExcel->getActiveSheet()->mergeCells('U4:V4');
    // $objPHPExcel->getActiveSheet()->mergeCells('B5:W5');


// GARIS 
    $objPHPExcel->getActiveSheet()->getStyle('B2:J4')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('B2:B4')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('C2:I2')->applyFromArray($Bold);
    $objPHPExcel->getActiveSheet()->getStyle('C3:I4')->applyFromArray($Bold);
    $objPHPExcel->getActiveSheet()->getStyle('J2:J2')->applyFromArray($header3);
    $objPHPExcel->getActiveSheet()->getStyle('J3:J3')->applyFromArray($header3);
    $objPHPExcel->getActiveSheet()->getStyle('J4:J4')->applyFromArray($header3);
    $objPHPExcel->getActiveSheet()->getStyle('I2:I2')->applyFromArray($header3);
    $objPHPExcel->getActiveSheet()->getStyle('I3:I3')->applyFromArray($header3);
    $objPHPExcel->getActiveSheet()->getStyle('I4:I4')->applyFromArray($header3);


    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('C2','PT. Riau Sakti United Plantations')
                ->setCellValue('C3','LAPORAN PENANGGUNG JAWABAN PERJALANAN DINAS')

                ->setCellValue('I2','Dept')
                ->setCellValue('I3','Tanggal')
                ->setCellValue('I4','')
            ;
    $no=1;
    foreach($getDataNotaHdr as $hdr){
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J2',': SKT');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J3',': '.date('d-m-Y', strtotime($hdr->TanggalNota)));
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J4',': ');
    }
 
    $objPHPExcel->getActiveSheet()->mergeCells('C6:E6');
    $objPHPExcel->getActiveSheet()->mergeCells('C8:E8');
    $objPHPExcel->getActiveSheet()->mergeCells('C10:E10');
    $objPHPExcel->getActiveSheet()->mergeCells('H8:J8');
    $objPHPExcel->getActiveSheet()->mergeCells('H10:J10');

   
    $objPHPExcel->getActiveSheet()->getStyle('H6')->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->getStyle('B6')->applyFromArray($top);
    $objPHPExcel->getActiveSheet()->getStyle('C6')->applyFromArray($top);
    $objPHPExcel->getActiveSheet()->getStyle('G6')->applyFromArray($top);
    $objPHPExcel->getActiveSheet()->getStyle('B6')->applyFromArray($top);


    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('B6','Tanggal Nota')
                ->setCellValue('B8','No LPPT')
                ->setCellValue('B10','Nama Operator')
                ->setCellValue('G6','Keperluan')
                ->setCellValue('G8','Speedboat')
                ->setCellValue('G10','Rute')
            ;

    foreach($getDataNotaHdr as $hdr){
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C6',': '.date('d-m-Y', strtotime($hdr->TanggalNota)));
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C8',': '.$hdr->NoLppt);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C10',': '.$hdr->Nama_sopir);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H6',': '.$hdr->Keperluan);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H8',': '.$hdr->Nama_speedboad);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H10',': '.$hdr->Rute);
    }

    //Tabel 1
    $objPHPExcel->getActiveSheet()->mergeCells('B13:B14');
    $objPHPExcel->getActiveSheet()->mergeCells('C13:I13');
    $objPHPExcel->getActiveSheet()->mergeCells('C14:G14');
    $objPHPExcel->getActiveSheet()->mergeCells('H14:I14');
    $objPHPExcel->getActiveSheet()->mergeCells('J13:J14');

    //Garis Header Tabel 1
    $objPHPExcel->getActiveSheet()->getStyle('B13:J14')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('B13:B14')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('C13:I13')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('C14:G14')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('H14:I14')->applyFromArray($style_col);
    $objPHPExcel->getActiveSheet()->getStyle('J13:J14')->applyFromArray($style_col);


     $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('B13','No')
                ->setCellValue('C13','Tanggal')
                ->setCellValue('C14','Tanggal Berangkat')
                ->setCellValue('H14','Tanggal kembali')
                ->setCellValue('J13','Jam')
            ;

    $row=15;
                $no=1;
            
                foreach($getDetailPerjalanan as $prj){

                    $objPHPExcel->getActiveSheet()->mergeCells('C'.$row.':G'.$row);
                    $objPHPExcel->getActiveSheet()->mergeCells('H'.$row.':I'.$row);

                $objPHPExcel->getActiveSheet()->getStyle('B'.$row.':B'.$row)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('C'.$row.':G'.$row)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('H'.$row.':I'.$row)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('J'.$row.':J'.$row)->applyFromArray($style_col);

                
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$row,$no++);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$row,date('d-m-Y', strtotime($prj->Tgl_berangkat)));
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$row,date('d-m-Y', strtotime($prj->Tgl_kembali)));
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$row,date('H:i:s', strtotime($prj->Jam)));
                

             $row++;
         }

         $row1 = $row+1;


        // //Tabel 2
        $objPHPExcel->getActiveSheet()->mergeCells('C'.$row1.':F'.$row1);
        // $objPHPExcel->getActiveSheet()->mergeCells('G'.$row1.':H'.$row1);
        // $objPHPExcel->getActiveSheet()->mergeCells('I'.$row1.':J'.$row1);
        // $objPHPExcel->getActiveSheet()->mergeCells('K'.$row1.':L'.$row1);

        //Garis Header Tabel 2
        $objPHPExcel->getActiveSheet()->getStyle('B'.$row1.':J'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('B'.$row1.':B'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$row1.':F'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$row1.':G'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$row1.':H'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('I'.$row1.':I'.$row1)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('J'.$row1.':J'.$row1)->applyFromArray($style_col);


        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B'.$row1,'No')
                    ->setCellValue('C'.$row1,'Keterangan')
                    ->setCellValue('G'.$row1,'Volume')
                    ->setCellValue('H'.$row1,'Satuan')
                    ->setCellValue('I'.$row1,'Harga (Rp)')
                    ->setCellValue('J'.$row1,'Total (Rp)')
                ;
        
        $row1++;

    $count = $row1;

        $no=1;

       foreach($getDataNotaDtl as $dtl){

                    $objPHPExcel->getActiveSheet()->mergeCells('C'.$count.':F'.$count);
                    // $objPHPExcel->getActiveSheet()->mergeCells('G'.$count.':H'.$count);
                    // $objPHPExcel->getActiveSheet()->mergeCells('I'.$count.':J'.$count);
                    // $objPHPExcel->getActiveSheet()->mergeCells('K'.$count.':L'.$count);
                    // $objPHPExcel->getActiveSheet()->mergeCells('G'.$count.':H'.$count);

                $objPHPExcel->getActiveSheet()->getStyle('B'.$count.':J'.$count)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('B'.$count.':B'.$count)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('C'.$count.':F'.$count)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('G'.$count.':G'.$count)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('H'.$count.':H'.$count)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('I'.$count.':I'.$count)->applyFromArray($header4)->getNumberFormat()->setFormatCode('#,##0');
                $objPHPExcel->getActiveSheet()->getStyle('J'.$count.':J'.$count)->applyFromArray($header4)->getNumberFormat()->setFormatCode('#,##0');

                
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$count,$no++);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$count,$dtl->Keterangan);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$count,$dtl->Volume);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$count,$dtl->Nama);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$count,$dtl->Harga);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$count,$dtl->Total);
                

             $count++;
         }

         $count2 = $count++;

         foreach($getTotalNota as $gt){

            // $objPHPExcel->getActiveSheet()->mergeCells('K'.$count2.':L'.$count2);

            $objPHPExcel->getActiveSheet()->getStyle('I'.$count2.':I'.$count2)->applyFromArray($style_col);
            $objPHPExcel->getActiveSheet()->getStyle('J'.$count2.':J'.$count2)->applyFromArray($header4)->getNumberFormat()->setFormatCode('#,##0');

            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$count2,'Grand Total');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$count2,$gt->Jumlah);

         $count2++;
     }

         $row2 = $count2+1;


        // //Tabel 3
        $objPHPExcel->getActiveSheet()->mergeCells('C'.$row2.':G'.$row2);
        $objPHPExcel->getActiveSheet()->mergeCells('H'.$row2.':J'.$row2);

        //Garis Header Tabel 3
        $objPHPExcel->getActiveSheet()->getStyle('B'.$row2.':J'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$row2.':G'.$row2)->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$row2.':J'.$row2)->applyFromArray($style_col);
        // $objPHPExcel->getActiveSheet()->getStyle('K'.$row2.':M'.$row2)->applyFromArray($style_col);


        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B'.$row2,'No')
                    ->setCellValue('C'.$row2,'Beban')
                    ->setCellValue('H'.$row2,'Jumlah Beban (Rp)')
                ;
        
        $row2++;

        $count3 = $row2;

        $no=1;

       foreach($getDataBeban as $bbn){

                    $objPHPExcel->getActiveSheet()->mergeCells('C'.$count3.':G'.$count3);
                    $objPHPExcel->getActiveSheet()->mergeCells('H'.$count3.':J'.$count3);

                $objPHPExcel->getActiveSheet()->getStyle('B'.$count3.':J'.$count3)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('C'.$count3.':G'.$count3)->applyFromArray($style_col);
                $objPHPExcel->getActiveSheet()->getStyle('H'.$count3.':J'.$count3)->applyFromArray($header4)->getNumberFormat()->setFormatCode('#,##0');
                // $objPHPExcel->getActiveSheet()->getStyle('M'.$count3.':M'.$count3)->applyFromArray($style_col);

                
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$count3,$no++);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$count3,$bbn->Beban);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$count3,$bbn->TotalBeban);
                

             $count3++;
         }

         $row3 = $count3+2;

         $objPHPExcel->getActiveSheet()->mergeCells('B'.$row3.':J'.$row3);
         $objPHPExcel->getActiveSheet()->getStyle('B'.$row3)->applyFromArray($BoldItalic);

         foreach($getDataApprove as $app){
            if($app->Approve1 == 1 && $app->Approve2 == 1) {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B'.$row3,'>Dokumen ini telah disetujui secara elektronik. Tanda Tangan Tidak Diperlukan');
                }else{
                    $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B'.$row3,'Dokumen ini BELUM DISETUJUI');
                }
        
        $row3++;
    }

    $row4 = $row3+2;

     $objPHPExcel->getActiveSheet()->getStyle('B2'.':J'.$row4)->applyFromArray($Border);

    $row4;

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
        header('Content-Disposition: attachment;filename="Laporan Pertanggung Jawaban Perjalanan Dinas.xlsx"');        
        // Save Excel 2007 file
        //  " Write to Excel2007 format\n";
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save('php://output');
?>