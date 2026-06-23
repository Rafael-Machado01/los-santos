<?php
namespace DAL;

include_once __DIR__ . "/Connection.php";
include_once __DIR__ . "/../MODEL/TipoImovel.php";

class TipoImovel
{
  public function Select()
  {
    $sql = "SELECT * FROM tipoImovel";
    $con = Connection::Connect();
    $data = $con->query($sql);
    $con = Connection::Disconnect();

    foreach ($data as $line) {
      $tipoImovel = new \MODEL\TipoImovel();

      $tipoImovel->setId($line["id"]);
      $tipoImovel->setDescricao($line["descricao"]);

      $seeTipoImovel[] = $tipoImovel;
    }

    return $seeTipoImovel;
  }
  public function SelectById(int $id)
  {
    $sql = "SELECT * FROM tipoImovel WHERE id=?";
    $con = Connection::Connect();
    $query = $con->prepare($sql);
    $query->execute([$id]);
    $data = $query->fetch(\PDO::FETCH_ASSOC);
    $con = Connection::Disconnect();
    $tipoImovel = new \MODEL\TipoImovel();
    $tipoImovel->setId($data["id"]);
    $tipoImovel->setDescricao($data["descricao"]);
    return $tipoImovel;
  }
}
?>
