<?php $this->layout("template"); ?>
<main>
    <form method="post" class="form-container">
        <h1>Editar vídeo</h1>
        <div class="field-container flex-row align-center">
            <label for="url" class="right-spacing">Link do vídeo</label>
            <input 
                name="url" 
                id="url" 
                value="<?= $video->getUrl(); ?>" 
                required />
            </div>
        <div class="field-container flex-row align-center">
            <label for="titulo" class="right-spacing">Título do vídeo</label>
            <input 
                name="titulo" 
                id="titulo" 
                value="<?= $video->getTitle(); ?>"  
                required />
        </div>
        <button class="btn form-btn" type="submit">Salvar</button>
    </form>
</main>
