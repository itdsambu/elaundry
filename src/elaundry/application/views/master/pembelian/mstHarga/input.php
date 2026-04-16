<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Harga/save') ?>">
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
                                    <label class="col-lg-2 control-label">Tanggal Efektif</label>
                                    <div class="col-lg-5">
                                        <input type="date" class="form-control" id="txttanggal" name="txttanggal" placeholder="Input Tanggal Efektif" value="<?php echo date('Y-m-d')?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Suplier</label>
                                    <div class="col-lg-5">
                                        <select type="text" class="form-control" id="txtsuplier" name="txtsuplier" placeholder="Input Suplier" onchange="ajaxItem()" required="">
                                            <option value="">--Pilih--</option>
                                            <?php foreach($getMstSuplier as $spl){?>
                                                <option value="<?php echo $spl->SuplierID?>"><?php echo $spl->Nama_suplier?></option>
                                            <?php }?>
                                        </select>
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
                            <div class="col-lg-12" id="tbllist">
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
                                        foreach($getMstItem as $get){?>
                                        <tr>
                                            <td>
                                                <?php echo $no++?>
                                            </td>
                                            <td>
                                                <input type="hidden" name="txtitemid[]" id="txtitemid" class="form-control" value="<?php echo $get->ItemID?>">
                                                <input type="text" name="txtnamaitem" id="txtnamaitem" class="form-control" value="<?php echo $get->Nama_item?>" readonly>
                                            </td>
                                            <td>
                                                <input type="hidden" name="txtkategori[]" id="txtkategori" class="form-control" value="<?php echo $get->KategoriID?>">
                                                <input type="text" name="txtkategoriid" id="txtkategoriid" class="form-control" value="<?php echo $get->Kategori?>" readonly>
                                            </td>
                                            <td>
                                                <input type="hidden" name="txtsatuan[]" id="txtsatuan" class="form-control" value="<?php echo $get->SatuanID?>">
                                                <input type="text" name="txtsatuanid" id="txtsatuanid" class="form-control" value="<?php echo $get->Abbr?>" readonly>
                                            </td>
                                            <td>
                                                <input type="text" name="txtharga[]" id="txtharga" class="form-control" placeholder="Input Harga">
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
    } );

    function ajaxItem(){
        var suplier = $('#txtsuplier').val();
        // alert(suplier);

        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('Harga/dataItem')?>"+'/'+suplier,
            success: function(msg){
                if(msg == ''){
                  alert('Tidak ada data');
                } 
                else{
                    $("#tbllist").html(msg);                                                     
                }
            }
        });

    }
</script>