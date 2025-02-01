<?php $this->layout("template"); ?>
<main class="min-h-screen flex items-start justify-center py-10">
    <form method="post" class="bg-gray-800 p-10 rounded-lg shadow-lg w-1/3">
        <h2 class="text-3xl font-semibold text-white mb-8 text-center">Editar</h2>
        <div class="mb-6">
            <label for="url" class="block text-white mb-2 text-lg font-medium">Link do vídeo</label>
            <input name="url" id="url" value="<?= $video->getUrl(); ?>" required 
                class="w-full p-4 bg-gray-700 text-white rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div class="mb-6">
            <label for="title" class="block text-white mb-2 text-lg font-medium">Título do vídeo</label>
            <input name="title" id="title" value="<?= $video->getTitle(); ?>" required 
                class="w-full p-4 bg-gray-700 text-white rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <button type="submit" class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md transition">
            Salvar
        </button>
    </form>
</main>
