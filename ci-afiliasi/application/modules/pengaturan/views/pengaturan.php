
<br>
  

  <div class="container">
    <div class="row">


  <?php Modules::load('sidebar/sidebar')->index(); ?>
    

    <div class="span9">
      <div class="row">
       <?php foreach ($data as $memberdata) {?>
      <?php echo form_open_multipart('pengaturan/simpanprofil', array('name'=>'pengaturanform')); ?>
      <input type="hidden" name="userid" value="<?php echo $memberdata->userid?>"/>
      <input type="hidden" name="photo" value="<?php echo $memberdata->photo;?>"/>
         <div class="span3">
          <fieldset>
              <legend>Data Pengguna</legend><br>
            <p>Nama Depan<br>
            <input type="text" name="firstname" value="<?php echo $memberdata->firstname?>">
            <br>Nama Tengah<br>
            <input type="text" name="midname" value="<?php echo $memberdata->midname?>">
            <br>Nama Belakang<br>
            <input type="text" name="lastname" value="<?php echo $memberdata->lastname?>">
              <br>Phone :<br>         
            <input type="text" name="phone" value="<?php echo $memberdata->phone?>">
            <small><font color="#f7980f"><?php echo form_error('phone'); ?></font></small>
            </fieldset>  
             <fieldset>
              <legend>Data Rekening</legend><br>
            <p>Pilih Bank<br>
            <select name="account">
                <?php
                  $result=$this->pengaturan_model
                ?>
                <option></option>
            </select>
          
          </fieldset>
      </div>
      <div class="span3">
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
          
            </div>

      <div class="span3">
        <fieldset>
              <legend>Profil Pengguna</legend><br>
              <p>Avatar<br>
              <img src="<?php echo base_url(); ?>assets/user_img/<?php echo $memberdata->photo; ?>" width="70" height="70" class="img-polaroid"/>
                <input type='file' name="userfile" size="100"/>
              </p>  
            <p>Email :<br>
                <input type="email" name="email" value="<?php echo $memberdata->email?>" readonly></p>
            Email Alternatif:<br>
            <input type="text" name="email2" value="<?php echo $memberdata->email2?>">
            <small><font color="#f7980f"><?php echo form_error('email2'); ?></font></small>
        </fieldset>
      </div>

        </div>



    <?php } ?>
            <center><p><button type="submit" class="btn btn-large btn-warning" style="margin-top:5px;">Simpan Profil</button></p></center>
        <?php echo form_close(); ?>
          
      
    </div>
  </div>
  </div>

  <?php $this->load->view('footer'); ?>