<?php 
if (!$_SESSION["login"]) {
    die("nao vai entrar!");
}
?>


<div class="row container-fluid mx-auto">
    <section class="jumbotron col-12 col-md-6 mx-auto">
        <form class="adicionar-noticia" enctype="multipart/form-data">
            <h2>Adicionar nova Noticia: </h2>
            <div class="form-group">
                <label for="imagemNoticia">Imagem da noticia:</label>
                <input type="file" class="form-control" name="imagem" id="imagemNoticia">
            </div>
            <div class="form-group">
                <label for="titulo-noticia">Titulo da Noticia:</label>
                <input type="text" class="form-control" name="titulo" id="titulo-noticia">
            </div>
            <div class="form-group">
                <label for="texto">Texto da Noticia (de um espaço e coloque dois pontos ".." para criar um paragrafo):</label>
                <textarea rows="5" class="form-control" name="texto" id="texto"></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </section>
</div>