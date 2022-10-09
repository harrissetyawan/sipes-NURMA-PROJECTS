<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

    <div class="my-3">
        <a class="float-right btn btn-primary mb-3" href="<?= base_url('/profile-matching/aspek/create') ?>" role="button">Tambah Aspek</a>

        <table id="table_user" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Aspek</th>
                    <th>Aspek</th>
                    <th>Persentase</th>
                    <th>Bobot Core</th>
                    <th>Bobot Secondary</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach($aspeks as $aspek): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $aspek->aspek_id ?></td>
                        <td><?= $aspek->aspek ?></td>
                        <td><?= $aspek->persentase ?></td>
                        <td><?= $aspek->bobot_core ?></td>
                        <td><?= $aspek->bobot_secondary ?></td>
                        <td><?= $aspek->created_at ?></td>
                        <td>
                            <a href="<?= base_url("/profile-matching/aspek/edit/$aspek->aspek_id") ?>" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger" type="button" data-id="<?= $aspek->aspek_id ?>" onclick="deleteAspek(this)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <tbody>
        </table>
    </div>

    <script>
        const url = 'http://localhost:8080/profile-matching/aspek/destroy/';

        const deleteAspek = (element) => {
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