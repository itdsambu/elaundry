<?php date_default_timezone_set('Asia/Jakarta'); ?>
<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Proposaltamu/updateData') ?>">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-file-text"></i>
                            <span class="caption-subject bold uppercase">Edit Issue Tamu</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                            <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php foreach($getDataHdr as $hdr){?>
                                        <input type="hidden" name="txtHeaderID" id="headerid" value="<?php echo $hdr->HeaderID?>">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Instansi</label>
                                                <div class="col-lg-4">
                                                    <input type="text" name="txtInstansi" class="form-control" placeholder="Input Instansi" value="<?php echo $hdr->Instansi?>">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Alamat</label>
                                                <div class="col-lg-4">
                                                    <textarea class="form-control" name="txtAlamat" id="alamat" placeholder="Input Alamat"><?php echo $hdr->Alamat?></textarea>
                                                </div>
                                        </div>
                                          <div class="form-group">
                                              <label class="col-lg-2 control-label">Rencana Checkin</label>
                                              <div class="col-lg-2">
                                                  <input type="date" name="txtRencanaCheckin" id="checkin" class="form-control" value="<?php echo date('Y-m-d',strtotime($hdr->Rencana_checkin))?>">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input type="time" name="txtjamcheckin" id="txtjamcheckin" class="form-control" value="<?php echo date('H:i:s',strtotime($hdr->Rencana_JamCheckIn))?>">
                                              </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-lg-2 control-label">Durasi</label>
                                              <div class="col-lg-4">
                                                <input type="text" name="txtDurasi" id="durasi" class="form-control" placeholder="Input Durasi" onkeypress="return hanyaAngka(event)" onchange="callAjax()" value="<?php echo $hdr->Durasi?>">
                                              </div>
                                          </div>
                                          <div id="idRencanaCheckout">
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Rencana Checkout</label>
                                                    <div class="col-lg-2">
                                                        <input type="date" name="txtRencanaCheckout" class="form-control" readonly value="<?php echo date('Y-m-d',strtotime($hdr->Rencana_checkout))?>">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input type="time" name="txtjamcheckout" id="txtjamcheckout" class="form-control" value="<?php echo date('H:i:s',strtotime($hdr->Rencana_JamCheckOut))?>">
                                                    </div>
                                              </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Departemen Tujuan</label>
                                                <div class="col-lg-4">
                                                    <select name="txtDept_tujuan" class="form-control select2">
                                                        <option>--Pilih--</option>
                                                       <?php foreach($getDept as $dept){
                                                        if($hdr->DeptID == $dept->ID_dept){?>
                                                            <option value="<?php echo $dept->ID_dept?>" selected><?php echo $dept->Singkatan_dept?></option>
                                                        <?php }else{?>
                                                            <option value="<?php echo $dept->ID_dept?>"><?php echo $dept->Singkatan_dept?></option>
                                                        <?php }}?>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Attention</label>
                                                <div class="col-lg-4">
                                                    <input type="text" name="txtAttention" class="form-control" placeholder="Input Attention" value="<?php echo $hdr->Attention?>">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Keperluan</label>
                                                <div class="col-lg-4">
                                                   <textarea class="form-control" name="txtKeperluan" id="keperluan" placeholder="Input Keperluan"><?php echo $hdr->Keperluan?>
                                                   </textarea>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Status Tamu</label>
                                                <div class="col-lg-4">
                                                    <select name="txtstatusinap" id="txtstatusinap" class="form-control">
                                                        <option value="">--Pilih--</option>
                                                        <?php if($hdr->Status_inap == 'Inap dan Makan'){?>
                                                            <option value="Inap dan Makan" selected="">Inap dan Makan</option>
                                                            <option value="Makan">Makan</option>
                                                            <option value="Inap">Inap</option>
                                                            <?php }elseif($hdr->Status_inap == 'Makan'){?>
                                                            <option value="Inap dan Makan">Inap dan Makan</option>
                                                            <option value="Makan" selected="">Makan</option>
                                                            <option value="Inap">Inap</option>
                                                            <?php }else{?>
                                                            <option value="Inap dan Makan">Inap dan Makan</option>
                                                            <option value="Makan">Makan</option>
                                                            <option value="Inap"selected="">Inap</option>
                                                            <?php }?>
                                                    </select>
                                                </div>
                                          </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
                <?php if($this->session->userdata('group_user') == 1 || $this->session->userdata('group_user') == 2 || $this->session->userdata('group_user') == 7 || $this->session->userdata('group_user') == 53){?>
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                            <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12">
                                  <a class="btn yellow btn-sm" onclick="tambah_baris();">
                                    <i class="fa fa-plus"></i>
                                    Tambah Tamu
                                  </a>
                                </div>
                                <br>
                                <br>
                                <div class="col-lg-12">
                                    <table class="table table-bordered table-hover" id="dataTable">
                                        <thead>
                                          <tr>
                                            <th rowspan="2"></th>
                                            <th class="text-center">Nama Lengkap</th>
                                            <th class="text-center">Jenis Kelamin</th>
                                            <th class="text-center">Jabatan</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Tanggal Swab</th>
                                            <th class="text-center">Perlakuan Test</th>
                                            <th class="text-center">Pembayaran</th>
                                          </tr>
                                       </thead>
                                        <tbody id="">
                                          <?php foreach($getDataDtl as $dtl){?>
                                            <tr>
                                                <td class="text-center">
                                                    <input type="hidden" name="txtdetailid[]" class="form-control txt" value="<?php echo $dtl->DetailID ?>">
                                                    <a style="color:#fff" id="hapus" class="btn red btn-sm" onclick="hapus_baris(this)" ><i class="fa fa-trash"></i></a>
                                                </td>
                                                <div>
                                                <td>
                                                   <input type="text" name="txtNama[]" id="nama1" class="form-control" placeholder="Input Nama Lengkap" value="<?php echo $dtl->NamaLengkap?>">
                                                </td>
                                                <td>
                                                    <select class="form-control txt" name="txtJenisKelamin[]" id="jeniskelamin1">
                                                        <option value="">--Pilih--</option>
                                                        <?php if($dtl->JenisKelamin == 'L'){?>
                                                            <option value="L" selected="selected">Laki - Laki</option>
                                                            <option value="P">Perempuan</option>
                                                        <?php }else{?>
                                                            <option value="L">Laki - Laki</option>
                                                            <option value="P" selected="selected">Perempuan</option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td>
                                                   <input type="text" name="txtJabatan[]" id="Jabatan1" class="form-control" placeholder="Input Jabatan" value="<?php echo $dtl->Jabatan?>">
                                                </td>
                                                <td>
                                                   <input type="text" name="txtKeterangan[]" id="Keterangan1" class="form-control" placeholder="Input Jabatan" value="<?php echo $dtl->Keterangan?>">
                                                </td>
                                                <td>
                                                  <input type="date" name="txtTanggalSwab[]" id="txtTanggalSwab" class="form-control" value="<?php echo date('Y-m-d',strtotime($dtl->TanggalSwab))?>">
                                                </td>                                            
                                                <td>
                                                  <div class="form-group">
                                                      <label class="col-md-1 control-label"></label>
                                                      <div class="col-md-9">
                                                        <?php if($dtl->PerlakuanTest == 0){?>
                                                          <div class="mt-checkbox-inline">
                                                              <label class="mt-checkbox">
                                                                  <input type="checkbox" name="optPerlakuan[]" id="optPerlakuan" value="0" checked=""> Rapid Test
                                                                  <span></span>
                                                              </label>
                                                              <label class="mt-checkbox">
                                                                  <input type="checkbox" name="optPerlakuan[]" id="optPerlakuan" value="1"> Swab
                                                                  <span></span>
                                                              </label>
                                                          </div>
                                                        <?php }elseif($dtl->PerlakuanTest == 1){?>
                                                          <div class="mt-checkbox-inline">
                                                              <label class="mt-checkbox">
                                                                  <input type="checkbox" name="optPerlakuan[]" id="optPerlakuan" value="0"> Rapid Test
                                                                  <span></span>
                                                              </label>
                                                              <label class="mt-checkbox">
                                                                  <input type="checkbox" name="optPerlakuan[]" id="optPerlakuan" value="1" checked=""> Swab
                                                                  <span></span>
                                                              </label>
                                                          </div>
                                                        <?php }else{?>
                                                          <div class="mt-checkbox-inline">
                                                              <label class="mt-checkbox">
                                                                  <input type="checkbox" name="optPerlakuan[]" id="optPerlakuan" value="0"> Rapid Test
                                                                  <span></span>
                                                              </label>
                                                              <label class="mt-checkbox">
                                                                  <input type="checkbox" name="optPerlakuan[]" id="optPerlakuan" value="1"> Swab
                                                                  <span></span>
                                                              </label>
                                                          </div>
                                                        <?php }?>
                                                      </div>
                                                  </div>
                                                </td>                                            
                                                <td>
                                                  <select class="form-control" name="selPembayaran[]" id="selPembayaran">
                                                      <option value="">- Pilih Pembayaran -</option>
                                                      <?php if($dtl->Pembayaran == 'Umum'){
                                                      echo '<option value="Umum" selected>Umum</option>
                                                        <option value="Perusahaan">Perusahaan</option>
                                                        <option value="Pribadi">Pribadi</option>';
                                                      }elseif($dtl->Pembayaran == 'Perusahaan'){
                                                        echo '<option value="Umum">Umum</option>
                                                        <option value="Perusahaan" selected>Perusahaan</option>
                                                        <option value="Pribadi">Pribadi</option>';
                                                      }elseif($dtl->Pembayaran == 'Pribadi'){
                                                        echo '<option value="Umum">Umum</option>
                                                        <option value="Perusahaan" >Perusahaan</option>
                                                        <option value="Pribadi" selected>Pribadi</option>';
                                                      } else{
                                                        echo '<option value="Umum">Umum</option>
                                                        <option value="Perusahaan" >Perusahaan</option>
                                                        <option value="Pribadi">Pribadi</option>';
                                                      } ?>
                                                  </select>
                                                </td>                                            
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <br>
                                <div class="col-lg-12">
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-lg-1 col-lg-5">
                                                <button class="btn green">Submit</button> 
                                                <a class="btn default" href="javascript:history.back()">Kembali</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <?php }else{?>
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                            <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12">
                                  <a class="btn yellow btn-sm" onclick="tambah_baris();">
                                    <i class="fa fa-plus"></i>
                                    Tambah Tamu
                                  </a>
                                </div>
                                <br>
                                <br>
                                <div class="col-lg-12">
                                    <table class="table table-bordered table-hover" id="dataTable">
                                        <thead>
                                          <tr>
                                            <th rowspan="2"></th>
                                            <th class="text-center">Nama Lengkap</th>
                                            <th class="text-center">Jenis Kelamin</th>
                                            <th class="text-center">Jabatan</th>
                                            <th class="text-center">Keterangan</th>
                                          </tr>
                                       </thead>
                                        <tbody id="">
                                          <?php foreach($getDataDtl as $dtl){?>
                                            <tr>
                                                <td class="text-center">
                                                    <input type="hidden" name="txtdetailid[]" class="form-control txt" value="<?php echo $dtl->DetailID ?>">
                                                    <a style="color:#fff" id="hapus" class="btn red btn-sm" onclick="hapus_baris(this)" ><i class="fa fa-trash"></i></a>
                                                </td>
                                                <div>
                                                <td>
                                                   <input type="text" name="txtNama[]" id="nama1" class="form-control" placeholder="Input Nama Lengkap" value="<?php echo $dtl->NamaLengkap?>">
                                                </td>
                                                <td>
                                                    <select class="form-control txt" name="txtJenisKelamin[]" id="jeniskelamin1">
                                                        <option value="">--Pilih--</option>
                                                        <?php if($dtl->JenisKelamin == 'L'){?>
                                                            <option value="L" selected="selected">Laki - Laki</option>
                                                            <option value="P">Perempuan</option>
                                                        <?php }else{?>
                                                            <option value="L">Laki - Laki</option>
                                                            <option value="P" selected="selected">Perempuan</option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td>
                                                   <input type="text" name="txtJabatan[]" id="Jabatan1" class="form-control" placeholder="Input Jabatan" value="<?php echo $dtl->Jabatan?>">
                                                </td>
                                                <td>
                                                   <input type="text" name="txtKeterangan[]" id="Keterangan1" class="form-control" placeholder="Input Jabatan" value="<?php echo $dtl->Keterangan?>">
                                                </td>                                       
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <br>
                                <div class="col-lg-12">
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-lg-1 col-lg-5">
                                                <button class="btn green">Submit</button> 
                                                <a class="btn default" href="javascript:history.back()">Kembali</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <?php }?>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').dataTable({
            "order"      : [0, 'asc'],
            "lengthMenu" : [
                            [5, 10, 15, 20, -1],
                            [5, 10, 15, 20, "All"] // change per page values here
                           ],
            "pageLength" : 10
        });
    } );
</script>

<script type="text/javascript">
    function tambah_baris() {
      // alert(selPicPrimary); 
      var jum = document.getElementsByClassName('txt');
      var l = jum.length+1;

      var no = l+1;
      var num = 1;
      for (var i = 0; i < num; i++) {
          $('table[id="dataTable"]').append('<tbody id="dataTable1">\n\
            <tr>\n\
              <td class="text-center">\n\
              <a id="hapus'+l+'" class="btn red btn-sm" onclick="hapus_baris(this)"><i class="fa fa-trash"></i>\n\
                </a>\n\
              </td>\n\
              <td class="text-center" >\n\
                  <input type="text" name="txtNama[]" id="nama'+l+'" class="form-control" placeholder="Input Nama Lengkap">\n\
              </td>\n\
              <td class="text-center"">\n\
                  <select class="form-control" name="txtJenisKelamin[]" id="jeniskelamin'+l+'">\n\
                    <option value="">--Pilih--</option>\n\
                    <option value="L">Laki - Laki</option>\n\
                    <option value="P">Perempuan</option>\n\
                  <select>\n\
              </td>\n\
              <td class="text-center">\n\
                  <input type="text" name="txtJabatan[]" id="Jabatan'+l+'" class="form-control" placeholder="Input Jabatan">\n\
              </td>\n\
              <td class="text-center">\n\
                  <input type="text" name="txtKeterangan[]" id="Keterangan'+l+'" class="form-control" placeholder="Input Jabatan">\n\
              </td>\n\
          </tr>\n\
          </tbody>');
      }

      // $('#jeniskelamin1 option').clone().appendTo('#jeniskelamin'+l);
    }
</script>
<script type="text/javascript">
    function hapus_baris(ip){
          var tr = ip.parentNode.parentNode;
          tr.parentNode.removeChild(tr);
    };

    $(function () {
        $(".select2").select2();
    });

    function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        };

    function callAjax(){
        var checkin = $('#checkin').val();
        var durasi  = $('#durasi').val();

        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('Proposaltamu/ajaxRencanaCheckout')?>"+"/"+checkin+"/"+durasi,
            success: function(msg){
                if(msg == ''){
                  alert('Tidak ada data');
                } 
                else{
                    $("#idRencanaCheckout").html(msg);                                                     
                }
            }
        });
    }
</script>