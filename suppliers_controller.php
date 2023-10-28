<?php
require './env.php';
require './models/Supplier.php';

$nama_supplier = $_POST['nama_supplier'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$contact_number = $_POST['contact_number'];

$data = [
  $nama_supplier, $email, $alamat, $contact_number
];

$model = new Supplier();
$tombol = $_REQUEST['proses'];

switch ($tombol) {
  case 'simpan':
    $model->store($data);
    break;
    case 'ubah' : $data[] = $_POST['idx']; $model->ubah($data); break;
    case 'hapus': unset($data);
    $data[] = $_POST['idx'];
    $model->hapus($data);break;

  default:
    header('Location:suppliers.php');
    break;
}
header('Location:suppliers.php');
