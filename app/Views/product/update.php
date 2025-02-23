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
    <div class="card-header">Update Product</div>
    <div class="card-body">
      <form action="" method="post">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" id="name" class="form-control" name="name" placeholder="Name"
            value="<?= esc($product['name']) ?>">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <input type="text" id="description" class="form-control" name="description" placeholder="Description"
            value="<?= esc($product['description']) ?>">
        </div>
        <div class="mb-3">
          <label for="category_id" class="form-label">Category</label>
          <select name="category_id" class="form-select" id="category_id" aria-label="category_id">
            <option selected disabled>Select Category</option>
            <?php foreach ($categories as $category): ?>
              <option value="<?= esc($category['id']) ?>" <?= ($category['id'] === $product['category_id']) ? 'selected' : '' ?>>
                <?= esc($category['name']) ?>
              </option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Price</label>
          <input type="text" id="price" class="form-control" name="price" placeholder="Price"
            value="<?= esc($product['price']) ?>">
        </div>
        <div class="mb-3">
          <label for="stock" class="form-label">Stock</label>
          <input type="text" id="stock" class="form-control" name="stock" placeholder="Stock"
            value="<?= esc($product['stock']) ?>">
        </div>
        <div class="mb-3 d-flex flex-row">
          <button type="submit" class="btn btn-primary me-2">Update</button>
          <a href="/product/list" type="submit" class="btn btn-secondary">Back</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection('content') ?>