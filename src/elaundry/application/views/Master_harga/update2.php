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
                                        <?php foreach($getDataHdr as $hdr){?>
                                        <div class="form-group">
                                            <label class="col-lg-1 control-label">Suplier</label>
                                            <div class="col-lg-4">
                                               <select class="form-control" name="txtsuplierid" id="suplierID" onchange="callAjax()" required="">
                                                <!-- <option value="">-- Pilih --</option> -->
                                                    <?php foreach($dataSuplier as $spl){
                                                    if($spl->suplierID == $hdr->suplierID){?>
                                                        <option value="<?php echo $spl->suplierID?>"><?php echo $spl->nama_suplier?></option>
                                                    <?php } }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-1 control-label">Tanggal</label>
                                            <div class="col-lg-4">
                                               <input name="tanggal" id="tanggal" class="form-control" readonly="readonly" value="<?php echo date("Y-m-d")?>">
                                            </div>
                                        </div>
                                        <?php }?>
                                        <br>
                                        <br>
                                        <div class="form-group" id="idsuplier">
                                          <table class="table table-bordered table-hover" id="dataTables">
                                            <thead>
                                               <tr>
                                                    <th class="text-center">Nomor</th>
                                                    <th class="text-center">Nama Item</th>
                                                    <th class="text-center">Kategori</th>
                                                    <th class="text-center">Satuan</th>
                                                    <th class="text-center">Harga</th>
                                               </tr>
                                            </thead>
                                             <tbody>
                                              <?php 
                                              $no=1;
                                              foreach($dataItem as $itm){?>
                                              <tr>
                                                <td class="text-center"><?php echo $no++?></td>
                                                <td class="text-center">
                                                  <input type="text" name="txtnamaitem[]" id="namaitem" class="form-control" value="<?php   echo $itm->nama_item?>">
                                                  <input type="hidden" name="txtitemid[]" id="itemid" class="form-control" value="<?php echo $itm->itemID?>">
                                                </td>
                                                <td class="text-center">
                                                  <input type="text" name="txtkategori[]" id="kategori" class="form-control" value="<?php   echo $itm->nama_kategori?>">
                                                  <input type="hidden" name="txtkategoriid[]" id="kategoriid" class="form-control" value="<?php echo $itm->kategoriID?>">
                                                </td>
                                                <td class="text-center">
                                                  <input type="text" name="txtsatuan[]" id="satuan" class="form-control" value="<?php   echo $itm->abbr?>">
                                                  <input type="hidden" name="txtsatuanid[]" id="satuanid" class="form-control" value="<?php echo $itm->satuanID?>">
                                                </td>
                                                 <td class="text-center">
                                                  <input type="text" name="txtharga[]" id="harga" class="form-control" value="<?php foreach($getData as $get){if($get->itemID == $itm->itemID){echo $get->harga;}} ?>">
                                                  <input type="hidden" name="txtdetailid[]" id="detailid" class="form-control" value="<?php foreach($getData as $get){if($get->itemID == $itm->itemID){echo $get->detailID;}} ?>">
                                                </td>
                                              </tr>
                                              <?php }?>
                                            </tbody>
                                          </table>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-lg-1 control-label"></label>
                                          <div class="col-lg-4">
                                            <button class="btn btn-sm btn-primary" name="txtsimpan" id="simpan">
                                              Simpan
                                            </button>
                                            <a href="<?php echo base_url('Master_harga/tambahData')?>" class="btn btn-sm btn-danger">
                                              Reset
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
    $(document).ready(function() {
        $('#dataTables').dataTable();
    });
</script>
<script type="text/javascript">
  function callAjax(){
    var suplier = $('#suplierID').val();

    // alert(suplier);
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "<?php echo base_url('Master_harga/ajaxItem')?>"+"/"+suplier,
        success: function(msg){
            if(msg == ''){
              alert('Tidak ada data');
            } 
            else{
                $("#idsuplier").html(msg);                                                     
            }
        }
    });
  };
</script>