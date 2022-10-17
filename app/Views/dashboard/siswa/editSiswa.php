<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>

<div class="my-3">
  <form method="post" action="<?= base_url(); ?>/siswa/update/<?= $siswa[0]->siswa_id ?>">
    <?= csrf_field(); ?>
    <h1 class="my-5">Form Registrasi Siswa</h1>
    <h5>Data Diri</h5>
    <hr>
    <!-- <div class="mb-3">
      <label for="id_reg" class="form-label">ID Registrasi</label>
      <input type="text" class="form-control" id="id_reg" name="id_reg" value="<?= $siswa[0]->id_reg ?>" readonly>

    </div> -->
    <div class="my-3">
      <label for="nisn" class="form-label">NISN</label>
      <input type="text" class="form-control" id="nisn" name="nisn" value="<?= $siswa[0]->nisn ?>" required>

    </div>
    <div class="my-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?= $siswa[0]->nama ?>" required>

    </div>
    <div class="my-3">
      <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
      <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $siswa[0]->tempat_lahir ?>" required>

    </div>
    <div class="my-3">
      <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
      <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $siswa[0]->tgl_lahir ?>" required>

    </div>
    <div class="my-3">
      <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
      <select class="form-control" name="jenis_kelamin" required>
        <option value="laki" <?= $siswa[0]->jenis_kelamin == 'laki' ? 'selected' : '' ?>>Laki - Laki</option>
        <option value="perempuan" <?= $siswa[0]->jenis_kelamin == 'perempuan' ? 'selected' : '' ?>>Perempuan</option>
      </select>

    </div>
    <div class="my-3">
      <label for="agama" class="form-label">Agama</label>
      <select class="form-control" name="agama">
        <option value="tidak_jelas" hidden>Pilih Agama</option>
        <option value="islam" <?= $siswa[0]->agama == 'islam' ? 'selected' : '' ?>>Islam</option>
        <option value="kristen" <?= $siswa[0]->agama == 'kristen' ? 'selected' : '' ?>>Kristen</option>
      </select>

    </div>
    <div class="my-3">
      <label for="status_keluarga" class="form-label">Status Keluarga</label>
      <input type="text" class="form-control" id="status_keluarga" name="status_keluarga" value="<?= $siswa[0]->status_keluarga ?>" required>

    </div>
    <div class="my-3">
      <label for="anak_ke" class="form-label">Anak Ke</label>
      <input type="number" class="form-control" id="anak_ke" name="anak_ke" value="<?= $siswa[0]->anak_ke ?>" required>

    </div>
    <div class="my-3">
      <label for="nik" class="form-label">NIK</label>
      <input type="text" class="form-control" id="nik" name="nik" value="<?= $siswa[0]->nik ?>" required>

    </div>
    <h5>Data Orangtua</h5>
    <hr>
    <div class="my-3">
      <label for="nama_ayah" class="form-label">Nama Ayah</label>
      <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?= $siswa[0]->nama_ayah ?>" required>

    </div>
    <div class="my-3">
      <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
      <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="<?= $siswa[0]->pekerjaan_ayah ?>" required>

    </div>
    <div class="my-3">
      <label for="no_telepon_ayah" class="form-label">No Telepon Ayah</label>
      <input type="text" class="form-control" id="no_telepon_ayah" name="no_telepon_ayah" value="<?= $siswa[0]->no_telepon_ayah ?>" required>

    </div>
    <div class="my-3">
      <label for="nama_ibu" class="form-label">Nama Ibu</label>
      <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?= $siswa[0]->nama_ibu ?>" required>

    </div>
    <div class="my-3">
      <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
      <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="<?= $siswa[0]->pekerjaan_ibu ?>" required>

    </div>
    <div class="my-3">
      <label for="no_telepon_ibu" class="form-label">No Telepon Ibu</label>
      <input type="text" class="form-control" id="no_telepon_ibu" name="no_telepon_ibu" value="<?= $siswa[0]->no_telepon_ibu ?>" required>

    </div>
    <h5>Data Wali</h5>
    <small>Jika tidak ada, tidak perlu diisi</small>
    <hr>
    <div class="my-3">
      <label for="nama_wali" class="form-label">Nama Wali</label>
      <input type="text" class="form-control" id="nama_wali" name="nama_wali" value="<?= $siswa[0]->nama_wali ?>">

    </div>
    <div class="my-3">
      <label for="pekerjaan_wali" class="form-label">Pekerjaan Wali</label>
      <input type="text" class="form-control" id="pekerjaan_wali" name="pekerjaan_wali" value="<?= $siswa[0]->pekerjaan_wali ?>">

    </div>
    <div class="my-3">
      <label for="no_telepon_wali" class="form-label">No Telepon Wali</label>
      <input type="text" class="form-control" id="no_telepon_wali" name="no_telepon_wali" value="<?= $siswa[0]->no_telepon_wali ?>">

    </div>
    <h5>Data Alamat</h5>
    <hr>
    <div class="my-3">
      <label for="alamat" class="form-label">Alamat</label>
      <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $siswa[0]->alamat ?>" required>

    </div>
    <div class="my-3">
      <label for="provinsi" class="form-label">Provinsi</label>
      <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= $siswa[0]->provinsi ?>" required>

    </div>
    <div class="my-3">
      <label for="kota" class="form-label">Kota</label>
      <input type="text" class="form-control" id="kota" name="kota" value="<?= $siswa[0]->kota ?>" required>

    </div>
    <div class="my-3">
      <label for="kabupaten" class="form-label">Kabupaten</label>
      <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="<?= $siswa[0]->kabupaten ?>" required>

    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>

  </form>
</div>

<?= $this->endSection() ?>