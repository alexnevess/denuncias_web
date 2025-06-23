<?php
require_once("../classes/Denuncia.php");

if (isset($_GET['pagina'])) {
    $pagina = (int) $_GET['pagina'];
} else {
    $pagina = 0;
}

$quantidade = $denuncia->quantidade_denuncias();
$limite = 15;

$limite_paginas = (int)ceil($quantidade/$limite);

$offset= $limite*$pagina;

$resultado_bd = $denuncia->mostrar($limite, $offset);

while($resultado = $resultado_bd->fetch_assoc())
{
    echo $resultado['descricao_dnc'];
    echo $resultado['endereco_dnc'];
    echo "<img src='../uploads/".$resultado['imagem_dnc']."'>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if ($quantidade > $limite) {
        if ($pagina != 0) {
            echo "<a href ='?pagina=" . $pagina - 1 . "'>Voltar</a>";
        }
        if($pagina < $limite_paginas){
        echo "<a href ='?pagina=" . $pagina + 1 . "'>Avançar</a>";
        }
    }
    ?>
</body>

</html>