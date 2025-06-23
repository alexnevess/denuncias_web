<?php
require_once 'AcoesDenuncia.php';
require_once '../config/conecta.php';

class Denuncia implements AcoesDenuncia
{
    private $descricao;
    private $imagem;
    private $endereco;
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }
    //Incluindo funções da interface: AcoesDenuncia
    public function salvar($dados)
    {
        $this->setDescricao($dados['descricao']);
        $this->setImagem($dados['imagem']);
        $this->setEndereco($dados['endereco']);

        $sql = "INSERT INTO denuncia(descricao_dnc, imagem_dnc, endereco_dnc) VALUES (?,?,?)";
        $consulta = $this->con->prepare($sql);
        $consulta->bind_param("sss", $this->descricao, $this->imagem, $this->endereco);
        $consulta->execute();
    }
    public function mostrar($limite, $offset)
    {
        return $sql = $this->con->query("SELECT descricao_dnc, endereco_dnc, imagem_dnc, data_dnc FROM denuncia ORDER BY id_dnc DESC LIMIT $limite OFFSET $offset ");  
    }

    public function quantidade_denuncias()
    {
        $sql = $this->con->query("SELECT count(*) as total FROM denuncia");
        $resultado = $sql->fetch_assoc();
        return $resultado['total'];
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
$denuncia = new Denuncia($con);
?>