<?php

require 'conexao.php';

$stmt = $conn->prepare('SELECT id, imagem, dia, titulo, texto FROM noticias ORDER BY dia DESC');

$stmt->execute();

$i = 0;

foreach ($stmt as $row) {
    $noticia[$i] = $row;
    $i++;
}