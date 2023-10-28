<?php
require './env.php';
require './models/Category.php';

$name = $_POST['name'];
$slug = $_POST['slug'];
$data = [
  $name, $slug
];

$model = new Categories();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
  case 'simpan':
    $model->store($data);
    break;
  case 'ubah' : 
    $data[] = $_POST['idx'];
     $model->ubah($data); 
     break;

  default:
    header('Location:categories.php');
    break;
}
header('Location:categories.php');