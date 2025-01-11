<?php
require_once __DIR__ . "/start_html.php"; 
?>
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
<?php require_once __DIR__ . "/close_html.php";
