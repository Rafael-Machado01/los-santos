<?php
include_once __DIR__ . "/../../../DAL/Corretor.php";
$cpf = $_GET["cpf"];

$dalPropietario = new DAL\Corretor();
$dalPropietario->Delete($cpf);

header("location: ../see.php ");
?>
