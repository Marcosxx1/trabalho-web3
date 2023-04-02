<?php
class CategoriaController extends Controller
{
    public function listar()
    {
        $modelo = new Categoria();
        $categorias = $modelo->read();

        $this->view('ListagemCategorias', compact('categorias'));
    }

    public function idAtual()
    {
        $categoria = new Categoria();
        $dado = $categoria->read();

        return count($dado) + 1;
    }

    public function novo()
    {
        $categoria = array();
        $categoria['id'] = $this->idAtual();
        $categoria['nomeCategoria'] = "";
        $categoria['descricao'] = "";

        $this->view("formCategoria", compact('categoria'));
    }

    public function salvar()
    {
        $categoria = array();
        $categoria['id'] = $_POST['id'];
        $categoria['nomeCategoria'] = $_POST['nomeCategoria'];
        $categoria['descricao'] = $_POST['descricao'];
        
        $modelo = new Categoria();
        if ($categoria['id'] == $this->idAtual()) {
            $modelo->create($categoria);
        } else {
            $modelo->update($categoria);
        }
        
        $this->redirect('produto/listar');
    }

    public function editar($id)
    {
        $modelo = new Categoria();
        $categoria = $modelo->getById($id);
        $this->view("formCategoria", compact('categoria'));
    }

    public function excluir($id)
    {
        $modelo = new Categoria();
        $modelo->delete($id);
        $this->redirect('categoria/listar');
    }
}
?>