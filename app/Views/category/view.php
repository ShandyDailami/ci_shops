<?= $this->extend('template/main') ?>
<?= $this->section('content') ?>
<div class="position-fixed mt-2 me-2 top-0 end-0">
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success flash-message">
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php elseif (session()->getFlashdata('errors')): ?>
    <?php foreach (session()->getFlashdata('errors') as $error): ?>
      <div class="alert alert-danger flash-message">
        <?= esc($error) ?>
      </div>
    <?php endforeach ?>
  <?php endif ?>
</div>
<a href="/category/create" class="btn btn-success">Add</a>
<div class="row container-fluid p-0 m-0">
  <div class="col d-flex flex-column align-items-center justify-content-center">
    <table class="table table-custom table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php if (!empty($categories)): ?>
          <?php foreach ($categories as $index => $category): ?>
            <tr>
              <td><?= $index + 1 ?></td>
              <td><?= esc($category['name']) ?></td>
              <td>
                <button id="edit" data-id="<?= esc($category['id']) ?>" class="btn btn-primary"><i
                    class="bi bi-pencil-square"></i></button>
                <button class="btn btn-danger" data-bs-target="#delete" data-bs-toggle="modal"
                  data-id="<?= esc($category['id']) ?>"><i class="bi bi-trash"></i></button>
              </td>
            </tr>
          <?php endforeach ?>
        <?php else: ?>
          <tr>
            <td colspan="3">No Item Found</td>
          </tr>
        <?php endif ?>
      </tbody>
    </table>
  </div>
</div>
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-primary" id="confirm">Hapus</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection('content') ?>