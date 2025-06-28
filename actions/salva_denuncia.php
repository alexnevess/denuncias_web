<?php
session_start();

require_once("../config/conecta.php");
require_once("../classes/Denuncia.php");

$caminho_uploads = '../uploads/';
$caminho_tmp = "../tmp/";

function sanitiza_imagem($nome, $caminho) //Sanitiza o nome da imagem e testa se ela já existe nas pastas uploads e tmp
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST['descricao'])) {
        header("Location: ../index.php?erro=1");
    }
    $dados = [
        "descricao" => $_POST["descricao"] ?? "",
        "endereco" => $_POST["endereco"] ?? "",
        "confirma" => $_POST["confirma"] ?? "",
    ];

    if ($dados['confirma'] == 0) {
        if ($_FILES["imagem"]["error"] === 0) {
            $nome_arquivo = $_FILES['imagem']['name'];
            $destino = sanitiza_imagem($nome_arquivo, $caminho_tmp);
            $movido = move_uploaded_file($_FILES['imagem']['tmp_name'], '../tmp/' . $destino); //move a imagem para a pasta temporária
            $_SESSION['tmp_imagem'] = $destino; //Mantém a imagem através de session
        }
        include '../views/confirmacao.php'; //view para a confirmação do formulário

    } elseif ($dados['confirma'] == 1) {
        if (isset($_SESSION['tmp_imagem'])) {
            $imagem_nome = $_SESSION['tmp_imagem']; //Salva o nome da imagem que está em session em uma vriável
            $destino_uploads = sanitiza_imagem($imagem_nome, $caminho_uploads); //sanitiza e testa se existe com a função arquivo_existe
            rename($caminho_tmp . $imagem_nome, $caminho_uploads . $destino_uploads); //move a imagem da pasta temporária para upoload
        } else {
            $destino_uploads = null;
        }

        $dados_confirmados = [ //Cria um array sanitizado para criar o objeto denúncia
            "descricao" => $dados['descricao'],
            "imagem" => $destino_uploads,
            "endereco" => $dados['endereco'],
        ];

        $denuncia->salvar($dados_confirmados); //salva no BD
        header("Location: ../views/sucesso.php");
        exit;
    } elseif ($dados['confirma'] == "-1") {
        unlink($caminho_tmp . $_SESSION['tmp_imagem']); //Exclui a imagem da pasta temporária se o usuário cancelar
        session_destroy();
        header("Location: ../index.php");
        exit;
    } else {
        echo "erro";
    }
}
