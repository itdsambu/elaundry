<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase">REKAP TRANSAKSI BELANJA DAPUR MESS MANAGER :</span>
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
                                        <label class="col-lg-2 control-label">Cari Berdasarkan</label>
                                        <div class="col-lg-4">
                                           <select class="form-control" id="cari" name="txtCari" onchange="cariAjax()">
                                               <option value="">--Pilih--</option>
                                               <option value="1">Periode</option>
                                               <option value="2">Rekap Suplier</option>
                                           </select>
                                        </div>
                                    </div>
                                    <div id="ajaxData">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Tgl Awal : </label>
                                            <div class="col-lg-4">
                                                <input type="date" name="txtTanggalAwal" id="tanggalAwal" class="form-control" value="<?php echo date('Y-m-d')?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Tgl Akhir : </label>
                                            <div class="col-lg-4">
                                                <input type="date" name="txtTanggalAkhir" id="tanggalAkhir" class="form-control" value="<?php echo date('Y-m-d')?>">
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <label class="col-lg-2 control-label"></label>
                                            <div class="col-lg-4">
                                                <a class="btn btn-sm green-meadow">
                                                    <i class="fa fa-search"></i>
                                                    Search
                                                </a>
                                                <a href="<?php echo base_url('MonitoringRekapPembelian/rekapTransaksi')?>" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-refresh"></i>
                                                    Refresh
                                                </a>
                                            </div>
                                        </div>
                                    </div>
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
                    <table class="table table-bordered table-hover table-striped" width="100%">
                        <thead>
                            <tr>
                                <th rowspan="2" width="70" height="50">
                                    <img src="<?php echo base_url();?>assets\layouts\layout3\img\logopt.png">
                                </th>
                                <th colspan="8" style="text-align: center;">PT . Riau Sakti United Plantations<br></th>
                                <th>Nomor : 1 Dari 1</th>
                            </tr>
                            <tr>
                               <th class="text-center" colspan="8">LAPORAN TRANSAKSI PEMBELIAN BARANG DAPUR / PERAWATAN MESS<br><br></th>
                               <th>Kategori : <br><br></th>
                            </tr>
                            <tr>
                                <th colspan="10">Tanggal : </th>
                            </tr> 
                        </thead>
                    </table>
                    <table class="table table-bordered table-hover table-striped" border="1">
                        <thead>
                            <tr style="background-color: #36D7B7;">
                                <th class="text-center">No</th>
                                <th class="text-center">NO REF</th>
                                <th class="text-center">Uraian</th>
                                <th colspan="2" class="text-center">QTY</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Dapur</th>
                                <th class="text-center">Snack</th>
                                <th class="text-center">Inv.Mess/ Dpr</th>
                                <th class="text-center">Perawatan Mess</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Upload File</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="height: 50px;">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="height: 50px;">
                                <td colspan="2" class="text-center" style="background-color: #62d3dd"><strong>TOTAL</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered table-hover table-striped" border="1">
                        <thead>
                            <tr>
                                <th class="text-center">Di Buat Oleh</th>
                                <th class="text-center">Di Cek Oleh</th>
                                <th class="text-center">Di Setujui Oleh</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="height: 100px;">
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Nama &nbsp;&nbsp;&nbsp;:</td>
                                <td>Nama &nbsp;&nbsp;&nbsp;:</td>
                                <td>Nama &nbsp;&nbsp;&nbsp;:</td>
                            </tr>
                            <tr>
                                <td>Jabatan : OPERATOR</td>
                                <td>Jabatan : KABAG/WAKABAG</td>
                                <td>Jabatan : VGM</td>
                            </tr>
                            <tr>
                                <td>Tanggal :</td>
                                <td>Tanggal :</td>
                                <td>Tanggal :</td>
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
    function cariAjax(){
        var cari   = $("#cari").val();
        
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('RekapPembayaran/ajaxCariTransaksi')?>"+"/"+cari,
            success: function(msg){
                if(msg == ''){
                  alert('Tidak ada data');
                } 
                else{
                    $("#ajaxData").html(msg);                                                     
                }
            }
        });    
    };
</script>