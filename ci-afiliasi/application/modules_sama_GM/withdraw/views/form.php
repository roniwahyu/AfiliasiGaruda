<strong>Ketentuan Penarikan Komisi :</strong>
<ol start=1 style="font-style:italic">
	<li>Penarikan Komisi minimal adalah sebesar Rp. 100.000,</li>
	<li>Sisa Saldo minimal adalah Rp. 100.000</li>
	<li>Proses transfer akan dikirim ke Rekening yang anda daftarkan</li>
	<li>Proses transfer adalah 2-4 hari dari proses penarikan</li>
</ol>
<?php
if ($total_komisi<=100000) {
	?>
<h3>Total Komisi anda : Rp. <?php echo $total_komisi; ?></h3>
<strong>Maaf, Komisi anda belum mencukupi untuk proses transfer</strong>
	<?php
}
else
	{
?>

<h3>Total Komisi Anda : Rp. <?php echo $total_komisi; ?> </h3>
<h5>Penarikan komisi maksimal : Rp. <?php echo $available_komisi; ?></h5>



			<?php  
            if (!empty($bank)) {
            	?>
<!-- start modul -->
            
				<form action="withdraw/transfer_komisi" class="form-horizontal" method="post">
					<input type="hidden" name="available_komisi" value="<?php echo $available_komisi; ?>" />
					<div class="control-group">
						<label class="control-label">Total Penarikan :</label>
						<div class="controls">
							<div class="input-prepend">
							  <span class="add-on">Rp.</span>
							  <input  id="prependedInput" name="total_penarikan" type="text">
							</div>
						</div>
					</div>

	<div class="control-group">
		<label class="control-label">Bank Pilihan :</label>
		<div class="controls">

            	<?php
              foreach ($bank as $datarekening) { ?>
            <input type="radio" name="idbankacc" value="<?php echo $datarekening->idbankacc; ?>"/> <?php echo $datarekening->namabank; ?>
            <h5>No. Rekening : <?php echo $datarekening->account;?></h5>
            
          
          </fieldset>
          <?php  }    ?>
          	<div class="control-group">
					<button class="btn btn-success" style="margin-top:10px" name="transfer">Transfer</button>
			</div>

      </div>
      </div>
</form>
<!-- eof modul -->

            <?php
        }
        else
        {?>
    <strong class="text-error">Anda belum memiliki akun bank untuk transfer komisi</strong><br/>
    <a class="btn btn-info" href="<?php echo base_url(); ?>pengaturan#databank">Buat akun Bank</a>
      <?php
        }

	}

	?>
