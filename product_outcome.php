<?php
include_once 'env.php';
include_once './models/ProductOutcome.php';

$model = new product_outcome();
$datakeluar = $model->dataoutcome();
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
  <?php include 'includes/sidebar.php'; ?>
  <!-- Left Panel -->

  <!-- Right Panel -->
  <div id="right-panel" class="right-panel">
    <!-- Header-->
    <?php include 'includes/header.php'; ?>
    <!-- Header-->

    <div class="breadcrumbs">
      <div class="col-sm-4">
        <div class="page-header float-left">
          <div class="page-title">
            <h1>Produk Keluar</h1>
          </div>
        </div>
      </div>

      <div class="col-sm-8">
        <div class="page-header float-right">
          <div class="page-title">
            <ol class="breadcrumb text-right">
              <li><a href="index.php">Dashboard</a></li>
              <li class="active">Produk Keluar</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content mt-3">
      <div class="animated fadeIn">
        <div class="row">

          <div class="col-md-12">
            <a href="./product_outform.php" class="btn btn-primary">
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
                      <th>Tanggal Keluar</th>
                      <th>No Invoice</th>
                      <th>ID product</th>
                      <th>Quantity</th>
                      <th>Officer ID</th>
                      <th>nama_produk</th>
                      <th>Username</th>
                      <th>Nama Petugas</th>
                      <th>Aksi</th>
                      
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($datakeluar as $out) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $out['date']; ?></td>
                        <td><?= $out['invoice_number']; ?></td>
                        <td><?= $out['product_id']; ?></td>
                        <td><?= $out['qty']; ?></td>
                        <td><?= $out['officer_id']; ?></td>
                        <td><?= $out['nama_produk']; ?></td>
                        <td><?= $out['username']; ?></td>
                        <td><?= $out['nama_petugas']; ?></td>
                        <td>
                        <form action="product_outcome_controller.php" method="POST">
                          <a href="./product_outdetail.php?id=<?= $out['id']; ?>" class="btn btn-primary btn-sm">
                            <i class="fa fa-eye"></i>
                          </a>
                          <a href="./product_outform.php?&idedit=<?= $out['id']?>" class="btn btn-warning btn-sm mt-2 ">
                          <i class="fa fa-pencil"></i>
                          </a>
                          <button type="submit" class="btn btn-danger mt-2 btn-sm fa fa-trash-o" name="proses" value="hapus" 
                              onclick="return confirm('Apakah Anda yakin untuk menghapus !!')" ></button>
                              <input type="hidden" name="idx" value="<?= $out ['id']?> ">


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
  <?php include 'includes/script.php'; ?>
</body>

</html>