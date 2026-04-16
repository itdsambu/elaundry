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
                                        <legend>Tambah Master Harga</legend>
                                        <div class="portlet-body">
                                           <!-- alert -->
                                              <?php if($this->input->get('msg') == "success"){
                                                  echo "<div class='alert alert-success'>";
                                                  echo "<strong>Sukses !!!</strong> Data berhasil disimpan.";
                                                  echo "</div>";
                                              }elseif($this->input->get('msg') == "failed"){
                                                  echo "<div class='alert alert-danger'>";
                                                  echo "<strong>Gagal !!!</strong> Data Sudah Pernah Di Input..!!";
                                                  echo "</div>";
                                              } ?>
                                          </div>
                                            <form class="form-horizontal" action="<?php echo base_url('Master_harga/simpanData') ?>" method="post" entype="multipart/form-data">
                                              <div>
                                                <div class="form-group">
                                                    <label class="col-lg-1 control-label">Suplier</label>
                                                    <div class="col-lg-4">
                                                       <select class="form-control" name="txtsuplierid" id="suplierID">
                                                        <option>-- Pilih --</option>
                                                            <?php foreach($dataSuplier as $spl){?>
                                                            <option value="<?php echo $spl->suplierID?>"><?php echo $spl->nama_suplier?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                              </div>  
                                                <div class="form-group">
                                                    <label class="col-lg-1 control-label">Tanggal</label>
                                                    <div class="col-lg-4">
                                                       <input name="tanggal" id="tanggal" class="form-control" readonly="readonly" value="<?php echo date("Y-m-d")?>">
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <a class="btn yellow btn-sm" onclick="tambah_baris();">
                                                              <i class="fa fa-plus"></i>
                                                              Tambah Item
                                                            </a>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <table class="table table-bordered table-hover" id="dataTable">
                                                            <thead style="background-color: #004b71; color: #cceeff;">
                                                               <tr>
                                                                    <th class="text-center" rowspan="2">
                                                                        <a id="hapus" class="btn btn-md"><i class="fa fa-trash"></i></a>
                                                                    </th>
                                                                    <th class="text-center">Nama Item</th>
                                                                    <!-- <th class="text-center">Kode Item</th> -->
                                                                    <th class="text-center">Kategori</th>
                                                                    <th class="text-center">Satuan</th>
                                                                    <th class="text-center">Harga</th>
                                                                    <th class="text-center">Inactive</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td class="text-center">
                                                                    <input type="hidden" name="txtdetailid[]" class="form-control txt">
                                                                    <a style="color:#fff" id="hapus" class="btn red btn-sm" ><i class="fa fa-trash"></i></a>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="txtNamaItem[]" id="itemid1">
                                                                        <option>-- Pilih --</option>
                                                                            <?php foreach($dataItem as $itm){?>
                                                                              <option value="<?php echo $itm->itemID?>"><?php echo $itm->nama_item?></option>
                                                                            <?php } ?>
                                                                    </select>
                                                                </td>
                                                                    <td>
                                                                        <select class="form-control" name="txtKategori[]" id="kategoriID">
                                                                        <option>-- Pilih --</option>
                                                                            <?php foreach($dataKategori as $ktg){?>
                                                                                <option value="<?php echo $ktg->kategoriID?>"><?php echo $ktg->nama_kategori?></option>
                                                                            <?php } ?>
                                                                    </select>
                                                                    </td>
                                                                    <td>
                                                                       <select class="form-control" name="txtSatuan[]" id="satuanID">
                                                                        <option>-- Pilih --</option>
                                                                            <?php foreach($dataSatuan as $stn){?>
                                                                              <option value="<?php echo $stn->satuanID?>"><?php echo $stn->abbr?></option>
                                                                            <?php } ?>
                                                                    </select>
                                                                    </td>
                                                                <td>
                                                                   <input name="txtHarga[]" id="harga" class="form-control" placeholder="Harga" value="" onkeypress="return hanyaAngka(event)">
                                                                </td>
                                                                <td>
                                                                  <select class="form-control" id="status" name="txtStatus[]">
                                                                    <option value="1">Aktif</option>
                                                                    <option value="0">Tidak Aktif</option>
                                                                  </select>
                                                                </td>                                           
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                      </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-1 control-label"></label>
                                                            <input type='submit' class="btn green-meadow" name="simpan" value="submit"></input> 
                                                             <a href="<?php echo site_url('Home'); ?>" class="btn btn-default">
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
function tambah_baris() {
      // alert(selPicPrimary); 
      var jum = document.getElementsByClassName('txt');
      var l = jum.length+1;

      var no = l+1;
      var num = 1;
      for (var i = 0; i < num; i++) {
          $('table[id="dataTable"]').append('<tbody">\n\
            <tr>\n\
              <td class="text-center">\n\
              <a id="hapus'+l+'" class="btn red btn-sm" onclick="hapus_baris(this)"><i class="fa fa-trash"></i>\n\
                </a>\n\
              </td>\n\
              <td class="text-center" >\n\
                  <select class="form-control" name="txtNamaItem[]" id="itemid'+l+'">\n\
                  <option>-- Pilih --</option>\n\
                  <?php foreach($dataItem as $itm){?>
                  <option value="<?php echo $itm->itemID?>"><?php echo $itm->nama_item?></option>\n\
                   <?php } ?>
                  <select>\n\
              </td>\n\
              <td class="text-center"">\n\
                  <select name="txtKategori[]" id="kategoriID'+l+'" class="form-control">\n\
                  <option>-- Pilih --</option>\n\
                  <?php foreach($dataKategori as $ktg){?>
                   <option value="<?php echo $ktg->kategoriID?>"><?php echo $ktg->nama_kategori?></option>\n\
                  <?php } ?>
                  <select>\n\
              </td>\n\
              <td class="text-center">\n\
                  <select name="txtSatuan[]" id="satuanID'+l+'" class="form-control">\n\
                  <option>-- Pilih --</option>\n\
                  <?php foreach($dataSatuan as $stn){?>
                  <option value="<?php echo $stn->satuanID?>"><?php echo $stn->abbr?></option>\n\
                  <?php } ?>
                  <select>\n\
              </td>\n\
               <td class="text-center">\n\
                   <input name="txtHarga[]" id="harga" class="form-control" placeholder="Harga" value="" onkeypress="return hanyaAngka(event)">\n\
                </td>\n\
                <td>\n\
                  <select class="form-control" id="status'+l+'" name="txtStatus[]">\n\
                    <option value="1">Aktif</option>\n\
                    <option value="0">Tidak Aktif</option>\n\
                  </select>\n\
                </td>\n\
          </tr>\n\
          </tbody>');
      }
    }
</script>
<script type="text/javascript">
  function hapus_baris(ip){
      var tr = ip.parentNode.parentNode;
      tr.parentNode.removeChild(tr);
}
</script>
<script type="text/javascript">
    $(function () {
        $(".select2").select2();
    });
</script>
<script type="text/javascript">
    function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }
</script>
<script type="text/javascript">
    var rupiah = document.getElementById('harga');
    rupiah.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, '');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split           = number_string.split(','),
        sisa            = split[0].length % 3,
        rupiah          = split[0].substr(0, sisa),
        ribuan          = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }
</script>
