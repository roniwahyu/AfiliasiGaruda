
		<!-- start content -->
		<div class="span5 offset7"><h3>Current Commission : </h3><h3>Rp. <?php echo (($info_komisi==null)?"0":$info_komisi); ?></h3></div>
<br/>
<legend id="info">
	<h3>View Last Pending Transaction</h3>
</legend>
<br/>
<table class="table table-striped">
	<thead>
		<tr><td>No. </td><td>Tanggal</td><td>Total(Rp.)</td><td colspan="3">Info Bank</td><td>Status</td></tr>
	</thead>
	<tbody>
		<?php
		if (is_null($info_last_withdraw)) {
			echo "<strong class='text-error'>Tidak ada permintaan Transfer komisi</strong>";
		}
		else
		{
			$i=1;
			foreach ($info_last_withdraw as $mykomisi) {
				$status=(($mykomisi->isactive==1)? "<span class='label label-success'>Sukses</span>":"<span class='label'>Pending</span>");
				echo "<tr><td>".$i."</td><td>".$mykomisi->timestamp."</td><td>".$mykomisi->total_withdraw."</td>
						<td colspan='3'><strong>".$mykomisi->namabank."</strong><br/>No. Rekening <strong>".$mykomisi->account."</strong></td>
						<td>".$status."</td>
						</tr>";
				$i++;
			}

		}

		?>
		<tr><td colspan='7' class="text-right"><h4>Sum: Rp. <?php echo $transfer_komisi_pending; ?></h4></td></tr>
	</tbody>
</table>



<legend>
	<h3>View Success Transfer</h3>
</legend>

<table class="table table-striped">
	<thead>
		<tr><td>No. </td><td>Tanggal</td><td>Total(Rp.)</td><td colspan="3">Info Bank</td><td>Status</td></tr>
	</thead>
	<tbody>
		<?php
		if (empty($log_withdraw)) {
			echo "&nbsp;";
		}
		else{
			$i=1;
			foreach ($log_withdraw as $logKomisi) {
				$status=(($logKomisi->isactive==1)? "<span class='label label-success'>Sukses</span>":"<span class='label'>Pending</span>");
				echo "<tr><td>".$i."</td><td>".$logKomisi->timestamp."</td><td>".$logKomisi->total_withdraw."</td>
						<td colspan='3'><strong>".$logKomisi->namabank."</strong><br/>No. Rekening <strong>".$logKomisi->account."</strong></td>
						<td>".$status."</td>
						</tr>";
				$i++;
			}
		}

		?>
		<tr><td colspan='7' class="text-right"><h4>Sum: Rp. <?php echo $transfer_komisi_sukses; ?></h4></td></tr>
	</tbody>
</table>
		<!-- eof content -->

