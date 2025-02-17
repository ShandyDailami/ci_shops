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
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="card col-md-6 mx-auto">
    <div class="card-header">Create Category</div>
    <div class="card-body">
      <form action="" method="post">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="<?= old('name') ?>">
        </div>
        <div class="mb-3 ">
          <button type="submit" class="btn btn-primary w-100">Create</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection('content') ?>