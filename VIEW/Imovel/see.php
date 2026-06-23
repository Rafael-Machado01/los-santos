<?php
include_once __DIR__ . "/../../DAL/Imovel.php";
include_once __DIR__ . "/../../MODEL/Imovel.php";

use DAL\Imovel;

$dalImovel = new DAL\Imovel();
$seeImovel = $dalImovel->Select();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Imoveis</title>
</head>
<body>
  <h1>Listar Imoveis</h1>
  <a href="./insert.php"> + Adicionar </a>
  <br>
<?php foreach ($seeImovel as $Imovel) { ?>
  <?php echo $Imovel->getId(); ?>
  <?php echo $Imovel->getEndereco(); ?>
  <?php echo $Imovel->getPreco(); ?>
    <?php echo $Imovel->getTipoImovel(); ?>
      <?php echo $Imovel->getPropietario(); ?>
      <?php echo $Imovel->getCorretor(); ?>
      <?php echo $Imovel->getStatus(); ?>
<img src="../img/imovel/<?php echo $Imovel->getImagem(); ?>" style="width:200px" alt="Casa">

  <p><a href="./update.php?id=<?php echo $Imovel->getId(); ?>">Editar</a></p>
  <p <a href="#" onclick="deleteImovel(<?php echo $Imovel->getId(); ?>)">Remover</a></p>
    <br><br>
    <?php } ?>

<script>
  function deleteImovel(id) {
    if(confirm('Excluir Imovel' + id + '?')) {
      location.href = './backend/delete.php?id=' + id;
    }
  }
</script>
</body>
</html>
