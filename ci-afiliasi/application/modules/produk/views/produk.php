<div class="container">
<div class="row">
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