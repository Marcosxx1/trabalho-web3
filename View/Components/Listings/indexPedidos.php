<div class="card mb-3">
    <div class="row g-0 produtosDiv">
    </div>
    <div class="d-flex justify-content-center mb-3">
        <button type="button" class="btn btn-success">Comprar</button>
        <button type="button" class="btn btn-success ms-2">Cancelar</button>
    </div>
</div>

<script>
    const produtosDiv = document.querySelector(".produtosDiv");

    let produtoData = localStorage.getItem("Carrinho");
    produtoData = JSON.parse(produtoData);

    let produtosUnicos = {};

    for (let i = 0; i < produtoData.length; i++) {
        let produtoAtual = produtoData[i];
        let precoAtual = parseInt(produtoAtual.preco);
        if (produtosUnicos.hasOwnProperty(produtoAtual.nome)) {
            produtosUnicos[produtoAtual.nome].quantidade += produtoAtual.quantidade;
            produtosUnicos[produtoAtual.nome].preco += precoAtual * produtoAtual.quantidade;
        } else {
            produtosUnicos[produtoAtual.nome] = {
                quantidade: produtoAtual.quantidade,
                preco: precoAtual * produtoAtual.quantidade,
                imagem: produtoAtual.imagem
            };
        }
    }
    for (let nomeProduto in produtosUnicos) {
        let produtoUnico = produtosUnicos[nomeProduto];
        produtosDiv.innerHTML += `
    <div class='col-md-1'>
      <img src='${produtoUnico.imagem}' style='height: 98px' class='img-fluid rounded-start ms-3 imgProduto' alt='...'>
    </div>
    <div class='col-md-8 ms-4'>
      <div class='card-body d-flex'>
        <h5 class='card-title mt-3'>${nomeProduto}</h5>
        <h6 class='ms-2' style='margin-top: 3.1%;'>-</h6>
        <h6 class='ms-2' style='margin-top: 3.1%;'> R$ ${produtoUnico.preco}</h6>
      </div>
      <h6 class="ms-3">quantidade: ${produtoUnico.quantidade}</h6>
    </div>
    <div>
      <hr>
    </div>
  `;
    }

</script>