<?php

require 'conexao.php';

$stmt = $conn->prepare('SELECT id, categoria FROM categorias ORDER BY id');

$stmt->execute();

$i = 0;

foreach ($stmt as $row) {
    $categorias[$i] = $row;
    $i++;
}