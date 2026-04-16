<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-file-text"></i>
                        <span class="caption-subject bold uppercase"> Fotocopy/Risograph</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('Fotocopy/save') ?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Departemen</label>
                                            <div class="col-lg-9">
                                                <select type="text" class="form-control" id="txtdept" name="txtdept">
                                                    <option value="">--Pilih--</option>
                                                    <?php foreach($getMstDepartemen as $dept){?>
                                                        <option value="<?php echo $dept->DeptID?>"><?php echo $dept->Abbr?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Nama</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="txtnama" name="txtnama" placeholder="Input Nama">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Tanggal</label>
                                            <div class="col-lg-9">
                                                <input type="date" class="form-control" id="txttanggal" name="txttanggal" placeholder="Input Tanggal" value="<?php echo date('Y-m-d')?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Mesin</label>
                                            <div class="col-lg-9">
                                                <select type="text" class="form-control" id="txtmesin" name="txtmesin" onchange="callAjax()">
                                                    <option value="">--Pilih--</option>
                                                    <?php foreach($getMstMesin as $msn){?>
                                                        <option value="<?php echo $msn->MesinID?>"><?php echo $msn->Nama_mesin?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" id="tintaid">
                                            <label class="col-lg-3 control-label">Tinta</label>
                                            <div class="col-lg-9">
                                                <select type="text" class="form-control" id="txttinta" name="txttinta" onchange="ajaxHarga()">
                                                    <option value="">--Pilih--</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Kertas</label>
                                            <div class="col-lg-6">
                                                <select type="text" class="form-control" id="txtkertas" name="txtkertas">
                                                    <option value="">--Pilih--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Side</label>
                                            <div class="col-lg-6">
                                               <select class="form-control" name="txtside" id="txtside">
                                                   <option value="1">1</option>
                                                   <option value="2">2</option>
                                               </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Harga x Jml Kertas</label>
                                            <div class="col-lg-2">
                                                <input type="text" class="form-control" id="txthargakertas" name="txthargakertas">
                                            </div>
                                            <div class="col-lg-2">
                                                <input type="text" class="form-control" id="txtjumlahkertas" name="txtjumlahkertas">
                                            </div>
                                            <div class="col-lg-2">
                                                <input type="text" class="form-control" id="txttotalperkertas" name="txttotalperkertas">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Harga x Jml side</label>
                                            <div class="col-lg-2">
                                                <input type="text" class="form-control" id="txthargaside" name="txthargaside">
                                            </div>
                                            <div class="col-lg-2">
                                                <input type="text" class="form-control" id="txtjumlahside" name="txtjumlahside">
                                            </div>
                                            <div class="col-lg-2">
                                                <input type="text" class="form-control" id="txttotalside" name="txttotalside">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Total</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="txtnama" name="txtnama" placeholder="Input Total">
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-lg-offset-4 col-lg-10">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <a class="btn default" href="javascript:history.back()">Kembali</a>
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
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>

<script type="text/javascript">
    function callAjax(){
        var mesin = $('#txtmesin').val();
        alert(mesin);

        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('Fotocopy/ajaxTinta')?>"+"/"+mesin ,
            success: function(msg){
                if(msg == ''){
                  alert('Tidak ada data');
                } 
                else{
                    $("#tintaid").html(msg);                                                     
                }
            }
        });
    }

    function ajaxHarga(){
        var tinta = $('#txttinta').val();
        alert(tinta);
    }
</script>