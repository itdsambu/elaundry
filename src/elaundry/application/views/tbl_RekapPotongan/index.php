<?php $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'); ?>
<!-- <script src="<?= base_url(); ?>assets/custom/jquery-3.5.1.js" type="text/javascript"></script> -->

<script src="<?php echo base_url(); ?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('LaundryRekapPotongan') ?>">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-list"></i>
                            <span class="caption-subject bold uppercase"><?= $title; ?></span>
                        </div>
                        <div class="tools"></div>
                    </div>
                    <div class="portlet-body">
                        <!-- alert -->
                        <?php if (isset($alert)) {
                            echo "<div class='alert alert-success'>";
                            echo "<strong>Sukses !!!</strong>" . $alert;
                            echo "</div>";
                        } ?>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Tahun</label>
                                        <div class="col-lg-3">
                                            <select class="form-control tahun" name="txttahun" id="tahun">
                                                <?php for ($i = date('Y') - 1; $i <= (date('Y')); $i++) {
                                                    if ($i == date('Y')) { ?>
                                                        <option value="<?php echo $i; ?>" selected><?= $i; ?></option>
                                                        <?php 
                                                    } else { ?>
                                                        <option value="<?php echo $i; ?>" <?php if (isset($tahun)) { if ($tahun == $i) { echo 'selected'; } } ?>><?= $i; ?></option>
                                                        <?php 
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Status Tenaga Kerja</label>
                                        <div class="col-lg-3">
                                            <select class="form-control StatusTK" name="StatusTK" id="StatusTK">
                                                <option>-- Pilih --</option>
                                                <option value="1" <?php if (isset($status_tk)) { if ($status_tk == '1') { echo 'selected'; } }  ?> >Karyawan</option>
                                                <option value="2" <?php if (isset($status_tk)) { if ($status_tk == '2') { echo 'selected'; } }  ?> >Harian/Borongan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="button" class="btn btn-sm btn-primary getData"><i class="fa fa-search"></i> Refresh</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-list"></i>
                        <span class="caption-subject bold uppercase">
                            <code> Kategory: <Span class="statusTitle"></Span></code>
                        </span>
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="table-responsive" id="loader">
                    <!-- <table class="table table-striped table-bordered table-hover" id="dataTable"> -->
                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="table">
                        <thead>
                            <tr class="bg-primary">
                                <th class="text-center" rowspan="2">No.</th>
                                <th class="text-center" rowspan="2">Tahun</th>
                                <th class="text-center" rowspan="2">Periode</th>
                                <th class="text-center" rowspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="detailRecords"></tbody>
                        <tfoot>
                            <tr class="bg-primary">
                                <td colspan="5"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
     
        </div>
    </div>
</div>


<script type="text/javascript">

    $(document).ready(function () {

        $(document).on('change', '#tahun', function () {
            // window.location.reload();
            $('.statusTitle').append().text('');
            $('#detailRecords').append().html('');
            $('.StatusTK').val('-- Pilih --');
        });
    });

    const getData = document.getElementsByTagName('button')[0];
    getData.addEventListener('click', function (e) {
        e.preventDefault();
        Ajax_data();
    });
   

    function Ajax_data() {
        if ($('.StatusTK').val() != '-- Pilih --' && $('.tahun').val()) {
            $.ajax({
                type: "post",
                url: `<?php echo base_url() ?>LaundryRekapPotongan/getRecords`,
                data: {
                    Status: $('.StatusTK').val(),
                    tahun: $('.tahun').val()
                },
                dataType: "json",
                success: function (response) {
                    if (response.status == true) {
                        let tahun = $('#tahun').val();
                        let detail = ``;
                        let no = 1;
                        $.map(response.data, function (element, index) {
                            let t = element.month;
                            let nmBulan = t == 1 ? 'Januari' 
                            : t == 2 ? 'Februari'
                            : t == 3 ? 'Maret'
                            : t == 4 ? 'April'
                            : t == 5 ? 'Mei'
                            : t == 6 ? 'Juni'
                            : t == 7 ? 'Juli'
                            : t == 8 ? 'Agustus'
                            : t == 9 ? 'September'
                            : t == 10 ? 'Oktober'
                            : t == 11 ? 'November'
                            : t == 12 ? 'Desember'
                            : 'Undefined';

                            let params = element.month;
                            let paramsMonth = params == '1' ? '01' 
                            : params == 2 ? '02'
                            : params == 3 ? '03'
                            : params == 4 ? '04'
                            : params == 5 ? '05'
                            : params == 6 ? '06'
                            : params == 7 ? '07'
                            : params == 8 ? '08'
                            : params == 9 ? '09'
                            : params;
                        
                            detail += `
                                <tr class="text-center">
                                    <td>${no++}.</td>
                                    <td>${element.year}</td>
                                    <td>${nmBulan}</td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>LaundryRekapPotongan/detailPerperiode/${element.year}/${paramsMonth}/${$('.StatusTK').val()}" class="btn btn-circle btn-primary">
                                            <i class="fa fa-eye"></i>
                                            Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                            `;
                        });

                        $('.statusTitle').append().text(response.statusTk);
                        $('#detailRecords').append().html(detail);
                        
                    } else {
                        alert(response.pesan);
                    }
                }
            });
        } else {
            alert('Harap pilih Tahun dan Status Tk')
        }
    }
</script>