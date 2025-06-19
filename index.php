<?php
require_once "models/Denuncia.php";
include 'config/conecta.php';


$d1 = new Denuncia($con, 'Buraco que está causando problemas na minha rua', 'uploads/teste.jpg', 'Rua Josina Joaquina De Souza, 155');
var_dump($d1);
$d1->mostrar();
echo $d1->mostrar();
?>