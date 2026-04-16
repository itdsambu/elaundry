<div class="page-content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="portlet light bordered">
                <?php foreach ($getDataHdr as $hdr) {
                    $hdrid = $hdr->ID;
                    $laundry_stat = $hdr->IDStatusPelayanan; ?>
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12" style="padding:0;">
                            <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>No. Nota</b></label>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <label class="control-label">: <?php echo $hdr->NoNota ?></label>
                            </div>
                            <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Tanggal Terima</b></label>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <label class="control-label">: <?php echo date('d-m-Y', strtotime($hdr->TglTransaksi)) ?></label>
                            </div>
                            <?php if ($laundry_stat != 1) { ?>
                                <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Tanggal Selesai</b></label>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <label class="control-label">: <?php if ($hdr->SelesaiDate != '') {
                                                                        echo date('d-m-Y', strtotime($hdr->SelesaiDate));
                                                                    } ?></label>
                                </div>
                            <?php } ?>
                            <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Nama Pelanggan</b></label>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <label class="control-label">: <?php echo $hdr->Nama ?></label>
                            </div>
                            <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Status Pelanggan</b></label>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <label class="control-label">: <?php if ($hdr->StatusTK == 1) {
                                                                    echo 'Karyawan';
                                                                } elseif ($hdr->StatusTK == 2) {
                                                                    echo 'Harian';
                                                                } elseif ($hdr->StatusTK == 3) {
                                                                    echo 'Umum';
                                                                } ?></label>
                            </div>
                            <?php if ($hdr->StatusTK == 1 || $hdr->StatusTK == 2) { ?>
                                <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>NIK</b></label>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <label class="control-label">: <?php echo $hdr->NIK ?></label>
                                </div>
                                <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Departemen</b></label>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <label class="control-label">: <?php echo $hdr->DeptAbbr ?></label>
                                </div>
                                <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>PT/CV</b></label>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <label class="control-label">: <?php echo $hdr->Perusahaan ?></label>
                                </div>
                            <?php } else { ?>
                                <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>No. HP</b></label>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <label class="control-label">: <?php echo $hdr->NoHP ?></label>
                                </div>
                            <?php } ?>
                            <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Jenis Pembayaran</b></label>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <label class="control-label">:
                                    <?php foreach ($get_MstPembayaranLaundry as $row3) {
                                        if ($hdr->Cash == $row3->IDPembayaran) {
                                            echo $row3->JenisPembayaran;
                                        }
                                    } ?>
                                </label>
                            </div>
                            <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Jenis Layanan</b></label>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <label class="control-label">:
                                    <?php foreach ($get_MstHargaLaundry as $row2) {
                                        if ($hdr->IDLayanan == $row2->IDLayanan) {
                                            echo $row2->JenisLayanan;
                                        }
                                    } ?>
                                </label>
                            </div>
                            <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Berat</b></label>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <label class="control-label">: <?php echo str_replace('.', ',', $hdr->JumlahBerat); ?> Kg</label>
                            </div>
                            <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Total Biaya (Rp)</b></label>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <label class="control-label">: <?php echo number_format($hdr->TotalTagihan, 2, ',', '.') ?></label>
                            </div>
                            <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Status Laundry</b></label>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <label class="control-label">:
                                    <?php foreach ($get_MstStatusLaundry as $row3) {
                                        if ($hdr->IDStatusPelayanan == $row3->IDStatusPelayanan && $row3->IDStatusPelayanan == 1) {
                                            echo '<span class="label label-sm label-danger status_laundry">' . $row3->StatusPelayanan . '</span>';
                                        } elseif ($hdr->IDStatusPelayanan == $row3->IDStatusPelayanan && $row3->IDStatusPelayanan == 2) {
                                            echo '<span class="label label-sm label-warning status_laundry">' . $row3->StatusPelayanan . '</span>';
                                        } elseif ($hdr->IDStatusPelayanan == $row3->IDStatusPelayanan && $row3->IDStatusPelayanan == 3) {
                                            echo '<span class="label label-sm label-success status_laundry">' . $row3->StatusPelayanan . '</span>';
                                        } elseif ($hdr->IDStatusPelayanan == $row3->IDStatusPelayanan && $row3->IDStatusPelayanan == 4) {
                                            echo '<span class="label label-sm label-primary status_laundry">' . $row3->StatusPelayanan . '</span>';
                                        }
                                    } ?>
                                </label>
                            </div>
                            <?php if ($laundry_stat == 3) { ?>
                                <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Tanggal Diambil</b></label>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <label class="control-label">: <?php if ($hdr->DiambilDate != '') {
                                                                        echo date('d-m-Y', strtotime($hdr->DiambilDate));
                                                                    } ?></label>
                                </div>
                                <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Diambil Oleh</b></label>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <label class="control-label">: <?php echo $hdr->DiambilBy ?></label>
                                </div>
                            <?php } ?>
                            <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Foto Label / Konsumen</b></label>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <label class="control-label">:
                                    <?php if ($hdr->link_upload_label != '') { ?>
                                        <img src="<?php echo base_url() ?><?php echo $hdr->link_upload_label . $hdr->ID ?>.jpg" width="150px" alt="Maaf File Tidak Ada ..!!">
                                    <?php } else { ?>
                                        <b>Tidak ada</b>
                                    <?php } ?>
                                </label>
                            </div>
                            <!-- <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Foto Item / Timbangan</b></label>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <label class="control-label">: 
                                    <?php if ($hdr->link_upload_item != '') { ?>
                                        <img src="<?php echo base_url() ?><?php echo $hdr->link_upload_item . $hdr->ID ?>.jpg" width="150px" alt="Maaf File Tidak Ada ..!!">
                                    <?php } else { ?>
                                        <b>Tidak ada</b>
                                    <?php } ?>
                                </label>
                            </div> -->
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="portlet light bordered">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped" id="table3">
                        <thead>
                            <tr style="background-color:#D6FFFB;">
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Item</th>
                                <th class="text-center">Kategory</th>
                                <th class="text-center">Jumlah (pcs)</th>
                                <?php if ($laundry_stat == 3) { ?>
                                    <th class="text-center">Check</th>
                                <?php } else {
                                } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($getDataTamu as $dtl) { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td>
                                        <?php foreach ($get_vwItemKategory as $row4) {
                                            if ($dtl->id_item == $row4->Id_Item) {
                                                echo $row4->NamaItem;
                                            }
                                        } ?>
                                    </td>
                                    <td>
                                        <?php foreach ($get_vwItemKategory as $row4) {
                                            if ($dtl->id_item == $row4->Id_Item) {
                                                echo $row4->NamaKategory;
                                            }
                                        } ?>
                                    </td>
                                    <td class="text-center"><?php echo $dtl->jumlah ?></td>
                                    <?php if ($laundry_stat == 3) { ?>
                                        <td class="text-center">&#10004;</td>
                                    <?php } else {
                                    } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table3').dataTable({
            "order": [0, 'asc'],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "pageLength": 10
        });
    });
</script>