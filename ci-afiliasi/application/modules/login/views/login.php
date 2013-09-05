


<div  style="background:orange;">
<div class="container">
  <div class="row">
        <div class="span12">
          <center><br>
          <h1 class="white"><?php echo ((isset($msg_title))?$msg_title:"&nbsp;"); ?></h1>
          <p class="lead white" style="margin-top:10px;"><?php echo ((isset($msg_content))?$msg_content:"&nbsp;"); ?></p>
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
					<?php echo form_open('login/signin', array('name'=>'loginform')); ?>
					<div class="controls">
						<input type="text" name="username" id="username"  value="<?php echo set_value('username');?>" placeholder="Username"/>
						<small><font color="#f7980f"><?php echo form_error('username'); ?></font></small>
					</div>

					<div class="controls">
						<input type="password" name="pwd" id="pwd"  value="<?php echo set_value('pwd');?>" placeholder="Password"/>
						<small><font color="#f7980f"><?php echo form_error('pwd'); ?></font></small>
					</div>

				<center>
					<p><button type="submit" class="btn btn-block btn-large btn-warning" style="margin-top:5px;">Login</button></p>
				</center>
        <a href="<?php echo base_url(); ?>resetpassword">Lupa Password?</a>
				
				<?php echo form_close(); ?>
    </div>
	</div>
</div>
<?php $this->load->view('template/footer');?>
