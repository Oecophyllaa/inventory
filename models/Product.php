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
}
