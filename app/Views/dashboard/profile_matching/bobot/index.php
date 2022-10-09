<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

    <div class="my-3">
        <a class="float-right btn btn-primary mb-3" href="<?= base_url('/profile-matching/bobot/create') ?>" role="button">Tambah Bobot</a>

        <table id="table_user" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Bobot</th>
                    <th>Selisih</th>
                    <th>Bobot</th>
                    <th>Keterangan</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach($bobots as $bobot): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $bobot->bobot_id ?></td>
                        <td><?= $bobot->selisih ?></td>
                        <td><?= $bobot->bobot ?></td>
                        <td><?= $bobot->keterangan ?></td>
                        <td><?= $bobot->created_at ?></td>
                        <td>
                            <a href="<?= base_url("/profile-matching/bobot/edit/$bobot->bobot_id") ?>" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger" type="button" data-id="<?= $bobot->bobot_id ?>" onclick="deleteBobot(this)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <tbody>
        </table>
    </div>

    <script>
        const url = 'http://localhost:8080/profile-matching/bobot/destroy/';

        const deleteBobot = (element) => {
            const data = element.getAttribute('data-id');

            fetch(url + data, {
                method: 'delete',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(res => {
                if (res.ok) {
                    alert('Berhasil menghapus data');
                    location.reload();
                } else {
                    alert('Gagal menghapus data');
                }
            })
            // .then(data => {
            //     console.log(data);
            // });
        }
    </script>

<?= $this->endSection() ?>