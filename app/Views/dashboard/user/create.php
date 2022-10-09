<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

    <?php $validation = \Config\Services::validation(); ?>
    <a class="btn btn-danger my-3" href="<?= base_url() ?>/manage/user" role="button">Kembali</a>
    <form class="form-signin" method="post" action="<?= base_url(); ?>/manage/store/user">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" >
            <?php if($validation->getError('name')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('name'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" >
            <?php if($validation->getError('email')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('email'); ?>
                </span>
            <?php }?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
            <?php if($validation->getError('password')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('password'); ?>
                </span>
            <?php }?>
        </div>
        <div class="mb-3">
            <label for="password_conf" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="password_conf" name="password_conf" >
            <?php if($validation->getError('password_conf')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('password_conf'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-control" name="role" required>
                <option hidden selected>Pilih Role</option>
                <option value="admin">Admin</option>
                <option value="siswa">Siswa</option>
            </select>
            <?php if($validation->getError('role')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('role'); ?>
                </span>
            <?php }?>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

<?= $this->endSection() ?>