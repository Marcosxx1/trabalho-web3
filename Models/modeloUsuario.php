<?php
  class usuario extends Model {
    protected $tabela="usuario";
    protected $query = "SELECT usuario.nome, usuario.cep, usuario, usuario.id, usuario.numero, usuario.email FROM usuario";
  }
 ?>