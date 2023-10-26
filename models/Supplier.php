<?php

class Supplier
{
  private $env;
  public function __construct()
  {
    global $dbh;
    $this->env = $dbh;
  }

  public function all()
  {
    $sql = "SELECT * FROM suppliers";
    $ps = $this->env->prepare($sql);
    $ps->execute();
    $res = $ps->fetchAll();

    return $res;
  }

  public function find($id)
  {
    $sql = "SELECT s.id, s.name AS nama_supplier, s.email, s.address as alamat, s.contact_number, pi.*, p.name AS nama_produk, u.username, du.name AS nama_petugas FROM suppliers s INNER JOIN product_income pi ON pi.supplier_id = s.id INNER JOIN products p ON pi.product_id = p.id INNER JOIN users u ON pi.officer_id = u.id INNER JOIN detail_user du ON u.id = du.users_id WHERE s.id = ?";
    $ps = $this->env->prepare($sql);
    $ps->execute([$id]);
    $res = $ps->fetch();

    return $res;
  }

  public function store($data)
  {
   // $sql = "INSERT INTO suppliers (nama_supplier, email, alamat, contact_number) VALUES 
    // (?, ?, ?, ?);";
    $sql = "INSERT INTO suppliers (name, email, address, contact_number) VALUES (?, ?, ?, ?);";
    $ps = $this->env->prepare($sql);
    $ps->execute($data);
  }
}
