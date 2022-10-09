<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/landing/style.css">
  <!-- SELECT2 MIN -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/select2.min.css">
  <title>Sistem Penerimaan Siswa</title>
</head>

<body>
  <header id="Introduction">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">SMP Negeri 10 Kolaka Utara</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php base_url(); ?>/landing/report">Pengumuman <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php base_url(); ?>/auth/login">Login / Register <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>

    <section class="slideSection" id="mainSection">
      <h2>Selamat datang.</h2>
      <p>SMP Negeri 10 Kolaka Utara
        <br /> Kuat, Agamis dan Berbudaya
        <br />
      </p>

    </section>

  </header>

  <div class="container mt-5">
    <div class="row p-4">
      <div class="col">
        <h3>Visi</h3>
        <hr>
        <ul>
          <li>Menciptakan Siswa Berprestasi</li>
        </ul>
      </div>
      <div class="col">
        <h3>Misi</h3>
        <hr>
        <ul>
          <li>Memberikan pelajaran yang baik dan benar</li>
        </ul>
      </div>
    </div>

    <div class="mx-5 mt-3 mb-5">
      <h3>Ingin mendaftar ? silahkan registrasi akun terlebih dahulu <a href="<?php base_url(); ?>/auth/login">Disini</a>.</h3>
    </div>
  </div>



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="<?= base_url() ?>/assets/js/select2.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/ajax.js"></script>

</body>

</html>