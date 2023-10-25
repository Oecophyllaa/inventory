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
}
