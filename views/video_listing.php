<?php
require_once __DIR__ . "/start_html.php"; 
?>
<ul class="videos__container" alt="videos alura">
    <?php foreach($videos as $video) :?>
        <?php if(str_starts_with($video->getUrl(), "https://")) :?>
            <li class="videos__item">
            <?php if (!is_null($video->getImagePath())) :?>
                <a href="<?= $video->getUrl(); ?>" target="_blank" style="width: 100%">
                    <img src="img/uploads/<?= $video->getImagePath() ?>" alt="">
                </a>
            <?php else :?>
                <iframe width="100%" height="72%" src="<?= $video->getUrl(); ?>"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            <?php endif; ?>
                <div class="descricao-video">
                    <img src="img/logo.png" alt="logo canal alura">
                    <h3><?= $video->getTitle(); ?></h3>
                    <div class="acoes-video">
                        <a href="update-video?id=<?= $video->getId(); ?>">Editar</a>
                        <a href="delete-video?id=<?= $video->getId(); ?>">Excluir</a>
                    </div>
                </div>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
<?php require_once __DIR__ . "/close_html.php";
