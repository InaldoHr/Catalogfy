<?php

// Verificar a sessão:
    session_start();
if (!isset($_SESSION['usuario'])) {
    // Voltar pro login:
    header("Location: index.php");
    die();
}





if(isset($_GET['id'])){
    require_once('classes/Produto.class.php');
    $c = new Produto();
    $c->id = $_GET['id'];

    //Buscar nome da foto e apagar
    $resultado = $c->ListarFoto()[0]['foto'];
    $c->foto = $_POST['foto'];
    if($c->Apagar() == 1){
    
        unlink("../fotos/" . $resultado);
         // Redirecionar:
        header('Location: ../painel.php?sucesso=excluirok');
    }else{
        header('Location: ../painel.php?falha=excluirfalha');
    }

}else{
    echo '<h3>O ID deve ser informado na URL.</h3>';
}


?>