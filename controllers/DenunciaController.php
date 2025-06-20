<?php
require 'models/Denuncia.php';
class DenunciaController
{
    private $denuncia;

    public function __construct($con, $dados)
    {
        $this->denuncia = new Denuncia($con, $dados);
    }

    public function confirma()
    {
        $this->denuncia->salvar();
    }

    function getDados()
    {
        return $this->denuncia;
    }
    function setDados($denuncia)
    {
        $this->denuncia = $denuncia;
    }
}

?>