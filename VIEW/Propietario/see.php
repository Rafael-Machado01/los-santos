<?php
include_once __DIR__ . "/../../DAL/Propietario.php";
include_once __DIR__ . "/../../MODEL/Propietario.php";

use DAL\Propietario;

$dalPropietario = new DAL\Propietario();
$seePropietario = $dalPropietario->Select();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Propietarios</title>
</head>
<body>
  <h1>Listar Propietarios</h1>
  <a href="./insert.php"> + Adicionar </a>
  <br>
<?php foreach ($seePropietario as $propietario) { ?>
    <?php echo $propietario->getCpf(); ?>
    <?php echo $propietario->getNome(); ?>
    <?php echo $propietario->getTelefone(); ?>
    <p><a href="./update.php?cpf=<?php echo $propietario->getCpf(); ?>">Editar</a></p>
    <br><br>
    <?php } ?>
</body>
</html>
