<?php
include_once __DIR__ . "/../../../DAL/Propietario.php";
include_once __DIR__ . "/../../../MODEL/Propietario.php";

$propietario = new MODEL\Propietario();
$propietario->setCpf($_POST["cpf"]);
$propietario->setNome($_POST["nome"]);
$propietario->setTelefone($_POST["telefone"]);

$dalPropietario = new DAL\Propietario();
$dalPropietario->Update($propietario);

header("location: ../see.php");
?>
