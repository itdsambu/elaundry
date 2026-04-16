<script src="<?php echo base_url(); ?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!--<link href="--><?php //echo base_url(); ?><!--assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />-->
<link href="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

<table class="table table-striped table-bordered table-hover table-header-fixed" id="tabeldata2">
    <thead>
        <tr class="bg-primary">
            <th class="text-center no" rowspan="2">No.</th>
            <th class="text-center" rowspan="2">No. Nota</th>
            <th class="text-center" colspan="3" rowspan="1">Tanggal</th>
            <th class="text-center" rowspan="2">Nama Pelanggan</th>
            <th class="text-center" rowspan="2">Status Pelanggan</th>
            <th class="text-center" rowspan="2">NIK</th>
            <th class="text-center" rowspan="2">Jenis Pembayaran</th>
            <th class="text-center" rowspan="2">Jenis Layanan</th>
            <th class="text-center" rowspan="2">Total Biaya (Rp)</th>
            <th class="text-center" rowspan="2">Status Laundry</th>
            <th class="text-center" rowspan="2">Dibuat Oleh</th>
            <th class="text-center" rowspan="2">Diapprove Oleh</th>
            <th class="text-center" rowspan="2">Tanggal Approve</th>
            <th class="text-center" rowspan="2">Action</th>
        </tr>
        <tr class="bg-primary">
            <th class="text-center" colspan="1" rowspan="1">Transaksi /Terima</th>
            <th class="text-center" colspan="1" rowspan="1">Selesai Dikerjakan</th>
            <th class="text-center" colspan="1" rowspan="1">Telah Diambil</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($get_monitoring) {
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
            <?php $sum += $get->TotalTagihan;
            }
        } else { ?>
            <tr>
                <td colspan="15" class="text-center">Data Transaksi tidak ditemukan</td>
            </tr>
        <?php } ?>
        <?php if ($get_monitoring) { ?>
    <tfoot>
        <tr>
            <td class="text-center bg-primary" colspan="10"><b>Grand Total Biaya (Rp)</b></td>
            <td class="text-right" style="padding-right: 9px;">
                <b><?php if (isset($sum)) {
                        echo number_format($sum, 0, ',', '.');
                    } ?></b>
            </td>
            <td class="text-center bg-primary" colspan="5"></td>
        </tr>
    </tfoot>
<?php } ?>
</tbody>
</table>

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

<script src="<?php echo base_url(); ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/pages/scripts/table-datatables-scroller.min.js" type="text/javascript"></script>

<script type="text/javascript">
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
