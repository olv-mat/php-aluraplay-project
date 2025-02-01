<?php $this->layout("template"); ?>
<main class="min-h-screen flex items-start justify-center py-10">
    <form method="post" enctype="multipart/form-data" class="bg-gray-800 p-10 rounded-lg shadow-lg w-1/3">
        <h2 class="text-3xl font-semibold text-white mb-8 text-center">Adicionar</h2>
        <div class="mb-6">
            <label for="url" class="block text-white mb-2 text-lg font-medium">Link</label>
            <input name="url" id="url" placeholder="Insira o link do vídeo" autocomplete="off" required 
                class="w-full p-4 bg-gray-700 text-white rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div class="mb-6">
            <label for="title" class="block text-white mb-2 text-lg font-medium">Título</label>
            <input name="title" id="title" placeholder="Insira o título do vídeo" required 
                class="w-full p-4 bg-gray-700 text-white rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div class="mb-6">
            <label for="image" class="block text-white mb-2 text-lg font-medium cursor-pointer bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-md text-center">
                Selecionar Capa
            </label>
            <input type="file"accept="image/*" name="image" id="image" class="hidden"/>
        </div>
        <button type="submit" class="w-full py-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-md transition">
            Cadastrar
        </button>
    </form>
</main>
