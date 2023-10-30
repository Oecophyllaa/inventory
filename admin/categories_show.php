<?php
session_start();

if (!isset($_SESSION['login'])) {
  header('Location:login.php');
  exit;
}

if ($_SESSION['user']['role'] == 'PETUGAS') {
  header('Location:index.php');
  exit;
}

require './env.php';
require './models/Category.php';

$id = $_REQUEST['id'];
$model = new Categories();
$data = $model->find($id);
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
            <h1>Detail Jenis Produk > <strong><?= $data['id']; ?></strong></h1>
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

          <div class="col-12">
            <div class="card">
              <div class="card-body card-block">
                <div class="form-group">
                  <label for="name" class="form-control-label">Nama Kategori</label>
                  <input type="text" id="name" value="<?= $data['name']; ?>" class="form-control" readonly />
                </div>

                <div class="form-group">
                  <label for="slug" class="form-control-label">Slug</label>
                  <input type="text" id="slug" value="<?= $data['slug']; ?>" class="form-control" readonly />
                </div>

                <a href="./categories.php" class="btn btn-primary">
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