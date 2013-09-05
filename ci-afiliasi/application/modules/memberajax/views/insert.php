

<!DOCTYPE HTML>
<html>
<head>
	<title>Registrasi Member</title>
</head>
<body>
<center>
	<h1>Registrasi Affiliate</h1>
	<form method="post" action="<?php echo base_url();?>memberajax/insert_new_member">
		Username<br>
		<input type="text" name="username"/><br>
		Password<br>
		<input type="password" name="password"/><br>
		Email<br>
		<input type="text" name="email"/><br>
		Phone<br>
		<input type="text" name="phone"/><br>
		<input type="submit"/>		
	</form>
</center>
</body>
</html>