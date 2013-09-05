	<?php 
		$page['title']="Pengaturan";
        $this->load->view('template/header',$page); 
	?>
	<ul class="nav pull-right">
			      <li ><a href="<?php echo base_url(); ?>memberarea">Dashboard</a></li>
			      <li ><a href="<?php echo base_url(); ?>memberarea/statistik">Statistik</a></li>
			      <li ><a href="<?php echo base_url(); ?>memberarea/promo">Promo</a></li>
                  <li ><a href="<?php echo base_url(); ?>memberarea/banner">Banner</a></li>
			      <li class="active">
						<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
						    <?php echo $this->session->userdata('username');?> &nbsp
						    <span class="caret whitecaret"></span>
						  </a>
						  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						      <li ><a href="<?php echo base_url(); ?>memberarea/pengaturan">Pengaturan</a></li>
						      <li ><a href="<?php echo base_url(); ?>memberarea/ubahpassword">Ubah Password</a></li>
						      <li class="divider"></li>
						      <li ><a href="<?php echo base_url(); ?>memberarea/logout">Log Out</a></li>
						  </ul>

                  </li>	
		    </ul>
		  </div>
		  </div>
		</div>
	</div>
	</div>

	<?php Modules::load('pengaturan/pengaturan/')->index(); ?>
		<!--<div class="container">
		  <div class="row">
		        <div class="span12">
		          <div style="margin-right:40px;">
			          <br><h2 >Pengaturan</h2>
		          </div>	
		        </div>  
		  </div>
		</div> 
	

	<div class="container">
		<div class="row">
			<?php foreach ($data as $memberdata) {?>
			<?php echo form_open_multipart('memberarea/simpanprofil', array('name'=>'pengaturanform')); ?>
			<input type="hidden" name="userid" value="<?php echo $memberdata->id?>"/>
			<input type="hidden" name="photo" value="<?php echo $memberdata->foto;?>"/>
			<div class="span4">
					<fieldset>
    					<legend>Data Pengguna</legend><br>
						<p>Nama Lengkap :<br>
						<input type="text" name="namalengkap" value="<?php echo $memberdata->namalengkap?>"></p>
						<p>Alamat :<br>
						<input type="text" name="alamat" value="<?php echo $memberdata->alamat?>"></p>
						<p>Kota :<br>
						<input type="text" name="kota" value="<?php echo $memberdata->kota?>"></p>
						Phone :<br>      		
						<input type="text" name="phone" value="<?php echo $memberdata->phone?>">
						<small><font color="#f7980f"><?php echo form_error('phone'); ?></font></small>
					</fieldset>
			</div>
			<div class="span4">
				<fieldset>
    					<legend>Profil Pengguna</legend><br>
    					<p>Avatar<br>
    					<img src="<?php echo base_url(); ?>assets/user_img/<?php echo $memberdata->foto; ?>" width="70" height="70" class="img-polaroid"/>
    						<input type='file' name="userfile" size="100"/>
    					</p>	
						<p>Email :<br>
			      		<input type="email" name="email" value="<?php echo $memberdata->email?>" readonly></p>
						Email Alternatif:<br>
						<input type="text" name="emailalternatif" value="<?php echo $memberdata->emailalternatif?>">
						<small><font color="#f7980f"><?php echo form_error('emailalternatif'); ?></font></small>
				</fieldset>
			</div>
			<div class="span4">
					<fieldset>
    					<legend>Data Rekening</legend><br>
						<p>Bank :<br>
						<input type="text" name="bank" value="<?php echo $memberdata->bank?>"></p>
						Nomor Rekening:<br>
						<input type="text" name="nomorrekening" value="<?php echo $memberdata->nomorrekening?>">
						<small><font color="#f7980f"><?php echo form_error('nomorrekening'); ?></font></small>
					</fieldset>
			</div>
		<?php } ?>
				<div class="span12">
					<center>
						<p><button type="submit" class="btn btn-large btn-warning" style="margin-top:5px;">Simpan Profil</button></p>
					</center>
				</div>			
        <?php echo form_close(); ?>
					
			</div>
		</div>


	</div>-->
	<?php $this->load->view('footer'); ?>

