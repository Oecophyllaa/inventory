<?php
require './env.php';
require './models/Category.php';

$categoriesObj = new Categories();
$categories = $categoriesObj->all();

$idedit = $_REQUEST ['idedit'];
$obj_categories = new Categories();
if (!empty($idedit)){
  $categorie = $obj_categories->find($idedit);
} else {
  $categorie = array();
}
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
            <h1>Tambah Data Jenis Produk</h1>
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
                <form action="./categories_controller.php" method="POST">
                    <div class="form-group">
                        <label for="name" class="form-control-label">Nama Kategori</label>
                        <input type="text" name="name" id="name" placeholder="Masukan Jenis Produk" class="form-control" required />
                    </div>

                    <div class="form-group">
                        <label for="slug" class="form-control-label">Slug</label>
                         <input type="text" name="slug" id="slug" placeholder="Masukan Slug"  class="form-control" required />
                    </div>
                  
                    <?php
                  if(empty($idedit)){ ?>
                    <button name="proses" value="simpan" type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i>&nbsp; Simpan
                  </button>
                  <?php } else {
                      ?>
                 <button type="submit" name="proses" value="ubah" class="btn btn-warning">Ubah</button>
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