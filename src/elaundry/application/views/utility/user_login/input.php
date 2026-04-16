<script src="<?php echo base_url(); ?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-file-text"></i>
                        <span class="caption-subject bold uppercase"> Management User</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('User_login/save') ?>">
                        <div class="form-body">
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
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">NIK/Nama</label>
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
                                    <input type="hidden" class="form-control close_input" name="personalstatus" id="personalstat" value="" readonly>
                                    <input type="text" name="Nama" id="Nama" class="form-control Nama close_input" value="" readonly required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Departemen</label>
                                <div class="col-lg-4">
                                    <input type="text" name="DeptAbbr" id="DeptAbbr" class="form-control DeptAbbr close_input" value="" readonly>
                                    <input type="hidden" name="DeptID" id="DeptID" class="form-control DeptID close_input" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Username</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" id="LoginID" name="LoginID">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Password</label>
                                <div class="col-lg-4">
                                    <?php
                                    $pass = '123';
                                    ?>
                                    <input type="text" class="form-control" id="Password" name="Password" readonly="" value="<?php echo $pass ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Jabatan</label>
                                <div class="col-lg-4">
                                    <select class="form-control select2" id="JabID" name="JabID">
                                        <option>Pilih</option>
                                        <?php foreach ($getJab as $set) {
                                            echo "<option value=" . $set->ID_jab . ">" . $set->Nama_jab . "</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Group User</label>
                                <div class="col-lg-4">
                                    <select class="form-control select2" id="GroupID" name="GroupID">
                                        <option>Pilih</option>
                                        <?php foreach ($getGroup as $set) {
                                            echo "<option value=" . $set->GroupID . ">" . $set->GroupName . "</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Petugas Laundry</label>
                                <div class="col-lg-4">
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            <input type="radio" name="Petugas" id="Active" value="1" checked=""> Ya
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="Petugas" id="NotActive" value="0"> Tidak
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">InActive</label>
                                <div class="col-lg-4">
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            <input type="radio" name="InActive" id="Active" value="0" checked=""> Active
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="InActive" id="NotActive" value="1"> Not Active
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <!-- <div class="col-lg-offset-1 col-lg-11"> -->
                                <div class="col-lg-4">
                                    <div class="pull-right">
                                        <button type="submit" class="btn green">Submit</button>
                                        <a class="btn default" href="javascript:history.back()">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
            </div>
            <div class="modal-body">
                <input type="hidden" id="inputdetail" name="iddetail">
                <div id="idDetail"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
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
        $('.close_input').val('');
        if (tk_cek > 0) {
            $('#tambah').attr('disabled', false);
        } else {
            $('#tambah').attr('disabled', true);
        }
        if ($('#karyawan').is(':checked') || $('#borongan').is(':checked')) {
            $('#Cash').val('');
            $('#NIK').attr('readonly', false);
            $('#cari_NIK').attr('disabled', false);
            $('.no_hp').css('display', 'none');
            $('#NoHP').attr('readonly', true);
            $('#Nama').attr('readonly', true);
        } else {
            $('#Cash').val('1');
            $('#Nama').attr('readonly', false);
            $('.no_hp').css('display', 'block');
            $('#NoHP').attr('readonly', false);
            $('#NIK').val('');
            $('#NIK').attr('readonly', true);
            $('#cari_NIK').attr('disabled', true);
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
        var personalstat = $(sel).closest('tr').find('.personalstat').text();
        var dept = $(sel).closest('tr').find('.bagian_abbr').text();
        var deptid = $(sel).closest('tr').find('.id_dept').text();
        var cv = $(sel).closest('tr').find('.personalstatus').text();
        $('#MyModal').modal('toggle');
        $('#RegFixNo').val(id);
        $('#Nama').val(nama);
        $('#telegramid').val(telegramid);
        $('#personalstat').val(personalstat);
        $('#NIK').val(nik);
        $('#DeptAbbr').val(dept);
        $('#DeptID').val(deptid);
        $('#Perusahaan').val(cv);
    }

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

    var input = document.getElementById("NIK");

    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("cari_NIK").click();
        }
    });
</script>