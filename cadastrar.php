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
    <div id="corpo-form-cad">
        <h1>Cadastre-se</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="nome completo" maxlength="45">
            <input type="text" name="telefone" placeholder="telefone" maxlength="45">
            <input type="email" name="email" placeholder="email" maxlength="45">
            <input type="password" name="senha" placeholder="senha" maxlength="45">
            <input type="password" name="confSenha" placeholder="confirmar senha" maxlength="45">
            <input type="submit" value="Cadastrar">
        </form>
    </div>
    <?php

    //verificar se clicou no botão
    if (isset($_POST['nome'])){

        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha = addslashes($_POST['confSenha']);

        //verificar se nao ha campos vazios
        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)){

            $u->conectar("sistema_login", "localhost", "root", "*2Z>1Pm.");
            if($u->msgErro == ""){//sem erro

                if($senha == $confirmarSenha){

                    if($u->cadastrar($nome, $telefone, $email, $senha)){

                        ?>
                        <div id="msg-sucesso">

                        </div>
                        <?php

                    }else{

                        ?>
                        <div class="msg-erro">

                        </div>
                        <?php

                    }

                }else{

                    ?>
                    <div class="msg-erro">

                    </div>
                    <?php

                }
                

            }else{

                ?>
                <div class="msg-erro">
                    <?php echo "Erro: ".$u->msgErro;?>
                </div>
                <?php
            }


        }else{

            ?>
            <div class="msg-erro">

            </div>
            <?php

        }

    }

    ?>
</body>
</html>