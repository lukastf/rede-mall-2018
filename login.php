<?php require 'header.php';?>

<title>Login</title>

<?php require 'menu.php';?>

<?php if (!isset($_SESSION["login"])) { 
    $_SESSION["tentativas"] = 0;
    $_SESSION["naonao"] = 0;?>

<section class="container-fluid espaco-topo">
    <form class="validar-login col-12 col-md-4 mx-auto py-5">
        <div class="form-group">
            <label for="usr">Nome:</label>
            <input type="text" class="form-control" name="nome" id="usr">
        </div>
        <div class="form-group">
            <label for="pwd">Senha:</label>
            <input type="password" class="form-control" name="senha" id="pwd">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <span class="falhou" style="display:none;"><p class="pt-3"></p></span>
    </form>
</section>

<?php } else { ?>

<section class="logado col-12 col-md-4 mx-auto py-5 espaco-topo">
    <p class="">Você já está logado, agora pode editar no <a href="/views/administrador.php" class="btn btn-success">Painel</button></a>
    <button class="btn btn-danger logout mt-2">Sair</button>
</section>

<?php }; ?>

<?php require 'footer.php';?>

<script src="js/login-ajax.js"></script>