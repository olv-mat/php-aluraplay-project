<?php $this->layout("template"); ?>
<main class="py-10">
    <div class="container mx-auto px-4">
        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8 justify-center">
            <?php foreach($videos as $video) :?>
                <?php if(str_starts_with($video->getUrl(), "https://")) :?>
                    <li class="bg-gray-800 rounded-lg shadow-lg overflow-hidden p-4">
                    <?php if (!is_null($video->getImagePath())) :?>
                        <a href="<?= $video->getUrl(); ?>" target="_blank" class="block">
                            <img src="img/uploads/<?= $video->getImagePath() ?>" alt="Thumbnail" class="w-full h-48 object-cover">
                        </a>
                    <?php else :?>
                        <div class="w-full">
                            <iframe src="<?= $video->getUrl(); ?>" title="YouTube video player" frameborder="0"
                                class="w-full h-40 object-cover" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                    <?php endif; ?>
                        <div class="p-4">
                            <h3 class="text-white text-xl font-semibold"><?= $video->getTitle(); ?></h3>
                            <div class="flex justify-start mt-2 space-x-4">
                                <a href="update-video?id=<?= $video->getId(); ?>" class="text-blue-400 hover:text-blue-500">Editar</a>
                                <a href="remove-banner?id=<?= $video->getId(); ?>" class="text-blue-400 hover:text-blue-500">Remover Capa</a>
                                <a href="delete-video?id=<?= $video->getId(); ?>" class="text-blue-400 hover:text-blue-500">Excluir</a>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</main>
