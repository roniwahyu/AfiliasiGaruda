<!DOCTYPE html/>
<html lang="en">
<head>
	<title>
		Garuda Media Affiliate Login
	</title>
</head>
<body>
	
<?php echo form_open('index.php/dologin/signin', array('name'=>'loginform', )); ?>
<label>Username:</label><input type="text" name="username"/><br/>
<label>Password:</label><input type="password" name="pwd"/><br/><br/>
	<?php echo form_submit('sent', 'Login'); ?>
<?php echo form_close(); ?>

<label>Butuh akun? <a href="">Klik disini</a> | <a href="">Lupa akun??</a></label>
<br/>
<?php if(isset($judul)&&isset($isi))
			{
				echo "$judul";
				echo "$isi";
			}
			else
			{
				echo "&nbsp";
			}
	?>
</body>
</html>

		<?php




/**EOF: **/
/**Location: **/
/**By: Ekanur**/