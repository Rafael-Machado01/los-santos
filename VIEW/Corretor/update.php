<?php
$cpf = $_GET["cpf"];

include_once __DIR__ . "/../../DAL/Corretor.php";
include_once __DIR__ . "/../../MODEL/Corretor.php";

use DAL\Corretor;

$dalCorretor = new DAL\Corretor();
$Corretor = $dalCorretor->SelectByCpf($cpf);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Editar Corretor</title>
</head>
<body>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
  <form action="./backend/update.php" method="post" id="form">
    <p>CPF: <?php echo $Corretor->getCpf(); ?> </p>
    <input type="hidden" name="cpf" value=<?php echo $cpf; ?>>
    <input type="text" name="nome" value="<?php echo $Corretor->getNome(); ?>">
    <input type="number" name="telefone" placeholder="Digite o Telefone" value=<?php echo $Corretor->getTelefone(); ?>>
    <input type="text" name="imagem" placeholder="Digite o nome da Imagem" value=<?php echo $Corretor->getImagem(); ?>>
    <button type="submit">Enviar</button>
  <script src="./backend/validate.js"></script>
  </form>
</body>
</html>
