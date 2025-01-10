<?php

namespace Project\AluraPlay\Controller;

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Entity\Video;
use PDO;

class VideoFormUpdateController implements Controller
{   

    private VideoRepository $repository;
    private string $method;

    public function __construct($repository, $method)
    {
        $this->repository = $repository;
        $this->method = $method;
    }

    public function requestProcessing(): void
    {
        if ($this->method == "POST") {

            $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
            $url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
            $title = filter_input(INPUT_POST, "titulo");

            if (!$id || !$url || !$title) {
                header("Location: /?success=0");
                exit();   
            }

            $video = new Video($id, $url, $title);
            $result = $this->repository->updateVideo($video);

            if (!$result) {
                header("Location: /?success=0");
                exit(); 
            }
            header("Location: /?success=1");
        }

        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        $video = $this->repository->selectVideo($id);

        require_once __DIR__ . "/../../start_html.php"; ?>
        <header>
            <nav class="cabecalho">
                <a class="logo" href="/"></a>
                <div class="cabecalho__icones">
                    <a href="./enviar-video.html" class="cabecalho__videos"></a>
                    <a href="../pages/login.html" class="cabecalho__sair">Sair</a>
                </div>
            </nav>
        </header>
        <main class="container">
            <form class="container__formulario" method="post">
                <h2 class="formulario__titulo">Editar vídeo!</h2>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="url">Link embed</label>
                    <input 
                        name="url" id="url" 
                        class="campo__escrita"
                        value="<?= $video->getUrl(); ?>" 
                        required />
                    </div>
                    <div class="formulario__campo">
                        <label class="campo__etiqueta" for="titulo">Título do vídeo</label>
                        <input 
                        name="titulo" 
                        id="titulo" 
                        class="campo__escrita" 
                        value="<?= $video->getTitle(); ?>"  
                        required />
                </div>
                <input class="formulario__botao" type="submit" value="Enviar" />
            </form>
        </main>
        <?php require_once __DIR__ . "/../../close_html.php";
    }
}
