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
<?php foreach ($seePropietario as $propietario) { ?>
    <?php echo $propietario->getCpf(); ?>
    <?php echo $propietario->getNome(); ?>
    <?php echo $propietario->getTelefone(); ?>
    <br><br>
    <?php } ?>
</body>
</html>
