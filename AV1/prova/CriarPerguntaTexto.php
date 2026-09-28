<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID = $_POST["ID"];
    $pergunta = $_POST["Pergunta"];
    $respostaTexto = $_POST["Resposta"];

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

    // 2. Salva a Resposta de texto (IDResposta = 1)
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

    $msg = "Deu bom!";
}
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
<h1>Adicionar Pergunta e Resposta de Texto</h1>

<form action="CriarPerguntaTexto.php" method="POST">
    ID da Pergunta: <input type="text" name="ID"><br><br>
    Pergunta: <input type="text" name="Pergunta"><br><br>
    Resposta Esperada: <input type="text" name="Resposta"><br><br>

    <input type="submit" value="Salvar Pergunta">
</form>

<p><?php echo $msg; ?></p>
</body>
</html>
