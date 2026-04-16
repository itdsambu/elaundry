<script src="<?php echo base_url(); ?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase">Rekap Laundry</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="btn-group">
                                <?php if (count($dt_header) > 0) { ?>
                                    <a id="table_flow_new" class="btn btn-circle btn-success" style="margin-bottom: 20px" href='<?php echo base_url("C_export_excel_rekap_laundry_harian/export_excel/" . $this->uri->segment(3) . "/" . $this->uri->segment(4) . "/" . $this->uri->segment(5)); ?>'>Export Excel</a>
                                <?php } ?>
                            </div>
                            <br>
                            <table style="width:80%;font-weight: bold;" class="table">
                                <tr>
                                    <td width="30%" style="border-top: none;">Pengawas</td>
                                    <td style="border-top: none;">:</td>
                                    <td style="border-top: none;" width="68%"><?= $petugas ?></td>
                                </tr>
                                <tr>
                                    <td width="30%" style="border-top: none;">Periode</td>
                                    <td style="border-top: none;">:</td>
                                    <?php if (strtotime($this->uri->segment(4)) ==  strtotime($this->uri->segment(5))) { ?>
                                        <td width="68%" style="border-top: none;"><?= date("d-m-Y", strtotime($this->uri->segment(4))) ?></td>
                                    <?php } else { ?>
                                        <td width="68%" style="border-top: none;"><?= date("d-m-Y", strtotime($this->uri->segment(4))) ?> s.d <?= date("d-m-Y", strtotime($this->uri->segment(5)))  ?></td>
                                    <?php } ?>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="dataLaundry" class="table table-bordered table-condensed flip-content flip-scroll">
                                <thead class="flip-content">
                                    <tr>
                                        <th style="text-align: center;" rowspan="2">No</th>
                                        <th style="text-align: center;" rowspan="2">Nama</th>
                                        <th style="text-align: center;" rowspan="2">Nik</th>
                                        <th style="text-align: center;" rowspan="2">Departement</th>
                                        <th style="text-align: center;" rowspan="2">CV</th>
                                        <th style="text-align: center;" rowspan="2">Tanggal Terima Cucian</th>
                                        <th style="text-align: center;" rowspan="2">SETERIKA SELESAI</th>
                                        <th style="text-align: center;" rowspan="2">TGL PENGAMBILAN BAJU</th>
                                        <th style="text-align: center;" colspan="7">Jumlah</th>
                                    </tr>
                                    <tr>
                                        <th style="border-top: 1px solid #DDDDDD">Baju</th>
                                        <th style="border-top: 1px solid #DDDDDD">Celana Panjang</th>
                                        <th style="border-top: 1px solid #DDDDDD">Celana Pendek</th>
                                        <th style="border-top: 1px solid #DDDDDD">Jaket</th>
                                        <th style="border-top: 1px solid #DDDDDD">Sprai / Selimut</th>
                                        <th style="border-top: 1px solid #DDDDDD">Lain-Lain</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($dt_header)) {
                                        $no = 1;

                                        foreach ($dt_header as $dt) {
                                    ?>
                                            <tr class="text-center">
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $dt->Nama; ?></td>
                                                <td><?php echo $dt->NIK; ?></td>
                                                <td><?php echo $dt->DeptAbbr; ?></td>
                                                <td><?php echo $dt->Perusahaan; ?></td>
                                                <td><?php echo  date("d-m-Y", strtotime($dt->TglTransaksi)) ?></td>
                                                <td></td>
                                                <td></td>
                                                <td><?php echo $dt->baju; ?></td>
                                                <td><?php echo $dt->celana_panjang; ?></td>
                                                <td><?php echo $dt->celana_pendek; ?></td>
                                                <td><?php echo $dt->jaket; ?></td>
                                                <td><?php echo $dt->sprai_selimut; ?></td>
                                                <td><?php echo $dt->lain; ?></td>

                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
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