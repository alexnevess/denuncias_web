<?php
interface AcoesDenuncia
{
    public function salvar($dados);
    public function mostrar($limite, $offset);
}
?>