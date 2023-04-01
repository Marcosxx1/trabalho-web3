<h1 class="text-center mb-5">Listagem de Produtos</h1>

<table class="table table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Quantidade</th>
      <th>Preco Unitário</th>
      <th>Fornecedor</th>
      <th>Categoria</th>
      <th>Editar</th>
      <th>Excluir</th>
    </tr>
  </thead>

  <tbody>
    <?php
      foreach ($produtos as $produto) {
          echo "
          <tr>
            <td>{$produto['id']}</td>
            <td>{$produto['nome']}</td>
            <td>{$produto['quantidade']}</td>
            <td>{$produto['preco']}</td>
            <td>{$produto['nomefornecedor']}</td>
            <td>{$produto['nomecategoria']}</td>
            <td><a class='btn btn-primary' href='".APP."produto/editar/{$produto['id']}'>+</a></td>
            <td><a class='btn btn-danger' href='".APP."produto/excluir/{$produto['id']}'>-</a></td>
          </tr>
          ";
      }
     ?>
  </tbody>
</table>

<a class="btn btn-primary mb-2" href="<?php echo APP; ?>produto/novo">Novo</a>