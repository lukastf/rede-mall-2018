<?php require '../database/selecionar-loja.php';?>

<?php 
if (!$_SESSION["login"]) {
    die("nao vai entrar!");
}
?>

<div class="row container-fluid mx-auto">
    <section class="jumbotron col-12 col-md-6 mx-auto">
        <h2>Lojas publicadas:<button class="abrir-lista"><i class="fa fa-plus"></i></button></h2>
        <ul class="list-group lista-admin lista-loja">
        <?php for ($index = 0; $index < $i; $index++) { ?>
            <li class="list-group-item list-group-item-action" data-toggle="modal" data-target="#modal<?php echo $modal;?>"><?php echo $lojas[$index]["nome"];?><button class="remover"><i class="fa fa-minus"></i></button></li>

            <!-- Modal -->
            <div class="modal fade" id="modal<?php echo $modal;?>">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title"><?php echo $lojas[$index]["nome"];?></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <img class="img-fluid" src="../img/img-lojas/<?php echo $lojas[$index]["imagem"];?>" alt="<?php echo $lojas[$index]["imagem"];?>">
                            <p>Remover <?php echo $lojas[$index]["nome"];?> ?</p>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <form class="remover-item">
                                <input type="hidden" name="remover_na_lista_ajax" value="<?php echo $modal;?>">
                                <input type="hidden" name="tabela" value="lojas">
                                <input type="hidden" name="remover_id" value="<?php echo $lojas[$index]["id"];?>">
                                <input type="hidden" name="imagem" value="<?php echo $lojas[$index]["imagem"];?>">
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
                                <h4 class="modal-title">Editar: <?php echo $lojas[$index]["nome"];?></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Imagem da loja:</label>
                                    <button class="btn btn-info m-3 toggleEditar editarImagem">Editar imagem</button>
                                    <br>
                                    <img class="img-fluid" src="../img/img-lojas/<?php echo $lojas[$index]["imagem"];?>" alt="<?php echo $lojas[$index]["imagem"];?>">
                                    <input style="display:none;" type="file" class="form-control" name="imagem">
                                </div>
                                <div class="form-group">
                                    <input value="<?php echo $lojas[$index]["id"];?>" type="hidden" name="id">
                                    <label>Nome da Loja:</label>
                                    <input value="<?php echo $lojas[$index]["nome"];?>" type="text" class="form-control" name="nome">
                                </div>
                                <div class="form-group">
                                    <label>Telefone da Loja:</label>
                                    <input value="<?php echo $lojas[$index]["telefone"];?>" type="text" class="form-control" name="telefone">
                                </div>
                                <div class="form-group">
                                    <label>Texto da Loja (de um espaço e coloque dois pontos ".." para criar um paragrafo):</label>
                                    <textarea rows="8" class="form-control" name="descricao"><?php echo $lojas[$index]["descricao"];?></textarea>
                                </div>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer editar-item-loja">
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