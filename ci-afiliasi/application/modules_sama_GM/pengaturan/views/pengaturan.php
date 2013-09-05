
 <div class="container slider">
    <div class="row-fluid">
      <div class="span10 offset1">
        <h2 class="title">PENGATURAN <br><span class="merah besar">AFFILIASI</span></h2>
        <br>
        <p>
            GarudaMedia memberi kesempatan kepada kamu untuk mendapatkan tambahan penghasilan dengan menjadi affiliasi. Dapatkan komisi hingga 20% setiap pembelian produk GarudaMedia melalui link affiliasimu!<br>
        </p>
        <a href="<?php echo base_url()?>main" class="btn btn-large btn-black tombol"> REFERAL</a>
        <a href="<?php echo base_url()?>komisi" class="btn btn-large btn-black tombol"> KOMISI</a>
        <a href="<?php echo base_url()?>banner" class="btn btn-large btn-black tombol"> BANNER</a>
        <a href="<?php echo base_url()?>pengaturan" class="btn btn-large btn-black tombol active"> PENGATURAN </a>
      </div>
    </div>
  </div> <!-- Tutup Container Slider-->

  <div class="container content" style="margin-bottom:40px;">
    <div class="row-fluid">
       <?php Modules::load('sidebar/sidebar')->index(); ?>
     
      <div class="span8">
       <?php foreach ($data as $memberdata) {?>
      <?php echo form_open_multipart('pengaturan/simpanprofil', array('name'=>'pengaturanform')); ?>
      <input type="hidden" name="userid" value="<?php echo $memberdata->userid?>"/>
      <input type="hidden" name="photo" value="<?php echo (file_exists(FCPATH."assets/user_img/".$memberdata->photo))?$memberdata->photo:"default.jpg"; ?>"/>
          <fieldset>
              <legend>Data Pengguna</legend><br>
            <p>Nama Depan<br>
            <input type="text" name="firstname" value="<?php echo $memberdata->firstname;?>">
            <br>Nama Tengah<br>
            <input type="text" name="midname" value="<?php echo $memberdata->midname;?>">
            <br>Nama Belakang<br>
            <input type="text" name="lastname" value="<?php echo $memberdata->lastname;?>">
            <br>Phone :<br>         
            <input type="text" name="phone" value="<?php echo $memberdata->phone;?>">
            <small><font color="#f7980f"><?php echo form_error('phone'); ?></font></small>
            </fieldset>  
             
            <fieldset id="databank">
              <legend>Data Rekening</legend><br>
            <p>Pilih Bank<br>
            <?php  
            if (!empty($rekening)) {
          
              foreach ($rekening as $datarekening) { ?>
            <select name="idbank" >
                <?php
                  foreach ($bank as $databank) {?>
                      <option value="<?php echo $databank->idbank;?>" 
                        <?php if($databank->idbank==$datarekening->idbank){ echo "selected";} ?>
                      ><?php echo $databank->namabank;?></option>
                    <?php
                    }
                ?>
            </select>
            <br>Nomor Rekening<br>
            <input type="text" name="account" value="<?php echo $datarekening->account;?>">
            
          
          </fieldset>
          <?php  }
          if ($total_akunbank==1) {
          echo "<a href='pengaturan/akun_bank' data-target='#bankModal' id='button' role='button' class='btn btn-info' data-toggle='modal'>Tambah Akun Bank</a>";
           }
                    
        }
        else
        {?>
      <select name="idbank_baru">
                <?php
                  foreach ($bank as $databank) {
                    ?>
                      <option value="<?php echo $databank->idbank;?>" >
                        <?php echo $databank->namabank;?></option>
                    <?php
                  }
                  

                ?>
            </select>
            <br>Nomor Rekening<br>
            <input type="text" name="account_baru" value="">
      <?php
        }?>
          <fieldset>
              <legend>Alamat Pengguna</legend>
              <br>Alamat :<br>
            <input type="text" name="address" value="<?php echo $memberdata->address?>">
            <br>Kota :<br>
            <input type="text" name="city" value="<?php echo $memberdata->city?>">
            <br>Provinsi :<br>
            <input type="text" name="province" value="<?php echo $memberdata->province?>">
            <br>Kode Pos :<br>
            <input type="text" name="postal" value="<?php echo $memberdata->postal?>">
            <br>Negara :<br>
            <input type="text" name="country" value="<?php echo $memberdata->country?>">
          
           <fieldset>
              <legend>Profil Pengguna</legend><br>
              <p>Avatar<br>
              <img src="<?php 
                      echo (file_exists(FCPATH."assets/user_img/".$memberdata->photo))?base_url()."assets/user_img/".$memberdata->photo:base_url()."assets/user_img/default.jpg"; 
                      ?>" width="70" height="70" class="img-polaroid"/>
                <input type='file' name="userfile" size="100"/>
                <div class="alert alerf-info">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  Ukuran foto Maksimal 500kb
                </div>

              </p>  
            <p>Email :<br>
                <input type="email" name="email" value="<?php echo $memberdata->email?>" readonly></p>
            Email Alternatif:<br>
            <input type="text" name="email2" value="<?php echo $memberdata->email2?>">
            <small><font color="#f7980f"><?php echo form_error('email2'); ?></font></small>
        </fieldset>
      <fieldset>



    <?php } ?>
            <p><button type="submit" class="btn btn-warning" style="margin-top:5px;">Simpan Profil</button></p>
        <?php echo form_close(); ?>



   </div>
  </div> <!-- Tutup Container Content-->

  <!-- Modal start -->
<div id='bankModal' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
  <div class='modal-header'>
    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>x</button>
    <h3 id='myModalLabel'>Tambah Akun Bank</h3>
  </div>
     <div class='modal-body'>
     </div>
 <div class='modal-footer'>
    <button class='btn' data-dismiss='modal' aria-hidden='true'>Close</button>
  </div>
</div>

<!-- EOF modal -->
  </body>
</html>
