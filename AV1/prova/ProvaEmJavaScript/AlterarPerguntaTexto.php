<?php
$ID = $_GET["ID"];
$novaPergunta = $_GET["Pergunta"];
$novaResposta = $_GET["Resposta"];

if (file_exists("perguntas.txt")) {
    $arqAntigo = fopen("perguntas.txt", "r");
    $arqNovo = fopen("perguntas_temp.txt", "w");

    while (!feof($arqAntigo)) {
        $linha = fgets($arqAntigo);
        if ($linha != "") {
            $dados = explode(";", $linha);
            if ($dados[0] == $ID) {
                $linha = $ID . ";" . $novaPergunta . "\n";
            }
            fwrite($arqNovo, $linha);
        }
    }
    fclose($arqAntigo);
    fclose($arqNovo);

    unlink("perguntas.txt");
    rename("perguntas_temp.txt", "perguntas.txt");
}

if (file_exists("respostas.txt")) {
    $arqAntigo = fopen("respostas.txt", "r");
    $arqNovo = fopen("respostas_temp.txt", "w");

    while (!feof($arqAntigo)) {
        $linha = fgets($arqAntigo);
        if ($linha != "") {
            $dados = explode(";", $linha);
            if ($dados[0] == $ID) {
                $linha = $ID . ";1;" . $novaResposta . "\n";
            }
            fwrite($arqNovo, $linha);
        }
    }
    fclose($arqAntigo);
    fclose($arqNovo);

    unlink("respostas.txt");
    rename("respostas_temp.txt", "respostas.txt");
}

echo "<p>Deu bom!</p>";
?>