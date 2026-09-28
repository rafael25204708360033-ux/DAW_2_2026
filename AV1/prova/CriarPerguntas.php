
<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID = $_POST["ID"];
    $pergunta = $_POST["Pergunta"];

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

    $msg = "Deu bom!";
}
?>


<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Adicionar Nova Pergunta</h1>
<form action="CriarPerguntas.php" method="POST">
    ID: <input type="text" name="ID">
    <br><br>
    Pergunta: <input type="text" name="Pergunta">
    <br><br>
    <input type="submit" value="Adicionar Pergunta">
</form>

    <href="CriarRespostas.php">Criar Respostas</a>

<p><?php echo $msg; ?></p>
<br>
<ul>
</ul>
</body>
</html>
