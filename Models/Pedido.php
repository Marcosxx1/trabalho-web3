<?php
class pedido extends Model
{
    protected $tabela = "pedido";
    protected $query = "SELECT pedido.*, usuario.nome
                            FROM pedido join usuario on pedido.usuario_id = usuario.id";
}
?>