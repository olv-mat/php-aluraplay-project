<?php
require_once __DIR__ . "/start_html.php"; 
?>
<main>
    <ul class="videos-container">
        <?php foreach($videos as $video) :?>
            <?php if(str_starts_with($video->getUrl(), "https://")) :?>
                <li class="video-item">
                <?php if (!is_null($video->getImagePath())) :?>
                    <a href="<?= $video->getUrl(); ?>" target="_blank" style="width: 100%">
                        <img src="img/uploads/<?= $video->getImagePath() ?>" alt="">
                    </a>
                <?php else :?>
                    <div class="video-container">
                        <iframe src="<?= $video->getUrl(); ?>" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                <?php endif; ?>
                    <div class="video-description">
                        <h3><?= $video->getTitle(); ?></h3>
                        <div class="video-actions">
                            <a href="update-video?id=<?= $video->getId(); ?>">Editar</a>
                            <a href="remove-banner?id=<?= $video->getId(); ?>">Remover capa</a>
                            <a href="delete-video?id=<?= $video->getId(); ?>">Excluir</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</main>
<?php require_once __DIR__ . "/close_html.php";
