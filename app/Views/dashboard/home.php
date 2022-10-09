<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
  <?php if(session('role') == 'siswa'){ ?>
    
      <div class="alert alert-dark mt-2" role="alert">
        <h5>Selamat datang <?= session('nama') ?></h5>
        <span>Silahkan cek menu pengumuman, untuk mengetahui informasi pendaftaran anda</span>
      </div>

  <?php } else { ?>

    <div class="card mt-3">
      <div class="card-body">
        <blockquote class="blockquote">
          <p>Selamat datang <?= session('nama') ?></p>
          <footer class="card-blockquote"><cite title="Source title">SMP Negeri 10 Kolaka Utara</cite></footer>
        </blockquote>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="card">
          <img class="card-img-top" src="holder.js/100x180/" alt="">
          <div class="card-body">
            <h4 class="card-title">Jumlah Siswa Mendaftar</h4>
            <p class="card-text"><h1><?= $count_siswa ?></h1></p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img class="card-img-top" src="holder.js/100x180/" alt="">
          <div class="card-body">
            <h4 class="card-title">Jumlah Siswa Lolos</h4>
            <p class="card-text"><h1><?= $count_lolos ?></h1></p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img class="card-img-top" src="holder.js/100x180/" alt="">
          <div class="card-body">
            <h4 class="card-title">Jumlah Siswa Diterima</h4>
            <p class="card-text"><h1><?= $count_diterima ?></h1></p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img class="card-img-top" src="holder.js/100x180/" alt="">
          <div class="card-body">
            <h4 class="card-title">Jumlah Siswa Tidak Lolos</h4>
            <p class="card-text"><h1><?= $count_tidak_lolos ?></h1></p>
          </div>
        </div>
      </div>
    </div>

  <?php } ?>

<?= $this->endSection() ?>