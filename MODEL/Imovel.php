<?php
namespace MODEL;

class Imovel
{
  private ?int $id;
  private ?string $endereco;
  private ?float $preco;
  private ?string $imagem;
  private ?int $tipoImovel;
  private ?string $propietario;
  private ?string $corretor;
  private ?int $status;

  public function __construct() {}

  public function getId()
  {
    return $this->id;
  }
  public function getEndereco()
  {
    return $this->endereco;
  }
  public function getPreco()
  {
    return $this->preco;
  }
  public function getImagem()
  {
    return $this->imagem;
  }
  public function getTipoImovel()
  {
    return $this->tipoImovel;
  }
  public function getPropietario()
  {
    return $this->propietario;
  }
  public function getCorretor()
  {
    return $this->corretor;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setId(int $id)
  {
    $this->id = $id;
  }
  public function setEndereco(string $endereco)
  {
    $this->endereco = $endereco;
  }
  public function setPreco(float $preco)
  {
    $this->preco = $preco;
  }
  public function setImagem(string $imagem)
  {
    $this->imagem = $imagem;
  }
  public function setTipoImovel(int $tipoImovel)
  {
    $this->tipoImovel = $tipoImovel;
  }
  public function setPropietario(string $propietario)
  {
    $this->propietario = $propietario;
  }
  public function setCorretor(string $corretor)
  {
    $this->corretor = $corretor;
  }
  public function setStatus(bool $status)
  {
    $this->status = $status;
  }
}
?>
