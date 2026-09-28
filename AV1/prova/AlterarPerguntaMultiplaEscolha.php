<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID = $_POST["ID"];
    $novaPergunta = $_POST["Pergunta"];

    // 1. Atualiza a Pergunta em perguntas.txt
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

    // 2. Atualiza as Respostas em respostas.txt
    if (file_exists("respostas.txt")) {
        $arqAntigo = fopen("respostas.txt", "r");
        $arqNovo = fopen("respostas_temp.txt", "w");

        while (!feof($arqAntigo)) {
            $linha = fgets($arqAntigo);
            if ($linha != "") {
                $dados = explode(";", $linha);
                $IDPerguntaArquivo = $dados[0];
                $IDRespostaArquivo = $dados[1];

                // Se for a pergunta que queremos alterar, atualiza conforme o IDResposta
                if ($IDPerguntaArquivo == $ID) {
                    $nomeCampo = "resposta_" . $IDRespostaArquivo;
                    $novaRespTexto = $_POST[$nomeCampo];
                    $linha = $ID . ";" . $IDRespostaArquivo . ";" . $novaRespTexto . "\n";
                }
                fwrite($arqNovo, $linha);
            }
        }
        fclose($arqAntigo);
        fclose($arqNovo);

        unlink("respostas.txt");
        rename("respostas_temp.txt", "respostas.txt");
    }

    $msg = "Deu bom!";
}
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
<h1>Alterar Pergunta e Respostas (Múltipla Escolha)</h1>

<form action="AlterarPerguntaMultiplaEscolha.php" method="POST">
    ID da Pergunta: <input type="text" name="ID"><br><br>
    Nova Pergunta: <input type="text" name="Pergunta"><br><br>
    
    Nova Resposta 1: <input type="text" name="resposta_1"><br><br>
    Nova Resposta 2: <input type="text" name="resposta_2"><br><br>
    Nova Resposta 3: <input type="text" name="resposta_3"><br><br>
    Nova Resposta 4: <input type="text" name="resposta_4"><br><br>

    <input type="submit" value="Alterar Tudo">
</form>

<p><?php echo $msg; ?></p>
</body>
</html>
