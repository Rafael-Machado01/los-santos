<?php
include_once __DIR__ . "/../DAL/Imovel.php";
include_once __DIR__ . "/../MODEL/Imovel.php";
$dalImovel = new DAL\Imovel();
$seeImovel = $dalImovel->Select();
include_once __DIR__ . "/../DAL/Corretor.php";
include_once __DIR__ . "/../MODEL/Corretor.php";
$dalCorretor = new DAL\Corretor();
include_once __DIR__ . "/../DAL/Propietario.php";
include_once __DIR__ . "/../MODEL/Propietario.php";
$dalPropietario = new DAL\Propietario();
include_once __DIR__ . "/../DAL/TipoImovel.php";
include_once __DIR__ . "/../MODEL/TipoImovel.php";
$dalTipoImovel = new DAL\TipoImovel();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynasty8</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-[#18713C] p-4 flex items-center justify-center shadow-lg">
        <div class="hover:scale-105 transition-transform duration-300">
            <img src="img/logo.png" class="w-[300px]" alt="Logo">
        </div>
    </header>

    <div class="bg-[#116031] text-white text-center p-2">
        <h1>A melhor decisão que você vai fazer</h1>
    </div>

    <section class="flex justify-center items-center py-8">
        <div class="grid grid-cols-3 gap-6">
            <?php foreach ($seeImovel as $Imovel) {

              $corretor = $dalCorretor->SelectByCpf($Imovel->getCorretor());
              $propietario = $dalPropietario->SelectByCpf(
                $Imovel->getPropietario(),
              );
              $tipoImovel = $dalTipoImovel->SelectById(
                $Imovel->getTipoImovel(),
              );
              $disponivel = $Imovel->getStatus() == 1;
              ?>
            <div class="bg-white rounded-lg overflow-hidden group cursor-pointer transition-all duration-300 hover:shadow-2xl <?= !$disponivel
              ? "opacity-60"
              : "" ?>">
                <img src="img/imovel/<?= $Imovel->getImagem() ?>" class="w-full h-64 object-cover" alt="Imóvel">

                <div class="p-6">
                    <h3 class="text-[#18713C] text-2xl font-bold"><?= $Imovel->getEndereco() ?></h3>
                    <p class="text-[#E0CF38] text-xl font-bold">R$ <?= number_format(
                      $Imovel->getPreco(),
                      2,
                      ",",
                      ".",
                    ) ?></p>
                </div>

                <div class="max-h-0 group-hover:max-h-96 overflow-hidden transition-all duration-300">
                    <div class="flex justify-between text-black text-sm mb-6 px-6 pt-6">
                        <div>
                            <p class="text-left">Tipo de Imovel: <?= $tipoImovel->getDescricao() ?></p>
                            <p>Proprietario: <?= $propietario->getNome() ?></p>
                        </div>
                        <div class="flex items-center gap-2">
                            <img src="img/corretor/<?= $corretor->getImagem() ?>" class="w-12 h-12 rounded-full" alt="Corretor">
                            <p><?= $corretor->getNome() ?></p>
                        </div>
                    </div>

                    <div class="px-6 pb-6">
                        <?= $disponivel
                          ? '<button type="button" onclick="buyImovel(' .
                            $Imovel->getId() .
                            ')" class="w-full bg-[#E0CF38] text-[#18713C] px-6 py-2 rounded font-bold hover:bg-[#18713C] hover:text-[#E0CF38] transition-all duration-300">
                                Comprar
                            </button>'
                          : '<button disabled class="w-full bg-gray-400 text-white px-6 py-2 rounded font-bold cursor-not-allowed">
                                Vendido
                            </button>' ?>
                    </div>
                </div>
            </div>
            <?php
            } ?>
        </div>
    </section>
    <a class="text-2xl" href="./index.php">Acessar pagina admin </a>
    <script>
        function buyImovel(id) {
            if(confirm('Você tem certeza que deseja comprar a propriedade ID ' + id + '?')) {
                location.href = './buy.php?id=' + id;
            }
        }
    </script>
</body>
</html>
