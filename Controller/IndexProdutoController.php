<?php

class IndexProdutoController extends Controller
{
    function infos($id)
    {
        $modelo = new Produto();
        $produto = $modelo->getById($id);

        $reviewsClass = new Review();
        $reviews = $reviewsClass->read();

        if (isset($_POST['review_id'])) {
            $idReview = $_POST['review_id'];

            $idReview = $reviewsClass->getById($idReview);
        }

        $fornecedorClass = new Fornecedor();
        $fornecedores = $fornecedorClass->read();

        $categoriaClass = new Categoria();
        $categorias = $categoriaClass->read();

        $usuarioAleatorio = new ReviewController();
        $idUsuario = $usuarioAleatorio->idUsuario();

        $modelo = new Usuario();
        $usuarios = $modelo->read();
        if (isset($_POST['review_id'])) {
            $this->view(
                "indexProduto",
                compact(
                    'produto',
                    'reviews',
                    'idUsuario',
                    'fornecedores',
                    'categorias',
                    'usuarios',
                    'idReview'
                )
            );
        } else {
            $this->view(
                "indexProduto",
                compact(
                    'produto',
                    'reviews',
                    'idUsuario',
                    'fornecedores',
                    'categorias',
                    'usuarios'
                )
            );
        }
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