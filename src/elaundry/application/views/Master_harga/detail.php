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
                                <?php foreach($getDataHeader as $hdr){?>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Suplier</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" readonly="" value="<?php echo $hdr->nama_suplier?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Tanggal</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" readonly="" value="<?php echo $hdr->tanggal?>">
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
                                                <th>Nama Item</th>
                                                <th>Kategori</th>
                                                <th>Satuan</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no=1;
                                            foreach($getDataDetail as $dtl){?>
                                            <tr>
                                                <td><?php echo $dtl->nama_item?></td>
                                                <td><?php echo $dtl->nama_kategori?></td>
                                                <td><?php echo $dtl->nama_satuan?></td>
                                                <td class="text-right">Rp.<?php echo number_format($dtl->harga)?></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
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