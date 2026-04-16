<?php
  if($cari == 1){?>
    <div class="form-group">
            <label class="col-lg-2 control-label">Periode</label>
            <div class="col-lg-4">
               <select class="form-control" id="periode" name="txtPeriode">
                   <option value="">--Pilih--</option>
                   <option value="1">Periode 1</option>
                   <option value="2">Periode 2</option>
               </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Bulan</label>
            <div class="col-lg-4">
               <select class="form-control" id="bulan" name="txtBulan">
                   <option value="">--Pilih--</option>
                   <option value="1">Januari</option>
                   <option value="2">Februari</option>
                   <option value="3">Maret</option>
                   <option value="4">April</option>
                   <option value="5">Mei</option>
                   <option value="6">Juni</option>
                   <option value="7">Juli</option>
                   <option value="8">Agustus</option>
                   <option value="9">September</option>
                   <option value="10">Oktober</option>
                   <option value="11">November</option>
                   <option value="12">Desember</option>
               </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Tahun</label>
            <div class="col-lg-4">
                <select class="form-control" name="txttahun" id="tahun">
                    <?php for($i=date('Y')-1;$i<=(date('Y')+1);$i++){
                        if($i==date('Y')){ ?>
                        <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                        <?php }else{ ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php }} ?>
                </select>
            </div>
        </div>
    <?php }else if($cari == 2){?>
        <div class="form-group">
            <label class="col-lg-2 control-label">Periode</label>
            <div class="col-lg-4">
               <select class="form-control" id="periode" name="txtPeriode">
                   <option value="0">--Pilih--</option>
                   <option value="1">Periode 1</option>
                   <option value="2">Periode 2</option>
               </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Bulan</label>
            <div class="col-lg-4">
               <select class="form-control" id="bulan" name="txtBulan">
                   <option value="">--Pilih--</option>
                   <option value="1">Januari</option>
                   <option value="2">Februari</option>
                   <option value="3">Maret</option>
                   <option value="4">April</option>
                   <option value="5">Mei</option>
                   <option value="6">Juni</option>
                   <option value="7">Juli</option>
                   <option value="8">Agustus</option>
                   <option value="9">September</option>
                   <option value="10">Oktober</option>
                   <option value="11">November</option>
                   <option value="12">Desember</option>
               </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Tahun</label>
            <div class="col-lg-4">
                <select class="form-control" name="txttahun" id="tahun">
                    <?php for($i=date('Y')-1;$i<=(date('Y')+1);$i++){
                        if($i==date('Y')){ ?>
                        <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                        <?php }else{ ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php }} ?>
                </select>
            </div>
        </div>
    <?php }else{?>
        <div class="form-group">
            <label class="col-lg-2 control-label">Tgl Awal : </label>
            <div class="col-lg-4">
                <input type="date" name="txtTanggalAwal" id="tanggalAwal" class="form-control" value="<?php echo date('Y-m-d')?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Tgl Akhir : </label>
            <div class="col-lg-4">
                <input type="date" name="txtTanggalAkhir" id="tanggalAkhir" class="form-control" value="<?php echo date('Y-m-d')?>">
            </div>
        </div>
    <?php }
?>

<div class="form-group">
  <label class="col-lg-2 control-label"></label>
        <div class="col-lg-4">
            <a class="btn btn-sm green-meadow" name="search" onclick="callAjax()">
                <i class="fa fa-search"></i>
                Search
            </a>
            <a href="<?php echo base_url('RekapPembayaran/rekapTransaksi')?>" class="btn btn-sm btn-danger">
                <i class="fa fa-refresh"></i>
                Refresh
            </a>
        </div>
</div>

<script type="text/javascript">
    function callAjax(){
      var cari      = $("#cari").val();
        var tanggalawal     = $("#tanggalAwal").val();
        var tanggalakhir    = $("#tanggalAkhir").val();
        var suplier         = $("#suplier").val();
        var periode         = $("#periode").val();
        var bulan           = $("#bulan").val();
        var tahun           = $("#tahun").val();
        var kategori        = $("#kategori").val();

        // alert(tahun);
        if(cari == 1){
                // alert(periode);
            $.ajax({
                type: "POST",
                dataType :"html",
                url : "<?php echo base_url('RekapPembayaran/ajaxRekapPerPeriode')?>"+"/"+periode+"/"+bulan+"/"+tahun,
                success: function(msg){
                    if(msg == ''){
                        alert('Tidak Ada Data');
                    }else{
                        $("#tbllist").html(msg);
                    }
                }
            });
        }else if(cari == 2){
            $.ajax({
                type: "POST",
                dataType :"html",
                url : "<?php echo base_url('RekapPembayaran/ajaxRekapPerSuplier')?>"+"/"+periode+"/"+bulan+"/"+tahun,
                success: function(msg){
                    if(msg == ''){
                        alert('Tidak Ada Data');
                    }else{
                        $("#tbllist").html(msg);
                    }
                }
            });
        }else{
            $.ajax({
                type: "POST",
                dataType :"html",
                url : "<?php echo base_url('RekapPembayaran/ajaxRekapPerhari')?>"+"/"+tanggalawal+"/"+tanggalakhir,
                success: function(msg){
                    if(msg == ''){
                        alert('Tidak Ada Data');
                    }else{
                        $("#tbllist").html(msg);
                    }
                }
            });
        }
    }

    // function ajaxPeriode(){
    //     var period = $('#periode').val();

    //     alert(period);
    //     $.ajax({
    //         type: "POST",
    //         dataType :"html",
    //         url : "<?php //echo base_url('RekapPembayaran/ajaxDataPerPeriode')?>"+"/"+period,
    //         success: function(msg){
    //             if(msg == ''){
    //                 alert('Tidak Ada Data');
    //             }else{
    //                 $('$tbllist').html(msg);
    //             }
    //         }
    //     });
    // };
</script>