<?php
namespace DAL;

include_once __DIR__ . "/Connection.php";
include_once __DIR__ . "/../MODEL/Imovel.php";

class Imovel
{
  public function Select()
  {
    $sql = "SELECT * FROM imovel";
    $con = Connection::Connect();
    $data = $con->query($sql);

    $seeImovel = [];

    foreach ($data as $line) {
      $imovel = new \MODEL\Imovel();

      $imovel->setId($line["id"]);
      $imovel->setEndereco($line["endereco"]);
      $imovel->setPreco($line["preco"]);
      $imovel->setImagem($line["imagem"]);
      $imovel->setTipoImovel($line["tipoImovel"]);
      $imovel->setPropietario($line["propietario"]);
      $imovel->setCorretor($line["corretor"]);

      $seeImovel[] = $imovel;
    }

    Connection::Disconnect();
    return $seeImovel;
  }

  public function Insert(\MODEL\Imovel $imovel)
  {
    $sql = "INSERT INTO imovel
        (endereco, preco, imagem, tipoImovel, propietario, corretor)
        VALUES (?, ?, ?, ?, ?, ?)";

    $con = Connection::Connect();
    $query = $con->prepare($sql);

    $result = $query->execute([
      $imovel->getEndereco(),
      $imovel->getPreco(),
      $imovel->getImagem(),
      $imovel->getTipoImovel(),
      $imovel->getPropietario(),
      $imovel->getCorretor(),
    ]);

    Connection::Disconnect();
    return $result;
  }

  public function SelectById(int $id)
  {
    $sql = "SELECT * FROM imovel WHERE id = ?";
    $con = Connection::Connect();
    $query = $con->prepare($sql);
    $query->execute([$id]);

    $data = $query->fetch(\PDO::FETCH_ASSOC);

    Connection::Disconnect();

    $imovel = new \MODEL\Imovel();

    if ($data) {
      $imovel->setId($data["id"]);
      $imovel->setEndereco($data["endereco"]);
      $imovel->setPreco($data["preco"]);
      $imovel->setImagem($data["imagem"]);
      $imovel->setTipoImovel($data["tipoImovel"]);
      $imovel->setPropietario($data["propietario"]);
      $imovel->setCorretor($data["corretor"]);
    }

    return $imovel;
  }

  public function Update(\MODEL\Imovel $imovel)
  {
    $sql = "UPDATE imovel
                SET endereco = ?,
                    preco = ?,
                    imagem = ?,
                    tipoImovel = ?,
                    propietario = ?,
                    corretor = ?
                WHERE id = ?";

    $con = Connection::Connect();
    $query = $con->prepare($sql);

    $result = $query->execute([
      $imovel->getEndereco(),
      $imovel->getPreco(),
      $imovel->getImagem(),
      $imovel->getTipoImovel(),
      $imovel->getPropietario(),
      $imovel->getCorretor(),
      $imovel->getId(),
    ]);

    Connection::Disconnect();
    return $result;
  }

  public function Delete(int $id)
  {
    $sql = "DELETE FROM imovel WHERE id = ?";

    $con = Connection::Connect();
    $query = $con->prepare($sql);

    $result = $query->execute([$id]);

    Connection::Disconnect();
    return $result;
  }
}
?>
