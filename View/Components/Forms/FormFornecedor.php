<h1>Cadastro de Fornecedor</h1>
<form action="<?php echo APP; ?>fornecedor/salvar" method="post">
  <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input readonly type="text" class="form-control" id="id" value="<?php echo $fornecedor['id']; ?>" name="id">
  </div>
  <div class="mb-3">
      <label for="nomeFornecedor" class="form-label">Nome do fornecedor</label>
      <input type="text" class="form-control" id="nomeFornecedor" value="<?php echo $fornecedor['nomeFornecedor']; ?>" name="nomeFornecedor">
  </div>

  <div class="mb-3">
      <label for="cnpj" class="form-label">Cnpj</label>
      <input type="text" class="form-control" id="cnpj" name="cnpj"  value="<?php echo $fornecedor['cnpj']; ?>">
  </div>

  <button class="btn btn-primary" type="submit" name="button">Salvar</button>
</form>