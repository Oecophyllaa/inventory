<?php
session_start();

if (isset($_SESSION['login'])) {
  header('Location:index.php');
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Inventory | Login</title>

  <!-- Styles -->
  <link rel="apple-touch-icon" href="apple-icon.png" />
  <link rel="shortcut icon" href="./assets/favicon.ico" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" />
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./assets/css/login.css" />
</head>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="assets/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="assets/images/logo.svg" alt="logo" class="logo">
              </div>

              <p class="login-card-description">Sign into your account</p>
              <form action="./auth_controller.php" method="post">
                <div class="form-group">
                  <label for="username_email" class="sr-only">Username / Email</label>
                  <input type="text" name="username_email" id="username_email" class="form-control" placeholder="Username / Email">
                </div>

                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                </div>

                <!-- <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login"> -->
                <button type="submit" name="proses" value="login" class="btn btn-block login-btn mb-4">
                  Login
                </button>
              </form>

              <a href="#!" class="forgot-password-link">Forgot password?</a>
              <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
              <nav class="login-card-footer-nav">
                <a href="#!">Terms of use.</a>
                <a href="#!">Privacy policy</a>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>