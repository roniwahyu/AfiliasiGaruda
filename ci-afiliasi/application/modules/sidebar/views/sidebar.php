<br/>
<div class="span3" style="background-color:#fbfbfb;">
			<ul class="nav nav-list">

				<li style='padding:10px 0px'><STRONG><?php echo $firstname." ".$lastname; ?></STRONG></li>
				<li><a href="<?php echo base_url(); ?>profile" class="thumbnail" style="margin:10px;">
                  		<img data-src="holder.js/260x180" alt="260x180" style="width: 120px; height: 120px;" src="<?php echo base_url(); ?>assets/user_img/<?php echo $photo; ?>"/>
              		</a>
              	</li>

              	<li><strong><?php echo $country; ?></strong></li>
              	<li><strong><?php echo $email; ?></strong></li>
              	<li>&nbsp;</li>
				<li class="nav-header">Report Affiliate</li>
				<li><a href="<?php echo base_url();?>MyAffiliate">Affiliate</a></li>
				<li><a href="<?php echo base_url();?>AffiliateLink">Affiliate Link</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url();?>faq">FAQ</a></li>
				<li><a href="<?php echo base_url();?>faq">Help</a></li>
			</ul>
		</div>