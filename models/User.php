<?php

class User
{
  private $conn;
  public function __construct()
  {
    global $dbh;
    $this->conn = $dbh;
  }

  public function all()
  {
    $sql = "SELECT du.*, u.* FROM detail_user du INNER JOIN users u ON du.users_id = u.id;";
    $ps = $this->conn->prepare($sql);
    $ps->execute();
    $res = $ps->fetchAll();

    return $res;
  }

  public function find($id)
  {
    // 
  }
}
