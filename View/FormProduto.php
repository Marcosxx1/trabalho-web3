<h1>Cadastro de Produto</h1>
<form action="<?php echo APP; ?>produto/salvar" method="post">
    <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input readonly type="text" class="form-control" id="id" value="<?php echo $produto['id']; ?>" name="id">
    </div>
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" value="<?php echo $produto['nome']; ?>" name="nome">
    </div>

    <div class="mb-3">
        <label for="quantidade" class="form-label">Quantidade</label>
        <input type="number" class="form-control" id="quantidade" name="quantidade"
            value="<?php echo $produto['quantidade']; ?>">
    </div>

    <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input type="number" class="form-control" id="preco" value="<?php echo $produto['preco']; ?>" name="preco">
    </div>

    <div class="mb-3">
        <label for="fornecedor" class="form-label">Fornecedor</label>
        <select class="form-select" name="fornecedor_id" id="fornecedor_id">
            <?php
            foreach ($fornecedores as $fornecedor) {
                $selected =
                    $fornecedor['id'] == $produto['fornecedor_id'] ? 'selected' : '';

                echo "<option $selected value='{$fornecedor['id']}'>{$fornecedor['nomefornecedor']}</option>";
            }
            ?>
        </select>
    </div>

    <a class="btn btn-primary mb-2" href="#">Cadastrar fornecedor</a>

    <div class="mb-3">
        <label for="categoria" class="form-label">Categoria</label>
        <select class="form-select" name="categoria_id" id="categoria_id">
            <?php
            foreach ($categorias as $categoria) {
                $selected =
                    $categoria['id'] == $produto['categoria_id'] ? 'selected' : '';

                echo "<option $selected value='{$categoria['id']}'>{$categoria['descricao']}</option>";
            }
            ?>
        </select>
    </div>

    <a class="btn btn-primary mb-4" href="#">Cadastrar categoria</a>

    <br>

    <button class="btn btn-primary" type="submit" name="button">Salvar</button>
</form>