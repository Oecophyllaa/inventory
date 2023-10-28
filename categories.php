<?php
require './env.php';
require './models/Category.php';

$model = new Categories();
$reports = $model->all();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Sufee Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Jenis Produk | Admin</title>

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
            <h1>Jenis Produk</h1>
          </div>
        </div>
      </div>

      <div class="col-sm-8">
        <div class="page-header float-right">
          <div class="page-title">
            <ol class="breadcrumb text-right">
              <li><a href="./index.php">Dashboard</a></li>
              <li class="active">Jenis Produk</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content mt-3">
      <div class="animated fadeIn">
        <div class="row">

        <div class="col-md-12">
            <a href="./categories_create.php" class="btn btn-primary">
              <i class="fa fa-plus"></i>&nbsp; Tambah Data
            </a>

            <div class="card mt-3">
              <div class="card-header">
                <strong class="card-title">Data Table</strong>
              </div>
              <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kategori</th>
                      <th>Slug</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($reports as $report) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $report['name']; ?></td>
                        <td><?= $report['slug']; ?></td>
                        <td>
                        <form action="categories_controller.php" method="POST">
                            <a href="./categories_show.php?id=<?= $report['id']; ?>" class="btn btn-primary btn-sm">
                            <i class="fa fa-eye"></i>
                            
                            <a href="./categories_create.php?id=<?= $report['id']; ?>" class="btn btn-primary btn-sm">
                            <i class="fa fa-eye"></i>
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