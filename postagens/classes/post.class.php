<?php
require_once 'classes/conexao.class.php';

class Posts {
    private $id_post;
    private $titulo;
    private $descricao;
    private $idcategoria;
    private $con;


public function __construct() {
    $this->con = new Conexao();
}

public function adicionar($titulo, $descricao, $idcategoria) {
    try {
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->idcategoria = $idcategoria;
        $sql = $this->con->conectar()->prepare("INSERT INTO post(titulo, descricao, idcategoria) VALUES(:titulo, :descricao, :idcategoria)");
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":idcategoria", $idcategoria);
        $sql->execute();
        return TRUE;
    } catch (PDOException $ex){
        return 'ERRO: ' . $ex->getMessage();
    }
}

public function listar() {
    try {
        $sql = $this->con->conectar()->prepare("SELECT id_post, titulo, descricao, idcategoria FROM post");
        $sql->execute();
        return $sql->fetchAll();
    } catch (PDOException $ex) {
          return 'ERRO ' .  $ex->getMessage();
        }
    
}

public function busca($id_post) {
    try {
        $sql = $this->con->conectar()->prepare("SELECT * FROM post WHERE id_post = :id_post");
        $sql->bindValue(':id_post', $id_post);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetch();
        } else {
            return array();
        }
    } catch (PDOException $ex) {
        return 'ERRO ' . $ex->getMessage();
    }
}

public function editar($titulo, $descricao, $idcategoria, $id_post) {
    try {
        $sql = $this->con->conectar()->prepare("UPDATE post SET titulo = :titulo, descricao = :descricao, idcategoria = :idcategoria WHERE id_post = :id_post");
        $sql->bindValue(':titulo', $titulo);
        $sql->bindValue(':descricao', $descricao);
        $sql->bindValue(':idcategoria', $idcategoria);
        $sql->execute();
        return TRUE;
    } catch (PDOException $ex) {
        return 'ERRO ' . $ex->getMessage();
    }
}

public function excluir($id_post) {
    $sql = $this->con->conectar()->prepare("DELETE FROM post WHERE id_post = :id_post");
    $sql->bindValue(':id_post', $id_post);
    $sql->execute();
}

public function traznome ($idcategoria) {
    try{
        $sql = $this->con->conectar()->prepare("SELECT nome FROM categoria WHERE id_categoria = :idcategoria");
        $sql->execute([':idcategoria' => $idcategoria]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }  catch (PDOException $ex) {
        return 'ERRO ' . $ex->getMessage();
    }            
}
}