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
        $fornecedor['nomeFornecedor'] = "";
        $fornecedor['cnpj'] = "";

        $this->view("formFornecedor", compact('fornecedor'));
    }

    function salvar()
    {
        $fornecedor = array();
        $fornecedor['id'] = $_POST['id'];
        $fornecedor['nomeFornecedor'] = $_POST['nomeFornecedor'];
        $fornecedor['cnpj'] = $_POST['cnpj'];

        $modelo = new Fornecedor();
        if ($fornecedor['id'] == $this->idAtual()) {
            $modelo->create($fornecedor);
        } else {
            $modelo->update($fornecedor);
        }

        $this->redirect('produto/listar');
    }

    function editar($id)
    {
        $modelo = new Fornecedor();
        $fornecedor = $modelo->getById($id);

        $this->view("formFornecedor", compact('fornecedor'));
    }

    function excluir($id)
    {
        $modelo = new Fornecedor();
        $modelo->delete($id);

        $this->redirect('fornecedor/listar');
    }
}
?>