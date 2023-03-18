<?php
class UsuarioController extends Controller
{
    function listar()
    {
        $modelo = new Usuario();
        $usuarios = $modelo->read();

        $this->view('ListagemUsuarios', compact('usuarios'));
    }

    function idAtual()
    {
        $usuario = new Usuario();
        $dado = $usuario->read();

        return count($dado) + 1;
    }

    function novo()
    {
        $usuario = array();
        $usuario['id'] = $this->idAtual();
        $usuario['nome'] = "";
        $usuario['cep'] = "";
        $usuario['numero_casa'] = "";
        $usuario['email'] = "";
        $usuario['senha'] = "";

        $this->view("FormUsuario", compact('usuario'));
    }

    function salvar()
    {
        $usuario = array();
        $usuario['id'] = $_POST['id'];
        $usuario['nome'] = $_POST['nome'];
        $usuario['cep'] = $_POST['cep'];
        $usuario['numero_casa'] = $_POST['numero_casa'];
        $usuario['email'] = $_POST['email'];
        $usuario['senha'] = $_POST['senha'];

        $model = new Usuario();
        if ($usuario['id'] == $this->idAtual()) {
            $model->create($usuario);
        } else {
            $model->update($usuario);
        }
        $this->redirect('usuario/listar');
    }

    function editar($id)
    {
        $modelo = new Usuario();
        $usuario = $modelo->getById($id);

        $this->view("FormUsuario", compact('usuario'));
    }

    function excluir($id)
    {
        $modelo = new Usuario();
        $modelo->delete($id);

        $this->redirect('usuario/listar');
    }
}
?>