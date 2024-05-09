<?php

$msgs_sucesso = [
    "cadastrook" => "Cadastro realizado com sucesso!",
    "produtook" => "Produto cadastrado com sucesso!",
    "categoriaok" => "Categoria cadastrada com sucesso!",
    "excluirok" => "Produto removido com sucesso!",
    "modificarok" => "Produto modificado com sucesso!",
    "sairok" => "Você foi desconectado."
];

$msgs_falha = [
    "cadastrofalha" => "Falha ao se cadastrar, verifique as informações digitadas.",
    "produtofalha" => "Falha ao cadastrar produto, verifique as informações digitadas.",
    "categoriafalha" => "Falha ao cadastrar categoria.",
    "excluirfalha" => "Falha ao excluir produto.",
    "modificarfalha" => "Falha ao modificar o produto.",
    "loginfalha" => "Usuario e/ou senha incorretos."
];

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Verificar se "erro" está no GET:
    // Exemplo: index.php?erro=loginfalha
    <?php if (isset($_GET['erro'])) { ?>
        Swal.fire({
            title: "Erro",
            text: "<?= $msgs_falha[$_GET['erro']]; ?>",
            icon: "error",
            showClass: {
                popup: `
                    animate__animated
                    animate__fadeIn
                    animate__pulse
                    `
            },
            hideClass: {
                popup: `
                    animate__animated
                    animate__fadeOut
                    `
            }
        });
    <?php } ?>

    // Verificar se "sucesso" está no GET:
    // Exemplo: index.php?sucesso=cadastrook
    <?php if (isset($_GET['sucesso'])) { ?>
        Swal.fire({
            title: "Sucesso!",
            text: "<?= $msgs_sucesso[$_GET['sucesso']]; ?>",
            icon: "success",
            showClass: {
                popup: `
                    animate__animated
                    animate__fadeIn
                    animate__pulse
                    `
            },
            hideClass: {
                popup: `
                    animate__animated
                    animate__fadeOut
                    `
            }
        });
    <?php } ?>

    // Remover parametros da URL:
    window.history.replaceState(null, '', window.location.pathname);
</script>