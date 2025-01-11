<?php
require_once __DIR__ . "/start_html.php"; 
?>
<main class="container">
    <form class="container__formulario" method="post">
        <h2 class="formulario__titulo">Envie seu vídeo!</h2>
        <div class="formulario__campo">
            <label class="campo__etiqueta" for="url">Link embed</label>
            <input 
                name="url" id="url" 
                class="campo__escrita" 
                placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" 
                required />
        </div>
        <div class="formulario__campo">
            <label class="campo__etiqueta" for="titulo">Título do vídeo</label>
            <input 
                name="titulo" 
                id="titulo" 
                class="campo__escrita" 
                placeholder="Neste campo, dê o nome do vídeo" 
                required />
        </div>
        <input class="formulario__botao" type="submit" value="Enviar" />
    </form>
</main>
<?php require_once __DIR__ . "/close_html.php";
