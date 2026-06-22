<?php
include_once __DIR__ . "/../../DAL/Corretor.php";
include_once __DIR__ . "/../../DAL/Propietario.php";
include_once __DIR__ . "/../../DAL/TipoImovel.php";

$dalCorretor = new DAL\Corretor();
$corretores = $dalCorretor->Select();

$dalPropietario = new DAL\Propietario();
$propietarios = $dalPropietario->Select();

$dalTipoImovel = new DAL\TipoImovel();
$tiposImovel = $dalTipoImovel->Select();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Inserir Imóvel</title>
</head>
<body>

<h1>Inserir Imóvel</h1>

<form action="./backend/insert.php" method="post">

  <input type="text" name="endereco" placeholder="Digite o Endereço" required>
  <input type="text" name="preco" placeholder="Digite o Preço" required>
  <input type="text" name="imagem" placeholder="Nome da imagem" required>


  <select name="corretor">
    <?php foreach ($corretores as $corretor) { ?>
      <option value="<?php echo $corretor->getCpf(); ?>">
        <?php echo $corretor->getNome(); ?>
      </option>
    <?php } ?>
  </select>

  <select name="propietario">
    <?php foreach ($propietarios as $propietario) { ?>
      <option value="<?php echo $propietario->getCpf(); ?>">
        <?php echo $propietario->getNome(); ?>
      </option>
    <?php } ?>
  </select>


  <select name="tipoImovel">
    <?php foreach ($tiposImovel as $tipoImovel) { ?>
      <option value="<?php echo $tipoImovel->getId(); ?>">
        <?php echo $tipoImovel->getDescricao(); ?>
      </option>
    <?php } ?>
  </select>
  <label for="name">Disponivel:</label>
  <input type="checkbox" name="status">

  <button type="submit">Adicionar</button>

</form>

</body>
</html>
