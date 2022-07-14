<?php require '../header.php';?>

<title>Institucional</title>

<?php require '../menu.php';?>

<?php require '../database/conexao.php';?>
<?php require '../database/selecionar-publicidade-randomica.php';?>

<meta property="og:url"                content=""/>
<meta property="og:type"               content="article" />
<meta property="og:title"              content="" />
<meta property="og:description"        content="" />
<meta property="og:image"              content="" />

<div class="row container-fluid espaco-topo institucional-imagem">
    <section class="col-12">
        <img style="display:block;" class="img-fluid mx-auto" src="../img/o_mall.png" alt="">
    </section>
</div>

<div class="row container-fluid">
    <section class="col-12 novidades">
        <h3 style="text-align: center;">O Mall</h3>
    </section>
</div>

<div class="row container-fluid institucional">
    <section class="col-12 px-5 pb-3 paragrafo-noticia">
        <!--<img class="img-fluid publici" src="../img/img-publicidades/<?php //echo $publicidade[0]['imagem']; ?>" alt="<?php //echo $publicidade[0]['imagem'];?>">-->
        <p>A Rede Mall Belvedere é o maior centro comercial da região Leste de Rio Preto, reunindo um mix diferenciado 
            de marcas composto por 25 lojas, praça de alimentação, 1.500 vagas rotativas de estacionamento fechado e o Supermercado Porecatu 
            como âncora.</p>

        <p>Uma estrutura responsável pela geração de mais de 500 empregos diretos, a Rede Mall Belvedere eleva o potencial econômico da região 
            que conta com mais de 55 mil habitantes, população flutuante de mais de 140 mil pessoas por mês e com um grande potencial de 
            crescimento.</p>

        <p>Pensando totalmente em seus visitantes, a Rede Mall Belvedere foi desenvolvida para proporcionar praticidade, conforto e segurança.</p>
        <p>Venha nos visitar!</p>
    </section>
</div>

<?php require '../footer.php';?>