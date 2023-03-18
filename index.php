<?php
include_once "autoload.php";
define("APP", "http://localhost/TrabalhoWeb3/");
if (!isset($_Get["url"])) {
    $url = "index/index";
} else {
    $url = $_Get["url"];
}

$vetor_url = explode("/", $url);
$name_controller = ucfirst($vetor_url[0]) . 'Controller';
$acao = $vetor_url[1];

if (count($vetor_url) == 2) {
    $controller->$acao();
} else {
    $id = $vetor_url[2];
    $controller->$acao($id);
}
?>
