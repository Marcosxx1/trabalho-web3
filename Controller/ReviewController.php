<?php
class ReviewController extends Controller
{
    function listar()
    {
        $modelo = new Review();
        $reviews = $modelo->read();

        $this->view('ListagemReviews', compact('reviews'));
    }

    function idAtual()
    {
        $review = new Review();
        $dado = $review->read();

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
        $review = array();
        $review['id'] = $this->idAtual();
        $review['avaliacao'] = "";
        $review['descricao'] = "";
        $review['usuario_id'] = $this->idUsuario();

        $this->view("formReview", compact('review'));
    }

    function salvar($id)
    {
        $review = array();
        $review['id'] = $_POST['id'];
        $review['avaliacao'] = $_POST['avaliacao'];
        $review['descricao'] = $_POST['descricao'];
        $review['produto_id'] = $_POST['produto_id'];
        $review['usuario_id'] = $_POST['usuario_id'];

        $modelo = new Review();
        if ($review['id'] == $this->idAtual()) {
            $modelo->create($review);
        } else {
            $modelo->update($review);
        }

        $this->redirect("indexProduto/infos/{$id}");
    }

    function editar($id)
    {
        $modelo = new Review();
        $review = $modelo->getById($id);

        $this->view("formReview", compact('review'));
    }

    function excluir($id)
    {
        $modelo = new Review();
        $modelo->delete($id);

        $this->redirect("");
    }
}
?>