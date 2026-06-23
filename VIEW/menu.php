<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: ./index.php");
}
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
    <header class="bg-[#18713C] p-4 flex flex-col items-center justify-center shadow-lg">
        <div class="hover:scale-105 transition-transform duration-300">
            <img src="/VIEW/img/logo.png" class="w-[300px]" alt="Logo">
        </div>
		<div class="mt-3">
		 <a class="bg-white rounded-lg p-1 shadow-lg" href="/VIEW/Propietario/see.php">Propietarios</a>
  <a class="bg-white rounded-lg p-1 shadow-lg" href="/VIEW/Imovel/see.php">Imoveis</a>
  <a class="bg-white rounded-lg p-1 shadow-lg" href="/VIEW/Corretor/see.php">Corretores</a>
  <a class="bg-white rounded-lg p-1 shadow-lg" href="/VIEW/login/logout.php">Home</a>
		</div>
    </header>

    <div class="bg-[#116031] text-white text-center p-2">
      <h1>Seja bem-vindo  <span class="font-bold"><?php echo $_SESSION[
        "user"
      ]; ?></span> </h1>
    </div>
</body>
</html>
