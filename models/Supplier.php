<?php

class Suppliers
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
}
