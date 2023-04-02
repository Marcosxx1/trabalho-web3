<?php
echo "<h1>Cadastro de Avaliação</h1>";

$fields = [
  ['label' => 'ID', 'id' => 'id', 'value' => $review['id'], 'readonly' => true],
  ['label' => 'Avaliação', 'id' => 'avaliacao', 'value' => $review['avaliacao']],
  ['label' => 'Descrição', 'id' => 'descricao', 'value' => $review['descricao']],
  ['label' => 'Usuário ID', 'id' => 'usuario_id', 'value' => $review['usuario_id']],
  ['label' => 'Produto ID', 'id' => 'produto_id', 'value' => $review['produto_id']],
];

foreach ($fields as $field) {
  $label = $field['label'];
  $id = $field['id'];
  $value = $field['value'];
  $readonly = isset($field['readonly']) && $field['readonly'] ? 'readonly' : '';

  $type = gettype($value) === 'integer' ? 'number' : 'text';

  echo "
    <div class='mb-3'>
        <label for='$id' class='form-label'>$label</label>
        <input type='$type' class='form-control' id='$id' value='$value' name='$id' $readonly>
    </div>";
}

echo "
<form action='add_review.php' method='POST'>
    <div class='mb-3'>
        <label for='avaliacao' class='form-label'>Avaliação</label>
        <input type='number' class='form-control' id='avaliacao' name='avaliacao' required>
    </div>
    <div class='mb-3'>
        <label for='descricao' class='form-label'>Descrição</label>
        <textarea class='form-control' id='descricao' name='descricao' required></textarea>
    </div>
    <div class='mb-3'>
        <label for='usuario_id' class='form-label'>Usuário ID</label>
        <input type='number' class='form-control' id='usuario_id' name='usuario_id' required>
    </div>
    <div class='mb-3'>
        <label for='produto_id' class='form-label'>Produto ID</label>
        <input type='number' class='form-control' id='produto_id' name='produto_id' required>
    </div>
    <button class='btn btn-primary' type='submit' name='button'>Salvar</button>
</form>";
