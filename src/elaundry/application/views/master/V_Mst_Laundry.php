<script src="<?php echo base_url(); ?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase"> Pos Laundry</span>
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

                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="table01">
                        <thead>
                            <tr>
                                <th>Nama Laundry</th>
                                <th>Kode Laundry</th>
                                <!-- <th>Status</th> -->
                                <th>Alamat</th>
                                <th>Tanggal Efektif</th>
                                <th>Kode Warna</th>
                                <!-- <th>Created Date</th>
                                <th>Updated Date</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listmasterpos as $get) : ?>
                                <tr>
                                    <td><?php echo $get->nama_laundry
                                        ?></td>
                                    <td><?php echo $get->kode_laundry
                                        ?></td>
                                    <td><?php echo $get->alamat
                                        ?></td>
                                    <td><?php if ($get->tanggal_efektif != NULL) {
                                            echo date('d M Y', strtotime($get->tanggal_efektif));
                                        } ?></td>
                                    <td> <span style="background-color: <?= $get->warna_laundry; ?>;padding: 5px;margin-top: 5px;"><?= $get->warna_laundry; ?></span></td>

                                    <td class="text-center">
                                        <a type="button" class="btn btn-icon-only blue modal_forminput" name="btn_update" title="Edit" value="<?= $get->detail_id ?>"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo site_url('Laundry/masterPosLaundry/delete/') . $get->detail_id; ?>" class="btn btn-icon-only red" title="Hapus" onClick="return confirm('Hapus <?php echo $get->nama_laundry; ?> ?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>

<!-- Modal Form -->
<div class="modal fade" id="modal_form" tabindex="-1" role="basic" aria-hidden="true">
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
                                        <!-- <div class="input-group input-big date date-picker" data-date-format="dd-mm-yyyy" data-date-viewmode="years" data-date-minviewmode="months">
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                            </span> -->
                                        <input type="date" class="form-control" id="tanggal_efektif" name="tanggal_efektif" value="" required>
                                        <!-- </div> -->
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
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table01').dataTable({
            "order": [0, 'asc'],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "pageLength": 10
        });
    });

    $(".modal_forminput").on("click", function() {
        if ($(this).attr("name") == 'btn_add') {
            $("#mdl_form").attr("action", "<?= base_url('Laundry/masterPosLaundry/add') ?>");

            $(".modal-title").empty().append('Tambah Master Laundry');
            $("#nama_laundry").val('');
            $("#kode_laundry").val('');
            $("#alamat").val('');
            $("#tanggal_efektif").val('');
            $("#warna_laundry").val('');
            $('#modal_form').modal('show');
        }
    });

    $("#table01").on("click", ".modal_forminput", function() {
        var detail_id = $(this).attr("value").trim();
        if ($(this).attr("name") == 'btn_update' && detail_id != '' && confirm('Ubah data?')) {
            $("#mdl_form").attr("action", "<?= base_url('Laundry/masterPosLaundry/update') ?>");

            $(".modal-title").empty().append('Update Pos Laundry');
            $(".mdl_detail_id").val(detail_id);

            $.ajax({
                type: "post",
                url: "<?= base_url(); ?>/Laundry/masterPosLaundry/get_dt_update",
                data: "id=" + detail_id,
                success: function(data) {
                    var datan = data.trim().split('//');
                    $("#nama_laundry").val(datan[0]);
                    $("#kode_laundry").val(datan[1]);
                    $("#alamat").val(datan[2]);
                    var now = new Date(datan[3]);

                    var day = ("0" + now.getDate()).slice(-2);
                    var month = ("0" + (now.getMonth() + 1)).slice(-2);

                    var today = now.getFullYear() + "-" + (month) + "-" + (day);

                    $("#tanggal_efektif").val(today);
                    $("#warna_laundry").val(datan[4]);
                    console.log(today)
                }
            });
            $('#modal_form').modal('show');
        }
    });
</script>