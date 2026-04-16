<div class="portlet light bordered">
    <div class="row">
        <?php foreach($getDataHdr as $hdr){?>
        <div class="col-lg-12">
            <div class="form-group">
                <label class="col-lg-2 control-label">No Ref</label>
                <div class="col-lg-6">
                    <label class="control-label">: <?php echo $hdr->No_ref?></label>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label class="col-lg-2 control-label">Tanggal</label>
                <div class="col-lg-6">
                    <label class="control-label">: <?php echo $hdr->nama_suplier?></label>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label class="col-lg-2 control-label">Suplier</label>
                <div class="col-lg-6">
                    <label class="control-label">: <?php echo $hdr->Tgl_transaksi?></label>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label class="col-lg-2 control-label">Kategori</label>
                <div class="col-lg-6">
                    <?php if($hdr->Kategori == 1){?>
                        <label class="control-label">: Barang Dapur </label>
                    <?php }else{?>
                        <label class="control-label">: Perawatan Mess </label>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<div class="portlet light bordered">
    <table class="table table-hover table-bordered table-striped" id="table">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Nama Item</th>
                <th class="text-center">Harga (Rp.)</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Satuan</th>
                <th class="text-center">Total</th>
                <th class="text-center">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1; 
            foreach($getDataDtl as $dtl){?>
            <tr>
                <td class="text-center"><?php echo $no++?></td>
                <td class="text-center"><?php echo $dtl->nama_item?></td>
                <td class="text-center"><?php echo number_format($dtl->Harga,2,',','.');?></td>
                <td class="text-center"><?php echo $dtl->Quantity?></td>
                <td class="text-center"><?php echo $dtl->abbr?></td>
                <td class="text-center"><?php echo number_format($dtl->Total,2,',','.');?></td>
                <td class="text-center"><?php echo $dtl->Keterangan?></td>                     
            </tr>
            <?php }?>
            <?php
            foreach($getDataTotal as $gt){?>
                <tr>
                    <td class="text-right" colspan="5">GRAND TOTAL</td>
                    <td class="text-right"><b><?php echo number_format($gt->GrandTotal,2,',','.');?></b></td>
                    <td></td>
                </tr>

            <?php }?>
        </tbody>
    </table>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <i class="fa fa-edit"></i>
            <strong>CATATAN</strong>
            <br>
            <br>
            <?php foreach($getDataHdr as $ket){?>
                <textarea class="form-control" name="txtCatatan" id="catatan" placeholder="Input Catatan" readonly=""><?php echo $ket->Keterangan?></textarea>
            <?php }?>
        </div>
    </div>
</div>