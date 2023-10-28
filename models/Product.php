<?php

class Products
{
  private $conn;
  public function __construct()
  {
    global $dbh;
    $this->conn = $dbh;
  }

  public function all()
  {
    $sql = "SELECT p.*, c.name AS category FROM products p INNER JOIN categories c ON p.category_id = c.id  ";
    $ps = $this->conn->prepare($sql);
    $ps->execute();
    $res = $ps->fetchAll();

    return $res;
  }
  public function getProduct($id){
    $sql = "SELECT p.*, c.name AS category FROM products p INNER JOIN categories c ON p.category_id = c.id
    WHERE p.id = ?";
    //menggunakan mekanisme prepare statement PDO
    $ps = $this->conn->prepare($sql);
    $ps->execute([$id]);
    $rs = $ps->fetch();
    return $rs;
}
  public function detail($id){
    $sql = "SELECT p.*, c.name AS category FROM products p INNER JOIN categories c ON p.category_id = c.id
    WHERE p.id = ?";
    //menggunakan mekanisme prepare statement PDO
    $ps = $this->conn->prepare($sql);
    $ps->execute([$id]);
    $rs = $ps->fetch();
    return $rs;
  }
  public function simpanData($data){
    $sql = "INSERT INTO products (code, name,stok, category_id) VALUES (?,?,?,?)";
    $ps = $this->conn->prepare($sql);
    $ps->execute($data);
  
  }
  public function ubah($data){
    $sql = "UPDATE products SET code=?, name=?, stok= ?, category_id=? WHERE id=?";
     $ps = $this->conn->prepare($sql);
     $ps->execute($data);
 }
 public function hapus($data){
    $sql = "DELETE FROM products WHERE id=?";
    $ps = $this->conn->prepare($sql);
    $ps->execute($data);
 }
}
