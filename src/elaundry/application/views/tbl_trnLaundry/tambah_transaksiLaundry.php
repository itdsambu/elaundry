<?php date_default_timezone_set('Asia/Jakarta'); ?>
<script src="<?php echo base_url(); ?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Penerimaan_laundry/simpanData') ?>" enctype="multipart/form-data">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-file-text"></i>
                            <span class="caption-subject bold uppercase">Penerimaan Baru</span>
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
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php if (isset($_SESSION['pesan'])) {
                                        echo "<div class='alert alert-danger'>";
                                        echo '<strong>Gagal ! Status Tenaga Kerja tidak boleh kosong</strong>';
                                        echo "</div>";
                                    } ?>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Alamat Laundry</label>
                                        <div class="col-lg-4">
                                            <select name="pos_ldy" id="pos_ldy" class="form-control pos_ldy" required>
                                                <option value="">-Pilih-</option>
                                                <?php foreach ($get_MstPosLaundry as $row) { ?>
                                                    <option style="background-color: <?= $row->warna_laundry ?>;" value="<?php echo $row->detail_id ?>"><?= $row->nama_laundry ?> ( <?= $row->alamat ?> )</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">No. Nota</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="NoNota" id="NoNota" class="form-control NoNota" value="" readonly required>
                                            <input type="hidden" name="IDLokasi" id="IDLokasi" class="form-control" value="1" readonly>
                                            <?= form_error('NoNota', '<small class ="text-danger pl-3">', '</small>') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Tanggal Terima</label>
                                        <div class="col-lg-4">
                                            <input type="date" name="TanggalTerima" id="TanggalTerima" class="form-control TanggalTerima" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Status Tenaga Kerja</label>
                                        <div class="col-lg-4" style="padding-top: 9px;">
                                            <div class="col-md-4 form-check">
                                                <input type="radio" name="StatusTK" value="1" class="form-check-input StatusTK" id="karyawan">
                                                <label class="form-check-label" for="Karyawan">Karyawan</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="radio" name="StatusTK" value="2" class="form-check-input StatusTK" id="borongan">
                                                <label class="form-check-label" for="Borongan">Borongan/Harian</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="radio" name="StatusTK" value="3" class="form-check-input StatusTK" id="umum">
                                                <label class="form-check-label" for="Umum">Umum</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Cari NIK/Nama</label>
                                        <div class="col-lg-3">
                                            <input type="search" class="form-control NIK" name="NIK" id="NIK" value="" placeholder="Input NIK/Nama" readonly autocomplete="off">
                                        </div>
                                        <div class="col-lg-1">
                                            <button type="button" class="form-control cari_NIK btn-primary" id="cari_NIK" onclick="cariKaryawan();" disabled>Cari</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nama</label>
                                        <div class="col-lg-4">
                                            <input type="hidden" class="form-control close_input" name="RegFixNo" id="RegFixNo" value="" placeholder="Input NIK" readonly>
                                            <input type="hidden" class="form-control close_input" name="telegramid" id="telegramid" value="" readonly>
                                            <input type="text" name="Nama" id="Nama" class="form-control Nama close_input" value="" autocomplete="off" readonly required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Departemen</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="DeptAbbr" id="DeptAbbr" class="form-control DeptAbbr close_input" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">PT/CV</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="Perusahaan" id="Perusahaan" class="form-control Perusahaan close_input" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group no_hp" style="display: none;">
                                        <label class="col-lg-2 control-label">No.Handphone</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="NoHP" id="NoHP" class="form-control NoHP bulat close_input" value="" maxlength="13" onkeypress="return hanyaAngka(event)" inputmode="numeric" autocomplete="off" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Pembayaran</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="CashText" id="CashText" class="form-control CashText" value="" readonly>
                                            <input type="hidden" name="Cash" id="Cash" class="form-control Cash" value="">
                                            <!-- <select name="Cash" id="Cash" class="form-control close_input" required>
                                                <option value="">-pilih-</option>
                                                <?php foreach ($get_MstPembayaranLaundry as $row) { ?>
                                                    <option value="<?= $row->IDPembayaran ?>"><?= $row->JenisPembayaran ?></option>
                                                <?php } ?>
                                            </select> -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Layanan</label>
                                        <div class="col-lg-4">
                                            <select name="IDLayanan" id="IDLayanan" class="form-control close_input" required>
                                                <option value="">-pilih-</option>
                                                <?php foreach ($get_MstHargaLaundry as $row) { ?>
                                                    <option value="<?php echo $row->IDLayanan . '#' . $row->Biaya; ?>" id="<?= $row->Biaya ?>"><?= $row->JenisLayanan ?> (Rp.<?= $row->Biaya ?>/Kg)</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                    <a class="btn yellow btn-sm" onclick="destroyselect2(); tambah_baris(); refreshSelect2();">
                                        <i class="fa fa-plus"></i>
                                        Tambah Item
                                    </a>
                                </div>
                                <br>
                                <br>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <table class="table table-bordered table-hover table-sm" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" colspan="1">Hapus</th>
                                                <th class="text-center">Nama Item</th>
                                                <th class="text-center">Jumlah (Pcs)</th>
                                                <th class="text-center">Upload Item</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body_detail">
                                            <tr>
                                                <td class="text-center act">
                                                    <a style="color:#fff" class="btn red btn-sm dt_row"><i class="fa fa-trash"></i></a>
                                                </td>
                                                <td>
                                                    <select name="id_item[]" class="form-select id_item select2" required>
                                                        <option value="">-pilih-</option>
                                                        <?php foreach ($get_vwItemKategory as $row2) { ?>
                                                            <option value="<?= $row2->Id_Item ?>"><?= $row2->NamaItem ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" name="jumlah[]" class="form-control jumlah" placeholder="Input Pcs" onkeypress="return hanyaAngka(event);" maxlength="3" inputmode="numeric" autocomplete="off" required>
                                                </td>
                                                <td>
                                                    <input accept="image/*" type="file" name="txtItemDetail[]" class="form-control" required />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-file-text"></i>
                            <span class="caption-subject bold uppercase">Kalkulasi</span>
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
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Berat (Kg)</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="Berat" id="Berat" class="form-control close_input" value="" onKeyPress="if(this.value.length==4){return false;}else{return hanyaAngka(event);}" inputmode="numeric" required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Total Biaya (Rp)</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="TotalBiaya" id="TotalBiaya" class="form-control close_input" value="" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Upload Label/Konsumen</label>
                                        <div class="col-lg-4">
                                            <input accept="image/*" type="file" name="txtUploadLabel" class="form-control" required />
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-lg-2 control-label">Upload Item/Timbangan</label>
                                        <div class="col-lg-4">
                                            <input accept="image/*" type="file" name="txtUploadItem" class="form-control" required />
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Diantar Oleh</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="diantar_oleh" id="diantar_oleh" class="form-control close_input" value="" autocomplete="off" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Catatan</label>
                                        <div class="col-lg-4">
                                            <textarea name="Catatan" id="Catatan" class="form-control close_input" value="" rows="2" autocomplete="off"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="col-lg-12">
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-lg-1 col-lg-5">
                                                <button class="btn green" id="tambah" type="submit">Submit</button>
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
        $('#IDLayanan').val('3#6000');
        // $('#dataTable').dataTable({
        //     "order": [0, 'asc'],
        //     "lengthMenu": [
        //         [5, 10, 15, 20, -1],
        //         [5, 10, 15, 20, "All"] // change per page values here
        //     ],
        //     "pageLength": 10
        // });
    });
</script>

<!-- Modal -->
<div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="inputdetail" name="iddetail">
                <div id="idDetail"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear() + "-" + (month) + "-" + (day);


        $('#TanggalTerima').val(today);
    });

    function tambah_baris() {
        var ini = $('.dt_row').last();
        var baris = ini.closest('tr');
        var copy_baris = baris.clone();
        copy_baris.find('input').val('');
        copy_baris.find('select').val('');
        copy_baris.find('a').attr('onclick', 'hapus_baris(this);');
        copy_baris.insertAfter(baris);
    }

    function refreshSelect2() {
        $('.id_item').select2({});
    }

    function destroyselect2() {
        $('.id_item').select2('destroy');
    }

    function hapus_baris(ip) {
        if (confirm("Hapus data ini?")) {
            var tr = ip.parentNode.parentNode;
            tr.parentNode.removeChild(tr);
        }
    };

    $(function() {
        $(".select2").select2();
    });

    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 44 || (charCode > 44 && charCode < 48) || charCode > 57))
            return false;
        return true;
    };

    var cek_tk = $("input[type='radio']:checked").length;
    $('.StatusTK').click(function() {
        var tk_cek = $("input[type='radio']:checked").length;
        var pos_ldy = $('#pos_ldy').val();

        // $('#NoNota').val('');

        if (pos_ldy.trim() != '') {
            $('.close_input').val('');
            if (tk_cek > 0) {
                $('#tambah').attr('disabled', false);
            } else {
                $('#tambah').attr('disabled', true);
            }
            if ($('#karyawan').is(':checked') || $('#borongan').is(':checked')) {
                $('#Cash').val('0');
                $('#CashText').val('Potong Gaji');
                $('#NIK').attr('readonly', false);
                $('#cari_NIK').attr('disabled', false);
                $('.no_hp').css('display', 'none');
                $('#NoHP').attr('readonly', true);
                $('#Nama').attr('readonly', true);
            } else {
                $('#Cash').val('1');
                $('#CashText').val('Cash');
                $('#Nama').attr('readonly', false);
                $('.no_hp').css('display', 'block');
                $('#NoHP').attr('readonly', false);
                $('#NIK').val('');
                $('#NIK').attr('readonly', true);
                $('#cari_NIK').attr('disabled', true);
            }
        } else {
            alert("Silahkan pilih Alamat Laundry dahulu!!");
            $('#pos_ldy').focus();
            $('.StatusTK').prop('checked', false);
            $('#NoNota').empty();
        }
    });

    if (cek_tk > 0) {
        $('#tambah').attr('disabled', false);
    } else {
        $('#tambah').attr('disabled', true);
    }

    function cariKaryawan() {
        $('.close_input').val('');
        nik = $('#NIK').val();
        status_tk = $('input[name="StatusTK"]:checked').val();
        if (nik != '') {
            $.post("<?php echo base_url('Penerimaan_laundry/ajaxGetDataTK') ?>" + "/" + status_tk + "/" + nik, function(data) {
                $('#idDetail').html(data);
            });
            $('#MyModal').modal('show');
        }
    }

    function pilih(sel) {
        var id = $(sel).attr('id');
        var nama = $(sel).closest('tr').find('.nama').text();
        var nik = $(sel).closest('tr').find('.nik').text();
        var telegramid = $(sel).closest('tr').find('.telegramid').text();
        var dept = $(sel).closest('tr').find('.bagian_abbr').text();
        var cv = $(sel).closest('tr').find('.personalstatus').text();
        $('#MyModal').modal('toggle');
        $('#RegFixNo').val(id);
        $('#Nama').val(nama);
        $('#telegramid').val(telegramid);
        $('#NIK').val(nik);
        $('#DeptAbbr').val(dept);
        $('#Perusahaan').val(cv.trim());
    }

    $('#pos_ldy').change(function() {
        var dt_tanggal_terima = $('.TanggalTerima').val();
        var data = dt_tanggal_terima.split('-');
        var tahun = data[0];
        var bulan = data[1];
        var pos_ldy = $('#pos_ldy').val();
        if (pos_ldy.trim() != '') {
            if (dt_tanggal_terima.trim() != '') {
                // var regPattern = /^(0[1-9]|[12][0-9]|3[01])(-)(0[1-9]|1[012])(-)(19|20)\d\d$/;
                // var checkArray = dt_tanggal_terima.match(regPattern);
                // if (checkArray == null) {
                //     alert('Maaf Format Tanggal Yang Anda Input Tidak Sesuai, Format Tanggal Selesai : DD-MM-YYYY');
                //     $('#TanggalTerima').val('');
                //     // $('#btnsimpan').attr('disabled', true);
                // } else {
                // console.log('halo');
                // console.log(dt_tanggal_terima);
                // console.log(tahun);
                // console.log(bulan);
                // console.log(dt_tipe_karyawan);
                // console.log($('#pos_ldy').val());
                $.ajax({
                    method: "POST",
                    url: "<?php echo base_url('Penerimaan_laundry/dt_nota'); ?>",
                    data: {
                        tahun: tahun,
                        bulan: bulan,
                        pos_ldy: pos_ldy
                    },
                    success: function(data) {
                        if (data == '100') {
                            alert("Data sudah direkap, tidak bisa diinputkan ditanggal ini !!!");
                            $('#btnsimpan').attr('disabled', true);
                        } else {
                            $('#NoNota').val(data);
                            $('#btnsimpan').attr('disabled', false);
                        }
                    }
                });
                // }
            } else {
                $('#btnsimpan').attr('disabled', true);
            }
        } else {
            alert("Maaf, kolom Status Pekerja wajib diisi!!");
            $('#tanggal_terima').val('');
            $('#btnsimpan').attr('disabled', true);
        }
    });

    $('#Berat').keyup(function() {
        berat = $(this).val().replace(',', '.');
        biaya = $('#IDLayanan').find(":selected").attr('id');
        if (biaya != null && berat != '') {
            total = (parseFloat(berat) * parseFloat(biaya)) / 1000
            $('#TotalBiaya').val(total.toFixed(3));
        } else {
            $('#TotalBiaya').val('');
        }
    });

    $('#pos_ldy').change(function() {
        let no_nota = $('#NoNota').val();
        if (no_nota != '') {
            let pos_ldy = $('#pos_ldy').val()
            var data = no_nota.split('/');
            var urutan = data[0];
            var bulann = data[2];
            var tahunn = data[3];
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('Penerimaan_laundry/dt_nota'); ?>",
                data: {
                    pos_ldy: pos_ldy,
                    urutan: urutan,
                    bulan: bulann,
                    tahun: tahunn
                },
                success: function(data) {
                    $('#NoNota').val(data);
                    $('#btnsimpan').attr('disabled', false);

                }
            });
        } else {
            $('#btnsimpan').attr('disabled', true);
        }
    })

    var input = document.getElementById("NIK");

    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("cari_NIK").click();
        }
    });
</script>