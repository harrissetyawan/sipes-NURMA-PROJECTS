<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
    <?php if(session('status') == 'DAFTAR') { ?>

        <div class="card mt-3">
            <div class="card-header bg-dark">
                Pengumuman
            </div>
            <div class="card-body">
                <p class="card-text">Belum ada prngumuman.</p>
            </div>
        </div>

    <?php } else if(session('status') == 'DITERIMA') { ?>

        <div class="card mt-3">
            <div class="card-header bg-success">
                Pengumuman
            </div>
            <div class="card-body">
                <h5 class="card-title">Selamat <?= session('nama') ?></h5>
                <p class="card-text">Anda diterima sebagai siswa di SMP Negeri 10 Kolaka Utara.</p>
            </div>
        </div>

    <?php } else if(session('status') == 'LOLOS') { ?>

        <div class="card mt-3">
            <div class="card-header bg-success">
                Pengumuman
            </div>
            <div class="card-body">
                <h5 class="card-title">Selamat <?= session('nama') ?></h5>
                <p class="card-text">Anda lolos tahap seleksi pertama di SMP Negeri 10 Kolaka Utara.</p>
            </div>
        </div>

    <?php }  else if(session('status') == 'GAGAL') { ?>

        <div class="card mt-3">
            <div class="card-header bg-danger">
                Pengumuman
            </div>
            <div class="card-body">
                <h5 class="card-title">Mohon maaf <?= session('nama') ?></h5>
                <p class="card-text">Anda belum diterima sebagai siswa di SMP Negeri 10 Kolaka Utara.</p>
            </div>
        </div>

    <?php } ?>
    

<?= $this->endSection() ?>