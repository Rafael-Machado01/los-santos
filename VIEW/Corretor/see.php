<?php
include_once __DIR__ . "/../../DAL/Corretor.php";
include_once __DIR__ . "/../../MODEL/Corretor.php";
include_once __DIR__ . "/../menu.php";
use DAL\Corretor;
$dalCorretor = new DAL\Corretor();
$seeCorretor = $dalCorretor->Select();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Corretores - Dynasty8</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-900">
        <div class="flex justify-center items-center mt-2">
            <a href="./insert.php" class="bg-[#E0CF38] text-[#18713C] px-6 py-2 rounded font-bold hover:bg-[#18713C] hover:text-[#E0CF38] transition-all duration-300">
                + Adicionar Corretor
            </a>
        </div>

    <section class="max-w-7xl mx-auto p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($seeCorretor as $Corretor) { ?>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                <div class="relative">
                    <img src="../img/corretor/<?= $Corretor->getImagem() ?>" class="w-full h-48 object-cover" alt="Corretor">
                </div>

                <div class="bg-gradient-to-r from-[#18713C] to-[#116031] p-6 text-white">
                    <h3 class="text-2xl font-bold mb-2"><?= $Corretor->getNome() ?></h3>
                    <p class="text-[#E0CF38] font-semibold">CPF: <?= $Corretor->getCpf() ?></p>
                </div>

                <div class="p-5">
                    <div class="bg-gray-100 p-4 rounded-lg space-y-3 text-sm mb-6">
                        <div class="flex items-center gap-3">

                            <div>
                                <p class="text-gray-600 font-semibold">Telefone</p>
                                <p class="text-gray-900 font-bold"><?= $Corretor->getTelefone() ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <a href="./update.php?cpf=<?= $Corretor->getCpf() ?>" class="flex-1 bg-blue-500 text-white py-2 rounded font-bold hover:bg-blue-600 transition text-center">
                            Editar
                        </a>
                        <button onclick="deleteCorretor('<?= $Corretor->getCpf() ?>')" class="flex-1 bg-red-500 text-white py-2 rounded font-bold hover:bg-red-600 transition">
                            Remover
                        </button>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <?php if (empty($seeCorretor)): ?>
        <div class="text-center py-12">
            <p class="text-white text-lg">Nenhum corretor cadastrado.</p>
            <a href="./insert.php" class="mt-4 inline-block bg-[#E0CF38] text-[#18713C] px-6 py-2 rounded font-bold hover:bg-[#18713C] hover:text-[#E0CF38] transition-all duration-300">
                + Adicionar Corretor
            </a>
        </div>
        <?php endif; ?>
    </section>

    <script>
        function deleteCorretor(cpf) {
            if(confirm('Tem certeza que deseja excluir este corretor CPF: ' + cpf + '?')) {
                location.href = './backend/delete.php?cpf=' + cpf;
            }
        }
    </script>
</body>
</html>
