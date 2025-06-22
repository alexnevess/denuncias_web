<?php
require_once("../config/conecta.php");
require_once("../classes/Denuncia.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $dados = [
            "descricao" => $_POST["descricao"] ?? "",
            "imagem" => $_FILES["imagem"] ?? null,
            "endereco" => $_POST["endereco"] ?? "",
            "confirma" => $_POST["confirma"] ?? "",
        ];

    if ($dados['confirma'] == 0) {
        include '../views/confirmacao.php';
    } elseif ($dados['confirma'] == 1) {
        echo 'confirma denuncia';
    }
    var_dump($dados);
}
?>