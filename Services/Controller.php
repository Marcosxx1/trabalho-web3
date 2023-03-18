<?php
abstract class Controller
{
    public function view($visao, $dados)
    {
        extract($dados);

        $arquivo = "View/$visao.php";

        require_once "View/Template.php";
    }

    public function redirect($visao)
    {
        header('location: ' . APP . $visao);
    }
}
?>