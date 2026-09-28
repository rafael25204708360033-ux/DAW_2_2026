<!DOCTYPE html>
<html>
<head></head>
<body>
<h1>Consultar Pergunta por ID</h1>

<form action="ListarPerguntaEspecifica.php" method="GET">
    ID da Pergunta: <input type="text" name="ID">
    <input type="submit" value="Buscar">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $searchID = $_GET["ID"];

    if ($searchID != "" && file_exists("perguntas.txt")) {
        $arqPerg = fopen("perguntas.txt", "r");
        fgets($arqPerg); // Pula cabeçalho

        while (!feof($arqPerg)) {
            $linhaP = fgets($arqPerg);
            if ($linhaP != "") {
                $dadosP = explode(";", $linhaP);

                if ($dadosP[0] == $searchID) {
                    echo "<h3>ID: " . $dadosP[0] . " - Pergunta: " . $dadosP[1] . "</h3>";
                    echo "<ul>";

                    if (file_exists("respostas.txt")) {
                        $arqResp = fopen("respostas.txt", "r");
                        fgets($arqResp);

                        while (!feof($arqResp)) {
                            $linhaR = fgets($arqResp);
                            if ($linhaR != "") {
                                $dadosR = explode(";", $linhaR);
                                if ($dadosR[0] == $searchID) {
                                    echo "<li>Resposta " . $dadosR[1] . ": " . $dadosR[2] . "</li>";
                                }
                            }
                        }
                        fclose($arqResp);
                    }
                    echo "</ul>";
                }
            }
        }
        fclose($arqPerg);
    }
}
?>
</body>
</html>
