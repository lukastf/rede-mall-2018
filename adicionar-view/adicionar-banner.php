<?php 
if (!$_SESSION["login"]) {
    die("nao vai entrar!");
}
?>

<div class="row container-fluid mx-auto">
    <section class="jumbotron mt-5 col-12 col-md-6 mx-auto">  
        <form class="adicionar-banner" enctype="multipart/form-data">
            <h2>Adicionar novo Banner: </h2>
            <div class="form-group">
                <label for="imagemBanner">Imagem do Banner:</label>
                <input type="file" class="form-control" name="imagem" id="imagemBanner">
            </div>
            <div class="form-group">
                <label for="mobile_ou_desktop">É mobile ou desktop?</label>
                <select name="mobile_ou_desktop" class="form-control" id="mobile_ou_desktop">
                    <option value="0">Os Dois</option>
                    <option value="1">Mobile</option>
                    <option value="2">Desktop</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </section>
</div>