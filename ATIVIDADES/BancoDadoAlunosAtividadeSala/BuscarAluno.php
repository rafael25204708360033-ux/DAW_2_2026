<?php
$servidor = "localhost";
$usuario = "root";
$banco = "3daw";

$conn = new mysqli($servidor, $usuario, "", $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$matricula = $_GET["matricula"];

$sql = "SELECT matricula, nome, email FROM alunos WHERE matricula = '$matricula'";
$result = $conn->query($sql);

$aluno = null;
if ($result->num_rows > 0) {
    $aluno = $result->fetch_assoc();
}

$conn->close();
echo json_encode($aluno);
?>
