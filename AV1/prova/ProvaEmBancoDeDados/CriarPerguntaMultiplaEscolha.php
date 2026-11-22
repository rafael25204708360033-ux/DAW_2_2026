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
$retorno = false;

$sqlPerg = "INSERT INTO perguntas (id, pergunta) VALUES ('$ID', '$pergunta')";
$resultPerg = $conn->query($sqlPerg);

if ($resultPerg === true) {
    $retorno = true;
    for ($i = 1; $i <= 4; $i = $i + 1) {
        $nomeCampo = "resposta_" . $i;
        $textoResposta = $_GET[$nomeCampo];

        $sqlResp = "INSERT INTO respostas (id_pergunta, id_resposta, resposta) VALUES ('$ID', $i, '$textoResposta')";
        $resultResp = $conn->query($sqlResp);

        if ($resultResp !== true) {
            $retorno = false;
        }
    }
}

$conn->close();
echo json_encode($retorno);
?>