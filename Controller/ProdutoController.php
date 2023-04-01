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
        $produto['quantidade'] = 0;
        $produto['preco'] = "";

        $fornecedorClass = new Fornecedor();
        $fornecedores = $fornecedorClass->read();

        $categoriaClass = new Categoria();
        $categorias = $categoriaClass->read();

        $this->view("formProduto", compact('produto', 'categorias', 'fornecedores'));
    }

    function salvar()
    {
        $produto = array();
        $produto['id'] = $_POST['id'];
        $produto['nome'] = $_POST['nome']; 
        $produto['quantidade'] = $_POST['quantidade'];
        $produto['preco'] = $_POST['preco'];
        $produto['fornecedor_id'] = $_POST['fornecedor_id'];
        $produto['categoria_id'] = $_POST['categoria_id'];

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
        
        $fornecedorClass = new Fornecedor();
        $fornecedores = $fornecedorClass->read();

        $categoriaClass = new Categoria();
        $categorias = $categoriaClass->read();

        $this->view("formProduto", compact('produto', 'categorias', 'fornecedores'));
    }

    function excluir($id)
    {
        $modelo = new Produto();
        $modelo->delete($id);

        $this->redirect('produto/listar');
    }
}
?>
