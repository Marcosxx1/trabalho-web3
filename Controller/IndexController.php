<?php
class IndexController extends Controller
{
    function index()
    {
        $modelo = new Produto();
        $produtos = $modelo->read();

        $review = new Review();
        $reviews = $review->read();

        $this->view('indexHome', compact('produtos', 'reviews'));
    }
}
?>