<?php
include_once __DIR__ . "/../../DAL/Imovel.php";
include_once __DIR__ . "/../../MODEL/Imovel.php";
use DAL\Imovel;
$dalImovel = new DAL\Imovel();
$seeImovel = $dalImovel->Select();
?>
<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: ../login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Imóveis - Dynasty8</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-900">
    <header class="bg-[#18713C] p-4 flex items-center justify-between shadow-lg">
        <div>
            <h1 class="text-white text-2xl font-bold">Dynasty8 - Gerenciar Imóveis</h1>
        </div>
        <div>
            <a href="./insert.php" class="bg-[#E0CF38] text-[#18713C] px-6 py-2 rounded font-bold hover:bg-[#18713C] hover:text-[#E0CF38] transition-all duration-300">
                + Adicionar Imóvel
            </a>
        </div>
    </header>

    <div class="bg-[#116031] text-white text-center p-3">
        <h2 class="text-lg font-semibold">Imóveis Cadastrados</h2>
    </div>

    <section class="max-w-7xl mx-auto p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($seeImovel as $Imovel) {

              $statusColor =
                $Imovel->getStatus() == 1 ? "bg-green-500" : "bg-red-500";
              $statusText =
                $Imovel->getStatus() == 1 ? "Disponível" : "Vendido";
              ?>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                <div class="relative">
                    <img src="../img/imovel/<?= $Imovel->getImagem() ?>" class="w-full h-48 object-cover" alt="Imóvel">
                    <div class="absolute top-3 right-3">
                        <span class="<?= $statusColor ?> text-white px-3 py-1 rounded-full text-xs font-bold">
                            <?= $statusText ?>
                        </span>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-[#18713C] text-xl font-bold mb-2"><?= $Imovel->getEndereco() ?></h3>

                    <div class="bg-gray-100 p-3 rounded mb-4 space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="font-semibold text-gray-700">Preço:</span>
                            <span class="text-[#E0CF38] font-bold">R$ <?= $Imovel->getPreco() ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold text-gray-700">Tipo:</span>
                            <span class="text-gray-600"><?= $Imovel->getTipoImovel() ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold text-gray-700">Proprietário:</span>
                            <span class="text-gray-600"><?= $Imovel->getPropietario() ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold text-gray-700">Corretor:</span>
                            <span class="text-gray-600"><?= $Imovel->getCorretor() ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold text-gray-700">ID:</span>
                            <span class="text-gray-600"><?= $Imovel->getId() ?></span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <a href="./update.php?id=<?= $Imovel->getId() ?>" class="flex-1 bg-blue-500 text-white py-2 rounded font-bold hover:bg-blue-600 transition text-center">
                            Editar
                        </a>
                        <button onclick="deleteImovel(<?= $Imovel->getId() ?>)" class="flex-1 bg-red-500 text-white py-2 rounded font-bold hover:bg-red-600 transition">
                            Remover
                        </button>
                    </div>
                </div>
            </div>
            <?php
            } ?>
        </div>
    </section>

    <script>
        function deleteImovel(id) {
            if(confirm('Tem certeza que deseja excluir este imóvel ID ' + id + '?')) {
                location.href = './backend/delete.php?id=' + id;
            }
        }
    </script>
</body>
</html>
