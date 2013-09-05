<div class="container slider">
    <div class="row-fluid">
      <div class="span10 offset1">
        <h2 class="title">SELAMAT <br><span class="merah besar">BERBELANJA!!!</span></h2>
        <br>
        <p>
        Garuda Media memiliki banyak produk media pembelajaran yang akan sangat membantu Anda untuk menguasai teknologi   <br>
        </p>
        <!-- <a href="<?php echo base_url()?>main" class="btn btn-large btn-black tombol"> REFERAL</a>
        <a href="<?php echo base_url()?>komisi" class="btn btn-large btn-black tombol"> KOMISI</a>
        <a href="<?php echo base_url()?>banner" class="btn btn-large btn-black tombol"> BANNER</a>
        <a href="<?php echo base_url()?>pengaturan" class="btn btn-large btn-black tombol active"> PENGATURAN </a> -->
      </div>
    </div>
  </div> <!-- Tutup Container Slider-->

<div class="container content" style="margin-bottom:40px;">
<div class="row-fluid">
		<div class="span9">
			<div class='row-fluid'><ul class='thumbnails'>
		<?php
		foreach ($dataproduk as $data) {
				$hidden = array('idproduk' => $data->idproduk);
			echo form_open('transaksi/index', '', $hidden);
			echo "<li class='span3'><div class='thumbnail'>
			<img class='img-rounded' data-src='holder.js/300x200' alt='300x200' style='width: 150px; height: 100px;' src='".base_url()."assets/produk_img/".$data->photo."'/>
			<div class='caption'>
				<h4><a href='".base_url()."produk/detail/".$data->idproduk."'>".$data->nama."</a></h4>
				<p>
				<strong>Harga : </strong>Rp. ".$data->harga."<br/>
				<strong>Stok : </strong>".$data->stok."
				</p>
				<p>
				<button class='btn btn-success'>Beli</button>
				</p>
			</div>
			</div></li>";
		
			echo form_close();
		}
		?>
		</ul></div>
		</div>

</div></div>