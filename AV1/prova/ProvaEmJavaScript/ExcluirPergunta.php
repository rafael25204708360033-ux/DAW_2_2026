<?php
$ID = $_GET["ID"];

// 1. Remove de perguntas.txt
if (file_exists("perguntas.txt")) {
    $arqAntigo = fopen("perguntas.txt", "r");
    $arqNovo = fopen("perguntas_temp.txt", "w");

    while (!feof($arqAntigo)) {
        $linha = fgets($arqAntigo);
        if ($linha != "") {
            $dados = explode(";", $linha);
            if ($dados[0] != $ID) {
                fwrite($arqNovo, $linha);
            }
        }
    }
    fclose($arqAntigo);
    fclose($arqNovo);

    unlink("perguntas.txt");
    rename("perguntas_temp.txt", "perguntas.txt");
}

// 2. Remove as alternativas vinculadas a esse ID
if (file_exists("respostas.txt")) {
    $arqAntigo = fopen("respostas.txt", "r");
    $arqNovo = fopen("respostas_temp.txt", "w");

    while (!feof($arqAntigo)) {
        $linha = fgets($arqAntigo);
        if ($linha != "") {
            $dados = explode(";", $linha);
            if ($dados[0] != $ID) {
                fwrite($arqNovo, $linha);
            }
        }
    }
    fclose($arqAntigo);
    fclose($arqNovo);

    unlink("respostas.txt");
    rename("respostas_temp.txt", "respostas.txt");
}

echo "<p>Deu bom!</p>";
?>