<?php foreach($getDataItem as $get){?>
<tr>
                                                                    <th class="text-center" rowspan="2">
                                                                        <a id="hapus" class="btn btn-md"><i class="fa fa-trash"></i></a>
                                                                    </th>
                                                                    <th class="text-center">Nama Item</th>
                                                                    <th class="text-center">Kode Item</th>
                                                                    <th class="text-center">Kategori</th>
                                                                    <th class="text-center">Satuan</th>
                                                                    <th class="text-center">Harga</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody id="idKode">
                                                              <tr>
                                                                <td class="text-center">
                                                                    <input type="hidden" name="txtdetailid[]" class="form-control txt">
                                                                    <a style="color:#fff" id="hapus" class="btn red btn-sm" ><i class="fa fa-trash"></i></a>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="txtNamaItem" id="itemid" onchange="callAjax()">
                                                                        <option>-- Pilih --</option>
                                                                            <?php foreach($dataItem as $itm){?>
                                                                              <option value="<?php echo $itm->itemID?>"><?php echo $itm->nama_item?></option>
                                                                            <?php } ?>
                                                                    </select>
                                                                </td>
                                                                <div id="idKode">
                                                                    <td>
                                                                       <input type="text" name="txtKodeItem[]" id="kodeitem" class="form-control">
                                                                    </td>
                                                                </div>
                                                                    <td>
                                                                        <select class="form-control" name="txtKategori[]" id="kategoriID">
                                                                        <option>-- Pilih --</option>
                                                                            <?php foreach($dataKategori as $ktg){?>
                                                                        <option value="<?php echo $ktg->kategoriID?>"><?php echo $ktg->nama_kategori?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                                    </td>
                                                                    <td>
                                                                       <select class="form-control" name="txtNamaItem[]" id="satuanID">
                                                                        <option>-- Pilih --</option>
                                                                            <?php foreach($dataSatuan as $stn){?>
                                                                        <option value="<?php echo $stn->satuanID?>"><?php echo $stn->abbr?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                                    </td>
                                                                <td>
                                                                   <input type="text" name="txtHarga" id="harga" class="form-control" placeholder="Harga/ satuan" onkeypress="return hanyaAngka(event)">
                                                                </td>                                                
                                                            </tr>
<?php }?>