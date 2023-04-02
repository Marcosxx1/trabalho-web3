<?php
class Categoria extends Model {
  protected $tabela = "categoria";
  protected $query = "SELECT categoria.id, categoria.nomeCategoria, categoria.descricao FROM categoria";
}
?>