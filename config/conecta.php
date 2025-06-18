<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "denuncia_BD";
$con = new mysqli($host, $usuario, $senha, $bd);

if($con->connect_error)
{
    echo "erro na conexão";
}
?>