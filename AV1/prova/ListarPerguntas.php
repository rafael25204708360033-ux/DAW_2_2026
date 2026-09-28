<!DOCTYPE html>
<html>
<head></head>
<body>
<h1>Lista de Todas as Perguntas e Respostas</h1>

<?php
if (file_exists("perguntas.txt")) {
    $arqPerg = fopen("perguntas.txt", "r");
    fgets($arqPerg); // Pula cabeçalho

    while (!feof($arqPerg)) {
        $linhaP = fgets($arqPerg);
        
        if ($linhaP != "") {
            $dadosP = explode(";", $linhaP);
            $IDPergunta = $dadosP[0];
            $textoPergunta = $dadosP[1];

            echo "<h3>ID: " . $IDPergunta . " - Pergunta: " . $textoPergunta . "</h3>";
            echo "<ul>";

            if (file_exists("respostas.txt")) {
                $arqResp = fopen("respostas.txt", "r");
                fgets($arqResp); // Pula cabeçalho

                while (!feof($arqResp)) {
                    $linhaR = fgets($arqResp);
                    if ($linhaR != "") {
                        $dadosR = explode(";", $linhaR);
                        $IDPerguntaResp = $dadosR[0];
                        $IDResposta = $dadosR[1];
                        $textoResposta = $dadosR[2];

                        // Compara se o ID da pergunta em respostas.txt é o mesmo de perguntas.txt
                        if ($IDPerguntaResp == $IDPergunta) {
                            echo "<li>Resposta " . $IDResposta . ": " . $textoResposta . "</li>";
                        }
                    }
                }
                fclose($arqResp);
            }

            echo "</ul><br>";
        }
    }
    fclose($arqPerg);
}
?>
</body>
</html>
