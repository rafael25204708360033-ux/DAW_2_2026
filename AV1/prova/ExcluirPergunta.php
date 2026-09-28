<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID = $_POST["ID"];

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

    // 2. Remove de respostas.txt todas as alternativas vinculadas a esse ID
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

    $msg = "Deu bom!";
}
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
<h1>Excluir Pergunta e Respostas</h1>

<form action="ExcluirPergunta.php" method="POST">
    ID da Pergunta a excluir: <input type="text" name="ID"><br><br>
    <input type="submit" value="Excluir Pergunta">
</form>

<p><?php echo $msg; ?></p>
</body>
</html>
