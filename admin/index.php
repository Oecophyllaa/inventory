<?php
session_start();

if (!isset($_SESSION['login'])) {
  header('Location:login.php');
  exit;
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Sufee Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Admin</title>

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
            <h1>Dashboard</h1>
          </div>
        </div>
      </div>

      <div class="col-sm-8">
        <div class="page-header float-right">
          <div class="page-title">
            <ol class="breadcrumb text-right">
              <li class="active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content mt-3">
      <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
          <div class="card-body pb-0">
            <h4 class="mb-0">
              <span class="count">10468</span>
            </h4>
            <p class="text-light">Members online</p>

            <div class="chart-wrapper px-0" style="height:70px;" height="70">
              <canvas id="widgetChart1"></canvas>
            </div>

          </div>

        </div>
      </div>
      <!--/.col-->

      <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
          <div class="card-body pb-0">
            <h4 class="mb-0">
              <span class="count">10468</span>
            </h4>
            <p class="text-light">Members online</p>

            <div class="chart-wrapper px-0" style="height:70px;" height="70">
              <canvas id="widgetChart2"></canvas>
            </div>

          </div>
        </div>
      </div>
      <!--/.col-->

      <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
          <div class="card-body pb-0">
            <h4 class="mb-0">
              <span class="count">10468</span>
            </h4>
            <p class="text-light">Members online</p>

          </div>

          <div class="chart-wrapper px-0" style="height:70px;" height="70">
            <canvas id="widgetChart3"></canvas>
          </div>
        </div>
      </div>
      <!--/.col-->

      <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
          <div class="card-body pb-0">
            <h4 class="mb-0">
              <span class="count">10468</span>
            </h4>
            <p class="text-light">Members online</p>

            <div class="chart-wrapper px-3" style="height:70px;" height="70">
              <canvas id="widgetChart4"></canvas>
            </div>

          </div>
        </div>
      </div>
      <!--/.col-->


    </div> <!-- .content -->
  </div>
  <!-- Right Panel -->

  <!-- scripts -->
  <?php include './includes/script.php'; ?>
</body>

</html>