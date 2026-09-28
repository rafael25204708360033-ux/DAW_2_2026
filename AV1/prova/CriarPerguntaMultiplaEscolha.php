<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID = $_POST["ID"];
    $pergunta = $_POST["Pergunta"];

    // 1. Salva a Pergunta
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

    // 2. Salva as 4 Respostas associadas ao mesmo ID da pergunta
    if (!file_exists("respostas.txt")) {
        $arqResp = fopen("respostas.txt", "w") or die("Erro ao criar arquivo");
        $linha = "ID;IDResposta;Resposta\n";
        fwrite($arqResp, $linha);
        fclose($arqResp);
    }

    $arqResp = fopen("respostas.txt", "a") or die("Erro ao abrir arquivo");

    for ($i = 1; $i <= 4; $i = $i + 1) {
        $nomeCampo = "resposta_" . $i;
        $textoResposta = $_POST[$nomeCampo];
        $IDResposta = $i; // IDResposta é o número da alternativa (1, 2, 3 ou 4)

        $linha = $ID . ";" . $IDResposta . ";" . $textoResposta . "\n";
        fwrite($arqResp, $linha);
    }
    fclose($arqResp);

    $msg = "Deu bom!";
}
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
<h1>Adicionar Pergunta e Respostas (Múltipla Escolha)</h1>

<form action="CriarPerguntaMultiplaEscolha.php" method="POST">
    ID da Pergunta: <input type="text" name="ID"><br><br>
    Pergunta: <input type="text" name="Pergunta"><br><br>
    
    <h3>Respostas:</h3>
    Resposta 1: <input type="text" name="resposta_1"><br><br>
    Resposta 2: <input type="text" name="resposta_2"><br><br>
    Resposta 3: <input type="text" name="resposta_3"><br><br>
    Resposta 4: <input type="text" name="resposta_4"><br><br>

    <input type="submit" value="Salvar Tudo">
</form>

<p><?php echo $msg; ?></p>
</body>
</html>
