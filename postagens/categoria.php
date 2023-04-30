<?php
session_start();
  include 'classes/categoria.class.php';
  include 'menu.php';
  include 'botton.php';
  
  if(!isset($_SESSION['logado'])){
    header("Location: login.php");
   exit;
  }
?>

   <h1>CRIAR CATEGORIA</h1>

<form method="post" action="categoria.submit.php">
        Nome: <br>
        <input type="text" name="nome"><br><br>
        <input class="button" type="submit" value="SALVAR">
        <a class="button" href="index.php">VOLTAR</a>
    </form>  