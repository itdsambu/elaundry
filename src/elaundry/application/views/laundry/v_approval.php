<div class="page-head">
    <div class="container-fluid">
        <div class="page-title">
            <h1>Approval <small>Laundry</small></h1>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-green-sharp bold uppercase">Laporan Pendapatan Laundry</span>
                        </div>
                    </div>

                    <form action="<?php echo site_url('Approval_laundry/multi_approve/'); ?>" id="form_approval" method="post" role="form" class="form-horizontal">
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control app_menu" name="app_menu" id="app_menu" value="<?php echo $app_number; ?>">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">No</th>
                                                    <th style="text-align: center;">Jenis<br>Laporan</th>
                                                    <th style="text-align: center;">Status<br>Pekerja</th>
                                                    <th style="text-align: center;">Tanggal<br>Awal</th>
                                                    <th style="text-align: center;">Tanggal<br>Akhir</th>
                                                    <th style="text-align: center;">Bulan</th>
                                                    <th style="text-align: center;">Tahun</th>
                                                    <th style="text-align: center;">Dibuat Oleh</th>
                                                    <th style="text-align: center;">Diperiksa Oleh</th>
                                                    <th style="text-align: center;">Diketahui Oleh</th>
                                                    <th style="text-align: center;">Disetujui Oleh</th>
                                                    <th style="text-align: center;">Approve<input type='checkbox' class='checkboxapp' onClick='toggle(this)' /></th>
                                                    <th style="text-align: center;">Lihat Laporan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($all_approval && isset($all_approval)) {
                                                    $no = 0;
                                                    foreach ($all_approval as $all_approval_row) {
                                                        $no++;
                                                        $txt_rekap_jenis = 'Pendapatan Laundry ' . $all_approval_row->pos_ldy . ' ' . '(Management)' ;

                                                        if ($all_approval_row->rekap_status_pekerja == '1') {
                                                            $txt_status = 'Karyawan';
                                                        } elseif ($all_approval_row->rekap_status_pekerja == '2') {
                                                            $txt_status = 'Tenaga Kerja';
                                                        } else {
                                                            $txt_status = $all_approval_row->rekap_status_pekerja;
                                                        }

                                                        switch ($all_approval_row->rekap_bulan) {
                                                            case $all_approval_row->rekap_bulan == '1':
                                                                $txt_rekap_bulan    = 'Januari';
                                                                break;
                                                            case $all_approval_row->rekap_bulan == '2':
                                                                $txt_rekap_bulan    = 'Februari';
                                                                break;
                                                            case $all_approval_row->rekap_bulan == '3':
                                                                $txt_rekap_bulan    = 'Maret';
                                                                break;
                                                            case $all_approval_row->rekap_bulan == '4':
                                                                $txt_rekap_bulan    = 'April';
                                                                break;
                                                            case $all_approval_row->rekap_bulan == '5':
                                                                $txt_rekap_bulan    = 'Mei';
                                                                break;
                                                            case $all_approval_row->rekap_bulan == '6':
                                                                $txt_rekap_bulan    = 'Juni';
                                                                break;
                                                            case $all_approval_row->rekap_bulan == '7':
                                                                $txt_rekap_bulan    = 'Juli';
                                                                break;
                                                            case $all_approval_row->rekap_bulan == '8':
                                                                $txt_rekap_bulan    = 'Agustus';
                                                                break;
                                                            case $all_approval_row->rekap_bulan == '9':
                                                                $txt_rekap_bulan    = 'September';
                                                                break;
                                                            case $all_approval_row->rekap_bulan == '10':
                                                                $txt_rekap_bulan    = 'Oktober';
                                                                break;
                                                            case $all_approval_row->rekap_bulan == '11':
                                                                $txt_rekap_bulan    = 'November';
                                                                break;
                                                            case $all_approval_row->rekap_bulan == '12':
                                                                $txt_rekap_bulan    = 'Desember';
                                                                break;
                                                            default:
                                                                $txt_rekap_bulan    = '-';
                                                                break;
                                                        }

                                                        if (trim($all_approval_row->rekap_tanggal_awal) != '') {
                                                            $txt_tanggal_awal = date("d-m-Y", strtotime($all_approval_row->rekap_tanggal_awal));
                                                        } else {
                                                            $txt_tanggal_awal = '';
                                                        }

                                                        if (trim($all_approval_row->rekap_tanggal_akhir) != '') {
                                                            $txt_tanggal_akhir = date("d-m-Y", strtotime($all_approval_row->rekap_tanggal_akhir));
                                                        } else {
                                                            $txt_tanggal_akhir = '';
                                                        }

                                                        if ($all_approval_row->create_status == '1') {
                                                            $txt_create = $all_approval_row->create_by . ' ' . date("d-m-Y H:i:s", strtotime($all_approval_row->create_date)) . ' ' . $all_approval_row->create_jabatan;
                                                        } else {
                                                            $txt_create = '';
                                                        }

                                                        if ($all_approval_row->app1_status == '1') {
                                                            $txt_app1 = $all_approval_row->app1_by . ' ' . date("d-m-Y H:i:s", strtotime($all_approval_row->app1_date)) . ' ' . $all_approval_row->app1_jabatan;
                                                        } else {
                                                            $txt_app1 = '';
                                                        }

                                                        if ($all_approval_row->app2_status == '1') {
                                                            $txt_app2 = $all_approval_row->app2_by . ' ' . date("d-m-Y H:i:s", strtotime($all_approval_row->app2_date)) . ' ' . $all_approval_row->app2_jabatan;
                                                        } else {
                                                            $txt_app2 = '';
                                                        }

                                                        if ($all_approval_row->app3_status == '1') {
                                                            $txt_app3 = $all_approval_row->app3_by . ' ' . date("d-m-Y H:i:s", strtotime($all_approval_row->app3_date)) . ' ' . $all_approval_row->app3_jabatan;
                                                        } else {
                                                            $txt_app3 = '';
                                                        } ?>
                                                        <tr>
                                                            <td style="text-align: center;"><?php echo $no; ?></td>
                                                            <td style="text-align: center;"><?php echo $txt_rekap_jenis; ?></td>
                                                            <td style="text-align: center;"><?php echo $txt_status; ?></td>
                                                            <td style="text-align: center;"><?php echo $txt_tanggal_awal; ?></td>
                                                            <td style="text-align: center;"><?php echo $txt_tanggal_akhir; ?></td>
                                                            <td style="text-align: center;"><?php echo $txt_rekap_bulan; ?></td>
                                                            <td style="text-align: center;"><?php echo $all_approval_row->rekap_tahun; ?></td>
                                                            <td style="text-align: center;"><?php echo $txt_create; ?></td>
                                                            <td style="text-align: center;"><?php echo $txt_app1; ?></td>
                                                            <td style="text-align: center;"><?php echo $txt_app2; ?></td>
                                                            <td style="text-align: center;"><?php echo $txt_app3; ?></td>
                                                            <td style="text-align: center;"><input type="checkbox" class='checkboxapp' name="dtapp_rekap_id[]" id="dtapp_rekap_id" value="<?php echo '//' . $all_approval_row->rekap_id . '//' . $app_number . '//'; ?>" /></td>
                                                            <td style="text-align: center;"><a href="<?php echo base_url('Approval_laundry/view_lap/' . $all_approval_row->rekap_id . '/' . $app_number); ?>" class="btn btn-primary btn-circle"><span class="glyphicon glyphicon-search"></span></a></td>
                                                        </tr>
                                                        <?php 
                                                    }
                                                } else { ?>
                                                    <tr>
                                                        <td style="text-align: center;" colspan="13">No data available in table</td>
                                                    </tr>
                                                    <?php 
                                                } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td style="text-align: center;" colspan="11"></td>
                                                    <td style="text-align: center;">
                                                        <?php
                                                        if ($all_approval && isset($all_approval)) { ?>
                                                            <button type="submit" class="btn btn-circle btn-primary" name="btnapprove" value="btnapprove"><i class="fa fa-check-square-o"></i> Approve</button>
                                                            <?php 
                                                        } ?>
                                                    </td>
                                                    <td style="text-align: center;"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function toggle(source) {
        var aInputs = document.getElementsByTagName('input');
        for (var i = 0; i < aInputs.length; i++) {
            if (aInputs[i] != source && aInputs[i].className == source.className) {
                aInputs[i].checked = source.checked;
            }
        }
    }
</script>