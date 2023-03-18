<?php
class pedido extends Model
{
    protected $tabela = "pedido";
    protected $query = "SELECT pedido.*, usuario.nome, produto.nome
                            FROM pedido join usuario on pedido.usuario_id = usuario.id
                            JOIN produto ON pedido.produto_id = produto.id";
}
?>