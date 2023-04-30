<?php
include 'classes/post.class.php';
$post = new Posts();

if(!empty($_POST['titulo'])){
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $idcategoria = $_POST['idcategoria'];

    $post->adicionar($titulo, $descricao, $idcategoria);
    header("Location: index.php");
}


