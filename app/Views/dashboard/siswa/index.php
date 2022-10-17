<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

<div class="my-3">

    <table id="table_user" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>NISN</th>
                <th>Tempat</th>
                <th>Tanggal Lahir</th>
                <th>Umur</th>
                <th>Tanggal Daftar</th>
                <th>Sekolah Asal</th>
                <th>Rangking</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($user as $users) :
            ?>
                <tr>
                    <td><?= $users->nama ?></td>
                    <td><?= $users->nik ?></td>
                    <td><?= $users->nisn ?></td>
                    <td><?= $users->tempat_lahir ?></td>
                    <td><?= $users->tgl_lahir ?></td>
                    <td><?= getAge($users->tgl_lahir) ?> Tahun</td>
                    <td><?= date('d-m-Y', strtotime($users->created_at)) ?></td>
                    <td><?= $users->sekolah_asal ?></td>
                    <td><?= $i++ ?></td>
                    <td>
                        <a id="siswaEdit" style="text-decoration: none; color:green;" class="btn btn-small" href="/editSiswa/<?= $users->siswa_id ?>">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="/deleteUser/<?= $users->user_id ?>" style="text-decoration: none; color:red;" class="btn btn-small">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tbody>
    </table>
</div>

<?= $this->endSection() ?>