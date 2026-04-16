<div class="page-container">
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light">
                            <div class="portlet-body">
                                <div class="scroller" style="height:auto;" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd">
                                    <div class="col-md-12">
                                        <legend>Update Transaksi</legend>
                                        <form class="form-horizontal" action="<?php echo base_url('Pembelian/updateData')?>" method="post" enctype="multipart/form-data">
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
                                                    <?php if($hdr->Kategori == 1){?>
                                                       <div class="mt-radio-inline">
                                                            <label class="mt-radio">
                                                                <input type="radio" name="txtKategori" id="kategori" value="1" checked> Barang Dapur
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="txtKategori" id="kategori" value="0"> Perawatan
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    <?php }else{?>
                                                        <label class="mt-radio">
                                                                <input type="radio" name="txtKategori" id="kategori" value="1"> Barang Dapur
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="txtKategori" id="kategori" value="0" checked> Perawatan
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Upload Nota</label>
                                                <div class="col-lg-4">
                                                    <input type="file" name="txtUploadNota" id="uploadnota" class="form-control" value="<?php echo $hdr->Link_upload?>">
                                                </div>
                                                <a onclick="view(this.id)" id="<?php echo $hdr->Keterangan.'-'.date('d-m-Y',strtotime($hdr->Tgl_transaksi))?>" class="btn blue btn-outline"><i class="fa fa-search"></i></a>
                                            </div>
                                        <?php }?>
                                          <div id="idNoref">
                                              <div class="col-sm-10">
                                                  <a class="btn yellow btn-sm" onclick="tambah()">
                                                    <i class="fa fa-plus"></i>
                                                    Tambah Item
                                                  </a>
                                              </div>
                                              </br>
                                              </br>
                                            <div>
                                              <table class="table table-bordered table-hover" id="dataTable">
                                                <thead style="background-color: #004b71; color: #cceeff;">
                                                   <tr>
                                                        <th class="text-center" rowspan="2">
                                                            <a id="hapus" class="btn btn-md"><i class="fa fa-trash"></i>
                                                            </a>
                                                        </th>
                                                        <th class="text-center">Nama Item</th>
                                                        <th class="text-center">Harga (Rp.)</th>
                                                        <th class="text-center">Quantity</th>
                                                        <th class="text-center">Satuan</th>
                                                        <th class="text-center">Total</th>
                                                        <th class="text-center">Keterangan</th>
                                                   </tr>
                                                </thead>
                                                <tbody id="dataTable1">
                                                    <?php foreach($getDataDtl as $dtl){?>
                                                    <tr>
                                                        <td>
                                                            <input type="hidden" name="txtdetailid[]" class="form-control" value="<?php echo $dtl->DetailID?>">
                                                              <input type="hidden" name="txtSuplierID[]" id="suplierid1" class="form-control" value="<?php echo $dtl->SuplierID?>">
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
                                                            <input type="text" name="txtharga" id="harga" class="form-control" value="<?php echo $dtl->Harga?>" onkeyup="hitung(1)">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="txtquantity[]" id="quantity" class="form-control" placeholder="Input Quantity" value="<?php echo $dtl->Quantity?>" onkeyup="hitung(1)">
                                                        </td>
                                                        <td>
                                                            <select type="text" name="txtsatuan[]" id="satuan" class="form-control">
                                                                <option value="">--Pilih--</option>
                                                                <?php foreach($getMstSatuan as $stn){
                                                                if($dtl->SatuanID == $stn->satuanID){?>
                                                                <option value="<?php echo $stn->satuanID?>" selected><?php echo $stn->abbr?></option>
                                                              <?php } }?>
                                                            </select>
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
                                          <div class="form-group">
                                            <br>
                                              <hr>
                                              <div id="idPerbandingan">
                                                  <i class="fa fa-th-list"></i>
                                                  <strong>PERBANDINGAN HARGA</strong>
                                                  <br>
                                                  <br>
                                                  <table class="table table-bordered table-hover">
                                                    <thead class="bg-green-dark bg-font-green-dark">
                                                        <tr>
                                                          <th class="text-center">Nama Item</th>
                                                          <th class="text-center">Nama Suplier</th>
                                                          <th class="text-center">Satuan</th>
                                                          <th class="text-center">Harga (Rp.)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                              </div>
                                              <br>
                                              <div class="row">
                                                <div class="col-lg-12">
                                                    <i class="fa fa-edit"></i>
                                                    <strong>CATATAN</strong>
                                                    <br>
                                                    <br>
                                                    <?php foreach($getDataHdr as $ket){?>
                                                        <textarea class="form-control" name="txtCatatan" id="catatan" placeholder="Input Catatan"><?php echo $ket->Keterangan?></textarea>
                                                    <?php }?>
                                                </div>
                                              </div>
                                                <div class="form-group well">
                                                  <label class="col-lg-1 control-label"></label>
                                                    <button type='submit' class="btn green-meadow" name="simpan" value="Submit">
                                                      Submit
                                                    </button>
                                                    <a href="javascript:history.back()" class="btn btn-default">
                                                      <i class="fa fa-angle-double-left"></i>
                                                    Kembali
                                                    </a>
                                                </div>
                                          </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
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
  window.onload = hitungidharga();

  function hitungidharga(){
    var jml = document.getElementsByName("txtharga").length;
    for(i = 1; i <= jml; i++){
      document.getElementById('harga').id = "harga"+i;
      document.getElementById('quantity').id = "quantity"+i;
      document.getElementById('total').id = "total"+i;
    }
  }


  function tambah(){
      // alert(1);
    var jml = document.getElementsByName("txtharga").length;
    var l = jml+1;

    for (var i = l; i <= l; i++) {
        $('table[id="dataTable"]').append('<tbody id="dataTable1">\n\
          <tr>\n\
            <td class="text-center">\n\
            <input type="hidden" name="txtdetailid[]" class="form-control">\n\
            <input type="hidden" name="txtSuplierID[]" id="suplierid'+l+'" class="form-control" value="<?php foreach($getDataHdr as $dtl){echo $dtl->SuplierID; }?>">\n\
            <input type="hidden" name="txtkategoriID[]" id="kategoriId" class="form-control" value="<?php echo $dtl->KategoriID?>">\n\
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
               <input type="text" class="form-control" id="harga'+l+'" name="txtharga" onkeyup="hitung('+l+')" placeholder="Input Harga"/>\n\
            </td>\n\
            <td class="text-center">\n\
                 <input type="text" name="txtquantity[]" id="quantity'+l+'" class="form-control" onkeyup="hitung('+l+')" placeholder="Input Quantity">\n\
              </td>\n\
             <td class="text-center">\n\
                <select id="satuan'+l+'" name="txtsatuan[]" class="form-control">\n\
                <option value="">--Pilih--</option>\n\
                <?php foreach($getMstSatuan as $stn){?>
                  <option value="<?php echo $stn->satuanID?>"><?php echo $stn->abbr?></option>\n\
                <?php }?>
                </select>\n\
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
    var jmlitem = document.getElementsByName("txtharga").length;
    // alert(jmlitem);
    var hasil = 0;
    for(i = 1; i <= jmlitem; i++){
      var hargaOld = $('#harga'+i).val();
      var harga = remove_thousand_separator(hargaOld);
      var quantity = $('#quantity'+i).val();

      // alert(harga);
      // alert(quantity);
      document.getElementById("total"+i).value = harga * quantity;

      var grand = $('#total'+i).val();
      hasil = Math.ceil(Number(hasil) + Number(grand));
      document.getElementById("grandtotal").value = hasil;
    }
  }
</script>