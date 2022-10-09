<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

<div class="my-3">
  <form method="POST" action="/saveSettings/<?= $rules->id ?>">
    <div class="form-group">
      <label for="InputUmur">Umur</label>
      <div class="form-group d-flex flex-col">
        <div class="form-group mr-3">
          <label for="UmurMin">Min</label>
          <input type="number" class="form-control" name="UmurMin" value="<?= $rules->umur_awal ?>">
        </div>
        <div class="form-group">
          <label for="UmurMax">Max</label>
          <input type="number" class="form-control" name="UmurMax" value="<?= $rules->umur_akhir ?>">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="InputJarak">Jarak</label>
      <input type="number" class="form-control col-3" name="InputJarak" value="<?= $rules->jarak_set ?>" aria-describedby="jarakHelp">
      <small id="jarakHelp" class="form-text text-muted">Jarak maksimum dari sekolah (KM)</small>
    </div>
    <label for="WAKTU">Awal Pendaftaran</label>
    <div class="form-group d-flex flex-col">
      <div class="form-group">
        <label for="InputWaktuAwal">Tanggal Min</label>
        <input type="number" class="form-control" name="InputWaktuAwal" value="<?= $rules->waktu_awal ?>">
      </div>
      <div class="form-group ml-3">
        <label for="InputWaktuAkhir" class="pr-2">Tanggal Max</label>
        <input type="number" class="form-control" name="InputWaktuAkhir" value="<?= $rules->waktu_akhir ?>">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>

<?= $this->endSection() ?>