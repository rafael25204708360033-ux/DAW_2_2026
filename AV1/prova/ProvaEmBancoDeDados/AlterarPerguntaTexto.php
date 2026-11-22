<?php
$servidor = "localhost";
$usuario = "root";
$banco = "3daw";

$conn = new mysqli($servidor, $usuario, "", $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$ID = $_GET["ID"];
$novaPergunta = $_GET["Pergunta"];
$novaResposta = $_GET["Resposta"];
$retorno = false;

$sqlPerg = "UPDATE perguntas SET pergunta = '$novaPergunta' WHERE id = '$ID'";
$resultPerg = $conn->query($sqlPerg);

if ($resultPerg === true) {
    $sqlResp = "UPDATE respostas SET resposta = '$novaResposta' WHERE id_pergunta = '$ID' AND id_resposta = 1";
    $resultResp = $conn->query($sqlResp);

    if ($resultResp === true) {
        $retorno = true;
    }
}

$conn->close();
echo json_encode($retorno);
?>