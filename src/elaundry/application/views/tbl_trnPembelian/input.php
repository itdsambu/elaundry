<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Pembelian/simpanData') ?>">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-file-text"></i>
                            <span class="caption-subject bold uppercase">Tambah Transaksi Pembelian</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                            <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-body">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">No Ref</label>
                                  <div class="col-lg-4">
                                      <input type="text" name="txtNoRef" id="noref" class="form-control" readonly="" value="<?php echo $hitungNoRef.'/RSUP-IND'.'/'.date('d-M-Y');?>">
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Suplier</label>
                                    <div class="col-lg-4">
                                        <select class="form-control select2" name="txtSuplier" id="suplier" onchange="callAjax()" required="">
                                            <option>-- Pilih --</option>
                                            <?php foreach($getDataSuplier as $sp){?>
                                                <option value="<?php echo $sp->suplierID?>"><?php echo $sp->nama_suplier?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Tanggal</label>
                                    <div class="col-lg-4">
                                        <input type="date" name="txtTanggal" id="tanggal" class="form-control" value="<?php echo date('Y-m-d')?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Kategori</label>
                                    <div class="col-lg-4">
                                       <select name="txtKategori" id="kategori" class="form-control" required>
                                            <option value="1">Barang Dapur</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Upload Nota</label>
                                        <div class="col-lg-4">
                                            <input type="file" name="txtUploadNota" id="uploadnota" class="form-control">
                                        </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="idNoref">
                  <div class="portlet light bordered">
                      <div class="portlet-title">
                          <div class="caption font-dark">
                              <i class="fa fa-list"></i>
                              <span class="caption-subject bold uppercase"> Item</span>
                          </div>
                          <div class="tools">
                              <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                              <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                              <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                          </div>
                      </div>
                      <div class="portlet-body">
                          <div class="form-body">
                              <div class="row">
                                <div class="col-lg-12">
                                  <a class="btn yellow btn-sm">
                                    <i class="fa fa-plus"></i>
                                    Tambah Item
                                  </a>
                                </div>
                                <br>
                                <br>
                                <div class="col-lg-12">
                                    <table class="table table-bordered table-hover" id="dataTable2">
                                        <thead>
                                          <tr>
                                            <th class="text-center" rowspan="2">
                                                <a id="hapus" class="btn btn-md"><i class="fa fa-trash"></i>
                                            </div>
                                            <th class="text-center">Nama Item</th>
                                            <th class="text-center">Harga (Rp.)</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Satuan</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Keterangan</th>
                                          </tr>
                                       </thead>
                                        <tbody id="">
                                            <tr>
                                              <td class="text-center">
                                                  <input type="hidden" name="txtdetailid[]">
                                                  <a style="color:#fff" id="hapus" class="btn red btn-sm" ><i class="fa fa-trash"></i></a>
                                              </td>
                                              <div>
                                              <td id="idNoref">
                                                  <select class="form-control" name="txtNamaItem[]" id="namaitem">
                                                      <option>-- Pilih --</option>
                                                              
                                                  </select>
                                              </td>
                                              <td id="idHarga">
                                                  <input type="hidden" name="txtDtlHarga" id="dtlharga" class="form-control">
                                                  <input type="text" name="txtHarga[]" id="harga" class="form-control">
                                              </td>
                                              <td>
                                                 <input type="text" name="txtQuantity[]" id="quantity" class="form-control">
                                              </td>
                                              <td>
                                                 <input type="hidden" name="txtSatuan[]" id="satuan" class="form-control" readonly="">
                                                 <input type="text" name="txtSatuanid[]" id="satuanid" class="form-control" readonly="">
                                              </td>
                                              <td>
                                                 <input type="text" name="txtTotal[]" id="total" class="form-control"> 
                                              </td>
                                              <td>
                                                  <input class="form-control" name="txtKeterangan[]" id="keterangan" placeholder="Input Keterangan">
                                              </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5" style="text-align: right;">Grand Total</td>
                                                <td colspan="2"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- END EXAMPLE TABLE PORTLET-->
                  <div class="portlet light bordered">
                      <div class="portlet-title">
                          <div class="caption font-dark">
                              <i class="fa fa-list"></i>
                              <span class="caption-subject bold uppercase"> Perbandingan Harga</span>
                          </div>
                          <div class="tools">
                              <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                              <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                              <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                          </div>
                      </div>
                      <div class="portlet-body">
                          <div class="form-body">
                              <div class="row">
                                  <div class="col-lg-12">
                                      <table class="table table-bordered table-hover" id="dataTable">
                                          <thead>
                                            <tr>
                                              <th>Nama Item</th>
                                              <th>Nama Suplier</th>
                                              <th>Satuan</th>
                                              <th>Harga (Rp.)</th>
                                            </tr>
                                         </thead>
                                          <tbody id="">
                                            <tr>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                            </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="portlet light bordered">
                      <div class="portlet-title">
                          <div class="caption font-dark">
                              <i class="fa fa-list"></i>
                              <span class="caption-subject bold uppercase">Catatan</span>
                          </div>
                          <div class="tools">
                              <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                              <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                              <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                          </div>
                      </div>
                      <div class="portlet-body">
                          <div class="form-body">
                              <div class="row">
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      <label class="control-label"></label>
                                      <div class="col-lg-12">
                                        <textarea class="form-control" name="txtCatatan" id="catatan" placeholder="Input Catatan"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-12">
                                      <div class="form-actions">
                                          <div class="row">
                                              <div class="col-lg-1 col-lg-5">
                                                  <button class="btn green">Submit</button> 
                                                  <a class="btn default" href="javascript:history.back()">Kembali</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $(".select2").select2();
    });
</script>
<script type="text/javascript">
    function callAjax(){
        var idsuplier  = $("#suplier").val();
       
        // alert(idsuplier);
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('Pembelian/ajaxSuplier')?>"+"/"+idsuplier,
            success: function(msg){
                if(msg == ''){
                  alert('Tidak ada data');
                } 
                else{
                    $("#idNoref").html(msg);                                                     
                }
            }
        });
    };
</script>

