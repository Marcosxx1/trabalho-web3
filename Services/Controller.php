<?php
abstract class controller
{
    public function view($visao, $dados)
    {
        extract($dados);

        $arquivo = "views/$visao.php";

        require_once "views/template.php";
    }

    public function redirect($visao)
    {
        header('location: ' . APP . $visao);
    }
}
?>