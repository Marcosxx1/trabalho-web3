<?php
$soma = 0;

foreach ($reviews as $review) {
    if ($review['produto_id'] == $produto["id"]) {
        $soma = 0;
        for ($i = 0; $i < count($reviews); $i++) {
            $soma += $reviews[$i]['avaliacao'];
        }

    }
}

$media = intval($soma / count($reviews));

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
    //dd($reviews);
    
    foreach ($reviews as $review) {
        $data = date("d/m/Y", strtotime($review['data']));
        if ($produto['id'] == $review["produto_id"]) {
            echo '
            <div class="m-5 p-3 border border-secondary-subtle">
                <div class="d-flex ms-3">
                <i class="fa-solid fa-circle-user fs-1 mt-1 me-3 mb-3"></i>
                <h6 class="me-1 mt-3">Nome Usuário - </h6>';
            for ($i = 0; $i < 5; $i++) {
                if ($i >= $review['avaliacao']) {
                    echo "<i class='fa-regular fa-star fs-6 star' style='margin-top: 2.2%'></i>";
                } else {
                    echo "<i class='fa-solid fa-star' style='color: #ecdb18; margin-top: 2.2%'></i>";
                }
            }
            echo '<h6 class="ms-2" style="font-size: 10px; margin-top: 2.5%">' . $data . '</h6>
            </div>
            <h5 class="ms-5"> "' . $review['descricao'] . '"</h5>
            </div>
            ';
        }
    }
    ?>

    <form action="<?php echo APP; ?>review/salvar" method="post">

        <input type="hidden" class="form-control" id="id" name="id" value='<?php echo count($reviews) + 1; ?>'>

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
        <input type="hidden" id="usuario_id" name="usuario_id" value='<?php echo $usuarios[0]['id']; ?>'>

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
            imagem: "<?php echo $produto['img'] ?>",
            nome: "<?php echo $produto['nome'] ?>",
            preco: "<?php echo $produto['preco'] ?>"
        };

        addProduto(produto);

        window.location.href = "<?php echo APP; ?>indexPedido/listar"
    });


    function addProduto(produto) {
        arrProduto.push({
            quantidade: 1,
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