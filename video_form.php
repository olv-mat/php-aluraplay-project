<?php

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if ($id) {

    $dbPath = __DIR__ . "/db.sqlite";
    $conn = new PDO("sqlite:$dbPath");

    $query = "SELECT * FROM videos WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(1, $id);
    $stmt->execute();
    $video = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/estilos.css">
        <link rel="stylesheet" href="../css/estilos-form.css">
        <link rel="stylesheet" href="../css/flexbox.css">
        <title>AluraPlay</title>
        <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    </head>
    <body>
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
                        <input name="url" id='url' class="campo__escrita" value="<?= $video["url"]; ?>" required />
                    </div>
                    <div class="formulario__campo">
                        <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                        <input name="titulo" id='titulo' class="campo__escrita" value="<?= $video["title"]; ?>" required />
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
    </body>
</html>