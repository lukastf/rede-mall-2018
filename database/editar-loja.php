<?php

session_start();

if (!$_SESSION["login"]) {
    die("nao vai entrar!");
}

require 'conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$descricao = $_POST['descricao'];

if (getimagesize($_FILES['imagem']['tmp_name'])) {

    $stmt = $conn->prepare('SELECT imagem FROM lojas 
    WHERE id = :id');

    $stmt->execute(array('id' => $id));

    foreach ($stmt as $row) {
        $imgAntiga = $row;
    }
    
    unlink("../img/img-lojas/".$imgAntiga);

    $imagem = $_FILES['imagem']['name'];
    $target_file = "../img/img-lojas/".$imagem;
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);
    
    $stmt = $conn->prepare('UPDATE lojas SET imagem = :imagem, nome = :nome, descricao = :descricao, telefone = :telefone
    WHERE id = :id');
    $stmt->execute(array('imagem' => $imagem, 'nome' => $nome, 'descricao' => $descricao, 'telefone' => $telefone, 'id' => $id));
} else {
    $stmt = $conn->prepare('UPDATE lojas SET nome = :nome, descricao = :descricao, telefone = :telefone
    WHERE id = :id');
    $stmt->execute(array('nome' => $nome, 'descricao' => $descricao, 'telefone' => $telefone,'id' => $id));
}

$conn = null;