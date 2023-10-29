<?php
require './env.php';
require './models/ProductIncome.php';

$date = $_POST['date'];
$invoice_number = $_POST['invoice_number'];
$product_id = $_POST['product_id'];
$supplier_id = $_POST['supplier_id'];
$qty = $_POST['qty'];
$user_id = $_POST['user_id'];

$data = [
  $date, $invoice_number, $product_id, $supplier_id, $qty, $user_id
];

$model = new ProductIncome();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
  case 'simpan':
    $model->store($data);
    break;

  case 'update':
    $data[] = $_POST['id'];
    $model->update($data);
    break;

  case 'delete':
    unset($data);
    $data[] = $_POST['id'];
    $model->destroy($data);
    break;

  default:
    header('Location:product_income.php');
    break;
}
header('Location:product_income.php');
