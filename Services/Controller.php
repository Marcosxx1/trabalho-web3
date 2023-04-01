<?php
abstract class Controller
{
    public function view($visao, $dados)
    {
        extract($dados);

        if (substr($visao, 0, 4) == "form") {
            $arquivo = "View/Components/Forms/$visao.php";
        } else {
            $arquivo = "View/Components/Listings/$visao.php";
        }

        require_once "View/Template.php";
    }

    public function redirect($visao)
    {
        header('location: ' . APP . $visao);
    }
}
?>