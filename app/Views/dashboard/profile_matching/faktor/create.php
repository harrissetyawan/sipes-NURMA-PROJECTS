<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

    <?php $validation = \Config\Services::validation(); ?>
    <a class="btn btn-danger my-3" href="<?= base_url('/profile-matching/faktor') ?>" role="button">Kembali</a>
    <form class="form-signin" method="post" action="<?= base_url('/profile-matching/faktor/store'); ?>">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="aspek" class="form-label">Aspek</label>
            <select name="id_aspek" id="id_aspek" class="form-control">
                <?php foreach ($aspeks as $aspek):?>
                    <option value="<?= $aspek->aspek_id?>"><?= $aspek->aspek ?></option>
                <?php endforeach; ?>
            </select>
            <?php if($validation->getError('id_aspek')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('id_aspek'); ?>
                </span>
            <?php }?>
        </div>
        <div class="my-3">
            <label for="faktor" class="form-label">Faktor</label>
            <input type="text" class="form-control" id="faktor" name="faktor" >
            <?php if($validation->getError('faktor')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('faktor'); ?>
                </span>
            <?php }?>
        </div>
        <div class="mb-3">
            <label for="target_faktor" class="form-label">Target Faktor</label>
            <input type="number" class="form-control" id="target_faktor" name="target_faktor" >
            <?php if($validation->getError('target_faktor')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('target_faktor'); ?>
                </span>
            <?php }?>
        </div>
        <div class="mb-3">
            <label for="type_faktor" class="form-label">Tipe Faktor</label>
            <input type="text" class="form-control" id="type_faktor" name="type_faktor" >
            <?php if($validation->getError('type_faktor')) {?>
                <span class='text-danger'>
                    <?= $error = $validation->getError('type_faktor'); ?>
                </span>
            <?php }?>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

<?= $this->endSection() ?>