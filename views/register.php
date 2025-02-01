<?php $this->layout("template"); ?>
<main>
    <form method="post" class="form-container">
        <h1>Cadastro</h1>
        <div class="field-container flex-row align-center">
            <label for="email" class="right-spacing">Email</label>
            <input
                type="email" 
                name="email" 
                id="email"
                placeholder="Escreva o seu email"
                autocomplete="off"  
                required />
        </div>
        <div class="field-container flex-row align-center">
            <label for="senha" class="right-spacing">Senha</label>
            <input 
                type="password" 
                name="password"  
                id="senha"
                placeholder="Escreva a sua senha"
                autocomplete="off"
                required />
        </div>
        <button class="btn" type="submit">Cadastrar</button>
        <a href="/login" class="special-link">Login</a>
    </form>
</main>