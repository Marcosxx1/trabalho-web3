<?php
$soma = 0;
for ($i = 0; $i < count($reviews); $i++) {
    $soma += $reviews[$i]['avaliacao'];
}

$media = intval($soma / count($reviews));
?>

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

                for ($i = 0; $i < 5; $i++) {
                    if ($i >= $media) {
                        echo "<i class='fa-regular fa-star fs-6 star'></i>";
                    } else {
                        echo "<i class='fa-solid fa-star fs-6 star'></i>";
                    }
                }

                foreach ($fornecedores as $fornecedor) {
                    if ($fornecedor['id'] == $produto["fornecedor_id"]) {
                        echo '<h5 class="mt-3 mb-3"> Marca: ' . $fornecedor['nomefornecedor'] . '</h5>';
                    }
                }

                foreach ($categorias as $categoria) {
                    if ($categoria['id'] == $produto["categoria_id"]) {
                        echo '<h5> Categoria: ' . $categoria['nomecategoria'] . '</h5>';
                    }
                }
                ?>

                <a href='http://localhost/trabalho-web3/pedido/carrinho/<?php echo $produto['id'] ?>' type="button"
                    class="btn btn-dark" style="margin: 20% 0 0 35%">Comprar</a>
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
        for ($i = 0; $i <= 4; $i++) {
            echo "<i class='fa-regular fa-star fs-4 star ms-2' value='{$i}'></i>";
        }
        ?>

        <input type="hidden" id="avaliacao" name="avaliacao">

        <div class="m-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao">
        </div>

        <input type="hidden" id="produto_id" name="produto_id" value='<?php echo $produto['id']; ?>'>
        <!-- <input type="hidden" id="usuario_id" name="usuario_id" value=''> -->

        <button class="btn btn-dark ms-3" type="submit" name="button">Salvar</button>
    </form>
</div>

<script>
    let regularStar = document.querySelectorAll('i[value]');
    let inputAvalicao = document.querySelector('#avaliacao');

    let state = 0;
    regularStar.forEach((star) => {
        star.addEventListener('click', function () {
            if (star.getAttribute('value') < parseInt(state)) {
                for (let i = 0; i < regularStar.length; i++) {
                    regularStar[i].classList.remove('fa-solid');
                }
            }

            for (let i = 0; i <= star.getAttribute('value'); i++) {
                regularStar[i].classList.add('fa-solid');
            }

            state = star.getAttribute('value');
            inputAvalicao.value = parseInt(state) + 1;
        });
    });
</script>