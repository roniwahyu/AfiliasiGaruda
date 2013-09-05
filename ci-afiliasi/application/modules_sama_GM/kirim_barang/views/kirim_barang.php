<table class="table table-striped">
	<thead><tr><td>No</td><td>Nama</td><td colspan="3">Alamat</td><td>Total Pembelian</td><td>Bank Tujuan</td><td>Jasa Pengiriman</td><td>Detail</td><td>Kirim barang</td></tr></thead>
	<tbody>
<?php
$i=1;
	foreach ($pending_transaksi as $transaksi) {
	?>
		<tr><td><?php echo $i; ?></td><td><?php echo $transaksi->nama_pembeli; ?></td>
			<td colspan="3"><?php echo $transaksi->alamat." ".$transaksi->kota." ".$transaksi->postal." ".$transaksi->negara; ?></td>
			<td>Rp. <?php echo $transaksi->total_transfer; ?></td><td><?php echo $transaksi->namabank; ?></td>
			<td><?php echo $transaksi->nama; ?></td><td><a class="btn btn-info">View</a></td>
			<td><form method="post" action="<?php echo base_url(); ?>kirim_barang/kirim">
				<button class="btn btn-info" name="kirim">Kirim</button>
				<input type="hidden" name="idpembeli" value="<?php echo $transaksi->idpembeli; ?>"/>
				<input type="hidden" name="idtransaksi" value="<?php echo $transaksi->idtransaksi; ?>"/>
			</form></td>
		</tr>
	<?php	
	$i++;
	}
?>
</tbody>
</table>