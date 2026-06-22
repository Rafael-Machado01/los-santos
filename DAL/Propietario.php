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

  public function SelectByCpf(int $cpf)
  {
    $sql = "SELECT * FROM propietario WHERE cpf=?";
    $con = Connection::Connect();
    $query = $con->prepare($sql);
    $query->execute([$cpf]);
    $data = $query->fetch(\PDO::FETCH_ASSOC);
    $con = Connection::Disconnect();

    $propietario = new \MODEL\Propietario();
    $propietario->setCpf($data["cpf"]);
    $propietario->setNome($data["nome"]);
    $propietario->setTelefone($data["telefone"]);
    return $propietario;
  }

  public function Update(\MODEL\Propietario $propietario)
  {
    $sql = "UPDATE propietario SET nome = ?, telefone = ? WHERE cpf = ?; ";
    $con = Connection::Connect();
    $query = $con->prepare($sql);
    $result = $query->execute([
      $propietario->getNome(),
      $propietario->getTelefone(),
      $propietario->getCpf(),
    ]);
    $con = Connection::Disconnect();

    return $result;
  }
  public function Delete(int $cpf)
  {
    $sql = "DELETE FROM propietario WHERE cpf = ?;";
    $con = Connection::Connect();
    $query = $con->prepare($sql);
    $result = $query->execute([$cpf]);
    $con = Connection::Disconnect();

    return $result;
  }
}
?>
