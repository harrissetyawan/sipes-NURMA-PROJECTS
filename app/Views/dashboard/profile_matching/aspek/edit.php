<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

    <?php $validation = \Config\Services::validation(); ?>
    <a class="btn btn-danger my-3" href="<?= base_url("/profile-matching/aspek") ?>" role="button">Kembali</a>
    <form class="form-signin" method="post" action="<?= base_url('/profile-matching/aspek/update/' . $aspek->aspek_id); ?>">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="aspek" class="form-label">Aspek</label>
            <input type="text" class="form-control" id="aspek" name="aspek" value="<?= $aspek->aspek ?>">
            <?php if($validation->getError('aspek')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('aspek'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="persentase" class="form-label">Persentase</label>
            <input type="number" class="form-control" id="persentase" name="persentase" value="<?= $aspek->persentase?>">
            <?php if($validation->getError('persentase')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('persentase'); ?>
                </span>
            <?php }?>
        </div>
        <div class="mb-3">
            <label for="bobot_core" class="form-label">Bobot Core</label>
            <input type="number" class="form-control" id="bobot_core" name="bobot_core" value="<?= $aspek->bobot_core ?>">
            <?php if($validation->getError('bobot_core')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('bobot_core'); ?>
                </span>
            <?php }?>
        </div>
        <div class="mb-3">
            <label for="bobot_secondary" class="form-label">Bobot Secondary</label>
            <input type="number" class="form-control" id="bobot_secondary" name="bobot_secondary" value="<?= $aspek->bobot_secondary ?>">
            <?php if($validation->getError('bobot_secondary')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('bobot_secondary'); ?>
                </span>
            <?php }?>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

<?= $this->endSection() ?>