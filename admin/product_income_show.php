<?php
session_start();

if (!isset($_SESSION['login'])) {
  header('Location:login.php');
  exit;
}

require './env.php';
require './models/ProductIncome.php';

$id = $_REQUEST['id'];
$model = new ProductIncome();
$data = $model->find($id);
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
            <h1>Detail Produk Masuk > <strong><?= $data['id']; ?></strong></h1>
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
                <div class="form-group">
                  <label for="date" class="form-control-label">Tangal Masuk</label>
                  <input type="text" id="date" value="<?= $data['date']; ?>" class="form-control" readonly />
                </div>

                <div class="form-group">
                  <label for="date" class="form-control-label">No Invoice</label>
                  <input type="text" id="date" value="<?= $data['invoice_number']; ?>" class="form-control" readonly />
                </div>

                <div class="form-group">
                  <label for="date" class="form-control-label">Nama Produk</label>
                  <input type="text" id="date" value="<?= $data['nama_produk']; ?>" class="form-control" readonly />
                </div>

                <div class="form-group">
                  <label for="date" class="form-control-label">Nama Supplier</label>
                  <input type="text" id="date" value="<?= $data['nama_supplier']; ?>" class="form-control" readonly />
                </div>

                <div class="form-group">
                  <label for="date" class="form-control-label">Jumlah</label>
                  <input type="text" id="date" value="<?= $data['qty']; ?>" class="form-control" readonly />
                </div>

                <div class="form-group">
                  <label for="date" class="form-control-label">Petugas</label>
                  <input type="text" id="date" value="<?= $data['nama_petugas']; ?>" class="form-control" readonly />
                </div>
              </div>
            </div>

            <a href="./product_income.php" class="btn btn-primary">
              <i class="fa fa-mail-reply"></i>&nbsp; Kembali
            </a>
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