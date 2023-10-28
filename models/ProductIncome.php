<?php

class ProductIncome
{
  private $conn;
  public function __construct()
  {
    global $dbh;
    $this->conn = $dbh;
  }

  public function all()
  {
    $sql = "SELECT pi.*, p.name AS nama_produk, s.name AS nama_supplier, u.username, du.name AS nama_petugas FROM (((product_income pi INNER JOIN products p ON pi.product_id = p.id) INNER JOIN suppliers s ON pi.supplier_id = s.id) INNER JOIN users u ON pi.officer_id = u.id INNER JOIN detail_user du ON du.users_id = u.id);";
    $ps = $this->conn->prepare($sql);
    $ps->execute();
    $res = $ps->fetchAll();

    return $res;
  }

  public function find($id)
  {
    $sql = "SELECT pi.*, p.name AS nama_produk, s.name AS nama_supplier, u.username, du.name AS nama_petugas FROM (((product_income pi INNER JOIN products p ON pi.product_id = p.id) INNER JOIN suppliers s ON pi.supplier_id = s.id) INNER JOIN users u ON pi.officer_id = u.id INNER JOIN detail_user du ON du.users_id = u.id) WHERE pi.id=?;";
    $ps = $this->conn->prepare($sql);
    $ps->execute([$id]);
    $res = $ps->fetch();

    return $res;
  }

  public function store($data)
  {
    $sql = "INSERT INTO product_income (date, invoice_number, product_id, supplier_id, qty, officer_id) VALUES 
      (?, ?, ?, ?, ?, ?);";
    $ps = $this->conn->prepare($sql);
    $ps->execute($data);
  }

  public function update($data)
  {
    $sql = "UPDATE product_income SET date=?, invoice_number=?, product_id=?, supplier_id=?, qty=?, officer_id=? WHERE id=? ;";
    $ps = $this->conn->prepare($sql);
    $ps->execute($data);
  }

  public function destroy($data)
  {
    $sql = "DELETE FROM product_income WHERE id=? ;";
    $ps = $this->conn->prepare($sql);
    $ps->execute($data);
  }
}
