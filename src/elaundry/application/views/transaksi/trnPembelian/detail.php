<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="post" action="">
                        <div class="form-body">
                            <div class="row">
                                <?php foreach($getTrnPembelianHdr as $hdr){?>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">No Ref</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" value="<?php echo $hdr->No_ref?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Suplier</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" value="<?php echo $hdr->Nama_suplier?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Tanggal</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" value=" <?php echo $hdr->TanggalTransaksi?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Kategori</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" value="<?php if($hdr->Kategori_hdr == 1){ echo 'Perlengkapan Dapur';}else{echo 'Perawatan Mess';}?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Upload File</label>
                                        <div class="col-lg-4">
                                           <input type="text" class="form-control" value="<?php if($hdr->UploadFile == 1){echo 'Sudah';}else{echo 'Belum';}?>">
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="post" action="">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="datatables">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Item</th>
                                                <th>Harga</th>
                                                <th>Quantity</th>
                                                <th>Satuan</th>
                                                <th>Total</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no=1;
                                            foreach($getTrnPembelianDtl as $dtl){?>
                                            <tr>
                                                <td><?php echo $no++?></td>
                                                <td><?php echo $dtl->Nama_item?></td>
                                                <td><?php echo $dtl->Harga?></td>
                                                <td><?php echo $dtl->Quantity?></td>
                                                <td><?php echo $dtl->Abbr?></td>
                                                <td><?php echo $dtl->Total?></td>
                                                <td><?php echo $dtl->Keterangan_dtl?></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td colspan="5" class="text-right">Grand Total</td>
                                                <td class="text-right">Rp.
                                                    <?php foreach($getGrandTotal as $get){echo number_format($get->GrandTotal);}?>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <br>
                                <div class="col-lg-12">
                                    <div class="caption font-dark">
                                        <i class="fa fa-edit"></i>
                                        <span class="caption-subject bold uppercase"> Catatan</span>
                                    </div>
                                    <textarea class="form-control"><?php foreach($getTrnPembelianHdr as $row){echo $row->Catatan;}?></textarea>
                                </div>
                                <br>
                                <br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="col-lg-10 control-label"></label>
                        <div class="col-lg-1">
                            <a href="<?php echo base_url('Pembelian')?>" class="btn btn-default">
                                <i class="fa fa-angle-double-left"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').dataTable({
            "order"      : [0, 'asc'],
            "lengthMenu" : [
                            [5, 10, 15, 20, -1],
                            [5, 10, 15, 20, "All"] // change per page values here
                           ],
            "pageLength" : 10
        });
    } );
</script>