<?php

session_start();

if (!$_SESSION["login"]) {
    die("nao vai entrar!");
}

require 'conexao.php';

$id = $_POST['id'];
$dia = $_POST['dia'];
$titulo = $_POST['titulo'];
$texto = $_POST['texto'];

if (getimagesize($_FILES['imagem']['tmp_name'])) {

    $stmt = $conn->prepare('SELECT imagem FROM noticias 
    WHERE id = :id');

    $stmt->execute(array('id' => $id));

    foreach ($stmt as $row) {
        $imgAntiga = $row;
    }
    
    unlink("../img/img-noticias/".$imgAntiga);

    $imagem = $_FILES['imagem']['name'];
    $target_file = "../img/img-noticias/".$imagem;
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);
    
    $stmt = $conn->prepare('UPDATE noticias SET imagem = :imagem, dia = :dia, titulo = :titulo, texto = :texto 
    WHERE id = :id');
    $stmt->execute(array('imagem' => $imagem, 'dia' => $dia, 'titulo' => $titulo, 'texto' => $texto, 'id' => $id));
} else {
    $stmt = $conn->prepare('UPDATE noticias SET dia = :dia, titulo = :titulo, texto = :texto 
    WHERE id = :id');
    $stmt->execute(array('dia' => $dia, 'titulo' => $titulo, 'texto' => $texto, 'id' => $id));
}

$conn = null;