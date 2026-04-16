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
            
        } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="12" style="text-align: center;"><b>TOTAL KESELURUHAN</b></td>
            <td style="text-align: center;"></td>
            <!-- <td style="text-align: center;"><?php if (isset($val_sum_bayar)) { echo number_format($val_sum_bayar, 0, ',', '.'); } ?></td> -->
            <td colspan="4"></td>
        </tr>
    </tfoot>
</table>