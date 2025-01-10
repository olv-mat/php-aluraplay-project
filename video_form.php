<?php

use Project\AluraPlay\Repository\VideoRepository;
use Project\AluraPlay\Entity\Video;

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if ($id) {

    $dbPath = __DIR__ . "/db.sqlite";
    $conn = new PDO("sqlite:$dbPath");

    $repository = new VideoRepository($conn);
    $video = $repository->selectVideo($id);

}

?>

<?php require_once "start_html.php" ?>

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
        <?php if($video) :?>
            <form class="container__formulario" method="post">
                <h2 class="formulario__titulo">Editar vídeo!</h3>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="url">Link embed</label>
                    <input name="url" id='url' class="campo__escrita" value="<?= $video->getUrl(); ?>" required />
                </div>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                    <input name="titulo" id='titulo' class="campo__escrita" value="<?= $video->getTitle(); ?>" required />
                </div>
                <input class="formulario__botao" type="submit" value="Enviar"/>
            </form>
        <?php else :?>
            <form class="container__formulario" method="post">
                <h2 class="formulario__titulo">Envie um vídeo!</h3>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="url">Link embed</label>
                    <input name="url" class="campo__escrita" required placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url' />
                </div>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                    <input name="titulo" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo" id='titulo' />
                </div>
                <input class="formulario__botao" type="submit" value="Enviar"/>
            </form>
        <?php endif ?>
    </main>

<?php require_once "close_html.php" ?>
