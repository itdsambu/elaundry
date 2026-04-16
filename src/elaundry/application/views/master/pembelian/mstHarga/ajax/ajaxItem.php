<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

<?php if($cekSuplier != NULL){?>
<table class="table table-striped table-bordered table-hover table-header-fixed" id="dataTable2">
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
            <td><?php echo $no++?></td>
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
                <input type="text" name="txtharga[]" id="txtharga" class="form-control" placeholder="Input Harga" value="<?php foreach($getData as $row){if($get->ItemID == $row->ItemID){echo $row->Harga;}} ?>">
                <input type="hidden" name="txtdetailid[]" id="txtdetailid" class="form-control" value="<?php foreach($getData as $row){if($get->ItemID == $row->ItemID){echo $row->DetailID;}} ?>">
                <input type="hidden" name="txtheaderid[]" id="txtheaderid" class="form-control" value="<?php foreach($getData as $row){if($get->ItemID == $row->ItemID){echo $row->HeaderID;}} ?>">
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>
<?php }else{?>
<table class="table table-striped table-bordered table-hover table-header-fixed" id="dataTable2">
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
            <td><?php echo $no++?></td>
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
                <input type="text" name="txtharga[]" id="txtharga" class="form-control" placeholder="Input Harga" value="">
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>
<?php }?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable2').dataTable();
    } );
</script>
