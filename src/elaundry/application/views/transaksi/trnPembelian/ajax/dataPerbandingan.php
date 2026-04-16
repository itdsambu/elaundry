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
        <?php foreach($getData as $get){?>
        <tr>
            <td><?php echo $get->Nama_item?></td>
            <td><?php echo $get->Nama_suplier?></td>
            <td><?php echo $get->Abbr?></td>
            <td class="text-right">Rp.<?php echo number_format($get->Harga)?></td>
        </tr>
        <?php }?>
    </tbody>
</table>