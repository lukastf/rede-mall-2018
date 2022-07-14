<?php session_start();?>
<nav class="navbar px-5 py-3 fixed-top">
  <a class="navbar-brand" href="/index.php">
    <img class="img-fluid" src="/img/rede_mall_original.svg" alt="logo">
  </a>
  <div id="Sidenav" class="sidenav navbar-toggler">
    <a href="javascript:void(0)" class="closebtn fechar-menu">&times;</a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="/index.php">Home</a>
      </li>
      <?php if (isset($_SESSION["login"])) { ?>
      <li class="nav-item">
        <a href="/views/administrador.php">Painel do Administrador</a>
      </li>
      <li class="nav-item">
        <a href="#" class="logout">Sair</a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a href="/views/institucional.php">O Mall</a>
      </li>
      <li class="nav-item">
        <a href="/views/pesquisar-loja.php">Lojas e Alimentação</a>
      </li>
      <li class="nav-item">
        <a href="/views/novidades.php">Novidades</a>
      </li>
      <li class="nav-item">
        <a href="/views/contato.php">Contato</a>
      </li>
    </ul>
  </div>

  <!--<span class="abrir-menu">&#9776;</span>-->
  <span class="abrir-menu">
  <label class="hamburger-icon">
    <span></span>
    <span></span>
    <span></span>
  </label>
  </span>

  <script src="/js/abrir-fechar-menu.js"></script>
</nav>