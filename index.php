<?php
require_once("controllers/DenunciaController.php");
require_once("config/conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dados = [
        "descricao" => $_POST["descricao"],
        "imagem" => $_POST["imagem"],
        "endereco" => $_POST["endereco"],
    ];

    $denuncia = new DenunciaController($con, $dados);
    $denuncia->confirma();

    var_dump($denuncia);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denuncia_Web</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="descricao">
        <input type="text" name="imagem">
        <input type="text" name="endereco">
        <input type="submit">
    </form>
</body>

</html>