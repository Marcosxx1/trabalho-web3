<?php
$soma = 0;

foreach ($reviews as $review) {
    if ($review['produto_id'] == $produto[0]["id"]) {
        $soma = 0;
        for ($i = 0; $i < count($reviews); $i++) {
            $soma += $reviews[$i]['avaliacao'];
        }

    }
}

if (count($reviews) > 0) {
    $media = intval($soma / count($reviews));
}

?>

<div class="card mb-3" style="width: 100%;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src='<?php echo $produto[0]['img'] ?>' class="img-fluid rounded-start" alt="...">
        </div>

        <div class="col-md-8">
            <div class="card-body">
                <h2 class="card-title">
                    <?php echo $produto[0]['nome'] ?>
                </h2>


                <?php
                if (isset($media)) {
                    for ($i = 0; $i < 5; $i++) {
                        if ($i >= $media) {
                            echo "<i class='fa-regular fa-star fs-6 star'></i>";
                        } else {
                            echo "<i class='fa-solid fa-star' style='color: #ecdb18;'></i>";
                        }
                    }
                } else {
                    for ($i = 0; $i < 5; $i++) {
                        echo "<i class='fa-regular fa-star fs-6 star'></i>";
                    }
                }
                ?>

                <h5 class="card-title mt-3">
                    R$
                    <?php echo $produto[0]['preco'] ?>
                </h5>

                <?php
                foreach ($fornecedores as $fornecedor) {
                    if ($fornecedor['id'] == $produto[0]["fornecedor_id"]) {
                        echo '<h5 class="mt-3 mb-3"> Marca: ' . $fornecedor['nomefornecedor'] . '</h5>';
                    }
                }

                foreach ($categorias as $categoria) {
                    if ($categoria['id'] == $produto[0]["categoria_id"]) {
                        echo '<h5> Categoria: ' . $categoria['nomecategoria'] . '</h5>';
                    }
                }
                ?>

                <button type="button" class="btn btn-dark" id="carrinho" style="margin: 20% 0 0 25%">Adicionar no
                    Carrinho</button>

                <a href='<?php echo APP ?>' class='btn btn-dark' style="margin: 20% 0 0 0">voltar</a>
            </div>
        </div>

        <div class="ms-5" style="width: 90%">
            <hr>
        </div>
    </div>

    <h3 class='ms-4 mt-2 mb-2'>Comentarios: </h3>
    <?php

    foreach ($reviews as $review) {
        $data = date("d/m/Y", strtotime($review['data']));
        if ($produto[0]['id'] == $review["produto_id"]) {
            echo '
            <div class="m-5 p-3 border border-secondary-subtle">
                <div class="d-flex ms-3">
                    <i class="fa-solid fa-circle-user fs-1 mt-1 me-3 mb-3"></i>';
            for ($i = 0; $i < count($usuarios); $i++) {
                if ($usuarios[$i]['id'] == $review['usuario_id']) {
                    echo '<h6 class="me-1 mt-3">' . $usuarios[$i]['nome'] . '- </h6>';
                }
            }

            for ($i = 0; $i < 5; $i++) {
                if ($i >= $review['avaliacao']) {
                    echo "<i class='fa-regular fa-star fs-6 star' style='margin-top: 2.2%'></i>";
                } else {
                    echo "<i class='fa-solid fa-star' style='color: #ecdb18; margin-top: 2.2%'></i>";
                }
            }

            for ($i = 0; $i < count($usuarios); $i++) {
                if ($usuarios[$i]['id'] == $review['usuario_id']) {
                    echo '<h6 class="ms-2" style="font-size: 10px; margin-top: 2.5%">' . $data . '</h6>
              
                  <form method="post" action="' . APP . 'indexProduto/infos/' . $produto[0]['id'] . '" style="margin: -1% 0 0 60%">
                    <input type="hidden" id="review_id" name="review_id" value="' . $review['id'] . '">
                    <button class="bg-transparent border border-0" style="margin: -1% 0 0 60%">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                  </form>
                  
                  <a href="' . APP . 'review/excluir/' . $review['id'] . '" class="bg-transparent border border-0 text-dark" style="margin: -1% 0 0 2%">
                    <i class="fa-solid fa-trash"></i>
                  </a>';
                }
            }

            echo '</div>
                <h5 class="ms-5">"' . $review['descricao'] . '"</h5>
              </div>';
        }
    }
    ?>

    <form action="<?php echo APP; ?>review/salvar/<?php echo $produto[0]['id']; ?>" method="post">

        <input type="hidden" class="form-control" id="id" name="id"
            value='<?php echo isset($idReview) ? $idReview[0]['id'] : count($reviews) + 1; ?>'>

        <h5 class='ms-4'>
            Avaliação:
            <?php
            if (isset($idReview)) {
                for ($i = 0; $i <= 4; $i++) {
                    if ($i >= $idReview[0]['avaliacao']) {
                        echo "<i class='fa-regular fa-star' value='{$i}'></i>";
                    } else {
                        echo "<i class='fa-solid fa-star' style='color: #ecdb18;' value='{$i}'></i>";
                    }                }
            } else {
                for ($i = 0; $i <= 4; $i++) {
                    echo "<i class='fa-regular fa-star' value='{$i}'></i>";
                }
            } 
            ?>
        </h5>

        <input type="hidden" id="avaliacao" name="avaliacao" value="<?php echo isset($idReview) ? $idReview[0]['avaliacao'] : "0" ?>">

        <div class="m-4">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo isset($idReview) ? $idReview[0]['descricao'] : " " ?>">
        </div>

        <input type="hidden" id="produto_id" name="produto_id"
            value='<?php echo isset($idReview) ? $idReview[0]['produto_id'] : $produto[0]['id']; ?>'>
        <input type="hidden" id="usuario_id" name="usuario_id"
            value='<?php echo isset($idReview) ? $idReview[0]['usuario_id'] : $idUsuario; ?>'>

        <button class="btn btn-dark ms-3 mb-3" type="submit" name="button">Salvar</button>
    </form>
</div>


<script>
    let regularStar = document.querySelectorAll('i[value]');
    let inputAvalicao = document.querySelector('#avaliacao');
    let addCarrinho = document.querySelector('#carrinho');

    let state = 0;
    regularStar.forEach((star) => {
        star.addEventListener('click', function () {
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


    let arrProduto = getProdutos();

    function getProdutos() {
        let produtoData = localStorage.getItem("Carrinho");
        produtoData = JSON.parse(produtoData);

        return produtoData && produtoData.length ? produtoData : [];
    }

    addCarrinho.addEventListener('click', function () {
        let produto = {
            id: "<?php echo $produto[0]['id'] ?>",
            imagem: "<?php echo $produto[0]['img'] ?>",
            nome: "<?php echo $produto[0]['nome'] ?>",
            preco: "<?php echo $produto[0]['preco'] ?>"
        };

        addProduto(produto);

        window.location.href = "<?php echo APP; ?>indexPedido/listar"
    });


    function addProduto(produto) {
        arrProduto.push({
            quantidade: 1,
            id: produto.id,
            imagem: produto.imagem,
            nome: produto.nome,
            preco: produto.preco
        });

        setProdutos();
    }

    function setProdutos() {
        localStorage.setItem("Carrinho", JSON.stringify(arrProduto));
    }
</script>