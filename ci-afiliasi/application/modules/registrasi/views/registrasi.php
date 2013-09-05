

<div  style="background:orange;">
<div class="container">
  <div class="row">
        <div class="span12">
          <center><br>
          <h1 class="white">Registrasi Member</h1>
          <p class="lead white" style="margin-top:10px;">Daftar sebagai member affiliasi GarudaMedia</p>
        </center>       
        </div>  
  </div>
  <div class="row" style="background:#fff;">
    <div class="span8">
    &nbsp
    </div>
  </div>
</div> 
</div> 

	<div class="container">
		<div class="row">
			      <div class="formku kecil">        
            <form method="post" action="<?php echo base_url();?>registrasi/baru"> 
                    <input type="hidden" name="formsubmitted" value="TRUE" />   
                                  <div class="controls">
                                    <input id="username" name="username" type="text" value="<?php echo set_value('username');?>" placeholder="Username">
                                     <small><font color="#f7980f"><?php echo form_error('username'); ?></font>
                                  </div>
                              
                                   <div class="controls">
                                      <input id="password" name="password" type="password" value="<?php echo set_value('password'); ?>" placeholder="Password">
                                      <font color="#f7980f"><?php echo form_error('password'); ?></font>
                                    </div>
                             
                                  <div class="controls">
                                    <input id="email" name="email" type="email" value="<?php echo set_value('email'); ?>" placeholder="Email">
                                    <font color="#f7980f"><?php echo form_error('email'); ?></font>
                                  </div>
                                   
                                  <div class="controls">
                                    <input id="phone" name="phone" type="text" value="<?php echo set_value('phone'); ?>" placeholder="Phone">
                                    <font color="#f7980f"><?php echo form_error('phone'); ?></font>
                                  </div>
                             
                                 <div class="controls">
                                    <?php echo $captcha ?><br>
                                    <input id="captchaku" name="captchaku" type="text" style="margin-top:5px;" placeholder="Captcha">
                                    <font color="#f7980f"><?php echo form_error('captchaku'); ?></font>
                                  </div>
                      <button type="submit" class="btn btn-large btn-block btn-success">Register</button>
				  </form>
			 
		</div>
    </div>


	</div>
	<?php $this->load->view('template/footer'); ?>

