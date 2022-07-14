<?php

require 'conexao.php';

$stmt = $conn->prepare('SELECT id, imagem, dia, mobile, lugar, link FROM publicidades ORDER BY dia DESC');

$stmt->execute();

$i = 0;

foreach ($stmt as $row) {
    $publicidades[$i] = $row;
    $i++;
}