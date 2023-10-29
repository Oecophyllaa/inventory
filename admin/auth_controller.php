<?php
require './env.php';
require './models/User.php';

$username_email = $_POST['username_email'];
$password = $_POST['password'];

$user = new User();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
  case 'login':
    $auth = $user->login($username_email, $password);
    $auth ? header('Location:index.php') : header('Location:../index.php');
    break;

  case 'logout':
    unset($_POST);
    header('Location:../index.php');
    break;

  default:
    header('Location:../index.php');
    break;
}
