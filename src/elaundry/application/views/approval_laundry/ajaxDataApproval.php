<table class="table table-striped table-bordered table-hover" id="tabeldata2">
    <thead>
        <tr class="bg-primary">
            <th class="fixed freeze text-center" rowspan="2">
                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" onchange="checkAll(this)">
                    <span></span>
                </label>
            </th>
            <th class="fixed freeze text-center bg-primary" rowspan="2">Lokasi Laundry</th>
            <th class="fixed freeze text-center" rowspan="2">No. Nota</th>
            <th class="fixed freeze text-center" colspan="3" rowspan="1">Tanggal</th>
            <th class="fixed freeze text-center" rowspan="2">Nama Pelanggan</th>
            <th class="fixed freeze text-center" rowspan="2">Status Pelanggan</th>
            <th class="fixed freeze text-center" rowspan="2">NIK</th>
            <th class="fixed freeze_vertical text-center" rowspan="2">Jenis Pembayaran</th>
            <th class="fixed freeze_vertical text-center" rowspan="2">Jenis Layanan</th>
            <th class="fixed freeze_vertical text-center" rowspan="2">Total Berat (Kg)</th>
            <th class="fixed freeze_vertical text-center" rowspan="2">Total Biaya (Rp)</th>
            <th class="fixed freeze_vertical text-center" rowspan="2">Status Laundry</th>
        </tr>
        <tr class="bg-primary">
            <th class="fixed freeze_vertical text-center" colspan="1" rowspan="1">Transaksi /Terima</th>
            <th class="fixed freeze_vertical text-center" colspan="1" rowspan="1">Selesai Dikerjakan</th>
            <th class="fixed freeze_vertical text-center" colspan="1" rowspan="1">Telah Diambil</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        if ($getDataApproval) {
            $val_sum_bayar = 0;
            foreach ($getDataApproval as $get) {
                if (is_numeric($get->TotalTagihan)) {
                    $val_sum_bayar += $get->TotalTagihan;
                }
        ?>
                <tr class="odd gradeX">
                    <td class="text-center">
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" name="ID[]" value="<?php echo $get->ID; ?>" />
                            <span></span>
                        </label>
                    </td>
                    <?php foreach ($dt_allpos_laundry as $pos) {
                        if ($get->pos_ldy == $pos->detail_id) { ?>
                            <td style="background-color: <?= ($get->pos_ldy == $pos->detail_id) ? $pos->warna_laundry : $pos->warna_laundry; ?>;"><?= $get->nama_laundry . ' (' . $get->alamat . ')'; ?></td>
                    <?php }
                    } ?>
                    <td class="text-center no_nota"><?php echo $get->NoNota ?></td>
                    <td class="text-center"><?php echo date('d-m-Y', strtotime($get->TglTransaksi)); ?></td>
                    <td class="text-center"><?php if ($get->SelesaiDate == NULL || $get->SelesaiDate == '1970-01-01') {
                                            } else {
                                                echo date('d-m-Y', strtotime($get->SelesaiDate));
                                            } ?></td>
                    <td class="text-center"><?php if ($get->DiambilDate == NULL || $get->DiambilDate == '1970-01-01') {
                                            } else {
                                                echo date('d-m-Y', strtotime($get->DiambilDate));
                                            } ?></td>
                    <td class="nama_pelanggan"><?php echo $get->Nama ?></td>
                    <td class="text-center st_pelanggan"><?php echo $get->StatusKaryawan ?></td>
                    <td class="text-center nik"><?php echo $get->NIK ?></td>
                    <td class="jns_bayar"><?php echo $get->JenisPembayaran ?></td>
                    <td class="jenis_layanan"><?php echo $get->JenisLayanan ?></td>
                    <td class="text-right berat"><?php echo $get->JumlahBerat ?></td>
                    <td class="total_biaya text-right"><?php echo number_format($get->TotalTagihan, 0, ',', '.'); ?></td>
                    <td class="text-center st_laundry">
                        <?php
                        if ($get->IDStatusPelayanan == 1) {
                            echo '<span class="label label-sm label-danger">' . $get->StatusPelayanan . '</span>';
                        } elseif ($get->IDStatusPelayanan == 2) {
                            echo '<span class="label label-sm label-warning">' . $get->StatusPelayanan . '</span>';
                        } elseif ($get->IDStatusPelayanan == 3) {
                            echo '<span class="label label-sm label-success">' . $get->StatusPelayanan . '</span>';
                        } elseif ($get->IDStatusPelayanan == 4) {
                            echo '<span class="label label-sm label-primary">' . $get->StatusPelayanan . '</span>';
                        } ?>
                    </td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="13" class="text-center">Tidak ada data approve</td>
            </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="12" style="text-align: center;"><b>TOTAL KESELURUHAN</b></td>
            <td style="text-align: center;"><?php if (isset($val_sum_bayar)) {
                                                echo number_format($val_sum_bayar, 0, ',', '.');
                                            } ?></td>
            <td colspan="1"></td>
        </tr>
    </tfoot>
</table>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabeldata2').dataTable({});
    });
</script>