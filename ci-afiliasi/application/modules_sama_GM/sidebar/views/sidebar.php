<br/>
  <div class="span3" style="background-color:#f2f2f2;">
			<ul class="nav nav-list">

				
				<li><a href="<?php echo base_url(); ?>pengaturan" >
                  		<br><img style="width: 95%;" src="<?php 
                      echo (file_exists(FCPATH."assets/user_img/".$photo))?base_url()."assets/user_img/".$photo:base_url()."assets/user_img/default.jpg"; 
                      ?>" class="img-polaroid"/>
              		</a>
              	</li>
              	
              	<?php if($firstname==NULL||$firstname==''){
              			echo "<li><h4>".$username."</h4></li>";}
              		else{
              			echo "<li><h4>".$firstname." ".$lastname."</h4></li>";
              		}

              	?>
              	<li><?php echo $country; ?></li>
              	<li><?php echo $email; ?></li><br>
              	<!-- <li>&nbsp;</li>
				<li class="nav-header">Report Affiliate</li>
				<li><a href="<?php echo base_url();?>main">Affiliate</a></li>
				<li><a href="<?php echo base_url();?>main">Affiliate Link</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url();?>main">FAQ</a></li>
				<li><a href="<?php echo base_url();?>main">Help</a></li> -->
			</ul>
		</div>