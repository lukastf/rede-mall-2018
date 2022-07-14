<?php

/*$stmt = $conn->prepare('SELECT imagem FROM publicidades ORDER BY RAND() LIMIT 2');
$stmt->execute();

$posicaoPublicidade = 0;
$publicidade = [];

foreach ($stmt as $row) {
    $publicidade[$posicaoPublicidade] = $row;
    $posicaoPublicidade++;
}*/

//INICIO

function selecionarPublicidadeRandomica ($sql) {
    require 'conexao.php';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    $posicaoPublicidade = 0;
    $publicidade = [];
    
    foreach ($stmt as $row) {
        $publicidade[$posicaoPublicidade] = $row;
        $posicaoPublicidade++;
    }

    return $publicidade;
}


