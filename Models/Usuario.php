<?php
  class Usuario extends Model {
    protected $tabela="usuario";
    protected $query = "SELECT usuario.nome, usuario.cep, usuario.id, usuario.numero_casa, usuario.email FROM usuario";
  }
 ?>