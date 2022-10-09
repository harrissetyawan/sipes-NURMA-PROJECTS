<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

    <?php $validation = \Config\Services::validation(); ?>
    <a class="btn btn-danger my-3" href="<?= base_url('/profile-matching/bobot') ?>" role="button">Kembali</a>
    <form class="form-signin" method="post" action="<?= base_url('/profile-matching/bobot/store'); ?>">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="selisih" class="form-label">Selisih</label>
            <input type="number" class="form-control" id="selisih" name="selisih" >
            <?php if($validation->getError('selisih')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('selisih'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="bobot" class="form-label">bobot</label>
            <input type="number" class="form-control" id="bobot" name="bobot" >
            <?php if($validation->getError('bobot')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('bobot'); ?>
                </span>
            <?php }?>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" >
            <?php if($validation->getError('keterangan')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('keterangan'); ?>
                </span>
            <?php }?>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

<?= $this->endSection() ?>