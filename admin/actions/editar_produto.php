<?php

// Verificar a sessão:
    session_start();
    if (!isset($_SESSION['usuario'])) {
        // Voltar pro login:
        header("Location: index.php");
        die();
    }


// Verificar se a página está sendo carregada por POST
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('classes/Produto.class.php');
    $c = new Produto();
    $c->nome = strip_tags($_POST['nome']);
    $c->descricao = strip_tags($_POST['descricao']);
    $c->id_categoria = strip_tags($_POST['id_categoria']);
    $c->estoque = strip_tags($_POST['estoque']);
    $c->preco = strip_tags($_POST['preco']);
    // $c->foto = strip_tags($_FILES['foto']);
    $c->id = strip_tags($_POST['id']);

    // $resultado = $c->ListarFoto()[0]['foto'];
    // print_r($resultado);
    // die();

    

    if($c->Editar() == 1){

        // Redirecionar de volta à painel.php:
        // unlink("../fotos/" . $resultado);

        header('Location: ../painel.php?sucesso=modificarok');
    }else{
        header('Location: ../painel.php?erro=modificarfalha');
    }
}else{
    echo '<h3>Essa página deve ser carregada por POST.</h3>';
}

?>