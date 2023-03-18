<?php

class ProdutoController extends Controller
{
    function listar()
    {
        $modelo = new Produto();
        $produtos = $modelo->read();

        $this->view('ListagemProdutos', compact('produtos'));
    }

    function idAtual()
    {
        $produto = new Produto();
        $dado = $produto->read();

        return count($dado) + 1;
    }

    function novo()
    {
        $produto = array();
        $produto['id'] = $this->idAtual();
        $produto['nome'] = "";
        $produto['preco'] = "";
        $produto['descricao'] = "";

        $this->view("formProduto", compact('produto'));
    }

    function salvar()
    {
        $produto = array();
        $produto['id'] = $_POST['id'];
        $produto['nome'] = $_POST['nome']; 
        $produto['preco'] = $_POST['preco']; 
        $produto['descricao'] = $_POST['descricao'];

        $modelo = new Produto();
        if ($produto['id'] == $this->idAtual()) {
            $modelo->create($produto);
        } else {
            $modelo->update($produto);
        }

        $this->redirect('produto/listar');
    }

    function editar($id)
    {
        $modelo = new Produto();
        $produto = $modelo->getById($id);

        $this->view("formProduto", compact('produto'));
    }

    function excluir($id)
    {
        $modelo = new Produto();
        $modelo->delete($id);

        $this->redirect('produto/listar');
    }
}
?>
