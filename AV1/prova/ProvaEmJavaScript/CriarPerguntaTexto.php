<?php
$ID = $_GET["ID"];
$pergunta = $_GET["Pergunta"];
$respostaTexto = $_GET["Resposta"];

if (!file_exists("perguntas.txt")) {
    $arqPerg = fopen("perguntas.txt", "w") or die("Erro ao criar arquivo");
    $linha = "ID;Pergunta\n";
    fwrite($arqPerg, $linha);
    fclose($arqPerg);
}

$arqPerg = fopen("perguntas.txt", "a") or die("Erro ao abrir arquivo");
$linha = $ID . ";" . $pergunta . "\n";
fwrite($arqPerg, $linha);
fclose($arqPerg);

if (!file_exists("respostas.txt")) {
    $arqResp = fopen("respostas.txt", "w") or die("Erro ao criar arquivo");
    $linha = "ID;IDResposta;Resposta\n";
    fwrite($arqResp, $linha);
    fclose($arqResp);
}

$arqResp = fopen("respostas.txt", "a") or die("Erro ao abrir arquivo");
$IDResposta = 1;
$linha = $ID . ";" . $IDResposta . ";" . $respostaTexto . "\n";
fwrite($arqResp, $linha);
fclose($arqResp);

echo "<p>Deu bom!</p>";
?>