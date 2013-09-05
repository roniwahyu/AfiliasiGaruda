<div class="container">
<div class="row">
		<?php //Modules::load('sidebar/sidebar')->index(); ?>
		<div class="span12"><br/>
			<div class="alert alert-success"><strong>Selamat Berbelanja, <?php echo $firstname." ".$lastname; ?></strong><div class='separator'></div>
				<em>Anda terakhir login pada <strong><?php echo $timestamp; ?></strong></em>
			</div>

					  <!--  -->
				  <?php Modules::load('produk/produk')->index(); ?>
		</div>
	</div>
	</div>
<?php
$this->load->view('template/footer');
/**EOF: **/
/**Location: **/
/**By: Ekanur**/