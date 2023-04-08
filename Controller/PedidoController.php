<?php

class PedidoController extends Controller
{
    function listar()
    {
        $modelo = new Pedido();
        $pedidos = $modelo->read();

        $modelo = new Usuario();
        $usuarios = $modelo->read();

        $this->view('ListagemPedidos', compact('pedidos', 'usuarios'));
    }

    function idAtual()
    {
        $pedido = new Pedido();
        $dado = $pedido->read();

        return count($dado) + 1;
    }

    function idUsuario()
    {
        $modelo = new Usuario();
        $usuarios = $modelo->read();

        return rand(1, count($usuarios));
    }

    function novo()
    {
        $pedido = array();
        $pedido['id'] = $this->idAtual();
        $pedido['status'] = "em andamento";
        $pedido['usuario_id'] = $this->idUsuario();
        $pedido['pedidos'] = $_POST['pedidos'];

        $model = new Pedido();
        $model->create($pedido);

        header('location: http://localhost/trabalho-web3/');
        //$this->redirect('');
    }

    function salvar()
    {
        $pedido = array();
        $pedido['id'] = $_POST['id'];
        $pedido['status'] = $_POST['status'];
        $pedido['usuario_id'] = $_POST['usuario_id'];
        $pedido['pedidos'] = $_POST['pedidos'];

        $model = new Pedido();
        $model->update($pedido);

        $this->redirect('pedido/listar');
    }

    function editar($id)
    {
        $modelo = new Pedido();
        $pedido = $modelo->getById($id);

        $modelo = new Usuario();
        $usuarios = $modelo->read();

        $modelo = new Produto();
        $produtos = $modelo->read();

        $this->view("formPedido", compact('pedido', 'usuarios', 'produtos'));
    }

    function excluir($id)
    {
        $modelo = new Pedido();
        $modelo->delete($id);

        $this->redirect('pedido/listar');
    }

}
?>