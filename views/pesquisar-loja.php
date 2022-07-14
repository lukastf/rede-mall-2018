<?php require '../header.php';?>

<title>Pesquisar</title>

<?php require '../menu.php';?>

<?php $pesquisa = isset($_GET['pesquisa-loja']) ? $_GET['pesquisa-loja'] : "";?>

<?php require '../database/selecionar-categorias.php';?>

<div class="row container py-4 espaco-topo estilo-pesquisar-loja">
    <section class="col-12 col-md-4 encontrar-loja">
        <h3>Encontre uma Loja</h3>
        <form>
            <div class="input-group">
                <input value="<?php echo $pesquisa;?>" type="text" class="form-control col-10 live-search-box" id="pesquisa-loja" placeholder="Pesquise aqui sua loja">
                <button class="col-2 live-search-button"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </section>
    <section class="col-12 col-md-6 selecione-categoria">
        <h3>Selecione uma Categoria</h3>
        <div class="input-group">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">categorias</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php for($index = -1; $index < $i; $index++) {
                    if ($index == -1) { ?>
                        <a class="dropdown-item categoria-loja" href="#">todas</a>
                    <?php } else { ?>
                        <a class="dropdown-item categoria-loja" href="#"><?php echo $categorias[$index]["categoria"];?></a>
                    <?php } ?>
                <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require '../functions/cortarTexto.php';?>

<?php require '../database/selecionar-loja.php';?>

<?php
require '../database/selecionar-publicidade-randomica.php';
$publicidadeMobile = selecionarPublicidadeRandomica('SELECT imagem FROM publicidades WHERE (mobile = 0 OR mobile = 1) AND lugar = 3 ORDER BY RAND() LIMIT 1');
$publicidadeDesktop = selecionarPublicidadeRandomica('SELECT imagem FROM publicidades WHERE (mobile = 0 OR mobile = 2) AND lugar = 3 ORDER BY RAND() LIMIT 1');
?>

<?php $controlarRow = 0; $contarRow = 0;?>

<div class="container live-search-list lista-paginas">
    <?php for($index = 0; $index < $i; $index++) { ?>
        <?php if ($index == 0) { ?>
            <div class="row" style="display:none;"> <!-- ABRE INDEX 0 -->
                <div class="col-12 col-md-4 item" style="display:none;">
                    <form class="card abrir-loja transicao" action="loja.php" method="get">
                        <img class="img-fluid card-img-top" src="../img/img-lojas/<?php echo $lojas[$index]["imagem"];?>" alt="">
                        <div class="card-body">
                            <p class="categoria" style="display:none"><?php echo $lojas[$index]["categoria_id"];?></p>
                            <h3><?php echo $lojas[$index]["nome"];?></h3>
                            <h5><?php echo $lojas[$index]["telefone"];?></h5>
                            <p><?php echo cortarTexto($lojas[$index]["descricao"]);?></p>
                        </div>
                        <input type="hidden" name="nome" value="<?php echo $lojas[$index]["nome"];?>">
                    </form>
                </div>
            <?php $controlarRow++; $contarRow++;?>
        <?php } else if ($index == 1 && $publicidadePesquisaLoja > 0) { ?>
            <!--Publicidade-->
            <div class="col-12 col-md-4 item" style="display:none;">
                <form class="card transicao" style="min-height: 100%;">

                    <img class="img-fluid card-img-top mobile" src="../img/img-publicidades/<?php echo $publicidadeMobile[0]['imagem'];?>" alt="<?php echo $publicidadeMobile[0]['imagem'];?>">
                    <img class="img-fluid card-img-top desktop" src="../img/img-publicidades/<?php echo $publicidadeDesktop[0]['imagem'];?>" alt="<?php echo $publicidadeDesktop[0]['imagem'];?>">
                    
                    <!-- <div class="card-body">
                        <p class="categoria" style="display:none"><?php //echo $lojas[$index]["categoria_id"];?></p>
                        <h3><?php //echo $lojas[$index]["nome"];?></h3>
                        <h5><?php //echo $lojas[$index]["telefone"];?></h5>
                        <p><?php //echo cortarTexto($lojas[$index]["descricao"]);?></p>
                    </div>
                    <input type="hidden" name="nome" value="<?php //echo $lojas[$index]["nome"];?>"> -->
                </form>
            </div>
        <?php $index--; $publicidadePesquisaLoja = 0; $controlarRow++; $contarRow++;?>
        <?php }
        else if ($controlarRow != 3) { ?>
            <div class="col-12 col-md-4 item" style="display:none;">
                <form class="card abrir-loja transicao" action="loja.php" method="get">
                    <img class="img-fluid card-img-top" src="../img/img-lojas/<?php echo $lojas[$index]["imagem"];?>" alt="">
                    <div class="card-body">
                        <p class="categoria" style="display:none"><?php echo $lojas[$index]["categoria_id"];?></p>
                        <h3><?php echo $lojas[$index]["nome"];?></h3>
                        <h5><?php echo $lojas[$index]["telefone"];?></h5>
                        <p><?php echo cortarTexto($lojas[$index]["descricao"]);?></p>
                    </div>
                    <input type="hidden" name="nome" value="<?php echo $lojas[$index]["nome"];?>">
                </form>
            </div>
        <?php $controlarRow++; ?>
        <?php } else { ?>
            </div> <!-- FECHA INDEX 0 -->
            <div class="row" style="display:none;">
                <div class="col-12 col-md-4 item" style="display:none;">
                    <form class="card abrir-loja transicao" action="loja.php" method="get">
                        <img class="img-fluid card-img-top" src="../img/img-lojas/<?php echo $lojas[$index]["imagem"];?>" alt="">
                        <div class="card-body">
                            <p class="categoria" style="display:none"><?php echo $lojas[$index]["categoria_id"];?></p>
                            <h3><?php echo $lojas[$index]["nome"];?></h3>
                            <h5><?php echo $lojas[$index]["telefone"];?></h5>
                            <p><?php echo cortarTexto($lojas[$index]["descricao"]);?></p>
                        </div>
                        <input type="hidden" name="nome" value="<?php echo $lojas[$index]["nome"];?>">
                    </form>
                </div>
                <?php $controlarRow = 1; $contarRow++;?>
        <?php } ?> 
    <?php } ?>
    </div>
</div>

<div class="row mt-4 container-fluid">
    <ul class="pagination mx-auto">
        <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
        <?php $contarRow/=2;
        for($index = 0; $index < $contarRow; $index++) { ?>
        <li class="page-item"><a class="page-link" href="#"><?php echo ($index + 1);?></a></li>
        <?php } ?>
        <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
    </ul>
</div>

<?php require '../footer.php';?>
<script src="../js/paginas.js"></script>
<script src="../js/pesquisa-loja.js"></script>
<script src="../js/abrir-loja.js"></script>
<script src="../js/categoria-loja.js"></script>