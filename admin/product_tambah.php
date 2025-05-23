<?php
// error_reporting(0);
session_start();

if (!isset($_SESSION['login'])) {
  header('Location:login.php');
  exit;
}

require './env.php';
require './models/Product.php';
require './models/Category.php';


$productObj = new Products();
$categoryObj = new Categories();
$products = $productObj->all();
$categories = $categoryObj->all();
$idedit = $_REQUEST['idedit'];
$obj_product = new Products();
if (!empty($idedit)) {
  $product = $obj_product->getProduct($idedit);
} else {
  $product = array();
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Sufee Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Produk | Admin</title>

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
            <h1>Tambah Data Produk </h1>
          </div>
        </div>
      </div>

      <div class="col-sm-8">
        <div class="page-header float-right">
          <div class="page-title">
            <ol class="breadcrumb text-right">
              <li><a href="./index.php">Dashboard</a></li>
              <li class="active">Produk </li>
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
                <form action="./product_controller.php" method="POST">


                  <div class="form-group">
                    <label for="code" class="form-control-label">Code</label>
                    <input type="text" name="code" id="code" class="form-control" value="<?= $product['code'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="name" class="form-control-label">Nama Produk</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= $product['name'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="stok" class="form-control-label">stok</label>
                    <input type="text" name="stok" id="stok" class="form-control" value="<?= $product['stok'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="category_id" class="form-control-label">Nama Produk</label>
                    <select name="category_id" id="category_id" class="form-control">
                      <option>Pilih Produk</option>
                      <?php foreach ($categories as $category) {
                        $sel = ($category['id'] == $product['category_id']) ? 'selected' : '';
                      ?>
                        <option value="<?= $category['id']; ?>" <?= $sel; ?>><?= $category['name']; ?></option>


                      <?php } ?>
                    </select>
                  </div>
                  <?php
                  if (empty($idedit)) { ?>
                    <button name="proses" value="simpan" type="submit" class="btn btn-primary">
                      <i class="fa fa-save"></i>&nbsp; Simpan
                    </button>
                  <?php } else {
                  ?>
                    <button type="submit" name="proses" value="ubah" class="btn btn-warning">ubah</button>
                  <?php } ?>
                  <input type="hidden" name="idx" value="<?= $idedit; ?>">

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