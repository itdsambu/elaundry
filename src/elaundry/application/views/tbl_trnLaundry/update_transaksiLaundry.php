<?php date_default_timezone_set('Asia/Jakarta'); ?>
<!DOCTYPE html>
<script src="<?php echo base_url(); ?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Pengambilan_laundry/UpdateData') ?>" enctype="multipart/form-data">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-file-text"></i>
                            <span class="caption-subject bold uppercase">Update Pengambilan</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                            <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-body">
                            <?php foreach ($getDataHdr as $hdr) {
                                $hdrid = $hdr->ID;
                                $laundry_stat = $hdr->IDStatusPelayanan; ?>
                                <div class="row">
                                    <div class="col-lg-3 col-md-5 col-sm-7 col-xs-12" style="padding:0;">
                                        <input type="hidden" name="ID" value="<?= $hdrid; ?>" readonly>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>Alamat Laundry</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label>:
                                                <?php foreach ($get_MstPosLaundry as $row3) {
                                                    if ($hdr->pos_ldy == $row3->detail_id) {
                                                        echo $row3->nama_laundry . ' (' . $row3->alamat . ') ';
                                                    }
                                                } ?>
                                            </label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>No. Nota</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label>: <?php echo $hdr->NoNota ?></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>Tanggal Terima</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label>: <?php echo date('d-m-Y', strtotime($hdr->TglTransaksi)) ?></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>Tanggal Selesai</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label>: <?php echo date('d-m-Y', strtotime($hdr->SelesaiDate)) ?></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>Tanggal Diambil</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <input type="hidden" name="DiambilDate[]" value="<?php echo date('Y-m-d H:i:s') ?>" readonly class="form-control">
                                            <label>: <?php echo date('d-m-Y') ?></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>Nama Pelanggan</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label>: <?php echo $hdr->Nama ?></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>Status Pelanggan</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label>: <?php if ($hdr->StatusTK == 1) {
                                                            echo 'Karyawan';
                                                        } elseif ($hdr->StatusTK == 2) {
                                                            echo 'Harian';
                                                        } else {
                                                            echo 'Umum';
                                                        } ?></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>NIK</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label>: <?php echo $hdr->NIK ?></label>
                                        </div>
                                        <div class="no_hp" <?php if ($hdr->NoHP == '' || $hdr->NoHP == NULL) {
                                                                echo 'style="display:none;"';
                                                            } ?>>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <label><b>No.Handphone</b></label>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <label>: <?php echo $hdr->NoHP ?></label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>Departemen</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label>: <?php echo $hdr->DeptAbbr ?></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>PT/CV</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label>: <?php echo $hdr->Perusahaan ?></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>Jenis Pembayaran</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label>:
                                                <?php foreach ($get_MstPembayaranLaundry as $row3) {
                                                    if ($hdr->Cash == $row3->IDPembayaran) {
                                                        echo $row3->JenisPembayaran;
                                                    }
                                                } ?>
                                            </label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>Jenis Layanan</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label>:
                                                <?php foreach ($get_MstHargaLaundry as $row2) {
                                                    if ($hdr->IDLayanan == $row2->IDLayanan) {
                                                        echo $row2->JenisLayanan;
                                                    }
                                                } ?>
                                            </label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>Berat (Kg)</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label>: <?php echo str_replace('.', ',', $hdr->JumlahBerat); ?></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>Total Biaya (Rp)</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label>: <?php echo number_format($hdr->TotalTagihan, 2, ',', '.') ?></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>Diantar Oleh</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label>: <?= $hdr->diantar_oleh ?></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>Foto Label</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label>
                                                <?php if ($hdr->link_upload_label != '') { ?>
                                                    <img src="<?php echo base_url() ?><?php echo $hdr->link_upload_label . $hdr->ID ?>.jpg" width="150px" alt="Maaf File Tidak Ada ..!!">
                                                <?php } else { ?>
                                                    <b>Tidak ada</b>
                                                <?php } ?>
                                            </label>
                                        </div>
                                        <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>Foto Item</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label>
                                                <?php if ($hdr->link_upload_item != '') { ?>
                                                    <img src="<?php echo base_url() ?><?php echo $hdr->link_upload_item . $hdr->ID ?>.jpg" width="150px" alt="Maaf File Tidak Ada ..!!">
                                                <?php } else { ?>
                                                    <b>Tidak ada</b>
                                                <?php } ?>
                                            </label>
                                        </div> -->
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>Diambil Oleh</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <input type="text" name="DiambilBy" value="<?= $hdr->DiambilBy ?>" class="DiambilBy form-control" placeholder="Ketik disini" required autocomplete="off">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label><b>Foto Pengambil</b></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <input type="file" accept="image/*" name="txtUploadPengambil" class="form-control" required />
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-file-text"></i>
                            <span class="caption-subject bold uppercase">Item Laundry</span>
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
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <table class="table table-bordered table-hover table-sm" id="dataTable">
                                        <thead>
                                            <tr style="background-color:#D6FFFB;">
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Nama Item</th>
                                                <th class="text-center">Foto Item</th>
                                                <th class="text-center">Kategory</th>
                                                <th class="text-center">Checklist</th>
                                                <th class="text-center">Jumlah Outstanding(Pcs)</th>
                                                <th class="text-center">Keterangan</th>
                                                <th class="text-center">Jumlah Ready (Pcs)</th>
                                                <th class="text-center">Total (pcs)</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body_detail">
                                            <?php $no = 0;
                                            foreach ($getDataDtl as $Dtl) {
                                                $no++; ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?= $no ?>
                                                    </td>
                                                    <td>
                                                        <?php foreach ($get_vwItemKategory as $row2) { ?>
                                                            <?php if ($Dtl->id_item == $row2->Id_Item) {
                                                                echo $row2->NamaItem; ?>
                                                                <input type="hidden" name="nama_item[]" value="<?= $row2->NamaItem; ?>">
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-circle btn-sm green-seagreen" onclick="view(this.id)" id="<?php echo $Dtl->detail_id ?>">
                                                            <i class="fa fa-file-image-o"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php foreach ($get_vwItemKategory as $row2) { ?>
                                                            <?php if ($Dtl->id_item == $row2->Id_Item) {
                                                                echo $row2->NamaKategory;
                                                            } ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox" name="cek_item[]" class="form-control ceklist" value="">
                                                        <input type="hidden" name="detail_id[]" value="<?= $Dtl->detail_id ?>" readonly>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="number" name="qty_item[]" class="form-control qty_item" value="<?= $Dtl->qty_item ?>" placeholder="Input Jumlah Outstanding" inputmode="numeric" autocomplete="off">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="text" name="keterangan[]" class="form-control keterangan" value="<?= $Dtl->keterangan ?>" placeholder="Input Keterangan" autocomplete="off" required>
                                                    </td>
                                                    <td class="text-center">
                                                        <label class="control-label jumlah_s"><?php if ($laundry_stat == 4) {
                                                                                                    echo $Dtl->jumlah_1;
                                                                                                } else {
                                                                                                    echo $Dtl->jumlah;
                                                                                                } ?></label>
                                                        <?php if ($laundry_stat == 4) { ?>
                                                            <input type="hidden" name="jumlah_1[]" class="form-control jumlah_1" value="<?= $Dtl->jumlah_1 ?>">
                                                        <?php } else { ?>
                                                            <input type="hidden" name="jumlah_1[]" class="form-control jumlah_1" value="<?= $Dtl->jumlah ?>">
                                                        <?php } ?>
                                                        <input type="hidden" name="jumlah[]" class="form-control jumlah" value="<?= $Dtl->jumlah ?>">
                                                    </td>
                                                    <td>
                                                        <label class="control-label"><?= $Dtl->jumlah; ?></label>
                                                    </td>
                                                </tr>
                                            <?php  } ?>
                                        </tbody>
                                    </table>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <span><b>Catatan :</b></span>
                                        <div class="form-group">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">Jumlah Outstanding</div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">= Jumlah item yang tertinggal/tidak diambil</div>
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">Jumlah Ready</div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">= Jumlah item yang diambil</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12" style="padding-left: 11px;padding-Right: 11px;">
                                                <button class="btn btn-danger outstanding" type="submit" value="outstanding" name="btnupdate">Ambil Sebagian</button>
                                                <button class="btn btn-success sudah_diambil" type="submit" value="diambil" name="btnupdate" disabled>Ambil Semua</button>
                                                <a class="btn default" href="javascript:history.back()">Kembali</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').dataTable({
            "order": [0, 'asc'],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "pageLength": 10
        });
    });

    function view(clicked_id) {
        $.post("<?php echo site_url(); ?>Penerimaan_laundry/viewFiledetail?id=" + clicked_id, function(data) {
            $('#view').html(data);
        });
        $('#MyModalView').modal('show');
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ceklist').trigger('change');
    });

    $('.ceklist').change(function() {
        var qty_item = $(this).closest('tr').find('.qty_item');
        var keterangan = $(this).closest('tr').find('.keterangan');
        if ($(this).is(":checked")) {
            qty_item.attr('readonly', true);
            keterangan.attr('required', false);
            keterangan.attr('readonly', true);
            keterangan.val('');
        } else {
            qty_item.attr('readonly', false);
            keterangan.attr('required', true);
            keterangan.attr('readonly', false);
        }
        var cek_checked = $("input[type='checkbox']:checked").length;
        var cek = $("input[type='checkbox']").length;
        if (cek_checked >= cek) {
            $('.sudah_diambil').attr('disabled', false);
            $('.outstanding').attr('disabled', true);
        } else {
            $('.sudah_diambil').attr('disabled', true);
            $('.outstanding').attr('disabled', false);
        }
    });

    $(document).on('keyup', '.qty_item', function() {
        qty_item = $(this).val();
        jumlah = $(this).closest('tr').find('.jumlah').val();
        jumlah_1 = $(this).closest('tr').find('.jumlah_1').val();

        if (qty_item != '') {
            selisih = parseFloat(jumlah) - parseFloat(qty_item);
            $(this).closest('tr').find('.jumlah_1').val(selisih);
            $(this).closest('tr').find('.jumlah_s').text(selisih);
        } else {
            $(this).closest('tr').find('.jumlah_1').val(jumlah);
            $(this).closest('tr').find('.jumlah_s').text(jumlah);
        }
    });
</script>


<div class="modal fade" id="MyModalView" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><b>Image Item :</b></h4>
            </div>
            <div class="modal-body">
                <div id="view">
                </div>
            </div>
        </div>
    </div>
</div>