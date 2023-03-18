<?php
class Categoria extends Model {
  protected $tabela = "categoria";
  protected $query = "SELECT categoria.id, categoria.nome, categoria.desricao FROM categoria";
  
}

?>