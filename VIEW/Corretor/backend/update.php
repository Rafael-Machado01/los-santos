<?php
include_once __DIR__ . "/../../../DAL/Corretor.php";
include_once __DIR__ . "/../../../MODEL/Corretor.php";

$Corretor = new MODEL\Corretor();
$Corretor->setCpf($_POST["cpf"]);
$Corretor->setNome($_POST["nome"]);
$Corretor->setTelefone($_POST["telefone"]);
$Corretor->setImagem($_POST["imagem"]);

$dalCorretor = new DAL\Corretor();
$dalCorretor->Update($Corretor);

header("location: ../see.php");
?>
