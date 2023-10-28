<?php
require './env.php';
require './models/ProductOutcome.php';

$date = $_POST['date'];
$invoice_number = $_POST['invoice_number'];
$product_id = $_POST['product_id'];
$qty = $_POST['qty'];
$officer_id = $_POST['officer_id'];

$data = [
  $date, $invoice_number, $product_id, $qty, $officer_id
];

$model = new product_outcome();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
  case 'simpan':
    $model->simpan($data);
    break;
  case 'ubah': 
    $data[] = $_POST['idx']; $model->ubah($data);
    break;
  case 'hapus': unset($data);
    $data[] = $_POST['idx'];
    $model->hapus($data); 
    break;

  default:
    header('location:product_outcome.php');
    break;
}
header('location:product_outcome.php');
