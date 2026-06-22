<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Corretor</title>
</head>
<body>
  <h1>Inserir Corretor</h1>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>

  <form action="./backend/insert.php" method="post" id="form">
      <input type="text" name="cpf" id="cpf" placeholder="Digite o CPF">
    <input type="text" name="nome" id="nome" placeholder="Digite o Nome">
    <input type="text" name="telefone" id="telefone" placeholder="Digite o Telefone">
    <input type="text" name="imagem" placeholder="Digite o nome da imagem">
    <button type="submit">Adicionar</button>
  </form>
  <script src="./backend/validate.js"></script>
</body>
</html>
