<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matricula = $_POST["matricula"];

    $arqAlunos = fopen("alunos.txt", "r") or die("Erro ao abrir arquivo");
    $arqAlunosNovo = fopen("alunos_temp.txt", "w") or die("Erro ao abrir arquivo temporário");

    $linha = fgets($arqAlunos); // Cabeçalho
    fwrite($arqAlunosNovo, $linha);

    while (!feof($arqAlunos)) {
        $linha = fgets($arqAlunos);
        if ($linha != "") {
            $colunaDados = explode(";", $linha);
            if ($colunaDados[0] == $matricula) {
                continue; // Pula a linha do aluno selecionado
            }
            fwrite($arqAlunosNovo, $linha);
        }
    }

    fclose($arqAlunos);
    fclose($arqAlunosNovo);

    rename("alunos_temp.txt", "alunos.txt");
    $msg = "Aluno excluído com sucesso!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Exclusão de Aluno</title>
</head>
<body>
<h1>Status da Exclusão</h1>
<p><?php echo $msg; ?></p>
<br>
<a href="ListarAlunos.php">Voltar para a Lista de Alunos</a>
</body>
</html>