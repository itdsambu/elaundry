<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase">MONITORING REKAP FOTOCOPY :</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="post" action="#">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Bulan</label>
                                        <div class="col-lg-3">
                                            <select id="bulan" class="form-control select2" >
                                                <option value="">--Pilih--</option>
                                                <option value="01">JANUARI</option>
                                                <option value="02">FEBUARI</option>
                                                <option value="03">MARET</option>
                                                <option value="04">APRIL</option>
                                                <option value="05">MEI</option>
                                                <option value="06">JUNI</option>
                                                <option value="07">JULI</option>
                                                <option value="08">AGUSTUS</option>
                                                <option value="09">SEPTEMBER</option>
                                                <option value="10">OKTOBER</option>
                                                <option value="11">NOVEMBER</option>
                                                <option value="12">DESEMBER</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Tahun</label>
                                        <div class="col-lg-3">
                                            <select id="tahun" class="form-control select2" >
                                                 <?php for($i=date('Y')-1;$i<=(date('Y')+2);$i++){
                                                    if($i==date('Y')){ ?>
                                                    <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                                                    <?php }else{ ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <a class="btn green" onclick="callAjax()">Refresh</a>
                                    <a class="btn default" href="javascript:history.back()">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div id="tbllist">
                    <table class="table table-bordered table-hover table-striped" width="100%" >
                       <thead>
                        <tr>
                            <th rowspan="3" width="10%" ><img src="<?php echo base_url();?>assets\layouts\layout3\img\logopt.png"></th>
                            <th colspan="10" width="60%" class="text-center"><h5><strong>PT. RIAU SAKTI UNITED PLANTATIONS</strong></h5></th>
                            <th colspan="2" width="20%" scope="col" >Nomor &nbsp;&nbsp;&nbsp;: 1 Dari 1</th> 
                            <input type="hidden" value=""  name="txtdepartment[]">
                        </tr>
                        <tr>
                           
                            <th rowspan="2" colspan="10" width="60%" scope="col" style="text-align: center;"><pre><h5><b>LAPORAN REKAP BULANAN PEMAKAIAN FOTOCOPY DAN RISOGRAPH / SHEET <br><br> PT. RIAU SAKTI UNITED PLANTATIONS</b></h5><h5><strong></strong></h5></pre></th>
                            <th colspan="2" width="20%" scope="col" >Bulan &nbsp;&nbsp;&nbsp;&nbsp;: </th>
                        </tr> 
                        <tr>
                            
                            <th  colspan="13">Tahun &nbsp;&nbsp;&nbsp;: </th>
                            
                        </tr>
                    </table>
                    <table class="table table-bordered table-hover table-striped" border="1">
                        <thead>
                            <tr class="bordered" >
                                <td rowspan="3" clospan="1" width="3%" class="text-center"><br><br><strong>NO</strong></td>
                                <td rowspan="3" clospan="1" width="5%" class="text-center"><br><br><strong>DIV</strong></td>
                                <td rowspan="3" clospan="1" width="5%" class="text-center"><br><br><strong>DEPT / BAG</strong></td>
                                <td rowspan="1" colspan="9" width="20%" class="text-center"><strong>Fotocopy</strong></td>
                                <td rowspan="1" colspan="9" width="20%" class="text-center"><strong>Risograph/Sheet</strong></td>
                                <td rowspan="3" clospan="1" width="5%" class="text-center"><br><br><strong>TOTAL<br>(RP)</strong></td>
                                <td rowspan="3" clospan="1" width="5%" class="text-center"><font color="#006c12"><br><br>%</font></td>
                            </tr>
                            <tr class="bordered">
                                <td rowspan="1" colspan="5" class="text-center"><strong>Kertas HVS/Fotocopy</strong></td>
                                <td rowspan="1" colspan="4" class="text-center"><strong>BURAM</strong></td>
                                <td rowspan="1" colspan="5" class="text-center"><strong>Kertas HVS/Fotocopy</strong></td>
                                <td rowspan="1" colspan="4" class="text-center"><strong>BURAM</strong></td>
                            </tr>
                            <tr class="bordered">
                               <td rowspan="1" colspan="1" class="text-center"><strong>F4</strong></td>
                               <td rowspan="1" colspan="1" class="text-center"><strong>A4</strong></td>
                               <td rowspan="1" colspan="1" class="text-center"><strong>B5</strong></td>
                               <td rowspan="1" colspan="1" class="text-center"><strong>A3</strong></td>
                               <td rowspan="1" colspan="1" class="text-center"><strong>B4</strong></td>
                               <td rowspan="1" colspan="1" class="text-center"><strong>F4</strong></td>
                               <td rowspan="1" colspan="1" class="text-center"><strong>A4</strong></td>
                               <td rowspan="1" colspan="1" class="text-center"><strong>B5</strong></td>
                               <td rowspan="1" colspan="1" class="text-center"><strong>B4</strong></td>
                                                    <!--RISOGRAPH/SHEET -->
                               <td rowspan="1" colspan="1" class="text-center"><strong>F4</strong></td>
                               <td rowspan="1" colspan="1" class="text-center"><strong>A4</strong></td>
                               <td rowspan="1" colspan="1" class="text-center"><strong>B5</strong></td>
                               <td rowspan="1" colspan="1" class="text-center"><strong>A3</strong></td>
                               <td rowspan="1" colspan="1" class="text-center"><strong>B4</strong></td>
                               <td rowspan="1" colspan="1" class="text-center"><strong>F4</strong></td>
                               <td rowspan="1" colspan="1" class="text-center"><strong>A4</strong></td>
                               <td rowspan="1" colspan="1" class="text-center"><strong>B5</strong></td>
                               <td rowspan="1" colspan="1" class="text-center"><strong>B4</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no=1;
                            ?>
                           <tr height="30">
                                <td class="text-center">
                                    <?php echo $no++?>
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                    
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-right">
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-center" style="background-color: #62d3dd"><strong>TOTAL KERTAS</strong></td>
                                <td class="text-center" style="background-color: #62d3dd">
                                   
                                </td>
                                <td class="text-center" style="background-color: #62d3dd">
                                  
                                </td>
                                <td class="text-center" style="background-color: #62d3dd">
                                    
                                </td>
                                <td class="text-center" style="background-color: #62d3dd">
                                    
                                </td>
                                <td class="text-center" style="background-color: #62d3dd">
                                    
                                </td>
                                <td class="text-center" style="background-color: #62d3dd">
                                    
                                </td>
                                <td class="text-center" style="background-color: #62d3dd">
                                    
                                </td>
                                <td class="text-center" style="background-color: #62d3dd">
                                    
                                </td>
                                <td class="text-center" style="background-color: #62d3dd">
                                    
                                </td>
                                <td class="text-center" style="background-color: #62d3dd">
                                    
                                </td>
                                <td class="text-center" style="background-color: #62d3dd">
                                    
                                </td>
                                <td class="text-center" style="background-color: #62d3dd">
                                    
                                </td>
                                <td class="text-center" style="background-color: #62d3dd">
                                   
                                </td>
                                <td class="text-center" style="background-color: #62d3dd">
                                    
                                </td>
                                <td class="text-center" style="background-color: #62d3dd">
                                    
                                </td>
                                <td class="text-center" style="background-color: #62d3dd">
                                    
                                <td class="text-center" style="background-color: #62d3dd">
                                    
                                </td>
                                <td class="text-center" style="background-color: #62d3dd">
                                   
                                </td>
                                <td colspan="2" rowspan="2" class="text-right" style="background-color: #32C5D2"> <br><h4 style="color: #ffffff"><strong>RP.
                                    
                                    
                                </strong></h4></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-center" style="background-color: #d3f3f5"><strong>STANDAR HARGA</strong></td>
                                <td class="text-center" style="background-color: #d3f3f5">
                                     
                                </td>
                                <td class="text-center" style="background-color: #d3f3f5">
                                    
                                </td>
                                <td class="text-center" style="background-color: #d3f3f5">
                                    
                                </td>
                                <td class="text-center" style="background-color: #d3f3f5">
                                
                                </td>
                                <td class="text-center" style="background-color: #d3f3f5">
                                     
                                </td>
                                <td class="text-center" style="background-color: #d3f3f5">
                                    
                                </td>
                                <td class="text-center" style="background-color: #d3f3f5">
                                   
                                </td>
                                <td class="text-center" style="background-color: #d3f3f5">
                                    
                                </td>
                                <td class="text-center" style="background-color: #d3f3f5">
                                    
                                </td>
                                <td class="text-center" style="background-color: #d3f3f5">
                                   
                                </td>
                                <td class="text-center" style="background-color: #d3f3f5">
                                    
                                </td>
                                <td class="text-center" style="background-color: #d3f3f5">
                                    
                                </td>
                                <td class="text-center" style="background-color: #d3f3f5">
                                    
                                </td>
                                <td class="text-center" style="background-color: #d3f3f5">
                                    
                                </td>
                                <td class="text-center" style="background-color: #d3f3f5">
                                   
                                </td>
                                <td class="text-center" style="background-color: #d3f3f5">
                                    
                                </td>
                                <td class="text-center" style="background-color: #d3f3f5">
                                    
                                </td>
                                <td class="text-center" style="background-color: #d3f3f5">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-center" ><strong>PERSENTASE</strong></td>
                                <td colspan="5" class="text-left" >Jumlah Kertas : 
                                     <strong>Lembar</strong>
                                </td>
                                <td colspan="4" class="text-right" >
                                   
                                 %</td>
                                <td colspan="5" class="text-left" >Jumlah Kertas :  <strong>Lembar</strong>
                                    
                                </td>
                                <td colspan="4" class="text-right">
                                     
                                 %</td>
                                <td colspan="2" class="text-right"><strong>100 %</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered table-hover table-striped" border="1">
                        <thead>
                            <tr style="background-color: #32c5d2">
                                <td rowspan="1" class="text-center" width="15%"><strong><font color="#034a70">JENIS KERTAS</font></strong></td>
                                <td rowspan="1" colspan="5" class="text-center"><strong><font color="#034a70">Kertas HVS</font></strong></td>
                                <td rowspan="1" colspan="4" class="text-center"><strong><font color="#034a70">BURAM</font></strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="1" class="text-center">UKURAN</td>
                                <td rowspan="1" colspan="1" class="text-center"><strong>F4</strong></td>
                                <td rowspan="1" colspan="1" class="text-center"><strong>A4</strong></td>
                                <td rowspan="1" colspan="1" class="text-center"><strong>B5</strong></td>
                                <td rowspan="1" colspan="1" class="text-center"><strong>A3</strong></td>
                                <td rowspan="1" colspan="1" class="text-center"><strong>B4</strong></td>
                                <td rowspan="1" colspan="1" class="text-center"><strong>F4</strong></td>
                                <td rowspan="1" colspan="1" class="text-center"><strong>A4</strong></td>
                                <td rowspan="1" colspan="1" class="text-center"><strong>B5</strong></td>
                                <td rowspan="1" colspan="1" class="text-center"><strong>B4</strong></td>
                                
                            </tr>
                            <tr>
                                <td rowspan="1" class="text-center">JUMLAH (RIM)</td>
                                <td rowspan="1" colspan="1" class="text-center">
                                    
                                </td>
                                <td rowspan="1" colspan="1" class="text-center">
                                    
                                </td>
                                <td rowspan="1" colspan="1" class="text-center">
                                    
                                </td>
                                <td rowspan="1" colspan="1" class="text-center">
                                    
                                </td>
                                <td rowspan="1" colspan="1" class="text-center">
                                    
                                </td>
                                <td rowspan="1" colspan="1" class="text-center">
                                    
                                </td>
                                <td rowspan="1" colspan="1" class="text-center">
                                   
                                </td>
                                <td rowspan="1" colspan="1" class="text-center">
                                   
                                </td>
                                <td rowspan="1" colspan="1" class="text-center">
                                   
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="1" class="text-center">TOTAL (RIM)</td>
                                <td rowspan="1" colspan="9" class="text-center">
                                   <h4 style="color: red"><strong>
                                       
                                   </strong></h4>
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered table-hover table-striped" >
                        <thead>
                            <tr>
                                <th class="text-center" width="30%">OPERATOR</th>
                                <th class="text-center" width="30%">KASI SKT</th>
                                <th class="text-center" width="30%">KD. SKT </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr height="100">    
                                <td class="text-center"  width="200" style="vertical-align: middle; text-align: center;">
                                    <h3>
                                        <strong>
                                        </strong>
                                    </h3>
                                </td>
                                <td class="text-center" width="200" style="vertical-align: middle; text-align: center;">
                                    <h3>
                                        <strong>
                                           
                                    </h3>
                                </td>
                                <td class="text-center" width="200" style="vertical-align: middle; text-align: center;">
                                    <h3>
                                        <strong>
                                             
                                        </strong>
                                    </h3>
                                </td>
                            </tr> 
                            <tr>    
                                <td><p>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  <strong></strong> <br>Jabatan &nbsp;&nbsp; :&nbsp;OPERATOR <br>Tanggal &nbsp;&nbsp; : </p> </td>
                                <td><p>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  <strong></strong> <br>Jabatan &nbsp;&nbsp; :&nbsp;KASI SKT  <br>Tanggal &nbsp;&nbsp; :  </p></td>
                                <td><p>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  <strong></strong> <br>Jabatan &nbsp;&nbsp; :&nbsp;KD.SKT<br>Tanggal &nbsp;&nbsp; : </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>

<script type="text/javascript">
    function callAjax(){
        var bulan           = $("#bulan").val();
        var tahun           = $("#tahun").val();
        
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('Monitoringrekapfotocopy/ajaxmonitoring')?>",
            data: "bulan="+bulan+"&tahun="+tahun,
                    
            success: function(msg){
                if(msg == ''){
                  alert('Tidak ada data');
                } 
                else{
                    $("#tbllist").html(msg);                                                     
                }
            }
        });    
    };
</script>
<script type="text/javascript">
    $(function () {
        $(".select2").select2();
    });
 </script>
