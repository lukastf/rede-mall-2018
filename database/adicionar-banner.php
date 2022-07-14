<?php

session_start();

if (!$_SESSION["login"]) {
    die("nao vai entrar!");
}

require 'conexao.php';

$imagem = $_FILES['imagem']['name'];

$mobile = $_POST['mobile_ou_desktop'];

$dia = date("Y.m.d H.i.s");

$stmt = $conn->prepare('INSERT INTO banner (imagem, dia, mobile)
VALUES (:imagem, :dia, :mobile)');

$stmt->execute(array('imagem' => $imagem, 'dia' => $dia, 'mobile' => $mobile));

$target_dir = "../img/img-banner/";
$target_file = $target_dir . $_FILES["imagem"]["name"];

move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);


$conn = null;