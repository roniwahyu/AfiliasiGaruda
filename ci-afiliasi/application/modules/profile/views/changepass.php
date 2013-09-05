<div class="container">
<div class="row">
		<?php Modules::load('sidebar/sidebar')->index(); ?>
<h3>Ubah Password</h3>
<div class="alert alerf-info"><strong>Hati-hati!</strong>Setelah mengubah password silakan login menggunakan password baru.</div>
<br/>
 	
 	 <?php
        if($this->session->flashdata('message')){
            echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>';
            echo "<b>Sukses!</b>".$this->session->flashdata('message')."";
            echo '</div>';
            }
        ?>


	<?php echo form_open('profile/do_changepass', array('class'=>'form-horizontal')); ?>
		<input type="hidden" name="oldpass" value="<?php echo $oldpass?>"/>

		<label class="control-label">Password Lama :</label>
		<div class="controls"><input type="password" name="oldpassword" value="<?php echo set_value('oldpassword');?>"/>
		<small><font color="#f7980f"><?php echo form_error('oldpassword'); ?></font></small></div>
		<label class="control-label">Password Baru:</label>
		<div class="controls"><input type="password" name="password" value="<?php echo set_value('password');?>"/>
		<small><font color="#f7980f"><?php echo form_error('password'); ?></font></small></div>
		<label class="control-label">Ulangi Password Baru:</label>
		<div class="controls"><input type="password" name="repassword" value="<?php echo set_value('repassword');?>"/>
		<small><font color="#f7980f"><?php echo form_error('repassword'); ?></font></small></div>

<button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
	</div>
<?php
$this->load->view('template/footer');



/**EOF: **/
/**Location: **/
/**By: Ekanur**/