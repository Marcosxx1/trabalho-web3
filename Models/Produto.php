<?php
class Produto extends Model
{
    protected $tabela = "produto";
    protected $query = "SELECT produto.*, fornecedor.nomeFornecedor, categoria.nomeCategoria
                            FROM produto join fornecedor on produto.fornecedor_id = fornecedor.id
                            JOIN categoria ON categoria.id = produto.categoria_id";
}
?>