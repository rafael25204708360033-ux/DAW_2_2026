<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $IDPERGUNTA = $_POST["ID"];
    $ID = $_POST["IDResposta"];
    $resposta = $_POST["Resposta"];

    if (!file_exists("respostas.txt")) {
        $arqResp = fopen("respostas.txt", "w") or die("Erro ao criar arquivo");
        $linha = "ID;IDResposta;Resposta\n";
        fwrite($arqResp, $linha);
        fclose($arqResp);
    }

    $arqResp = fopen("respostas.txt", "a") or die("Erro ao abrir arquivo");
    $linha = $IDPERGUNTA . ";" . $ID . ";" . $resposta . "\n";
    fwrite($arqResp, $linha);
    fclose($arqResp);

    $msg = "Deu bom!";
}
?>


<!DOCTYPE html>
<html>
<head>
</head>
<body>

<h1>Adicionar Resposta a uma pergunta existente</h1>

<form action="CriarRespostas.php" method="POST">
    ID da Questão: <input type="text" name="ID">
    <br><br>
    Numero da Pergunta: <input type="text" name="IDResposta">
    <br><br>
    Resposta: <input type="text" name="Resposta">
    <br><br>
    <input type="submit" value="Adicionar Resposta">
</form>

    <a href="CriarPerguntas.php">Criar Perguntas</a>

<p><?php echo $msg; ?></p>
<br>
<ul>
</ul>
</body>
</html>
