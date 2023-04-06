<?php require './View/Components/carousel.php' ?>


<div class="d-flex flex-wrap">
    <?php
    $i = 0;
    
    foreach ($produtos as $produto) {
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

        if ($i % 4 == 0) {
            echo '<div class="row">';
        }
        echo "
    <div class='col-sm-6 col-md-3 mb-3 text-center'>
        <div class='card'>
            <img src='" . $produto['img'] . "' class='card-img-top' alt='Imagem do produto'>
        <div class='d-flex mt-2' style='margin: 0 0 0 30%'>
            ";

        for ($i = 0; $i < 5; $i++) {
            if ($i >= $media) {
                echo "<i class='fa-regular fa-star fs-6 star'></i>";
            } else {
                echo "<i class='fa-solid fa-star' style='color: #ecdb18;'></i>";
            }
        }

        echo "
        </div>
            <div class='card-body'>
                <h5 class='card-title'>" . $produto['nome'] . "</h5>
                <p class='card-text'>Preço: R$" . $produto['preco'] . "</p>
                <a href=indexProduto/infos/" . $produto['id'] . " class='btn btn-dark'>Ver produto</a>
            </div>
        </div>
    </div>
";
        if ($i % 4 == 3) {
            echo '</div>';
        }
        $i++;
    }
    if ($i % 4 != 0) {
        echo '</div>';
    }
    ?>
</div>