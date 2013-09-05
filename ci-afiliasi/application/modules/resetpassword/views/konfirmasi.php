	<?php 
        $page['pagetitle']="Konfirmasi";
        $this->load->view('template/header',$page); 
     ?>
  
          </div>
          </div>
        </div>
    </div>
    </div>

<div  style="background:orange;">
<div class="container">
  <div class="row">
        <div class="span12">
          <center><br>
          <h1 class="white"><?php echo $judul; ?></h1>
          <p class="lead white" style="margin-top:10px;"><?php echo $isi; ?></p>
          
          
        </center>       
        </div>  
  </div>
  <div class="row" style="background:#fff;">
    <div class="span8">
    &nbsp
    </div>
  </div>
</div> 
</div> 


	<?php $this->load->view('template/footer'); ?>
