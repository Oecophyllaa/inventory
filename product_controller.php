<?php
require './env.php';
require './models/Product.php';

$code = $_POST['code'];
$name = $_POST['name'];
$stok = $_POST['stok'];
$category_id = $_POST['category_id'];


$data = [
  $code, $name, $stok, $category_id,
];

$model = new Products();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
  case 'simpan':
    $model->simpanData($data);
    break;
    case 'ubah' : $data[] = $_POST['idx']; $model->ubah($data); break;
    case 'hapus': unset($data);
    $data[] = $_POST['idx'];
    $model->hapus($data);break;

  default:
    header('Location:products.php');
    break;
}
header('Location:products.php');