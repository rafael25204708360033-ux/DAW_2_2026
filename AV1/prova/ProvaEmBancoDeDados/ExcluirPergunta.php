<?php
$servidor = "localhost";
$usuario = "root";
$banco = "3daw";

$conn = new mysqli($servidor, $usuario, "", $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$ID = $_GET["ID"];
$retorno = false;

$sqlResp = "DELETE FROM respostas WHERE id_pergunta = '$ID'"; // tabela 1
$resultResp = $conn->query($sqlResp);

if ($resultResp === true) {
    $sqlPerg = "DELETE FROM perguntas WHERE id = '$ID'"; //tabel 2
    $resultPerg = $conn->query($sqlPerg);

    if ($resultPerg === true && $conn->affected_rows > 0) {
        $retorno = true;
    }
}

$conn->close();
echo json_encode($retorno);
?>