	<?php 
        $page['pagetitle']="Tidak Ditemukan";
        $this->load->view('template/header',$page); 
     ?>
     <ul class="nav pull-right">
                  <li><a href="<?php echo base_url(); ?>home">Home</a></li>
                  <li><a href="<?php echo base_url(); ?>registrasi">Registrasi</a></li>
                  <li><a href="<?php echo base_url(); ?>ketentuan">Ketentuan</a></li>
                  <li><a href="<?php echo base_url(); ?>faq">FAQ</a></li>
                  <li><a href="<?php echo base_url(); ?>login">Login</a></li>
            </ul>
          </div>
          </div>
        </div>
    </div>



<div  style="background:orange;">
<!--<div class="container" style="background:url(<?php echo base_url(); ?>assets/img/garudasip.png) no-repeat left top;height:350px;">-->
<div class="container" style="height:350px;">
	<div class="row">
				<div class="span12">
					<center><br><br><br><br><br><br>
          <!--<img src="<?php echo base_url(); ?>assets/img/garuda.png"><br><br>-->
          <h1 class="white">Maaf, Tidak Ditemukan</h1>
					<p class="lead white" style="font-size:18px;">Halaman yang anda tuju tidak dapat ditemukan atau telah terhapus dari server kami. </p>
          <p><a class="btn btn-large btn-info" href="<?php echo base_url(); ?>"><i class="icon-home icon-white"></i>&nbsp Kembali ke Home</a>
          
          <br>
        </center>				
				</div>	
	</div>
</div> 
</div> 

<?php $this->load->view('template/footer');?>
