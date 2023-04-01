<h1 class="text-center mb-5">Listagem de Usuários</h1>
<table class="table table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>CEP</th>
      <th>Número da Casa</th>
      <th>Email</th>
      <th>Editar</th>
      <th>Excluir</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($usuarios as $usuario) {
          echo "
          <tr>
            <td>{$usuario['id']}</td>
            <td>{$usuario['nome']}</td>
            <td>{$usuario['cep']}</td>
            <td>{$usuario['numero_casa']}</td>
            <td>{$usuario['email']}</td>
            <td><a class='btn btn-primary' href='".APP."usuario/editar/{$usuario['id']}'>+</a></td>
            <td><a class='btn btn-danger' href='".APP."usuario/excluir/{$usuario['id']}'>-</a></td>
          </tr>
          ";
      }
     ?>
  </tbody>
</table>

<a class="btn btn-primary mb-2" href="<?php echo APP; ?>usuario/novo">Novo</a>
