<?php
include_once __DIR__ . "/../../DAL/Corretor.php";
include_once __DIR__ . "/../../MODEL/Corretor.php";

use DAL\Corretor;

$dalCorretor = new DAL\Corretor();
$seeCorretor = $dalCorretor->Select();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Corretores</title>
</head>
<body>
  <h1>Listar Corretores</h1>
  <a href="./insert.php"> + Adicionar </a>
  <br>
<?php foreach ($seeCorretor as $Corretor) { ?>
  <?php echo $Corretor->getCpf(); ?>
  <?php echo $Corretor->getNome(); ?>
  <?php echo $Corretor->getTelefone(); ?>
  <img src="../img/corretor/<?php echo $Corretor->getImagem(); ?>" style="width:200px" alt="Corretor">


  <p><a href="./update.php?cpf=<?php echo $Corretor->getCpf(); ?>">Editar</a></p>
  <p <a href="#" onclick="deleteCorretor(<?php echo $Corretor->getCpf(); ?>)">Remover</a></p>
    <br><br>
    <?php } ?>

<script>
  function deleteCorretor(cpf) {
    if(confirm('Excluir Corretor' + cpf + '?')) {
      location.href = './backend/delete.php?cpf=' + cpf;  
    }
  }
</script>
</body>
</html>
