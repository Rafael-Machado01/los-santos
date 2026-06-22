<?php
include_once __DIR__ . "/../../../DAL/Imovel.php";
include_once __DIR__ . "/../../../MODEL/Imovel.php";

$Imovel = new MODEL\Imovel();

$Imovel->setEndereco($_POST["endereco"]);
$Imovel->setPreco($_POST["preco"]);
$Imovel->setTipoImovel($_POST["tipoImovel"]);
$Imovel->setPropietario($_POST["propietario"]);
$Imovel->setCorretor($_POST["corretor"]);
$Imovel->setImagem($_POST["imagem"]);

$dalImovel = new DAL\Imovel();
$dalImovel->Insert($Imovel);

header("location: ../see.php");
?>
