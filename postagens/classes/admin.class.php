<?php
require_once 'classes/conexao.class.php';

class Admin {
    private $email;
    private $senha;
    private $con;

public function __construct() {
    $this->con = new Conexao();
}

public function fazerLogin($email, $senha){
        $sql = $this->con->conectar()->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetch();

            $_SESSION['logado'] = $sql['id_usuario'];
            return TRUE;
        }
        return FALSE;
    }
}    