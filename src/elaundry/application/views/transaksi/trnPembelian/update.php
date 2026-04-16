<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Pembelian/update') ?>">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-file-text"></i>
                            <span class="caption-subject bold uppercase"> Pembelian</span>
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
                                <?php foreach($getDataHdr as $hdr){?>
                                <div class="col-lg-12">
                                    <input type="hidden" name="txtheaderid" id="txtheaderid" class="form-control" value="<?php echo $hdr->HeaderID?>">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">No Ref</label>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" id="txtnoref" name="txtnoref" placeholder="Input No Ref" value="<?php echo $hdr->No_ref ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Suplier</label>
                                        <div class="col-lg-5">
                                            <select type="text" class="form-control" id="txtsuplier" name="txtsuplier" onchange="ajaxItem()">
                                                <option value="">--Pilih--</option>
                                                <?php foreach($getMstSupllier as $spl){
                                                if($hdr->SuplierID = $spl->SuplierID){?>
                                                    <option value="<?php echo $spl->SuplierID?>" selected><?php echo $spl->Nama_suplier?></option>
                                                <?php }else{?>
                                                    <option value="<?php echo $spl->SuplierID?>"><?php echo $spl->Nama_suplier?></option>
                                                <?php }}?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Tanggal</label>
                                        <div class="col-lg-5">
                                            <input type="date" class="form-control" id="txttanggaltransaksi" name="txttanggaltransaksi" value="<?php echo date('Y-m-d',strtotime($hdr->TanggalTransaksi))?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Kategori</label>
                                        <div class="col-lg-5">
                                            <select type="text" class="form-control" id="txtkategori" name="txtkategori">
                                                <option value="">--Pilih--</option>
                                                <?php if($hdr->Kategori_hdr == 1){?>
                                                    <option value="1" selected="">Perlengkapan Dapur</option>
                                                    <option value="0">Perawatan Mess</option>
                                                <?php }else{?>
                                                    <option value="1">Perlengkapan Dapur</option>
                                                    <option value="0" selected="">Perawatan Mess</option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Upload</label>
                                        <div class="col-lg-5">
                                            <input type="file" class="form-control" id="txtupload" name="txtupload">
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- END EXAMPLE TABLE PORTLET-->
                <div id="tbllist">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="tools">
                                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                                <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="form-body">
                                <div class="row" id="tbllist">
                                    <div class="col-lg-12">
                                        <a class="btn yellow btn-sm" onclick="tambah()">
                                          <i class="fa fa-plus"></i>
                                          Tambah Item
                                        </a>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-12">
                                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Nama Item</th>
                                                    <th>Harga</th>
                                                    <th>Quantity</th>
                                                    <th>Satuan</th>
                                                    <th>Total</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($getDataDtl as $dtl){?>
                                                <tr>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <input type="hidden" name="txtsuplierdtl[]" id="txtsuplier1" class="form-control" value="<?php echo $dtl->SuplierID?>">
                                                        <input type="hidden" name="txtdetailid[]" id="txtdetailid1" class="form-control" value="<?php echo $dtl->DetailID?>">
                                                    </td>
                                                    <td>
                                                        <select class="form-control txt" name="txtnamaitem[]" id="txtnamaitem1" onchange="callAjax(this.id)">
                                                            <option value="">--Pilih--</option>
                                                            <?php foreach($item as $itm){
                                                                if($dtl->ItemID == $itm->ItemID){?>
                                                                <option value="<?php echo $itm->ItemID?>" selected><?php echo $itm->Nama_item?></option>
                                                            <?php }else{?>
                                                                <option value="<?php echo $itm->ItemID?>"><?php echo $itm->Nama_item?></option>
                                                            <?php }}?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txtharga[]" id="txtharga" class="form-control" placeholder="Input Harga" onkeyup="hitung(1)" value="<?php echo $dtl->Harga?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txtquantity[]" id="txtquantity" class="form-control" placeholder="Input Quantity" onkeyup="hitung(1)" value="<?php echo $dtl->Quantity?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txtsatuan[]" id="txtsatuan" class="form-control" placeholder="Input Satuan" readonly="" value="<?php echo $dtl->Abbr?>">
                                                        <input type="hidden" name="txtsatuanid[]" id="txtsatuanid" class="form-control" placeholder="Input Satuan" readonly="" value="<?php echo $dtl->SatuanID?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txttotal[]" id="txttotal" class="form-control" placeholder="Input Total" readonly="" value="<?php echo $dtl->Total?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txtketerangan[]" id="txtketerangan1" class="form-control" placeholder="Input Keterangan" value="<?php echo $dtl->Keterangan_dtl?>">
                                                    </td>
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="5" class="text-right">Grand Total</td>
                                                    <td colspan="2">
                                                        <input type="text" name="txtgrandtotal" id="txtgrandtotal" class="form-control" readonly="">
                                                    </td>
                                                </tr>
                                            </tfoot>
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
                                <span class="caption-subject bold uppercase"> Perbandingan Harga</span>
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-12" id="idPerbandingan">
                                        <table class="table table-striped table-bordered table-hover table-header-fixed">
                                            <thead>
                                                <tr>
                                                    <th>Nama Item</th>
                                                    <th>Suplier</th>
                                                    <th>Satuan</th>
                                                    <th>Harga</th>
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
                                    <div class="col-lg-12">
                                        <div class="portlet-title">
                                            <div class="caption font-dark">
                                                <i class="fa fa-edit"></i>
                                                <span class="caption-subject bold uppercase">Catatan</span>
                                            </div>
                                        </div>
                                        <br>
                                        <textarea class="form-control" name="txtcatatan" id="txtcatatan" placeholder="Input Catatan"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-lg-offset-1 col-lg-5">
                                    <button class="btn green">Submit</button> 
                                    <a class="btn default" href="javascript:history.back()">Kembali</a>
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
    function ajaxItem(){
        var suplier = $('#txtsuplier').val();
        // alert(suplier);

        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('Pembelian/ajaxDataItem')?>"+"/"+suplier,
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
    function tambah(){
        var jml = document.getElementsByName("txtharga[]").length;
        var l = jml+1;

        for(var i = l; i <= l; i++){
            $('table[id="dataTable"]').append('<tbody id="dataTable1">\n\
                <tr>\n\
                    <td>\n\
                        <a id="hapus'+l+'" class="btn btn-sm btn-danger" onclick="hapus_baris(this)">\n\
                            <i class="fa fa-trash"></i>\n\
                        </a>\n\
                        <input type="hidden" name="txtdetailid[]" id="txtdetailid1" class="form-control" value="">\n\
                        <input type="hidden" name="txtsuplierdtl[]" id="txtsuplier1" class="form-control" value="<?php foreach($getDataHdr as $row){ echo $row->SuplierID;} ?>">\n\
                    </td>\n\
                    <td>\n\
                        <select class="form-control txt" name="txtnamaitem[]" id="txtnamaitem'+l+'" onchange="callAjax(this.id)">\n\
                            <option value="">--Pilih--</option>\n\
                            <?php foreach($item as $itm){?>
                                <option value="<?php echo $itm->ItemID?>"><?php echo $itm->Nama_item?></option>\n\
                            <?php }?>
                        </select>\n\
                    </td>\n\
                    <td>\n\
                        <input type="text" name="txtharga[]" id="txtharga'+l+'" class="form-control" placeholder="Input Harga" onkeyup="hitung('+l+')">\n\
                    </td>\n\
                    <td>\n\
                        <input type="text" name="txtquantity[]" id="txtquantity'+l+'" class="form-control" placeholder="Input Quantity" onkeyup="hitung('+l+')">\n\
                    </td>\n\
                    <td>\n\
                        <input type="text" name="txtsatuan[]" id="txtsatuan'+l+'" class="form-control" placeholder="Input Satuan" readonly="">\n\
                        <input type="hidden" name="txtsatuanid[]" id="txtsatuanid'+l+'" class="form-control" placeholder="Input Satuan" readonly="">\n\
                    </td>\n\
                    <td>\n\
                        <input type="text" name="txttotal[]" id="txttotal'+l+'" class="form-control" placeholder="Input Total" readonly="">\n\
                    </td>\n\
                    <td>\n\
                        <input type="text" name="txtketerangan[]" id="txtketerangan'+l+'" class="form-control" placeholder="Input Keterangan">\n\
                    </td>\n\
                </tr>\n\
            </tbody>');
        }
      };
</script>
<script type="text/javascript">
    function hapus_baris(ip){
      var tr = ip.parentNode.parentNode;
      tr.parentNode.removeChild(tr);
   }
</script>
<script type="text/javascript">
    function callAjax(id){
        var idBaris     = id.substr(11);
        var jmlBaris    = document.getElementsByClassName('txt').length;
        var item        = $('#'+id).val();
        var suplier     = $('#txtsuplier1').val();
        
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('Pembelian/ajaxHarga')?>"+"/"+item+"/"+suplier,
            success: function(msg){
                if(msg == ''){
                  alert('Tidak ada data');
                } 
                else{
                    $("#txtharga"+idBaris).val(msg); 
                    // console.log(msg);                                                    
                }
            }
        });

        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('Pembelian/ajaxPerbandinganHarga')?>"+"/"+item,
            success: function(msg){
                if(msg == ''){
                  alert('Tidak ada data');
                } 
                else{
                    $("#idPerbandingan").html(msg);                                                     
                }
            }
        }); 
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('Pembelian/ajaxSatuan')?>"+"/"+item+"/"+suplier,
            success: function(msg){
                if(msg == ''){
                  alert('Tidak ada data');
                } 
                else{      
                    $("#txtsatuan"+idBaris).val(msg);
                }
            }
        });

        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('Pembelian/ajaxSatuanid')?>"+"/"+item+"/"+suplier,
            success: function(msg){
                if(msg == ''){
                  alert('Tidak ada data');
                } 
                else{      
                    $("#txtsatuanid"+idBaris).val(msg);
                }
            }
        });    
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
          document.getElementById('txtharga').id = "txtharga"+i;
          document.getElementById('txtquantity').id = "txtquantity"+i;
          document.getElementById('txttotal').id = "txttotal"+i;
    }
  }

  function hitung(){
    var jmlitem = document.getElementsByName("txtharga[]").length;

    var hasil = 0;
    for(i = 1; i <= jmlitem; i++){
      var harga     = $('#txtharga'+i).val();
      var quantity  = $('#txtquantity'+i).val();

      // alert(harga);
      // alert(quantity);
      document.getElementById("txttotal"+i).value = Math.ceil(harga * quantity);

      var grand = $('#txttotal'+i).val();
      hasil = Math.ceil(Number(hasil) + Number(grand));
      document.getElementById("txtgrandtotal").value = hasil;
    }
  }
</script>