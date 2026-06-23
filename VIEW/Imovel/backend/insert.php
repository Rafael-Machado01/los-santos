<?php
include_once __DIR__ . "/../../../DAL/Imovel.php";
include_once __DIR__ . "/../../../MODEL/Imovel.php";

$Imovel = new MODEL\Imovel();

$Imovel->setEndereco($_POST["endereco"]);
$Imovel->setPreco((float) $_POST["preco"]);
$Imovel->setImagem($_POST["imagem"]);
$Imovel->setStatus(isset($_POST["status"]) ? 1 : 0);
$Imovel->setTipoImovel((int) $_POST["tipoImovel"]);
$Imovel->setPropietario($_POST["propietario"]);
$Imovel->setCorretor($_POST["corretor"]);

$dalImovel = new DAL\Imovel();
$dalImovel->Insert($Imovel);

header("location: ../see.php");
exit();
?>
