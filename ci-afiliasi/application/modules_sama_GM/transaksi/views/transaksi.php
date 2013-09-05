<div class="container slider">
    <div class="row-fluid">
      <div class="span10 offset1">
        <h2 class="title">SELAMAT <br><span class="merah besar">BELANJA!!!</span></h2>
        <br>
        <p>
            Silakan pilih produk-produk Garudamedia, dapatkan kemudahan berbelanja dengan mendaftar di Garuda Media<br>
        </p>
        <!-- <a href="<?php echo base_url()?>main" class="btn btn-large btn-black tombol"> REFERAL</a>
        <a href="<?php echo base_url()?>komisi" class="btn btn-large btn-black tombol"> KOMISI</a>
        <a href="<?php echo base_url()?>banner" class="btn btn-large btn-black tombol"> BANNER</a>
        <a href="<?php echo base_url()?>pengaturan" class="btn btn-large btn-black tombol active"> PENGATURAN </a> -->
      </div>
    </div>
  </div> <!-- Tutup Container Slider-->

  <div class="container content" style="margin-bottom:40px;">
    <div class="row-fluid">
        <div class="span3 offset1">
          <?php
          if (empty($datapembeli)) {
            $firstname=$lastname=$address=$city=$province=$country=$postal=null;
          }
          else{
          foreach ($datapembeli as $pembeli) {
            $firstname=$pembeli->firstname;
            $lastname=$pembeli->lastname;
            $address=$pembeli->address;
            $city=$pembeli->city;
            $province=$pembeli->province;
            $country=$pembeli->country;
            $postal=$pembeli->postal;
          }
          }
            echo form_open('transaksi/do_pesan');
          ?>
          <div class="control-group">
        <label class="control-label">Atas Nama : </label>
        <div class="controls"><input type="text" name="nama_pemesan" value="<?php echo $firstname." ".$lastname; ?>"></div>
      </div>

      <div class="control-group">
        <label class="control-label">Alamat : </label>
        <div class="controls"><textarea cols="50" rows="2" name="alamat"><?php echo $address; ?></textarea></div>
      </div>
      <div class="control-group">
        <label class="control-label">Kota : </label>
        <div class="controls"><input type="text" name="kota" value="<?php echo $city; ?>"></div>
      </div>
      <div class="control-group">
        <label class="control-label">Provinsi: </label>
        <div class="controls"><input type="text" name="provinsi" value="<?php echo $province; ?>"></div>
      </div>
      <div class="control-group">
        <label class="control-label">Negara: </label>
        <div class="controls"><input type="text" name="negara" value="<?php echo $country; ?>"></div>
      </div>
      <div class="control-group">
        <label class="control-label">Postal : </label>
        <div class="controls"><input type="text" name="postal" value="<?php echo $postal; ?>"></div>
      </div>

      </div>
      <div class="span7">
       <table class="table table-condesed">
        <thead style="font-weight:900"><tr><td>ID Produk</td><td>Nama Produk</td><td>Harga</td><td>QTY</td></tr></thead>
        <tbody>

          <?php
            foreach ($dataproduk as $produk) {
              $qty_value=0;
              if ($produk->idproduk==$idproduk) {
                $qty_value=1;
              }

              echo "<tr><td style='width:15%'>".$produk->idproduk."</td><td style='width:45%;'><span class='coba'>".$produk->nama."</span></td><td style='width:20%'>".$produk->harga."</td>
                <td style='width:10%'><input type='text' name='qty[]' value=".$qty_value." /><input type='hidden' name='idproduk[]' value=".$produk->idproduk."/>
                <input type='hidden' name='harga[]' value=".$produk->harga."/></td>
                </tr>";
            }
                echo "<tr><td colspan='2'>Jasa Pengiriman :</td><td colspan='4'><ol start='1'>";
                  foreach ($jasa_kirim as $kirim_via) {echo "<li><strong>".$kirim_via->nama."</strong> <small>(biaya kirim Rp. ".$kirim_via->biaya_kirim.")</small></li>"; }
                echo "</ol></td></tr>";

                echo "<tr><td>&nbsp;</td><td>Pilih :</td><td colspan='2'><select name='jasa_kirim'>";
                  foreach ($jasa_kirim as $kirim_via) {echo "<option value='".$kirim_via->idjasa_kirim."'>".$kirim_via->nama."</option>";}
                echo "</select></td></tr>";

                echo "<tr><td colspan='2'>Bank Tujuan :</td><td colspan='2'><ol start=1>";
                  foreach ($bank_pilihan->result() as $bank) {echo "<li><strong>".$bank->namabank."</strong> a.n <strong>".$bank->atas_nama."</strong><br/> no.rekening <strong>".$bank->no_rekening."</strong></li>";} 
               echo "</ol></td></tr>";
            echo "<tr><td>&nbsp;</td><td>Pilih :</td><td colspan='2'><select name='bank_tujuan'>";
            foreach ($bank_pilihan->result() as $bank) {
              echo "<option value=".$bank->idbankacc_admin.">".$bank->namabank."</option>";
              }
            echo "</select></td></tr>";
            echo "<tr><td colspan=3>&nbsp;</td><td><button class='btn btn-success'>BELI</button></td></tr>";

            form_close();
          ?>
        </tbody>
      </table> 
      </div>

 </div>
</div>