<?php
class Fornecedor extends Model
{
    protected $tabela = "fornecedor";
    protected $query = "SELECT fornecedor.id, fornecedor.nomeFornecedor, fornecedor.cnpj FROM fornecedor";
}
?>