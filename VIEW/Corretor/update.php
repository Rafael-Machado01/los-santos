<?php
$cpf = $_GET["cpf"];

include_once __DIR__ . "/../../DAL/Corretor.php";
include_once __DIR__ . "/../../MODEL/Corretor.php";
include_once __DIR__ . "/../menu.php";

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

    <h1 class="font-bold text-center text-2xl mt-2 text-[#18713C]">
        Editar Corretor
    </h1>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>

    <form action="./backend/update.php" method="post" id="form" class="flex flex-col gap-2 justify-content items-center">

        <p class="font-bold text-[#18713C]">
            CPF: <?php echo $Corretor->getCpf(); ?>
        </p>

        <input type="hidden" name="cpf" value="<?php echo $cpf; ?>">

        <input
            class="bg-white p-2 rounded-lg text-[#18713C]"
            type="text"
            name="nome"
            value="<?php echo $Corretor->getNome(); ?>"
        >

        <input
            class="bg-white p-2 rounded-lg text-[#18713C]"
            type="number"
            name="telefone"
            placeholder="Digite o Telefone"
            value="<?php echo $Corretor->getTelefone(); ?>"
        >

        <input
            class="bg-white p-2 rounded-lg text-[#18713C]"
            type="text"
            name="imagem"
            placeholder="Digite o nome da Imagem"
            value="<?php echo $Corretor->getImagem(); ?>"
        >

        <button
            class="bg-[#E0CF38] text-[#18713C] px-6 py-2 rounded font-bold hover:bg-[#18713C] hover:text-[#E0CF38] transition-all duration-300"
            type="submit"
        >
            Salvar Alterações
        </button>

    </form>

    <script src="./backend/validate.js"></script>

</body>
</html>
