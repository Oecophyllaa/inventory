<?php
session_start();

if (!isset($_SESSION['login'])) {
  header('Location:login.php');
  exit;
}

require './env.php';
require './models/ProductIncome.php';

$model = new ProductIncome();
$reports = $model->all();
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
            <h1>Produk Masuk</h1>
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

          <div class="col-md-12">
            <a href="./product_income_create.php" class="btn btn-primary">
              <i class="fa fa-plus"></i>&nbsp; Tambah Data
            </a>

            <div class="card mt-2">
              <div class="card-header">
                <strong class="card-title">Data Table</strong>
              </div>
              <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Masuk</th>
                      <th>No Invoice</th>
                      <th>Nama Produk</th>
                      <th>Nama Supplier</th>
                      <th>Jumlah</th>
                      <th>Petugas</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($reports as $report) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $report['date']; ?></td>
                        <td><?= $report['invoice_number']; ?></td>
                        <td><?= $report['nama_produk']; ?></td>
                        <td><?= $report['nama_supplier']; ?></td>
                        <td><?= $report['qty']; ?></td>
                        <td><?= $report['nama_petugas']; ?></td>
                        <td>
                          <a href="./product_income_show.php?id=<?= $report['id']; ?>" class="btn btn-info btn-sm" title="detail">
                            <i class="fa fa-eye"></i>
                          </a>

                          <a href="./product_income_edit.php?id=<?= $report['id']; ?>" class="btn btn-warning btn-sm" title="edit">
                            <i class="fa fa-edit"></i>
                          </a>

                          <form action="./product_income_controller.php" method="post" class="d-inline">
                            <input type="hidden" name="id" value="<?= $report['id']; ?>" />
                            <button type="submit" name="proses" value="delete" class="btn btn-danger btn-sm" onclick="return confirm('data dihapus permanen?');" title="delete">
                              <i class="fa fa-trash-o"></i>
                            </button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
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