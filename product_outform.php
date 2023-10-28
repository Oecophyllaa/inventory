<?php
// error_reporting(0);
require './env.php';
require './models/ProductOutcome.php';
require './models/Product.php';
require './models/Supplier.php';
require './models/User.php';

$obj_out = new product_outcome();
$productObj = new Products();
$supplierObj = new Supplier();
$userObj = new User();

$products = $productObj->all();
$suppliers = $supplierObj->all();
$users = $userObj->all();

$idedit = isset($_GET['idedit']) ? $_REQUEST['idedit'] : null;
if (!empty($idedit)) {
  $out = $obj_out->get($idedit);
} else {
  $out = array();
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Sufee Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Produk Keluar | Admin</title>

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
            <h1><?= empty($idedit) ? 'Tambah Data' : 'Update Data'; ?> Produk Keluar</h1>
          </div>
        </div>
      </div>

      <div class="col-sm-8">
        <div class="page-header float-right">
          <div class="page-title">
            <ol class="breadcrumb text-right">
              <li><a href="./index.php">Dashboard</a></li>
              <li class="active">Produk Keluar</li>
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
                <form action="./product_outcome_controller.php" method="POST">
                  <div class="form-group">
                    <label for="date" class="form-control-label">Tangal Keluar</label>
                    <?php if (empty($idedit)) : ?>
                      <input type="date" name="date" id="date" placeholder="masukkan tanggal keluar produk" class="form-control" required />
                    <?php else : ?>
                      <input type="date" name="date" id="date" value="<?= $out['date'] ?>" class="form-control" required />
                    <?php endif; ?>
                  </div>

                  <div class="form-group">
                    <label for="invoice_number" class="form-control-label">No Invoice</label>
                    <?php if (empty($idedit)) : ?>
                      <input type="text" name="invoice_number" id="invoice_number" placeholder="masukkan no invoice masuk" class="form-control" required />
                    <?php else : ?>
                      <input type="text" name="invoice_number" id="invoice_number" value="<?= $out['invoice_number'] ?>" class="form-control" required />
                    <?php endif; ?>
                  </div>

                  <div class="form-group">
                    <label for="product_id" class="form-control-label">Nama Produk</label>
                    <select name="product_id" id="product_id" class="form-control">
                      <option>Pilih Produk</option>
                      <?php if (empty($idedit)) : ?>
                        <?php foreach ($products as $product) : ?>
                          <option value="<?= $product['id']; ?>">
                            <?= $product['name']; ?>
                          </option>
                        <?php endforeach; ?>
                      <?php else : ?>
                        <?php foreach ($products as $product) : ?>
                          <option value="<?= $product['id']; ?>" <?= $product['id'] == $out['product_id'] ? 'selected' : ''; ?>>
                            <?= $product['name']; ?>
                          </option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="qty" class="form-control-label">Jumlah Produk Keluar</label>
                    <?php if (empty($idedit)) : ?>
                      <input type="number" min="0" name="qty" id="qty" placeholder="masukkan jumlah produk yang keluar" class="form-control" required />
                    <?php else : ?>
                      <input type="number" min="0" name="qty" id="qty" value="<?= $out['qty'] ?>" class="form-control" />
                    <?php endif; ?>
                  </div>

                  <div class="form-group">
                    <label for="officer_id" class="form-control-label">Officer id</label>
                    <?php if (empty($idedit)) : ?>
                      <input type="text" name="officer_id" id="officer_id" placeholder="masukkan officer id" class="form-control" required />
                    <?php else : ?>
                      <input type="text" name="officer_id" id="officer_id" value="<?= $out['officer_id'] ?>" class="form-control" />
                    <?php endif; ?>
                  </div>

                  <?php if (empty($idedit)) : ?>
                    <button name="proses" value="simpan" type="submit" class="btn btn-primary">
                      <i class="fa fa-save"></i>&nbsp; Simpan
                    </button>
                  <?php else : ?>
                    <input type="hidden" name="idx" value="<?= $idedit; ?>">
                    <button type="submit" name="proses" value="ubah" class="btn btn-warning fa fa-pencil"> Ubah</button>
                  <?php endif; ?>
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