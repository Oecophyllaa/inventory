<?php
// ini hanya file contoh
// copy dan ubah nama file ini menjadi env.php
// dan jangan lupa untuk sesuaikan dengan 
// database name dan credentials milik kalian

$dbname = "db_app";
$dsn = "mysql:dbname=$dbname;host=localhost";
$user = 'root';
$password = '';

try {
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo 'Database Connected!';
} catch (PDOException $e) {
  echo 'Connection Error, ' . $e->getMessage();
}
