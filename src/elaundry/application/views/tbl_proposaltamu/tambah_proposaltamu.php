<?php date_default_timezone_set('Asia/Jakarta'); ?>
<script src="<?php echo base_url();?>assets/jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Proposaltamu/simpanData') ?>">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-file-text"></i>
                            <span class="caption-subject bold uppercase">Tambah Issue Tamu</span>
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
                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">Instansi</label>
                                          <div class="col-lg-4">
                                              <input type="text" name="txtInstansi" class="form-control" placeholder="Input Instansi">
                                          </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">Alamat</label>
                                          <div class="col-lg-4">
                                              <textarea class="form-control" name="txtAlamat" id="alamat" placeholder="Input Alamat"></textarea>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">Rencana Checkin</label>
                                      <div class="col-lg-2">
                                          <input type="date" name="txtRencanaCheckin" id="checkin" class="form-control" value="<?php echo date('d-m-Y')?>">
                                      </div>
                                      <div class="col-lg-2">
                                          <input type="time" name="txtjamcheckin" id="txtjamcheckin" required="" class="form-control" value="<?php echo date('H:i')?>">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Durasi</label>
                                          <div class="col-lg-4">
                                            <input type="text" name="txtDurasi" id="durasi" class="form-control" placeholder="Input Durasi" onkeypress="return hanyaAngka(event)" onchange="callAjax()" required="">
                                          </div>
                                    </div>
                                    <div id="idRencanaCheckout">
                                          <div class="form-group">
                                              <label class="col-lg-2 control-label">Rencana Checkout</label>
                                                <div class="col-lg-2">
                                                    <input type="date" name="txtRencanaCheckout" class="form-control" value="<?php echo date('d-m-Y')?>" readonly>
                                                </div>
                                                <div class="col-lg-2">
                                                    <input type="time" name="txtjamcheckout" id="txtjamcheckout" class="form-control" value="<?php echo date('H:i')?>" required="">
                                                </div>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                          <label class="col-lg-2 control-label">Departemen Tujuan</label>
                                              <div class="col-lg-4">
                                                  <select name="txtDept_tujuan" class="form-control select2">
                                                      <option>--Pilih--</option>
                                                     <?php foreach($getDept as $dept){?>
                                                      <option value="<?php echo $dept->ID_dept?>"><?php echo $dept->Singkatan_dept?></option>
                                                      <?php }?>
                                                  </select>
                                              </div>
                                    </div>
                                    <div class="form-group">
                                          <label class="col-lg-2 control-label">Attention</label>
                                              <div class="col-lg-4">
                                                  <input type="text" name="txtAttention" class="form-control" placeholder="Input Attention">
                                              </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Keperluan</label>
                                            <div class="col-lg-4">
                                                <textarea class="form-control" name="txtKeperluan" id="keperluan" placeholder="Input Keperluan"></textarea>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Status Tamu</label>
                                        <div class="col-lg-4">
                                          <select name="txtstatusinap" id="txtstatusinap" class="form-control">
                                            <option value="">--Pilih--</option>
                                            <option value="Inap dan Makan">Inap dan Makan</option>
                                            <option value="Makan">Makan</option>
                                            <option value="Inap">Inap</option>
                                          </select>
                                        </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
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
                                            <th>Nama Lengkap</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jabatan</th>
                                            <th>Keterangan</th>
                                          </tr>
                                       </thead>
                                        <tbody id="">
                                            <tr>
                                                <td class="text-center">
                                                    <input type="hidden" name="txtdetailid[]" class="form-control txt">
                                                    <a style="color:#fff" id="hapus" class="btn red btn-sm" ><i class="fa fa-trash"></i></a>
                                                </td>
                                                <div>
                                                <td>
                                                   <input type="text" name="txtNama[]" id="nama1" class="form-control" placeholder="Input Nama Lengkap" required>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="txtJenisKelamin[]" id="jeniskelamin1">
                                                        <option value="">--Pilih--</option>
                                                        <option value="L">Laki - Laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </select>
                                                </td>
                                                <td>
                                                   <input type="text" name="txtJabatan[]" id="Jabatan1" class="form-control" placeholder="Input Jabatan">
                                                </td>
                                                <td>
                                                   <input type="text" name="txtKeterangan[]" id="Keterangan1" class="form-control" placeholder="Input Keterangan">
                                                </td>                                               
                                          </tr>
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
                    <select class="form-control txt" name="txtJenisKelamin[]" id="jeniskelamin'+l+'">\n\
                      <option value="">--Pilih--</option>\n\
                      <option value="L">Laki - Laki</option>\n\
                      <option value="P">Perempuan</option>\n\
                    <select>\n\
                </td>\n\
                <td class="text-center">\n\
                    <input type="text" name="txtJabatan[]" id="Jabatan'+l+'" class="form-control" placeholder="Input Jabatan">\n\
                </td>\n\
                <td class="text-center">\n\
                    <input type="text" name="txtKeterangan[]" id="Keterangan'+l+'" class="form-control" placeholder="Input Keterangan">\n\
                </td>\n\
            </tr>\n\
            </tbody>');
        }
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

      // alert(checkin);
      // alert(durasi);
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
  };
</script>