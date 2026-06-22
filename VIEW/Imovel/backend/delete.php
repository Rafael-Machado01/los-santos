<?php
include_once __DIR__ . "/../../../DAL/Imovel.php";
$id = $_GET["id"];

$dalImovel = new DAL\Imovel();
$dalImovel->Delete($id);

header("location: ../see.php");
?>
