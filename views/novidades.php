<?php require '../header.php';?>

<title>Novidades</title>

<?php require '../menu.php';?>

<?php require '../functions/cortarTexto.php';?>

<?php require '../database/selecionar-noticia.php';?>

<!--<input type="hidden" name="dia" value="<?php //echo strftime('%H:%M %d/%m/%Y', strtotime($noticia[$index]['dia'])); ?>">-->

<?php $controlarRow = 0; $contarRow = 0; ?>

<div class="container espaco-topo lista-paginas">
    <?php for($index = 0; $index < $i; $index++) {?>
        <?php if ($index == 0) { ?>
            <div class="row" style="display:none;"> <!-- ABRE INDEX 0 -->
                <div class="col-12 col-md-4 item" style="display:none;">
                    <form class="card abrir-noticia transicao" action="noticia.php" method="get">
                        <img class="img-fluid card-img-top" src="../img/img-noticias/<?php echo $noticia[$index]["imagem"];?>" alt="">
                        <div class="card-body">
                            <h5><?php echo strftime('%H:%M %d/%m/%Y', strtotime($noticia[$index]['dia']));?></h5>
                            <h3><?php echo cortarTitulo($noticia[$index]["titulo"]);?></h3>
                            <!-- <p><?php //echo cortarTexto($noticia[$index]["texto"]);?></p> -->
                        </div>

                        <input type="hidden" name="titulo" value="<?php echo $noticia[$index]["titulo"];?>">
                    </form>
                </div>
            <?php $controlarRow++; $contarRow++; ?>
        <?php } 
        else if ($controlarRow != 3) { ?>
            <div class="col-12 col-md-4 item" style="display:none;">
                <form class="card abrir-noticia transicao" action="noticia.php" method="get">
                    <img class="img-fluid card-img-top" src="../img/img-noticias/<?php echo $noticia[$index]["imagem"];?>" alt="">
                    <div class="card-body">
                        <h5><?php echo strftime('%H:%M %d/%m/%Y', strtotime($noticia[$index]['dia']));?></h5>
                        <h3><?php echo cortarTitulo($noticia[$index]["titulo"]);?></h3>
                        <!-- <p><?php //echo cortarTexto($noticia[$index]["texto"]);?></p> -->
                    </div>
                    
                    <input type="hidden" name="titulo" value="<?php echo $noticia[$index]["titulo"];?>">
                </form>
            </div>
        <?php $controlarRow++; ?>
        <?php } else if($controlarRow == 3) { ?>
            </div> <!-- FECHA INDEX 0 -->
            <div class="row" style="display:none;">
                <div class="col-12 col-md-4 item" style="display:none;">
                    <form class="card abrir-noticia transicao" action="noticia.php" method="get">
                        <img class="img-fluid card-img-top" src="../img/img-noticias/<?php echo $noticia[$index]["imagem"];?>" alt="">
                        <div class="card-body">
                            <h5><?php echo strftime('%H:%M %d/%m/%Y', strtotime($noticia[$index]['dia']));?></h5>
                            <h3><?php echo cortarTitulo($noticia[$index]["titulo"]);?></h3>
                            <!-- <p><?php //echo cortarTexto($noticia[$index]["texto"]);?></p> -->
                        </div>

                        <input type="hidden" name="titulo" value="<?php echo $noticia[$index]["titulo"];?>">
                    </form>
                </div>
                <?php $controlarRow = 1; $contarRow++;?>
        <?php } ?> 
    <?php } ?>
    </div>
    <!--<div class="row">
        <button id="loadMore" type="button" class="btn btn-outline-primary mx-auto">Carregar Mais</button>
    </div>-->
</div>

<div class="row mt-4 container-fluid">
    <ul class="pagination mx-auto">
        <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
        <?php $contarRow/=2;
        for($index = 0; $index < $contarRow; $index++) { ?>
        <li class="page-item"><a class="page-link" href="#"><?php echo ($index + 1);?></a></li>
        <!--<li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">4</a></li>-->
        <?php } ?>
        <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
    </ul>
</div>


<!--<a href="#" id="loadMore">Carregar MAis</a>
<p class="totop"> 
    <a href="#top">Back to top</a> 
</p>-->

<?php require '../footer.php';?>
<script src="../js/abrir-noticia.js"></script>
<script src="../js/paginas.js"></script>
<!--<script src="../js/carregar-mais.js"></script>-->