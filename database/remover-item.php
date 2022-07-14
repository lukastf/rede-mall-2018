<?php

session_start();

if (!$_SESSION["login"]) {
    die("nao vai entrar!");
}

$imagem = $_POST['imagem'];
$tabela = $_POST['tabela'];
$id = $_POST['remover_id'];

// Value whitelist
// $dir can only be 'DESC' otherwise it will be 'ASC'
if ($tabela === 'banner' || $tabela === 'lojas' || $tabela === 'noticias' || $tabela == 'publicidades') {
    echo "lecau";
 }
 else {
     die("nao vai hackear!");
 }

require 'conexao.php';
    
unlink("../img/img-".$tabela."/".$imagem);

$sql = 'DELETE FROM '.$tabela.' WHERE imagem = :imagem AND id = :id';
$stmt = $conn->prepare($sql);
$stmt->execute(array('imagem' => $imagem, 'id' => $id));

$conn = null;