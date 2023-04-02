<?php
  class Usuario extends Model {
    protected $tabela="usuario";
    protected $query = "SELECT usuario.nome, usuario.cep, usuario.id, usuario.numero_casa, usuario.email FROM usuario";


  public function registrar()
  {
    //Checa se tem algo no POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    } else {

      $data = [
        'nome' => '',
        'cep' => '',
        'numero_casa' => '',
        'email' => '',
        'senha' => ''
      ];

      $this->view('users/register');
    }
  }
  }
 
 ?>