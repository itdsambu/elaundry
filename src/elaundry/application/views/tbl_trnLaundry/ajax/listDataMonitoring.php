<!-- <h1>Table 2</h1> -->
<table class="table table-striped table-bordered table-hover" id="dataTable2">
    <thead>
        <tr class="bg-primary">
            <th class="text-center" rowspan="2">No.</th>
            <th class="text-center" rowspan="2">Lokasi Laundry</th>
            <th class="text-center" rowspan="2">No. Nota</th>
            <th class="text-center" colspan="3" rowspan="1">Tanggal</th>
            <th class="text-center" rowspan="2">Nama<br> Pelanggan</th>
            <th class="text-center" rowspan="2">Status<br> Pelanggan</th>
            <th class="text-center" rowspan="2">NIK</th>
            <th class="text-center" rowspan="2">Jenis<br> Pembayaran</th>
            <th class="text-center" rowspan="2">Jenis<br> Layanan</th>
            <th class="text-center" rowspan="2">Total Berat (Kg)</th>
            <th class="text-center" rowspan="2">Total Biaya (Rp)</th>
            <th class="text-center" rowspan="2">Status<br> Laundry</th>
            <th class="text-center" rowspan="2">Nama Pengambil</th>
            <th class="text-center" rowspan="2">Dibuat<br> Oleh</th>
            <th class="text-center" rowspan="2">Actions</th>
        </tr>
        <tr class="bg-primary">
            <th class="text-center" colspan="1" rowspan="1">Transaksi Terima</th>
            <th class="text-center" colspan="1" rowspan="1">Selesai Dikerjakan</th>
            <th class="text-center" colspan="1" rowspan="1">Telah Diambil</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($listData)) {
            $no = 0;
            $val_sum_bayar = 0;
            foreach ($listData as $get) {
                if (is_numeric($get->TotalTagihan)) {
                    $val_sum_bayar += $get->TotalTagihan;
                }
                $no++; ?>
                <tr>
                    <td class="text-center"><?= $no; ?>.</td>
                    <td class="text-center"><?= $get->nama_laundry; ?> (<?= $get->alamat; ?>)</td>
                    <td class="text-center"><?= $get->NoNota ?></td>
                    <td class="text-center"><?php echo date('d-m-Y', strtotime($get->TglTransaksi)); ?></td>
                    <td class="text-center"><?php if ($get->SelesaiDate != NULL) { echo date('d-m-Y', strtotime($get->SelesaiDate)); } ?></td>
                    <td class="text-center"><?php if ($get->DiambilDate != NULL) { echo date('d-m-Y', strtotime($get->DiambilDate)); } ?></td>
                    <td class="text-center"><?php echo $get->Nama ?></td>
                    <td class="text-center"><?php echo $get->StatusKaryawan ?></td>
                    <td class="text-center nik"><?php echo $get->NIK ?></td>
                    <td class="text-center"><?php echo $get->JenisPembayaran ?></td>
                    <td class="text-center"><?php echo $get->JenisLayanan ?></td>
                    <td class="text-right"><?php echo $get->JumlahBerat ?></td>
                    <td class="text-right"><?php echo number_format($get->TotalTagihan, 0, ',', '.'); ?></td>
                    <td class="text-center">
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
                    <td class="text-center"><?php echo $get->DiambilBy ?></td>
                    <td class="text-center"><?php echo $get->CreatedBy ?></td>
                    <td class="text-center">
                        <a class="btn btn-sm sharp btn-success" id="<?php echo $get->ID ?>" onclick="detail(this.id)"><i class="fa fa-eye"></i> Lihat </a>
                    </td>
                </tr>
                <?php
            }
        } else { ?>
            <td colspan="14" class="text-center">Silahkan input filter pencarian</td>
            <?php
        } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="12" style="text-align: center;"><b>TOTAL KESELURUHAN</b></td>
            <!-- <td style="text-align: center;"></td> -->
            <td style="text-align: center;">
                <?php if (isset($val_sum_bayar)) {
                    echo number_format($val_sum_bayar, 0, ',', '.');
                } ?>
            </td>
            <td colspan="4"></td>
        </tr>
    </tfoot>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable2').DataTable({
        }); 
    });
</script>