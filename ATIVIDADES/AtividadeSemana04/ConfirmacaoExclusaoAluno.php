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
    <title>Confirmar Exclusão</title>
</head>
<body>
<h1>Confirmação de Exclusão</h1>
<p>Tem certeza de que deseja excluir o seguinte aluno?</p>

<ul>
    <li><strong>Matrícula:</strong> <?php echo $matricula; ?></li>
    <li><strong>Nome:</strong> <?php echo $nome; ?></li>
    <li><strong>Email:</strong> <?php echo $email; ?></li>
</ul>

<form action="ExcluirAluno.php" method="POST">
    <input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
    <input type="submit" value="Sim, Excluir Aluno">
</form>

<br>
<a href="ListarAlunos.php">Cancelar e Voltar</a>
</body>
</html>
