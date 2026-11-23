<?php
$servidor = "localhost";
$usuario = "root";
$banco = "3daw";

$conn = new mysqli($servidor, $usuario, "", $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$nome = $_GET["nome"];

$sql = "SELECT nome, sigla, cg FROM disciplinas WHERE nome = '$nome'";
$result = $conn->query($sql);

$disciplina = null;
if ($result->num_rows > 0) {
    $disciplina = $result->fetch_assoc();
}

$conn->close();
echo json_encode($disciplina);
?>
