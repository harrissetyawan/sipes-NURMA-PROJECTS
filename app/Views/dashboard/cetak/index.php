<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
  
    <div class="alert alert-success mt-2" role="alert">
        <span>Silahkan pilih dokumen yang ingin anda cetak.</span>
    </div>

    <div class="row pt-5 mx-1">
        <a href="<?php base_url(); ?>/cetak/pendaftaran" target="__BLANK" class="btn btn-primary mx-2">Pendaftaran</a>
        <?php if(session('status') == 'DITERIMA') { ?>
            <a href="<?php base_url(); ?>/cetak/kelulusan" target="__BLANK" class="btn btn-success mx-2">Kelulusan</a>
        <?php } ?>
    </div>

<?= $this->endSection() ?>