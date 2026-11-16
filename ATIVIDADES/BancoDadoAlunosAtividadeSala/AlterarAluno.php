<?php
$servidor = "localhost";
$usuario = "root";
$banco = "3daw";

$conn = new mysqli($servidor, $usuario, "", $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$matricula = $_GET["matricula"];
$nome = $_GET["nome"];
$email = $_GET["email"];
$retorno = false;

$sql = "UPDATE alunos SET nome = '$nome', email = '$email' WHERE matricula = '$matricula'";
$result = $conn->query($sql);

if ($result === true && $conn->affected_rows > 0) {
    $retorno = true;
} else {
    $retorno = false;
}

$conn->close();
echo $retorno ? "true" : "false";
?>
