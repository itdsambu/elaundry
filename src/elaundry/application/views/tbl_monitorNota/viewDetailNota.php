<div class="page-container">
    <div class="page-content-wrapper">
        <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light">
                            <div class="portlet-body">
                                <div class="scroller" style="height:auto;" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-hover table-striped" width="100%" >
                                            <thead>
                                              <tr>
                                                  <th rowspan="2" width="8%" class="text-center">
                                                      <img src="<?php echo base_url();?>assets\layouts\layout3\img\logopt.png">
                                                  </th>
                                                  <th colspan="10" width="65%" class="text-center">
                                                      <p>PT RIAU SAKTI UNITED PLANTATIONS</p>
                                                  </th>
                                                  <th>
                                                    <div class="form-group">
                                                        <label class="col-lg-1 control-label">Dept</label>
                                                        <label class="col-lg-6 control-label">: SKT</label>
                                                    </div>
                                                  </th>
                                              </tr>
                                              <tr>
                                                  <th colspan="10" class="text-center">
                                                      <p>LAPORAN PENANGGUNG JAWABAN PERJALANAN DINAS</p>
                                                  </th>
                                                  <th>
                                                    <div class="form-group" width="15%">
                                                      <?php
                                                      foreach($getDataNotaHdr as $hdr) {?>
                                                        <label class="col-lg-1 control-label">Tgl:</label>
                                                        <label class="col-lg-6 control-label" id="tglNota">: <?php echo date('d-M-Y',strtotime($hdr->TanggalNota))?></label>
                                                      <?php }?>
                                                    </div>
                                                  </th>
                                              </tr>
                                            </thead>
                                          </table>
                                        <form class="form-horizontal">
                                          <?php foreach($getDataNotaHdr as $hdr){?>
                                            <div class="col-lg-6">
                                              <div class="form-group">
                                                    <label class="col-lg-3 control-label">Tanggal Nota</label>
                                                    <div class="col-lg-6">
                                                      <input type="hidden" name="txtHeaderID" id="headerID" class="form-control" value="<?php echo $hdr->NotaHeaderID?>">
                                                        <input type="text" class="form-control" name="txtTglNota" id="tglNota" value="<?php echo date('d-m-Y',strtotime($hdr->TanggalNota))?>" readonly>
                                                    </div>
                                                </div>
                                                <script type="text/javascript">
                                                   $(document).ready(function () {
                                                      $('#tglNota').datepicker({
                                                          format: "dd-mm-yyyy",
                                                          autoclose: true
                                                      });
                                                  });
                                                </script>
                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label">No Lppt </label>
                                                    <div class="col-lg-6">
                                                       <input type="text" name="txtNolppt" id="nolppt" class="form-control" placeholder="Input No Lppt" value="<?php echo $hdr->NoLppt?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label">Nama Operator</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" name="txtNamaOperator" id="namaoperator" value="<?php echo $hdr->Nama_sopir?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <!-- <div class="form-group">
                                                    <label class="col-lg-3 control-label">Keperluan</label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control" name="txtKeperluan" id="keperluan" readonly><?php echo $hdr->Keperluan?></textarea>
                                                    </div>
                                                </div> -->
                                                <div class="form-group">
                                                   <label class="col-lg-3 control-label">Speedboat</label>
                                                   <div class="col-lg-6">
                                                       <input class="form-control" name="txtSpeedboat" id="speedboat" value="<?php echo $hdr->Nama_speedboad?>" readonly>
                                                   </div> 
                                                </div>
                                                <div id="ruteid">
                                                    <div class="form-group">
                                                        <label class="col-lg-3 control-label">Route</label>
                                                        <div class="col-lg-6">
                                                            <input class="form-control" name="txtRoute" id="route" value="<?php echo $hdr->Rute?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          <?php }?>
                                          <div class="row">
                                              <div class="col-lg-12">
                                                <br>
                                                <br>
                                                <div class="form-group">
                                                  <table class="table table-bordered table-hover" id="dataTable2">
                                                    <thead style="background-color: #004b71; color: #cceeff;">
                                                      <tr>
                                                        <th class="text-center" rowspan="2">No</th>
                                                        <th class="text-center" rowspan="2">Keperluan</th>
                                                        <th class="text-center" colspan="2">Tanggal</th>
                                                        <th class="text-center" rowspan="2">Jam</th>
                                                      </tr>
                                                      <tr>
                                                        <th class="text-center">Berangkat</th>
                                                        <th class="text-center">Kembali</th>
                                                      </tr>
                                                    </thead>
                                                    <?php 
                                                    $no=1;
                                                    foreach ($getDetailPerjalanan as $p) {?>
                                                    <tbody>
                                                      <tr>
                                                          <input type="hidden" name="txtPrjID[]" id="prjID" class="form-control" value="<?php echo $p->DetailPerjalananID?>">
                                                        <td class="text-center"><?php echo $no++?></td>
                                                        <td class="text-center"><?php echo $p->Keperluan?></td>
                                                        <td class="text-center"><?php echo date('d-M-Y',strtotime($p->Tgl_berangkat))?></td>
                                                        <td class="text-center"><?php echo date('d-M-Y',strtotime($p->Tgl_kembali))?></td>
                                                        <td class="text-center"><?php echo date('H:i:s',strtotime($p->Jam))?></td>
                                                      </tr>
                                                      <?php }?>
                                                    </tbody>
                                                  </table>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                  </br>
                                                  </br>
                                                  <table class="table table-bordered table-hover" id="dataTable">
                                                      <thead style="background-color: #004b71; color: #cceeff;">
                                                         <tr>
                                                              <th class="text-center" rowspan="2">No</th>
                                                              <th class="text-center">Keterangan</th>
                                                              <th class="text-center">Volume</th>
                                                              <th class="text-center">Satuan</th>
                                                              <th class="text-center">Harga (Rp)</th>
                                                              <th class="text-center">Total (Rp)</th>
                                                          </tr>
                                                     </thead>
                                                      <tbody id="">
                                                        <?php
                                                          $no=1;
                                                          foreach ($getDataNotaDtl as $dtl) {
                                                          ?>
                                                          <tr>
                                                            <td class="text-center"><?php echo $no++;?>
                                                                <input type="hidden" name="txtdetailid[]" value="<?php echo $dtl->NotaDetailID?>">
                                                            </td>
                                                            <td class="text-center"><?php echo $dtl->Keterangan?></td>
                                                            <td class="text-center"><?php echo $dtl->Volume?></td>
                                                            <td class="text-center"><?php echo $dtl->Nama?></td>
                                                            <td class="text-right"><?php echo number_format($dtl->Harga,2);?></td>
                                                            <td class="text-right"><?php echo number_format($dtl->Total,2);?></td>
                                                          </tr>
                                                        <?php }?>
                                                      </tbody>
                                                      <tfoot>
                                                        <?php 
                                                        foreach($getTotalNota as $gt) {
                                                          ?>
                                                        <tr>
                                                            <td colspan="5" style="text-align: right;">Grand Total</td>
                                                            <td colspan="2" class="text-right"><?php echo number_format($gt->Jumlah,2);?></td>
                                                        </tr>
                                                        <?php }?>
                                                      </tfoot>
                                                  </table>
                                              </div>
                                              <div>
                                                  <h4><strong> Beban Speedboat</strong></h4>
                                              </div>
                                              <div class="form-group">
                                                  </br>
                                                  </br>
                                                  <table class="table table-bordered table-hover" id="dataTable1">
                                                      <thead style="background-color: #3FABA4; color: #cceeff;">
                                                         <tr>
                                                              <th class="text-center" rowspan="2">No</th>
                                                              <th class="text-center">Beban</th>
                                                              <th class="text-center">Jumlah Beban (Rp)</th>
                                                          </tr>
                                                     </thead>
                                                      <tbody id="">
                                                        <?php
                                                          $no=1;
                                                          foreach ($getDataBeban as $g) {?>
                                                          <tr>
                                                              <td class="text-center"><?php echo $no++?>
                                                                  <input type="hidden" name="txtdetailBbn[]" value="<?php echo $g->NotaBebanID?>">
                                                              </td>
                                                              <div>
                                                              <td class="text-center"><?php echo $g->Beban?></td>
                                                              <td class="text-center"><strong><?php echo number_format($g->TotalBeban,2);?></strong></td>
                                                          </tr>
                                                        <?php }?>
                                                      </tbody>
                                                    <tfoot>
                                                    </tfoot>
                                                  </table>
                                              </div>
                                              <div>
                                                <?php foreach($getDataApprove as $app) { ?>
                                                    <?php if($app->Approve1 == 1 && $app->Approve2 == 1) {
                                                        echo "<b>Dokumen ini telah disetujui secara elektronik. Tanda Tangan Tidak Diperlukan <br> Tanggal Efektif : 01/01/2019</b>";
                                                    }else{
                                                        echo '<b>Dokumen ini BELUM DISETUJUI</b>';
                                                    }
                                                }?>
                                            </div>
                                              <div class="form-group well">
                                                  <label class="col-lg-1 control-label"></label>
                                                  <!-- <a href="<?php //echo base_url('MonitorNotaPerjalananDinas/ExportExcelNota/'.$hdr->NotaHeaderID);?>" class="btn green-seagreen">
                                                      <i class="fa fa-file-excel-o"></i>
                                                      Export Excel
                                                  </a> -->
                                                  <a target="_blank" href="<?php echo base_url('MonitorNotaPerjalananDinas/printoutlaporanPdf/'.$hdr->NotaHeaderID);?>" class="btn btn-sm green-seagreen">
                                                      <i class="fa fa-file-excel-o"></i>
                                                      Cetak PDF
                                                  </a>
                                                  <a href="javascript:history.back()" class="btn btn-sm btn-default">
                                                    <i class="fa fa-angle-double-left"></i>
                                                    Kembali
                                                  </a>
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
</div>