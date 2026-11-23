<?php
$servidor = "localhost";
$usuario = "root";
$banco = "3daw";

$conn = new mysqli($servidor, $usuario, "", $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$nome = $_GET["nome"];
$retorno = false;

$sql = "DELETE FROM disciplinas WHERE nome = '$nome'";
$result = $conn->query($sql);

if ($result === true) {
    $retorno = true;
} else {
    $retorno = false;
}

$conn->close();
echo json_encode($retorno);

?>