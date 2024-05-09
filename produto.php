<?php
// Página com detalhes do produtos selecionado.
// ex: produto.php?id=25

if (isset($_GET['id'])) {
  require_once('admin/actions/classes/Produto.class.php');
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

<!doctype html>
<html lang="en">

<head>
  <title>Detalhes do Produto</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #00a;">
    <a class="navbar-brand" href="#">Detalhes do Produto</a>
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav me-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="index.php" aria-current="page">Início <span class="visually-hidden">(current)</span></a>
        </li>
      </ul>
    </div>
    <div>
      carrinho
    </div>
  </nav>

  <div class="container">
    <div class="row mt-3">
      <div class="col">
        <h1 class="display-5">Detalhes do Produto</h1>
        <h1>Categoria: <?= $resultado['nome_categoria'] ?></h1>
      </div>
    </div>
    <!-- Detalhes do Produto selecionado: -->
    <div class="row mt-5">
      <div class="col-7">
        <img class="rounded mx-auto d-block" src="admin/fotos/<?= $resultado['foto'] ?>" />
      </div>
      <div class="col-4">
        <h2><?= $resultado['nome'] ?></h2>
        <p><?= $resultado['descricao'] ?></p>
        <h1 class="display-6">R$ <?= $resultado['preco'] ?></h1>
        <a href="admin/actions/adicionar_carrinho.php?id=<?= $resultado['id']; ?>" class="btn btn-primary d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
          </svg>Adicionar ao carrinho</a>

      </div>
      <div class="col-1">
        <a class="btn btn-primary" href="index.php">Voltar</a>
      </div>

    </div>

  </div>

  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
          <svg class="bi" width="30" height="24">
            <use xlink:href="#bootstrap" />
          </svg>
        </a>
        <span class="text-muted">&copy; 2029 Senacão Show</span>
      </div>

      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
              <use xlink:href="#twitter" />
            </svg></a></li>
        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
              <use xlink:href="#instagram" />
            </svg></a></li>
        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
              <use xlink:href="#facebook" />
            </svg></a></li>
      </ul>
    </footer>
  </div>



  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

</body>

</html>