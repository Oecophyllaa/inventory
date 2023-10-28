<?php
require './env.php';
require './models/Product.php';

$model = new Products();
$reports = $model->all();
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
            <h1>Produk </h1>
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

          <div class="col-md-12">
          <a href="./product_tambah.php" class="btn btn-primary">
              <i class="fa fa-plus"></i>&nbsp; Tambah Data
            </a>
            <div class="card">
              <div class="card-header">
                <strong class="card-title">Data Table</strong>
              </div>
              <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Nama Produk</th>
                      <th>Stock</th>
                      <th>Kategori</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($reports as $r) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $r['code']; ?></td>
                        <td><?= $r['name']; ?></td>
                        <td><?= $r['stok']; ?></td>
                        <td><?= $r['category']; ?></td>
                        <td>
                        <form action="product_controller.php" method="POST">
                          <a href="./product_detail.php?id=<?= $r['id']; ?>" class="btn btn-primary btn-sm">
                            <i class="fa fa-eye"></i>
                          </a>
                          <a href="./product_tambah.php?idedit=<?= $r['id']?>" class="btn btn-danger btn-sm">
                          ✍️
                          </a>
                          <button type="submit" class="btn btn-warning btn-sm" name="proses" value="hapus" 
                              onclick="return confirm('anda Yakin akan menghapus')" >🗑️</button>
                              <input type="hidden" name="idx" value="<?= $r ['id']?> ">
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