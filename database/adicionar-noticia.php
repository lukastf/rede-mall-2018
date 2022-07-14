<?php

session_start();

if (!$_SESSION["login"]) {
    die("nao vai entrar!");
}

require 'conexao.php';

$imagem = $_FILES['imagem']['name'];
$dia = date("Y.m.d H.i.s");
$titulo = $_POST['titulo'];
$texto = $_POST['texto'];

$stmt = $conn->prepare('INSERT INTO noticias (imagem, dia, titulo, texto) 
VALUES (:imagem, :dia, :titulo, :texto )');

$stmt->execute(array('imagem' => $imagem, 'dia' => $dia, 'titulo' => $titulo, 'texto' => $texto));

$target_dir = "../img/img-noticias/";
$target_file = $target_dir . $_FILES["imagem"]["name"];

move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);

$conn = null;