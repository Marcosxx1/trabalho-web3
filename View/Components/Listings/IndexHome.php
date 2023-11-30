<?php require './View/Components/carousel.php' ?>


<div class="d-flex flex-wrap">
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

    foreach ($produtos as $produto) {
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