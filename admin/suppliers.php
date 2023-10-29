<?php
require './env.php';
require './models/Supplier.php';

$model = new Supplier();
$reports = $model->all();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Sufee Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Suppliers | Admin</title>

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
            <h1>Suppliers</h1>
          </div>
        </div>
      </div>

      <div class="col-sm-8">
        <div class="page-header float-right">
          <div class="page-title">
            <ol class="breadcrumb text-right">
              <li><a href="./index.php">Dashboard</a></li>
              <li class="active">Suppliers</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content mt-3">
      <div class="animated fadeIn">
        <div class="row">

          <div class="col-md-12">
            <a href="./suppliers_create.php" class="btn btn-primary">
              <i class="fa fa-plus"></i>&nbsp; Tambah Supplier
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
                      <th>Nama Supplier</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>No Telepon</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($reports as $sup) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $sup['name']; ?></td>
                        <td><?= $sup['email']; ?></td>
                        <td><?= $sup['address']; ?></td>
                        <td><?= $sup['contact_number']; ?></td>
                        <td>
                          <a href="./suppliers_show.php?id=<?= $sup['id']; ?>" class="btn btn-primary btn-sm">
                            <i class="fa fa-eye"></i>
                          </a>

                          <a href="./suppliers_create.php?idedit=<?= $sup['id'] ?>" class="btn btn-danger btn-sm">
                            <i class="fa fa-edit"></i>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>

              </div>
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