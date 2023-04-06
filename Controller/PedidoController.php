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

    function novo($id, $bool)
    {
        if ($bool) {
            $pedido = array();
            $pedido['id'] = $this->idAtual();
            $pedido['status'] = "em andamento";
        }

        $this->redirect("pedido/salvar/{$id}}");
    }

    function salvar($id)
    {
        $usuario = array();
        $usuario['id'] = $_POST['id'];
        $usuario['status'] = $_POST['status'];


        $model = new Usuario();
        if ($usuario['id'] == $this->idAtual()) {
            $model->create($usuario);
        } else {
            $model->update($usuario);
        }
        $this->redirect('usuario/listar');
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