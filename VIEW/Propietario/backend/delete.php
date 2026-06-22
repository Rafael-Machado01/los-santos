<?php
include_once __DIR__ . "/../../../DAL/Propietario.php";
$cpf = $_GET["cpf"];

$dalPropietario = new DAL\Propietario();
$dalPropietario->Delete($cpf);

header("location: ../see.php ");
?>
