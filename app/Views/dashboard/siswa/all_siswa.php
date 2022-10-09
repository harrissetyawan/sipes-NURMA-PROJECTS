<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

<div class="my-3">

    <table id="table_user" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Umur</th>
                <th>Tanggal Daftar</th>
                <th>Status</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user as $users) : ?>
                <tr>
                    <td><?= $users->nama ?></td>
                    <td><?= $users->email ?></td>
                    <td><?= getAge($users->tgl_lahir) ?> Tahun</td>
                    <td><?= date('d-m-Y', strtotime($users->created_at)) ?></td>
                    <td><?= $users->status ?></td>
                    <td>
                        <div class="flex flex-row"></div>
                        <a>aaa</a>
                        <a>aaa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tbody>
    </table>
</div>

<?= $this->endSection() ?>