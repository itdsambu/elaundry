<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Pembelian/updateData') ?>"  enctype="multipart/form-data">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-file-text"></i>
                            <span class="caption-subject bold uppercase">Edit Transaksi Pembelian</span>
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
                                <?php foreach($getDataHdr as $hdr){?>
                                  <input type="hidden" name="txtHeaderid" id="headerid" class="form-control" value="<?php echo $hdr->HeaderID?>">
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">No Ref </label>
                                      <div class="col-lg-4">
                                          <input type="text" name="txtNoRef" id="noref" class="form-control" readonly="" value="<?php echo $hdr->No_ref?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Suplier</label>
                                      <div class="col-lg-4">
                                          <select class="form-control select2" name="txtSuplier" id="suplier" onchange="callAjax()">
                                              <option>-- Pilih --</option>
                                              <?php foreach($getDataSuplier as $sp){
                                                  if($hdr->SuplierID == $sp->suplierID){?>
                                                      <option value="<?php echo $sp->suplierID?>" selected><?php echo $sp->nama_suplier?></option>
                                              <?php }}?>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Tanggal</label>
                                      <div class="col-lg-4">
                                          <input type="date" name="txtTanggal" id="tanggal" class="form-control" value="<?php echo date('Y-m-d',strtotime($hdr->Tgl_transaksi))?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Kategori</label>
                                      <div class="col-lg-4">
                                           <select name="txtKategori" id="kategori" class="form-control" >
                                              <option value="">--Pilih--</option>
                                          <?php if($hdr->Kategori == 1){ ?>
                                              <option value="1" selected="">Barang Dapur</option>
                                          <?php }?>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Upload Nota</label>
                                      <div class="col-lg-4">
                                          <input type="file" name="txtUploadNota" id="uploadnota" class="form-control">
                                      </div>
                                      <a onclick="view(this.id)" id="<?php echo $hdr->Keterangan.'-'.date('d-m-Y',strtotime($hdr->Tgl_transaksi))?>" class="btn blue btn-outline"><i class="fa fa-search"></i></a>
                                  </div>
                              <?php }?>
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
                                  <a class="btn yellow btn-sm" onclick="tambah_item()">
                                    <i class="fa fa-plus"></i>
                                    Tambah Item
                                  </a>
                                </div>
                                <br>
                                <br>
                                <div class="col-lg-12">
                                    <table class="table table-bordered table-hover" id="dataTable">
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
                                          <?php foreach($getDataDtl as $dtl){?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="txtdetailid[]" class="form-control" value="<?php echo $dtl->DetailID?>">
                                                      <input type="hidden" name="txtSuplierID[]" id="suplierid1" class="form-control" value="<?php echo $dtl->SuplierID?>">
                                                    <input type="hidden" name="txtKategoriID[]" id="kategoriID" class="form-control" value="<?php echo $dtl->KategoriID?>">
                                                      <a id="hapus1" class="btn red btn-sm" onclick="hapus_baris(this)"><i class="fa fa-trash"></i>
                                                        </a>
                                                </td>
                                                <td>
                                                    <select class="form-control" id="namaitem1" name="txtnamaitem[]" onchange="ajaxItem(this.id)">
                                                        <option value="">--Pilih--</option>
                                                        <?php foreach($getDataItem as $itm){
                                                          if($dtl->ItemID == $itm->itemID){?>
                                                            <option value="<?php echo $itm->itemID?>" selected><?php echo $itm->nama_item?></option>
                                                        <?php } }?>
                                                    </select>
                                                </td>
                                                <td id="idItem1">
                                                    <input type="text" name="txtharga[]" id="harga" class="form-control" value="<?php echo $dtl->Harga?>" onkeyup="hitung(1)">
                                                </td>
                                                <td>
                                                    <input type="text" name="txtquantity[]" id="quantity" class="form-control" placeholder="Input Quantity" value="<?php echo $dtl->Quantity?>" onkeyup="hitung(1)">
                                                </td>
                                                <td>
                                                    <input type="hidden" name="txtSatuan[]" id="satuan1" class="form-control" readonly="" value="<?php echo $dtl->satuanID?>">
                                                    <input type="text" name="txtSatuanid[]" id="satuanid1" class="form-control" readonly="" value="<?php echo $dtl->abbr?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="txttotal[]" id="total" class="form-control" placeholder="Total (auto)" readonly="" value="<?php echo $dtl->Total?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="txtketerangan[]" id="keterangan" class="form-control" value="" placeholder="Input Keterangan">
                                                </td>
                                            </tr>
                                          <?php }?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <td class="text-right" colspan="5">Grand Total</td>
                                              <td class="text-right" colspan="2">
                                                  <input type="text" name="txtgrandtotal" id="grandtotal" class="form-control" readonly placeholder="Grand Total (auto)">
                                              </td>
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
                                  <div class="col-lg-12" id="idPerbandingan">
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
                                        <?php foreach($getDataHdr as $ket){?>
                                          <textarea class="form-control" name="txtCatatan" id="catatan" placeholder="Input Catatan"><?php echo $ket->Keterangan?></textarea>
                                        <?php }?>
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
    function ajaxItem(id){
        var idBaris=id.substr(8);
        var jmlBaris= document.getElementsByClassName('txt').length;
        var idItem  = $('#'+id).val();
        var suplierid = $('#suplierid1').val();
       
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('Pembelian/ajaxDataItem')?>"+"/"+idItem+"/"+suplierid+"/"+id,
            success: function(msg){
                if(msg == ''){
                  alert('Tidak ada data');
                } 
                else{      
                    $("#harga"+idBaris).val(msg);
                }
            }
        });

         $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('Pembelian/ajaxSatuan')?>"+"/"+idItem+"/"+suplierid+"/"+id,
            success: function(msg){
                if(msg == ''){
                  alert('Tidak ada data');
                } 
                else{      
                    $("#satuanid"+idBaris).val(msg);
                }
            }
        });

        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('Pembelian/ajaxSatuanid')?>"+"/"+idItem+"/"+suplierid+"/"+id,
            success: function(msg){
                if(msg == ''){
                  alert('Tidak ada data');
                } 
                else{      
                    $("#satuan"+idBaris).val(msg);
                }
            }
        });

        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('Pembelian/ajaxPerbandinganHarga')?>"+"/"+idItem,
            success: function(msg){
                if(msg == ''){
                  alert('Tidak ada data');
                } 
                else{
                    $("#idPerbandingan").html(msg);                                                     
                }
            }
        });        
    }
</script>
<script type="text/javascript">
  function hapus_baris(ip){
      var tr = ip.parentNode.parentNode;
      tr.parentNode.removeChild(tr);
      hitung();
}
</script>
<script type="text/javascript">

    window.onload = function(){
        hitungidharga();
        hitung();
    }

  function hitungidharga(){
    var jml = document.getElementsByName("txtharga[]").length;
    for(i = 1; i <= jml; i++){
      document.getElementById('harga').id = "harga"+i;
      document.getElementById('quantity').id = "quantity"+i;
      document.getElementById('total').id = "total"+i;
    }
  }


  function tambah_item(){
      // alert(1);
    var jml = document.getElementsByName("txtharga[]").length;
    var l = jml+1;

    for (var i = l; i <= l; i++) {
        $('table[id="dataTable"]').append('<tbody id="dataTable1">\n\
          <tr>\n\
            <td class="text-center">\n\
            <input type="hidden" name="txtdetailid[]" class="form-control">\n\
            <input type="hidden" name="txtSuplierID[]" id="suplierid'+l+'" class="form-control" value="<?php foreach($getDataHdr as $dtl){echo $dtl->SuplierID; }?>">\n\
            <a id="hapus'+l+'" class="btn red btn-sm" onclick="hapus_baris(this)"><i class="fa fa-trash"></i>\n\
              </a>\n\
            </td>\n\
            <td class="text-center" >\n\
                <select id="namaitem'+l+'" name="txtnamaitem[]" class="form-control txt" onchange="ajaxItem(this.id)">\n\
                <option>--Pilih--</option>\n\
                 <?php foreach($getDataItem as $itm){ ?>
                      <option value="<?php echo $itm->itemID?>"><?php echo $itm->nama_item?></option>\n\
                  <?php } ?>
                </select>\n\
            </td>\n\
            <td class="text-center" id="idItem'+l+'">\n\
               <input type="text" class="form-control" id="harga'+l+'" name="txtharga[]" onkeyup="hitung('+l+')" placeholder="Input Harga"/>\n\
            </td>\n\
            <td class="text-center">\n\
                 <input type="text" name="txtquantity[]" id="quantity'+l+'" class="form-control" onkeyup="hitung('+l+')" placeholder="Input Quantity">\n\
              </td>\n\
             <td class="text-center">\n\
                <input type="hidden" name="txtSatuan[]" id="satuan'+l+'" class="form-control" readonly="">\n\
                <input type="text" name="txtSatuanid[]" id="satuanid'+l+'" class="form-control" readonly="">\n\
            </td>\n\
            <td class="text-center">\n\
               <input type="text" name="txttotal[]" id="total'+l+'" class="form-control" placeholder="Total (auto)" readonly/>\n\
            </td>\n\
            <td>\n\
                <input class="form-control" name="txtketerangan[]" id="keterangan" placeholder="Input Keterangan" placeholder="Input Keterangan">\n\
            </td>\n\
        </tr>\n\
    </tbody>');
    }
  }

  function hitung(){
    var jmlitem = document.getElementsByName("txtharga[]").length;
    // alert(jmlitem);
    var hasil = 0;
    for(i = 1; i <= jmlitem; i++){
      var harga    = $('#harga'+i).val();
      var quantity = $('#quantity'+i).val();

      // alert(harga);
      // alert(quantity);
      if(quantity != null){
        document.getElementById("total"+i).value = Math.ceil(harga * quantity);
      }else{
        continue;
      }

      var grand = $('#total'+i).val();
      hasil = Math.ceil(Number(hasil) + Number(grand));
      document.getElementById("grandtotal").value = hasil;
    }
  }
</script>

