<?php $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'); ?>

<script src="<?= base_url(); ?>assets/custom/jquery-3.5.1.js" type="text/javascript"></script>
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
                            <div class="tools"></div>
                        </div>
                        <div class="portlet-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="col-lg-2 col-md-2 col-sm-3 col-xs-12 control-label">Status Tenaga Kerja :</label>
                                            <div class="col-lg-4 col-md-8 col-sm-9 col-xs-12" style="padding-top: 9px;">
                                                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-5 form-check">
                                                    <input type="radio" name="StatusTK" value="1" class="form-check-input StatusTK" id="karyawan" <?php if (isset($status_tk)) {
                                                                                                                                                        if ($status_tk == '1') {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        }
                                                                                                                                                    } ?>>
                                                    <label class="form-check-label" for="Karyawan">Karyawan</label>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-7 col-xs-7">
                                                    <input type="radio" name="StatusTK" value="2" class="form-check-input StatusTK" id="harian" <?php if (isset($status_tk)) {
                                                                                                                                                    if ($status_tk == '2') {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    }
                                                                                                                                                } ?>>
                                                    <label class="form-check-label" for="Borongan">Harian/Borongan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Periode :</label>
                                            <div class="col-lg-3">
                                                <select class="form-control" name="txtPeriode" id="periode" required <?php if (isset($periode)) {
                                                                                                                        } else {
                                                                                                                            echo 'disabled';
                                                                                                                        } ?>>
                                                    <option value="" class="kosong">Pilih Status Tenaga Kerja Terlebih Dahulu</option>
                                                    <option value="p1" class="harian" <?php if (isset($periode)) {
                                                                                            if ($periode == 'p1') {
                                                                                                echo 'selected';
                                                                                            } else {
                                                                                                echo 'style="display: none;"';
                                                                                            }
                                                                                        } ?>>Periode I</option>
                                                    <option value="p2" class="harian" <?php if (isset($periode)) {
                                                                                            if ($periode == 'p2') {
                                                                                                echo 'selected';
                                                                                            } else {
                                                                                                echo 'style="display: none;"';
                                                                                            }
                                                                                        } ?>>Periode II</option>
                                                    <option value="bulanan" class="karyawan" <?php if (isset($periode)) {
                                                                                                    if ($periode == 'bulanan') {
                                                                                                        echo 'selected';
                                                                                                    } else {
                                                                                                        echo 'style="display: none;"';
                                                                                                    }
                                                                                                } ?>>Bulanan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Bulan :</label>
                                            <div class="col-lg-3">
                                                <select class="form-control" id="bulan" name="txtbulan">
                                                    <option value="">--Pilih--</option>
                                                    <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                        <option value="<?= $i ?>" <?php if (isset($bln)) {
                                                                                        if ($bln == $i) {
                                                                                            echo 'selected';
                                                                                        }
                                                                                    } ?>><?= $bulan[$i]; ?></option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Tahun :</label>
                                            <div class="col-lg-3">
                                                <select class="form-control" name="txttahun" id="tahun">
                                                    <?php for ($i = date('Y') - 2; $i <= (date('Y')); $i++) {
                                                        if ($i == date('Y')) { ?>
                                                            <option value="<?php echo $i; ?>" selected><?= $i; ?></option>
                                                        <?php
                                                        } else { ?>
                                                            <option value="<?php echo $i; ?>" <?php if (isset($tahun)) {
                                                                                                    if ($tahun == $i) {
                                                                                                        echo 'selected';
                                                                                                    }
                                                                                                } ?>><?= $i; ?></option>
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
                        <div class="tools"></div>
                    </div>
                    <div class="portlet-body">

                    </div>
                </div>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="table-responsive" id="loader">
                        <table class="table table-striped table-bordered table-hover" id="dataTable">
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
                                    <td style="text-align: center;"><?php if (isset($val_sum_bayar)) {
                                                                        echo number_format($val_sum_bayar, 0, ',', '.');
                                                                    } ?></td>
                                    <td colspan="5"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
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
                <div id="idDetail"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Javascript Modal -->
<script type="text/javascript">
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
        let periode = $("#periode").val();
        let bulan = $("#bulan").val();
        let tahun = $("#tahun").val();
        let tk_cek = $("input[type='radio']:checked").val();

        $('#loader').html('<p style="text-align:center;"><img src="<?php echo base_url(); ?>assets/gif/giphy.gif"></p>');

        if (!periode || bulan == '') {
            alert('Wajib Pilih Periode');
            window.location.reload();
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
                        $("#loader").html(datas);
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

    // instalasi datatable
    $(document).ready(function() {
        var table = $('.table').DataTable({
            processing: true,
            responsive: false,
            serverSide: true,
            order: [
                [0, "asc"]
            ],
            ajax: {
                type: "POST",
                url: "<?= base_url(); ?>Mnt_Approval/showMntApproval"
            },
            deferRender: true,
            aLengthMenu: [
                [10, 20, 50, 100],
                [10, 20, 50, 100]
            ], // Combobox Limit
            columnDefs: [{
                    targets: [16],
                    visible: true,
                },
                {
                    targets: 0,
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).css('text-align', 'center')
                    }
                },
                {
                    targets: 1,
                    createdCell: function(td, cellData, rowData, row, col) {
                        if (rowData[1] == 'LAUNDRY 1 (MESS APPLE)') {
                            $(td).css('background-color', '#ccffff', 'text-align', 'center')
                        } else if (rowData[1] == 'LAUNDRY 2 (MESS KOKIO)') {
                            $(td).css('background-color', '#ffcccc')
                        }
                    }
                },
                {
                    targets: 3,
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).css('text-align', 'center')
                    }
                },
                {
                    targets: 4,
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).css('text-align', 'center')
                    }
                },
                {
                    targets: 5,
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).css('text-align', 'center')
                    }
                },
                {
                    targets: 7,
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).css('text-align', 'center')
                    }
                },
                {
                    targets: 11,
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).css('text-align', 'center')
                    }
                },
                {
                    targets: 12,
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).css('text-align', 'center')
                    }
                },
                {
                    targets: 14,
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).css('text-align', 'center')
                    }
                },
            ],
            "search": {
                "regex": true
            }
        });
    });
</script>
<!-- End Javascript Modal -->