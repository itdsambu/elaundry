<script src="<?php echo base_url(); ?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-file-text"></i>
                        <span class="caption-subject bold uppercase">FILTER TRANSAKSI</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="form-body">
                        <div class="row">
                            <form action="<?php echo base_url('Mnt_Laundry'); ?>" method="POST">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="col-lg-4">
                                            <label class="control-label">Dari Tanggal</label>
                                        </div>
                                        <div class="form-group col-lg-8">
                                            <input type="date" name="tanggal_1" id="tanggal_1" class="form-control text-center" value="<?php echo set_value('tanggal_1'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="col-lg-4">
                                            <label class="control-label">Sampai Tanggal</label>
                                        </div>
                                        <div class="form-group col-lg-8">
                                            <input type="date" name="tanggal_2" id="tanggal_2" class="form-control text-center" value="<?php echo set_value('tanggal_2'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 10px;">
                                        <div class="col-lg-4">
                                            <label class="control-label">Status Pelanggan</label>
                                        </div>
                                        <div class="form-group col-lg-8">
                                            <select name="status_pelanggan" id="status_pelanggan" class="status_pelanggan form-control text-center">
                                                <option value="0" <?php echo  set_select('status_pelanggan', '0'); ?>>--pilih--</option>
                                                <option value="KARYAWAN" <?php echo  set_select('status_pelanggan', 'KARYAWAN'); ?>>KARYAWAN</option>
                                                <option value="HARIAN/BORONGAN" <?php echo  set_select('status_pelanggan', 'HARIAN/BORONGAN'); ?>>HARIAN/BORONGAN</option>
                                                <option value="UMUM">UMUM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 10px;">
                                        <div class="col-lg-4">
                                            <label class="control-label">Jenis Pembayaran</label>
                                        </div>
                                        <div class="form-group col-lg-8">
                                            <select name="jenis_pembayaran" id="jenis_pembayaran" class="jenis_pembayaran form-control text-center">
                                                <option value="">--pilih--</option>
                                                <?php foreach ($get_MstPembayaranLaundry as $bayar) { ?>
                                                    <option value="<?= $bayar->JenisPembayaran ?>" <?php echo  set_select('jenis_pembayaran', $bayar->JenisPembayaran); ?>><?= $bayar->JenisPembayaran ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 10px;">
                                        <div class="col-lg-4">
                                            <label class="control-label">Status Laundry</label>
                                        </div>
                                        <div class="form-group col-lg-8">
                                            <select name="status_laundry" id="status_laundry" class="status_laundry form-control text-center">
                                                <option value="">--pilih--</option>
                                                <?php foreach ($get_MstStatusLaundry as $status) { ?>
                                                    <option value="<?= $status->StatusPelayanan ?>" <?php echo  set_select('status_laundry', $status->StatusPelayanan); ?>><?= $status->StatusPelayanan ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-lg-12" style="margin-left:14px; margin-top:15px;">
                                        <!-- <div class="form-actions"> -->
                                        <div class="row">
                                            <div class="form-group col-lg-2 col-lg-5">
                                                <!-- <a class="btn btn-sm green-meadow" name="search" onclick="ajaxCari()">
                                                        <i class="fa fa-search"></i>
                                                        Search
                                                    </a> -->
                                                <button type="submit" class="btn btn-primary" name="btntampil" id="btntampil">Tampil</button>
                                            </div>
                                        </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- <div class="table-responsive" id="table_mnt" style="max-height: 500px;"> -->
                    <div id="table_mnt">
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
                                <?php if (isset($get_monitoring)) {
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
                                            <?php }
                                            } ?>
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
                                    <?php }
                                } else { ?>
                                    <td colspan="14" class="text-center">Silahkan input filter pencarian</td>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="12" style="text-align: center;"><b>TOTAL KESELURUHAN</b></td>
                                    <td style="text-align: center;"><?php if (isset($val_sum_bayar)) {
                                                                        echo number_format($val_sum_bayar, 0, ',', '.');
                                                                    } ?></td>
                                    <td colspan="4"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>0
            <!-- END EXAMPLE TABLE PORTLET-->
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
<!-- Javascript Modal -->
<script type="text/javascript">
    // function ajaxCari() {
    //     tanggal_1 = $('#tanggal_1').val();
    //     tanggal_2 = $('#tanggal_2').val();
    //     status_pelanggan = $('#status_pelanggan').val();
    //     jenis_pembayaran = $('#jenis_pembayaran').val();
    //     status_laundry = $('#status_laundry').val();
    //     $.ajax({
    //         type: "post",
    //         dataType: "html",
    //         data: {
    //             tanggal_1: tanggal_1,
    //             tanggal_2: tanggal_2,
    //             status_pelanggan: status_pelanggan,
    //             jenis_pembayaran: jenis_pembayaran,
    //             status_laundry: status_laundry
    //         },
    //         url: "<?php echo base_url('Mnt_Laundry/AjaxCariDataMnt') ?>",
    //         success: function(datas) {
    //             if (datas == '') {
    //                 alert('Data tidak ada');
    //             } else {
    //                 console.log(datas)
    //                 $('#table_mnt').html(datas);
    //             }
    //         }
    //     });
    // }

    function detail(clicked_id) {
        $.post("<?php echo site_url(); ?>Mnt_Laundry/ModalDetailItem?id=" + clicked_id, function(data) {
            $('#idDetail').html(data);
        });
        $('#MyModal').modal('show');
    }

    $(document).ready(function() {
        $('.table').dataTable({
            "order": [0, 'asc'],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "pageLength": 10
        });
    });
</script>