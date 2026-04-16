<div class="page-content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-file-text"></i>
                        <span class="caption-subject bold uppercase">Hasil Pencarian</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="form-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped" id="table2">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">NIK</th>
                                        <th class="text-center">Jenis Kelamin</th>
                                        <th class="text-center">Departemen</th>
                                        <th class="text-center">Departemen ID</th>
                                        <th class="text-center">Foto</th>
                                        <th class="text-center">
                                            <?php if ($status_tk == '1') {
                                                echo 'Perusahaan';
                                            } elseif ($status_tk == '2') {
                                                echo 'CV';
                                            } ?>
                                        </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="body_detail">
                                    <?php
                                    $no = 1;
                                    if (count($get_dataTK) > 0) {
                                        foreach ($get_dataTK as $dtl) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo $no++ ?></td>
                                                <td class="nama"><?php echo $dtl->nama ?></td>
                                                <td class="text-center telegramid" style="display:none;"><?php echo $dtl->telegramid ?></td>
                                                <td class="text-center personalstat" style="display:none;"><?php echo $dtl->personalstatus ?></td>
                                                <td class="text-center nik"><?php echo $dtl->nik ?></td>
                                                <td class="text-center jeniskelamin">
                                                    <?php if (trim($dtl->jeniskelamin) == 'L') {
                                                        echo 'Laki-Laki';
                                                    } else {
                                                        echo 'Perempuan';
                                                    } ?>
                                                </td>
                                                <td class="text-center bagian_abbr"><?php echo $dtl->bagian_abbr ?></td>
                                                <td class="text-center id_dept"><?php echo $dtl->dept_id_real ?></td>
                                                <td class="text-center">
                                                    <?php
                                                    $base_url = base_url();
                                                    $url_foto = str_replace('elaundry/', '', $base_url);
    
                                                    if ($status_tk == '1') { ?>
                                                        <img src="<?= $url_foto . 'psg_erw/assets/ft_karyawan/foto_kar/Karyawan_regno/' . $dtl->personalid . '.jpg'; ?>" class="img-block img-thumbnail" alt="">
                                                        <?php 
                                                    } else { ?>
                                                        <img src="<?= $url_foto . 'psg_erw/assets/ft_karyawan/foto_kar/Boro_fixno/' . $dtl->personalid . '.jpg'; ?>" class="img-block img-thumbnail" alt="">
                                                        <?php 
                                                    } ?>
                                                </td>
                                                <td class="text-center personalstatus">
                                                    <?php if ($dtl->personalstatus == '1') {
                                                        echo $dtl->company_abbr;
                                                    } elseif ($dtl->personalstatus == '2') {
                                                        echo $dtl->cv_abbr;
                                                    } ?>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn-sm btn-primary" id="<?= $dtl->personalid; ?>" onclick="pilih(this)">Pilih</a>
                                                </td>
                                            </tr>
                                            <?php 
                                        }
                                    } else {
                                        echo "<div class='alert alert-danger'>";
                                        echo '<strong>Gagal...! Karyawan atau Tenaga kerja ini sudah tidak aktive.</strong>';
                                        echo "</div>";
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>