<?php
$servidor = "localhost";
$usuario = "root";
$banco = "3daw";

$conn = new mysqli($servidor, $usuario, "", $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$nome = $_GET["nome"];
$email = $_GET["email"];
$senha = $_GET["senha"];
$retorno = false;

$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
$result = $conn->query($sql);

if ($result === true) {
    $retorno = true;
} else {
    $retorno = false;
}

$conn->close();
echo json_encode($retorno);
?>