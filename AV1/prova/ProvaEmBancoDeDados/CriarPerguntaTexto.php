<?php
$servidor = "localhost";
$usuario = "root";
$banco = "3daw";

$conn = new mysqli($servidor, $usuario, "", $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$ID = $_GET["ID"];
$pergunta = $_GET["Pergunta"];
$respostaTexto = $_GET["Resposta"];
$retorno = false;

$sqlPerg = "INSERT INTO perguntas (id, pergunta) VALUES ('$ID', '$pergunta')";
$resultPerg = $conn->query($sqlPerg);

if ($resultPerg === true) {
    $sqlResp = "INSERT INTO respostas (id_pergunta, id_resposta, resposta) VALUES ('$ID', 1, '$respostaTexto')";
    $resultResp = $conn->query($sqlResp);

    if ($resultResp === true) {
        $retorno = true;
    }
}

$conn->close();
echo json_encode($retorno);
?>