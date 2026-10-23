<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achados Web - dashboard</title>
    <link rel="stylesheet" href="/app/view/assets/css/login.css">
    <link rel="stylesheet" href="/app/view/assets/css/loading.css">
</head>

<body>
    <div id="loading-screen" class="active">
        <div class="spinner"></div>
        <p>Carregando...</p>
    </div>
    <h1>
        Bem-vindo ao painel,
        <?php echo ($_SESSION['nome']); ?>
    </h1>

    <p>
        <a href="index.php?action=logout">Sair</a>
    </p>


    <script src="/app/view/assets/js/loading.js"></script>
</body>

</html>