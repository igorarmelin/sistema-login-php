<html>
<head lang="pt-br">
    <title>Sistema login - PHP</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="CSS/estilo.css" />
</head>

<body>
    <div id="corpo-form">
        <h1>Faça o login</h1>
        <form action="processa.php" method="POST">
            <input type="email" placeholder="email">
            <input type="password" placeholder="senha">
            <input type="submit" value="Entrar">
            <a href="cadastrar.php">Ainda não tem cadastro? <strong>Cadastre-se!</strong></a>
        </form>
    </div>
</body>
</html>