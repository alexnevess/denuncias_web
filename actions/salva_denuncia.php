<?php
session_start();

$caminho_uploads = '../uploads/';
$caminho_tmp = "../tmp/";

function arquivo_existe($nome, $caminho)//testa se o arquivo existe nas pastas tmp e uploads
{
    $nome_arquivo = pathinfo($nome, PATHINFO_FILENAME);
    $extensao_arquivo = pathinfo($nome, PATHINFO_EXTENSION);
    $nome_arquivo = preg_replace('/^A-z0-9/', '-', $nome_arquivo);
    $destino = $nome_arquivo . '.' . $extensao_arquivo;

    $i = 0;
    while (file_exists($caminho . $destino)) {
        $i += 1;
        $destino = $nome_arquivo . $i . '.' . $extensao_arquivo;
    }
    return $destino;
}

require_once("../config/conecta.php");
require_once("../classes/Denuncia.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $dados = [
        "descricao" => $_POST["descricao"] ?? "",
        "endereco" => $_POST["endereco"] ?? "",
        "confirma" => $_POST["confirma"] ?? "",
    ];

    if ($dados['confirma'] == 0) {
        if ($_FILES["imagem"]["error"] === 0) {
            $nome_arquivo = $_FILES['imagem']['name'];
            $destino = arquivo_existe($nome_arquivo,$caminho_tmp);
        }
        $movido = move_uploaded_file($_FILES['imagem']['tmp_name'], '../tmp/' . $destino);
        $_SESSION['tmp_imagem'] = $destino;

        include '../views/confirmacao.php';
    } elseif ($dados['confirma'] == 1) {
        $imagem_nome = $_SESSION['tmp_imagem'];
        $destino_uploads = arquivo_existe($imagem_nome, $caminho_uploads);
        rename($caminho_tmp . $imagem_nome, $caminho_uploads . $destino_uploads);
    }
    var_dump($dados);
}
?>