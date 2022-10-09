<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

    <div class="my-3">
        <?php if(count($user) > 0) { ?>
            <a class="float-right btn btn-primary mb-3" href="<?= base_url() ?>/siswa/seleksi" role="button">Seleksi Siswa</a>
        <?php } else { ?>
            <button class="float-right btn btn-primary mb-3" role="button" disabled>Seleksi Siswa</button>
        <?php } ?>

        <table id="table_user" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Umur</th>
                    <th>Tanggal Daftar</th>
                    <th>Rangking</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $i = 1;
                    foreach($user as $users): 
                ?>
                    <tr>
                        <td><?= $users->nama ?></td>
                        <td><?= $users->email ?></td>
                        <td><?= getAge($users->tgl_lahir) ?> Tahun</td>
                        <td><?= date('d-m-Y',strtotime($users->created_at)) ?></td>
                        <td><?= $i++ ?></td>
                    </tr>
                <?php endforeach; ?>
            <tbody>
        </table>
    </div>

<?= $this->endSection() ?>