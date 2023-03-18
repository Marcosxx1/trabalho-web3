<?php

class FornecedorController extends Controller
{

    function listar()
    {
        $modelo = new Fornecedor();
        $fornecedores = $modelo->read();

        $this->view('ListagemFornecedores', compact('fornecedores'));
    }

    function idAtual()
    {
        $fornecedor = new Fornecedor();
        $dados = $fornecedor->read();

        return count($dados) + 1;
    }

    function novo()
    {
        $fornecedor = array();
        $fornecedor['id'] = $this->idAtual();
        $fornecedor['nome'] = "";

        $this->view("FormFornecedor", compact('fornecedor'));
    }

    function salvar()
    {
        $fornecedor = array();
        $fornecedor['id'] = $_POST['id'];
        $fornecedor['nome'] = $_POST['nome'];

        $modelo = new Fornecedor();
        if ($fornecedor['id'] == $this->idAtual()) {
            $modelo->create($fornecedor);
        } else {
            $modelo->update($fornecedor);
        }

        $this->redirect('fornecedor/listar');
    }

    function editar($id)
    {
        $modelo = new Fornecedor();
        $fornecedor = $modelo->getById($id);

        $this->view("FormFornecedor", compact('fornecedor'));
    }

    function excluir($id)
    {
        $modelo = new Fornecedor();
        $modelo->delete($id);

        $this->redirect('fornecedor/listar');
    }
}
?>