<?php
include_once __DIR__ . "/../DAL/Imovel.php";
$id = $_GET["id"];
$dalImovel = new DAL\Imovel();
$result = $dalImovel->BuyById($id);
header("location: ./home.php");
?>
