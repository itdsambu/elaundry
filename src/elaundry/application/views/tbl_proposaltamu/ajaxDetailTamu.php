<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet light bordered">
                <?php foreach($getDataHdr as $hdr){?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Instansi</label>
                            <div class="col-lg-6">
                                <label class="control-label">: <?php echo $hdr->Instansi?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Alamat</label>
                            <div class="col-lg-6">
                                <label class="control-label">: <?php echo $hdr->Alamat?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Rencana CheckIn</label>
                            <div class="col-lg-2">
                                <label class="control-label">: <?php echo date('d-m-Y',strtotime($hdr->Rencana_checkin))?></label>
                            </div>
                            <div class="col-lg-2">
                                <label class="control-label">Jam : <?php echo date('H:i:s',strtotime($hdr->Rencana_JamCheckIn))?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label class="col-lg-3 control-label">Durasi</label>
                        <div class="col-lg-6">
                            <label class="control-label">: <?php echo $hdr->Durasi?></label>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label class="col-lg-3 control-label">Rencana CheckOut</label>
                        <div class="col-lg-2">
                            <label class="control-label">: <?php echo date('d-m-Y',strtotime($hdr->Rencana_checkout))?></label>
                        </div>
                        <div class="col-lg-2">
                            <label class="control-label">Jam : <?php echo date('H:i:s',strtotime($hdr->Rencana_JamCheckOut))?></label>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label class="col-lg-3 control-label">Dept Tujuan</label>
                        <div class="col-lg-4">
                            <label class="control-label">: <?php echo $hdr->Singkatan_dept?></label>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label class="col-lg-3 control-label">Attention</label>
                        <div class="col-lg-4">
                            <label class="control-label">: <?php echo $hdr->Attention?></label>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label class="col-lg-3 control-label">Keperluan</label>
                        <div class="col-lg-4">
                            <label class="control-label">: <?php echo $hdr->Keperluan?></label>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label class="col-lg-3 control-label">Status Tamu</label>
                        <div class="col-lg-4">
                            <label class="control-label">: <?php echo $hdr->Status_inap?></label>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <div class="portlet light bordered">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no=1;
                        foreach($getDataTamu as $dtl){?>
                        <tr>
                            <td class="text-center"><?php echo $no++?></td>
                            <td><?php echo $dtl->NamaLengkap?></td>
                            <td class="text-center"><?php if($dtl->JenisKelamin == 'L'){echo 'Laki-Laki';}else{echo 'Perempuan';}?></td>
                            <td class="text-center"><?php echo $dtl->Jabatan?></td>
                            <td class="text-center"><?php echo $dtl->Keterangan?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>