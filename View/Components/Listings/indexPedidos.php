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

                <button type="button" class="btn btn-success" style="margin: 20% 0 0 35%">Comprar</button>
            </div>
        </div>

        <div class="ms-5" style="width: 90%">
            <hr>
        </div>
    </div>
</div>

<script>


</script>