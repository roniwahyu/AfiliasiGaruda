	<?php $this->load->view('header'); ?>
	<div class="container">
	
		<div class="row">
			<div class="span12">
				<h3>Broadcast Member Affiliate</h3>
				<p>Kirim pesan/broadcast ke member affiliate dibawah ini.</p><br>
			</div>	
		</div>
		<div class="row">
			<div class="span12">
              <form method="post" action="<?php echo base_url();?>broadcast/baru">                 
              <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th><input type="checkbox" onclick="checkAll(this)"></th>
                        <th>id</th>
                        <th>username</th>
                        <th>Email</th>
                        <th>Telp</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $i=1;
                        foreach($member_list as $user){ 
                    ?>
                    <tr>
                        <td><input type="checkbox" name="cek<?php echo $i; ?>" value="<?php echo $user->id; ?>"></td>
                        <td><?php echo $user->id; ?></td>
                        <td><?php echo $user->username; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->phone; ?></td>
                        <td><?php echo $user->status; ?></td>
                       
                    </tr>
                    <?php 
                        $i++;
                    } ?>
                    </tbody>
                </table>

                <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                        <button type="reset" class="btn">Batal</button>
                </div>
                <input type="hidden" name="jumlah" value="<?php echo $i-1; ?>">
              
            </form>
			</div>
		</div>


	</div>
	<?php $this->load->view('footer'); ?>

