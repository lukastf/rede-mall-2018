<?php 
if (!$_SESSION["login"]) {
    die("nao vai entrar!");
}
?>

<div class="row container-fluid mx-auto espaco-topo">
    <section class="jumbotron mt-5 col-12 col-md-6 mx-auto">  
        <form class="adicionar-publicidade" enctype="multipart/form-data">
            <h2>Adicionar nova Publicidade:</h2>
            <div class="form-group">
                <label for="lugar">Aparecer em que lugar?</label>
                <select name="lugar" class="form-control" id="lugar">
                    <option value="-1">Home topo | mobile (360x360px) | desktop (1920x1080px)</option>
                    <option value="0">Home publicidade | mobile (360x230px) | desktop (675x432px)</option>
                    <!-- <option value="1">Loja</option> -->
                    <option value="2">Noticia | mobile (360x230px) | desktop (1289x213px)</option>
                    <option value="3">Loja | mobile (350x230px) | desktop (348x424px)</option>
                </select>
            </div>
            <button type="button" class="btn btn-primary toggleEditarVideo">Video</button>
            <div class="form-group video-publici" style="display:none;">
                <label for="videoPublicidade">Video da Publicidade:</label>
                <input type="text" class="form-control" placeholder="link do video" name="link" id="videoPublicidade">
            </div>
            <div class="form-group imagem-publici">
                <label for="imagemPublicidadeMobile">Imagem da Pulicidade mobile:</label>
                <input type="file" class="form-control" name="imagem-mobile" id="imagemPublicidadeMobile">
            </div>
            <div class="form-group imagem-publici">
                <label for="imagemPublicidadeDesktop">Imagem da Pulicidade desktop:</label>
                <input type="file" class="form-control" name="imagem-desktop" id="imagemPublicidadeDesktop">
            </div>
            <!-- <div class="form-group">
                <label for="mobile_ou_desktop">É mobile ou desktop?</label>
                <select name="mobile_ou_desktop" class="form-control" id="mobile_ou_desktop">
                    <option value="0">Os Dois</option>
                    <option value="1">Mobile</option>
                    <option value="2">Desktop</option>
                </select>
            </div> -->
            <button type="submit" name="submit" class="btn btn-primary">Publicar</button>
        </form>
    </section>
</div>

<script src="/js/adicionar-publicidade.js"></script>