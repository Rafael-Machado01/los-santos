<?php
namespace MODEL;

class Propietario
{
  private ?string $cpf;
  private ?string $nome;
  private ?int $telefone;

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
    if ($nome == "") {
      echo "NOME INVÁLIDO!";
    } else {
      $this->nome = $nome;
    }
  }
  public function setTelefone(int $telefone)
  {
    $this->telefone = $telefone;
  }
}
?>
