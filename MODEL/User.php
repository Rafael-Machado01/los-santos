<?php
namespace MODEL;
class User
{
  private ?int $id;
  private ?string $user;
  private ?string $password;

  public function __construct() {}

  public function getId()
  {
    return $this->id;
  }

  public function getUser()
  {
    return $this->user;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setId(int $id)
  {
    $this->id = $id;
  }

  public function setUser(string $user)
  {
    $this->user = $user;
  }
  public function setPassword(string $password)
  {
    $this->password = $password;
  }
}
?>
