<?php

session_start();

if (!$_SESSION["login"]) {
    die("nao vai entrar!");
}

require 'conexao.php';

$id = $_POST['id'];
$dia = $_POST['dia'];
$mobile = $_POST['mobile_ou_desktop'];

if (getimagesize($_FILES['imagem']['tmp_name'])) {

    $stmt = $conn->prepare('SELECT imagem FROM banner WHERE id = :id');

    $stmt->execute(array('id' => $id));

    foreach ($stmt as $row) {
        $imgAntiga = $row;
    }
    
    unlink("../img/img-banner/".$imgAntiga);

    $imagem = $_FILES['imagem']['name'];
    $target_file = "../img/img-banner/".$imagem;
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);
    
    $stmt = $conn->prepare('UPDATE banner SET imagem = :imagem, dia = :dia, mobile = :mobile WHERE id = :id');
    $stmt->execute(array('imagem' => $imagem, 'dia' => $dia, 'mobile' => $mobile, 'id' => $id));
} else {
    $stmt = $conn->prepare('UPDATE banner SET dia = :dia, mobile = :mobile WHERE id = :id');
    $stmt->execute(array('dia' => $dia, 'mobile' => $mobile, 'id' => $id));
}

$conn = null;