<?php

$nome = $_GET['nome'] ? $_GET['nome'] : null;

require '../database/conexao.php';

$stmt = $conn->prepare('SELECT imagem, nome, descricao, telefone FROM lojas WHERE nome = :nome');

$stmt->execute(array('nome' => $nome));


foreach ($stmt as $row) {
    $loja = $row;
}

require '../database/selecionar-publicidade-randomica.php';
$publicidadeMobile = selecionarPublicidadeRandomica('SELECT imagem FROM publicidades WHERE (mobile = 0 OR mobile = 1) AND lugar = 1 ORDER BY RAND() LIMIT 1');
$publicidadeDesktop = selecionarPublicidadeRandomica('SELECT imagem FROM publicidades WHERE (mobile = 0 OR mobile = 2) AND lugar = 1 ORDER BY RAND() LIMIT 1');
?>

<?php $actual_link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>

<meta property="og:url"                content="<?php echo $actual_link;?>"/>
<meta property="og:type"               content="website" />
<meta property="og:title"              content="<?php echo $loja['nome'];?>" />
<meta property="og:description"        content="<?php echo $loja['descricao'];?>" />
<meta property="og:image"              content="http://redemall.com.br/img/img-lojas/<?php echo $loja['imagem'];?>" />

<?php require '../header.php';?>

<title>Loja</title>

<?php require '../menu.php';?>


<?php 
if ($loja['imagem'] == null || $loja['nome'] == null || $loja['descricao'] == null) {
    echo '<script>window.location = "pesquisar-loja.php"</script>';
} else { 
?>

<div class="row container-fluid espaco-topo p-5">
    <div class="col-12">
        <img class="img-fluid pr-5 pb-5" style="float:left;" src="../img/img-lojas/<?php echo $loja['imagem'];?>" alt="<?php echo $loja['imagem'];?>">
        <div class="novidades" style="padding:0;">
            <h3><?php echo $loja['nome'];?></h3>
            <h5><?php echo $loja["telefone"];?></h5>
        </div>
        <div class="paragrafo-loja">
            <?php
                $texto = $loja['descricao'];
                $paragrafos = [];
                $paragrafos = (explode("..", $texto));
                $contarParagrafos = count($paragrafos);
            ?>
            <?php //for ($i = 0; $i < $contarParagrafos; $i++){ -- for full paragrafo
            for ($i = 0; $i < 2; $i++) {
                //if($i == $contarParagrafos-1) { -- if full paragrafo
                if($i == 1) { ?>
                    <p class="text-left"><?php echo $paragrafos[$i];?></p>
                    <img class="img-fluid publici mobile" src="../img/img-publicidades/<?php echo $publicidadeMobile[0]['imagem']; ?>" alt="<?php echo $publicidade[0]['imagem'];?>">
                    <img class="img-fluid publici desktop" src="../img/img-publicidades/<?php echo $publicidadeDesktop[0]['imagem']; ?>" alt="<?php echo $publicidade[0]['imagem'];?>">
                <?php
                }
                else { ?>
                    <p class="text-left"><?php echo $paragrafos[$i];?></p>
                <?php
                }
            }
            ?>
            <a href="/views/pesquisar-loja.php" class="voltar">
                <img src="/img/seta.svg" alt="">
                <p>Voltar</p>
            </a>
        </div>
    </div>
</div>

<?php } ?>

<?php require '../footer.php';?>