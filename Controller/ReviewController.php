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

    function novo()
    {
        $review = array();
        $review['id'] = $this->idAtual();
        $review['avaliacao'] = "";

        $this->view("formReview", compact('review'));
    }

    function salvar()
    {
        $review = array();
        $review['id'] = $_POST['id'];
        $review['avaliacao'] = $_POST['avaliacao'];
        $review['descricao'] = $_POST['descricao'];

        $modelo = new Review();
        if ($review['id'] == $this->idAtual()) {
            $modelo->create($review);
        } else {
            $modelo->update($review);
        }

        $this->redirect('review/listar');
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

        $this->redirect('review/listar');
    }
}
?>
