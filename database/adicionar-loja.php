<?php

session_start();

if (!$_SESSION["login"]) {
    die("nao vai entrar!");
}

require 'conexao.php';

$imagem = $_FILES['imagem']['name'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$telefone = $_POST['telefone'];
$categoria_id = $_POST['categoria_id'];

$stmt = $conn->prepare('INSERT INTO lojas (imagem, nome, descricao, telefone, categoria_id)
VALUES (:imagem, :nome, :descricao, :telefone, :categoria_id)');

$stmt->execute(array('imagem' => $imagem, 'nome' => $nome, 'descricao' => $descricao, 'telefone' => $telefone, 'categoria_id' => $categoria_id));

$target_dir = "../img/img-lojas/";
$target_file = $target_dir . $_FILES["imagem"]["name"];

move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);


$conn = null;