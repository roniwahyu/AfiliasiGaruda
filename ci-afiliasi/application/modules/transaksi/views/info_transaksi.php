<?php
	foreach ($jasa_kirim as $kirim) {
						$biaya=$kirim->biaya_kirim;
					}

            foreach ($bank_tujuan as $bank) {
            		$nama_bank=$bank->namabank;
            		$an=$bank->atas_nama;
            		$norek=$bank->no_rekening;    
            }
?>

<div class="container">
<div class="row">
	<h3>Proses Transaksi & Ketentuan</h3>
			<p> Setelah mentransfer silakan konfirmasi dengan mengirim SMS ke nomor <div class="text-info">02343424324</div> dengan format :<br/>
				<pre><strong>sldkfjlsdkf/asldkfj/asdlkjfs</strong></pre>
			</p>
		
	<legend><h2>Informasi Transaksi</h2></legend>
	<div class="span12">
		<legend>Data Bank Transfer</legend>
		<h4>Anda dapat mentransfer ke rekening di bawah ini</h4>
		<table class="table table-condesed" width=75%>
				<thead style="font-weight:bolder">
			<tr>
			<td>BANK</td>
			<td>NO REKENING</td>
			<td>ATAS NAMA</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><strong><?php echo $nama_bank; ?></strong></td><td><strong> <?php echo $norek; ?></strong></td>
				<td><strong> a.n <?php echo $an; ?></strong></td><td></td>
			</tr>
			
		</tbody>
		</table>
		<legend>Data Pembeli</legend>
		<table class="table table-condesed">
		<thead style="font-weight:bolder">
			<tr>
			<td>Atas Nama</td>
			<td>Alamat</td>
			<td>Kota</td>
			<td>Provinsi</td>
			<td>Negara</td>
			<td>Postal</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $atas_nama; ?></td>
				<td><?php echo $alamat; ?></td>
				<td><?php echo $kota; ?></td>
				<td><?php echo $provinsi; ?></td>
				<td><?php echo $negara; ?></td>
				<td><?php echo $postal; ?></td>
			</tr>
		</tbody>
		</table>
		<br/>		<legend>Data Produk</legend>
		<table class="table table-condesed">
		<thead style="font-weight:bolder">
			<tr>
			<td>ID Produk</td>
			<td>Nama Produk</td>
			<td>Harga</td>
			<td>QTY</td>
			<td>Total Harga</td>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach ($data_produk as $pesanan) {
					$idpembeli=$pesanan->idpembeli;
					echo "<tr>
								<td>".$pesanan->idproduk."</td>
								<td>".$pesanan->nama."</td>
								<td>".$pesanan->harga."</td>
								<td>".$pesanan->qty."</td>
								<td style='text-align:right'>Rp. ".$pesanan->harga_per_pesan."</td>
							</tr>";
				}

			?>
			<tr>
				<td colspan=2>&nbsp;</td><td><strong>SUM :</strong></td><td><strong> <?php echo $total_qty; ?></strong></td>
				<td style='text-align:right'><strong>Rp. <?php echo $total_transfer-$biaya; ?></strong></td><td></td>
			</tr>
			<tr>
				<td colspan=2>&nbsp;</td><td><strong>Biaya Kirim :</strong></td><td>&nbsp;</td>
				<td style='text-align:right'><strong>Rp. <?php 	echo $biaya; ?></strong></td><td></td>
			</tr>
				<tr>
				<td colspan=2>&nbsp;</td><td><h4>TOTAL :</h4></td><td>&nbsp;</td>
				<td style='text-align:right'><h4>Rp. <?php echo $total_transfer; ?></h4></td><td></td>
			</tr>

		</tbody>
		</table>
		
	</div>
</div>
</div