<?php
namespace DAL;
include_once __DIR__ . "/Connection.php";
include_once __DIR__ . "/../MODEL/Propietario.php";

class Propietario
{
  public function Select()
  {
    $sql = "SELECT * FROM propietario";
    $con = Connection::Connect();
    $data = $con->query($sql);
    $con = Connection::Disconnect();

    foreach ($data as $line) {
      $propietario = new \MODEL\Propietario();
      $propietario->setCpf($line["cpf"]);
      $propietario->setNome($line["nome"]);
      $propietario->setTelefone($line["telefone"]);

      $seePropietario[] = $propietario;
    }
    return $seePropietario;
  }
  public function Insert(\MODEL\Propietario $propietario)
  {
    $sql = "INSERT INTO propietario (cpf,nome,telefone)
      VALUES ('{$propietario->getCpf()}', '{$propietario->getNome()}', '{$propietario->getTelefone()}'); ";
    $con = Connection::Connect();
    $result = $con->query($sql);
    $con = Connection::Disconnect();

    echo $result->errorCode();
    return $result;
  }
}
?>
