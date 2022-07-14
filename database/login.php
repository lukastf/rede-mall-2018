<?php

session_start();

if($_SESSION["naonao"] == 1) {
    header('HTTP/1.1 501 Internal Server To dormindo');
    sleep(120);
    $_SESSION["tentativas"] = 0;
    $_SESSION["naonao"] = 0;
    die("deu errado :(");
}

if($_SESSION["tentativas"] >= 5) {
    $_SESSION["naonao"] = 1;
    header('HTTP/1.1 501 Internal Server To dormindo');
    die("deu errado :(");
}

require 'conexao.php';

$nome = $_POST['nome'];
$senha = $_POST['senha'];

$stmt = $conn->prepare('SELECT id, nome, senha FROM usuarios WHERE nome = :nome');

$stmt->execute(array('nome' => $nome));

foreach ($stmt as $row) {
    $usuario = $row;
}

$hash = $usuario["senha"];

$senhaCorreta = password_verify($senha, $hash);

if ($senhaCorreta){
    // remove all session variables
    session_unset();
    //ADD novas variaveis
    $_SESSION["login"] = true;
    $_SESSION["nome"] = $usuario["nome"];
}
else {
    $_SESSION["tentativas"]++;
    header('HTTP/1.1 500 Internal Server Login invalido');
    sleep(2);
}

$conn = null;