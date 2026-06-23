<?php
include_once __DIR__ . "/../../DAL/Corretor.php";
include_once __DIR__ . "/../../DAL/Propietario.php";
include_once __DIR__ . "/../../DAL/TipoImovel.php";
include_once __DIR__ . "/../menu.php";

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

<h1 class="font-bold text-center text-2xl mt-2 text-[#18713C]">
    Inserir Imóvel
</h1>

<form action="./backend/insert.php" method="post" class="flex flex-col gap-2 justify-content items-center">

    <input
        class="bg-white p-2 rounded-lg text-[#18713C]"
        type="text"
        name="endereco"
        placeholder="Digite o Endereço"
        required
    >

    <input
        class="bg-white p-2 rounded-lg text-[#18713C]"
        type="text"
        name="preco"
        placeholder="Digite o Preço"
        required
    >

    <input
        class="bg-white p-2 rounded-lg text-[#18713C]"
        type="text"
        name="imagem"
        placeholder="Nome da imagem"
        required
    >

    <select
        name="corretor"
        required
        class="bg-white p-2 rounded-lg text-[#18713C]"
    >
        <option value="" disabled selected>
            Selecione um corretor
        </option>

        <?php foreach ($corretores as $corretor) { ?>
            <option value="<?php echo $corretor->getCpf(); ?>">
                <?php echo $corretor->getNome(); ?>
            </option>
        <?php } ?>
    </select>

    <select
        name="propietario"
        required
        class="bg-white p-2 rounded-lg text-[#18713C]"
    >
        <option value="" disabled selected>
            Selecione um Proprietário
        </option>

        <?php foreach ($propietarios as $propietario) { ?>
            <option value="<?php echo $propietario->getCpf(); ?>">
                <?php echo $propietario->getNome(); ?>
            </option>
        <?php } ?>
    </select>

    <select
        name="tipoImovel"
        required
        class="bg-white p-2 rounded-lg text-[#18713C]"
    >
        <option value="" disabled selected>
            Selecione um Tipo de Imóvel
        </option>

        <?php foreach ($tiposImovel as $tipoImovel) { ?>
            <option value="<?php echo $tipoImovel->getId(); ?>">
                <?php echo $tipoImovel->getDescricao(); ?>
            </option>
        <?php } ?>
    </select>

    <div class="flex items-center gap-2 mt-2">
        <label class="font-bold text-[#18713C]">
            Disponível:
        </label>

        <input type="hidden" name="status" value="0">
        <input type="checkbox" name="status" value="1">
    </div>

    <button
        class="bg-[#E0CF38] text-[#18713C] px-6 py-2 rounded font-bold hover:bg-[#18713C] hover:text-[#E0CF38] transition-all duration-300"
        type="submit"
    >
        Adicionar
    </button>

</form>

</body>
</html>
