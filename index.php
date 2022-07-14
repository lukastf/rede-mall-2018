<?php require 'header.php';?>

<title>Rede Mall</title>

<?php require 'menu.php';?>

<?php require 'functions/cortarTexto.php';?>

<?php require 'database/selecionar-banner.php';
$bannerMobile = selecionarBanner('SELECT id, imagem, dia, mobile FROM banner WHERE (mobile = 0 OR mobile = 1) ORDER BY dia DESC');
$bannerDesktop = selecionarBanner('SELECT id, imagem, dia, mobile FROM banner WHERE (mobile = 0 OR mobile = 2) ORDER BY dia DESC');
?>

<div id="overlay">
  <div id="enviarEmail">
    <h3>Cadastre seu email</h3>
    <p>Receba novidades e ofertas exclusivas!</p>
    <form class="validar-email" method="post" action="">
        <div class="input-group">
            <input type="email" class="form-control" name="receberEmail">
            <button type="submit" class="enviarEmail"><i class="fa fa-send" style="color:white;"></i></button>
        </div>
        <i class="fa fa-circle-o-notch fa-spin"></i>
        <span class="falhou" style="display:none;"><p class="pt-3"></p></span>
    </form>
    <button type="button" aria-label="Close" class="fecharEmail"><span aria-hidden="true">&times;</span></button>
  </div>
</div>

<!--Carrossel Mobile-->
<?php if (!empty($bannerMobile)) { ?>
<div class="row container-fluid mobile" style="margin:0; padding:0;">
    <section id="bannerMobile" class="col-12 carousel slide" data-ride="carousel" data-interval="7000">
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <?php foreach($bannerMobile as $key => $value){ ?>
                <li class="<?php if($key == 0){ echo 'active';} ?>" data-target="#bannerMobile" data-slide-to="<?php echo $key;?>"></li>
            <?php } ?>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <?php foreach($bannerMobile as $key => $value) {?>
                <div class="carousel-item <?php if($key == 0){ echo 'active';} ?>">
                    <img class="img-fluid mx-auto" src="img/img-banner/<?php echo $bannerMobile[$key]["imagem"];?>" alt="<?php echo $bannerMobile[$key]["imagem"];?>">
                </div>
            <?php } ?>
        </div>
    </section>
</div>
<?php } ?>

<!--Carrossel Desktop-->
<?php if (!empty($bannerDesktop)) { ?>
<div class="row container-fluid desktop" style="margin:0; padding:0;">
    <section id="bannerDesktop" class="col-12 carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <?php foreach($bannerDesktop as $key => $value){ ?>
                <li class="<?php if($key == 0){ echo 'active';} ?>" data-target="#bannerDesktop" data-slide-to="<?php echo $key;?>"></li>
            <?php } ?>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <?php foreach($bannerDesktop as $key => $value) {?>
                <div class="carousel-item <?php if($key == 0){ echo 'active';} ?>">
                    <img class="img-fluid mx-auto" src="img/img-banner/<?php echo $bannerDesktop[$key]["imagem"];?>" alt="<?php echo $bannerDesktop[$key]["imagem"];?>">
                </div>
            <?php } ?>
        </div>
    </section>
</div>
<?php } ?>

<?php require 'database/selecionar-noticia.php';?>

<div class="row container-fluid" style="margin:0; padding:0;">
    <section class="col-12 col-md-6 novidades">
        <h3 class="titulo-principal">Novidades</h3>
        <div id="noticias" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#noticias" data-slide-to="0" class="active"></li>
                <li data-target="#noticias" data-slide-to="1"></li>
                <li data-target="#noticias" data-slide-to="2"></li>
            </ul>
            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active pb-5">
                    <div class="col-12">
                        <form class="abrir-noticia row" action="views/noticia.php" method="get">
                            <div class="col-12">
                                <img class="img-fluid" src="img/img-noticias/<?php echo $noticia[0]["imagem"];?>" alt="<?php echo $noticia[0]["imagem"];?>">
                                <h5><?php echo strftime('%d/%m/%Y', strtotime($noticia[0]['dia']));?></h5>
                                <h3><?php echo $noticia[0]["titulo"];?></h3>
                                <p><?php echo cortarTexto2($noticia[0]["texto"]);?></p>
                                <input type="hidden" name="titulo" value="<?php echo $noticia[0]["titulo"];?>">
                            </div>
                        </form>
                    </div>
                    <div class="col-12 pt-4">
                        <form class="abrir-noticia row" action="views/noticia.php" method="get">
                            <div class="col-12">
                                <img class="img-fluid" src="img/img-noticias/<?php echo $noticia[1]["imagem"];?>" alt="<?php echo $noticia[1]["imagem"];?>">
                                <h5><?php echo strftime('%d/%m/%Y', strtotime($noticia[1]['dia']));?></h5>
                                <h3><?php echo $noticia[1]["titulo"];?></h3>
                                <p><?php echo cortarTexto2($noticia[1]["texto"]);?></p>
                                <input type="hidden" name="titulo" value="<?php echo $noticia[1]["titulo"];?>">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- <div class="carousel-item pb-5">
                    <div class="col-12">
                        <form class="abrir-noticia row" action="views/noticia.php" method="get">
                            <div class="col-12">
                                <img class="img-fluid" src="img/img-noticias/<?php //echo $noticia[2]["imagem"];?>" alt="<?php //echo $noticia[2]["imagem"];?>">
                                <h5><?php //echo strftime('%d/%m/%Y', strtotime($noticia[2]['dia']));?></h5>
                                <h3><?php //echo $noticia[2]["titulo"];?></h3>
                                <p><?php //echo cortarTexto2($noticia[2]["texto"]);?></p>
                                <input type="hidden" name="titulo" value="<?php //echo $noticia[2]["titulo"];?>">
                            </div>
                        </form>
                    </div>
                    <div class="col-12 pt-5">
                        <form class="abrir-noticia row" action="views/noticia.php" method="get">
                            <div class="col-12">
                                <img class="img-fluid" src="img/img-noticias/<?php //echo $noticia[3]["imagem"];?>" alt="<?php //echo $noticia[3]["imagem"];?>">
                                <h5><?php //echo strftime('%d/%m/%Y', strtotime($noticia[3]['dia']));?></h5>
                                <h3><?php //echo $noticia[3]["titulo"];?></h3>
                                <p><?php //echo cortarTexto2($noticia[3]["texto"]);?></p>
                                <input type="hidden" name="titulo" value="<?php //echo $noticia[3]["titulo"];?>">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="carousel-item pb-5">
                    <div class="col-12">
                        <form class="abrir-noticia row" action="views/noticia.php" method="get">
                            <div class="col-12">
                                <img class="img-fluid" src="img/img-noticias/<?php //echo $noticia[4]["imagem"];?>" alt="<?php //echo $noticia[4]["imagem"];?>">
                                <h5><?php //echo strftime('%d/%m/%Y', strtotime($noticia[4]['dia']));?></h5>
                                <h3><?php //echo $noticia[4]["titulo"];?></h3>
                                <p><?php //echo cortarTexto2($noticia[4]["texto"]);?></p>
                                <input type="hidden" name="titulo" value="<?php //echo $noticia[4]["titulo"];?>">
                            </div>
                        </form>
                    </div>
                    <div class="col-12 pt-5">
                        <form class="abrir-noticia row" action="views/noticia.php" method="get">
                            <div class="col-12">
                                <img class="img-fluid" src="img/img-noticias/<?php //echo $noticia[5]["imagem"]; ?>" alt="<?php //echo $noticia[5]["imagem"];?>">
                                <h5><?php //echo strftime('%d/%m/%Y', strtotime($noticia[5]['dia']));?></h5>
                                <h3><?php //echo $noticia[5]["titulo"];?></h3>
                                <p><?php //echo cortarTexto2($noticia[5]["texto"]);?></p>
                                <input type="hidden" name="titulo" value="<?php //echo $noticia[5]["titulo"];?>">
                            </div>
                        </form>
                    </div>
                </div> -->
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev setas-fixadas-topo" href="#noticias" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next setas-fixadas-topo" href="#noticias" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </section>

    <?php require 'database/selecionar-publicidade-randomica.php';
    $publicidadeMobile = selecionarPublicidadeRandomica('SELECT imagem, link FROM publicidades WHERE (mobile = 0 OR mobile = 1) AND lugar = 0 ORDER BY RAND() LIMIT 1');
    $publicidadeDesktop = selecionarPublicidadeRandomica('SELECT imagem, link FROM publicidades WHERE (mobile = 0 OR mobile = 2) AND lugar = 0 ORDER BY RAND() LIMIT 1');
    ?>
    
    <section class="col-12 col-md-6 encontrar-loja" style="padding:0;">
        <div class="fundo-laranja-pesquisa">
            <form action="views/pesquisar-loja.php" class="px-5">
                <h3 class="titulo-principal">Encontre uma Loja</h3>
                <div class="input-group">
                    <input name="pesquisa-loja" type="text" class="form-control col-10" id="pesquisa-loja" placeholder="Pesquise aqui sua loja">
                    <button type="submit" class="col-2"><i class="fa fa-search" style="color:white;"></i></button>
                </div>
            </form>
        </div>
        <div class="cinzinha">
            <?php if ($publicidadeMobile[0]['link'] != "") { ?>
                <div class="mobile">
                    <div class="embed-responsive embed-responsive-16by9">
                        <?php if (strpos($publicidadeMobile[0]['imagem'], 'youtube') !== false) { ?>
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $publicidadeMobile[0]['link'];?>" allowfullscreen></iframe>
                        <?php } else if (strpos($publicidadeMobile[0]['imagem'], 'facebook') !== false) { ?>
                            <iframe class="embed-responsive-item" src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.<?php echo $publicidadeMobile[0]['link'];?>" allowfullscreen></iframe>
                        <?php } ?>
                    </div>
                </div>
            <?php } else { ?>
                <img class="img-fluid publici mobile" src="img/img-publicidades/<?php echo $publicidadeMobile[0]['imagem'];?>" alt="<?php echo $publicidadeMobile[0]['imagem'];?>">
            <?php } ?>
            <?php if ($publicidadeDesktop[0]['link'] != "") { ?>
                <div class="desktop">
                    <div class="embed-responsive embed-responsive-16by9">
                        <?php if (strpos($publicidadeDesktop[0]['imagem'], 'youtube') !== false) { ?>
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $publicidadeDesktop[0]['link'];?>" allowfullscreen></iframe>
                        <?php } else if (strpos($publicidadeDesktop[0]['imagem'], 'facebook') !== false) { ?>
                            <iframe class="embed-responsive-item" src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.<?php echo $publicidadeDesktop[0]['link'];?>" allowfullscreen></iframe>
                        <?php } ?>
                    </div>
                </div>
            <?php } else { ?>
                <img class="img-fluid publici desktop" src="img/img-publicidades/<?php echo $publicidadeDesktop[0]['imagem'];?>" alt="<?php echo $publicidadeDesktop[0]['imagem'];?>">
            <?php } ?>
        </div>
    </section>
</div>

<?php require 'footer.php';?>

<script src="js/index.js"></script>
<script src="js/abrir-noticia.js"></script>
<script src="js/abrir-loja.js"></script>
<script src="js/enviar-email.js"></script>