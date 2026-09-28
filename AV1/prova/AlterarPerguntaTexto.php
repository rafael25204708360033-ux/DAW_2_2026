<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID = $_POST["ID"];
    $novaPergunta = $_POST["Pergunta"];
    $novaResposta = $_POST["Resposta"];

    // 1. Atualiza Pergunta
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

    // 2. Atualiza Resposta
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

    $msg = "Deu bom!";
}
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
<h1>Alterar Pergunta de Texto</h1>

<form action="AlterarPerguntaTXT.php" method="POST">
    ID da Pergunta: <input type="text" name="ID"><br><br>
    Nova Pergunta: <input type="text" name="Pergunta"><br><br>
    Nova Resposta: <input type="text" name="Resposta"><br><br>

    <input type="submit" value="Alterar">
</form>

<p><?php echo $msg; ?></p>
</body>
</html>
