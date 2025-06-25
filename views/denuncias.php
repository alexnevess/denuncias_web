<?php
require_once("../classes/Denuncia.php");

if (isset($_GET['pagina'])) {
    $pagina = (int) $_GET['pagina'];
} else {
    $pagina = 0;
}

$quantidade = $denuncia->quantidade_denuncias();
$limite = 3;

$limite_paginas = (int)ceil($quantidade / $limite);

$offset = $limite * $pagina;

$resultado_bd = $denuncia->mostrar($limite, $offset);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/styleDenuncias.css">
</head>

<body>
    <main class="mainDen">
    <?php
    while ($resultado = $resultado_bd->fetch_assoc()) {
        echo "<div class = 'cardDen'>";
        echo "<p class = 'textoDen'>".$resultado['descricao_dnc']."</p>";
        echo "<img class = 'imgDen' src='../uploads/" . $resultado['imagem_dnc'] . "'>";
        echo "<p class = 'textoDen'>".$resultado['endereco_dnc']."</p>";
        echo "</div class = 'cardDen'>";
        
    }

    if ($quantidade > $limite) {
        if ($pagina != 0) {
            echo "<a href ='?pagina=" . $pagina - 1 . "'>Voltar</a>";
        }
        if ($pagina < $limite_paginas - 1) {
            echo "<a href ='?pagina=" . $pagina + 1 . "'>Avançar</a>";
        }
    }
    ?>
    </main>
</body>

</html>