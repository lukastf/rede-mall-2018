<?php require '../database/selecionar-publicidade.php';?>

<?php 
if (!$_SESSION["login"]) {
    die("nao vai entrar!");
}
?>

<div class="row container-fluid mx-auto">
    <section class="jumbotron col-12 col-md-6 mx-auto">
        <h2>Publicidades publicadas:<button class="abrir-lista"><i class="fa fa-plus"></i></button></h2>
        <ul class="list-group lista-admin lista-publicidade">
        <?php for ($index = 0; $index < $i; $index++) { ?>

            <li class="list-group-item list-group-item-action" data-toggle="modal" data-target="#modal<?php echo $modal;?>"><?php echo $publicidades[$index]["imagem"];?>, <?php echo strftime('%H:%M %d/%m/%Y', strtotime($publicidades[$index]['dia']));?><button class="remover"><i class="fa fa-minus"></i></button></li>

            <!-- Modal -->
            <div class="modal fade" id="modal<?php echo $modal;?>">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title"><?php echo $publicidades[$index]["imagem"];?></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                        <?php if($publicidades[$index]["link"] != "") { ?>
                            <div class="embed-responsive embed-responsive-16by9">
                                <?php if (strpos($publicidades[$index]['imagem'], 'youtube') !== false) { ?>
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $publicidades[$index]['link'];?>" allowfullscreen></iframe>
                                <?php } else if (strpos($publicidades[$index]['imagem'], 'facebook') !== false) { ?>
                                    <iframe class="embed-responsive-item" src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.<?php echo $publicidades[$index]['link'];?>" allowfullscreen></iframe>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <img class="img-fluid" src="../img/img-publicidades/<?php echo $publicidades[$index]["imagem"];?>" alt="<?php echo $publicidades[$index]["imagem"];?>">
                        <?php } ?>
                        <p>Remover <?php echo $publicidades[$index]["imagem"];?> ?</p>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <form class="remover-item">
                                <input type="hidden" name="remover_na_lista_ajax" value="<?php echo $modal;?>">
                                <input type="hidden" name="tabela" value="publicidades">
                                <input type="hidden" name="remover_id" value="<?php echo $publicidades[$index]["id"];?>">
                                <input type="hidden" name="imagem" value="<?php echo $publicidades[$index]["imagem"];?>">
                                <button type="submit" class="btn btn-warning" data-dismiss="modal" data-toggle="modal" data-target="#modalEditar<?php echo $modal;?>">Editar</button>
                                <button type="submit" class="btn btn-danger remover-item-botao" data-dismiss="modal">Remover</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    
                    </div>
                </div>
            </div>

            <!-- Modal Editar -->
            <div class="modal fade modal-editar" id="modalEditar<?php echo $modal;?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="" enctype="multipart/form-data" method="post">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo $publicidades[$index]["imagem"];?></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                                <?php if($publicidades[$index]["link"] != "") { ?>
                                <div class="form-group">
                                    <label>Video da publicidade:</label>
                                    <button class="btn btn-info m-3 toggleEditar editarVideo">Editar video</button>
                                    <br>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <?php if (strpos($publicidades[$index]['imagem'], 'youtube') !== false) { ?>
                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $publicidades[$index]['link'];?>" allowfullscreen></iframe>
                                        <?php } else if (strpos($publicidades[$index]['imagem'], 'facebook') !== false) { ?>
                                            <iframe class="embed-responsive-item" src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.<?php echo $publicidades[$index]['link'];?>" allowfullscreen></iframe>
                                        <?php } ?>
                                    </div>
                                    <input class="form-control" style="display:none;" type="text" name="link" value="<?php echo $publicidades[$index]['imagem'];?>">
                                </div>
                                <?php } else { ?>
                                <div class="form-group">
                                    <label>Imagem da publicidade:</label>
                                    <button class="btn btn-info m-3 toggleEditar editarImagem">Editar imagem</button>
                                    <br>
                                    <img class="img-fluid" src="../img/img-publicidades/<?php echo $publicidades[$index]["imagem"];?>" alt="<?php echo $publicidades[$index]["imagem"];?>">
                                    <input style="display:none;" type="file" class="form-control" name="imagem">
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label>Data:<?php echo strftime('%H:%M %d/%m/%Y', strtotime($publicidades[$index]['dia']));?></label>
                                    <p style="display:none;"><?php echo $publicidades[$index]['dia'];?></p><!--Data original-->
                                    <button class="btn btn-info m-3 toggleEditar editarData">Editar data</button>
                                    <label class="toggleLabelDia" style="display:none;">Use o formato AAAA-MM-DD HH:MM:SS</label>
                                    <input class="form-control" style="display:none;" type="text" name="dia" value="<?php echo $publicidades[$index]['dia'];?>">
                                </div>
                                <div class="form-group">
                                    <input value="<?php echo $publicidades[$index]["id"];?>" type="hidden" name="id">
                                </div>
                                <div class="form-group">
                                    <label for="mobile_ou_desktop">É mobile ou desktop?</label>
                                    <select name="mobile_ou_desktop" class="form-control" id="mobile_ou_desktop">
                                        <!-- <option value="0" <?php //if($publicidades[$index]["mobile"] == 0){ echo 'selected';} ?> >Os Dois</option> -->
                                        <option value="1" <?php if($publicidades[$index]["mobile"] == 1){ echo 'selected';} ?> >Mobile</option>
                                        <option value="2" <?php if($publicidades[$index]["mobile"] == 2){ echo 'selected';} ?> >Desktop</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="lugar">Aparecer em que lugar?</label>
                                    <select name="lugar" class="form-control" id="lugar">
                                        <option value="0" <?php if($publicidades[$index]["lugar"] == 0){ echo 'selected';} ?> >Inicio</option>
                                        <!-- <option value="1" <?php //if($publicidades[$index]["lugar"] == 1){ echo 'selected';} ?> >Loja</option> -->
                                        <option value="2" <?php if($publicidades[$index]["lugar"] == 2){ echo 'selected';} ?> >Noticia</option>
                                        <option value="3" <?php if($publicidades[$index]["lugar"] == 3){ echo 'selected';} ?> >Loja</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer editar-item-publicidade">
                                <button type="submit" name="submit" class="btn btn-primary editar-item-botao">Editar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php $modal++;?>

        <?php } ?>
        </ul>
    </section>
</div>

<?php $conn = null;?>