<div class="page-container">
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="portlet-body form">
                                <form role="form" class="form-horizontal" action="#" method="post" entype="multipart/form-data">
                                    <div class="form-body">
                                      <?php foreach($getDataHdr as $hdr){?>
                                        <div class="row">
                                            <div class="col-lg-12">
                                              <div class="form-group">
                                                  <label class="col-lg-3 control-label">Instansi</label>
                                                      <div class="col-lg-4">
                                                          <label class="control-label">: <?php echo $hdr->Instansi?></label>
                                                      </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-3 control-label">Alamat</label>
                                                      <div class="col-lg-4">
                                                          <label class="control-label">: <?php echo $hdr->Alamat?></label>
                                                      </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-3 control-label">Rencana Checkin</label>
                                                  <div class="col-lg-4">
                                                      <label class="control-label">: <?php echo date('d-m-Y',strtotime($hdr->Rencana_checkin))?></label>
                                                  </div>
                                                  <label class="col-lg-1 control-label">Durasi</label>
                                                  <div class="col-lg-3">
                                                     <label class="control-label">: <?php echo $hdr->Durasi?> / Hari</label>
                                                  </div>
                                              </div>
                                              <div>
                                                  <div class="form-group">
                                                      <label class="col-lg-3 control-label">Rencana Checkout</label>
                                                        <div class="col-lg-4">
                                                            <label class="control-label">: <?php echo date('d-m-Y',strtotime($hdr->Rencana_checkout))?></label>
                                                        </div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-3 control-label">Departemen Tujuan</label>
                                                      <div class="col-lg-4">
                                                        <label class="control-label">: <?php echo $hdr->Instansi?></label>
                                                      </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-3 control-label">Attention</label>
                                                      <div class="col-lg-4">
                                                         <label class="control-label">: <?php echo $hdr->Singkatan_dept?></label>
                                                      </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-3 control-label">Keperluan</label>
                                                      <div class="col-lg-4">
                                                         <label class="control-label">: <?php echo $hdr->Keperluan?></label>
                                                      </div>
                                              </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="col-lg-1 control-label"></label>
                                                    <div class="col-lg-10">
                                                        <table class="table table-bordered table-hover" id="dataTable">
                                                            <thead>
                                                               <tr>
                                                                  <th class="text-center">No</th>
                                                                  <th class="text-center">Nama Lengkap</th>
                                                                  <th class="text-center">Jenis Kelamin</th>
                                                                  <th class="text-center">Jabatan</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                              <?php 
                                                              $no=1;
                                                              foreach($getDataDtl as $dtl){?>
                                                                <tr>
                                                                  <td class="text-center"><?php echo $no++?></td>
                                                                  <td class="text-center"><?php echo $dtl->NamaLengkap?></td>
                                                                  <td class="text-center"><?php echo $dtl->JenisKelamin?></td>
                                                                  <td class="text-center"><?php echo $dtl->Jabatan?></td>
                                                                </tr>
                                                              <?php }?>
                                                            </tbody>
                                                        </table>
                                                    </div>
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
        </div>
    </div>
</div>

