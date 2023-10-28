<?php
require './env.php';
require './models/ProductIncome.php';
require './models/Product.php';
require './models/Supplier.php';
require './models/User.php';

$incomeObj = new ProductIncome();
$productObj = new Products();
$supplierObj = new Supplier();
$userObj = new User();

$income = $incomeObj->find($_GET['id']);
$products = $productObj->all();
$suppliers = $supplierObj->all();
$users = $userObj->all();
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Sufee Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Produk Masuk | Admin</title>

  <!-- styles -->
  <?php include './includes/style.php'; ?>
</head>

<body>


  <!-- Left Panel -->
  <?php include './includes/sidebar.php'; ?>
  <!-- Left Panel -->

  <!-- Right Panel -->
  <div id="right-panel" class="right-panel">
    <!-- Header-->
    <?php include './includes/header.php'; ?>
    <!-- Header-->

    <div class="breadcrumbs">
      <div class="col-sm-4">
        <div class="page-header float-left">
          <div class="page-title">
            <h1>Edit Data Produk Masuk</h1>
          </div>
        </div>
      </div>

      <div class="col-sm-8">
        <div class="page-header float-right">
          <div class="page-title">
            <ol class="breadcrumb text-right">
              <li><a href="./index.php">Dashboard</a></li>
              <li class="active">Produk Masuk</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content mt-3">
      <div class="animated fadeIn">
        <div class="row">

          <div class="col-12">
            <div class="card">
              <div class="card-body card-block">
                <form action="./product_income_controller.php" method="POST">
                  <!-- hidden inputs -->
                  <input type="hidden" name="id" value="<?= $income['id']; ?>" />

                  <!-- visible inputs -->
                  <div class="form-group">
                    <label for="date" class="form-control-label">Tangal Masuk</label>
                    <input type="date" name="date" id="date" value="<?= $income['date']; ?>" class="form-control" required />
                  </div>

                  <div class="form-group">
                    <label for="invoice_number" class="form-control-label">No Invoice</label>
                    <input type="text" name="invoice_number" id="invoice_number" value="<?= $income['invoice_number']; ?>" class="form-control" required />
                  </div>

                  <div class="form-group">
                    <label for="product_id" class="form-control-label">Nama Produk</label>
                    <select name="product_id" id="product_id" class="form-control">
                      <option>Pilih Produk</option>
                      <?php foreach ($products as $product) : ?>
                        <option value="<?= $product['id']; ?>" <?= $product['id'] == $income['product_id'] ? 'selected' : ''; ?>>
                          <?= $product['name']; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="supplier_id" class="form-control-label">Nama Supplier</label>
                    <select name="supplier_id" id="supplier_id" class="form-control" required>
                      <option>Pilih Supplier</option>
                      <?php foreach ($suppliers as $supplier) : ?>
                        <option value="<?= $supplier['id']; ?>" <?= $supplier['id'] == $income['supplier_id'] ? 'selected' : ''; ?>>
                          <?= $supplier['name']; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="qty" class="form-control-label">Jumlah Produk Masuk</label>
                    <input type="number" min="0" name="qty" id="qty" value="<?= $income['qty']; ?>" class="form-control" required />
                  </div>

                  <div class="form-group">
                    <label for="user_id" class="form-control-label">Nama Petugas</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                      <option>Pilih Petugas</option>
                      <?php foreach ($users as $user) : ?>
                        <option value="<?= $user['id']; ?>" <?= $user['id'] == $income['officer_id'] ? 'selected' : ''; ?>>
                          <?= $user['name']; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <button name="proses" value="update" type="submit" class="btn btn-warning">
                    <i class="fa fa-edit"></i>&nbsp; Update
                  </button>
                </form>
              </div>

            </div>
          </div>

        </div>
      </div><!-- .animated -->

    </div> <!-- .content -->
  </div>
  <!-- Right Panel -->

  <!-- scripts -->
  <?php include './includes/script.php'; ?>
</body>

</html>