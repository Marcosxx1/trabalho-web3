<h1>Cadastro de Pedidos</h1>
<form action="<?php echo APP; ?>pedido/salvar" method="post">
    <input type="hidden" class="form-control" id="id" value="<?php echo $pedido[0]['id']; ?>" name="id">
    <input type="hidden" class="form-control" id="usuario_id" value="<?php echo $pedido[0]["usuario_id"]; ?>"
        name="usuario_id">
    <input type="hidden" class="form-control" id="pedidos" value="<?php echo $pedido[0]["pedidos"]; ?>"
        name="pedidos">
    <?php
    //dd($produtos);
    
    foreach ($usuarios as $usuario) {
        if ($usuario['id'] == $pedido[0]["usuario_id"]) {
            echo '<div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input readonly type="text" class="form-control" id="nome" value="' . $usuario["nome"] . '" name="nome">
                  </div>';
        }
    }
    ?>

    <div class="mb-3">
        <label for="date" class="form-label">Data</label>
        <input readonly type="date" class="form-control" id="date" name="date"
            value="<?php echo $pedido[0]['data']; ?>">
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" name="status" id="status">
            <option <?php echo $pedido[0]['status'] === "entregue" ? "selected" : "" ?> value="entregue">entregue</option>
            <option <?php echo $pedido[0]['status'] === "em andamento" ? "selected" : "" ?> value="em andamento">em
                andamento</option>
            <option <?php echo $pedido[0]['status'] === "enviado" ? "selected" : "" ?> value="enviado">enviado</option>
            <option <?php echo $pedido[0]['status'] === "cancelado" ? "selected" : "" ?> value="cancelado">cancelado
            </option>
        </select>
    </div>

    <?php

    $vetorID = explode(',', $pedido[0]["pedidos"]);

    foreach ($vetorID as $id) {
        foreach ($produtos as $produto) {
            if (intval($id) == $produto["id"]) {
                echo "<div class='card mb-3'>
                    <div class='row g-0'>
                        <div class='col-md-1'>
                            <img src='{$produto['img']}' style='height: 98px' class='img-fluid rounded-start ms-3 imgProduto' alt='...'>
                        </div>
                        <div class='col-md-8 ms-4'>
                            <div class='card-body d-flex'>
                                <h5 class='card-title mt-3'>{$produto['nome']}</h5>
                                <h6 class='ms-2' style='margin-top: 3.1%;'>-</h6>
                                <h6 class='ms-2' style='margin-top: 3.1%;'> R$ {$produto['preco']}</h6>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        }
    }

    ?>


    <button class="btn btn-primary" type="submit" name="button">Salvar</button>
</form>