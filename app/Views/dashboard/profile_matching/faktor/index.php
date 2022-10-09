<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

    <div class="my-3">
        <a class="float-right btn btn-primary mb-3" href="<?= base_url('/profile-matching/faktor/create') ?>" role="button">Tambah faktor</a>

        <table id="table_user" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Faktor</th>
                    <th>Aspek</th>
                    <th>Faktor</th>
                    <th>Target Faktor</th>
                    <th>Tipe Faktor</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach($faktors as $faktor): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $faktor->faktor_id ?></td>
                        <td><?= $faktor->aspek ?></td>
                        <td><?= $faktor->faktor ?></td>
                        <td><?= $faktor->target_faktor ?></td>
                        <td><?= $faktor->type_faktor ?></td>
                        <td><?= $faktor->created_at ?></td>
                        <td>
                            <a href="<?= base_url("/profile-matching/faktor/edit/$faktor->faktor_id") ?>" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger" type="button" data-id="<?= $faktor->faktor_id ?>" onclick="deleteFaktor(this)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <tbody>
        </table>
    </div>

    <script>
        const url = 'http://localhost:8080/profile-matching/faktor/destroy/';

        const deleteFaktor = (element) => {
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