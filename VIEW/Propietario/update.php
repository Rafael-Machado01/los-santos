<?php
$cpf = $_GET["cpf"];

include_once __DIR__ . "/../../DAL/Propietario.php";
include_once __DIR__ . "/../../MODEL/Propietario.php";

use DAL\Propietario;

$dalPropietario = new DAL\Propietario();
$propietario = $dalPropietario->SelectByCpf($cpf);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Editar Propietario</title>
</head>
<body>
  <form action="./backend/update.php" method="post">
    <p>CPF: <?php echo $propietario->getCpf(); ?> </p>
    <input type="hidden" name="cpf" value=<?php echo $cpf; ?>>
    <input type="text" name="nome" placeholder="Digite o Nome" value=<?php echo $propietario->getNome(); ?>>
    <input type="number" name="telefone" placeholder="Digite o Telefone" value=<?php echo $propietario->getTelefone(); ?>>
    <button type="submit">Enviar</button>

  </form>
</body>
</html>
