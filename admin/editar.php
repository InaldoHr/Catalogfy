<?php


require_once('actions/classes/Categoria.class.php');
$c = new Categoria();
$lista_categorias = $c->Listar();



// Verificar a sessão:
session_start();
if (!isset($_SESSION['usuario'])) {
  // Voltar pro login:
  header("Location: index.php");
  die();
}

$erro = 0;

if (isset($_GET['id'])) {
  require_once('actions/classes/Produto.class.php');
  $c = new Produto();
  $c->id = $_GET['id'];
  $resultado = $c->ListarPorID();
  if (count($resultado) == 1) {
    $resultado = $resultado[0];
    // print_r($resultado);
  } else {
    $erro = 1;
  }
} else {
  $erro = 1;
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formulário de Edição</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1>Formulário de Edição</h1>
    <form action="actions/editar_produto.php" method="POST">
      <input type="hidden" name="id" value="<?= $resultado['id'] ?>" />

      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" value="<?= $resultado['nome'] ?>" class="form-control" id="nome" name="nome">
      </div>

      <div>Foto:</div>
      <div class="form-group">
        
        <img src="fotos/<?= $c->ListarFoto()[0]['foto']; ?>" alt="Produto 1" width="200px">
        <label for="fotoProduto"></label>
        <input name="foto" accept="image/*" type="file" class="form-control-file" id="foto">

      </div>
     



      <div class="form-group mt-3">
        <label for="descricao">Descrição:</label>
        <input type="text" value="<?= $resultado['descricao'] ?>" class="form-control" id="descricao" name="descricao">
      </div>

      <label for="categoria">Categoria:</label>
      <div class="form-group">
        <select name="id_categoria" class="form-control" id="categoriaProduto">

          <?php foreach ($lista_categorias as $l) {  ?>
            <?php if ($resultado['nome_categoria'] == $l['nome']) { ?>
              <option selected value="<?= $l['id'] ?>"><?= $l['nome']; ?></option>
            <?php } else { ?>
              <option value="<?= $l['id'] ?>"><?= $l['nome']; ?></option>
            <?php } ?>
          <?php } ?>

        </select>
      </div>

      <div class="form-group">
        <label for="Estoque">Estoque:</label>
        <input type="text" value="<?= $resultado['estoque'] ?>" class="form-control" id="estoque" name="estoque">
      </div>

      <div class="form-group">
        <label for="preco">Preço:</label>
        <input type="text" value="<?= $resultado['preco'] ?>" class="form-control" id="preco" name="preco">
      </div>

      <button type="submit" class="btn btn-primary">Editar</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>