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
                    <div class="tools"> </div>
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
                                                    <?php 
                                                } ?>
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
                                                    <?php 
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-lg-12" style="margin-left:14px; margin-top:15px;">
                                        <div class="row">
                                            <div class="form-group col-lg-2 col-lg-5">
                                                <button type="submit" class="btn btn-primary" id="filterData"><i class="fa fa-filter"></i> Filter Data</button>
                                                <!-- <button type="button" class="btn" style="background: #1D9D74; color: white;" id="ajaxFilter"><i class="fa fa-search"></i> Filter Ajax</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
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
                                <?php if ($this->session->userdata('group_user') == 1 || $this->session->userdata('group_user') == 166) { ?>
                                    <th class="text-center" colspan="2">Actions</th>
                                    <?php
                                } else { ?>
                                    <th class="text-center" rowspan="2">Actions</th>
                                    <?php 
                                } ?>
                            </tr>
                            <tr class="bg-primary">
                                <th class="text-center">Transaksi Terima</th>
                                <th class="text-center">Selesai Dikerjakan</th>
                                <th class="text-center">Telah Diambil</th>
                                <?php if ($this->session->userdata('group_user') == 1 || $this->session->userdata('group_user') == 166) { ?>
                                    <th class="text-center">Lihat Data</th>
                                    <th class="text-center">Restore Data</th>
                                    <?php
                                } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($get_monitoring)) {
                                $val_sum_bayar = 0;
                                foreach ($get_monitoring as $get) {
                                    if (is_numeric($get->TotalTagihan)) {
                                        $val_sum_bayar += $get->TotalTagihan;
                                    }
                                }
                            } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="12" style="text-align: center;"><b>TOTAL KESELURUHAN</b></td>
                                <td style="text-align: center;">
                                    <?php if (isset($val_sum_bayar)) { echo number_format($val_sum_bayar, 0, ',', '.'); } ?>
                                </td>
                                <td colspan="4"></td>
                            </tr>
                        </tfoot>
                    </table>
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
    function detail(clicked_id) {
        $.post("<?php echo site_url(); ?>Mnt_Laundry/ModalDetailItem?id=" + clicked_id, function(data) {
            $('#idDetail').html(data);
        });
        $('#MyModal').modal('show');
    }
    // 48247
    function restore(clicked_id) {
        window.location.href = `<?php echo site_url(); ?>Mnt_Laundry/RestoreLap/${clicked_id}`
    }

    $(document).ready(function() {    
        // DataTables initialisation
        var table = $('.table').DataTable({
            processing: true,
            responsive: false,
            serverSide: true,
            order: [[ 0, "asc" ]],
            ajax: {
                type: "POST",
                url: "<?= base_url();?>C_dataTables/show"
            },
            deferRender: true,
            aLengthMenu: [[10, 20, 50, 100],[ 10, 20, 50, 100]], // Combobox Limit
            columnDefs: [
                {
                    targets: [ 16 ],
                    visible: true,
                },
                {
                    targets: 0,
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).css('text-align', 'center')
                    }
                },
                {
                    targets: 1,
                    createdCell: function (td, cellData, rowData, row, col) {
                        if ( rowData[1] == 'LAUNDRY 1 (MESS APPLE)' ) {
                            $(td).css('background-color', '#ccffff', 'text-align', 'center')
                        } else if ( rowData[1] == 'LAUNDRY 2 (MESS KOKIO)' ) {
                            $(td).css('background-color', '#ffcccc')
                        }
                    }
                },
                {
                    targets: 3,
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).css('text-align', 'center')
                    }
                },
                {
                    targets: 4,
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).css('text-align', 'center')
                    }
                },
                {
                    targets: 5,
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).css('text-align', 'center')
                    }
                },
                {
                    targets: 7,
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).css('text-align', 'center')
                    }
                },
                {
                    targets: 11,
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).css('text-align', 'center')
                    }
                },
                {
                    targets: 12,
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).css('text-align', 'center')
                    }
                },
                {
                    targets: 14,
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).css('text-align', 'center')
                    }
                },
            ],
            "search": {
              "regex": true
            }
        });

        function Ajax_data(){
            let tanggal_1           = $('.tanggal_1').val();
            let tanggal_2           = $('.tanggal_2').val();
            let status_pelanggan    = $('.status_pelanggan').val();
            let jenis_pembayaran    = $('.jenis_pembayaran').val();
            let status_laundry      = $('.status_laundry').val();

            $('#loader').html('<p style="text-align:center;"><img src="<?php echo base_url();?>assets/gif/giphy.gif"></p>');

            if (tanggal_1 != '' && tanggal_2 != '' && status_pelanggan != '' && jenis_pembayaran != '' && status_laundry != '') {
                $.ajax({
                    type: "GET",
                    dataType: "html",
                    url: `<?php echo base_url('Mnt_Laundry/ajaxListDataMonitoring')?>/${tanggal_1}/${tanggal_2}/${jenis_pembayaran}/${status_pelanggan}/${status_laundry}`,
                    success: function(response){
                        if (response == ''){
                            alert('Tidak ada data');
                        } else {
                            $("#loader").html(response);                                              
                        }
                    }
                });
            } else if (tanggal_1 != '' && tanggal_2 != '' && status_pelanggan != '') {
                $.ajax({
                    type: "GET",
                    dataType: "html",
                    url: `<?php echo base_url('Mnt_Laundry/ajaxFilterMntByStatus')?>/${tanggal_1}/${tanggal_2}/${status_pelanggan}`,
                    success: function(response){
                        if (response == ''){
                            alert('Tidak ada data');
                        } else {
                            $("#loader").html(response);                                              
                        }
                    }
                });
            } else {
                alert('Silahkan pilih kolom filter dulu !!');
                window.location.reload();
            }

            // if (tanggal_1 != '' && tanggal_2 != '') {
            //     $.ajax({
            //         type: "GET",
            //         dataType: "html",
            //         url: `<?php echo base_url('Mnt_Laundry/ajaxFilterMntByDate')?>/${tanggal_1}/${tanggal_2}`,
            //         success: function(response){
            //             if (response == ''){
            //                 alert('Tidak ada data');
            //             } else {
            //                 $("#loader").html(response);
            //             }
            //         }
            //     });   
            // }
        }

        // $('#filterData').click(function (e) { 
        //     e.preventDefault();
        //     // table.destroy();
        //     Ajax_data();
        // });
        
        const filterData = document.getElementsByTagName('button')[0];
        filterData.addEventListener('click', function (e) {
            e.preventDefault();
            Ajax_data();
        });
    });
</script>