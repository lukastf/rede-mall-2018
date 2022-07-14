<?php  require '../header.php';?>

<title>Administrar</title>

<?php require '../menu.php';?>

<?php 
if (!$_SESSION["login"]) {
    die("nao vai entrar!");
}
?>

<?php $modal = 0;?>

<!--PUBLICIDADE-->
<?php require '../adicionar-view/adicionar-publicidade.php';?>
<?php require '../listar-view/listar-publicidade.php';?>

<!--BANNER HOME-->
<?php //require '../adicionar-view/adicionar-banner.php';?>
<?php require '../listar-view/listar-banner.php';?>

<!--NOTICIA-->
<?php require '../adicionar-view/adicionar-noticia.php';?>
<?php require '../listar-view/listar-noticia.php';?>

<!--LOJA-->
<?php require '../adicionar-view/adicionar-loja.php';?>
<?php require '../listar-view/listar-loja.php';?>


<?php require '../footer.php';?>

<script src="../js/abrir-fechar-lista.js"></script>
<script src="../js/editarToggle.js"></script>
<script src="../js/remover-item-ajax.js"></script>
<script src="../js/adicionar-item-ajax.js"></script>
<script src="../js/editar-item-ajax.js"></script>

