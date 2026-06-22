<?php
include_once __DIR__ . "/../../../DAL/Imovel.php";
include_once __DIR__ . "/../../../MODEL/Imovel.php";

$Imovel = new MODEL\Imovel();

$Imovel->setId($_POST["id"]);
$Imovel->setEndereco($_POST["endereco"]);
$Imovel->setPreco($_POST["preco"]);
$Imovel->setImagem($_POST["imagem"]);
$Imovel->setCorretor($_POST["corretor"]);
$Imovel->setPropietario($_POST["propietario"]);
$Imovel->setTipoImovel($_POST["tipoImovel"]);
$Imovel->setStatus(isset($_POST["status"]) ? 1 : 0);

$dalImovel = new DAL\Imovel();
$dalImovel->Update($Imovel);

header("location: ../see.php");
?>
