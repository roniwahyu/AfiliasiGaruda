<div class="container">
	<div class="row">
<h3>Edit Profile</h3>
<div class="alert alert-success"><strong>Selamat Datang, <?php echo $username; ?></strong><div class='separator'></div>
<em>Anda terakhir login pada <strong><?php echo $timestamp; ?></strong></em>
</div>
<?php
			if($this->session->flashdata('message')):
				echo '<div class="alert alert-success">';
				echo '<button type="button" class="close" data-dismiss="alert">x</button>';
				echo "<p>".$this->session->flashdata('message').'</p>';
				echo '</div>';

			elseif($this->session->flashdata('message_error')):
				echo '<div class="alert alert-error">';
				echo "<button type='button' class='close' data-dismiss='alert'>x</button>";
				echo "<p>".$this->session->flashdata('message_error').'</p>';
				echo '</div>';
			endif;
		?>

<a href="<?php echo base_url(); ?>profile/changepass/">Ingin ganti password??</a>
<br/>
<?php echo form_open_multipart('profile/edit_memberinfo', array('class'=>'form-horizontal')); ?>
<input type="hidden" name="username" value="<?php echo $username?>"/>
<input type="hidden" name="password" value="<?php echo $password?>"/>
<input type="hidden" name="timestamp" value="<?php echo $timestamp?>"/>
<input type="hidden" name="userid" value="<?php echo $userid?>"/>
<input type="hidden" name="email" value="<?php echo $email?>"/>
<input type="hidden" name="photo" value="<?php echo $photo?>"/>
<label class="control-label">First name :</label>
<div class="controls"><input type="text" name="firstname" value="<?php echo $firstname; ?>"/></div>
<label class="control-label">Middle name:</label>
<div class="controls"><input type="text" name="midname" value="<?php echo $midname; ?>"/></div>
<label class="control-label">Last name:</label>
<div class="controls"><input type="text" name="lastname" value="<?php echo $lastname; ?>"/></div>
<label class="control-label">Photo Profile:</label>
<div class="controls"><img src="<?php echo base_url(); ?>assets/user_img/<?php echo $photo; ?>" width="75" height="75" class="img-polaroid"/></div>
<div class="controls"><input type='file' name="userfile" size="100"/></div>
<div class="controls"><div class="alert alert-info"><strong>*.png, *.jpg <br/>max 25KB<br/>size 450x450 px</strong></div></div>
<label class="control-label">Phone :</label>
<div class="controls"><input type="text" name="phone" value="<?php echo $phone; ?>"/></div>
<label class="control-label">Alternative Email :</label>
<div class="controls"><input type="email" name="email2" value="<?php echo $email2; ?>"/></div>
<label class="control-label">Address 1:</label>
<div class="controls"><input type="text" name="address" value="<?php echo $address; ?>"/></div>
<label class="control-label">Address 2 :</label>
<div class="controls"><input type="text" name="address2" value="<?php echo $address2; ?>"/></div>
<label class="control-label">City :</label>
<div class="controls"><input type="text" name="city" value="<?php echo $city; ?>"/></div>
<label class="control-label">Province :</label>
<div class="controls"><input type="text" name="province" value="<?php echo $province; ?>"/></div>
<label class="control-label">Postal Code :</label>
<div class="controls"><input type="text" name="postal" value="<?php echo $postal; ?>"/></div>
<label class="control-label">Country :</label>
<div class="controls"><input type="text" name="country" value="<?php echo $country; ?>"/></div>
<label class="control-label">Birth Date :</label>
<div class="controls"><input type="text" name="birthdate" value="<?php echo $birthdate; ?>"/></div>

<br/><br/>
<button type="submit" class="btn btn-primary">Simpan</button>
</form>

</div></div>
<?php
$this->load->view('template/footer');



/**EOF: **/
/**Location: **/
/**By: Ekanur**/