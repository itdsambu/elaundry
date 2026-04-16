<?php $vpost_pos_ldy = ''; ?>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-body">

                        <?php if (!isset($app_number)) { ?>
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3 bg-primary">
                                    <h4 class="text-center"><b>Rekap Laundry</b></h4>
                                </div>
                            </div>
                            <form action="<?php echo site_url('Laundry_Rekap/get_detail_laporan') ?>" method="POST">
                                <div class="row">
                                    <div style="background-color:#F4FAED;" class="col-md-6 col-md-offset-3">
                                        <br>
                                        <label for="nama_laporan" class="col-sm-3 control-label" style="text-align:left;">Jenis Laporan</label>
                                        <div class="form-group col-sm-9">
                                            <input type="text" name="nama_laporan" id="nama_laporan" class="nama_laporan form-control" style="text-align:left;" value="Laporan Pendapatan Laundry (Management)" readonly required>
                                            <input type="hidden" name="month_now" id="month_now" class="month_now form-control" style="text-align:left;" value="<?= date('m'); ?>" readonly required>
                                        </div>
                                        <label for="pos_ldy" class="col-sm-3 control-label" style="text-align:left;">Laundry</label>
                                        <div class="form-group col-sm-9">
                                            <select name="pos_ldy" id="pos_ldy" class="form-control pos_ldy" required="required">
                                                <option value="">-- Pilih --</option>
                                                <?php foreach ($dt_allpos_laundry as $dt_allpos_laundry_row) { ?>
                                                    <option value="<?= $dt_allpos_laundry_row->detail_id ?>" style="background-color: <?= $dt_allpos_laundry_row->warna_laundry ?>" 
                                                        <?php if (isset($post_pos_ldy)) {
                                                            if ($post_pos_ldy == $dt_allpos_laundry_row->detail_id) {
                                                                echo 'selected';
                                                                $vpost_pos_ldy = "- " . $dt_allpos_laundry_row->nama_laundry . ' (' . $dt_allpos_laundry_row->alamat . ')';
                                                            }
                                                        } ?>><?= $dt_allpos_laundry_row->nama_laundry . ' (' . $dt_allpos_laundry_row->alamat . ')'; ?>
                                                    </option>
                                                    <?php 
                                                } ?>
                                            </select>
                                        </div>
                                        <br>
                                        <label for="thn_laporan" class="col-sm-3 control-label" style="text-align:left;">Tahun</label>
                                        <div class="form-group col-sm-9">
                                            <select name='thn_laporan' id='thn_laporan' class="form-control" required="required">
                                                <option value="">-- Pilih --</option>
                                                <?php
                                                $year = date("Y");
                                                for ($i = $year; $i >= 2015; $i -= 1) { ?>
                                                    <option value="<?php echo $i; ?>" <?php if (isset($post_thn_laporan)) { if ($post_thn_laporan == $i) { echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <label for="thn_laporan" class="col-sm-3 control-label" style="text-align:left;"></label>
                                        <div class="form-group col-sm-9">
                                            <button type="submit" class="btn btn-primary col-sm-12" id="btntampil">Tampil</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <?php 
                        } ?>

                        <?php if (isset($all_report)) { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light">
                                        <?php $this->session->flashdata('message') ?>
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <span class="caption-subject font-green-sharp bold uppercase">Postingan Rekap Laundry</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <table id="dataLaundry" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                                                <thead class="flip-content">
                                                    <tr>
                                                        <th style="text-align: center;">No</th>
                                                        <th style="text-align: center;">Jenis<br>Laporan</th>
                                                        <th style="text-align: center;">Pos Laundry</th>
                                                        <th style="text-align: center;">Status<br>Pekerja</th>
                                                        <th style="text-align: center;">Tanggal<br>Awal</th>
                                                        <th style="text-align: center;">Tanggal<br>Akhir</th>
                                                        <th style="text-align: center;">Bulan</th>
                                                        <th style="text-align: center;">Tahun</th>
                                                        <th style="text-align: center;">Dibuat Oleh</th>
                                                        <th style="text-align: center;">Diperiksa Oleh</th>
                                                        <th style="text-align: center;">Diketahui Oleh</th>
                                                        <th style="text-align: center;">Disetujui Oleh</th>
                                                        <th style="text-align: center;">Lihat Laporan</th>
                                                        <?php if ($this->session->userdata('personalid') == '10197') { ?>
                                                            <th style="text-align: center;">Hapus Laporan</th>
                                                            <?php
                                                        } ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (isset($all_report) && $all_report == TRUE) {
                                                        $no = 0;
                                                        foreach ($all_report as $all_report_row) {
                                                            $no++;
                                                            $txt_rekap_jenis = $all_report_row->rekap_jns;

                                                            if ($all_report_row->rekap_status_pekerja == '1') {
                                                                $txt_status = 'Karyawan';
                                                            } elseif ($all_report_row->rekap_status_pekerja == '2') {
                                                                $txt_status = 'Tenaga Kerja';
                                                            } elseif ($all_report_row->rekap_status_pekerja == '3') {
                                                                $txt_status = 'Tamu';
                                                            } elseif ($all_report_row->rekap_status_pekerja == '4') {
                                                                $txt_status = 'Non Pekerja';
                                                            } else {
                                                                $txt_status = $all_report_row->rekap_status_pekerja;
                                                            }

                                                            switch ($all_report_row->rekap_bulan) {
                                                                case $all_report_row->rekap_bulan == '1':
                                                                    $txt_rekap_bulan    = 'Januari';
                                                                    break;
                                                                case $all_report_row->rekap_bulan == '2':
                                                                    $txt_rekap_bulan    = 'Februari';
                                                                    break;
                                                                case $all_report_row->rekap_bulan == '3':
                                                                    $txt_rekap_bulan    = 'Maret';
                                                                    break;
                                                                case $all_report_row->rekap_bulan == '4':
                                                                    $txt_rekap_bulan    = 'April';
                                                                    break;
                                                                case $all_report_row->rekap_bulan == '5':
                                                                    $txt_rekap_bulan    = 'Mei';
                                                                    break;
                                                                case $all_report_row->rekap_bulan == '6':
                                                                    $txt_rekap_bulan    = 'Juni';
                                                                    break;
                                                                case $all_report_row->rekap_bulan == '7':
                                                                    $txt_rekap_bulan    = 'Juli';
                                                                    break;
                                                                case $all_report_row->rekap_bulan == '8':
                                                                    $txt_rekap_bulan    = 'Agustus';
                                                                    break;
                                                                case $all_report_row->rekap_bulan == '9':
                                                                    $txt_rekap_bulan    = 'September';
                                                                    break;
                                                                case $all_report_row->rekap_bulan == '10':
                                                                    $txt_rekap_bulan    = 'Oktober';
                                                                    break;
                                                                case $all_report_row->rekap_bulan == '11':
                                                                    $txt_rekap_bulan    = 'November';
                                                                    break;
                                                                case $all_report_row->rekap_bulan == '12':
                                                                    $txt_rekap_bulan    = 'Desember';
                                                                    break;
                                                                default:
                                                                    $txt_rekap_bulan    = '-';
                                                                    break;
                                                            }

                                                            if (trim($all_report_row->rekap_tanggal_awal) != '') {
                                                                $txt_tanggal_awal = date("d-m-Y", strtotime($all_report_row->rekap_tanggal_awal));
                                                            } else {
                                                                $txt_tanggal_awal = '';
                                                            }

                                                            if (trim($all_report_row->rekap_tanggal_akhir) != '') {
                                                                $txt_tanggal_akhir = date("d-m-Y", strtotime($all_report_row->rekap_tanggal_akhir));
                                                            } else {
                                                                $txt_tanggal_akhir = '';
                                                            }

                                                            if ($all_report_row->create_status == '1') {
                                                                $txt_create = $all_report_row->create_by . ' ' . date("d-m-Y H:i:s", strtotime($all_report_row->create_date)) . ' ' . $all_report_row->create_jabatan;
                                                            } else {
                                                                $txt_create = '';
                                                            }

                                                            if ($all_report_row->app1_status == '1') {
                                                                $txt_app1 = $all_report_row->app1_by . ' ' . date("d-m-Y H:i:s", strtotime($all_report_row->app1_date)) . ' ' . $all_report_row->app1_jabatan;
                                                            } else {
                                                                $txt_app1 = '';
                                                            }

                                                            if ($all_report_row->app2_status == '1') {
                                                                $txt_app2 = $all_report_row->app2_by . ' ' . date("d-m-Y H:i:s", strtotime($all_report_row->app2_date)) . ' ' . $all_report_row->app2_jabatan;
                                                            } else {
                                                                $txt_app2 = '';
                                                            }

                                                            if ($all_report_row->app3_status == '1') {
                                                                $txt_app3 = $all_report_row->app3_by . ' ' . date("d-m-Y H:i:s", strtotime($all_report_row->app3_date)) . ' ' . $all_report_row->app3_jabatan;
                                                            } else {
                                                                $txt_app3 = '';
                                                            }

                                                            if ($all_report_row->pos_ldy != '') {
                                                                $txt_pos_ldy = $all_report_row->nama_laundry . ' (' . $all_report_row->alamat . ')';
                                                            } else {
                                                                $txt_pos_ldy = '';
                                                            } ?>
                                                            <tr>
                                                                <td style="text-align: center;"><?php echo $no; ?></td>
                                                                <td style="text-align: center;"><?php echo $txt_rekap_jenis; ?></td>
                                                                <td style="text-align: center; background-color: <?= $all_report_row->warna_laundry; ?>;"><?php echo $txt_pos_ldy; ?></td>
                                                                <td style="text-align: center;"><?php echo $txt_status; ?></td>
                                                                <td style="text-align: center;"><?php echo $txt_tanggal_awal; ?></td>
                                                                <td style="text-align: center;"><?php echo $txt_tanggal_akhir; ?></td>
                                                                <td style="text-align: center;"><?php echo $txt_rekap_bulan; ?></td>
                                                                <td style="text-align: center;"><?php echo $all_report_row->rekap_tahun; ?></td>
                                                                <td style="text-align: center;"><?php echo $txt_create; ?></td>
                                                                <td style="text-align: center;"><?php echo $txt_app1; ?></td>
                                                                <td style="text-align: center;">
                                                                    <?php if ($all_report_row->rekap_jns == 'Rekap2') { echo '-'; } else { echo $txt_app2; } ?>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <?php if ($all_report_row->rekap_jns == 'Rekap2') { echo $txt_app2;} else { echo $txt_app3; } ?>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <a href="<?php echo base_url('Approval_laundry/view_lap/' . $all_report_row->rekap_id); ?>" class="btn btn-primary btn-circle">
                                                                        <span class="glyphicon glyphicon-search"></span>
                                                                    </a>
                                                                </td>
                                                                <?php if ($this->session->userdata('personalid') == '10197') { ?>
                                                                    <td style="text-align: center;">
                                                                        <a href="<?php echo base_url('Laundry_Rekap/delete_detail_lap/' . $all_report_row->rekap_id); ?>" class="btn btn-danger btn-circle">
                                                                            <span class="glyphicon glyphicon-trash"></span>
                                                                        </a>
                                                                    </td>
                                                                    <?php
                                                                } ?>
                                                            </tr>
                                                            <?php
                                                        }
                                                    } else { ?>
                                                        <tr>
                                                            <td style="text-align: center;"></td>
                                                            <td style="text-align: center;"></td>
                                                            <td style="text-align: center;"></td>
                                                            <td style="text-align: center;"></td>
                                                            <td style="text-align: center;"></td>
                                                            <td style="text-align: center;"></td>
                                                            <td style="text-align: center;"></td>
                                                            <td style="text-align: center;"></td>
                                                            <td style="text-align: center;"></td>
                                                            <td style="text-align: center;"></td>
                                                            <td style="text-align: center;"></td>
                                                            <td style="text-align: center;"></td>
                                                            <td style="text-align: center;"></td>
                                                        </tr>
                                                        <?php 
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                        } ?>

                        <div id="html_report">
                            <?php if (isset($detail_laporan)) {

                                if (isset($post_bln_laporan)) {
                                    switch ($post_bln_laporan) {
                                        case $post_bln_laporan == '1':
                                            $str_bln    = 'Januari';
                                            $str_bln_no = '01';
                                            break;
                                        case $post_bln_laporan == '2':
                                            $str_bln    = 'Februari';
                                            $str_bln_no = '02';
                                            break;
                                        case $post_bln_laporan == '3':
                                            $str_bln    = 'Maret';
                                            $str_bln_no = '03';
                                            break;
                                        case $post_bln_laporan == '4':
                                            $str_bln    = 'April';
                                            $str_bln_no = '04';
                                            break;
                                        case $post_bln_laporan == '5':
                                            $str_bln    = 'Mei';
                                            $str_bln_no = '05';
                                            break;
                                        case $post_bln_laporan == '6':
                                            $str_bln    = 'Juni';
                                            $str_bln_no = '06';
                                            break;
                                        case $post_bln_laporan == '7':
                                            $str_bln    = 'Juli';
                                            $str_bln_no = '07';
                                            break;
                                        case $post_bln_laporan == '8':
                                            $str_bln    = 'Agustus';
                                            $str_bln_no = '08';
                                            break;
                                        case $post_bln_laporan == '9':
                                            $str_bln    = 'September';
                                            $str_bln_no = '09';
                                            break;
                                        case $post_bln_laporan == '10':
                                            $str_bln    = 'Oktober';
                                            $str_bln_no = '10';
                                            break;
                                        case $post_bln_laporan == '11':
                                            $str_bln    = 'November';
                                            $str_bln_no = '11';
                                            break;
                                        case $post_bln_laporan == '12':
                                            $str_bln    = 'Desember';
                                            $str_bln_no = '12';
                                            break;
                                        default:
                                            $str_bln    = '-';
                                            $str_bln_no = '-';
                                            break;
                                    }
                                }

                                if (isset($post_nama_laporan) && trim($post_nama_laporan) != '') {
                                    $url_nama_laporan = $post_nama_laporan;
                                } else {
                                    $url_nama_laporan = '-';
                                }
                                if (isset($post_tipe_laporan) && trim($post_tipe_laporan) != '') {
                                    $url_tipe_laporan = $post_tipe_laporan;
                                } else {
                                    $url_tipe_laporan = '-';
                                }
                                if (isset($post_bln_laporan) && trim($post_bln_laporan) != '') {
                                    $url_bln_laporan = $post_bln_laporan;
                                } else {
                                    $url_bln_laporan = '-';
                                }
                                if (isset($post_thn_laporan) && trim($post_thn_laporan) != '') {
                                    $url_thn_laporan = $post_thn_laporan;
                                } else {
                                    $url_thn_laporan = '-';
                                }
                                if (isset($post_tanggal_awal) && trim($post_tanggal_awal) != '') {
                                    $url_tanggal_awal = $post_tanggal_awal;
                                } else {
                                    $url_tanggal_awal = '-';
                                }
                                if (isset($post_tanggal_akhir) && trim($post_tanggal_akhir) != '') {
                                    $url_tanggal_akhir = $post_tanggal_akhir;
                                } else {
                                    $url_tanggal_akhir = '-';
                                }
                                if (isset($post_periode_laporan) && trim($post_periode_laporan) != '') {
                                    $url_periode_laporan = $post_periode_laporan;
                                } else {
                                    $url_periode_laporan = '-';
                                }

                                if (isset($post_thn_laporan)) {
                                    $str_thn = $post_thn_laporan;
                                } else {
                                    $str_thn = '';
                                }
                                if ($post_nama_laporan == 'Rekap1') {
                                    if (isset($detail_posting)) {
                                        foreach ($detail_posting as $detail_posting_row) {
                                            $rekap_jns                                 = $detail_posting_row->rekap_jns;
                                            $rekap_status_pekerja                      = $detail_posting_row->rekap_status_pekerja;
                                            $rekap_tanggal_awal                        = $detail_posting_row->rekap_tanggal_awal;
                                            $rekap_tanggal_akhir                       = $detail_posting_row->rekap_tanggal_akhir;
                                            $rekap_bulan                               = $detail_posting_row->rekap_bulan;
                                            $rekap_tahun                               = $detail_posting_row->rekap_tahun;
                                            $rekap_periode                             = $detail_posting_row->rekap_periode;

                                            $create_by                                 = $detail_posting_row->create_by;
                                            if (trim($detail_posting_row->create_date)  != '') {
                                                $create_date =  date("d-m-Y H:i:s", strtotime($detail_posting_row->create_date));
                                            } else {
                                                $create_date =  $detail_posting_row->create_date;
                                            }
                                            $create_comp                               = $detail_posting_row->create_comp;
                                            $create_status                             = $detail_posting_row->create_status;
                                            $create_jabatan                            = $detail_posting_row->create_jabatan;
                                            $create_personalid                         = $detail_posting_row->create_personalid;
                                            $create_personalstatus                     = $detail_posting_row->create_personalstatus;

                                            $app1_by                                   = $detail_posting_row->app1_by;
                                            if (trim($detail_posting_row->app1_date)    != '') {
                                                $app1_date =  date("d-m-Y H:i:s", strtotime($detail_posting_row->app1_date));
                                            } else {
                                                $app1_date =  $detail_posting_row->app1_date;
                                            }
                                            $app1_comp                                 = $detail_posting_row->app1_comp;
                                            $app1_status                               = $detail_posting_row->app1_status;
                                            $app1_jabatan                              = $detail_posting_row->app1_jabatan;
                                            $app1_personalid                           = $detail_posting_row->app1_personalid;
                                            $app1_personalstatus                       = $detail_posting_row->app1_personalstatus;

                                            $app2_by                                   = $detail_posting_row->app2_by;
                                            if (trim($detail_posting_row->app2_date)    != '') {
                                                $app2_date =  date("d-m-Y H:i:s", strtotime($detail_posting_row->app2_date));
                                            } else {
                                                $app2_date =  $detail_posting_row->app2_date;
                                            }
                                            $app2_comp                                 = $detail_posting_row->app2_comp;
                                            $app2_status                               = $detail_posting_row->app2_status;
                                            $app2_jabatan                              = $detail_posting_row->app2_jabatan;
                                            $app2_personalid                           = $detail_posting_row->app2_personalid;
                                            $app2_personalstatus                       = $detail_posting_row->app2_personalstatus;


                                            $app2_v2_by                                = $detail_posting_row->app2_v2_by;
                                            if (trim($detail_posting_row->app2_v2_date) != '') {
                                                $app2_v2_date =  date("d-m-Y H:i:s", strtotime($detail_posting_row->app2_v2_date));
                                            } else {
                                                $app2_v2_date =  $detail_posting_row->app2_v2_date;
                                            }
                                            $app2_v2_comp                              = $detail_posting_row->app2_v2_comp;
                                            $app2_v2_status                            = $detail_posting_row->app2_v2_status;
                                            $app2_v2_jabatan                           = $detail_posting_row->app2_v2_jabatan;
                                            $app2_v2_personalid                        = $detail_posting_row->app2_v2_personalid;
                                            $app2_v2_personalstatus                    = $detail_posting_row->app2_v2_personalstatus;

                                            $app3_by                                   = $detail_posting_row->app3_by;
                                            if (trim($detail_posting_row->app3_date)    != '') {
                                                $app3_date =  date("d-m-Y H:i:s", strtotime($detail_posting_row->app3_date));
                                            } else {
                                                $app3_date =  $detail_posting_row->app3_date;
                                            }
                                            $app3_comp                                 = $detail_posting_row->app3_comp;
                                            $app3_status                               = $detail_posting_row->app3_status;
                                            $app3_jabatan                              = $detail_posting_row->app3_jabatan;
                                            $app3_personalid                           = $detail_posting_row->app3_personalid;
                                            $app3_personalstatus                       = $detail_posting_row->app3_personalstatus;

                                            $rekap_id                                  = $detail_posting_row->rekap_id;
                                        }
                                    } else {
                                        $rekap_jns              = '';
                                        $rekap_status_pekerja   = '';
                                        $rekap_tanggal_awal     = '';
                                        $rekap_tanggal_akhir    = '';
                                        $rekap_bulan            = '';
                                        $rekap_tahun            = '';
                                        $rekap_periode          = '';

                                        $create_by              = '';
                                        $create_date            = '';
                                        $create_comp            = '';
                                        $create_status          = '';
                                        $create_jabatan         = '';
                                        $create_personalid      = '';
                                        $create_personalstatus  = '';

                                        $app1_by                = '';
                                        $app1_date              = '';
                                        $app1_comp              = '';
                                        $app1_status            = '';
                                        $app1_jabatan           = '';
                                        $app1_personalid        = '';
                                        $app1_personalstatus    = '';

                                        $app2_by                = '';
                                        $app2_date              = '';
                                        $app2_comp              = '';
                                        $app2_status            = '';
                                        $app2_jabatan           = '';
                                        $app2_personalid        = '';
                                        $app2_personalstatus    = '';


                                        $app2_v2_by             = '';
                                        $app2_v2_date           = '';
                                        $app2_v2_comp           = '';
                                        $app2_v2_status         = '';
                                        $app2_v2_jabatan        = '';
                                        $app2_v2_personalid     = '';
                                        $app2_v2_personalstatus = '';

                                        $app3_by                = '';
                                        $app3_date              = '';
                                        $app3_comp              = '';
                                        $app3_status            = '';
                                        $app3_jabatan           = '';
                                        $app3_personalid        = '';
                                        $app3_personalstatus    = '';

                                        $rekap_id               = '';
                                    } ?>
                                    <div class="row">
                                        <div class="col-md-12 panel">
                                            <div class="col-md-12 panel-heading bg-info">
                                                <div class="col-md-2" style="text-align: center;">
                                                    <img src="<?php echo base_url('./assets/images/psg.png'); ?>" width="150" height="150">
                                                </div>
                                                <div class="col-md-6" style="text-align: center;">
                                                    <h2>PT PULAU SAMBU</h2>
                                                    <h4>LAPORAN PENDAPATAN LAUNDRY <?= $vpost_pos_ldy ?></h4>
                                                </div>
                                                <div class="col-md-4" style="text-align: left;">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label text-left">Dokumen</label>
                                                        <div class="col-sm-1 text-center">:</div>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control primary" id="txt_doc" name="txt_doc" readonly="" value="<?php echo 'RLPL/GAF/' . substr($str_thn, -2, 2) . '/' . $str_bln_no; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label text-left">Periode</label>
                                                        <div class="col-sm-1 text-center">:</div>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control primary" id="txt_periode" name="txt_periode" readonly="" value="<?php echo $str_bln . ' ' . $str_thn; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 panel-body bg-info" style="padding-bottom:30px;">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4></h4>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <span class="pull-left"></span>
                                                                        <span class="pull-right">
                                                                            <?php if (isset($post_nama_laporan)) { ?>
                                                                                <a href="<?php echo base_url('laundry_excel_rekap1/create_excel/' . $url_nama_laporan . '/' . $url_tipe_laporan . '/' . $url_bln_laporan . '/' . $url_thn_laporan . '/' . $url_tanggal_awal . '/' . $url_tanggal_akhir . '/' . $url_periode_laporan . '/' . $post_pos_ldy) ?>" class="btn btn-success btn-circle">Export Excel</a>
                                                                                <?php
                                                                            } ?>
                                                                        </span>
                                                                    </div>
                                                                    <br>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="3" colspan="1">No</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="3" colspan="1">No. Nota</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="3" colspan="1">Status</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="3" colspan="1">Nik</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="3" colspan="1">Nama</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="3" colspan="1">Dept</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="3" colspan="1">CV/KYW</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="1" colspan="2">Tanggal</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="1" colspan="8">Jumlah</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="1" colspan="3">Total (Rp)</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="2" colspan="1">Terima</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="2" colspan="1">Selesai</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="1" colspan="2">Cuci + Setrika</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="1" colspan="2">Cuci</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="1" colspan="2">Setrika</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="1" colspan="2">Lainnya</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="2" colspan="1">Cash</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="2" colspan="1">Potong Gaji</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="2" colspan="1">Lainnya</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="1" colspan="1">(Kg)</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="1" colspan="1">(Rp)</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="1" colspan="1">(Kg)</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="1" colspan="1">(Rp)</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="1" colspan="1">(Kg)</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="1" colspan="1">(Rp)</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="1" colspan="1">(Kg)</th>
                                                                                        <th style="text-align: center; vertical-align: middle;" rowspan="1" colspan="1">(Rp)</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php if ($detail_laporan == TRUE) {
                                                                                        $no = 0;
                                                                                        $total_cuci_setrika = 0;
                                                                                        $total_cuci = 0;
                                                                                        $total_setrika = 0;
                                                                                        $total_jenis_lainnya = 0;
                                                                                        $total_cash = 0;
                                                                                        $total_potong_gaji = 0;
                                                                                        $total_lainnya = 0;
                                                                                        foreach ($detail_laporan as $detail_laporan_row) {
                                                                                            $no++;
                                                                                            if (is_numeric($detail_laporan_row->cuci_setrika)) {
                                                                                                $total_cuci_setrika += $detail_laporan_row->cuci_setrika;
                                                                                            }
                                                                                            if (is_numeric($detail_laporan_row->cuci_saja)) {
                                                                                                $total_cuci += $detail_laporan_row->cuci_saja;
                                                                                            }
                                                                                            if (is_numeric($detail_laporan_row->setrika_saja)) {
                                                                                                $total_setrika += $detail_laporan_row->setrika_saja;
                                                                                            }
                                                                                            if (is_numeric($detail_laporan_row->jenis_lain)) {
                                                                                                $total_jenis_lainnya += $detail_laporan_row->jenis_lain;
                                                                                            }
                                                                                            if (is_numeric($detail_laporan_row->cash)) {
                                                                                                $total_cash += $detail_laporan_row->cash;
                                                                                            }
                                                                                            if (is_numeric($detail_laporan_row->potong_gaji)) {
                                                                                                $total_potong_gaji += $detail_laporan_row->potong_gaji;
                                                                                            }
                                                                                            if (is_numeric($detail_laporan_row->lainnya)) {
                                                                                                $total_lainnya += $detail_laporan_row->lainnya;
                                                                                            } ?>
                                                                                            <tr>
                                                                                                <td style="text-align: center;"><?php echo $no; ?></td>
                                                                                                <td style="text-align: center;"><?php echo $detail_laporan_row->nota; ?></td>
                                                                                                <td style="text-align: center;">
                                                                                                    <?php if ($detail_laporan_row->tipe_karyawan == '1') {
                                                                                                        echo 'Karyawan';
                                                                                                    } elseif ($detail_laporan_row->tipe_karyawan == '2') {
                                                                                                        echo 'Tenaga Kerja';
                                                                                                    } elseif ($detail_laporan_row->tipe_karyawan == '3') {
                                                                                                        echo 'Tamu';
                                                                                                    } elseif ($detail_laporan_row->tipe_karyawan == '4') {
                                                                                                        echo 'Non Pekerja';
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    } ?>
                                                                                                </td>
                                                                                                <td style="text-align: center;"><?php echo $detail_laporan_row->nik_karyawan; ?></td>
                                                                                                <td style="text-align: left;"><?php echo $detail_laporan_row->nama_karyawan; ?></td>
                                                                                                <td style="text-align: center;"><?php echo $detail_laporan_row->departemen; ?></td>
                                                                                                <td style="text-align: center;"><?php echo $detail_laporan_row->pemborong; ?></td>
                                                                                                <td style="text-align: center;"><?php echo date("d-m-Y", strtotime($detail_laporan_row->tanggal_terima)); ?></td>
                                                                                                <td style="text-align: center;"><?php echo date("d-m-Y", strtotime($detail_laporan_row->tanggal_selesai)) ?></td>
                                                                                                <td style="text-align: center;">
                                                                                                    <?php if (trim($detail_laporan_row->cuci_setrika) != '') {
                                                                                                        echo number_format(($detail_laporan_row->cuci_setrika), 1, ',', '.');
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    } ?>
                                                                                                </td>
                                                                                                <td style="text-align: center;">
                                                                                                    <?php if (trim($detail_laporan_row->harga_cuci_setrika) != '') {
                                                                                                        echo number_format(($detail_laporan_row->harga_cuci_setrika), 0, ',', '.');
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    } ?>
                                                                                                </td>
                                                                                                <td style="text-align: center;">
                                                                                                    <?php if (trim($detail_laporan_row->cuci_saja) != '') { 
                                                                                                        echo number_format(($detail_laporan_row->cuci_saja), 1, ',', '.'); 
                                                                                                    } else { 
                                                                                                        echo '-'; 
                                                                                                    } ?>
                                                                                                </td>
                                                                                                <td style="text-align: center;">
                                                                                                    <?php if (trim($detail_laporan_row->harga_cuci_saja) != '') {
                                                                                                        echo number_format(($detail_laporan_row->harga_cuci_saja), 0, ',', '.');
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    } ?>
                                                                                                </td>
                                                                                                <td style="text-align: center;">
                                                                                                    <?php if (trim($detail_laporan_row->setrika_saja) != '') {
                                                                                                        echo number_format(($detail_laporan_row->setrika_saja), 1, ',', '.');
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    } ?>
                                                                                                </td>
                                                                                                <td style="text-align: center;">
                                                                                                    <?php if (trim($detail_laporan_row->harga_setrika_saja) != '') {
                                                                                                        echo number_format(($detail_laporan_row->harga_setrika_saja), 0, ',', '.');
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    } ?>
                                                                                                </td>
                                                                                                <td style="text-align: center;">
                                                                                                    <?php if (trim($detail_laporan_row->jenis_lain) != '') {
                                                                                                        echo number_format(($detail_laporan_row->jenis_lain), 1, ',', '.');
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    } ?>
                                                                                                </td>
                                                                                                <td style="text-align: center;">
                                                                                                    <?php if (trim($detail_laporan_row->harga_jenis_lain) != '') {
                                                                                                        echo number_format(($detail_laporan_row->harga_jenis_lain), 0, ',', '.');
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    } ?>
                                                                                                </td>
                                                                                                <td style="text-align: center;">
                                                                                                    <?php if (trim($detail_laporan_row->cash) != '') {
                                                                                                        echo number_format(($detail_laporan_row->cash), 0, ',', '.');
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    } ?>
                                                                                                </td>
                                                                                                <td style="text-align: center;">
                                                                                                    <?php if (trim($detail_laporan_row->potong_gaji) != '') {
                                                                                                        echo number_format(($detail_laporan_row->potong_gaji), 0, ',', '.');
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    } ?>
                                                                                                </td>
                                                                                                <td style="text-align: center;">
                                                                                                    <?php if (trim($detail_laporan_row->lainnya) != '') {
                                                                                                        echo number_format(($detail_laporan_row->lainnya), 0, ',', '.');
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    } ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <?php 
                                                                                        }
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
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                        </tr>
                                                                                        <?php
                                                                                    } ?>
                                                                                </tbody>
                                                                                <tfoot class="bg-default">
                                                                                    <tr>
                                                                                        <td colspan="9" style="text-align: center;"><b>TOTAL KESELURUHAN</b></td>
                                                                                        <td style="text-align: center;">
                                                                                            <b>
                                                                                                <?php if (isset($total_cuci_setrika)) {
                                                                                                    if ($total_cuci_setrika != 0) {
                                                                                                        echo number_format(($total_cuci_setrika), 1, ',', '.');
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    }
                                                                                                } ?>
                                                                                            </b>
                                                                                        </td>
                                                                                        <td style="text-align: center;">-</td>
                                                                                        <td style="text-align: center;">
                                                                                            <b>
                                                                                                <?php if (isset($total_cuci)) {
                                                                                                    if ($total_cuci != 0) {
                                                                                                        echo number_format(($total_cuci), 1, ',', '.');
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    }
                                                                                                } ?>
                                                                                            </b>
                                                                                        </td>
                                                                                        <td style="text-align: center;">-</td>
                                                                                        <td style="text-align: center;">
                                                                                            <b>
                                                                                                <?php if (isset($total_setrika)) {
                                                                                                    if ($total_setrika != 0) {
                                                                                                        echo number_format(($total_setrika), 1, ',', '.');
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    }
                                                                                                } ?>
                                                                                            </b>
                                                                                        </td>
                                                                                        <td style="text-align: center;">-</td>
                                                                                        <td style="text-align: center;">
                                                                                            <b>
                                                                                                <?php if (isset($total_jenis_lainnya)) {
                                                                                                    if ($total_jenis_lainnya != 0) {
                                                                                                        echo number_format(($total_jenis_lainnya), 1, ',', '.');
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    }
                                                                                                } ?>
                                                                                            </b>
                                                                                        </td>
                                                                                        <td style="text-align: center;">-</td>
                                                                                        <td style="text-align: center;">
                                                                                            <b>
                                                                                                <?php if (isset($total_cash)) {
                                                                                                    if ($total_cash != 0) {
                                                                                                        echo number_format(($total_cash), 0, ',', '.');
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    }
                                                                                                } ?>
                                                                                            </b>
                                                                                        </td>
                                                                                        <td style="text-align: center;">
                                                                                            <b>
                                                                                                <?php if (isset($total_potong_gaji)) {
                                                                                                    if ($total_potong_gaji != 0) {
                                                                                                        echo number_format(($total_potong_gaji), 0, ',', '.');
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    }
                                                                                                } ?>
                                                                                            </b>
                                                                                        </td>
                                                                                        <td style="text-align: center;">
                                                                                            <b>
                                                                                                <?php if (isset($total_lainnya)) {
                                                                                                    if ($total_lainnya != 0) {
                                                                                                        echo number_format(($total_lainnya), 0, ',', '.');
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    }
                                                                                                } ?>
                                                                                            </b>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td colspan="9" style="text-align: center;"><b>GRAND TOTAL</b></td>
                                                                                        <td colspan="7" style="text-align: center;"><b></b></td>
                                                                                        <td colspan="3" style="text-align: right;">
                                                                                            <b>
                                                                                                <?php if (isset($total_cash) || isset($total_potong_gaji) || isset($total_lainnya)) {
                                                                                                    echo 'Rp ' . number_format(($total_cash + $total_potong_gaji + $total_lainnya), 0, ',', '.');
                                                                                                } else {
                                                                                                    echo '-';
                                                                                                } ?>
                                                                                            </b>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td colspan="9" style="text-align: center;"><b>TERBILANG</b></td>
                                                                                        <td colspan="11" style="text-align: right;">
                                                                                            <b>
                                                                                                <?php if (isset($total_cash) || isset($total_potong_gaji) || isset($total_lainnya)) {
                                                                                                    $angka_terbilang = $total_cash + $total_potong_gaji + $total_lainnya;
                                                                                                    echo terbilang($angka_terbilang);
                                                                                                } else {
                                                                                                    echo '-';
                                                                                                } ?>
                                                                                            </b>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br><br>
                                                                <div class="row">
                                                                    <div class="col-lg-1"></div>
                                                                    <div class="col-lg-10">
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <thead class="bg-info">
                                                                                    <tr>
                                                                                        <th colspan="3" style="text-align: center;" class="bg-info">Dibuat Oleh</th>
                                                                                        <th colspan="3" style="text-align: center;" class="bg-info">Diperiksa Oleh</th>
                                                                                        <th colspan="6" style="text-align: center;" class="bg-info">Diketahui Oleh</th>
                                                                                        <th colspan="3" style="text-align: center;" class="bg-info">Disetujui Oleh</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td colspan="3" style="text-align: center;">
                                                                                            <?php if ($create_status == '1') {
                                                                                                $url       = base_url();
                                                                                                if ($create_personalstatus == 2  && file_exists(FCPATH . 'assets/foto_kar/TTD_TK/' . $create_personalid . '.png')) {
                                                                                                    echo ' <img src="' . $url . 'assets/foto_kar/TTD_TK/' . $create_personalid . '.PNG" width="150" height="100">';
                                                                                                } else if ($create_personalstatus == 1  && file_exists(FCPATH . 'assets/foto_kar/TTD_KRY/' . $create_personalid . '_0_0.png')) {
                                                                                                    echo ' <img src="' . $url . 'assets/foto_kar/TTD_KRY/' . $create_personalid . '_0_0.PNG" width="150" height="100">';
                                                                                                } ?>
                                                                                                <?php 
                                                                                            } ?>
                                                                                        </td>
                                                                                        <td colspan="3" style="text-align: center;">
                                                                                            <?php if ($app1_status == '1') {
                                                                                                $url       = base_url();
                                                                                                if ($app1_personalstatus == 2  && file_exists(FCPATH . 'assets/foto_kar/TTD_TK/' . $app1_personalid . '.png')) {
                                                                                                    echo ' <img src="' . $url . 'assets/foto_kar/TTD_TK/' . $app1_personalid . '.PNG" width="150" height="100">';
                                                                                                } else if ($app1_personalstatus == 1  && file_exists(FCPATH . 'assets/foto_kar/TTD_KRY/' . $app1_personalid . '_0_0.png')) {
                                                                                                    echo ' <img src="' . $url . 'assets/foto_kar/TTD_KRY/' . $app1_personalid . '_0_0.PNG" width="150" height="100">';
                                                                                                } ?>
                                                                                                <?php
                                                                                            } else {
                                                                                                if (isset($app_number) && $app_number == 'app1') { ?>
                                                                                                    <a href="<?php echo base_url('Laundry_approval/single_approve/' . $rekap_id . '/' . $app_number) ?>" class="btn btn-primary btn-circle" onclick="return confirm('Approve Laporan..?')"><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> Approve</a>
                                                                                                    <?php 
                                                                                                } ?>
                                                                                                <?php 
                                                                                            } ?>
                                                                                        </td>
                                                                                        <td colspan="3" style="text-align: center;">
                                                                                            <?php if ($app2_status == '1') {
                                                                                                $url       = base_url();
                                                                                                if ($app2_v2_personalstatus == 2  && file_exists(FCPATH . 'assets/foto_kar/TTD_TK/' . $app2_v2_personalid . '.png')) {
                                                                                                    echo ' <img src="' . $url . 'assets/foto_kar/TTD_TK/' . $app2_v2_personalid . '.PNG" width="150" height="100">';
                                                                                                } else if ($app2_v2_personalstatus == 1  && file_exists(FCPATH . 'assets/foto_kar/TTD_KRY/' . $app2_v2_personalid . '_0_0.png')) {
                                                                                                    echo ' <img src="' . $url . 'assets/foto_kar/TTD_KRY/' . $app2_v2_personalid . '_0_0.PNG" width="150" height="100">';
                                                                                                } ?>
                                                                                                <?php 
                                                                                            } ?>
                                                                                        </td>
                                                                                        <td colspan="3" style="text-align: center;">
                                                                                            <?php if ($app2_status == '1') {
                                                                                                $url       = base_url();
                                                                                                if ($app2_personalstatus == 2  && file_exists(FCPATH . 'assets/foto_kar/TTD_TK/' . $app2_personalid . '.png')) {
                                                                                                    echo ' <img src="' . $url . 'assets/foto_kar/TTD_TK/' . $app2_personalid . '.PNG" width="150" height="100">';
                                                                                                } else if ($app2_personalstatus == 1  && file_exists(FCPATH . 'assets/foto_kar/TTD_KRY/' . $app2_personalid . '_0_0.png')) {
                                                                                                    echo ' <img src="' . $url . 'assets/foto_kar/TTD_KRY/' . $app2_personalid . '_0_0.PNG" width="150" height="100">';
                                                                                                } ?>
                                                                                                <?php 
                                                                                            } else {
                                                                                                if (isset($app_number) && $app_number == 'app2') { ?>
                                                                                                    <a href="<?php echo base_url('Laundry_approval/single_approve/' . $rekap_id . '/' . $app_number) ?>" class="btn btn-primary btn-circle" onclick="return confirm('Approve Laporan..?')"><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> Approve</a>
                                                                                                    <?php 
                                                                                                } ?>
                                                                                                <?php 
                                                                                            } ?>
                                                                                        </td>
                                                                                        <td colspan="3" style="text-align: center;">
                                                                                            <?php if ($app3_status == '1') { ?>
                                                                                                <img src="<?php echo base_url('./assets/approved2.png'); ?>" width="150" height="100">
                                                                                                    <?php 
                                                                                            } else {
                                                                                                if (isset($app_number) && $app_number == 'app3') { ?>
                                                                                                    <a href="<?php echo base_url('Laundry_approval/single_approve/' . $rekap_id . '/' . $app_number) ?>" class="btn btn-primary btn-circle" onclick="return confirm('Approve Laporan..?')"><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> Approve</a>
                                                                                                    <?php 
                                                                                                } ?>
                                                                                                <?php 
                                                                                            } ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="text-align: left;">Nama</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $create_by; ?></td>
                                                                                        <td style="text-align: left;">Nama</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $app1_by; ?></td>
                                                                                        <td style="text-align: left;">Nama</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $app2_v2_by; ?></td>
                                                                                        <td style="text-align: left;">Nama</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $app2_by; ?></td>
                                                                                        <td style="text-align: left;">Nama</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $app3_by; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="text-align: left;">Jabatan</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $create_jabatan; ?></td>
                                                                                        <td style="text-align: left;">Jabatan</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $app1_jabatan; ?></td>
                                                                                        <td style="text-align: left;">Jabatan</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $app2_v2_jabatan; ?></td>
                                                                                        <td style="text-align: left;">Jabatan</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $app2_jabatan; ?></td>
                                                                                        <td style="text-align: left;">Jabatan</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $app3_jabatan; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="text-align: left;">Tanggal</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $create_date; ?></td>
                                                                                        <td style="text-align: left;">Tanggal</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $app1_date; ?></td>
                                                                                        <td style="text-align: left;">Tanggal</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $app2_v2_date; ?></td>
                                                                                        <td style="text-align: left;">Tanggal</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $app2_date; ?></td>
                                                                                        <td style="text-align: left;">Tanggal</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $app3_date; ?></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-1"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                } elseif ($post_nama_laporan == 'Rekap2') {
                                    if (isset($detail_posting)) {
                                        foreach ($detail_posting as $detail_posting_row) {
                                            $n_rekap_jns[]              = $detail_posting_row->rekap_jns;
                                            $n_rekap_status_pekerja[]   = $detail_posting_row->rekap_status_pekerja;
                                            $n_rekap_tanggal_awal[]     = $detail_posting_row->rekap_tanggal_awal;
                                            $n_rekap_tanggal_akhir[]    = $detail_posting_row->rekap_tanggal_akhir;
                                            $n_rekap_bulan[]            = $detail_posting_row->rekap_bulan;
                                            $n_rekap_tahun[]            = $detail_posting_row->rekap_tahun;
                                            $n_create_by[]              = $detail_posting_row->create_by;
                                            $n_create_date[]            = date("d-m-Y H:i:s", strtotime($detail_posting_row->create_date));
                                            $n_create_comp[]            = $detail_posting_row->create_comp;
                                            $n_create_status[]          = $detail_posting_row->create_status;
                                            $n_create_jabatan[]         = $detail_posting_row->create_jabatan;
                                            $n_app1_by[]                = $detail_posting_row->app1_by;
                                            if (trim($detail_posting_row->app1_date) != '') {
                                                $n_app1_date[] =  date("d-m-Y H:i:s", strtotime($detail_posting_row->app1_date));
                                            } else {
                                                $n_app1_date[] =  $detail_posting_row->app1_date;
                                            }
                                            $n_app1_comp[] = $detail_posting_row->app1_comp;
                                            $n_app1_status[] = $detail_posting_row->app1_status;
                                            $n_app2_by[] = $detail_posting_row->app2_by;
                                            if (trim($detail_posting_row->app2_date) != '') {
                                                $n_app2_date[] =  date("d-m-Y H:i:s", strtotime($detail_posting_row->app2_date));
                                            } else {
                                                $n_app2_date[] =  $detail_posting_row->app2_date;
                                            }
                                            $n_app2_comp[] = $detail_posting_row->app2_comp;
                                            $n_app2_status[] = $detail_posting_row->app2_status;
                                            $n_app3_by[] = $detail_posting_row->app3_by;
                                            if (trim($detail_posting_row->app3_date) != '') {
                                                $n_app3_date[] =  date("d-m-Y H:i:s", strtotime($detail_posting_row->app3_date));
                                            } else {
                                                $n_app3_date[] =  $detail_posting_row->app3_date;
                                            }
                                            $n_app3_comp[] = $detail_posting_row->app3_comp;
                                            $n_app3_status[] = $detail_posting_row->app3_status;
                                            $n_rekap_id[] = $detail_posting_row->rekap_id;
                                            $n_app1_jabatan[] = $detail_posting_row->app1_jabatan;
                                            $n_app2_jabatan[] = $detail_posting_row->app2_jabatan;
                                            $n_app3_jabatan[] = $detail_posting_row->app3_jabatan;
                                            $n_rekap_posting_to_psn[] = $detail_posting_row->rekap_posting_to_psn;
                                        }

                                        $rekap_jns              = implode(", ", array_unique($n_rekap_jns));
                                        $rekap_status_pekerja   = implode(", ", array_unique($n_rekap_status_pekerja));
                                        $rekap_tanggal_awal     = implode(", ", array_unique($n_rekap_tanggal_awal));
                                        $rekap_tanggal_akhir    = implode(", ", array_unique($n_rekap_tanggal_akhir));
                                        $rekap_bulan            = implode(", ", array_unique($n_rekap_bulan));
                                        $rekap_tahun            = implode(", ", array_unique($n_rekap_tahun));
                                        $create_by              = implode(", ", array_unique($n_create_by));
                                        $create_date            = implode(", ", array_unique($n_create_date));
                                        $create_comp            = implode(", ", array_unique($n_create_comp));
                                        $create_status          = implode(", ", array_unique($n_create_status));
                                        $create_jabatan         = implode(", ", array_unique($n_create_jabatan));
                                        $app1_by                = implode(", ", array_unique($n_app1_by));
                                        $app1_date              = implode(", ", array_unique($n_app1_date));
                                        $app1_comp              = implode(", ", array_unique($n_app1_comp));
                                        $app1_status            = implode(", ", array_unique($n_app1_status));
                                        $app2_by                = implode(", ", array_unique($n_app2_by));
                                        $app2_date              = implode(", ", array_unique($n_app2_date));
                                        $app2_comp              = implode(", ", array_unique($n_app2_comp));
                                        $app2_status            = implode(", ", array_unique($n_app2_status));
                                        $app3_by                = implode(", ", array_unique($n_app3_by));
                                        $app3_date              = implode(", ", array_unique($n_app3_date));
                                        $app3_comp              = implode(", ", array_unique($n_app3_comp));
                                        $app3_status            = implode(", ", array_unique($n_app3_status));
                                        $rekap_id               = implode(", ", array_unique($n_rekap_id));
                                        $app1_jabatan           = implode(", ", array_unique($n_app1_jabatan));
                                        $app2_jabatan           = implode(", ", array_unique($n_app2_jabatan));
                                        $app3_jabatan           = implode(", ", array_unique($n_app3_jabatan));
                                        $rekap_posting_to_psn   = implode(", ", array_unique($n_rekap_posting_to_psn));
                                    } else {
                                        $rekap_jns              = '';
                                        $rekap_status_pekerja   = '';
                                        $rekap_tanggal_awal     = '';
                                        $rekap_tanggal_akhir    = '';
                                        $rekap_bulan            = '';
                                        $rekap_tahun            = '';
                                        $create_by              = '';
                                        $create_date            = '';
                                        $create_comp            = '';
                                        $create_status          = '';
                                        $create_jabatan         = '';
                                        $app1_by                = '';
                                        $app1_date              = '';
                                        $app1_comp              = '';
                                        $app1_status            = '';
                                        $app2_by                = '';
                                        $app2_date              = '';
                                        $app2_comp              = '';
                                        $app2_status            = '';
                                        $app3_by                = '';
                                        $app3_date              = '';
                                        $app3_comp              = '';
                                        $app3_status            = '';
                                        $rekap_id               = '';
                                        $app1_jabatan           = '';
                                        $app2_jabatan           = '';
                                        $app3_jabatan           = '';
                                        $rekap_posting_to_psn   = '';
                                    }
                                    if (isset($post_periode_laporan)) {
                                        if ($post_periode_laporan == '1') {
                                            $str_periode = '01';
                                        } elseif ($post_periode_laporan == '2') {
                                            $str_periode = '02';
                                        } else {
                                            $str_periode = $post_periode_laporan;
                                        }
                                    } else {
                                        $str_periode = '01';
                                    } ?>
                                    <div class="row">
                                        <div class="col-md-12 panel">
                                            <div class="col-md-12 panel-heading bg-info">
                                                <div class="col-md-2" style="text-align: center;">
                                                    <img src="<?php echo base_url('./assets/images/psg.png'); ?>" width="150" height="150">
                                                </div>
                                                <div class="col-md-6" style="text-align: center;">
                                                    <h2>PT PULAU SAMBU
                                                        <hr />
                                                        <h4>LAPORAN POTONGAN LAUNDRY
                                                            <br><?php echo 'PERIODE ' . $str_periode . ' TANGGAL ' . date("d-m-Y", strtotime($post_tanggal_awal)) . ' s/d ' . date("d-m-Y", strtotime($post_tanggal_akhir)); ?>
                                                        </h4>
                                                    </h2>
                                                </div>
                                                <div class="col-md-4" style="text-align: left;">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label text-left">Dokumen</label>
                                                        <div class="col-sm-1 text-center">:</div>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control primary" id="txt_doc" name="txt_doc" readonly="" value="<?php echo 'RLPL/GAF/' . substr($str_thn, -2, 2) . '/' . $str_bln_no . '/' . $str_periode; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label text-left">Periode</label>
                                                        <div class="col-sm-1 text-center">:</div>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control primary" id="txt_periode" name="txt_periode" readonly="" value="<?php echo $str_bln . ' ' . $str_thn; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 panel-body bg-info" style="padding-bottom:30px;">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4></h4>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <span class="pull-left"></span>
                                                                        <span class="pull-right">
                                                                            <?php if (isset($post_nama_laporan)) { ?>
                                                                                <a href="<?php echo base_url('laundry_excel_rekap2/create_excel/' . $url_nama_laporan . '/' . $url_tipe_laporan . '/' . $url_bln_laporan . '/' . $url_thn_laporan . '/' . $url_tanggal_awal . '/' . $url_tanggal_akhir . '/' . $url_periode_laporan) ?>" class="btn btn-success btn-circle">Export Excel</a>
                                                                                <?php
                                                                                if (!isset($app_number)) {
                                                                                    if (trim($rekap_id) != '') { ?>
                                                                                        <span class="btn btn-danger btn-circle"><i class="fa fa-check-square-o " aria-hidden="true"></i> RECAPITULATION POSTED</span>
                                                                                        <?php
                                                                                        if (trim($app1_status) != '' && trim($app2_status) != '') {
                                                                                            if (trim($rekap_posting_to_psn) == '') { ?>
                                                                                                <a href="<?php echo base_url('Laundry_rekap/posting_to_psn/' . $url_nama_laporan . '/' . $url_tipe_laporan . '/' . $url_bln_laporan . '/' . $url_thn_laporan . '/' . $url_tanggal_awal . '/' . $url_tanggal_akhir . '/' . $url_periode_laporan . '/' . $rekap_id) ?>" class="btn btn-primary btn-circle" onclick="return confirm('Posting Rekap Laundry..?')">Posting Payroll</a>
                                                                                                <?php
                                                                                            } else { ?>
                                                                                                <span class="btn btn-danger btn-circle"><i class="fa fa-check-square-o " aria-hidden="true"></i> PAYROLL POSTED</span>
                                                                                                <?php 
                                                                                            }
                                                                                        } ?>
                                                                                        <?php
                                                                                    } else { ?>
                                                                                        <a href="<?php echo base_url('Laundry_rekap/posting_rekap/' . $url_nama_laporan . '/' . $url_tipe_laporan . '/' . $url_bln_laporan . '/' . $url_thn_laporan . '/' . $url_tanggal_awal . '/' . $url_tanggal_akhir . '/' . $url_periode_laporan) ?>" class="btn btn-primary btn-circle" onclick="return confirm('Posting Rekap Laundry..?')">Posting Rekap</a>
                                                                                        <?php 
                                                                                    }
                                                                                } ?>
                                                                                <?php 
                                                                            } ?>
                                                                        </span>
                                                                    </div>
                                                                    <br><br><br>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th style="text-align: center;">No</th>
                                                                                        <th style="text-align: center;">Status</th>
                                                                                        <th style="text-align: center;">Nik</th>
                                                                                        <th style="text-align: center;">Nama</th>
                                                                                        <th style="text-align: center;">Dept</th>
                                                                                        <th style="text-align: center;">CV/KYW</th>
                                                                                        <th style="text-align: center;">Jumlah (Rp)</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php if ($detail_laporan == TRUE) {
                                                                                        $no = 0;
                                                                                        $total_potong_gaji = 0;
                                                                                        foreach ($detail_laporan as $detail_laporan_row) {
                                                                                            $no++;
                                                                                            if (is_numeric($detail_laporan_row->potong_gaji)) {
                                                                                                $total_potong_gaji += $detail_laporan_row->potong_gaji;
                                                                                            } ?>
                                                                                            <tr>
                                                                                                <td style="text-align: center;"><?php echo $no; ?></td>
                                                                                                <td style="text-align: center;">
                                                                                                    <?php if ($detail_laporan_row->tipe_karyawan == '1') {
                                                                                                        echo 'Karyawan';
                                                                                                    } elseif ($detail_laporan_row->tipe_karyawan == '2') {
                                                                                                        echo 'Tenaga Kerja';
                                                                                                    } else {
                                                                                                        echo '-';
                                                                                                    } ?>
                                                                                                </td>
                                                                                                <td style="text-align: center;"><?php echo $detail_laporan_row->nik_karyawan; ?></td>
                                                                                                <td style="text-align: left;"><?php echo $detail_laporan_row->nama_karyawan; ?></td>
                                                                                                <td style="text-align: center;"><?php echo $detail_laporan_row->departemen; ?></td>
                                                                                                <td style="text-align: center;"><?php echo $detail_laporan_row->pemborong; ?></td>
                                                                                                <td style="text-align: center;"><?php echo $detail_laporan_row->potong_gaji; ?></td>
                                                                                            </tr>
                                                                                            <?php 
                                                                                        }
                                                                                    } else { ?>
                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                        </tr>
                                                                                        <?php
                                                                                    } ?>
                                                                                </tbody>
                                                                                <tfoot class="bg-default">
                                                                                    <tr>
                                                                                        <td colspan="2" style="text-align: center;"><b>TOTAL KESELURUHAN</b></td>
                                                                                        <td colspan="4" style="text-align: center;"></td>
                                                                                        <td style="text-align: right;">
                                                                                            <b>
                                                                                                <?php if (isset($total_potong_gaji)) {
                                                                                                    if ($total_potong_gaji != 0) {
                                                                                                        echo $total_potong_gaji;
                                                                                                    }
                                                                                                } ?>
                                                                                            </b>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td colspan="2" style="text-align: center;"><b>TERBILANG</b></td>
                                                                                        <td colspan="5" style="text-align: right;">
                                                                                            <b>
                                                                                                <?php if (isset($total_potong_gaji)) {
                                                                                                    echo terbilang($total_potong_gaji);
                                                                                                } else {
                                                                                                    echo '-';
                                                                                                } ?>
                                                                                            </b>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <br><br>
                                                                <div class="row">
                                                                    <div class="col-lg-1"></div>
                                                                    <div class="col-lg-10">
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <thead class="bg-info">
                                                                                    <tr>
                                                                                        <th colspan="3" style="text-align: left;" class="bg-info">Dibuat Oleh</th>
                                                                                        <th colspan="3" style="text-align: left;" class="bg-info">Diperiksa Oleh</th>
                                                                                        <th colspan="3" style="text-align: left;" class="bg-info">Disetujui Oleh</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td colspan="3" style="text-align: center;">
                                                                                            <?php if ($create_status == '1') { ?>
                                                                                                <img src="<?php echo base_url('./assets/approved2.png'); ?>" width="150" height="100">
                                                                                                <?php 
                                                                                            } ?>
                                                                                        </td>
                                                                                        <td colspan="3" style="text-align: center;">
                                                                                            <?php if ($app1_status == '1') { ?>
                                                                                                <img src="<?php echo base_url('./assets/approved2.png'); ?>" width="150" height="100">
                                                                                                <?php 
                                                                                            } else {
                                                                                                if (isset($app_number) && $app_number == 'app1') { ?>
                                                                                                    <a href="<?php echo base_url('Laundry_approval/single_approve/' . $rekap_id . '/' . $app_number) ?>" class="btn btn-primary btn-circle" onclick="return confirm('Approve Laporan..?')"><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> Approve</a>
                                                                                                    <?php 
                                                                                                } ?>
                                                                                                <?php 
                                                                                            } ?>
                                                                                        </td>
                                                                                        <td colspan="3" style="text-align: center;">
                                                                                            <?php if ($app2_status == '1') { ?>
                                                                                                <img src="<?php echo base_url('./assets/approved2.png'); ?>" width="150" height="100">
                                                                                                <?php 
                                                                                            } else {
                                                                                                if (isset($app_number) && $app_number == 'app2') { ?>
                                                                                                    <a href="<?php echo base_url('Laundry_approval/single_approve/' . $rekap_id . '/' . $app_number) ?>" class="btn btn-primary btn-circle" onclick="return confirm('Approve Laporan..?')"><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> Approve</a>
                                                                                                    <?php 
                                                                                                } ?>
                                                                                                <?php 
                                                                                            } ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="text-align: left;">Nama</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $create_by; ?></td>
                                                                                        <td style="text-align: left;">Nama</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $app1_by; ?></td>
                                                                                        <td style="text-align: left;">Nama</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $app2_by; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="text-align: left;">Jabatan</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $create_jabatan; ?></td>
                                                                                        <td style="text-align: left;">Jabatan</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $app1_jabatan; ?></td>
                                                                                        <td style="text-align: left;">Jabatan</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $app2_jabatan; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="text-align: left;">Tanggal</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $create_date; ?></td>
                                                                                        <td style="text-align: left;">Tanggal</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $app1_date; ?></td>
                                                                                        <td style="text-align: left;">Tanggal</td>
                                                                                        <td>:</td>
                                                                                        <td style="text-align: left;"><?php echo $app2_date; ?></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-1"></div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                } elseif ($post_nama_laporan == 'Laporan Pendapatan Laundry (Management)') { ?>
                                    <div class="row">
                                        <div class="col-md-12 panel">
                                            <div class="col-md-12 panel-heading bg-info">
                                                <div class="col-md-2" style="text-align: center;">
                                                    <img src="<?php echo base_url('./assets/layouts/layout3/img/logopt.png'); ?>" width="110" height="100">
                                                </div>
                                                <div class="col-md-8" style="text-align: center;">
                                                    <h2>PT PULAU SAMBU</h2>
                                                    <h4>LAPORAN PENDAPATAN LAUNDRY <?= $vpost_pos_ldy ?> <?php echo 'PERIODE TAHUN ' . $post_thn_laporan; ?></h4>
                                                </div>
                                                <div class="col-md-2" style="text-align: left;">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label text-left">Dokumen</label>
                                                        <div class="col-sm-1 text-center">:</div>
                                                        <div class="col-sm-4">
                                                            <p><?php echo 'RLPL/HOS/' . substr($post_thn_laporan, -2, 2); ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label text-left">Periode</label>
                                                        <div class="col-sm-1 text-center">:</div>
                                                        <div class="col-sm-4">
                                                            <p><?php echo $post_thn_laporan; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 panel-body bg-info" style="padding-bottom:30px;">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4></h4>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="panel-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <span class="pull-left"></span>
                                                                            <span class="pull-right">
                                                                                <?php if (isset($post_nama_laporan)) { ?>
                                                                                    <a href="<?php echo base_url('laundry_excel_rekap3/create_excel/Rekap3/' . $url_tipe_laporan . '/' . $url_bln_laporan . '/' . $url_thn_laporan . '/' . $url_tanggal_awal . '/' . $url_tanggal_akhir . '/' . $url_periode_laporan . '/' . $post_pos_ldy) ?>" class="btn btn-success btn-circle">Export Excel</a>
                                                                                    <?php 
                                                                                } ?>
                                                                            </span>
                                                                        </div>
                                                                        <br><br><br>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="table-responsive">
                                                                                <table class="table table-striped table-bordered">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th class="bg-info" style="text-align: center;" rowspan="3" colspan="1">No</th>
                                                                                            <th class="bg-info" style="text-align: center;" rowspan="2" colspan="1">Jenis<br>Pembayaran</th>
                                                                                            <th class="bg-info" style="text-align: center;" rowspan="1" colspan="36">Tahun</th>
                                                                                            <th class="bg-info" style="text-align: center;" rowspan="2" colspan="2">Total</th>
                                                                                            <?php $v_nama_bln = array(
                                                                                                '01' => 'JANUARI',
                                                                                                '02' => 'FEBRUARI',
                                                                                                '03' => 'MARET',
                                                                                                '04' => 'APRIL',
                                                                                                '05' => 'MEI',
                                                                                                '06' => 'JUNI',
                                                                                                '07' => 'JULI',
                                                                                                '08' => 'AGUSTUS',
                                                                                                '09' => 'SEPTEMBER',
                                                                                                '10' => 'OKTOBER',
                                                                                                '11' => 'NOVEMBER',
                                                                                                '12' => 'DESEMBER',
                                                                                            );

                                                                                            $all_periode_total_cash              = 0;
                                                                                            $all_periode_total_potong_gaji       = 0;
                                                                                            $all_periode_total_lainnya           = 0;
                                                                                            $all_periode_total_berat_cash        = 0;
                                                                                            $all_periode_total_berat_potong_gaji = 0;
                                                                                            $all_periode_total_berat_lainnya     = 0;
                                                                                            $all_periode_periode                 = [];

                                                                                            if ($detail_laporan_allperiode == TRUE) {
                                                                                                foreach ($detail_laporan_allperiode as $detail_laporan_allperiode_row) {
                                                                                                    $all_periode_periode[]               = $detail_laporan_allperiode_row->periode;

                                                                                                    $all_periode_total_cash              += $detail_laporan_allperiode_row->cash;
                                                                                                    $all_periode_total_potong_gaji       += $detail_laporan_allperiode_row->potong_gaji;
                                                                                                    $all_periode_total_lainnya           += $detail_laporan_allperiode_row->lainnya;
                                                                                                    $all_periode_total_berat_cash        += $detail_laporan_allperiode_row->berat_cash;
                                                                                                    $all_periode_total_berat_potong_gaji += $detail_laporan_allperiode_row->berat_potong_gaji;
                                                                                                    $all_periode_total_berat_lainnya     += $detail_laporan_allperiode_row->berat_lainnya;
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <?php $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                                                                            $jlh_bln = count($bulan);
                                                                                            for ($c = 0; $c < $jlh_bln; $c += 1) { ?>
                                                                                                <th class="bg-info" style="text-align: center;" colspan="3"><?php echo $bulan[$c]; ?></th>
                                                                                                <?php 
                                                                                            } ?>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th class="bg-info" style="text-align: center;">Satuan</th>
                                                                                            <?php for ($c = 0; $c < $jlh_bln; $c += 1) { ?>
                                                                                                <th class="bg-info" style="text-align: center;">KG</th>
                                                                                                <th class="bg-info" style="text-align: center;">RUPIAH</th>
                                                                                                <th class="bg-info" style="text-align: center;">% Efektifitas<br />Mesin</th>
                                                                                                <?php 
                                                                                            } ?>
                                                                                            <th class="bg-info" style="text-align: center;">KG</th>
                                                                                            <th class="bg-info" style="text-align: center;">RUPIAH</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php //var_dump($detail_laporan) ?>
                                                                                        <?php if ($detail_laporan == TRUE) {
                                                                                            $no                         = 0;
                                                                                            $total_cash                 = 0;
                                                                                            $total_potong_gaji          = 0;
                                                                                            $total_lainnya              = 0;
                                                                                            $total_berat_cash           = 0;
                                                                                            $total_berat_potong_gaji    = 0;
                                                                                            $total_berat_lainnya        = 0;
                                                                                            $jml_mth                    = 0;

                                                                                            foreach ($detail_laporan as $detail_laporan_row) {
                                                                                                $no++;
                                                                                                if (is_numeric($detail_laporan_row->cash)) {
                                                                                                    $total_cash += $detail_laporan_row->cash;
                                                                                                    $hrg_cash = $detail_laporan_row->cash;
                                                                                                } else {
                                                                                                    $hrg_cash = 0;
                                                                                                }
                                                                                                if (is_numeric($detail_laporan_row->potong_gaji)) {
                                                                                                    $total_potong_gaji += $detail_laporan_row->potong_gaji;
                                                                                                    $hrg_potong_gaji = $detail_laporan_row->potong_gaji;
                                                                                                } else {
                                                                                                    $hrg_potong_gaji = 0;
                                                                                                }
                                                                                                if (is_numeric($detail_laporan_row->lainnya)) {
                                                                                                    $total_lainnya += $detail_laporan_row->lainnya;
                                                                                                    $hrg_lainnya = $detail_laporan_row->lainnya;
                                                                                                } else {
                                                                                                    $hrg_lainnya = 0;
                                                                                                }
                                                                                                if (is_numeric($detail_laporan_row->berat_cash)) {
                                                                                                    $total_berat_cash += $detail_laporan_row->berat_cash;
                                                                                                    $brt_cash = $detail_laporan_row->berat_cash;
                                                                                                    $efektifitas_mesin_cash = number_format((($detail_laporan_row->berat_cash / 3432) * 100), 2);
                                                                                                } else {
                                                                                                    $brt_cash = 0;
                                                                                                    $efektifitas_mesin_cash = 0;
                                                                                                }
                                                                                                if (is_numeric($detail_laporan_row->berat_potong_gaji)) {
                                                                                                    $total_berat_potong_gaji += $detail_laporan_row->berat_potong_gaji;
                                                                                                    $brt_potong_gaji = $detail_laporan_row->berat_potong_gaji;
                                                                                                    $efektifitas_mesin_potong_gaji = number_format((($detail_laporan_row->berat_potong_gaji / 3432) * 100), 2);
                                                                                                } else {
                                                                                                    $brt_potong_gaji = 0;
                                                                                                    $efektifitas_mesin_potong_gaji = 0;
                                                                                                }
                                                                                                if (is_numeric($detail_laporan_row->berat_lainnya)) {
                                                                                                    $total_berat_lainnya += $detail_laporan_row->berat_lainnya;
                                                                                                    $brt_lainnya = $detail_laporan_row->berat_lainnya;
                                                                                                    $efektifitas_mesin_lainnya = number_format((($detail_laporan_row->berat_lainnya / 3432) * 100), 2);
                                                                                                } else {
                                                                                                    $brt_lainnya = 0;
                                                                                                    $efektifitas_mesin_lainnya = 0;
                                                                                                }

                                                                                                $dtl_mth[]                  = $detail_laporan_row->mth;
                                                                                                $dtl_monthname[]            = $detail_laporan_row->monthname;
                                                                                                $dtl_periode[]              = $detail_laporan_row->periode;
                                                                                                $dtl_potong_gaji[]          = $detail_laporan_row->potong_gaji;
                                                                                                $dtl_cash[]                 = $detail_laporan_row->cash;
                                                                                                $dtl_lainnya[]              = $detail_laporan_row->lainnya;
                                                                                                $dtl_berat_potong_gaji[]    = $detail_laporan_row->berat_potong_gaji;
                                                                                                $dtl_berat_cash[]           = $detail_laporan_row->berat_cash;
                                                                                                $dtl_berat_lainnya[]        = $detail_laporan_row->berat_lainnya;
                                                                                                $dtl_em_potong_gaji[]       = $efektifitas_mesin_potong_gaji;
                                                                                                $dtl_em_cash[]              = $efektifitas_mesin_cash;
                                                                                                $dtl_em_lainnya[]           = $efektifitas_mesin_lainnya;

                                                                                                $dtl_jml_harga[]            = $hrg_cash + $hrg_potong_gaji + $hrg_lainnya;
                                                                                                $dtl_jml_berat[]            = $brt_cash + $brt_potong_gaji + $brt_lainnya;
                                                                                                $dtl_jml_em[]               = number_format(($efektifitas_mesin_cash + $efektifitas_mesin_potong_gaji + $efektifitas_mesin_lainnya), 2);

                                                                                                $dtl_rekap_jns[]            = $detail_laporan_row->rekap_jns;
                                                                                                $dtl_rekap_status_pekerja[] = $detail_laporan_row->rekap_status_pekerja;
                                                                                                $dtl_rekap_tanggal_awal[]   = $detail_laporan_row->rekap_tanggal_awal;
                                                                                                $dtl_rekap_tanggal_akhir[]  = $detail_laporan_row->rekap_tanggal_akhir;
                                                                                                $dtl_rekap_bulan[]          = $detail_laporan_row->rekap_bulan;
                                                                                                $dtl_rekap_tahun[]          = $detail_laporan_row->rekap_tahun;
                                                                                                $dtl_create_by[]            = $detail_laporan_row->create_by;
                                                                                                $dtl_create_date[]          = $detail_laporan_row->create_date;
                                                                                                $dtl_create_comp[]          = $detail_laporan_row->create_comp;
                                                                                                $dtl_create_status[]        = $detail_laporan_row->create_status;
                                                                                                $dtl_app1_by[]              = $detail_laporan_row->app1_by;

                                                                                                if (trim($detail_laporan_row->app1_date) != '') {
                                                                                                    $app1_date[] =  date("d-m-Y H:i:s", strtotime($detail_laporan_row->app1_date));
                                                                                                } else {
                                                                                                    $app1_date[] =  $detail_laporan_row->app1_date;
                                                                                                }
                                                                                                $dtl_app1_comp[]            = $detail_laporan_row->app1_comp;
                                                                                                $dtl_app1_status[]          = $detail_laporan_row->app1_status;
                                                                                                $dtl_app2_by[]              = $detail_laporan_row->app2_by;
                                                                                                
                                                                                                if (trim($detail_laporan_row->app2_date) != '') {
                                                                                                    $app2_date[] =  date("d-m-Y H:i:s", strtotime($detail_laporan_row->app2_date));
                                                                                                } else {
                                                                                                    $app2_date[] =  $detail_laporan_row->app2_date;
                                                                                                }
                                                                                                $dtl_app2_comp[]            = $detail_laporan_row->app2_comp;
                                                                                                $dtl_app2_status[]          = $detail_laporan_row->app2_status;
                                                                                                $dtl_app3_by[]              = $detail_laporan_row->app3_by;
                                                                                                if (trim($detail_laporan_row->app3_date) != '') {
                                                                                                    $app3_date[] =  date("d-m-Y H:i:s", strtotime($detail_laporan_row->app3_date));
                                                                                                } else {
                                                                                                    $app3_date[] =  $detail_laporan_row->app3_date;
                                                                                                }
                                                                                                $dtl_app3_comp[]            = $detail_laporan_row->app3_comp;
                                                                                                $dtl_app3_status[]          = $detail_laporan_row->app3_status;
                                                                                                $dtl_app4_by[]              = $detail_laporan_row->app4_by;
                                                                                                if (trim($detail_laporan_row->app4_date) != '') {
                                                                                                    $app4_date[] =  date("d-m-Y H:i:s", strtotime($detail_laporan_row->app4_date));
                                                                                                } else {
                                                                                                    $app4_date[] =  $detail_laporan_row->app4_date;
                                                                                                }
                                                                                                $dtl_app4_comp[]           = $detail_laporan_row->app4_comp;
                                                                                                $dtl_app4_status[]         = $detail_laporan_row->app4_status;
                                                                                                $dtl_rekap_id[]            = $detail_laporan_row->rekap_id;
                                                                                                $dtl_app1_jabatan[]        = $detail_laporan_row->app1_jabatan;
                                                                                                $dtl_app2_jabatan[]        = $detail_laporan_row->app2_jabatan;
                                                                                                $dtl_app3_jabatan[]        = $detail_laporan_row->app3_jabatan;
                                                                                                $dtl_app4_jabatan[]        = $detail_laporan_row->app4_jabatan;

                                                                                                $dtl_app1_personalid[]     = $detail_laporan_row->app1_personalid;
                                                                                                $dtl_app2_personalid[]     = $detail_laporan_row->app2_personalid;
                                                                                                $dtl_app3_personalid[]     = $detail_laporan_row->app3_personalid;
                                                                                                $dtl_app4_personalid[]     = $detail_laporan_row->app4_personalid;

                                                                                                $dtl_app1_personalstatus[] = $detail_laporan_row->app1_personalstatus;
                                                                                                $dtl_app2_personalstatus[] = $detail_laporan_row->app2_personalstatus;
                                                                                                $dtl_app3_personalstatus[] = $detail_laporan_row->app3_personalstatus;
                                                                                                $dtl_app4_personalstatus[] = $detail_laporan_row->app4_personalstatus;

                                                                                                if (trim($detail_laporan_row->periode) != '') {
                                                                                                    $vdtl_periode = $detail_laporan_row->periode;
                                                                                                }
                                                                                            }

                                                                                            $jml_mth = count($dtl_mth); ?>
                                                                                            <tr>
                                                                                                <td>1</td>
                                                                                                <td>Cash</td>
                                                                                                <?php for ($n = 0; $n < $jml_mth; $n++) { ?>
                                                                                                    <td style="text-align: right;"><?php if ($dtl_berat_cash[$n] > 0) { echo number_format(($dtl_berat_cash[$n]), 2, ',', '.'); } ?></td>
                                                                                                    <td style="text-align: right;"><?php if ($dtl_cash[$n] > 0) { echo number_format(($dtl_cash[$n]), 0, ',', '.'); } ?></td>
                                                                                                    <td style="text-align: right;"><?php if ($dtl_em_cash[$n] > 0) { echo number_format(($dtl_em_cash[$n]), 2, ',', '.'); } ?></td>
                                                                                                    <?php 
                                                                                                } ?>
                                                                                                <td style="text-align: right;"><?php if ($total_berat_cash > 0) { echo number_format(($total_berat_cash), 2, ',', '.'); } ?></td>
                                                                                                <td style="text-align: right;"><?php if ($total_cash > 0) { echo number_format(($total_cash), 0, ',', '.'); } ?></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>2</td>
                                                                                                <td>Potong Gaji</td>
                                                                                                <?php for ($n = 0; $n < $jml_mth; $n++) { ?>
                                                                                                    <td style="text-align: right;"><?php if ($dtl_berat_potong_gaji[$n] > 0) { echo number_format(($dtl_berat_potong_gaji[$n]), 2, ',', '.'); } ?></td>
                                                                                                    <td style="text-align: right;"><?php if ($dtl_potong_gaji[$n] > 0) { echo number_format(($dtl_potong_gaji[$n]), 0, ',', '.'); } ?></td>
                                                                                                    <td style="text-align: right;"><?php if ($dtl_em_potong_gaji[$n] > 0) { echo number_format(($dtl_em_potong_gaji[$n]), 2, ',', '.'); } ?></td>
                                                                                                    <?php 
                                                                                                } ?>
                                                                                                <td style="text-align: right;"><?php if ($total_berat_potong_gaji > 0) { echo number_format(($total_berat_potong_gaji), 2, ',', '.'); } ?></td>
                                                                                                <td style="text-align: right;"><?php if ($total_potong_gaji > 0) { echo number_format(($total_potong_gaji), 0, ',', '.'); } ?></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>3</td>
                                                                                                <td>Lainnya</td>
                                                                                                <?php for ($n = 0; $n < $jml_mth; $n++) { ?>
                                                                                                    <td style="text-align: right;"><?php if ($dtl_berat_lainnya[$n] > 0) { echo number_format(($dtl_berat_lainnya[$n]), 2, ',', '.'); } ?></td>
                                                                                                    <td style="text-align: right;"><?php if ($dtl_lainnya[$n] > 0) { echo number_format(($dtl_lainnya[$n]), 0, ',', '.'); } ?></td>
                                                                                                    <td style="text-align: right;"><?php if ($dtl_em_lainnya[$n] > 0) { echo number_format(($dtl_em_lainnya[$n]), 2, ',', '.'); } ?></td>
                                                                                                    <?php 
                                                                                                } ?>
                                                                                                <td style="text-align: right;"><?php if ($total_berat_lainnya > 0) { echo number_format(($total_berat_lainnya), 2, ',', '.'); } ?></td>
                                                                                                <td style="text-align: right;"><?php if ($total_lainnya > 0) { echo number_format(($total_lainnya), 0, ',', '.'); } ?></td>
                                                                                            </tr>
                                                                                            <?php 
                                                                                        } else { ?>
                                                                                            <tr>
                                                                                                <td>1</td>
                                                                                                <td>Cash</td>
                                                                                                <?php for ($n = 0; $n < $jlh_bln; $n += 1) { ?>
                                                                                                    <td style="text-align: center;"></td>
                                                                                                    <td style="text-align: center;"></td>
                                                                                                    <td style="text-align: center;"></td>
                                                                                                    <?php 
                                                                                                } ?>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>2</td>
                                                                                                <td>Potong Gaji</td>
                                                                                                <?php for ($n = 0; $n < $jlh_bln; $n += 1) { ?>
                                                                                                    <td style="text-align: center;"></td>
                                                                                                    <td style="text-align: center;"></td>
                                                                                                    <td style="text-align: center;"></td>
                                                                                                    <?php 
                                                                                                } ?>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>3</td>
                                                                                                <td>Lainnya</td>
                                                                                                <?php for ($n = 0; $n < $jlh_bln; $n += 1) { ?>
                                                                                                    <td style="text-align: center;"></td>
                                                                                                    <td style="text-align: center;"></td>
                                                                                                    <td style="text-align: center;"></td>
                                                                                                    <?php 
                                                                                                } ?>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                            </tr>
                                                                                            <?php
                                                                                        } ?>
                                                                                    </tbody>
                                                                                    <tfoot class="bg-default">
                                                                                        <tr>
                                                                                            <td class="bg-info" colspan="2" style="text-align: center;"><b>TOTAL</b></td>
                                                                                            <?php for ($n = 0; $n < $jlh_bln; $n += 1) { ?>
                                                                                                <td class="bg-info" style="text-align: right;">
                                                                                                    <b>
                                                                                                        <?php if ($detail_laporan == TRUE) { 
                                                                                                            if ($dtl_jml_berat[$n] > 0) { 
                                                                                                                echo number_format(($dtl_jml_berat[$n]), 2, ',', '.'); 
                                                                                                            }
                                                                                                        } ?>
                                                                                                    </b>
                                                                                                </td>
                                                                                                <td class="bg-info" style="text-align: right;">
                                                                                                    <b>
                                                                                                        <?php if ($detail_laporan == TRUE) {
                                                                                                            if ($dtl_jml_berat[$n] > 0) {
                                                                                                                echo number_format(($dtl_jml_harga[$n]), 0, ',', '.');
                                                                                                            }
                                                                                                        } ?>
                                                                                                    </b>
                                                                                                </td>
                                                                                                <td class="bg-info" style="text-align: right;">
                                                                                                    <b>
                                                                                                        <?php if ($detail_laporan == TRUE) {
                                                                                                            if ($dtl_jml_em[$n] > 0) {
                                                                                                                echo number_format(($dtl_jml_em[$n]), 2, ',', '.');
                                                                                                            }
                                                                                                        } ?>
                                                                                                    </b>
                                                                                                </td>
                                                                                                <?php 
                                                                                            } ?>
                                                                                            <td class="bg-info">
                                                                                                <?php if ($detail_laporan == TRUE) {
                                                                                                    if (($total_berat_cash + $total_berat_potong_gaji + $total_berat_lainnya) > 0) {
                                                                                                        echo number_format(($total_berat_cash + $total_berat_potong_gaji + $total_berat_lainnya), 2, ',', '.');
                                                                                                    }
                                                                                                } ?>
                                                                                            </td>
                                                                                            <td class="bg-info">
                                                                                                <?php if ($detail_laporan == TRUE) {
                                                                                                    if (($total_cash + $total_potong_gaji + $total_lainnya) > 0) {
                                                                                                        echo number_format(($total_cash + $total_potong_gaji + $total_lainnya), 0, ',', '.');
                                                                                                    }
                                                                                                } ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="bg-info" colspan="2" style="text-align: center;"><b></b></td>
                                                                                            <?php for ($n = 0; $n < $jlh_bln; $n += 1) {
                                                                                                $cek_rekap_tersedia = $this->M_Laundry_Rekap->get_row($post_thn_laporan, $post_pos_ldy);
                                                                                                
                                                                                                if ($cek_rekap_tersedia != TRUE) {
                                                                                                    if ($dtl_jml_berat[$n] > 0) { ?>
                                                                                                        <td class="bg-info" colspan="3" style="text-align: center;">
                                                                                                            <a class="btn btn-block btn-primary" href="<?php echo site_url('Laundry_Rekap/get_data_approve/' . $post_thn_laporan . '/' . $post_pos_ldy . '/' . ($n + 1)); ?>">Komplit</a>
                                                                                                        </td>
                                                                                                        <?php 
                                                                                                    } else { ?>
                                                                                                        <td class="bg-info" colspan="3" style="text-align: right;"></td>
                                                                                                        <?php 
                                                                                                    }
                                                                                                } else {
                                                                                                    foreach ($cek_rekap_tersedia as $row) {
                                                                                                        $rekap_bulan[]    = $row->rekap_bulan;
                                                                                                        $rekap_bulann     = $row->rekap_bulan;
                                                                                                    }

                                                                                                    $dateNow = date('M d, Y');
                                                                                                    // var_dump(date("d", strtotime($dateNow))); die();

                                                                                                    if (count($cek_rekap_tersedia) <= 0) {
                                                                                                        if ($rekap_bulan[$n] == $n + 1) { ?>
                                                                                                            <td class="bg-info" colspan="3" style="text-align: center;">Done</td>
                                                                                                            <?php 
                                                                                                        } else {
                                                                                                            if ($rekap_bulan[$n] == $n + 1) { ?>
                                                                                                                <td class="bg-info" colspan="3" style="text-align: center;">
                                                                                                                    <a class="btn btn-block btn-primary" href="<?php echo site_url('Laundry_Rekap/get_data_approve/' . $post_thn_laporan . '/' . $post_pos_ldy . '/' . ($n + 1)); ?>">Komplit</a>
                                                                                                                </td>
                                                                                                                <?php 
                                                                                                            } else { ?>
                                                                                                                <td class="bg-info" colspan="3" style="text-align: right;"></td>
                                                                                                                <?php 
                                                                                                            }
                                                                                                        }
                                                                                                    } else {
                                                                                                        // print_r(count($cek_rekap_tersedia)); die();
                                                                                                        if ($rekap_bulan[$n] == $n + 1) { ?>
                                                                                                            <td class="bg-info" colspan="3" style="text-align: center;">Done</td>
                                                                                                            <?php 
                                                                                                        } else {
                                                                                                            // tadi nya mau buat pertanggal tutup buku
                                                                                                            if (date("d", strtotime($dateNow)) == '26') {
                                                                                                                if ($dtl_jml_berat[$n] > 0) { ?>
                                                                                                                    <!-- <td class="bg-info" colspan="3" style="text-align: center;">
                                                                                                                        <a class="btn btn-block btn-primary" href="<?php echo site_url('Laundry_Rekap/get_data_approve/' . $post_thn_laporan . '/' . $post_pos_ldy . '/' . ($n + 1)); ?>">Komplit</a>
                                                                                                                    </td> -->
                                                                                                                    <?php 
                                                                                                                }
                                                                                                            } else {
                                                                                                                if ($dtl_jml_berat[$n] <= 0) { ?>
                                                                                                                    <!-- <td class="bg-info" colspan="3" style="text-align: right;"></td> -->
                                                                                                                    <?php
                                                                                                                }
                                                                                                            }
                                                                                                            if ($dtl_jml_berat[$n] > 0) { ?>
                                                                                                                <td class="bg-info" colspan="3" style="text-align: center;">
                                                                                                                    <a class="btn btn-block btn-primary" href="<?php echo site_url('Laundry_Rekap/get_data_approve/' . $post_thn_laporan . '/' . $post_pos_ldy . '/' . ($n + 1)); ?>">Komplit</a>
                                                                                                                </td>
                                                                                                                <?php 
                                                                                                            } else { ?>
                                                                                                                <td class="bg-info" colspan="3" style="text-align: right;"></td>
                                                                                                                <?php 
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                } ?>
                                                                                                <?php 
                                                                                                
                                                                                            } ?>
                                                                                            <td class="bg-info"></td>
                                                                                            <td class="bg-info"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="bg-info" colspan="2" style="text-align: center;"></td>
                                                                                            <?php for ($n = 0; $n < $jlh_bln; $n += 1) { ?>
                                                                                                <td class="bg-info" style="text-align: center; white-space:nowrap;">Dibuat Oleh</td>
                                                                                                <td class="bg-info" style="text-align: center; white-space:nowrap;" colspan="2">Disetujui Oleh</td>
                                                                                                <?php 
                                                                                            } ?>
                                                                                            <td class="bg-info" colspan="2" style="text-align: center;"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td colspan="2" style="text-align: center;"></td>
                                                                                            <?php for ($n = 0; $n < $jlh_bln; $n += 1) {
                                                                                                $url = base_url();
                                                                                                // var_dump($dtl_app2_jabatan[$n]); die();
                                                                                                if ($dtl_app1_personalstatus[$n] == 2) {
                                                                                                    $base_path = $url . 'assets/foto/TTD_TK/' . $dtl_app1_personalid[$n] . '.PNG';export;
                                                                                                } else {
                                                                                                    $base_path = $url . 'assets/foto/TTD_KRY/' . $dtl_app1_personalid[$n] . '_0_0.PNG';
                                                                                                } ?>
                                                                                                    <td style="text-align: center; white-space:nowrap;" colspan="1"><?php if ($dtl_app1_personalstatus[$n] != '' && $dtl_app1_personalstatus[$n] != '') { ?><img src="<?= $base_path ?>" width="80" height="60"><?php } ?></td>
                                                                                                <td style="text-align: center; white-space:nowrap;" colspan="2"><?php if ($dtl_app2_personalstatus[$n] != '' && $dtl_app2_personalstatus[$n] != '') { ?><img src="<?php echo base_url('./assets/approved2.png'); ?>" width="80" height="60"><?php } ?></td>
                                                                                                <?php 
                                                                                            } ?>
                                                                                            <td colspan="2" style="text-align: center;"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td colspan="2" style="text-align: center;">Nama</td>
                                                                                            <?php for ($n = 0; $n < $jlh_bln; $n += 1) { ?>
                                                                                                <td style="text-align: center; white-space:nowrap;" colspan="1"><?php if (isset($dtl_app1_by[$n])) { echo $dtl_app1_by[$n]; } ?></td>
                                                                                                <td style="text-align: center; white-space:nowrap;" colspan="2"><?php if (isset($dtl_app2_by[$n])) { echo 'REYNALD ALEX'; } ?></td>
                                                                                                <?php 
                                                                                            } ?>
                                                                                            <td colspan="2" style="text-align: center;"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td colspan="2" style="text-align: center;">Jabatan</td>
                                                                                            <?php for ($n = 0; $n < $jlh_bln; $n += 1) { ?>
                                                                                                <td style="text-align: center; white-space:nowrap;" colspan="1"><?php if (isset($dtl_app1_jabatan[$n])) { echo $dtl_app1_jabatan[$n]; } ?></td>
                                                                                                <td style="text-align: center; white-space:nowrap;" colspan="2"><?php if (isset($dtl_app2_jabatan[$n])) { echo 'General Manager'; } ?></td>
                                                                                                <?php 
                                                                                            } ?>
                                                                                            <td colspan="2" style="text-align: center;"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td colspan="2" style="text-align: center;">Tanggal</td>
                                                                                            <?php for ($n = 0; $n < $jlh_bln; $n += 1) { ?>
                                                                                                <td style="text-align: center; white-space:nowrap;" colspan="1"><?php if (isset($app1_date[$n])) { echo $app1_date[$n]; } ?></td>
                                                                                                <td style="text-align: center; white-space:nowrap;" colspan="2"><?php if (isset($app2_date[$n])) { echo $app2_date[$n]; } ?></td>
                                                                                                <?php 
                                                                                            } ?>
                                                                                            <td colspan="2" style="text-align: center;"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="bg-info" colspan="2" style="text-align: center;"></td>
                                                                                            <?php for ($n = 0; $n < $jlh_bln; $n += 1) { ?>
                                                                                                <td class="bg-info" style="text-align: center;" colspan="3"></td>
                                                                                                <?php 
                                                                                            } ?>
                                                                                            <td class="bg-info" colspan="2" style="text-align: center;"></td>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br /><br />
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <p>Ket :</p>
                                                                            <table width="100%">
                                                                                <tr>
                                                                                    <td width="25%">Awal mesin produksi</td>
                                                                                    <td width="5%">:</td>
                                                                                    <td width="70%">19 Maret 2020</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Jumlah Mesin</td>
                                                                                    <td>:</td>
                                                                                    <td>2 unit</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Target</td>
                                                                                    <td>:</td>
                                                                                    <td>Per hari 132 kg</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td>Per bulan 3.432 kg</td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="box col-md-12 padding-0" style="padding: 15px; font-size: 12px; border: solid 1px;">
                                                                                <table width="100%" class="table">
                                                                                    <tr class="bg-info">
                                                                                        <td colspan="4" width="100%" style="text-align: center;">
                                                                                            <b>TOTAL 
                                                                                                <?php if (count($all_periode_periode) > 0) {
                                                                                                    echo $v_nama_bln[substr(reset($all_periode_periode), 5, 6)] . '-' . substr(reset($all_periode_periode), 0, 4);
                                                                                                } ?> 
                                                                                                S/D 
                                                                                                <?php if (count($all_periode_periode) > 0) {
                                                                                                    echo $v_nama_bln[substr(end($all_periode_periode), 5, 6)] . '-' . substr(end($all_periode_periode), 0, 4);
                                                                                                } ?>
                                                                                            </b>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr class="bg-info">
                                                                                        <td width="25%" style="text-align: center;"></td>
                                                                                        <td width="5%" style="text-align: center;"></td>
                                                                                        <td width="35%" style="text-align: center;"><b>KG</b></td>
                                                                                        <td width="35%" style="text-align: center;"><b>RUPIAH</b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td width="25%">1. Cash</td>
                                                                                        <td width="5%">:</td>
                                                                                        <td width="35%" style="text-align: right;">
                                                                                            <?php if ($all_periode_total_berat_cash > 0) {
                                                                                                echo number_format(($all_periode_total_berat_cash), 2, ',', '.');
                                                                                            } ?>
                                                                                        </td>
                                                                                        <td width="35%" style="text-align: right;">
                                                                                            <?php if ($all_periode_total_cash > 0) {
                                                                                                echo number_format(($all_periode_total_cash), 0, ',', '.');
                                                                                            } ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td width="25%">2. Potong Gaji</td>
                                                                                        <td width="5%">:</td>
                                                                                        <td width="35%" style="text-align: right;">
                                                                                            <?php if ($all_periode_total_berat_potong_gaji > 0) {
                                                                                                echo number_format(($all_periode_total_berat_potong_gaji), 2, ',', '.');
                                                                                            } ?>
                                                                                        </td>
                                                                                        <td width="35%" style="text-align: right;">
                                                                                            <?php if ($all_periode_total_potong_gaji > 0) {
                                                                                                echo number_format(($all_periode_total_potong_gaji), 0, ',', '.');
                                                                                            } ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td width="25%">3. Lainnya</td>
                                                                                        <td width="5%">:</td>
                                                                                        <td width="35%" style="text-align: right;">
                                                                                            <?php if ($all_periode_total_berat_lainnya > 0) {
                                                                                                echo number_format(($all_periode_total_berat_lainnya), 2, ',', '.');
                                                                                            } ?>
                                                                                        </td>
                                                                                        <td width="35%" style="text-align: right;">
                                                                                            <?php if ($all_periode_total_lainnya > 0) {
                                                                                                echo number_format(($all_periode_total_lainnya), 0, ',', '.');
                                                                                            } ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr class="bg-info">
                                                                                        <td width="25%" style="text-align: center;"><b>TOTAL</b></td>
                                                                                        <td width="5%">:</td>
                                                                                        <td width="35%" style="text-align: right;">
                                                                                            <b>
                                                                                                <?php if ($detail_laporan_allperiode == TRUE) {
                                                                                                    if (($all_periode_total_berat_cash + $all_periode_total_berat_potong_gaji + $all_periode_total_berat_lainnya) > 0) {
                                                                                                        echo number_format(($all_periode_total_berat_cash + $all_periode_total_berat_potong_gaji + $all_periode_total_berat_lainnya), 2, ',', '.');
                                                                                                    }
                                                                                                } ?>
                                                                                            </b>
                                                                                        </td>
                                                                                        <td width="35%" style="text-align: right;">
                                                                                            <b>
                                                                                                <?php if ($detail_laporan_allperiode == TRUE) {
                                                                                                    if (($all_periode_total_cash + $all_periode_total_potong_gaji + $all_periode_total_lainnya) > 0) {
                                                                                                        echo number_format(($all_periode_total_cash + $all_periode_total_potong_gaji + $all_periode_total_lainnya), 0, ',', '.');
                                                                                                    }
                                                                                                } ?>
                                                                                            </b>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2"></div>
                                                                        <div class="col-md-2">
                                                                            <div class="box col-md-12 padding-0" style="padding: 15px; font-size: 12px; border: solid 1px;">
                                                                                <p><b>% Efektivitas Mesin</b><br>Jumlah kg perbulan dibagi 3432*100%</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                } else {
                                    echo 'Jenis Rekap Tidak Tersedia!';
                                }
                            } else {
                                echo 'No Report Available!';
                            } ?>

                        </div>

                    </div>
                </div>
            </div>

            <div class="row laporan_dtl" id="laporan_dtl">
            </div>

        </div>
    </div>
</div>