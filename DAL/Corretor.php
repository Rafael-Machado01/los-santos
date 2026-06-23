<?php
namespace DAL;
include_once __DIR__ . "/Connection.php";
include_once __DIR__ . "/../MODEL/Corretor.php";

class Corretor
{
  public function Select()
  {
    $sql = "SELECT * FROM corretor";
    $con = Connection::Connect();
    $data = $con->query($sql);
    $con = Connection::Disconnect();

    foreach ($data as $line) {
      $corretor = new \MODEL\Corretor();
      $corretor->setCpf($line["cpf"]);
      $corretor->setNome($line["nome"]);
      $corretor->setTelefone($line["telefone"]);
      $corretor->setImagem($line["imagem"]);

      $seeCorretor[] = $corretor;
    }
    return $seeCorretor;
  }

  public function Insert(\MODEL\Corretor $corretor)
  {
    $sql = "INSERT INTO corretor (cpf,nome,telefone,imagem)
      VALUES ('{$corretor->getCpf()}', '{$corretor->getNome()}', '{$corretor->getTelefone()}','{$corretor->getImagem()}'); ";
    $con = Connection::Connect();
    $result = $con->query($sql);
    $con = Connection::Disconnect();

    echo $result->errorCode();
    return $result;
  }

  public function SelectByCpf(string $cpf)
  {
    $sql = "SELECT * FROM corretor WHERE cpf=?";
    $con = Connection::Connect();
    $query = $con->prepare($sql);
    $query->execute([$cpf]);
    $data = $query->fetch(\PDO::FETCH_ASSOC);
    $con = Connection::Disconnect();

    $corretor = new \MODEL\Corretor();
    $corretor->setCpf($data["cpf"]);
    $corretor->setNome($data["nome"]);
    $corretor->setTelefone($data["telefone"]);
    $corretor->setImagem($data["imagem"]);
    return $corretor;
  }

  public function Update(\MODEL\Corretor $corretor)
  {
    $sql =
      "UPDATE corretor SET nome = ?, telefone = ?, imagem = ? WHERE cpf = ?; ";
    $con = Connection::Connect();
    $query = $con->prepare($sql);
    $result = $query->execute([
      $corretor->getNome(),
      $corretor->getTelefone(),
      $corretor->getImagem(),
      $corretor->getCpf(),
    ]);
    $con = Connection::Disconnect();

    return $result;
  }
  public function Delete(int $cpf)
  {
    $sql = "DELETE FROM corretor WHERE cpf = ?;";
    $con = Connection::Connect();
    $query = $con->prepare($sql);
    $result = $query->execute([$cpf]);
    $con = Connection::Disconnect();

    return $result;
  }
}
?>
