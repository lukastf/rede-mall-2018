<?php

session_start();

if (!$_SESSION["login"]) {
    die("nao vai entrar!");
}


function inserirPublicidades($imagem, $dia, $mobile, $lugar, $link) {
    require 'conexao.php';

    $stmt = $conn->prepare('INSERT INTO publicidades (imagem, dia, mobile, lugar, link)
    VALUES (:imagem, :dia, :mobile, :lugar, :link)');

    $stmt->execute(array('imagem' => $imagem, 'dia' => $dia, 'mobile' => $mobile, 'lugar' => $lugar, 'link' => $link));

    $target_dir = "../img/img-publicidades/";

    if ($mobile == 1) {
        $target_file = $target_dir . $_FILES["imagem-mobile"]["name"];
        move_uploaded_file($_FILES["imagem-mobile"]["tmp_name"], $target_file);
    }
    else if ($mobile == 2) {
        $target_file = $target_dir . $_FILES["imagem-desktop"]["name"];
        move_uploaded_file($_FILES["imagem-desktop"]["tmp_name"], $target_file);
    }
}

function inserirBanner ($imagem, $dia, $mobile) {
    require 'conexao.php';

    $stmt = $conn->prepare('INSERT INTO banner (imagem, dia, mobile)
    VALUES (:imagem, :dia, :mobile)');

    $stmt->execute(array('imagem' => $imagem, 'dia' => $dia, 'mobile' => $mobile));

    $target_dir = "../img/img-banner/";

    if ($mobile == 1) {
        $target_file = $target_dir . $_FILES["imagem-mobile"]["name"];
        move_uploaded_file($_FILES["imagem-mobile"]["tmp_name"], $target_file);
    }
    else if ($mobile == 2) {
        $target_file = $target_dir . $_FILES["imagem-desktop"]["name"];
        move_uploaded_file($_FILES["imagem-desktop"]["tmp_name"], $target_file);
    }

    $conn = null;
}

$link = $_POST['link'] ? $_POST['link'] : "";
$dia = date("Y.m.d H.i.s");
//$mobile = $_POST['mobile_ou_desktop'];
$lugar = $_POST['lugar'];


if (getimagesize($_FILES['imagem-mobile']['tmp_name']) != false && getimagesize($_FILES['imagem-desktop']['tmp_name']) != false) {
    
    $imagemMobile = $_FILES['imagem-mobile']['name'];
    $imagemDesktop = $_FILES['imagem-desktop']['name'];

    if ($lugar == -1) {
        inserirBanner($imagemMobile, $dia, 1);
        inserirBanner($imagemDesktop, $dia, 2);
        die("e morreu");
    }

    inserirPublicidades($imagemMobile, $dia, 1, $lugar, $link);
    inserirPublicidades($imagemDesktop, $dia, 2, $lugar, $link);
}
else if (getimagesize($_FILES['imagem-mobile']['tmp_name']) != false) {

    $imagemMobile = $_FILES['imagem-mobile']['name'];

    if ($lugar == -1) {
        inserirBanner($imagemMobile, $dia, 1);
        die("e morreu");
    }

    inserirPublicidades($imagemMobile, $dia, 1, $lugar, $link);
}
else if (getimagesize($_FILES['imagem-desktop']['tmp_name']) != false) {

    $imagemDesktop = $_FILES['imagem-desktop']['name'];

    if ($lugar == -1) {
        inserirBanner($imagemDesktop, $dia, 2);
        die("e morreu");
    }

    inserirPublicidades($imagemDesktop, $dia, 2, $lugar, $link);
}
else if ($link != "") {
    $imagem = $_POST['link'];

    if ($lugar != 0) {
        $lugar = 0;
    }

    if (strpos($link, 'youtube') !== false) {
        $link = end(explode("=", $link));

        inserirPublicidades($imagem, $dia, 0, $lugar, $link);
    }
    else if (strpos($link, 'facebook') !== false) {
        $link = end(explode(".", $link));
        $link = str_replace("/","%2F", $link);

        inserirPublicidades($imagem, $dia, 0, $lugar, $link);
    }
    else {
        $conn = null;
        die("e morreu");
    }
}

$conn = null;