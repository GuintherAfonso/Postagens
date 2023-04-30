<?php
session_start();
  include 'menu.php';
  include 'botton.php';
  include 'classes/categoria.class.php';

  $categoria_class = new Categoria;
  $categorias = $categoria_class->listar();

  if(!isset($_SESSION['logado'])){
    header("Location: login.php");
  exit;
 }
?>

<h1>CRIAR POST</h1>

<form method="post" action="post.submit.php">
        Titulo: <br>
        <input type="text" name="titulo"><br><br>
        Descriçao: <br>
        <input type="text" name="descricao"><br><br>
        Categoria: <br>
        
        <select name="idcategoria">
            <?php foreach( $categorias as $categoria ) { ?>
                <option value="<?php echo $categoria['id_categoria'] ?>"><?php echo $categoria['nome'] ?></option>
            <?php }; ?>
        </select>

        <input class="button" type="submit" value="Salvar">
        <a class="button" href="index.php">VOLTAR</a>
    </form>    
