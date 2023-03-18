<?php 
    class UsuarioController extends controller{
        function listar(){
            $modelo = new modeloUsuario();
            $usuarios = $modelo->read();
        
            $this->view('ListagemUsuarios', compact('usuarios'));
        }

        function novo() {
            $usuario = array();


        }
    }
?>