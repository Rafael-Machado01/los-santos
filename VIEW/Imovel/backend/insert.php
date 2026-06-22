<?php
include_once __DIR__ . "/../../../DAL/Imovel.php";
include_once __DIR__ . "/../../../MODEL/Imovel.php";

$Imovel = new MODEL\Imovel();

$Imovel->setEndereco($_POST["endereco"]);
$Imovel->setPreco((float) $_POST["preco"]);
$Imovel->setImagem($_POST["imagem"]);

$Imovel->setTipoImovel((int) $_POST["tipoImovel"]);
$Imovel->setPropietario((int) $_POST["propietario"]);
$Imovel->setCorretor((int) $_POST["corretor"]);

$dalImovel = new DAL\Imovel();
$dalImovel->Insert($Imovel);

header("location: ../see.php");
exit();
?>
