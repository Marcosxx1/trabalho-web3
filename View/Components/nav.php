<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fs-2 text-white" href="<?php echo APP; ?>"><i class="fa-brands fa-think-peaks"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="nav nav-tabs me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo APP; ?>">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Administrador
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo APP . 'usuario/listar'; ?>">Usuários</a></li>
            <li><a class="dropdown-item" href="<?php echo APP . 'produto/listar' ?>">Produtos</a></li>
            <li><a class="dropdown-item" href="<?php echo APP . 'pedido/listar' ?>">Pedidos</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>

      <form class="d-flex" role="search" action="<?php echo APP; ?>indexProduto/search" method="post">
        <input class="form-control me-2 border border-0" name="search" type="search" placeholder="Search"
          aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>

      <button class="bg-transparent border border-0 ms-3 btcarrinho">
        <span class="bg-white rounded-circle position-absolute"
          style='width: 2%; top: 10%; right: 7%; border: 2px black solid'>0</span>
        <i class="fa-solid fa-cart-shopping fs-4" style="color: #ffffff;"></i>
      </button>

      <button class="bg-transparent border border-0 text-white ms-3 me-3" data-bs-target="#exampleModalToggle"
        data-bs-toggle="modal">
        <i class='fa-solid fa-circle-user fs-2'></i>
      </button>

    </div>
  </div>
</nav>

<div class="modal fade position-absolute" style=" top: 5%; left: 25%;" id="exampleModalToggle" aria-hidden="true"
  aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Criar conta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary mb-2" href="<?php echo APP; ?>usuario/novo">Criar Conta</a>
      </div>
    </div>
  </div>
</div>

<script>

  const buttonCarrinho = document.querySelector('.btcarrinho');

  const span = buttonCarrinho.querySelector('span');

  buttonCarrinho.addEventListener('click', function () {
    window.location.href = "<?php echo APP; ?>indexPedido/listar"
  })

  let produtoCont = localStorage.getItem("Carrinho");
  produtoCont = JSON.parse(produtoCont);

  let contador = produtoCont === null ? 0 : produtoCont.length;

  span.innerHTML = contador;
</script>