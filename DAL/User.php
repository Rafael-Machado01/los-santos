<?php
namespace DAL;

include_once __DIR__ . "/Connection.php";
include_once __DIR__ . "/../MODEL/User.php";

class User
{
  public function SelectByUser(string $user)
  {
    $sql = "SELECT * FROM login WHERE user=?;";
    $con = Connection::Connect();
    $query = $con->prepare($sql);
    $query->execute([$user]);
    $data = $query->fetch(\PDO::FETCH_ASSOC);
    $con = Connection::Disconnect();

    $user = new \MODEL\User();
    $user->setId($data["id"]);
    $user->setUser($data["user"]);
    $user->setPassword($data["password"]);

    return $user;
  }
}
?>
