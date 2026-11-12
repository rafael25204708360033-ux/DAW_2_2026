<?php
$ID = $_GET["ID"];
$pergunta = $_GET["Pergunta"];

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

for ($i = 1; $i <= 4; $i = $i + 1) {
    $nomeCampo = "resposta_" . $i;
    $textoResposta = $_GET[$nomeCampo];
    $IDResposta = $i;

    $linha = $ID . ";" . $IDResposta . ";" . $textoResposta . "\n";
    fwrite($arqResp, $linha);
}
fclose($arqResp);

echo "<p>Deu bom!</p>";
?>