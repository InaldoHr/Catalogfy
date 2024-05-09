<?php

if (isset($_GET['id'])) {
  require_once('classes/Produto.class.php');
  $c = new Produto();
  $c->id = $_GET['id'];
  $resultado = $c->ListarPorID();
  if (count($resultado) == 1) {
    $resultado = $resultado[0];
    print_r($resultado);
  } else {
    $erro = 1;
  }
} else {
  $erro = 1;
}


// Validar sessão:

// Verificar se os valores estão "chegando":

// print_r($_POST);
// echo "<br>";
// print_r($_FILES['foto']);
// echo "<br>";
// print_r($_SESSION['usuario']);

require_once("classes/Carrinho.class.php");
$p = new Carrinho();
// Verifique se 'id' está definido em $resultado antes de atribuir
if (isset($resultado['id'])) {
    // Atribuir o valor do 'id' do produto para a propriedade id_produto
    $p->id_produto = strip_tags($resultado['id']);
} else {
    // Caso 'id' não esteja definido em $resultado, defina um valor padrão ou lide com o erro de outra forma
    // Por exemplo:
    $p->id_produto = 0; // Valor padrão
    // Ou exiba uma mensagem de erro
    echo "ID do produto não encontrado.";
}

if ($p->AdicionarCarrinho() == 1) {
  // Deu certo o cadastro!
  // Retornar ao painel.php:
  header("Location: ../../index.php?sucesso=categoriaok");
  die();
} else {
  header("Location: ../../index.php?erro=categoriafalha");
  die();
}
