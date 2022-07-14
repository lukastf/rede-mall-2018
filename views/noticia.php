<?php

$titulo = $_GET['titulo'] ? $_GET['titulo'] : null;

require '../database/conexao.php';

$stmt = $conn->prepare('SELECT imagem, dia, titulo, texto FROM noticias WHERE titulo = :titulo');

$stmt->execute(array('titulo' => $titulo));


foreach ($stmt as $row) {
    $noticia = $row;
}

require '../database/selecionar-publicidade-randomica.php';
$publicidadeMobile = selecionarPublicidadeRandomica('SELECT imagem FROM publicidades WHERE (mobile = 0 OR mobile = 1) AND lugar = 2 ORDER BY RAND() LIMIT 1');
$publicidadeDesktop = selecionarPublicidadeRandomica('SELECT imagem FROM publicidades WHERE (mobile = 0 OR mobile = 2) AND lugar = 2 ORDER BY RAND() LIMIT 1');
?>

<?php $actual_link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>

<meta property="og:url"                content="<?php echo $actual_link;?>"/>
<meta property="og:type"               content="website" />
<meta property="og:title"              content="<?php echo $noticia['titulo'];?>" />
<meta property="og:description"        content="<?php echo $noticia['texto'];?>" />
<meta property="og:image"              content="http://redemall.com.br/img/img-noticias/<?php echo $noticia['imagem'];?>" />

<?php require '../header.php';?>

<title>Novidades</title>

<?php require '../menu.php';?>


<?php 
if ($noticia['imagem'] == null || $noticia['dia'] == null || $noticia['titulo'] == null || $noticia['texto'] == null) {
    echo '<script>window.location = "novidades.php"</script>';
} else { 
?>

<div class="row container-fluid espaco-topo noticia">
    <section class="col-12 novidades">
        <!-- <?php //echo strftime('%H:%M %d/%m/%Y', strtotime($noticia['dia'])); ?> Data legal -->
        <h5 style="">Novidade/ <?php echo strftime('%d/%m/%Y', strtotime($noticia['dia'])); ?></h5>
    </section>
</div>

<div class="row container-fluid noticia">
    <section class="col-12 novidades">
        <h3 style=""><?php echo $noticia['titulo'];?></h3>
    </section>
</div>

<div class="row container-fluid social-noticia">
    <section class="col-12 py-5">
        <img style="display:block;/*min-width: 68%;*/" class="img-fluid mx-auto" src="../img/img-noticias/<?php echo $noticia['imagem'];?>" alt="<?php echo $noticia['imagem'];?>">
        <div class="botoes-sociais pt-4">
            <?php
                $actual_link = str_replace("+","%2B", $actual_link);
            ?>
            <a href=""></a>
            <i class="fa fa-share-alt-square" style="font-size:2em;"></i>
            <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//<?php echo $actual_link;?>" class="fb-xfbml-parse-ignore" target="_blank"><i class="fa fa-facebook-official"></i></a>
        </div>
    </section>
</div>

<?php
$texto = $noticia['texto'];
$paragrafos = [];
$paragrafos = (explode("..", $texto));
$contarParagrafos = count($paragrafos);
?>
<div class="row container-fluid">
    <section class="col-12 pb-3 paragrafo-noticia">
        <?php for ($i = 0; $i < $contarParagrafos; $i++){ 
            if($i == 0) { ?>
                <p class="text-left"><?php echo $paragrafos[$i];?></p>
            <?php
            }
            else if ($i == 1) { ?>
                <img class="img-fluid publici mobile" src="../img/img-publicidades/<?php echo $publicidadeMobile[0]['imagem'];?>" alt="<?php echo $publicidadeMobile[0]['imagem'];?>">
                <p class="text-left"><?php echo $paragrafos[$i];?></p>
            <?php
            }
            else { ?>
                <p class="text-left"><?php echo $paragrafos[$i];?></p>
        <?php
            }
        }
        ?>
        <img class="img-fluid publici desktop" src="../img/img-publicidades/<?php echo $publicidadeDesktop[0]['imagem'];?>" alt="<?php echo $publicidadeDesktop[0]['imagem'];?>">
        <a href="/views/novidades.php" class="voltar">
            <img src="/img/seta.svg" alt="">
            <p>Voltar</p>
        </a>
    </section>
</div>

<?php } ?>

<?php require '../footer.php';?>