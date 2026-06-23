<?php
namespace MODEL;

class Corretor
{
  private ?string $cpf;
  private ?string $nome;
  private ?int $telefone;
  private ?string $imagem;

  public function __construct() {}

  public function getCpf()
  {
    return $this->cpf;
  }
  public function getNome()
  {
    return $this->nome;
  }
  public function getTelefone()
  {
    return $this->telefone;
  }
  public function setCpf(string $cpf)
  {
    $this->cpf = $cpf;
  }
  public function setNome(string $nome)
  {
    $this->nome = $nome;
  }
  public function setTelefone(int $telefone)
  {
    $this->telefone = $telefone;
  }
  public function getImagem()
  {
    return $this->imagem;
  }
  public function setImagem(string $imagem)
  {
    $this->imagem = $imagem;
  }
}
?>
