
<em class="text-info"><strong>Tambahkan Data Bank anda untuk mempermudah proses penarikan komisi</strong></em>
 <form action="<?php echo base_url(); ?>pengaturan/tambah_akun_bank" method='post'>
 <select name="idbank_baru">
                <?php
                  foreach ($bank as $databank) {
                    ?>
                      <option value="<?php echo $databank->idbank;?>" >
                        <?php echo $databank->namabank;?></option>
                    <?php
                  } ?>
            </select>
            <br>Nomor Rekening<br>
            <input type="text" name="account_baru" value="">
            <br/>
            <button class="btn btn-success">Tambah</button>

</form>

