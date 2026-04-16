<script src="<?= base_url(); ?>assets/custom/jquery-3.5.1.js" type="text/javascript"></script>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- Filter -->
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
                            <form method="post">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="col-lg-4">
                                            <label class="control-label">Dari Tanggal</label>
                                        </div>
                                        <div class="form-group col-lg-8">
                                            <input type="date" name="tanggal_1" id="tanggal_1" class="form-control text-center tanggal_1" value="<?php echo set_value('tanggal_1'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="col-lg-4">
                                            <label class="control-label">Sampai Tanggal</label>
                                        </div>
                                        <div class="form-group col-lg-8">
                                            <input type="date" name="tanggal_2" id="tanggal_2" class="form-control text-center tanggal_2" value="<?php echo set_value('tanggal_2'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 10px;">
                                        <div class="col-lg-4">
                                            <label class="control-label">Status Pelanggan</label>
                                        </div>
                                        <div class="form-group col-lg-8">
                                            <select name="status_pelanggan" id="status_pelanggan" class="status_pelanggan form-control text-center">
                                                <option value="0">--pilih--</option>
                                                <option value="KARYAWAN">KARYAWAN</option>
                                                <option value="HARIAN/BORONGAN">HARIAN/BORONGAN</option>
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
                                                    <option value="<?= $bayar->JenisPembayaran ?>"><?= $bayar->JenisPembayaran ?></option>
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
                                                    <option value="<?= $status->StatusPelayanan ?>"><?= $status->StatusPelayanan ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-lg-12" style="margin-left:14px; margin-top:15px;">
                                        <div class="row">
                                            <div class="form-group col-lg-2">
                                                <button type="button" class="btn btn-primary" id="filterData">
                                                    <i class="fa fa-filter"></i> Filter Data
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TABLE -->
            <div class="portlet light bordered">
                <div class="table-responsive" id="loader">
                    <table class="table table-striped table-bordered table-hover" id="dataTable">
                        <thead>
                            <tr class="bg-primary">
                                <th class="text-center" rowspan="2">No.</th>
                                <th class="text-center" rowspan="2">Lokasi Laundry</th>
                                <th class="text-center" rowspan="2">Nomor Nota</th>
                                <th class="text-center" colspan="3">Tanggal</th>
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
                                <?php if (in_array($this->session->userdata('group_user'), [1, 166])) { ?>
                                    <th class="text-center" colspan="2">Actions</th>
                                <?php } else { ?>
                                    <th class="text-center" rowspan="2">Actions</th>
                                <?php } ?>
                            </tr>
                            <tr class="bg-primary">
                                <th class="text-center">Transaksi Terima</th>
                                <th class="text-center">Selesai Dikerjakan</th>
                                <th class="text-center">Telah Diambil</th>
                                <?php if (in_array($this->session->userdata('group_user'), [1, 166])) { ?>
                                    <th class="text-center">Lihat Data</th>
                                    <th class="text-center">Restore Data</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- diisi oleh DataTables server-side -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="12" style="text-align:center;"><b>TOTAL KESELURUHAN (halaman ini)</b></td>
                                <td id="footerTotal" style="text-align:center;font-weight:bold;">-</td>
                                <td colspan="4"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-hidden="true">
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

<script type="text/javascript">
    function detail(clicked_id) {
        $.post("<?= site_url(); ?>Mnt_Laundry/ModalDetailItem?id=" + clicked_id, function(data) {
            $('#idDetail').html(data);
        });
        $('#MyModal').modal('show');
    }

    function restore(clicked_id) {
        if (confirm('Yakin ingin restore data ini?')) {
            window.location.href = "<?= site_url(); ?>Mnt_Laundry/RestoreLap/" + clicked_id;
        }
    }

    $(document).ready(function() {
        // DataTables server-side — TIDAK load semua data sekaligus
        var table = $('#dataTable').DataTable({
            processing: true,
            responsive: false,
            serverSide: true,
            order: [
                [0, "asc"]
            ],
            ajax: {
                type: "POST",
                url: "<?= base_url(); ?>C_dataTables/show"
            },
            deferRender: true,
            aLengthMenu: [
                [10, 20, 50, 100],
                [10, 20, 50, 100]
            ],
            columnDefs: [{
                    targets: 0,
                    className: 'text-center'
                },
                {
                    targets: 3,
                    className: 'text-center'
                },
                {
                    targets: 4,
                    className: 'text-center'
                },
                {
                    targets: 5,
                    className: 'text-center'
                },
                {
                    targets: 7,
                    className: 'text-center'
                },
                {
                    targets: 11,
                    className: 'text-center'
                },
                {
                    targets: 12,
                    className: 'text-center'
                },
                {
                    targets: 14,
                    className: 'text-center'
                },
                {
                    targets: 1,
                    createdCell: function(td, cellData) {
                        if (cellData == 'LAUNDRY 1 (MESS APPLE)') {
                            $(td).css('background-color', '#ccffff');
                        } else if (cellData == 'LAUNDRY 2 (MESS KOKIO)') {
                            $(td).css('background-color', '#ffcccc');
                        }
                    }
                }
            ],
            search: {
                regex: true
            },
            // Hitung total kolom Total Biaya (index 12) dari data halaman aktif
            drawCallback: function() {
                var api = this.api();
                var total = 0;
                api.column(12, {
                    page: 'current'
                }).data().each(function(val) {
                    var num = parseFloat(String(val).replace(/\./g, '').replace(',', '.'));
                    if (!isNaN(num)) total += num;
                });
                $('#footerTotal').text(
                    total > 0 ?
                    new Intl.NumberFormat('id-ID').format(total) :
                    '-'
                );
            }
        });

        // Filter AJAX (tidak pakai server-side DataTables, ganti tabel dengan hasil filter)
        $('#filterData').on('click', function() {
            var tanggal_1 = $('#tanggal_1').val();
            var tanggal_2 = $('#tanggal_2').val();
            var status_pelanggan = $('#status_pelanggan').val();
            var jenis_pembayaran = $('#jenis_pembayaran').val();
            var status_laundry = $('#status_laundry').val();

            if (!tanggal_1 || !tanggal_2) {
                alert('Silahkan isi Dari Tanggal dan Sampai Tanggal terlebih dahulu!');
                return;
            }

            $('#loader').html('<p style="text-align:center;"><img src="<?= base_url(); ?>assets/gif/giphy.gif"></p>');

            var url = '';
            if (tanggal_1 && tanggal_2 && status_pelanggan && status_pelanggan != '0' && jenis_pembayaran && status_laundry) {
                url = "<?= base_url('Mnt_Laundry/ajaxListDataMonitoring'); ?>/" +
                    tanggal_1 + "/" + tanggal_2 + "/" +
                    encodeURIComponent(jenis_pembayaran) + "/" +
                    status_pelanggan + "/" +
                    encodeURIComponent(status_laundry);
            } else if (tanggal_1 && tanggal_2 && status_pelanggan && status_pelanggan != '0') {
                url = "<?= base_url('Mnt_Laundry/ajaxFilterMntByStatus'); ?>/" +
                    tanggal_1 + "/" + tanggal_2 + "/" + status_pelanggan;
            } else if (tanggal_1 && tanggal_2) {
                url = "<?= base_url('Mnt_Laundry/ajaxFilterMntByDate'); ?>/" +
                    tanggal_1 + "/" + tanggal_2;
            } else {
                alert('Silahkan pilih kolom filter dulu!');
                window.location.reload();
                return;
            }

            $.ajax({
                type: "GET",
                dataType: "html",
                url: url,
                success: function(response) {
                    if (!response || response.trim() == '') {
                        alert('Tidak ada data');
                        window.location.reload();
                    } else {
                        $("#loader").html(response);
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan saat mengambil data. Silahkan coba lagi.');
                    window.location.reload();
                }
            });
        });
    });
</script>
