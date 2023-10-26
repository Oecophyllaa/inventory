<?php
$dsn = 'mysql:dbname=inventori;host=localhost';
$user = 'root';
$password = '';

try {
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo 'Database Connected!';
} catch (PDOException $e) {
  echo 'Connection Error, ' . $e->getMessage();
}
