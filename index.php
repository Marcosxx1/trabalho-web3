<?php
include_once "autoload.php";

define("APP", "http://localhost/trabalho-web3/");
if (!isset($_GET['url'])) {
  $url = 'index/index';
} else {
  $url = $_GET['url'];
}
$vetor_url = explode("/", $url);
$name_controller = ucfirst($vetor_url[0]) . 'Controller';
$acao = $vetor_url[1];

$controller = new $name_controller();
if (count($vetor_url) == 2) {
  $controller->$acao();
} else {
  $id = $vetor_url[2];
  $controller->$acao($id);
}
?>