<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Pembelian/save') ?>">
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
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">No Ref</label>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" id="txtnoref" name="txtnoref" placeholder="Input No Ref" value="<?php echo $noref.'/'.'RSUP-IND'.'/'.date('d-M-Y')?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Suplier</label>
                                        <div class="col-lg-5">
                                            <select type="text" class="form-control" id="txtsuplier" name="txtsuplier" onchange="ajaxItem()">
                                                <option value="">--Pilih--</option>
                                                <?php foreach($getMstSupllier as $spl){?>
                                                <option value="<?php echo $spl->SuplierID?>"><?php echo $spl->Nama_suplier?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Tanggal</label>
                                        <div class="col-lg-5">
                                            <input type="date" class="form-control" id="txttanggaltransaksi" name="txttanggaltransaksi" value="<?php echo date('Y-m-d')?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Kategori</label>
                                        <div class="col-lg-5">
                                            <select type="text" class="form-control" id="txtkategori" name="txtkategori">
                                                <option value="">--Pilih--</option>
                                                <option value="1">Perlengkapan Dapur</option>
                                                <option value="0">Perawatan Mess</option>
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
                                        <a class="btn yellow btn-sm">
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
                                                    </td>
                                                    <td>
                                                        <select class="form-control txt" name="txtnamaitem[]" id="txtnamaitem1">
                                                            <option value="">--Pilih--</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txtharga[]" id="txtharga1" class="form-control" placeholder="Input Harga">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txtquantity[]" id="txtquantity1" class="form-control" placeholder="Input Quantity">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txtsatuan[]" id="txtsatuan1" class="form-control" placeholder="Input Satuan">
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
                                                    <td colspan="2"></td>
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
                                    <div class="col-lg-12">
                                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="dataTable">
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