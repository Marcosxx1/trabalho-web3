<?php dd($reviwes) ?>

<h1 class="text-center"><i class="fa-solid fa-paw"></i> Produtos para o seu pet <i class="fa-solid fa-paw"></i></h1>

<div id="carouselExampleAutoplaying" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./images/a.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="./images/b.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="flex-wrap">
    <?php
    $i = 0;
    foreach ($produtos as $produto) {
        if ($i % 4 == 0) {
            echo '<div class="row">';
        }
        echo "
            <div class='col-sm-6 col-md-3 mb-3 text-center'>
                <div class='card'>
                    <img src='" . $produto['img'] . "' class='card-img-top' alt='Imagem do produto'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $produto['nome'] . "</h5>
                        <p class='card-text'>Preço: R$" . $produto['preco'] . "</p>
                        <a href='#' class='btn btn-primary'>Ver produto</a>
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