<?php

session_start();

if (!$_SESSION["login"]) {
    die("nao vai entrar!");
}

require 'conexao.php';

$id = $_POST['id'];
$dia = $_POST['dia'];
$mobile = $_POST['mobile_ou_desktop'];
$lugar = $_POST['lugar'];

if (getimagesize($_FILES['imagem']['tmp_name'])) {

    $stmt = $conn->prepare('SELECT imagem FROM publicidades WHERE id = :id');

    $stmt->execute(array('id' => $id));

    foreach ($stmt as $row) {
        $imgAntiga = $row;
    }
    
    unlink("../img/img-publicidades/".$imgAntiga);

    $imagem = $_FILES['imagem']['name'];
    $target_file = "../img/img-publicidades/".$imagem;
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);
    
    $stmt = $conn->prepare('UPDATE publicidades SET imagem = :imagem, dia = :dia, mobile = :mobile, lugar = :lugar WHERE id = :id');
    $stmt->execute(array('imagem' => $imagem, 'dia' => $dia, 'mobile' => $mobile, 'lugar' => $lugar, 'id' => $id));
} else {
    $stmt = $conn->prepare('UPDATE publicidades SET dia = :dia, mobile = :mobile, lugar = :lugar WHERE id = :id');
    $stmt->execute(array('dia' => $dia, 'mobile' => $mobile, 'lugar' => $lugar, 'id' => $id));
}

$conn = null;