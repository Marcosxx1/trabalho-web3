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
        $usuario[0]['id'] = $this->idAtual();
        $usuario[0]['nome'] = "";
        $usuario[0]['cep'] = "";
        $usuario[0]['numero_casa'] = "";
        $usuario[0]['email'] = "";
        $usuario[0]['senha'] = "";

        $this->view("formUsuario", compact('usuario'));
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
        $this->redirect('');
    }

    function editar($id)
    {
        $modelo = new Usuario();
        $usuario = $modelo->getById($id);

        $this->view("formUsuario", compact('usuario'));
    }

    function excluir($id)
    {
        $modelo = new Usuario();
        $modelo->delete($id);

        $this->redirect('usuario/listar');
    }
}
?>