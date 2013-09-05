

		<div class="container">
		  <div class="row">
		        <div class="span12">
		          <div style="margin-right:40px;">
			          <br><h2 >Dashboard</h2>
		          </div>	
		        </div>  
		  </div>
		</div> 

    <div class="container">
		<div class="row">
			<div class="span12">
				  <ul class="nav nav-tabs">
				    <li class="active"><a href="#tab1" data-toggle="tab">Track Referal</a></li>
				    <li><a href="#tab2" data-toggle="tab">Link Referal</a></li>
				    <li><a href="#tab3" data-toggle="tab">Tes Link</a></li>
				  </ul>
				  <div class="tab-content">
				    <div class="tab-pane active" id="tab1">
				      <table class="table table-striped" width="40">
							<tr>
					      		<td>No</td>
					      		<td>Tanggal</td>
					      		<td>Link Sumber</td>
					      		<td>IP Address</td>
					      		<td>Device</td>
					      		<td>Browser</td>
					      		<td>Platform</td>
					      	</tr>
				      <?php 
				      	$i=1;
				      	foreach ($track as $refdata) {
				      ?>
					      	<tr>
					      		<td><?php echo $i;?></td>
					      		<td><?php echo $refdata->tanggal; ?></td>
					      		<td><?php echo $refdata->sumber; ?></td>
					      		<td><?php echo $refdata->ipaddress; ?></td>
					      		<td><?php echo $refdata->jenis; ?></td>
					      		<td><?php echo $refdata->browser; ?></td>
					      		<td><?php echo $refdata->platform; ?></td>
					      	</tr>
				      <?php $i++; } ?>
					</table>   
					</div>

				    <div class="tab-pane" id="tab2">
				      <div class="row-fluid">
            <ul class="thumbnails">
              <li class="span4">
                <div class="thumbnail">
                  <img data-src="holder.js/300x200" alt="">
                  <div class="caption">
                    <h3>Link Referal</h3>
                    <p>Berikut ini adalah link referal anda. Silahkan copy-paste link dibawah ini.</p>
                    <form >
						<input type="text" value="<?php echo base_url();?>ref/id/<?php echo $this->session->userdata('userid');?>" readonly>
						<a href="#" class="btn btn-warning" id="btncopy" >Copy</a>
					</form>

                  </div>
                </div>
              </li>


              <li class="span4">
                <div class="thumbnail">
                  <img data-src="holder.js/300x200" alt="">
                  <div class="caption">
                    <h3>Share Link</h3>
                    <p>Bagikan link referal anda melalui social media berikut ini.</p>
                    <p><a class="btn" href="#"><i class="icon-facebook"></i> Facebook</a>
					<a class="btn" href="#"><i class="icon-twitter"></i> Twitter</a></p>
					<p><a class="btn" href="#"><i class="icon-google-plus"></i> Google+</a></p>
                  </div>
                </div>
              </li>

              <li class="span4">
                <div class="thumbnail">
                  <img data-src="holder.js/300x200" alt="">
                  <div class="caption">
                    <h3>Gunakan Template</h3>
                    <p>Gunakan template yang telah kami sediakan. Silahkan copy-paste code dari masing2 template dan letakkan di situs anda. </p>
                    <p><a href="#" class="btn btn-warning">Pilih Template</a></p>
                  </div>
                </div>
              </li>
            </ul>
          </div>



				      
			
				    </div>

				    <div class="tab-pane" id="tab3">
				      	<a href="<?php echo base_url();?>ref/id/<?php echo $this->session->userdata('userid');?>">Tes Link Referal</a>
				    </div>
				  </div>

				

				   
			</div>


			<div class="span4">

			
			</div>


		</div>
		


	</div>
	<?php $this->load->view('footer'); ?>

