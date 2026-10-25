<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achados Web - Login</title>
    <link rel="stylesheet" href="/app/view/assets/css/login.css">
    <link rel="stylesheet" href="/app/view/assets/css/loading.css">
</head>

<body>
    <div id="loading-screen" class="active">
        <div class="spinner"></div>
        <p>Carregando...</p>
    </div>
    <div class="painel_login">
        <h2>Registrar-se</h2>

        <form action="index.php?action=criarUsuario" method="POST">
            <label for="nome_id">Nome</label>
            <input type="text" name="nome" id="nome_id" required>

            <label for="email_id">Email</label>
            <input type="email" name="email" id="email_id" required>

            <label for="senha_id">Senha</label>
            <input type="password" name="senha" id="senha_id" required>
            <a href="index.php?action=login">Já tem conta? faça login</a>
            <button type="submit">Confirmar</button>
        </form>
    </div>



    <script src="/app/view/assets/js/loading.js"></script>
</body>

</html>