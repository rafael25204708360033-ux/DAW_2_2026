<?php
$servidor = "localhost";
$usuario = "root";
$banco = "3daw";

$conn = new mysqli($servidor, $usuario, "", $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$sqlPerg = "SELECT id, pergunta FROM perguntas";
$resultPerg = $conn->query($sqlPerg);

$lista = array();

if ($resultPerg->num_rows > 0) {
    while ($rowP = $resultPerg->fetch_assoc()) {
        $idPerg = $rowP["id"];
        $respostas = array();

        $sqlResp = "SELECT id_resposta, resposta FROM respostas WHERE id_pergunta = '$idPerg'";
        $resultResp = $conn->query($sqlResp);

        if ($resultResp->num_rows > 0) {
            while ($rowR = $resultResp->fetch_assoc()) {
                $respostas[] = $rowR;
            }
        }

        $rowP["respostas"] = $respostas;
        $lista[] = $rowP;
    }
}

$conn->close();
echo json_encode($lista);
?>