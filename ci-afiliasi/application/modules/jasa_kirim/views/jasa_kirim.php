<?php Modules::load('sidebar/sidebar')->index(); ?>
<div class="span9">
<h3>Ubah Password</h3>
<div class="alert alerf-info"><strong>Hati-hati!!</strong>Setelah mengubah password silakan login menggunakan password baru.</div>

<?php
			if($this->session->flashdata('message')):
				echo '<div class="alert alert-error">';
				echo '<button type="button" class="close" data-dismiss="alert">x</button>';
				echo "<p>".$this->session->flashdata('message').'</p>';
				echo '</div>';

			elseif($this->session->flashdata('message_success')):
				echo '<div class="alert alert-success">';
				echo "<button type='button' class='close' data-dismiss='alert'>x</button>";
				echo "<p>".$this->session->flashdata('message_success').'</p>';
				echo '</div>';
			endif;
		?>


<?php echo form_open('profile/do_changepass', array('class'=>'form-horizontal')); ?>
<input type="hidden" name="oldpass" value="<?php echo $oldpass?>"/>

<label class="control-label">Password Lama :</label>
<div class="controls"><input type="password" name="repeat_oldpass" value=""/></div>
<label class="control-label">Password Baru:</label>
<div class="controls"><input type="password" name="new_pass" value=""/></div>
<label class="control-label">Ulangi Password Baru:</label>
<div class="controls"><input type="password" name="repeat_pass" value=""/></div>

<button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
<?php
$this->load->view('template/footer');



/**EOF: **/
/**Location: **/
/**By: Ekanur**/