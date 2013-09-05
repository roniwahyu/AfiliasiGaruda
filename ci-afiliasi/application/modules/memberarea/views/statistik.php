	<?php 
		$page['pagetitle']="Statistik";
        $this->load->view('template/header',$page); 
	?>
	<ul class="nav pull-right">
			      <li ><a href="<?php echo base_url(); ?>memberarea">Dashboard</a></li>
			      <li class="active"><a href="<?php echo base_url(); ?>memberarea/statistik">Statistik</a></li>
			      <li ><a href="<?php echo base_url(); ?>memberarea/promo">Promo</a></li>
                  <li ><a href="<?php echo base_url(); ?>memberarea/banner">Banner</a></li>
			      <li>
						<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
						    <?php echo $this->session->userdata('username');?> &nbsp
						    <span class="caret whitecaret"></span>
						  </a>
						  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						      <li ><a href="<?php echo base_url(); ?>memberarea/pengaturan">Pengaturan</a></li>
						      <li ><a href="<?php echo base_url(); ?>memberarea/ubahpassword">Ubah Password</a></li>
						      <li ><a href="<?php echo base_url(); ?>memberarea/logout">Log Out</a></li>
						  </ul>

                  </li>	
		    </ul>
		  </div>
		  </div>
		</div>
	</div>
	</div>

	<div class="container">
	
		<div class="row">
			<div class="span12">
				<br><br><br><h3> Statistik Referal</h3>
				<p>Statistik data referal.</p><br>
			</div>	
		</div>
		<div class="row">
			<div class="span12">
              <ul class="nav nav-tabs">
					  <li class="active">
					    <a href="#">Data Referal</a>
					  </li>
			
				

				</ul>
  
			</div>
		</div>


	</div>
	<?php $this->load->view('footer'); ?>

