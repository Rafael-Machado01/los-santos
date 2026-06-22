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
}
?>
