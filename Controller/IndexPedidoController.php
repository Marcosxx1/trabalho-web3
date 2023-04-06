<?php

class IndexPedidoController extends Controller
{
    function listar()
    {
        $modelo = new Produto();
        $produtos = $modelo->read();

        $this->view('indexPedidos', compact('produtos'));
    }
}
?>