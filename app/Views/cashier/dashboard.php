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
<a href="/transaction/list" class="btn btn-primary">Transaction</a>
<a href="/history/list" class="btn btn-primary">History</a>
<?= $this->endSection('content') ?>