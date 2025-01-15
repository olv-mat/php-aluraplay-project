<?php
require_once __DIR__ . "/start_html.php";
?>
<main class="container">
    <form method="post" class="container__formulario">
        <h2 class="formulario__titulo">Efetue login</h3>
            <div class="formulario__campo">
                <label class="campo__etiqueta" for="email">Email</label>
                <input
                    type="email" 
                    name="email" 
                    class="campo__escrita"
                    id="email"
                    placeholder="Digite seu email"  
                    required />
            </div>
            <div class="formulario__campo">
                <label class="campo__etiqueta" for="senha">Senha</label>
                <input 
                    type="password" 
                    name="password" 
                    class="campo__escrita" 
                    id="senha"
                    placeholder="Digite sua senha"
                    required />
            </div>
            <input class="formulario__botao" type="submit" value="Entrar" />
    </form>
</main>
<?php require_once __DIR__ . "/close_html.php";
