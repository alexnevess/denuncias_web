<?php
require_once 'AcoesDenuncia.php';
include_once '../config/conecta.php';

class Denuncia implements AcoesDenuncia
{
    private $titulo;
    private $descricao;
    private $imagem;

    public function __construct($titulo, $descricao, $imagem)
    {
        $this->setTitulo($titulo);
        $this->setDescricao($descricao);
        $this->setImagem($imagem);
    }
    //Incluindo funções da interface: AcoesDenuncia
    public function salvar()
    {
       $sql = "INSERT INTO denuncias(titulo, descricao, imagem) VALUES (?,?,?)";
       $consulta = $con->prepare($sql);
       $consulta->bind_param("sss",$this->titulo,$this->descricao,$this->imagem);
       $consulta->execute();
    }
    public function mostrar()
    {
        //retorna as informações que estão no objetos.
        //Pode ser usado na tela de confirmar o registro da denuncia.
    }
    // getters e setters
    function getTitulo()
    {
        return $this->titulo;
    }
    function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    function getDescricao()
    {
        return $this->descricao;
    }
    function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    function getImgem()
    {
        return $this->imagem;
    }
    function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }
}
?>