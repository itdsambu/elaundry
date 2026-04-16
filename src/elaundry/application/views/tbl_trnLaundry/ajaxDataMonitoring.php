<table class="table table-striped table-bordered table-hover" id="tabeldata2">
    <thead>
        <tr class="bg-primary">
            <th class="text-center no" rowspan="2">No.</th>
            <th class="text-center no_nota" rowspan="2">No. Nota</th>
            <th class="text-center" colspan="3" rowspan="1">Tanggal</th>
            <th class="text-center" rowspan="2">Nama Pelanggan</th>
            <th class="text-center" rowspan="2">Status Pelanggan</th>
            <th class="text-center" rowspan="2">NIK</th>
            <th class="text-center" rowspan="2">Jenis Pembayaran</th>
            <th class="text-center" rowspan="2">Jenis Layanan</th>
            <th class="text-center" rowspan="2">Total Berat (Kg)</th>
            <th class="text-center" rowspan="2">Total Biaya (Rp)</th>
            <th class="text-center" rowspan="2">Status Laundry</th>
            <th class="text-center" rowspan="2">Nama Pengambil</th>
            <th class="text-center" rowspan="2">Dibuat Oleh</th>
            <th class="text-center" rowspan="2">Actions</th>
        </tr>
        <tr class="bg-primary">
            <th class="text-center" colspan="1" rowspan="1">Transaksi /Terima</th>
            <th class="text-center" colspan="1" rowspan="1">Selesai Dikerjakan</th>
            <th class="text-center" colspan="1" rowspan="1">Telah Diambil</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (count($get_monitoring) > 0) {
            $no = 0;
            $sum = 0;
            foreach ($get_monitoring as $get) {
                $no++; ?>
                <tr>
                    <td class="text-center no"><?php echo $no ?></td>
                    <td class="text-center no_nota"><?php echo $get->NoNota ?></td>
                    <td class="text-center tgl_transaksi"><?php echo date('d-m-Y', strtotime($get->TglTransaksi)); ?></td>
                    <td class="text-center tanggal_selesai"><?php if ($get->SelesaiDate != NULL) {
                                                                echo date('d-m-Y', strtotime($get->SelesaiDate));
                                                            } else {
                                                            } ?></td>
                    <td class="text-center tanggal_diambil"><?php if ($get->DiambilDate != NULL) {
                                                                echo date('d-m-Y', strtotime($get->DiambilDate));
                                                            } else {
                                                            } ?></td>
                    <td class="nama_pelanggan"><?php echo $get->Nama ?></td>
                    <td class="text-center st_pelanggan"><?php echo $get->StatusKaryawan ?></td>
                    <td class="text-center nik"><?php echo $get->NIK ?></td>
                    <td class="jns_bayar"><?php echo $get->JenisPembayaran ?></td>
                    <td class="jenis_layanan"><?php echo $get->JenisLayanan ?></td>
                    <td class="berat text-right"><?php echo $get->JumlahBerat ?></td>
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
                    <td class="text-center nama_pengambil"><?php echo $get->DiambilBy ?></td>
                    <td class="text-center dibuat_oleh"><?php echo $get->CreatedBy ?></td>
                    <td class="text-center actions">
                        <a class="btn btn-sm sharp btn-success" id="<?php echo $get->ID ?>" onclick="detail(this.id)">
                            <i class="fa fa-eye"></i>
                            Lihat
                        </a>
                    </td>
                </tr>
            <?php $sum += $get->TotalTagihan;
            }
        } else { ?>
            <tr>
                <td colspan="15" class="text-center">Data Transaksi tidak ditemukan</td>
            </tr>
        <?php } ?>
    </tbody>
    <?php if (count($get_monitoring) > 0) { ?>
        <tfoot>
            <tr>
                <td class="text-center bg-primary" colspan="11"><b>Grand Total Biaya (Rp)</b></td>
                <td class="text-right" style="padding-right: 9px;"><b><?php if (isset($sum)) {
                                                                            echo number_format($sum, 0, ',', '.');
                                                                        } ?></b></td>
                <td class="text-center bg-primary" colspan="4"></td>
            </tr>
        </tfoot>
    <?php } ?>
</table>