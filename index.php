<?php
include_once "autoload.php";
define("APP", "http://localhost/TrabalhoWeb3/");
if (!isset($_Get["url"])) {
    $url = "index/index";
} else {
    $url = $_Get["url"]; // $url = usurio/editar/2
}

$vetor_url = explode("/", $url); //[0] - Usurio ////[1] - editar ////[2] 2
$name_controller = ucfirst($vetor_url[0]) . 'Controller'; //UsuarioController
$acao = $vetor_url[1]; //editar

$Controller = new $name_controller();
if (count($vetor_url) == 2) {
    $controller->$acao();
} else {
    $id = $vetor_url[2];
    $controller->$acao($id);
}
?>
