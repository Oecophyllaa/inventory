<?php

class Supplier
{
  private $env;
  public function __construct()
  {
    global $dbh;
    $this->conn = $dbh;
  }

  public function all()
  {
    $sql = "SELECT * FROM suppliers";
    $ps = $this->conn->prepare($sql);
    $ps->execute();
    $res = $ps->fetchAll();

    return $res;
  }

  public function find($id)
  {
    $sql = "SELECT * FROM suppliers WHERE id=? ;";
    $ps = $this->conn->prepare($sql);
    $ps->execute([$id]);
    $res = $ps->fetch();

    return $res;
  }

  public function store($data)
  {
    // $sql = "INSERT INTO suppliers (nama_supplier, email, alamat, contact_number) VALUES 
    //   (?, ?, ?, ?);";
    $sql = "INSERT INTO suppliers (name, email, address, contact_number) VALUES (?, ?, ?, ?);";
    $ps = $this->conn->prepare($sql);
    $ps->execute($data);
  }

  public function ubah($data)
  {
    $sql = "UPDATE suppliers SET  name=?, email= ?, address=?, contact_number=? WHERE id=?";
    $ps = $this->conn->prepare($sql);
    $ps->execute($data);
  }

  public function hapus($data)
  {
    $sql = "DELETE FROM suppliers WHERE id=?";
    $ps = $this->conn->prepare($sql);
    $ps->execute($data);
  }
}
