<h1>Cadastro de Notícia</h1>
<form action="<?php echo APP; ?>usuario/salvar" method="post">
  <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input readonly type="text" class="form-control" id="id" value="<?php echo $usuario['id']; ?>" name="id">
  </div>
  <div class="mb-3">
      <label for="nome" class="form-label">Nome</label>
      <input type="text" class="form-control" id="nome" value="<?php echo $usuario['nome']; ?>" name="nome">
  </div>

  <div class="mb-3">
      <label for="cep" class="form-label">Cep</label>
      <input type="text" class="form-control" id="cep" name="cep"  value="<?php echo $usuario['cep']; ?>">
  </div>

  <div class="mb-3">
      <label for="numero_casa" class="form-label">Numero da Casa</label>
      <input type="number" class="form-control" id="numero_casa" value="<?php echo $usuario['numero_casa']; ?>" name="numero_casa">
  </div>

  <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" value="<?php echo $usuario['email']; ?>" name="email">
  </div>

  <div class="mb-3">
      <label for="senha" class="form-label">Senha</label>
      <input type="password" class="form-control" id="senha" value="<?php echo $usuario['senha']; ?>" name="senha">
  </div>

  <button class="btn btn-primary" type="submit" name="button">Salvar</button>
</form>