<?php

class PedidoController extends Controller
{
    function listar()
    {
        $modelo = new Pedido();
        $pedidos = $modelo->read();

        $this->view('ListagemPedidos', compact('pedidos'));
    }

    function idAtual()
    {
        $pedido = new Pedido();
        $dado = $pedido->read();

        return count($dado) + 1;
    }

    function novo()
    {
        $pedido = array();
        $pedido['id'] = $this->idAtual();
        $pedido['status'] = "";
        $pedido['data'] = "";

        $this->view("formPedido", compact('pedido'));
    }

    function salvar()
    {
        $pedido = array();
        $pedido['id'] = $_POST['id'];
        $pedido['status'] = $_POST['status'];
        $pedido['data'] = $_POST['data'];

        $modelo = new Pedido();
        if ($pedido['id'] == $this->idAtual()) {
            $modelo->create($pedido);
        } else {
            $modelo->update($pedido);
        }

        $this->redirect('pedido/listar');
    }

    function editar($id)
    {
        $modelo = new Pedido();
        $pedido = $modelo->getById($id);

        $this->view("formPedido", compact('pedido'));
    }

    function excluir($id)
    {
        $modelo = new Pedido();
        $modelo->delete($id);

        $this->redirect('pedido/listar');
    }
}
?>
