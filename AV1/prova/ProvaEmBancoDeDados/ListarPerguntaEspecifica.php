<?php
$servidor = "localhost";
$usuario = "root";
$banco = "3daw";

$conn = new mysqli($servidor, $usuario, "", $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$searchID = $_GET["ID"];
$item = null;

if ($searchID != "") {
    $sqlPerg = "SELECT id, pergunta FROM perguntas WHERE id = '$searchID'";
    $resultPerg = $conn->query($sqlPerg);

    if ($resultPerg->num_rows > 0) {
        $item = $resultPerg->fetch_assoc();
        $respostas = array();

        $sqlResp = "SELECT id_resposta, resposta FROM respostas WHERE id_pergunta = '$searchID'";
        $resultResp = $conn->query($sqlResp);

        if ($resultResp->num_rows > 0) {
            while ($rowR = $resultResp->fetch_assoc()) {
                $respostas[] = $rowR;
            }
        }

        $item["respostas"] = $respostas;
    }
}

$conn->close();
echo json_encode($item);
?>