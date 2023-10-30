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
    $sql = "SELECT du.*, u.* FROM detail_user du INNER JOIN users u ON du.users_id = u.id WHERE u.id=? ;";
    $ps = $this->conn->prepare($sql);
    $ps->execute([$id]);
    $res = $ps->fetch();

    return $res;
  }

  public function find_username($username_email)
  {
    $sql = "SELECT du.*, u.* FROM detail_user du INNER JOIN users u ON du.users_id = u.id WHERE u.username=? OR u.email=? ;";
    $ps = $this->conn->prepare($sql);
    $ps->execute([$username_email, $username_email]);
    $res = $ps->fetch();

    return $res;
  }

  public function login($username_email, $password)
  {
    $sql = "SELECT * FROM users WHERE username=? OR email=? AND password=? ;";
    $ps = $this->conn->prepare($sql);
    $ps->execute([$username_email, $username_email, md5(sha1(sha1($password)))]);
    $res = $ps->fetch();

    if (empty($res)) {
      return false;
    }

    return true;
  }
}
