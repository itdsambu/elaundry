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
                            <tr>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <input type="hidden" name="txtsuplierdtl[]" id="txtsuplier1" class="form-control" value="<?php echo $suplier?>">
                                </td>
                                <td>
                                    <select class="form-control txt" name="txtnamaitem[]" id="txtnamaitem1" onchange="callAjax(this.id)">
                                        <option value="">--Pilih--</option>
                                        <?php foreach($item as $itm){?>
                                        	<option value="<?php echo $itm->ItemID?>"><?php echo $itm->Nama_item?></option>
                                        <?php }?>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="txtharga[]" id="txtharga1" class="form-control" placeholder="Input Harga" onkeyup="hitung(1)">
                                </td>
                                <td>
                                    <input type="text" name="txtquantity[]" id="txtquantity1" class="form-control" placeholder="Input Quantity" onkeyup="hitung(1)">
                                </td>
                                <td>
                                    <input type="text" name="txtsatuan[]" id="txtsatuan1" class="form-control" placeholder="Input Satuan" readonly="">
                                    <input type="hidden" name="txtsatuanid[]" id="txtsatuanid1" class="form-control" placeholder="Input Satuan" readonly="">
                                </td>
                                <td>
                                    <input type="text" name="txttotal[]" id="txttotal1" class="form-control" placeholder="Input Total" readonly="">
                                </td>
                                <td>
                                    <input type="text" name="txtketerangan[]" id="txtketerangan1" class="form-control" placeholder="Input Keterangan">
                                </td>
                            </tr>
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
<script type="text/javascript">
    function tambah_baris() {
      var jum = document.getElementsByClassName('txt');
      var l = jum.length+1;

      var no = l+1;
      var num = 1;
      for (var i = 0; i < num; i++) {
          $('table[id="dataTable"]').append('<tbody id="dataTable1">\n\
            <tr>\n\
                <td>\n\
                    <a id="hapus'+l+'" class="btn btn-sm btn-danger" onclick="hapus_baris(this)">\n\
                        <i class="fa fa-trash"></i>\n\
                    </a>\n\
                    <input type="hidden" name="txtsuplierdtl[]" id="txtsuplier'+l+'" class="form-control" value="<?php echo $suplier?>">\n\
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
                    <input type="text" name="txttotal[]" id="txttotal'+l+'" class="form-control" placeholder="Input Total" readonly>\n\
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
		var idBaris		= id.substr(11);
        var jmlBaris	= document.getElementsByClassName('txt').length;
		var item 		= $('#'+id).val();
		var suplier 	= $('#txtsuplier1').val();
		
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
	function hitung(id){
		var jmlBaris 	= document.getElementsByClassName('txt').length;
		var harga 	 	= $('#txtharga'+id).val();
		var quantity 	= $('#txtquantity'+id).val();
		// var harga 		= remove_thousand_separator(hargaold);
		document.getElementById('txttotal'+id).value = harga * quantity;
		var grand = 0;
        for(var i= 1; i<=jmlBaris;i++){
          grand += parseInt($('#txttotal'+i).val());
        }
        document.getElementById("txtgrandtotal").value = Math.ceil(grand);
	}
</script>