


 <div class="container">
      <div class="row">
            <div class="span12">
              <div style="margin-right:40px;">
                <br><h2 >Ubah Password</h2>
              </div>  
            </div>  
      </div>
    </div> 
  

<div class="container">
	<div class="row">
		<div class="span4"> 
     		<?php echo form_open('resetpassword/set', array('name'=>'resetform')); ?>
          <input type="hidden" name="email" value="<?php echo $this->session->userdata('email');?>">
          <input type="hidden" name="useoldpass" value="TRUE">
					 <fieldset>
              <legend>Data Pengguna</legend><br>
          <?php
        if($this->session->flashdata('message')){
            echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>';
            echo "<b>Sukses!</b>".$this->session->flashdata('message')."";
            echo '</div>';
            }
        ?>
      
          <div class="controls">
						<input type="password" name="oldpassword" id="oldpassword" placeholder="Password Lama" value="<?php echo set_value('oldpassword');?>" />
            <small><font color="#f7980f"><?php echo form_error('oldpassword'); ?></font></small>
            <input type="password" name="password" id="password" placeholder="Password Baru" value="<?php echo set_value('password');?>" />
            <small><font color="#f7980f"><?php echo form_error('password'); ?></font></small>
            <input type="password" name="repassword" id="repassword" placeholder="Ulangi Password Baru" value="<?php echo set_value('repassword');?>" />
						<small><font color="#f7980f"><?php echo form_error('repassword'); ?></font></small>
					</div>
           <fieldset>

					<p><button type="submit" class="btn btn-large btn-warning" style="margin-top:5px;">Reset Password</button></p>
				
				
				<?php echo form_close(); ?>
    </div>
	</div>
</div>
<?php $this->load->view('template/footer');?>
