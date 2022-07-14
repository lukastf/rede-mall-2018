<?php 
if (!$_SESSION["login"]) {
    die("nao vai entrar!");
}
?>

<?php require '../database/selecionar-categorias.php';?>

<div class="row container-fluid mx-auto">
    <section class="jumbotron col-12 col-md-6 mx-auto">
        <form class="adicionar-loja" enctype="multipart/form-data">
            <h2>Adicionar nova Loja: </h2>
            <div class="form-group">
                <label for="imagemLoja">Imagem da Loja:</label>
                <input type="file" class="form-control" name="imagem" id="imagemLoja">
            </div>
            <div class="form-group">
                <label for="nome-loja">Nome da Loja:</label>
                <input type="text" class="form-control" name="nome" id="nome-loja">
            </div>
            <div class="form-group">
                <label for="telefone-loja">Telefone:</label>
                <input type="text" class="form-control" name="telefone" id="telefone-loja">
            </div>
            <div class="form-group">
                <label for="descricao">Descricao da Loja:</label>
                <textarea rows="5" class="form-control" name="descricao" id="descricao"></textarea>
            </div>
            <div class="form-group">
                <label for="categoriaLoja">Categoria da Loja:</label>
                <select name="categoria_id" class="form-control" id="categoriaLoja">
                <?php for($index = 0; $index < $i; $index++) { ?>
                    <option value="<?php echo $categorias[$index]["id"];?>"><?php echo $categorias[$index]["categoria"];?></option>
                <?php } ?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </section>
</div>