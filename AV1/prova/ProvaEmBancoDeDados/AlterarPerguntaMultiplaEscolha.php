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
$retorno = false;

$sqlPerg = "UPDATE perguntas SET pergunta = '$novaPergunta' WHERE id = '$ID'";
$resultPerg = $conn->query($sqlPerg);

if ($resultPerg === true) {
    $retorno = true;
    for ($i = 1; $i <= 4; $i = $i + 1) {
        $nomeCampo = "resposta_" . $i;
        $novaRespTexto = $_GET[$nomeCampo];

        $sqlResp = "UPDATE respostas SET resposta = '$novaRespTexto' WHERE id_pergunta = '$ID' AND id_resposta = $i";
        $resultResp = $conn->query($sqlResp);

        if ($resultResp !== true) {
            $retorno = false;
        }
    }
}

$conn->close();
echo json_encode($retorno);
?>