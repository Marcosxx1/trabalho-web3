<?php
class IndexProdutoController extends Controller
{
    function infos($id)
    {
        $modelo = new Produto();
        $produto = $modelo->getById($id);

        $reviewsClass = new Review();
        $reviews = $reviewsClass->read();

        $fornecedorClass = new Fornecedor();
        $fornecedores = $fornecedorClass->read();

        $categoriaClass = new Categoria();
        $categorias = $categoriaClass->read();

        $modelo = new Usuario();
        $usuarios = $modelo->read();

        $this->view("indexProduto", compact('produto', 'reviews', 'fornecedores', 'categorias', 'usuarios'));
    }

    function search()
    {
        $nome = $_POST['search'];

        $modelo = new Produto();
        $produto = $modelo->search($nome);

        $reviewsClass = new Review();
        $reviews = $reviewsClass->read();

        $fornecedorClass = new Fornecedor();
        $fornecedores = $fornecedorClass->read();

        $categoriaClass = new Categoria();
        $categorias = $categoriaClass->read();

        $this->view("indexProduto", compact('produto', 'reviews', 'fornecedores', 'categorias'));
    }
}
?>