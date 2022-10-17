<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

<div class="my-3">
  <a class="float-right btn btn-primary mb-3" href="<?= base_url() ?>/manage/add/user" role="button">Tambah User</a>

  <table id="table_user" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Option</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($user as $users) : ?>
        <tr>
          <td><?= $users->nama ?></td>
          <td><?= $users->email ?></td>
          <td><?= $users->role ?></td>
          <td>
            <!-- <a id="siswaEdit" style="text-decoration: none; color:green;" class="btn btn-small" data-toggle="modal" data-target="#ModalEdit" data-id="<?= $users->user_id ?>">
              <i class="fas fa-edit"></i> Edit
            </a> -->
            <a href="/deleteUser/<?= $users->user_id ?>" style="text-decoration: none; color:red;" class="btn btn-small">
              <i class="fas fa-trash"></i> Hapus
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    <tbody>
  </table>
</div>


<!-- BOOTSRAP MODAL -->
<!-- MODAL EDIT -->

<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- FORM EDIT DATA SISWA -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>