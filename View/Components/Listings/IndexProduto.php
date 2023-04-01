<div class="card mb-3" style="width: 100%; height: 700px">
    <div class="row g-0">
        <div class="col-md-4">
            <img src='<?php echo $produto['img'] ?>' class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h2 class="card-title">
                    <?php echo $produto['nome'] ?>
                </h2>

                <?php
                foreach ($fornecedores as $fornecedor) {
                    if ($fornecedor['id'] == $produto["fornecedor_id"]) {
                        echo '<h5>' . $fornecedor['nomefornecedor'] . '</h5>';
                    }
                }
                ?>

                <?php
                foreach ($categorias as $categoria) {
                    if ($categoria['id'] == $produto["categoria_id"]) {
                        echo '<h5>' . $categoria['nomecategoria'] . '</h5>';
                    }
                }
                ?>

                <a  href='http://localhost/trabalho-web3/pedido/carrinho/<?php echo $produto['id'] ?>'  type="button" class="btn btn-success" style="margin: 20% 0 0 35%">Comprar</a>
            </div>
        </div>

        <div class="ms-5" style="width: 90%">
            <hr>
        </div>
    </div>

    <?php
    foreach ($reviews as $review) {
        if ($produto['id'] == $review["produto_id"]) {
            echo '<h5>' . $review['descricao'] . '</h5>';
        }
    }
    ?>

    <form action="<?php echo APP; ?>review/salvar" method="post">
        <?php
        for ($i = 1; $i <= 5; $i++) {
            echo "<i class='fa-regular fa-star fs-4 star ms-2'></i>";
        }
        ?>

        <div class="m-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="">
        </div>

        <button class="btn btn-primary ms-3" type="submit" name="button">Salvar</button>
    </form>
</div>


<script>


</script>