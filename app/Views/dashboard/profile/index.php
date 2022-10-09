<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

    <?php $validation = \Config\Services::validation(); ?>
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
    <?php endif; ?>

    <form method="post" action="<?= base_url(); ?>/siswa/profile/update/".<?= $siswa->siswa_id ?>>
        <?= csrf_field(); ?>
        <h1 class="my-5">Form Registrasi Siswa</h1>
        <h5>Data Diri</h5>
        <hr>
        <div class="mb-3">
            <label for="id_reg" class="form-label">ID Registrasi</label>
            <input type="text" class="form-control" id="id_reg" name="id_reg" value="<?= $siswa->id_reg ?>" readonly>
            <?php if($validation->getError('id_reg')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('id_reg'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="nisn" class="form-label">NISN</label>
            <input type="text" class="form-control" id="nisn" name="nisn" value="<?= $siswa->nisn ?>" required>
            <?php if($validation->getError('nisn')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('nisn'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $siswa->nama ?>" required>
            <?php if($validation->getError('nama')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('nama'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $siswa->tempat_lahir ?>" required>
            <?php if($validation->getError('tempat_lahir')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('tempat_lahir'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $siswa->tgl_lahir ?>" required>
            <?php if($validation->getError('tanggal_lahir')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('tanggal_lahir'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-control" name="jenis_kelamin" required>
                <option value="laki" <?= $siswa->jenis_kelamin == 'laki' ? 'selected' : '' ?>>Laki - Laki</option>
                <option value="perempuan" <?= $siswa->jenis_kelamin == 'perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
            <?php if($validation->getError('jenis_kelamin')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('jenis_kelamin'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="agama" class="form-label">Agama</label>
            <select class="form-control" name="agama">
                <option value="tidak_jelas" hidden>Pilih Agama</option>
                <option value="islam" <?= $siswa->agama == 'islam' ? 'selected' : '' ?>>Islam</option>
                <option value="kristen" <?= $siswa->agama == 'kristen' ? 'selected' : '' ?>>Kristen</option>
            </select>
            <?php if($validation->getError('agama')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('agama'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="status_keluarga" class="form-label">Status Keluarga</label>
            <input type="text" class="form-control" id="status_keluarga" name="status_keluarga" value="<?= $siswa->status_keluarga ?>" required>
            <?php if($validation->getError('status_keluarga')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('status_keluarga'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="anak_ke" class="form-label">Anak Ke</label>
            <input type="number" class="form-control" id="anak_ke" name="anak_ke" value="<?= $siswa->anak_ke ?>" required>
            <?php if($validation->getError('anak_ke')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('anak_ke'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" value="<?= $siswa->nik ?>" required>
            <?php if($validation->getError('nik')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('nik'); ?>
                </span>
            <?php }?>
        </div>
        <h5>Data Orangtua</h5>
        <hr>
        <div class="my-3">
            <label for="nama_ayah" class="form-label">Nama Ayah</label>
            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?= $siswa->nama_ayah ?>" required>
            <?php if($validation->getError('nama_ayah')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('nama_ayah'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
            <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="<?= $siswa->pekerjaan_ayah ?>" required>
            <?php if($validation->getError('pekerjaan_ayah')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('pekerjaan_ayah'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="no_telepon_ayah" class="form-label">No Telepon Ayah</label>
            <input type="text" class="form-control" id="no_telepon_ayah" name="no_telepon_ayah" value="<?= $siswa->no_telepon_ayah ?>" required>
            <?php if($validation->getError('no_telepon_ayah')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('no_telepon_ayah'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="nama_ibu" class="form-label">Nama Ibu</label>
            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?= $siswa->nama_ibu ?>" required>
            <?php if($validation->getError('nama_ibu')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('nama_ibu'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
            <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="<?= $siswa->pekerjaan_ibu ?>" required>
            <?php if($validation->getError('pekerjaan_ibu')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('pekerjaan_ibu'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="no_telepon_ibu" class="form-label">No Telepon Ibu</label>
            <input type="text" class="form-control" id="no_telepon_ibu" name="no_telepon_ibu" value="<?= $siswa->no_telepon_ibu ?>" required>
            <?php if($validation->getError('no_telepon_ibu')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('no_telepon_ibu'); ?>
                </span>
            <?php }?>
        </div>
        <h5>Data Wali</h5>
        <small>Jika tidak ada, tidak perlu diisi</small>
        <hr>
        <div class="my-3">
            <label for="nama_wali" class="form-label">Nama Wali</label>
            <input type="text" class="form-control" id="nama_wali" name="nama_wali" value="<?= $siswa->nama_wali ?>">
            <?php if($validation->getError('nama_wali')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('nama_wali'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="pekerjaan_wali" class="form-label">Pekerjaan Wali</label>
            <input type="text" class="form-control" id="pekerjaan_wali" name="pekerjaan_wali" value="<?= $siswa->pekerjaan_wali ?>">
            <?php if($validation->getError('pekerjaan_wali')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('pekerjaan_wali'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="no_telepon_wali" class="form-label">No Telepon Wali</label>
            <input type="text" class="form-control" id="no_telepon_wali" name="no_telepon_wali" value="<?= $siswa->no_telepon_wali ?>">
            <?php if($validation->getError('no_telepon_wali')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('no_telepon_wali'); ?>
                </span>
            <?php }?>
        </div>
        <h5>Data Alamat</h5>
        <hr>
        <div class="my-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $siswa->alamat ?>" required>
            <?php if($validation->getError('alamat')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('alamat'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= $siswa->provinsi ?>" required>
            <?php if($validation->getError('provinsi')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('provinsi'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="kota" class="form-label">Kota</label>
            <input type="text" class="form-control" id="kota" name="kota" value="<?= $siswa->kota ?>" required>
            <?php if($validation->getError('kota')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('kota'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="kabupaten" class="form-label">Kabupaten</label>
            <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="<?= $siswa->kabupaten ?>" required>
            <?php if($validation->getError('kabupaten')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('kabupaten'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="kode_pos" class="form-label">Kode Pos</label>
            <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="<?= $siswa->kode_pos ?>" required>
            <?php if($validation->getError('kode_pos')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('kode_pos'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="text" class="form-control" id="latitude" name="latitude" value="<?= $siswa->lat ?>" readonly>
            <?php if($validation->getError('latitude')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('latitude'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" class="form-control" id="longitude" name="longitude" value="<?= $siswa->long ?>" readonly>
            <?php if($validation->getError('longitude')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('longitude'); ?>
                </span>
            <?php }?>
        </div>
        <!-- <div class="mb-3">
            <button type="submit" id="submitBtn" class="btn btn-primary" disabled>Simpan</button>
        </div> -->
        
    </form>

<?= $this->endSection() ?>