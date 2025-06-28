<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denuncia_Web</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/styleIndex.css">
</head>

<body>
    <?php
    include "includes/header.php";
    ?>
    <main class="mainIndex">
        <form class="formDenuncia" action="actions/salva_denuncia.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="descricao" rows="4" class="inputDenuncia">
            <?php if (isset($_GET['erro'])) {
                echo "Descrição é um item obrigatório";
            } ?>
            <input type="file" name="imagem" class="inputDenuncia">
            <input type="text" name="endereco" class="inputDenuncia">
            <input type="hidden" name="confirma" value="0" class="inputDenuncia">
            <input class="btnDenuncia" type="submit" value="Denunciar">
        </form>
    </main>
</body>

</html>