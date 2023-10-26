<?php
error_reporting(0);
require './env.php';
require './models/ProductOutcome.php';
require './models/Product.php';
require './models/Supplier.php';
require './models/User.php';

$productObj = new Products();
$supplierObj = new Supplier();
$userObj = new User();
$products = $productObj->all();
$suppliers = $supplierObj->all();
$users = $userObj->all();
$idedit = $_REQUEST ['idedit'];
$obj_out = new product_outcome();
if (!empty($idedit)){
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
            <h1>Data Produk Keluar</h1>
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
                    <input type="date" name="date" id="date" placeholder="masukkan tanggal masuk produk" class="form-control" value="<?= $out['date'] ?>" >
                  </div>

                  <div class="form-group">
                    <label for="invoice_number" class="form-control-label">No Invoice</label>
                    <input type="text" name="invoice_number" id="invoice_number" placeholder="masukkan no invoice masuk" class="form-control"  value="<?= $out['invoice_number'] ?>" >
                  </div>

                  <div class="form-group">
                    <label for="product_id" class="form-control-label">Nama Produk</label>
                    <select name="product_id" id="product_id" class="form-control" value="<?= $out['product_id'] ?>">
                      <option>Pilih Produk</option>
                      <?php foreach ($products as $product){ 
                        $sel = ($product['id'] == $product['product_id']) ? 'selected' : '';
                        ?>
                        <option value="<?= $product['id']; ?>"><?= $sel; ?><?=$product['name']; ?></option>
                      <?php  } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="qty" class="form-control-label">Jumlah Produk Keluar</label>
                    <input type="number" min="0" name="qty" id="qty" placeholder="masukkan jumlah produk yang keluar" class="form-control"  value="<?= $out['qty'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="officer_id" class="form-control-label">Officer id</label>
                    <input type="text" name="officer_id" id="officer_id" placeholder="masukkan officer id" class="form-control"  value="<?= $out['officer_id'] ?>">
                  </div>

                  <?php
                  if(empty($idedit)){ ?>
                    <button name="proses" value="simpan" type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i>&nbsp; Simpan
                  </button>
                  <?php } else {
                      ?>
                 <button type="submit" name="proses" value="ubah" class="btn btn-warning fa fa-pencil"> Ubah</button>
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