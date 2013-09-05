

<!DOCTYPE HTML>
<html>
<head>
	<title>Update Member</title>
</head>
<body>
<center>
	<h1>Update Affiliate</h1>
	 <?php foreach($member_uniq as $user){ ?>
	<form method="post" action="<?php echo base_url();?>memberajax/update">
		<input type="hidden" name="id" value="<?php echo $user->id; ?>">
		Username<br>
		<input type="text" name="username" value="<?php echo $user->username; ?>"/><br>
		Password<br>
		<input type="password" name="password" value="<?php echo $user->password; ?>"/><br>
		Email<br>
		<input type="text" name="email" value="<?php echo $user->email; ?>"/><br>
		Phone<br>
		<input type="text" name="phone" value="<?php echo $user->phone; ?>"/><br>
		<input type="submit"/>		
	</form>
	 <?php } ?>
</center>
</body>
</html>