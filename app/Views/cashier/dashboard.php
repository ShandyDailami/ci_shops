<?= $this->extend('template/main') ?>
<?= $this->section('content') ?>
<div class="position-fixed mt-2 me-2 top-0 end-0">
  <?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success flash-message">
      <?= session()->getFlashdata('message') ?>
    </div>
  <?php elseif (session()->getFlashdata('errors')): ?>
    <?php foreach (session()->getFlashdata('errors') as $error): ?>
      <div class="alert alert-danger flash-message">
        <?= esc($error) ?>
      </div>
    <?php endforeach ?>
  <?php elseif (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger flash-message">
      <?= session()->getFlashdata('error') ?>
    </div>
  <?php endif ?>
</div>
<button id="logout" class="btn btn-danger">Log out</button>
<a href="/transaction/create" class="btn btn-primary">Transaction</a>
<a href="/history/list" class="btn btn-primary">History</a>
<div class="row container-fluid p-0 m-0">
  <div class="col d-flex flex-column align-items-center justify-content-center">
    <table class="table table-custom table-striped table-hover mt-3">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Quantity</th>
          <th scope="col">Total</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php if (!empty($transactions)): ?>
          <?php foreach ($transactions as $index => $transaction): ?>
            <tr>
              <td><?= $index + 1 ?></td>
              <td><?= esc($transaction['name']) ?></td>
              <td><?= esc($transaction['quantity']) ?></td>
              <td>Rp<?= number_format(esc($transaction['total']), 2, ',', '.') ?></td>
              <td>
                <button id="edit" data-id="<?= esc($transaction['id']) ?>" class="btn btn-primary"><i
                    class="bi bi-pencil-square"></i></button>
                <button class="btn btn-danger" data-bs-target="#delete" data-bs-toggle="modal"
                  data-id="<?= esc($transaction['id']) ?>"><i class="bi bi-trash"></i></button>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this data?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirm">Delete</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection('content') ?>