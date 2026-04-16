<script src="<?php echo base_url(); ?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<?php if ($this->session->userdata('group_user') == 1 || $this->session->userdata('group_user') == 53 || $this->session->userdata('group_user') == 2 || $this->session->userdata('group_user') == 7) { ?>
    <!-- <div class="page-content"> -->
    <!-- <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-danger"> -->
    <span class="blink_me">
        <?php
        // $hitung = count($getDetailTamu);
        // if ($hitung > 0) {
        //     echo "<strong>Informasi !</strong> Tamu  <br>";
        //     for ($i = 0; $i < $hitung; $i++) {
        //         echo "Nama : " . $getDetailTamu[$i]->NamaLengkap . " akan CheckOut Pada Tanggal " . date('d-M-Y', strtotime($getDetailTamu[0]->Rencana_checkout)) . " Jam " . date('H:i:s', strtotime($getDetailTamu[$i]->Rencana_JamCheckOut)) . "<br>";
        //     }
        // } else {
        //     echo "";
        // }
        ?>
    </span>
    </div>
    </div>
    <script type="text/javascript">
        function blinker() {
            $('.blink_me').fadeOut(1000);
            $('.blink_me').fadeIn(1000);
        }
        setInterval(blinker, 1000);
    </script>
    </div>
    <!-- <div class="row">
            <div class="col-lg-12">
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        <div class="pricing-content-1">
                            <div class="row"> -->
    <!-- <div class="col-md-3">
                                <div class="price-column-container border-active">
                                    <div class="price-table-head bg-yellow">
                                        <h2 class="no-margin">Booking</h2>
                                    </div>
                                    <div class="arrow-down border-top-yellow"></div>
                                    <div class="price-table-pricing">
                                        <h3><?php // foreach ($getJmlBookong as $bkg) { echo $bkg->Jumlah;} 
                                            ?></h3>
                                        <p>Per Days</p>
                                    </div>
                                </div>
                            </div> -->
    <!-- <div class="col-md-3">
                                    <div class="price-column-container border-active">
                                        <div class="price-table-head bg-green">
                                            <h2 class="no-margin">CheckIn</h2>
                                        </div>
                                        <div class="arrow-down border-top-green"></div>
                                        <div class="price-table-pricing">
                                            <h3><?php // foreach ($getJmlCheckin as $chc) { echo $chc->Jumlah;} 
                                                ?></h3>
                                            <p>Per Days</p>
                                            <div class="price-ribbon">Popular</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="price-column-container border-active">
                                        <div class="price-table-head bg-red">
                                            <h2 class="no-margin">CheckOut</h2>
                                        </div>
                                        <div class="arrow-down border-top-red"></div>
                                        <div class="price-table-pricing">
                                            <h3><?php // foreach ($getJmlCheckout as $chk) { echo $chk->Jumlah; } 
                                                ?></h3>
                                            <p>Per Days</p>
                                        </div>
                                    </div>
                                </div> -->
    <!-- <div class="col-md-3">
                                    <div class="price-column-container border-active">
                                        <div class="price-table-head bg-grey-gallery">
                                            <h2 class="no-margin">Cancel</h2>
                                        </div>
                                        <div class="arrow-down border-top-grey-gallery"></div>
                                        <div class="price-table-pricing">
                                            <h3><?php // foreach ($getJmlCancel as $ccl) { echo $ccl->Jumlah; } 
                                                ?></h3>
                                            <p>Per Days</p>
                                        </div>
                                    </div>
                                </div> -->
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- <div class="row">
            <div class="col-lg-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <span class="caption-subject bold uppercase"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <div class="portlet light bordered"> -->
    <!-- <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="fa fa-home"></i>
                                            <span class="caption-subject bold uppercase">Informasi Kamar</span>
                                        </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                            <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                                            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-hover table-bordered" id="table1">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No Kamar</th>
                                                            <th class="text-center">Nama Mess</th>
                                                            <th class="text-center">Alamat</th>
                                                            <th class="text-center">Ketersediaan</th>
                                                            <th class="text-center">Sisa</th>
                                                            <th class="text-center">Status Kamar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($getDataKamar as $kmr) { ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $kmr->No_kamar ?></td>
                                                                <td><?php echo $kmr->Nama_mes ?></td>
                                                                <td class="text-center"><?php echo $kmr->Alamat ?></td>
                                                                <td class="text-center">
                                                                    <?php if ($kmr->Kapasitas == $kmr->Jumlah) {
                                                                        echo '<span class="label label-sm label-danger">Tidak Tersedia</span>';
                                                                    } else {
                                                                        echo '<span class="label label-sm label-success">Tersedia</span>';
                                                                    } ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php if ($kmr->Kapasitas == $kmr->Jumlah) { ?>
                                                                        <span class="badge badge-danger"><?php echo $kmr->Kapasitas - $kmr->Jumlah; ?></span>
                                                                    <?php } else if ($kmr->Jumlah == NULL) { ?>
                                                                        <span class="badge badge-success"><?php echo $kmr->Kapasitas ?></span>
                                                                    <?php } else { ?>
                                                                        <span class="badge badge-success"><?php echo $kmr->Jumlah ?></span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php if ($kmr->Cleaning == 1) { ?>
                                                                        <span class="badge badge-success">Ready</span>
                                                                    <?php } else { ?>
                                                                        <span class="badge badge-warning">Cleaning</span>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div> -->
    </div>
    </div>
    <!-- <div class="col-lg-6">
                                <div class="portlet light bordered"> -->
    <!-- <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="fa fa-users"></i>
                                            <span class="caption-subject bold uppercase">Informasi Booking & CheckIn</span>
                                        </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                            <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                                            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-hover table-bordered" id="table3">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th class="text-center">Rencana CheckIn</th>
                                                            <th class="text-center">Rencana CheckOut</th>
                                                            <th class="text-center">Jenis Kelamin</th>
                                                            <th>Instansi</th>
                                                            <th class="text-center">Kamar</th>
                                                            <th class="text-center">Status</th>
                                                            <th class="text-center">Tanggal Swab</th>
                                                            <th class="text-center">Perlakuan Test</th>
                                                            <th class="text-center">Pembayaran</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($getDataTamu as $row) { ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $row->NamaLengkap ?></td>
                                                                <td class="text-center"><?php echo date('d-M-Y', strtotime($row->Rencana_checkin)) ?></td>
                                                                <td class="text-center"><?php echo date('d-M-Y', strtotime($row->Rencana_checkout)) ?></td>
                                                                <td class="text-center"><?php if ($row->JenisKelamin == 'L') {
                                                                                            echo 'Laki-Laki';
                                                                                        } else {
                                                                                            echo 'Perempuan';
                                                                                        } ?></td>
                                                                <td class="text-center"><?php echo $row->Instansi ?></td>
                                                                <td class="text-center"><?php echo $row->Nama_mes ?> - <?php echo $row->No_kamar ?></td>
                                                                <td class="text-center">
                                                                    <?php if ($row->Status_tamu == 1) {
                                                                        echo '<span class="label label-sm label-warning">Booking</span>';
                                                                    } elseif ($row->Status_tamu == 2) {
                                                                        echo '<span class="label label-sm label-success">CheckIn</span>';
                                                                    } else {
                                                                        echo '<span class="label label-sm label-warning">Booking</span>';
                                                                    } ?>
                                                                </td>
                                                                <td><?php echo $row->TanggalSwab ?></td>
                                                                <td><?php if ($row->PerlakuanTest == '0') {
                                                                        echo "Rapid Test";
                                                                    } elseif ($row->PerlakuanTest == '1') {
                                                                        echo "Swab";
                                                                    } else {
                                                                        echo "";
                                                                    } ?></td>
                                                                <td><?php echo $row->Pembayaran ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div> -->
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- <div class="row">
            <div class="col-lg-12">
                <div class="portlet light bordered"> -->
    <!-- <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-desktop"></i>
                            <span class="caption-subject bold uppercase">Informasi Pembelian Belanja Dapur</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                            <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-hover table-bordered" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No Ref</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Suplier</th>
                                            <th class="text-center">Kategori</th>
                                            <th class="text-center">Total (Rp.)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($getDataPembelian as $get) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo $get->No_ref ?></td>
                                                <td class="text-center"><?php echo date('d-M-Y', strtotime($get->Tgl_transaksi)) ?></td>
                                                <td class="text-center"><?php echo $get->nama_suplier ?></td>
                                                <td class="text-center">
                                                    <?php if ($get->Kategori == 1) {
                                                        echo 'Barang Dapur';
                                                    } else {
                                                        echo 'Perawatan Mess';
                                                    } ?>
                                                </td>
                                                <td class="text-right">Rp.
                                                    <?php foreach ($getTotal as $row) {
                                                        if ($get->HeaderID == $row->HeaderID) {
                                                            echo number_format($row->Total);
                                                        }
                                                    } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12">
                                <a href="<?php echo base_url('Pembelian') ?>" class="btn btn-sm btn-primary">
                                    <i class="fa fa-table"></i>
                                    View Table Pembelian
                                </a>
                            </div>
                        </div>
                    </div> -->
    </div>
    </div>
    </div>
    <!-- <div class="row">
            <div class="col-lg-12">
                <div class="portlet light bordered"> -->
    <!-- <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-ship"></i>
                            <span class="caption-subject bold uppercase">Informasi Perjalanan Dinas </span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                            <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-hover table-bordered" id="table2">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">No Lppt</th>
                                            <th class="text-center">Speedboat</th>
                                            <th class="text-center">Route</th>
                                            <th class="text-center">Operator</th>
                                            <th class="text-center">Total (Rp.)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($getDataSpeedboat as $get) { ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo date('d - M - Y', strtotime($get->TanggalNota)) ?>
                                                </td>
                                                <td class="text-center"><?php echo $get->NoLppt ?></td>
                                                <td class="text-center"><?php echo $get->Nama_speedboad ?></td>
                                                <td class="text-center"><?php echo $get->Rute ?></td>
                                                <td class="text-center"><?php echo $get->Nama_sopir ?></td>
                                                <td class="text-center">Rp.
                                                    <?php foreach ($getGrandTotalSpeedboat as $key) {
                                                        if ($get->NoLppt == $key->NoLppt) {
                                                            echo number_format($key->GrandTotal);
                                                        }
                                                    } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12">
                                <a href="<?php echo base_url('NotaSpeedboat') ?>" class="btn btn-sm btn-primary">
                                    <i class="fa fa-table"></i>
                                    View Table Speedboat
                                </a>
                            </div>
                        </div>
                    </div> -->
    </div>
    </div>
    </div>
    </div>
<?php } elseif ($this->session->userdata('group_user') == 2) { ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-desktop"></i>
                        <span class="caption-subject bold uppercase">Informasi Pembelian Belanja Dapur</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No Ref</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Suplier</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Total (Rp.)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getDataPembelian as $get) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $get->No_ref ?></td>
                                            <td class="text-center"><?php echo date('d-M-Y', strtotime($get->Tgl_transaksi)) ?></td>
                                            <td class="text-center"><?php echo $get->nama_suplier ?></td>
                                            <td class="text-center">
                                                <?php if ($get->Kategori == 1) {
                                                    echo 'Barang Dapur';
                                                } else {
                                                    echo 'Perawatan Mess';
                                                } ?>
                                            </td>
                                            <td class="text-right">Rp.
                                                <?php foreach ($getTotal as $row) {
                                                    if ($get->HeaderID == $row->HeaderID) {
                                                        echo number_format($row->Total);
                                                    }
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12">
                            <a href="<?php echo base_url('Pembelian') ?>" class="btn btn-sm btn-primary">
                                <i class="fa fa-table"></i>
                                View Table Pembelian
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } elseif ($this->session->userdata('group_user') == 7) { ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-ship"></i>
                        <span class="caption-subject bold uppercase">Informasi Perjalanan Dinas </span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover table-bordered" id="table2">
                                <thead>
                                    <tr>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">No Lppt</th>
                                        <th class="text-center">Speedboat</th>
                                        <th class="text-center">Route</th>
                                        <th class="text-center">Operator</th>
                                        <th class="text-center">Total (Rp.)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getDataSpeedboat as $get) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo date('d - M - Y', strtotime($get->TanggalNota)) ?>
                                            </td>
                                            <td class="text-center"><?php echo $get->NoLppt ?></td>
                                            <td class="text-center"><?php echo $get->Nama_speedboad ?></td>
                                            <td class="text-center"><?php echo $get->Rute ?></td>
                                            <td class="text-center"><?php echo $get->Nama_sopir ?></td>
                                            <td class="text-center">Rp.
                                                <?php foreach ($getGrandTotalSpeedboat as $key) {
                                                    if ($get->NoLppt == $key->NoLppt) {
                                                        echo number_format($key->GrandTotal);
                                                    }
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12">
                            <a href="<?php echo base_url('NotaSpeedboat') ?>" class="btn btn-sm btn-primary">
                                <i class="fa fa-table"></i>
                                View Table Speedboat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } elseif ($this->session->userdata('group_user') == 112 || $this->session->userdata('group_user') == 103) { ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger">
                <span class="blink_me">
                    <?php
                    $hitung = count($getDetailTamu);
                    if ($hitung > 0) {
                        echo "<strong>Informasi !</strong> Tamu  <br>";
                        for ($i = 0; $i < $hitung; $i++) {
                            echo "Nama : " . $getDetailTamu[$i]->NamaLengkap . " akan CheckOut Pada Tanggal " . date('d-M-Y', strtotime($getDetailTamu[0]->Rencana_checkout)) . " Jam " . date('H:i:s', strtotime($getDetailTamu[$i]->Rencana_JamCheckOut)) . "<br>";
                        }
                    } else {
                        echo "";
                    }
                    ?>
                </span>
            </div>
        </div>
        <script type="text/javascript">
            function blinker() {
                $('.blink_me').fadeOut(1000);
                $('.blink_me').fadeIn(1000);
            }
            setInterval(blinker, 1000);
        </script>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <div class="pricing-content-1">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="price-column-container border-active">
                                    <div class="price-table-head bg-yellow">
                                        <h2 class="no-margin">Booking</h2>
                                    </div>
                                    <div class="arrow-down border-top-yellow"></div>
                                    <div class="price-table-pricing">
                                        <h3><?php foreach ($getJmlBookong as $bkg) {
                                                echo $bkg->Jumlah;
                                            } ?></h3>
                                        <p>Per Days</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="price-column-container border-active">
                                    <div class="price-table-head bg-green">
                                        <h2 class="no-margin">CheckIn</h2>
                                    </div>
                                    <div class="arrow-down border-top-green"></div>
                                    <div class="price-table-pricing">
                                        <h3><?php foreach ($getJmlCheckin as $chc) {
                                                echo $chc->Jumlah;
                                            } ?></h3>
                                        <p>Per Days</p>
                                        <div class="price-ribbon">Popular</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="price-column-container border-active">
                                    <div class="price-table-head bg-red">
                                        <h2 class="no-margin">CheckOut</h2>
                                    </div>
                                    <div class="arrow-down border-top-red"></div>
                                    <div class="price-table-pricing">
                                        <h3><?php foreach ($getJmlCheckout as $chk) {
                                                echo $chk->Jumlah;
                                            } ?></h3>
                                        <p>Per Days</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="price-column-container border-active">
                                    <div class="price-table-head bg-grey-gallery">
                                        <h2 class="no-margin">Cancel</h2>
                                    </div>
                                    <div class="arrow-down border-top-grey-gallery"></div>
                                    <div class="price-table-pricing">
                                        <h3><?php foreach ($getJmlCancel as $ccl) {
                                                echo $ccl->Jumlah;
                                            } ?></h3>
                                        <p>Per Days</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-users"></i>
                        <span class="caption-subject bold uppercase">Informasi Booking & CheckIn</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover table-bordered" id="table3">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Jenis Kelamin</th>
                                        <th class="text-center">Instansi</th>
                                        <th class="text-center">Kamar</th>
                                        <th class="text-center">Status Tamu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getDataTamu as $row) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $row->NamaLengkap ?></td>
                                            <td class="text-center"><?php if ($row->JenisKelamin == 'L') {
                                                                        echo 'Laki-Laki';
                                                                    } else {
                                                                        echo 'Perempuan';
                                                                    } ?></td>
                                            <td class="text-center"><?php echo $row->Instansi ?></td>
                                            <td class="text-center"><?php echo $row->Nama_mes ?> - <?php echo $row->No_kamar ?></td>
                                            <td class="text-center">
                                                <?php if ($row->Status_tamu == 1) {
                                                    echo '<span class="label label-sm label-warning">Booking</span>';
                                                } elseif ($row->Status_tamu == 2) {
                                                    echo '<span class="label label-sm label-success">CheckIn</span>';
                                                } else {
                                                    echo '<span class="label label-sm label-warning">Booking</span>';
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="tools">
                        <?php echo date('d-M-Y H:i:s') ?>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h2>SELAMAT DATANG</h2>
                                <?php
                                $nama = $this->session->userdata('user_name');
                                ?>
                                <h3><?php echo $nama ?></h3>
                                <p>Silahkan Input Data Pada Menu yang tersedia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').dataTable({
            "order": [0, 'asc'],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "pageLength": 10
        });

        $('#table2').dataTable({
            "order": [0, 'asc'],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "pageLength": 10
        });

        $('#table1').dataTable({
            "order": [0, 'asc'],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "pageLength": 10
        });
        $('#table3').dataTable({
            "order": [0, 'asc'],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "pageLength": 10
        });
    });
</script>