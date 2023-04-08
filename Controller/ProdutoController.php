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
        $produto[0]['id'] = $this->idAtual();
        $produto[0]['img'] = "";
        $produto[0]['nome'] = "";
        $produto[0]['preco'] = "";

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
        $produto['img'] = $_POST['img'];
        $produto['nome'] = $_POST['nome'];
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
