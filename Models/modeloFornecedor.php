<?php
class fornecedor extends Model
{
    protected $tabela = "fornecedor";
    protected $query = "SELECT fornecedor.id, fornecedor.nome FROM fornecedor";
}
?>