<?php
	/** @noinspection ALL */
	$bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
?>
<script src="<?php echo base_url(); ?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form class="form-horizontal" action="" method="post">
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
                        <!-- <div class="portlet-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="col-lg-6">
                                        <label class="control-label">Dari Tanggal Transaksi</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="date" name="tanggal_1" id="tanggal_1" class="form-control text-center" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="col-lg-6">
                                        <label class="control-label">Sampai Tanggal Transaksi</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="date" name="tanggal_2" id="tanggal_2" class="form-control text-center" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 10px;">
                                    <div class="col-lg-6">
                                        <label class="control-label">Status Pelanggan</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <select name="status_pelanggan" id="status_pelanggan" class="status_pelanggan form-control text-center">
                                            <option value="0">--pilih--</option>
                                            <option value="KARYAWAN">KARYAWAN</option>
                                            <option value="HARIAN/BORONGAN">HARIAN/BORONGAN</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-12" style="margin-left:14px; margin-top:15px;">
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-lg-2 col-lg-5">
                                                <a class="btn btn-sm green-meadow" name="search" onclick="ajaxCari()">
                                                    <i class="fa fa-search"></i>
                                                    Search
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                        <div class="portlet-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="col-lg-2 col-md-2 col-sm-3 col-xs-12 control-label">Status Tenaga Kerja</label>
                                            <div class="col-lg-4 col-md-8 col-sm-9 col-xs-12" style="padding-top: 9px;">
                                                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-5 form-check">
                                                    <input type="radio" name="StatusTK" value="1" class="form-check-input StatusTK" id="karyawan" <?php if (isset($status_tk)) { if ($status_tk == '1') { echo 'checked'; } } ?>>
                                                    <label class="form-check-label" for="Karyawan">Karyawan</label>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-7 col-xs-7">
                                                    <input type="radio" name="StatusTK" value="2" class="form-check-input StatusTK" id="harian" <?php if (isset($status_tk)) { if ($status_tk == '2') { echo 'checked'; } } ?>>
                                                    <label class="form-check-label" for="Borongan">Harian/Borongan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Periode</label>
                                            <div class="col-lg-3">
                                                <select class="form-control" name="txtPeriode" id="periode" required <?php if (isset($periode)) { } else { echo 'disabled'; } ?>>
                                                    <option value="" class="kosong">Pilih Status Tenaga Kerja Terlebih Dahulu</option>
                                                    <option value="p1" class="harian" <?php if (isset($periode)) { if ($periode == 'p1') { echo 'selected'; } else { echo 'style="display: none;"'; } } ?>>Periode I</option>
                                                    <option value="p2" class="harian" <?php if (isset($periode)) { if ($periode == 'p2') { echo 'selected'; } else { echo 'style="display: none;"'; } } ?>>Periode II</option>
                                                    <option value="bulanan" class="karyawan" <?php if (isset($periode)) { if ($periode == 'bulanan') { echo 'selected'; } else { echo 'style="display: none;"'; } } ?>>Bulanan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Bulan</label>
                                            <div class="col-lg-3">
                                                <select class="form-control" id="bulan" name="txtbulan">
                                                    <option value="">--Pilih--</option>
                                                    <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                        <option value="<?= $i ?>" <?php if (isset($bln)) { if ($bln == $i) { echo 'selected'; } } ?>><?= $bulan[$i]; ?></option>
                                                        <?php
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Tahun</label>
                                            <div class="col-lg-3">
                                                <select class="form-control" name="txttahun" id="tahun">
                                                    <?php for ($i = date('Y') - 2; $i <= (date('Y')); $i++) {
                                                        if ($i == date('Y')) { ?>
                                                            <option value="<?php echo $i; ?>" selected><?= $i; ?></option>
                                                            <?php 
                                                        } else { ?>
                                                            <option value="<?php echo $i; ?>" <?php if (isset($tahun)) { if ($tahun == $i) { echo 'selected'; } } ?>><?= $i; ?></option>
                                                            <?php 
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="button" class="btn btn-sm btn-primary" onclick="ajaxCarii()">Refresh</button>
                                        <a class="btn btn-sm default" href="javascript:history.back()">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
                        <!-- <div class="table table-responsive" id="table_mnt" style="max-height: 500px;"> -->
                        <div id="table_mnt">
                            <table class="table table-striped table-bordered table-hover table-header-fixed" id="tabeldata2">
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
                                            $no++;
                                            ?>
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
                                        <?php }
                                    } else { ?>
                                        <td colspan="16" class="text-center">Data approve belum ada</td>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="11" style="text-align: center;"><b>TOTAL KESELURUHAN</b></td>
                                        <td style="text-align: center;"><?php if (isset($val_sum_bayar)) {
                                                                            echo number_format($val_sum_bayar, 0, ',', '.');
                                                                        } ?></td>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
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

        //     if (tanggal_2 != '') {
        //         $.ajax({
        //             type: "post",
        //             dataType: "html",
        //             data: {
        //                 tanggal_1: tanggal_1,
        //                 tanggal_2: tanggal_2,
        //                 status_pelanggan: status_pelanggan
        //             },
        //             url: "<?php echo base_url('Mnt_Approval/AjaxCariDataMnt') ?>",
        //             success: function(datas) {
        //                 if (datas == '') {
        //                     alert('Data tidak ada');
        //                 } else {
        //                     // console.log(datas)
        //                     $('#table_mnt').html(datas);
        //                 }
        //             }
        //         });
        //     } else {
        //         alert("Silahkan pilih Tanggal dahulu!!");
        //     }
        // }

        $('.StatusTK').click(function() {
            if ($('#karyawan').is(':checked')) {
                $('.kosong').css('display', 'none');
                $('.harian').css('display', 'none');
                $('.karyawan').css('display', 'block');
                $('#periode').val('bulanan');
                $('#periode').attr('disabled', false);
            } else if ($('#harian').is(':checked')) {
                $('.kosong').css('display', 'none');
                $('.karyawan').css('display', 'none');
                $('.harian').css('display', 'block');
                $('#periode').val('p1');
                $('#periode').attr('disabled', false);
            }
        });

        function ajaxCarii() {
            var periode = $("#periode").val();
            var bulan = $("#bulan").val();
            var tahun = $("#tahun").val();
            var tk_cek = $("input[type='radio']:checked").val();

            if (!periode || bulan == '') {
                alert('Wajib Pilih Periode');
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Mnt_Approval/AjaxCariDataMntt') ?>",
                    data: {
                        periode: periode,
                        bulan: bulan,
                        tahun: tahun,
                        tk_cek: tk_cek
                    },
                    success: function(datas) {
                        if (datas == '') {
                            alert('Data tidak ada');
                        } else {
                            $('#table_mnt').html(datas);
                        }
                    }
                });
            }
        }

        function detail(clicked_id) {
            $.post("<?php echo site_url(); ?>Mnt_Approval/ModalDetailItem?id=" + clicked_id, function(data) {
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
