	<?php 
        $page['pagetitle']="Reset Password";
        $this->load->view('template/header',$page); 
     ?>
  
          </div>
          </div>
        </div>
    </div>
    </div>


<div  style="background:orange;">
<div class="container">
  <div class="row">
        <div class="span12">
          <center><br>
          <h1 class="white"><?php echo $msg_title;?></h1>
          <p class="lead white" style="margin-top:10px;"><?php echo $msg_content;?></p>
          
          
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
					<?php echo form_open('resetpassword/set', array('name'=>'resetform')); ?>
          <input type="hidden" name="email" value="<?php echo $email;?>">
					<div class="controls">
						<input type="password" name="password" id="password" placeholder="Password Baru" value="<?php echo set_value('password');?>" />
            <input type="password" name="repassword" id="repassword" placeholder="Ulangi Password" value="<?php echo set_value('repassword');?>" />
						<small><font color="#f7980f"><?php echo form_error('repassword'); ?></font></small>
					</div>

				<center>
					<p><button type="submit" class="btn btn-block btn-large btn-warning" style="margin-top:5px;">Reset Password</button></p>
				</center>
				
				<?php echo form_close(); ?>
    </div>
	</div>
</div>
<?php $this->load->view('template/footer');?>
