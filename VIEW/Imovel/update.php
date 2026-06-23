<?php
$id = $_GET["id"];

include_once __DIR__ . "/../../DAL/Imovel.php";
include_once __DIR__ . "/../../MODEL/Imovel.php";
include_once __DIR__ . "/../../DAL/Corretor.php";
include_once __DIR__ . "/../../DAL/Propietario.php";
include_once __DIR__ . "/../../DAL/TipoImovel.php";
include_once __DIR__ . "/../menu.php";

use DAL\Imovel;

$dalImovel = new DAL\Imovel();
$Imovel = $dalImovel->SelectById($id);

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
    <title>Editar Imóvel</title>
</head>
<body>

    <h1 class="font-bold text-center text-2xl mt-2 text-[#18713C]">
        Editar Imóvel
    </h1>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>

    <form action="./backend/update.php" method="post" id="form" class="flex flex-col gap-2 justify-content items-center">

        <p class="font-bold text-[#18713C]">
            ID: <?php echo $Imovel->getId(); ?>
        </p>

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <input
            class="bg-white p-2 rounded-lg text-[#18713C]"
            type="text"
            name="endereco"
            placeholder="Digite o Endereço"
            value="<?php echo $Imovel->getEndereco(); ?>"
            required
        >

        <input
            class="bg-white p-2 rounded-lg text-[#18713C]"
            type="text"
            name="preco"
            placeholder="Digite o Preço"
            value="<?php echo $Imovel->getPreco(); ?>"
            required
        >

        <input
            class="bg-white p-2 rounded-lg text-[#18713C]"
            type="text"
            name="imagem"
            placeholder="Nome da imagem"
            value="<?php echo $Imovel->getImagem(); ?>"
            required
        >

        <select
            name="corretor"
            required
            class="bg-white p-2 rounded-lg text-[#18713C]"
        >
            <option value="" disabled>
                Selecione um corretor
            </option>

            <?php foreach ($corretores as $corretor) { ?>
                <option
                    value="<?php echo $corretor->getCpf(); ?>"
                    <?php echo $corretor->getCpf() == $Imovel->getCorretor()
                      ? "selected"
                      : ""; ?>
                >
                    <?php echo $corretor->getNome(); ?>
                </option>
            <?php } ?>
        </select>

        <select
            name="propietario"
            required
            class="bg-white p-2 rounded-lg text-[#18713C]"
        >
            <option value="" disabled>
                Selecione um Proprietário
            </option>

            <?php foreach ($propietarios as $propietario) { ?>
                <option
                    value="<?php echo $propietario->getCpf(); ?>"
                    <?php echo $propietario->getCpf() ==
                    $Imovel->getPropietario()
                      ? "selected"
                      : ""; ?>
                >
                    <?php echo $propietario->getNome(); ?>
                </option>
            <?php } ?>
        </select>

        <select
            name="tipoImovel"
            required
            class="bg-white p-2 rounded-lg text-[#18713C]"
        >
            <option value="" disabled>
                Selecione um Tipo de Imóvel
            </option>

            <?php foreach ($tiposImovel as $tipoImovel) { ?>
                <option
                    value="<?php echo $tipoImovel->getId(); ?>"
                    <?php echo $tipoImovel->getId() == $Imovel->getTipoImovel()
                      ? "selected"
                      : ""; ?>
                >
                    <?php echo $tipoImovel->getDescricao(); ?>
                </option>
            <?php } ?>
        </select>

        <div class="flex items-center gap-2 mt-2">
            <label class="font-bold text-[#18713C]">
                Disponível:
            </label>

            <input
                type="checkbox"
                name="status"
                value="1"
                <?php echo $Imovel->getStatus() ? "checked" : ""; ?>
            >
        </div>

        <button
            class="bg-[#E0CF38] text-[#18713C] px-6 py-2 rounded font-bold hover:bg-[#18713C] hover:text-[#E0CF38] transition-all duration-300"
            type="submit"
        >
            Salvar Alterações
        </button>

    </form>

</body>
</html>
