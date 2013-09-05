<!-- some tricky stuff to destroy modal content, so it would show different content :D -->
<script type="text/javascript">
 $(document).ready(function () {
    $('body').on('hidden', '.modal', function () {
  $(this).removeData('modal');
});
}); 
// http://stackoverflow.com/questions/12286332/twitter-bootstrap-remote-modal-shows-same-content-everytime
</script>
<div class="container slider">
    <div class="row-fluid ">
      <div class="span10 offset1">
        
        <?php
          if ($total_komisi==0) {
            echo "<strong>Saldo komisi Anda masih kosong, perbanyak menyebar link Affiliasi Anda untuk memperbesar kesempatan mendapat komisi</strong>
                  <a href='#' role='button' class='btn btn-error '>:( Sebarkan Link Affiliasi Anda</a>
            ";
          }
          else if ($total_komisi>0 && $total_komisi<=100000) {
              echo "<h4>TOTAL KOMISI ANDA ".$total_komisi."</h4>
              <strong>Anda belum bisa mengambil saldo komisi anda, minimal penarikan saldo adalah Rp. 100.000</strong>
                  <a href='#' role='button' class='btn btn-error '>Lihat Penarikan Komisi</a>
            ";
          }
          else
          {
              echo "<h4>TOTAL KOMISI ANDA Rp. ".$total_komisi."</h4>
                    <strong>Ingin mengambil saldo komisi??</strong>
                 <a href='".base_url()."withdraw' data-target='#withdrawForm' role='button' class='btn btn-info' data-toggle='modal'>Ya, transfer komisi saya</a>
            ";
          }
        ?><br/><br/>
     <a href="<?php echo base_url()?>main" class="btn btn-large btn-black tombol"> REFERAL</a>
        <a href="<?php echo base_url()?>komisi" class="btn btn-large btn-black tombol  active"> KOMISI</a>
        <a href="<?php echo base_url()?>banner" class="btn btn-large btn-black tombol"> BANNER</a>
        <a href="<?php echo base_url()?>pengaturan" class="btn btn-large btn-black tombol"> PENGATURAN </a>
      </div>
    </div>
    </div>

<div class="container content" style="margin-bottom:40px;">
<div class="row-fluid">
<div class="span12"  style="padding:0px 10px">
  
<?php Modules::load('chart/chart')->index(); ?>

  <h3>My Commission</h3>
<ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">Sukses</a></li>
        <li><a href="#tab2" data-toggle="tab">Pending</a></li>
        <li><a href="#tab3" data-toggle="tab">Terhapus</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab1">
          <strong>Total : Rp. <?php echo $income_komisi; ?></strong>
          <?php echo $transfer_sukses; ?>
        </div>

        <div class="tab-pane" id="tab2">  
           <strong>Total : Rp. <?php echo $pending_komisi; ?></strong>
          <?php echo $transfer_pending; ?>
        </div>

        <div class="tab-pane" id="tab3">
          
          <?php echo $transfer_dihapus; ?>

          <strong><em class='text-info'>* Komisi akan terhapus jika pembeli tidak melakukan pembayaran pembelian barang lebih dari 1 bulan</em></strong>
        </div>
      </div>


          
<!-- Modal start -->
<div id='myModal' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
  <div class='modal-header'>
    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>x</button>
    <h3 id='myModalLabel'>Detail Pembelian</h3>
  </div>
     <div class='modal-body'>
     </div>
 <div class='modal-footer'>
    <button class='btn' data-dismiss='modal' aria-hidden='true'>Close</button>
  </div>
</div>

<div id='withdrawForm' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
  <div class='modal-header'>
    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>x</button>
    <h3 id='myModalLabel'>Ambil Komisi</h3>
  </div><div class='modal-body'>


 </div><div class='modal-footer'>
    <button class='btn' data-dismiss='modal' aria-hidden='true'>Close</button>
  </div>
</div>
<!-- EOF modal -->
<?php Modules::load('withdraw/withdraw')->info(); ?>
</div>
</div>
</div>
