<script src="<?php echo base_url(); ?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<?php
$banyak_data = count($getDataHeader);
if (isset($getDataHeader)) {
    foreach ($getDataHeader as $hdr) {
        $nota[]               = $hdr->NoNota;
        $nama_laundry[]       = $hdr->ldy_nama;
        $alamat_laundry[]     = $hdr->ldy_alamat;
        $id[]                 = $hdr->ID;
        $nik[]                = $hdr->NIK;
        $nama[]               = $hdr->Nama;
        $tgl_transaksi[]      = $hdr->TglTransaksi;
        $layanan_ldy[]        = $hdr->IDLayanan;
        $status_pelayanan[]   = $hdr->IDStatusPelayanan;
    }
} ?>
<div class="page-content">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase">
                            LAUNDRY BIASA (LEBIH DARI 3 HARI)
                            <?php $x = 0;
                            for ($i = 0; $i < $banyak_data; $i++) {

                                if ($layanan_ldy[$i] == '1' || $layanan_ldy[$i] == '2' || $layanan_ldy[$i] == '3') {
                                    $awal  = new DateTime($tgl_transaksi[$i]);
                                    $akhir = new DateTime(); // waktu sekarang
                                    $diff  = $awal->diff($akhir);
                                    $lebih = $diff->days >= 3;
                                    if ($lebih) {
                                        $x++;
                                    }
                                }
                            }
                            if ($x > 0) {
                                echo '<span class="label label-sm label-danger">' . $x . '</span>';
                            }
                            ?>
                        </span>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="table">
                        <thead>
                            <tr>
                                <th class="text-center" rowspan="2">No.</th>
                                <th class="text-center" rowspan="2">Lokasi Laundry</th>
                                <th class="text-center" rowspan="2">No. Nota</th>
                                <th class="text-center" rowspan="2">Tanggal Terima</th>
                                <th class="text-center" rowspan="2">Nama Pelanggan</th>
                                <th class="text-center" rowspan="2">NIK</th>
                                <th class="text-center" rowspan="2">Jenis Layanan</th>
                                <th class="text-center" rowspan="2">Status Laundry</th>
                                <th class="text-center" colspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <th class="text-center">Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no       = 0;
                            $lebih    = 0;
                            if (count($getDataHeader) > 0) {
                                for ($i = 0; $i < $banyak_data; $i++) {
                                    if ($layanan_ldy[$i] == '1' || $layanan_ldy[$i] == '2' || $layanan_ldy[$i] == '3') {
                                        $awal   = new DateTime($tgl_transaksi[$i]);
                                        $akhir  = new DateTime(); // waktu sekarang
                                        $diff   = $awal->diff($akhir);
                                        $lebih  = $diff->days >= 3;
                                    }
                                    if ($lebih && ($layanan_ldy[$i] == '1' || $layanan_ldy[$i] == '2' || $layanan_ldy[$i] == '3')) {
                                        $no++; ?>
                                        <tr style="background-color : #FCE1DF;">
                                            <td class="text-center"><?php echo $no ?>.</td>
                                            <td><?= $nama_laundry[$i] . ' (' . $alamat_laundry[$i] . ')'; ?></td>
                                            <td class="text-center"><?php echo $nota[$i] ?></td>
                                            <td class="text-center"><?php echo date('d-m-Y', strtotime($tgl_transaksi[$i])) ?></td>
                                            <td><?php echo $nama[$i] ?></td>
                                            <td class="text-center"><?php echo $nik[$i] ?></td>
                                            <td>
                                                <?php foreach ($get_MstHargaLaundry as $row2) {
                                                    if ($layanan_ldy[$i] == $row2->IDLayanan) {
                                                        echo $row2->JenisLayanan;
                                                    }
                                                } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php foreach ($get_MstStatusLaundry as $row3) {
                                                    if ($status_pelayanan[$i] == $row3->IDStatusPelayanan && $status_pelayanan[$i] == 1) {
                                                        echo '<span class="label label-sm label-danger">' . $row3->StatusPelayanan . '</span>';
                                                    }
                                                } ?>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-circle btn-icon-only btn-warning" id="<?php echo $id[$i] ?>" onclick="detail(this.id)" title="UPDATE"><i class="fa fa-eye"></i></a>

                                            </td>
                                        </tr>
                                        <?php 
                                    }
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase">
                            LAUNDRY KILAT (LEBIH DARI 1 HARI)
                            <?php $x    = 0;
                            for ($i = 0; $i < $banyak_data; $i++) {
                                if ($layanan_ldy[$i] == '34') {
                                    $awal   = new DateTime($tgl_transaksi[$i]);
                                    $akhir  = new DateTime(); // waktu sekarang
                                    $diff   = $awal->diff($akhir);
                                    $lebihh = $diff->days >= 1;
                                    if ($lebihh) {
                                        $x++;
                                    }
                                }
                            }
                            if ($x > 0) {
                                echo '<span class="label label-sm label-danger">' . $x . '</span>';
                            }
                            ?>
                        </span>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="table2">
                        <thead>
                            <tr>
                                <th class="text-center" rowspan="2" colspan="1">No.</th>
                                <th class="text-center" rowspan="2" colspan="1">Lokasi Laundry</th>
                                <th class="text-center" rowspan="2" colspan="1">No. Nota</th>
                                <th class="text-center" rowspan="2" colspan="1">Tanggal Terima</th>
                                <th class="text-center" rowspan="2" colspan="1">Nama Pelanggan</th>
                                <th class="text-center" rowspan="2" colspan="1">NIK</th>
                                <th class="text-center" rowspan="2" colspan="1">Jenis Layanan</th>
                                <th class="text-center" rowspan="2" colspan="1">Status Laundry</th>
                                <th class="text-center" rowspan="1" colspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <th class="text-center">Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no       = 0;
                            $lebihh   = 0;
                            if (count($getDataHeader) > 0) {
                                for ($i = 0; $i < $banyak_data; $i++) {
                                    if ($layanan_ldy[$i] == '34') {
                                        $awal  = new DateTime($tgl_transaksi[$i]);
                                        $akhir = new DateTime(); // waktu sekarang
                                        $diff  = $awal->diff($akhir);
                                        $lebihh = $diff->days >= 1;
                                    }
                                    if ($lebihh && ($layanan_ldy[$i] == '34')) {
                                        $no++; ?>
                                        <tr style="background-color : #FCE1DF;">
                                            <td class="text-center"><?php echo $no ?></td>
                                            <td><?= $nama_laundry[$i] . ' (' . $alamat_laundry[$i] . ')'; ?></td>
                                            <td class="text-center"><?php echo $nota[$i] ?></td>
                                            <td class="text-center"><?php echo date('d-m-Y', strtotime($tgl_transaksi[$i])) ?></td>
                                            <td><?php echo $nama[$i] ?></td>
                                            <td class="text-center"><?php echo $nik[$i] ?></td>
                                            <td>
                                                <?php foreach ($get_MstHargaLaundry as $row2) {
                                                    if ($layanan_ldy[$i] == $row2->IDLayanan) {
                                                        echo $row2->JenisLayanan;
                                                    }
                                                } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php foreach ($get_MstStatusLaundry as $row3) {
                                                    if ($status_pelayanan[$i] == $row3->IDStatusPelayanan && $status_pelayanan[$i] == 1) {
                                                        echo '<span class="label label-sm label-danger">' . $row3->StatusPelayanan . '</span>';
                                                    }
                                                } ?>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-circle btn-icon-only btn-warning" id="<?php echo $id[$i] ?>" onclick="detail(this.id)" title="UPDATE"><i class="fa fa-eye"></i></a>

                                            </td>
                                        </tr>
                                        <?php 
                                    }
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><b>Detail Transaksi :</b></h4>
            </div>
            <div class="modal-body">
                <div id="idDetail">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="MyModalView" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><b>Image Label :</b></h4>
            </div>
            <div class="modal-body">
                <div id="view">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Javascript Modal -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#table').dataTable({
            "order": [0, 'desc'],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "pageLength": 10
        });
    });

    $(document).ready(function() {
        $('#table2').dataTable({
            "order": [0, 'asc'],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "pageLength": 10
        });
    });

    function detail(clicked_id) {
        $.post("<?php echo site_url(); ?>Penerimaan_laundry/ModalDetailItem?id=" + clicked_id, function(data) {
            $('#idDetail').html(data);
        });
        $('#MyModal').modal('show');
    }

    function view(clicked_id) {
        $.post("<?php echo site_url(); ?>Penerimaan_laundry/viewFile?id=" + clicked_id, function(data) {
            $('#view').html(data);
        });
        $('#MyModalView').modal('show');
    }
</script>