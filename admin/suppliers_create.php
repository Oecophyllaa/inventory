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
require './models/Supplier.php';

$supplierObj = new Supplier();
$suppliers = $supplierObj->all();

$idedit = isset($_GET['idedit']) ? $_REQUEST['idedit'] : null;
if (!empty($idedit)) {
  $supplier = $supplierObj->find($idedit);
} else {
  $supplier = array();
}
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
            <h1><?= empty($idedit) ? 'Tambah Data' : 'Update Data'; ?> Supplier</h1>
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

          <div class="col-12">
            <div class="card">
              <div class="card-body card-block">
                <form action="./suppliers_controller.php" method="POST">
                  <div class="form-group">
                    <label for="nama_supplier" class="form-control-label">Nama Suppliers</label>
                    <?php if (empty($idedit)) : ?>
                      <input type="text" name="nama_supplier" id="nama_supplier" placeholder="masukkan nama supplier" class="form-control" required />
                    <?php else : ?>
                      <input type="text" name="nama_supplier" id="nama_supplier" value="<?= $supplier['name'] ?>" class="form-control" required />
                    <?php endif; ?>
                  </div>

                  <div class="form-group">
                    <label for="email" class="form-control-label">Email</label>
                    <?php if (empty($idedit)) : ?>
                      <input type="text" name="email" id="email" placeholder="masukkan email" class="form-control" required />
                    <?php else : ?>
                      <input type="text" name="email" id="email" value="<?= $supplier['email'] ?>" class="form-control" required />
                    <?php endif; ?>
                  </div>

                  <div class="form-group">
                    <label for="alamat" class="form-control-label">Alamat</label>
                    <?php if (empty($idedit)) : ?>
                      <input type="text" name="alamat" id="alamat" placeholder="masukkan alamat" class="form-control" required />
                    <?php else : ?>
                      <input type="text" name="alamat" id="alamat" value="<?= $supplier['address'] ?>" class="form-control" required />
                    <?php endif; ?>
                  </div>

                  <div class="form-group">
                    <label for="contact_number" class="form-control-label">No Telepon</label>
                    <?php if (empty($idedit)) :  ?>
                      <input type="text" name="contact_number" id="contact_number" placeholder="masukkan no telepon" class="form-control" required />
                    <?php else : ?>
                      <input type="text" name="contact_number" id="contact_number" value="<?= $supplier['contact_number'] ?>" class="form-control" required />
                    <?php endif; ?>
                  </div>

                  <?php if (empty($idedit)) : ?>
                    <button name="proses" value="simpan" type="submit" class="btn btn-primary">
                      <i class="fa fa-save"></i>&nbsp; Simpan
                    </button>
                  <?php else : ?>
                    <input type="hidden" name="idx" value="<?= $idedit; ?>">
                    <button type="submit" name="proses" value="ubah" class="btn btn-warning">Ubah</button>
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