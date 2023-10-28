<?php

class Categories
{
  private $conn;
  public function __construct()
  {
    global $dbh;
    $this->conn = $dbh;
  }

  public function all()
  {
    $sql = "SELECT * FROM categories";
    $ps = $this->conn->prepare($sql);
    $ps->execute();
    $res = $ps->fetchAll();

    return $res;
  }

  public function find($id)
  {
    $sql = "SELECT * FROM categories WHERE categories.id=?;";
    $ps = $this->conn->prepare($sql);
    $ps->execute([$id]);
    $res = $ps->fetch();

    return $res;
  }

  public function store($data)
  {
    $sql = "INSERT INTO categories (name, slug) VALUES 
      (?, ?);";
    $ps = $this->conn->prepare($sql);
    $ps->execute($data);
  }

  public function ubah($data){
    $sql = "UPDATE categories SET  name=?, slug=? WHERE id=?";
     $ps = $this->conn->prepare($sql);
     $ps->execute($data);
 }
}
