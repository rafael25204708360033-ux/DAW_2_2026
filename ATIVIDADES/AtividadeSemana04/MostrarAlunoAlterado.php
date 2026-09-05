<?php
$matricula = $_POST["matricula"];
$nome = "";
$email = "";

if (file_exists("alunos.txt")) {
    $arqAlunos = fopen("alunos.txt", "r") or die("Erro ao abrir arquivo");
    $linha = fgets($arqAlunos); // Pula cabeçalho

    while (!feof($arqAlunos)) {
        $linha = fgets($arqAlunos);
        if ($linha != "") {
            $colunaDados = explode(";", $linha);
            if ($colunaDados[0] == $matricula) {
                $nome = $colunaDados[1];
                $email = $colunaDados[2];
                break;
            }
        }
    }
    fclose($arqAlunos);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Alterar Aluno</title>
</head>
<body>
<h1>Alterar Dados do Aluno</h1>

<form action="AlterarAluno.php" method="POST">
    Matrícula: <input type="text" name="matricula" value="<?php echo $matricula; ?>" readonly>
    <br><br>
    Nome: <input type="text" name="nome" value="<?php echo $nome; ?>">
    <br><br>
    Email: <input type="text" name="email" value="<?php echo $email; ?>">
    <br><br>
    <input type="submit" value="Salvar Alterações">
</form>

<br>
<a href="ListarAlunos.php">Voltar para a Lista</a>
</body>
</html>
