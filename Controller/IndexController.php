<?php
class IndexController extends Controller
{
    function index()
    {
        $modelo = new Produto();
        $produtos = $modelo->read();

        $this->view('indexHome', compact('produtos'));
    }
}
?>