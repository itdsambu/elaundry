<script src="<?php echo base_url(); ?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="form-body">
                        <div class="row" style="background-color:#F4FAED;">
                            <form action="<?php echo base_url('Laundry_Rekap/harian'); ?>" method="POST">
                                <div class="col-md-6 col-md-offset-3">
                                    <br>
                                    <label for="tanggal_awal" class="col-sm-3 control-label" style="text-align:left;">Tanggal Terima</label>
                                    <div class="form-group col-sm-3">
                                        <input type="date" class="form-control tanggal_awal" id="tanggal_awal" name="tanggal_awal" value="<?php echo set_value('tanggal_awal'); ?>" required>
                                        <?php //echo set_value('tanggal_awal'); 
                                        ?>

                                    </div>
                                    <label for="tanggal_akhir" class="col-sm-1 control-label" style="text-align:left;">s/d</label>
                                    <div class="form-group col-sm-3">
                                        <input type="date" class="form-control tanggal_akhir" id="tanggal_akhir" name="tanggal_akhir" value="<?php echo set_value('tanggal_akhir'); ?>" required>
                                        <?php //echo set_value('tanggal_akhir'); 
                                        ?>
                                    </div>
                                    <div class="form-group col-sm-1" style="text-align:right;">
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
                        <span class="caption-subject bold uppercase">Rekap Laundry</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
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

                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="btn-group pull-right">
                                    <button type="button" name="btn_add" id="btn_add" value="" class="modal_forminput btn green">Tambah Data <i class="fa fa-plus-square"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table id="dataLaundry" class="table table-bordered table-condensed flip-content flip-scroll">
                        <thead class="flip-content">
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama</th>
                                <th style="text-align: center;">Nik</th>
                                <th style="text-align: center;">Status Pekerja</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            if (isset($dt_petugas)) {
                                $no = 1;

                                foreach ($dt_petugas as $dt) {
                                    if ($dt->nik != null) { ?>
                                        <tr class="text-center">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $dt->NamaUser; ?></td>
                                            <td><?php echo $dt->nik;
                                                ?></td>
                                            <td><?php echo ($dt->status_petugas == '1') ? "PELAKSANA" : "BUKAN PELAKSANA"; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('Laundry_Rekap/detail_harian/' . $dt->nik . '/' . $tanggal_awal . '/' . $tanggal_akhir) ?>" class="btn btn-primary btn-circle">Lihat Detail</a>
                                            </td>

                                        </tr>
                                        <?php 
                                    }
                                }
                            } else { ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <!-- <td></td> -->
                                    <!-- <td></td> -->
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>

<!-- Modal Form -->
<!-- <div class="modal fade" id="modal_form" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog" style="width: 50%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Tambah Pos Laundry :</b></h4>
            </div>
            <form action="" id="mdl_form" method="post" role="form" autocomplete="off" class="form-horizontal">
                <div class="modal-body">
                    <div class="page-content">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="mdl_detail_id" id="mdl_detail_id" class="form-control mdl_detail_id">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Nama Laundry <span class="required">
                                            * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="nama_laundry" id="nama_laundry" class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Kode Laundry <span class="required">
                                            * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="kode_laundry" id="kode_laundry" class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Alamat Laundry <span class="required">
                                            * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="alamat" id="alamat" class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Efektif <span class="required">
                                            * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" id="tanggal_efektif" name="tanggal_efektif" value="" required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Warna Laundry <span class="required">
                                            * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="color" class="form-control" name="warna_laundry" id="warna_laundry">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn btn-primary" name="simpan" value="submit"><i class="fa fa-floppy-o"></i> Simpan</button>
                            <a type="button" href="<?= site_url('Laundry/masterPosLaundry'); ?>" class="btn btn-danger"><i class="fa fa-undo"></i> Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#dataLaundry').dataTable({
            "order": [0, 'asc'],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "pageLength": 10
        });

        $('#btn_simpan').click(function() {
            var tanggal_selesai = $('.modal_tanggal_selesai').val();
            var tanggal_terima = $('.modal_tanggal_terima').val();

            if (tanggal_selesai.trim() != '') {
                $.ajax({
                    method: 'post',
                    url: '<?php echo base_url('laundry/update_selesai'); ?>',
                    data: $('#form_modal input, select').serialize(),
                    success: function(data) {
                        if (data == '100') {
                            $('#modal-update').modal('hide');
                            alert("Data sudah direkap, tanggal selesai tidak bisa diinputkan ditanggal ini !!!");
                        } else {
                            $('#modal-update').modal('hide');
                            alert(data);
                            window.location.reload();
                        }
                    }
                });
            } else {
                alert('Maaf Tanggal Selesai Tidak Boleh Kosong!!');
                $(this).focus();
            }
        });

    });
</script>