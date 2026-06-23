<?php
include_once __DIR__ . "/../menu.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Corretor</title>
</head>
<body>
  <h1 class="font-bold text-center text-2xl mt-2 text-[#18713C]">Inserir Corretor</h1>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>

  <form action="./backend/insert.php" method="post" id="form" class="flex flex-col gap-2 justify-content items-center">
      <input class="bg-white p-2 rounded-lg text-[#18713C]" type="text" name="cpf" id="cpf" placeholder="Digite o CPF">
    <input class="bg-white p-2 rounded-lg text-[#18713C]" type="text" name="nome" id="nome" placeholder="Digite o Nome">
    <input class="bg-white p-2 rounded-lg text-[#18713C]" type="text" name="telefone" id="telefone" placeholder="Digite o Telefone">
    <input  class="bg-white p-2 rounded-lg text-[#18713C]" type="text" name="imagem" placeholder="Digite o nome da imagem">
    <button class="bg-[#E0CF38] text-[#18713C] px-6 py-2 rounded font-bold hover:bg-[#18713C] hover:text-[#E0CF38] transition-all duration-300" type="submit">Adicionar</button>
  </form>
  <script src="./backend/validate.js"></script>
</body>
</html>
