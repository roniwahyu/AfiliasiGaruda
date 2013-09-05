<!DOCTYPE HTML>
<html>
<head>
	<title>Data Member Affiliasi</title>
	<script type="text/javascript">
		function show_confirm(act,gotoid){
			if(act=="edit"){
				var r=confirm("Anda ingin edit data? ");
				if (r==true){
					window.location="<?php echo base_url();?>member/update_form/"+gotoid;
				}
			}
			else{	
				var r=confirm("Anda ingin hapus data?");
				if (r==true){
					window.location="<?php echo base_url();?>member/delete/"+gotoid;
				}
			}
			
		}
	</script>
</head>
<body>
	<h1>Data Member</h1>
	<table border="1">
		<thead>
		<tr>
			<th>id</th>
			<th>username</th>
			<th>Email</th>
			<th>Alamat</th>
			<th>Status</th>
		</tr>
		</thead>
		<tbody>
         <?php foreach($member_list as $user){ ?>
        <tr>
			<td><?php echo $user->id; ?></td>
			<td><?php echo $user->username; ?></td>
			<td><?php echo $user->email; ?></td>
			<td><?php echo $user->phone; ?></td>
			<td><?php echo $user->status; ?></td>
			<td><a href="#" onClick="show_confirm('edit',<?php echo $user->id;?>)">Edit</a></td>
			<td><a href="#" onClick="show_confirm('delete',<?php echo $user->id;?>)">Hapus</a></td>
		</tr>
        <?php } ?>
		</tbody>
	</table>
	<a href="<?php echo base_url();?>member/add_form">Insert New User</a>
</body>
</html>