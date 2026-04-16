<script src="<?php echo base_url(); ?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <div class="form-body">
                        <div class="row" style="background-color:#F4FAED;">
                            <?php if ($status_laundry == 1) { ?>
                                <form action="<?php echo base_url('Penerimaan_laundry'); ?>" method="POST">
                                <?php 
                            } else { ?>
                                <form action="<?php echo base_url('Pengambilan_laundry'); ?>" method="POST">
                                <?php 
                            } ?>
                                <div class="col-md-6 col-md-offset-3">
                                    <br>
                                    <label for="pos_ldy" class="col-sm-3 control-label" style="text-align:left;">Laundry</label>
                                    <div class="form-group col-sm-6">
                                        <select name="pos_ldy" id="pos_ldy" class="form-control pos_ldy">
                                            <option value="">- pilih -</option>
                                            <?php foreach ($dt_allpos_laundry as $dt_allpos_laundry_row) { ?>
                                                <option value="<?= $dt_allpos_laundry_row->detail_id ?>" style="background-color: <?= $dt_allpos_laundry_row->warna_laundry ?>" <?php echo set_select('pos_ldy', $dt_allpos_laundry_row->detail_id) ?>><?= $dt_allpos_laundry_row->nama_laundry . ' (' . $dt_allpos_laundry_row->alamat . ')'; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-3" style="text-align:right;">
                                        <button type="submit" class="btn btn-primary" name="btntampil" id="btntampil">Tampil</button>
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
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase">
                            <?php if ($status_laundry == 1) { ?>
                                Data Penerimaan
                            <?php } else { ?>
                                Data Pengambilan
                            <?php } ?>
                        </span>
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <!-- alert -->
                    <?php if ($this->input->get('msg') == "success") {
                        echo "<div class='alert alert-success'>";
                        echo "<strong>Sukses !!!</strong> Data berhasil disimpan.";
                        echo "</div>";
                    } elseif ($this->input->get('msg') == "success2") {
                        echo "<div class='alert alert-success'>";
                        echo "<strong>Sukses !!!</strong> Data berhasil dihapus.";
                        echo "</div>";
                    } elseif ($this->input->get('msg') == "success3") {
                        echo "<div class='alert alert-success'>";
                        echo "<strong>Sukses !!!</strong> Data berhasil diupdate.";
                        echo "</div>";
                    } elseif ($this->input->get('msg') == "failed") {
                        echo "<div class='alert alert-danger'>";
                        echo "<strong>Gagal !!!</strong> Data tidak dapat disimpan.";
                        echo "</div>";
                    } ?>

                    <?php if ($status_laundry == 1) { ?>
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="btn-group pull-right">
                                        <a href="<?php echo site_url('Penerimaan_laundry/tambahData') ?>" class="btn green">
                                            Transaksi Baru <i class="fa fa-plus-square"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="table">
                        <thead>
                            <tr 
                                <?php if ($status_laundry == 1) {
                                    echo 'style="background-color:#499003;color:white;"';
                                } else {
                                    echo 'style="background-color:#949a0e;color:white;"';
                                } ?>>
                                <th class="text-center" rowspan="2" colspan="1">No.</th>
                                <th class="text-center" rowspan="2" colspan="1">Lokasi Laundry</th>
                                <th class="text-center" rowspan="2" colspan="1">No. Nota</th>
                                <th class="text-center" rowspan="2" colspan="1">Tanggal Terima</th>
                                <?php if ($status_laundry != 1) { ?>
                                    <th class="text-center" rowspan="2" colspan="1">Tanggal Selesai</th>
                                    <?php 
                                } ?>
                                <th class="text-center" rowspan="2" colspan="1">Nama Pelanggan</th>
                                <th class="text-center" rowspan="2" colspan="1">Status Pelanggan</th>
                                <th class="text-center" rowspan="2" colspan="1">NIK</th>
                                <th class="text-center" rowspan="2" colspan="1">Departemen</th>
                                <th class="text-center" rowspan="2" colspan="1">Jenis Layanan</th>
                                <th class="text-center" rowspan="2" colspan="1">Status Laundry</th>
                                <th class="text-center" rowspan="2" colspan="1">Foto Label/Pelanggan</th>
                                <th class="text-center" rowspan="2" colspan="1">Cetak Nota (Mobile)</th>
                                <?php if ($status_laundry == 1) {
                                    if ($this->session->userdata('group_user') == 1 || $this->session->userdata('group_user') == 166) {
                                        echo '<th class="text-center" rowspan="1" colspan="2">Aksi</th>';
                                    } else {
                                        echo '<th class="text-center" rowspan="1">Aksi</th>';
                                    }
                                } else {
                                    if ($this->session->userdata('group_user') == 1 || $this->session->userdata('group_user') == 166) {
                                        echo '<th class="text-center" rowspan="1" colspan="2">Aksi</th>';
                                    } else {
                                        echo '<th class="text-center" rowspan="1">Aksi</th>';
                                    }
                                } ?>
                            </tr>
                            <tr 
                                <?php if ($status_laundry == 1) {
                                    echo 'style="background-color:#499003;color:white;"';
                                } else {
                                    echo 'style="background-color:#949a0e;color:white;"';
                                } ?>>
                                <?php if ($status_laundry == 1) {
                                    if ($this->session->userdata('group_user') == 1 || $this->session->userdata('group_user') == 166) {
                                        echo '<th class="text-center">Update</th>
                                            <th class="text-center">Hapus</th>';
                                    } else {
                                        echo ' <th class="text-center">Update</th>';
                                    }
                                } else {
                                    if ($this->session->userdata('group_user') == 1 || $this->session->userdata('group_user') == 166) {
                                        echo ' <th class="text-center">Update</th>
                                            <th class="text-center">Restore</th>';
                                    } else {
                                        echo ' <th class="text-center">Update</th>';
                                    }
                                } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            if (count($getDataHeader) > 0) {
                                foreach ($getDataHeader as $get) {
                                    $no++;
                                    $awal  = new DateTime($get->TglTransaksi);
                                    $akhir = new DateTime(); // waktu sekarang
                                    $diff  = $awal->diff($akhir);
                                    $lebih = $diff->days >= 3;
                                    if ($get->IDStatusPelayanan == 1 && $lebih == TRUE) {
                                        $background = 'style="background-color : #FCE1DF;"';
                                    } else {
                                        $background = '';
                                    } ?>
                                    <tr <?php $background ?>>
                                        <td class="text-center"><?php echo $no ?></td>

                                        <?php if ($get->IDStatusPelayanan == 1) { ?>
                                            <td><?= $get->ldy_nama . ' (' . $get->ldy_alamat . ')'; ?></td>
                                            <?php 
                                        } else { ?>
                                            <td style="background-color: <?= $get->ldy_warna; ?>"><?= $get->ldy_nama . ' (' . $get->ldy_alamat . ')'; ?></td>
                                            <?php 
                                        } ?>
                                        
                                        <td class="text-center"><?php echo $get->NoNota ?></td>

                                        <?php if ($get->IDStatusPelayanan == 1) { ?>
                                            <td class="text-center"><?php echo date('d-m-Y', strtotime($get->TglTransaksi)) ?></td>
                                            <?php 
                                        } else { ?>
                                            <td class="text-center"><?php echo date('d-m-Y', strtotime($get->TglTransaksi)) ?></td>
                                            <td class="text-center"><?php echo date('d-m-Y', strtotime($get->SelesaiDate)) ?></td>
                                            <?php 
                                        } ?>

                                        <td><?php echo $get->Nama ?></td>

                                        <td class="text-center">
                                            <?php if ($get->StatusTK == 1) {
                                                echo 'Karyawan';
                                            } else if ($get->StatusTK == 2) {
                                                echo 'Harian/Borongan';
                                            } else if ($get->StatusTK == 3) {
                                                echo 'Umum';
                                            } ?>
                                        </td>

                                        <td class="text-center"><?php echo $get->NIK ?></td>
                                        <td class="text-center"><?php echo $get->DeptAbbr ?></td>

                                        <td>
                                            <?php foreach ($get_MstHargaLaundry as $row2) {
                                                if ($get->IDLayanan == $row2->IDLayanan) {
                                                    echo $row2->JenisLayanan;
                                                }
                                            } ?>
                                        </td>

                                        <td class="text-center">
                                            <?php foreach ($get_MstStatusLaundry as $row3) {
                                                if ($get->IDStatusPelayanan == $row3->IDStatusPelayanan && $get->IDStatusPelayanan == 2) {
                                                    echo '<span class="label label-sm label-warning">' . $row3->StatusPelayanan . '</span>';
                                                } elseif ($get->IDStatusPelayanan == $row3->IDStatusPelayanan && $get->IDStatusPelayanan == 4) {
                                                    echo '<span class="label label-sm label-primary">' . $row3->StatusPelayanan . '</span>';
                                                }
                                            } ?>
                                        </td>

                                        <td class="text-center">
                                            <?php if ($get->UploadFile == 1) { ?>
                                                <a class="btn btn-circle btn-sm green-seagreen" onclick="view(this.id)" id="<?php echo $get->ID ?>">
                                                    <i class="fa fa-file-image-o"></i>
                                                    label<?= $get->ID ?>.jpg
                                                </a>
                                            <?php } ?>
                                        </td>

                                        <td class="text-center">
                                            <a href="psgthermalprint://new<?= $get->ID; ?>" class="btn btn-info btn-circle"> Cetak Nota (Mobile)</a>
                                        </td>

                                        <?php if ($status_laundry == 1) { ?>
                                            <td class="text-center">
                                                <?php if ($get->IDStatusPelayanan == 1) { ?>
                                                    <a class="btn btn-circle btn-icon-only btn-warning" id="<?php echo $get->ID ?>" onclick="detail(this.id)" title="UPDATE"><i class="fa fa-eye"></i></a>
                                                    <?php 
                                                } else if ($get->IDStatusPelayanan == 2 || $get->IDStatusPelayanan == 4) { ?>
                                                    <a class="btn btn-circle btn-icon-only btn-primary" href="<?php echo site_url('Pengambilan_laundry/UpdateDiambil/' . $get->ID . '/' . $get->IDStatusPelayanan); ?>"><i class="fa fa-eye"></i></a>
                                                    <?php 
                                                } else if ($get->IDStatusPelayanan == 3) { ?>
                                                    <a class="btn btn-circle btn-icon-only btn-success" id="<?php echo $get->ID ?>" onclick="detail(this.id)" title="LIHAT"><i class="fa fa-eye"></i></a>
                                                    <?php 
                                                } ?>
                                            </td>
                                            <?php if ($this->session->userdata('group_user') == 1 || $this->session->userdata('group_user') == 166) { ?>
                                                <td class="text-center">
                                                    <a class="btn btn-circle btn-icon-only red" title="HAPUS" href="<?php echo site_url('Penerimaan_laundry/delete') . "/" . $get->ID; ?>" onClick="return confirm('Hapus data laundry <?php echo $get->NoNota ?> - <?php echo $get->Nama ?>?')"><i class="fa fa-trash"></i></a>
                                                </td>
                                                <?php
                                            } ?>
                                            
                                            <?php 
                                        } else { ?>
                                            <td class="text-center">
                                                <?php if ($get->IDStatusPelayanan == 1) { ?>
                                                    <a class="btn btn-circle btn-icon-only btn-warning" id="<?php echo $get->ID ?>" onclick="detail(this.id)" title="UPDATE"><i class="fa fa-eye"></i></a>
                                                    <?php 
                                                } else if ($get->IDStatusPelayanan == 2 || $get->IDStatusPelayanan == 4) { ?>
                                                    <a class="btn btn-circle btn-icon-only btn-primary" href="<?php echo site_url('Pengambilan_laundry/UpdateDiambil/' . $get->ID . '/' . $get->IDStatusPelayanan); ?>"><i class="fa fa-eye"></i></a>
                                                    <?php 
                                                } else if ($get->IDStatusPelayanan == 3) { ?>
                                                    <a class="btn btn-circle btn-icon-only btn-success" id="<?php echo $get->ID ?>" onclick="detail(this.id)" title="LIHAT"><i class="fa fa-eye"></i></a>
                                                    <?php 
                                                } ?>
                                            </td>
                                            <?php if ($this->session->userdata('group_user') == 1 || $this->session->userdata('group_user') == 166) { ?>
                                                <td class="text-center">
                                                    <a class="btn btn-circle btn-icon-only btn-success" href="<?php echo site_url('Pengambilan_laundry/RestoreLap/' . $get->ID); ?>" title="Restore Laporan"><i class="fa fa-undo"></i></a>
                                                </td>
                                                <?php
                                            } ?>
                                          
                                            <?php 
                                        } ?>
                                    </tr>
                                    <?php
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table').dataTable({
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
<!-- <script type="text/javascript">
   
</script> -->