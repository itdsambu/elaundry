<script src="<?php echo base_url(); ?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<?php
$year   = $this->uri->segment(3);
$month  = $this->uri->segment(4);

if ($month == '01') {
    $lessOneMonth = '12';
    $lessOneYear  = $year -1;
} else if ($month == '02') {
    $lessOneMonth = $month -1;
    $lessOneYear  = $year;
} else {
    $lessOneMonth = $month -1;
    $lessOneYear  = $year;
}

if ($lessOneMonth >= 9) {
    $result = $lessOneMonth;
} else {
    $result = "0$lessOneMonth";
    }


if ((int)$month == 1) {
    $result           = 'Januari';
    $startDate        = "26-$month-$year";
    $completionDate   = "25-02-$year";
} elseif ((int)$month == 2) {
    $result = 'Februari';
} elseif ((int)$month == 3) {
    $result = 'Maret';
} elseif ((int)$month == 4) {
    $result = 'April';
} elseif ((int)$month == 5) {
    $result = 'Mei';
} elseif ((int)$month == 6) {
    $result = 'Juni';
} elseif ((int)$month == 7) {
    $result = 'Juli';
} elseif ((int)$month == 8) {
    $result = 'Agustus';
} elseif ((int)$month == 9) {
    $result = 'September';
} elseif ((int)$month == 10) {
    $result = 'Oktober';
} elseif ((int)$month == 11) {
    $result = 'November';
} elseif ((int)$month == 12) {
    $result = 'Desember';
} else {
    $result = 'Bulan Tidak Valid';
}

?>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light">
                <div class="portlet-body">
                    <div id="html_report">
                        <!-- Periode 1 -->
                        <?php if ($periode1 && (isset($periode1))) { ?>
                            <div class="row">
                                <div class="col-md-12 panel">
                                    <div class="col-md-12 panel-heading bg-info">
                                        <div class="col-md-2" style="text-align: center;">
                                            <img src="<?php echo base_url('assets/layouts/layout3/img/logopt.png'); ?>" width="140" height="120">
                                        </div>
                                        <div class="col-md-6" style="text-align: center;">
                                            <h2 class="bold">PT PULAU SAMBU</h2>
                                            <h3 class="caption-subject bold uppercase"><?= $title; ?></h3>
                                            <h4><b>PERIODE TANGGAL : <?= $periodeTgl1; ?></b></h4>
                                        </div>
                                        <div class="col-md-4" style="text-align: left;">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label text-left">Dokumen</label>
                                                <div class="col-sm-1 text-center">:</div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control primary" id="txt_doc" name="txt_doc" readonly="" value="<?php echo 'RLPL/GAF/' . $year . '/' . $month; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label text-left">Periode</label>
                                                <div class="col-sm-1 text-center">:</div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control primary" id="txt_periode" name="txt_periode" readonly="" value="<?php echo $result . ' ' . $year; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 panel-body bg-info" style="padding-bottom:30px;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <br>
                                                        <?php $status = $this->uri->segment(5);
                                                            $namaStatus = $status == '1' ? 'Karyawan' : 'Harian';
                                                        ?>
                                                    
                                                        <table style="width:80%;font-weight: bold;" class="table">
                                                            <tr>
                                                                <td width="5%" style="border-top: none;">Kategori</td>
                                                                <td style="border-top: none;">:</td>
                                                                <td style="border-top: none;" width="100%">Potong Gaji (<?= $namaStatus; ?>)</td>
                                                            </tr>
                                                        </table>

                                                        
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <span class="pull-left"></span>
                                                                <span class="pull-right">
                                                                    <?php if (count($periode1) > 0) { ?>
                                                                        <a href="<?php echo base_url("C_export_excel_laporan_potongan_laundry_harian/exportxls/" . $this->uri->segment(3) . "/" . $this->uri->segment(4) . "/" . $this->uri->segment(5)); ?>" class="btn btn-success btn-circle">Export Excel</a>
                                                                        <?php
                                                                    } ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <br>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped table-bordered tblRekapPernama">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="text-align: center; vertical-align: middle;">No</th>
                                                                                <th style="text-align: center; vertical-align: middle;">Nama</th>
                                                                                <th style="text-align: center; vertical-align: middle;">NIK</th>
                                                                                <th style="text-align: center; vertical-align: middle;">Dept</th>
                                                                                <th style="text-align: center; vertical-align: middle;">CV/KYW</th>
                                                                                <th style="text-align: center; vertical-align: middle;">Jumlah (Rupiah)</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php $no = 0;
                                                                            foreach ($periode1 as $row) {
                                                                                $no++; ?>
                                                                                <tr>
                                                                                    <td style="text-align: center;"><?= $no; ?>.</td>
                                                                                    <td style="text-align: left;"><?= $row->Nama; ?></td>
                                                                                    <td style="text-align: center;"><?= $row->Nik; ?></td>
                                                                                    <td style="text-align: center;"><?= $row->DeptAbbr; ?></td>
                                                                                    <td style="text-align: center;"><?= $row->Perusahaan; ?></td>
                                                                                    <td style="text-align: center;"><?= rupiah($row->TotalTagihan) ?></td>
                                                                                </tr>
                                                                                <?php
                                                                            } ?>
                                                                        </tbody>
                                                                        <tfoot class="bg-default">
                                                                            <?php
                                                                            foreach ($periode1 as $val) {
                                                                                $tagihan[] = $val->TotalTagihan;
                                                                            }
                                                                            $totalAll = 0;
                                                                            foreach ($tagihan as $nilai) {
                                                                                $totalAll += $nilai;
                                                                            }
                                                                            ?>
                                                                            
                                                                            <tr>
                                                                                <td colspan="5" style="text-align: left;"><b>TOTAL</b></td>
                                                                                <td style="text-align: center;"><?= rupiah($totalAll); ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="5" style="text-align: left;"><b>TERBILANG</b></td>
                                                                                <td style="text-align: center;"><?= terbilang($totalAll); ?></td>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
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
                        } ?>
                        <!-- Periode 2 -->
                        <?php if ($periode2 && isset($periode2)) { ?>
                            <div class="row">
                                <div class="col-md-12 panel">
                                    <div class="col-md-12 panel-heading bg-info">
                                        <div class="col-md-2" style="text-align: center;">
                                            <img src="<?php echo base_url('assets/layouts/layout3/img/logopt.png'); ?>" width="140" height="120">
                                        </div>
                                        <div class="col-md-6" style="text-align: center;">
                                            <h2 class="bold">PT PULAU SAMBU</h2>
                                            <h3 class="caption-subject bold uppercase"><?= $title; ?></h3>
                                            <h4><b>PERIODE TANGGAL : <?= $periodeTgl2; ?></b></h4>
                                        </div>
                                        <div class="col-md-4" style="text-align: left;">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label text-left">Dokumen</label>
                                                <div class="col-sm-1 text-center">:</div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control primary" id="txt_doc" name="txt_doc" readonly="" value="<?php echo 'RLPL/GAF/' . $year . '/' . $month; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label text-left">Periode</label>
                                                <div class="col-sm-1 text-center">:</div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control primary" id="txt_periode" name="txt_periode" readonly="" value="<?php echo $result . ' ' . $year; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 panel-body bg-info" style="padding-bottom:30px;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <br>
                                                        <?php $status = $this->uri->segment(5);
                                                            $namaStatus = $status == '1' ? 'Karyawan' : 'Harian';
                                                        ?>
                                                                    
                                                        <table style="width:80%;font-weight: bold;" class="table">
                                                            <tr>
                                                                <td width="5%" style="border-top: none;">Kategori</td>
                                                                <td style="border-top: none;">:</td>
                                                                <td style="border-top: none;" width="100%">Potong Gaji (<?= $namaStatus; ?>)</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped table-bordered tblRekapPernama">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="text-align: center; vertical-align: middle;">No</th>
                                                                                <th style="text-align: center; vertical-align: middle;">Nama</th>
                                                                                <th style="text-align: center; vertical-align: middle;">NIK</th>
                                                                                <th style="text-align: center; vertical-align: middle;">Dept</th>
                                                                                <th style="text-align: center; vertical-align: middle;">CV/KYW</th>
                                                                                <th style="text-align: center; vertical-align: middle;">Jumlah (Rupiah)</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php $no = 0;
                                                                            foreach ($periode2 as $row2) {
                                                                                $no++; ?>
                                                                                <tr>
                                                                                    <td style="text-align: center;"><?= $no; ?>.</td>
                                                                                    <td style="text-align: left;"><?= $row2->Nama; ?></td>
                                                                                    <td style="text-align: center;"><?= $row2->Nik; ?></td>
                                                                                    <td style="text-align: center;"><?= $row2->DeptAbbr; ?></td>
                                                                                    <td style="text-align: center;"><?= $row2->Perusahaan; ?></td>
                                                                                    <td style="text-align: center;"><?= rupiah($row2->TotalTagihan) ?></td>
                                                                                </tr>
                                                                                <?php
                                                                            } ?>
                                                                        </tbody>
                                                                        <tfoot class="bg-default">
                                                                            <?php
                                                                            foreach ($periode2 as $val2) {
                                                                                $tagihan2[] = $val2->TotalTagihan;
                                                                            }
                                                                            $totalAll2 = 0;
                                                                            if (isset($tagihan2)) {
                                                                                foreach ($tagihan2 as $nilai2) {
                                                                                    $totalAll2 += $nilai2;
                                                                                }
                                                                            }
                                                                            ?>
                                                                            
                                                                            <tr>
                                                                                <td colspan="5" style="text-align: left;"><b>TOTAL</b></td>
                                                                                <td style="text-align: center;"><?= rupiah($totalAll2); ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="5" style="text-align: left;"><b>TERBILANG</b></td>
                                                                                <td style="text-align: center;"><?= terbilang($totalAll2); ?></td>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
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
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.tblRekapPernama').dataTable({
            "order": [0, 'asc'],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "pageLength": 10
        });
        
    });
</script>