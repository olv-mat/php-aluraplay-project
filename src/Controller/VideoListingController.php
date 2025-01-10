<?php

namespace Project\AluraPlay\Controller;

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Entity\Video;
use PDO;

class VideoListingController implements Controller
{
    private VideoRepository $repository;

    public function __construct(VideoRepository $repository)
    {
        $this->repository = $repository;   
    }

    public function requestProcessing(): void
    {
        $videos = $this->repository->selectVideos();
        require_once __DIR__ . "/../../start_html.php"; ?>
        <header>
            <nav class="cabecalho">
                <a class="logo" href="index.php"></a>
                <div class="cabecalho__icones">
                    <a href="/insert-video" class="cabecalho__videos"></a>
                    <a href="pages/login.html" class="cabecalho__sair">Sair</a>
                </div>
            </nav>
        </header>
        <ul class="videos__container" alt="videos alura">
            <?php foreach($videos as $video) :?>
                <?php if(str_starts_with($video->getUrl(), "https://")) :?>
                <li class="videos__item">
                    <iframe width="100%" height="72%" src="<?= $video->getUrl(); ?>"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
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
        <?php require_once __DIR__ . "/../../close_html.php";
    }
}
