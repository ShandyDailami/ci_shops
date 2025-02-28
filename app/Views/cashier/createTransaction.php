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
  <div class="card col-md-6 mx-auto">
    <div class="card-header">Create Transaction</div>
    <div class="card-body">
      <form action="" method="post">
        <div class="mb-3">
          <label for="product_id" class="form-label">Product</label>
          <select name="product_id" class="form-select" id="product_id" aria-label="product_id">
            <option selected disabled>Select Product</option>
            <?php foreach ($products as $product): ?>
              <option value="<?= esc($product['id']) ?>"><?= esc($product['name']) ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="quantity" class="form-label">Quantity</label>
          <input type="text" id="quantity" class="form-control" name="quantity" placeholder="Quantity"
            oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="<?= old('quantity') ?>">
        </div>
        <div class="mb-3 d-flex flex-row">
          <button type="submit" class="btn btn-primary me-2">Create</button>
          <a href="/product/list" type="submit" class="btn btn-secondary">Back</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection('content') ?>