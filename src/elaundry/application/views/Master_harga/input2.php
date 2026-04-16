<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Master_harga/simpanData') ?>">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-file-text"></i>
                        <span class="caption-subject bold uppercase"> Harga</span>
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
                                    <label class="col-lg-1 control-label">Suplier</label>
                                    <div class="col-lg-4">
                                       <select class="form-control" name="txtsuplierid" id="suplierID" onchange="callAjax()" required="">
                                        <option value="">-- Pilih --</option>
                                            <?php foreach($dataSuplier as $spl){?>
                                            <option value="<?php echo $spl->suplierID?>"><?php echo $spl->nama_suplier?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-1 control-label">Tanggal</label>
                                    <div class="col-lg-4">
                                       <input type="date" name="tanggal" id="tanggal" class="form-control" readonly="readonly" value="<?php echo date('Y-m-d')?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
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
                            <div class="col-lg-12" id="idsuplier">
                                <table class="table table-striped table-bordered table-hover table-header-fixed" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama Item</th>
                                            <th>Kategori</th>
                                            <th>Satuan</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1; 
                                        foreach($dataItem as $get){?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++?></td>
                                            <td class="text-center">
                                              <input type="text" name="txtnamaitem[]" id="namaitem" class="form-control" value="<?php   echo $get->nama_item?>">
                                              <input type="hidden" name="txtitemid[]" id="itemid" class="form-control" value="<?php echo $get->itemID?>">
                                            </td>
                                            <td class="text-center">
                                              <input type="text" name="txtkategori[]" id="kategori" class="form-control" value="<?php   echo $get->nama_kategori?>">
                                              <input type="hidden" name="txtkategoriid[]" id="kategoriid" class="form-control" value="<?php echo $get->kategoriID?>">
                                            </td>
                                            <td class="text-center">
                                              <input type="text" name="txtsatuan[]" id="satuan" class="form-control" value="<?php   echo $get->abbr?>">
                                              <input type="hidden" name="txtsatuanid[]" id="satuanid" class="form-control" value="<?php echo $get->satuanID?>">
                                            </td>
                                            <td class="text-center">
                                              <input type="text" name="txtharga[]" id="harga" class="form-control" value="0">
                                            </td>
                                          </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
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
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').dataTable();
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