<?php
    require_once 'CLASSES/usuarios.php';
    $u = new Usuario;
?>

<html>
<head lang="pt-br">
    <title>Sistema login - PHP</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="CSS/estilo.css" />
</head>

<body>
    <div id="corpo-form">
        <h1>Faça o login</h1>
        <form method="POST">
            <input type="email" name="email" placeholder="email">
            <input type="password" name="senha" placeholder="senha">
            <input type="submit" value="Entrar">
            <a href="cadastrar.php">Ainda não tem cadastro? <strong>Cadastre-se!</strong></a>
        </form>
    </div>
    <?php

    if (isset($_POST['email'])){

        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        //verificar se nao ha campos vazios
        if(!empty($email) && !empty($senha)){

            $u->conectar("sistema_login", "localhost", "root", "*2Z>1Pm.");
            if($u->msgErro == ""){
                if($u->logar($email, $senha)){

                header("location: areaprivada.php");

                }else{
                    ?>
                    <div class="msg-erro">
                        Email e/ou senha incorretos!
                    </div>
                    <?php
                }
            }else{
                ?>
                <div class="msg-erro">
                    <?php echo "Erro: ".$u->msgErro; ?>
                </div>
                <?php
            }

        }else{
            ?>
            <div class="msg-erro">
                Preencha todos os campos!
            </div>
            <?php

        }
    
    }

    ?>
</body>
</html>