<?php
session_start();
include 'menu.php';
include 'classes/admin.class.php';
include 'botton.php';
if(!empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);

    $usuario = new Admin();
    if($usuario->fazerLogin($email, $senha)){
        header("Location: index.php");
        exit;
    }else{
        echo "Usuario e/ou senha estão incorretas!";

    }
}
?>

<h1>LOGIN</h1>

    <form method="post">
        Email: <br>
        <input type="email" name="email"><br><br>
        Senha: <br>
        <input type="password" name="senha"><br><br>
        <input class="button" type="submit" value="Entrar">
        <a class="button" href="index.php">VOLTAR</a>
    </form>    





