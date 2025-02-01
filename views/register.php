<?php $this->layout("template"); ?>
<main class="py-10">
    <div class="container mx-auto px-4 max-w-md sm:max-w-lg">
        <form method="post" class="bg-gray-800 p-8 rounded-lg shadow-lg max-w-md mx-auto">
            <h2 class="text-white text-2xl font-semibold mb-6 text-center">Cadastrar-se</h2>
            <div class="mb-4">
                <label for="email" class="block text-white font-medium">Seu email</label>
                <input type="email" name="email" id="email" placeholder="Digite seu email" autocomplete="off" required
                    class="w-full p-3 mt-2 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-white font-medium">Sua senha</label>
                <input type="password" name="password" id="password" placeholder="Digite sua senha" autocomplete="off" required
                    class="w-full p-3 mt-2 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="w-full py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">Cadastrar-se</button>
            <div class="mt-4 text-center">
                <a href="/login" class="text-blue-400 hover:text-blue-500">Já tem uma conta? Acessar</a>
            </div>
        </form>
    </div>
</main>