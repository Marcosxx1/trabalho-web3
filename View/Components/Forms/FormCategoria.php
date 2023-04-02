<h1>Cadastro de Fornecedor</h1>
<form action="<?php echo APP; ?>categoria/salvar" method="post">
  <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input readonly type="text" class="form-control" id="id" value="<?php echo $categoria['id']; ?>" name="id">
  </div>
  <div class="mb-3">
      <label for="nomeCategoria" class="form-label">Nome da Categoria</label>
      <input type="text" class="form-control" id="nomeCategoria" value="<?php echo $categoria['nomeCategoria']; ?>" name="nomeCategoria">
  </div>

  <div class="mb-3">
      <label for="descricao" class="form-label">Descrição</label>
      <input type="text" class="form-control" id="descricao" name="descricao"  value="<?php echo $categoria['descricao']; ?>">
  </div>

  <button class="btn btn-primary" type="submit" name="button">Salvar</button>
</form>