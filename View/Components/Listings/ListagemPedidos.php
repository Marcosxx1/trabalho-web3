<h1 class="text-center mb-5">Listagem de Pedidos</h1>
<table class="table table-hover w-100">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome do usuário</th>
      <th>Status</th>
      <th>data</th>
      <th>Editar</th>
      <th>Excluir</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($pedidos as $pedido) {
      $data = date("d/m/Y", strtotime($pedido['data']));
      echo "
          <tr>
              <td>{$pedido['id']}</td>";
      foreach ($usuarios as $usuario) {
        if ($usuario['id'] == $pedido["usuario_id"]) {
          echo '<td>' . $usuario['nome'] . '</td>';
        }
      }
      echo "
              <td>{$pedido['status']}</td>
              <td>{$data}</td>
              <td><a class='btn btn-primary' href='" . APP . "pedido/editar/{$pedido['id']}'>+</a></td>
              <td><a class='btn btn-danger' href='" . APP . "pedido/excluir/{$pedido['id']}'>-</a></td>
          </tr>
      ";
    }

    ?>
  </tbody>
</table>