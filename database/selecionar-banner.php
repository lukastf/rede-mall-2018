<?php

function selecionarBanner($sql) {
    require 'conexao.php';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $i = 0;
    $banner = [];

    foreach ($stmt as $row) {
        $banner[$i] = $row;
        $i++;
    }

    return $banner;
}

require 'conexao.php';

$stmt = $conn->prepare('SELECT id, imagem, dia, mobile FROM banner ORDER BY dia DESC');
$stmt->execute();

$i = 0;
$banner = [];

foreach ($stmt as $row) {
    $banner[$i] = $row;
    $i++;
}