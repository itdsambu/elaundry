<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase">MONITORING PEMBEBANAN BIAYA SPEEDBOAT :</span>
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
                                        <label class="col-lg-2 control-label">Tanggal Awal</label>
                                        <div class="col-lg-3">
                                            <input type="date" name="txtTanggalAwal" id="tanggalawal" class="form-control" value="<?php echo date('d-m-Y')?>">
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                       $(document).ready(function () {
                                          $('#tanggalawal').datepicker({
                                              format: "dd-mm-yyyy",
                                              autoclose: true
                                          });
                                      });
                                    </script>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Tanggal Akhir</label>
                                        <div class="col-lg-3">
                                            <input type="date" name="txtTanggalAkhir" id="tanggalAkhir" class="form-control" value="<?php echo date('d-m-Y')?>">
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                       $(document).ready(function () {
                                          $('#tanggalAkhir').datepicker({
                                              format: "dd-mm-yyyy",
                                              autoclose: true
                                          });
                                      });
                                    </script>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Speedboat</label>
                                        <div class="col-lg-3">
                                            <select class="form-control" name="txtSpeedboat" id="speedboat">
                                                <option>--Pilih--</option>
                                                <?php foreach($getDataSpeedboat as $spd){?>
                                                <option value="<?php echo $spd->ID_speedboad?>"><?php echo $spd->Nama_speedboad?> <?php echo $spd->Kapasitas ?>pk</option>
                                                <?php }?>
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
                            <th rowspan="2" style="width: 50px;">
                                <img src="<?php echo base_url();?>assets\layouts\layout3\img\logopt.png">
                            </th>
                            <th colspan="10" class="text-center">
                                <p>PT RIAU SAKTI UNITED PLANTATIONS</p>
                            </th>
                            <th>
                               <div class="form-group">
                                   <label class="col-lg-1 control-label">Dept </label>
                                   <label class="col-lg-3 control-label">:</label>
                               </div> 
                            </th>
                        </tr>
                        <tr>
                            <th colspan="10" class="text-center">
                                <p>LAPORAN PENANGGUNG JAWABAN PERJALANAN DINAS</p>
                            </th>
                            <th>
                               <div class="form-group">
                                   <label class="col-lg-1 control-label">Tgl</label>
                                   <label class="col-lg-3 control-label">:</label>
                               </div> 
                            </th>
                        </tr>
                       </thead>
                    </table>
                    <div class="form-group">   
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr bgcolor="#dbdbdb">
                                    <th class="text-center">No</th>
                                    <th class="text-center">No Lppt</th>
                                    <th class="text-center">Tanggal Nota</th>
                                    <th class="text-center">Speedboat</th>
                                    <th class="text-center">Route</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 50px">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>

<script type="text/javascript">
    function callAjax(){
        var tglAwal   = $("#tanggalawal").val();
        var tglAkhir  = $("#tanggalAkhir").val();
        var speedid   = $("#speedboat").val();
        
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('MonitorNotaPerjalananDinas/ajaxPencarian')?>"+"/"+tglAwal+"/"+tglAkhir+"/"+speedid,
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