<!DOCTYPE html>
<html lang="pt-br">
<head>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Dynasty8</title>
</head>
<body class="min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-lg shadow-xl overflow-hidden">

        <div class="bg-gradient-to-r from-[#18713C] to-[#116031] p-6">
            <h1 class="text-2xl font-bold text-white text-center">
                Faça seu Login
            </h1>
        </div>

        <form action="./login/login.php" method="post" class="p-6 flex flex-col gap-4">

            <input
                type="text"
                name="user"
                placeholder="Digite seu Usuário"
                class="bg-white border border-gray-300 p-3 rounded-lg text-[#18713C] focus:outline-none focus:border-[#18713C]"
            >

            <input
                type="password"
                name="password"
                placeholder="Digite sua Senha"
                class="bg-white border border-gray-300 p-3 rounded-lg text-[#18713C] focus:outline-none focus:border-[#18713C]"
            >

            <button
                type="submit"
                class="bg-[#E0CF38] text-[#18713C] px-6 py-3 rounded font-bold hover:bg-[#18713C] hover:text-[#E0CF38] transition-all duration-300"
            >
                Logar
            </button>

        </form>

    </div>

</body>
</html>
