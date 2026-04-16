<table class="table table-striped table-bordered table-hover" id="dataTable2">
    <thead>
        <tr class="bg-primary">
            <th class="text-center no" rowspan="2">No.</th>
            <th class="text-center" rowspan="2">Lokasi Laundry</th>
            <th class="text-center" rowspan="2">No. Nota</th>
            <th class="text-center" colspan="3" rowspan="1">Tanggal</th>
            <th class="text-center" rowspan="2">Nama <br>Pelanggan</th>
            <th class="text-center" rowspan="2">Status Pelanggan</th>
            <th class="text-center" rowspan="2">NIK</th>
            <th class="text-center" rowspan="2">Jenis Pembayaran</th>
            <th class="text-center" rowspan="2">Jenis<br> Layanan</th>
            <th class="text-center" rowspan="2">Total Biaya (Rp)</th>
            <th class="text-center" rowspan="2">Status<br> Laundry</th>
            <th class="text-center" rowspan="2">Dibuat<br> Oleh</th>
            <th class="text-center" rowspan="2">Diapprove Oleh</th>
            <th class="text-center" rowspan="2">Tanggal <br>Approve</th>
            <th class="text-center" rowspan="2">Action</th>
        </tr>
        <tr class="bg-primary">
            <th class="text-center" colspan="1" rowspan="1">Transaksi /Terima</th>
            <th class="text-center" colspan="1" rowspan="1">Selesai Dikerjakan</th>
            <th class="text-center" colspan="1" rowspan="1">Telah Diambil</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($get_monitoring) > 0) {
            $no = 0;
            $val_sum_bayar = 0;
            foreach ($get_monitoring as $get) {
                if (is_numeric($get->TotalTagihan)) {
                    $val_sum_bayar += $get->TotalTagihan;
                }
                $no++; ?>
                <tr>
                    <td class="text-center no"><?php echo $no ?></td>
                    <?php foreach ($dt_allpos_laundry as $pos) {
                        if ($get->pos_ldy == $pos->detail_id) { ?>
                            <td style="background-color: <?= ($get->pos_ldy == $pos->detail_id) ? $pos->warna_laundry : $pos->warna_laundry; ?>;"><?= $get->nama_laundry . ' (' . $get->alamat . ')'; ?></td>
                            <?php
                        }
                    } ?>
                    <td class="text-center no_nota"><?php echo $get->NoNota ?></td>
                    <td class="text-center tgl_transaksi"><?php echo date('d-m-Y', strtotime($get->TglTransaksi)); ?></td>
                    <td class="text-center tanggal_selesai">
                        <?php if ($get->SelesaiDate != NULL) {
                            echo date('d-m-Y', strtotime($get->SelesaiDate));
                        } ?>
                    </td>
                    <td class="text-center tanggal_diambil">
                        <?php if ($get->DiambilDate != NULL) {
                            echo date('d-m-Y', strtotime($get->DiambilDate));
                        } ?>
                    </td>
                    <td class="nama_pelanggan"><?php echo $get->Nama ?></td>
                    <td class="text-center st_pelanggan"><?php echo $get->StatusKaryawan ?></td>
                    <td class="text-center nik"><?php echo $get->NIK ?></td>
                    <td class="jns_bayar"><?php echo $get->JenisPembayaran ?></td>
                    <td class="jenis_layanan"><?php echo $get->JenisLayanan ?></td>
                    <td class="total_biaya text-right"><?php echo number_format($get->TotalTagihan, 0, ',', '.'); ?></td>
                    <td class="text-center st_laundry">
                        <?php if ($get->IDStatusPelayanan == 1) {
                            echo '<span class="label label-sm label-danger">' . $get->StatusPelayanan . '</span>';
                        } elseif ($get->IDStatusPelayanan == 2) {
                            echo '<span class="label label-sm label-warning">' . $get->StatusPelayanan . '</span>';
                        } elseif ($get->IDStatusPelayanan == 3) {
                            echo '<span class="label label-sm label-success">' . $get->StatusPelayanan . '</span>';
                        } elseif ($get->IDStatusPelayanan == 4) {
                            echo '<span class="label label-sm label-primary">' . $get->StatusPelayanan . '</span>';
                        } ?>
                    </td>
                    <td class="text-center dibuat_oleh"><?php echo $get->CreatedBy ?></td>
                    <td class="text-center dibuat_oleh"><?php echo $get->ApproveBy ?></td>
                    <td class="text-center dibuat_oleh"><?php echo $get->ApproveDate ?></td>
                    <td class="text-center actions">
                        <a class="btn btn-sm sharp btn-success" id="<?php echo $get->ID ?>" onclick="detail(this.id)">
                            <i class="fa fa-eye"></i>
                            Lihat
                        </a>
                    </td>
                </tr>
                <?php 
            }
        } else { ?>
            <td colspan="16" class="text-center">Data approve belum ada</td>
            <?php 
        } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="11" style="text-align: center;"><b>TOTAL KESELURUHAN</b></td>
            <td style="text-align: center;"><?php if (isset($val_sum_bayar)) { echo number_format($val_sum_bayar, 0, ',', '.'); } ?></td>
            <td colspan="5"></td>
        </tr>
    </tfoot>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable2').DataTable({
        }); 
    });
</script>