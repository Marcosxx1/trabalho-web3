<?php
class Review extends Model
{
    protected $tabela = "review";
    protected $query = "SELECT review.*, usuario.nome, produto.nome
                            FROM review join usuario on review.usuario_id = usuario.id
                            JOIN produto ON review.produto_id = produto.id";
}
?>