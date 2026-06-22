<?php
$id = $_GET["id"];

include_once __DIR__ . "/../../DAL/Imovel.php";
include_once __DIR__ . "/../../MODEL/Imovel.php";

use DAL\Imovel;

$dalImovel = new DAL\Imovel();
$Imovel = $dalImovel->SelectById($id);
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
    <title>Editar Imovel</title>
</head>
<body>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
  <form action="./backend/update.php" method="post" id="form">
    <p>ID: <?php echo $Imovel->getId(); ?> </p>
    <input type="hidden" name="id" value=<?php echo $id; ?>>
    <input type="text" name="endereco" placeholder="Digite o Endereço" value="<?php echo $Imovel->getEndereco(); ?>" required>
    <input type="text" name="preco" placeholder="Digite o Preço" value="<?php echo $Imovel->getPreco(); ?>"  required>
    <input type="text" name="imagem" placeholder="Nome da imagem" value="<?php echo $Imovel->getImagem(); ?>" required>


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
    <input type="checkbox" name="status" value="1" <?php echo $Imovel->getStatus()
      ? "checked"
      : ""; ?>>
    <button type="submit">Enviar</button>
  </form>
</body>
</html>
