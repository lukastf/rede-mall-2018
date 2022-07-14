<?php require '../header.php';?>

<title>Contato</title>

<?php require '../menu.php';?>

<div class="row container-fluid espaco-topo contato">
    <section class="col-12 col-md-6 pl-5">
        <h5>Endereço</h5>
        <p>Av Belvedere, 605 - São José do Rio Preto - SP</p>
        <h5>Telefone</h5>
        <p>(17) 3202-6100</p>
        <h5>Horário de funcionamento</h5>
        <p>Segunda a Sábado: 7h30 às 21h</p>
        <p>Domingo e Feriado: 7h30 às 13h</p>
    </section>
    <section class="col-12 col-md-6 pb-5">
        <form class="validar-contato">
            <h5>Envie sua mensagem</h5>
            <div class="form-group">
                <label for="nome-completo">Nome Completo:</label>
                <input id="nome-completo" type="text" class="form-control" placeholder="Nome Completo" name="nome">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input id="email" type="text" class="form-control" placeholder="email@exemplo.com" name="email">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input id="telefone" type="text" class="form-control" placeholder="(99)99999-9999" name="telefone">
            </div>
            <div class="form-group">
                <label for="assunto">Assunto</label>
                <input id="assunto" type="text" class="form-control" placeholder="escreva um breve assunto" name="assunto">
            </div>
            <div class="form-group">
                <label for="mensagem">Mensagem</label>
                <textarea id="mensagem" type="text" class="form-control" placeholder="Digite sua mensagem" rows="5" cols="60" name="mensagem"></textarea>
            </div>
            <button class="btn btn-info" type="submit">Enviar</button>
            <i class="fa fa-circle-o-notch fa-spin" style="color:black;display: none;"></i>
            <span class="falhou" style="display:none;"><p class="pt-3"></p></span>
        </form>
    </section>
</div>

<?php require '../footer.php';?>

<script src="/js/enviar-contato.js"></script>