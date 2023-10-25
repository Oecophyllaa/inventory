<?php

class product_outcome
{
  private $conn;
  public function __construct()
  {
    global $dbh;
    $this->conn = $dbh;
  }

  public function dataoutcome()
  {
    $sql = "SELECT pi.*, p.name AS nama_produk, u.username, du.name AS nama_petugas FROM product_outcome pi INNER JOIN products p ON pi.product_id = p.id INNER JOIN users u ON pi.officer_id = u.id INNER JOIN detail_user du ON u.id = du.users_id;";
    $ps = $this->conn->prepare($sql);
    $ps->execute();
    $res = $ps->fetchAll();

    return $res;
  }
}
