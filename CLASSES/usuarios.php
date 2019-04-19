<?php

class Usuario{

    private $pdo;
    public $msgErro = "";
    
    public function conectar($nome, $host, $usuario, $senha){

        global $pdo;
        global $msgErro;
        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
        }
        catch(PDOException $e){
            $msgErro = $e->getMessage();
        }

    }

    public function cadastrar($nome, $telefone, $email, $senha){

        global $pdo;
        //verificar se ja existe cadastro
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();

        if($sql->rowCount() > 0){

            return false;  //ja cadastrada

        }else{ //caso não, cadastrar

            $sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            return true;

        }

    }

    public function logar($email, $senha){

        global $pdo;
        //verificar se email e senha estao cadastrados, se sim, logar no sistema
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0){

            //logar no sistema
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; //logado com sucesso

        }else{

            return false; // login não possivel

        }

    }

}

?>