<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

    <div class="my-3">
        <a class="float-right btn btn-primary mb-3" href="<?= base_url() ?>/manage/add/user" role="button">Seleksi Siswa</a>

        <table id="table_user" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Ranking</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Nilai Ranking</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                <?php foreach($seleksi as $data): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $data['nisn'] ?></td>
                        <td><?= $data['name'] ?></td>
                        <td><?= $data['jenis_kelamin'] ?></td>
                        <td><?= $data['final_value'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <tbody>
        </table>
    </div>

<?= $this->endSection() ?>