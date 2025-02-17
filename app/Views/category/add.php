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
<?= $this->endSection('content') ?>