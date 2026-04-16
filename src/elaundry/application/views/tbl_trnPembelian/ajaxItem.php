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
                <a class="btn yellow btn-sm" onclick="tambah_baris()">
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
                          <tr>
                            <td class="text-center">
                               <a id="hapus" class="btn red btn-sm"><i class="fa fa-trash"></i>
                                </a>
                                <input type="hidden" name="txtSuplierID[]" id="suplierid1" class="form-control" value="<?php echo $idsuplier?>">
                            </td>
                            <div>
                            <td>
                                <select class="form-control txt" name="txtNamaItem[]" id="namaitem1" onchange="callAjaxItem(this.id)">
                                    <option>-- Pilih --</option>
                                    <?php foreach($getDataItem as $itm){?>
                                        <option value="<?php echo $itm->itemID?>"><?php echo $itm->nama_item?></option>
                                    <?php }?>
                                </select>
                            </td>
                            <td id="idItem1">
                                <input type="hidden" name="txtDtlHarga[]" id="dtlharga" class="form-control">
                                <input type="text" name="txtHarga[]" id="harga1" class="form-control" onkeyup="hitung(1)">
                            </td>
                            <td>
                               <input type="text" name="txtQuantity[]" id="quantity1" class="form-control" onkeyup="hitung(1)">
                            </td>
                            <td>
                              <input type="hidden" name="txtSatuan[]" id="satuan1" class="form-control" readonly="">
                              <input type="text" name="txtSatuanid[]" id="satuanid1" class="form-control" readonly="">
                            </td>
                            <td>
                               <input type="text" name="txtTotal[]" id="total1" class="form-control" onkeyup="hitung(1)" readonly=""> 
                            </td>
                            <td>
                              <input class="form-control" name="txtKeterangan[]" id="keterangan" placeholder="Input Keterangan">
                            </td>                                                   
                        </tr>
                      </tbody>
                      <tfoot>
                          <tr>
                            <td colspan="5" style="text-align: right;">Grand Total</td>
                            <td colspan="2">
                              <input type="text" name="txtGrandeTotal" id="grandTotal" class="form-control" readonly="">
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

<script type="text/javascript">
  function tambah_baris() {
      // alert(selPicPrimary); 
      var jum = document.getElementsByClassName('txt');
      var l = jum.length+1;

      var no = l+1;
      var num = 1;
      for (var i = 0; i < num; i++) {
          $('table[id="dataTable"]').append('<tbody id="dataTable1">\n\
            <tr>\n\
              <td class="text-center">\n\
              <input type="hidden" name="txtSuplierID[]" id="suplierid'+l+'" class="form-control" value="<?php echo $idsuplier?>">\n\
              <a id="hapus'+l+'" class="btn red btn-sm" onclick="hapus_baris(this)"><i class="fa fa-trash"></i>\n\
                </a>\n\
              </td>\n\
              <td class="text-center" >\n\
                  <select id="namaitem'+l+'" name="txtNamaItem[]" class="form-control txt" onchange="callAjaxItem(this.id)">\n\
                  </select>\n\
              </td>\n\
              <td class="text-center" id="idItem'+l+'">\n\
                <input type="hidden" name="txtDtlHarga[]" id="dtlharga" class="form-control">\n\
                 <input type="text" class="form-control" id="harga'+l+'" name="txtHarga[]" onkeyup="hitung('+l+')"/>\n\
              </td>\n\
              <td class="text-center">\n\
                   <input type="text" name="txtQuantity[]" id="quantity'+l+'" class="form-control" onkeyup="hitung('+l+')">\n\
                </td>\n\
               <td class="text-center">\n\
                  <input type="hidden" name="txtSatuan[]" id="satuan'+l+'" class="form-control" readonly="">\n\
                  <input type="text" name="txtSatuanid[]" id="satuanid'+l+'" class="form-control" readonly="">\n\
              </td>\n\
              <td class="text-center">\n\
                 <input type="text" name="txtTotal[]" id="total'+l+'" class="form-control" onkeyup="hitung('+l+')" readonly=""/>\n\
                 </td>\n\
              <td>\n\
              <input class="form-control" name="txtKeterangan[]" id="keterangan" placeholder="Input Keterangan">\n\
            </td>\n\
          </tr>\n\
          </tbody>');
      }

      $('#namaitem1 option').clone().appendTo('#namaitem'+l);
      $('#satuan1 option').clone().appendTo('#satuan'+l);
    }
</script>
<script type="text/javascript">
  function hapus_baris(ip){
      var tr = ip.parentNode.parentNode;
      tr.parentNode.removeChild(tr);
  }
</script>
<script type="text/javascript">
    function hitung(id){
      // alert(id);
        var jmlBaris    = document.getElementsByClassName('txt').length;
        var harga       = $('#harga'+id).val();
        var quantity    = $('#quantity'+id).val();

        document.getElementById('total'+id).value = harga * quantity;
        var grand = 0;
        for(var i= 1; i<=jmlBaris;i++){
          grand += parseInt($('#total'+i).val());
          
        }
        
        document.getElementById("grandTotal").value = Math.ceil(grand);
        
    }
</script>
<script type="text/javascript">
    function callAjaxItem(id){
      // alert(id.substr(8));
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

        // alert($idItem);
        // alert(suplierid);
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
    };
</script>