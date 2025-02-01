<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/styles.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>MyPlayer</title>
    </head>
    <body class="bg-gray-900 text-white">
        <header class="bg-gray-800 p-4 shadow-md">
            <nav class="container mx-auto flex justify-between items-center">
                <div>
                    <a href="/" class="text-2xl font-bold text-white">MyPlayer</a>
                </div>
                <div class="flex space-x-4">
                    <a href="/insert-video" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-md transition">Adicionar</a>
                    <a href="/logout" class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded-md transition">Sair</a>
                </div>
            </nav>
        </header>
        <?php if (isset($_SESSION["error_message"])): ?>
            <div class="mt-4 mx-auto w-1/2 p-4 bg-red-600 text-white text-center rounded-md shadow-md">
                <p class="font-semibold"><?= $_SESSION["error_message"]; ?></p>
                <?php unset($_SESSION["error_message"]); ?>
            </div>
        <?php elseif (isset($_SESSION["success_message"])) :?>
            <div class="mt-4 mx-auto w-1/2 p-4 bg-green-600 text-white text-center rounded-md shadow-md">
                <p class="font-semibold"><?= $_SESSION["success_message"]; ?></p>
                <?php unset($_SESSION["success_message"]); ?>
            </div>
        <?php endif; ?>
        <?= $this->section("content"); ?>
    </body>
</html>
