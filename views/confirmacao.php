<?php
$imagem = $_SESSION["tmp_imagem"] ?? null;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?=$dados['descricao']?></p>
    <p><?=$dados['endereco']?></p>
    <img src="../tmp/<?=$imagem?>">
    
    <form action="../actions/salva_denuncia.php" method="POST">
        <input type="hidden" name="confirma" value="-1">
        <input type="submit">
    </form>
    <form action="../actions/salva_denuncia.php" method="POST">
        <input type="hidden" name="descricao" value="<?=$dados['descricao']?>">
        <input type="hidden" name="endereco" value="<?=$dados['endereco']?>">
        <input type="hidden" name="confirma" value="1">
        <input type="submit">
    </form>
</body>
</html>