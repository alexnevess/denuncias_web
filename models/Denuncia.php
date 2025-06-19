<?php
require_once 'AcoesDenuncia.php';

class Denuncia implements AcoesDenuncia
{
    private $descricao;
    private $imagem;
    private $endereco;
    private $con;

    public function __construct($con, $descricao, $imagem, $endereco)
    {
        $this->con = $con;
        $this->setDescricao($descricao);
        $this->setImagem($imagem);
        $this->setEndereco($endereco);
    }
    //Incluindo funções da interface: AcoesDenuncia
    public function salvar()
    {
       $sql = "INSERT INTO denuncia(descricao_dnc, imagem_dnc, endereco_dnc) VALUES (?,?,?)";
       $consulta = $this->con->prepare($sql);
       $consulta->bind_param("sss",$this->descricao,$this->imagem, $this->endereco);
       $consulta->execute();
    }
    public function mostrar()
    {
        //retorna as informações que estão no objetos.
        //Pode ser usado na tela de confirmar o registro da denuncia.
    }
    // getters e setters
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
    function getEndereco()
    {
        return $this->endereco;
    }
    function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
}
?>