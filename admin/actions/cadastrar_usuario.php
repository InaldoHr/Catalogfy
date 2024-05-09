<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('classes/Usuario.class.php');
    $u = new Usuario();
    $u->nome = strip_tags($_POST['nome']);
    $u->email = strip_tags($_POST['email']);
    $u->senha = strip_tags($_POST['senha']);
    if($u->Cadastrar() == 1){
        //deu certo heh
        // Redirecionar de volta ao login:
        header("Location: ../index.php?sucesso=cadastrook");
        die();
    }else{
        header("Location: ../index.php?erro=cadastrofalha");
        die();
    }
}else{
    echo "Essa página dever ser carregada por post!";
}

?>