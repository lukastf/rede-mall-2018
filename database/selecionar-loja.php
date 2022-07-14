<?php

require 'conexao.php';

$stmt = $conn->prepare('SELECT id, imagem, nome, descricao, telefone, categoria_id FROM lojas ORDER BY nome ASC');

$stmt->execute();

$i = 0;

foreach ($stmt as $row) {
    $lojas[$i] = $row;
    $i++;
}

$stmt = $conn->prepare('SELECT id, imagem, mobile FROM publicidades WHERE lugar = 3');

$stmt->execute();

foreach ($stmt as $row) {
    $publicidadePesquisaLoja = $row;
}