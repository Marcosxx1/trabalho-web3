<?php
class produto extends Model
{
    protected $tabela = "produto";
    protected $query = "SELECT produto.*, fornecedor.nome, categoria.nome 
                            FROM produto join fornecedor on produto.fornecedor_id = fornecedor.id
                            JOIN categoria ON categoria.id = produto.categoria_id";
}
?>