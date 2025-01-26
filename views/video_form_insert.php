<?php
require_once __DIR__ . "/start_html.php"; 
?>
<main>
    <form method="post" enctype="multipart/form-data" class="form-container">
        <h1>Adicionar vídeo</h1>
        <div class="field-container flex-row align-center">
            <label for="url" class="right-spacing">Link do vídeo</label>
            <input 
                name="url" 
                id="url" 
                placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" 
                required />
        </div>
        <div class="field-container flex-row align-center">
            <label for="titulo" class="right-spacing">Título do vídeo</label>
            <input 
                name="titulo" 
                id="titulo"  
                placeholder="Neste campo, dê o nome do vídeo" 
                required />
        </div>
        <div class="field-container flex-row align-center">
            <label for="image" class="right-spacing btn">Selecionar imagem</label>
            <input
                type="file"
                accept="image/*" 
                name="image" 
                id="image" 
                class="file-input" />
        </div>
        <button class="btn form-btn" type="submit">Cadastrar</button>
    </form>
</main>
<?php require_once __DIR__ . "/close_html.php";
