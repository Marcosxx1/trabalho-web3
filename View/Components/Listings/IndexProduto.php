<?php
$i = 0;

$soma = 0;
$media = 0;

if (count($reviews) > 0) {
    for ($f = 0; $f < count($reviews); $f++) {
        $soma += $reviews[$f]['avaliacao'];
    }
    $media = intval($soma / count($reviews));
}

?>

<div class="card mb-3" style="width: 100%;">
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
                        echo "<i class='fa-solid fa-star' style='color: #ecdb18;'></i>";
                    }
                }
                ?>

                <h5 class="card-title mt-3">
                    R$
                    <?php echo $produto['preco'] ?>
                </h5>

                <?php
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

                <a href='http://localhost/trabalho-web3/pedido/carrinho/<?php echo $produto['id'] ?>' type="button" class="btn btn-dark" style="margin: 20% 0 0 35%">Comprar</a>
            </div>
        </div>

        <div class="ms-5" style="width: 90%">
            <hr>
        </div>
    </div>

    <h3 class='ms-4 mt-2 mb-2'>Comentarios: </h3>
    <?php
    foreach ($reviews as $review) {
        if ($produto['id'] == $review["produto_id"]) {
            echo '
            <div class="m-5 p-3 border border-secondary-subtle">
                <div class="d-flex ms-3">
                <h6 class="me-3">Nome Usuário</h6>';
            for ($i = 0; $i < 5; $i++) {
                if ($i >= $review['avaliacao']) {
                    echo "<i class='fa-regular fa-star fs-6 star style='color: #d7bd14;'></i>";
                } else {
                    echo "<i class='fa-solid fa-star' style='color: #ecdb18;'></i>";
                }
            }

            echo '</div>
            <h5 class="ms-3">' . $review['descricao'] . '</h5>
            </div>
            ';
        }
    }
    ?>




    <form action="<?php echo APP; ?>review/salvar" method="post">
        <h5 class='ms-4'>
            Avaliação:
            <?php
            for ($i = 0; $i <= 4; $i++) {
                echo "<i class='fa-regular fa-star' value='{$i}'></i>";
            }
            ?>
        </h5>

        <input type="hidden" id="avaliacao" name="avaliacao">

        <div class="m-4">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao">
        </div>

        <input type="hidden" id="produto_id" name="produto_id" value='<?php echo $produto['id']; ?>'>
        <!-- <input type="hidden" id="usuario_id" name="usuario_id" value=''> -->

        <button class="btn btn-dark ms-3 mb-3" type="submit" name="button">Salvar</button>
    </form>
</div>

<script>
    let regularStar = document.querySelectorAll('i[value]');
    let inputAvalicao = document.querySelector('#avaliacao');

    let state = 0;
    regularStar.forEach((star) => {
        star.addEventListener('click', function() {
            if (star.getAttribute('value') < parseInt(state)) {
                for (let i = 0; i < regularStar.length; i++) {
                    regularStar[i].classList.remove('fa-solid');
                    regularStar[i].removeAttribute('style');
                }
            }

            for (let i = 0; i <= star.getAttribute('value'); i++) {
                regularStar[i].classList.add('fa-solid');
                regularStar[i].style.color = "#ecdb18";
            }

            state = star.getAttribute('value');
            inputAvalicao.value = parseInt(state) + 1;
        });
    });
</script>