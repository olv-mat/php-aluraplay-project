<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="/css/styles.css">
        <title>Video Player</title>
    </head>
    <body>
        <header>
            <nav class="header-container flex-row">
                <div class="align-center">
                    <a href="/">
                        <h2>Video Player</h2>
                    </a>
                </div>
                <div class="flex-end">
                    <a href="/insert-video" class="btn">Adicionar</a>
                    <a href="/logout" class="btn">Sair</a>
                </div>
            </nav>
        </header>
        <?php if (isset($_SESSION["error_message"])): ?>
            <p class="message error-message">
                <?= $_SESSION["error_message"]; ?>
                <?php unset($_SESSION["error_message"]); ?>
            </p>
        <?php elseif (isset($_SESSION["success_message"])) :?>
            <p class="message success-message">
                <?= $_SESSION["success_message"]; ?>
                <?php unset($_SESSION["success_message"]); ?>
            </p>
        <?php endif; ?>
        <?= $this->section("content"); ?>
    </body>
</html>
