<table class="table table-striped">
	<thead><tr><td>No</td><td>Nama</td><td>Tanggal</td><td>Email 1</td><td>Email 2</td><td>Bank Tujuan</td><td>No. Rekening</td><td>Total Penarikan</td><td>Transfer</td></tr></thead>
	<tbody>
<?php
$i=1;
	foreach ($pending_transfer_komisi as $transfer_komisi) {
	?>
		<tr><td><?php echo $i; ?></td><td><?php echo $transfer_komisi->firstname." ".$transfer_komisi->lastname; ?></td>
			<td><?php echo $transfer_komisi->timestamp; ?></td><td><?php echo $transfer_komisi->email; ?></td>
			<td><?php echo $transfer_komisi->email2; ?></td>
			<td><strong><?php echo $transfer_komisi->namabank; ?></strong></td>
			<td><?php echo $transfer_komisi->account; ?></td>
			<td><strong>Rp. <?php echo $transfer_komisi->total_withdraw; ?></strong></td>
			<td>
				<form action="<?php echo base_url()?>transfer_komisi/kirim" method="post">
					<input type="hidden" name="id_withdraw" value="<?php echo $transfer_komisi->id_withdraw; ?>" />
					<input type="submit"name="kirim" value="Kirim Komisi" />
				</form>
			</td>
		</tr>
	<?php	
	$i++;
	}
?>
</tbody>
</table>