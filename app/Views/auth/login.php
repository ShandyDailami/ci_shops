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
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="card col-md-4 mx-auto">
    <div class="card-body">
      <h5 class="card-title text-center">Log in</h5>
      <form action="/login" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" id="username" value="<?= old('username') ?>">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password" value="<?= old('password') ?>">
        </div>
        <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select name="role" class="form-select" id="role" aria-label="role">
            <option selected disabled>Select Role</option>
            <option value="admin">Admin</option>
            <option value="cashier">Cashier</option>
          </select>
        </div>
        <button class="btn btn-primary w-100">Log in</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection('content') ?>