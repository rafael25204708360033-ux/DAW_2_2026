<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $arqAlunos = fopen("alunos.txt", "r") or die("Erro ao abrir arquivo");
    $arqAlunosNovo = fopen("alunos_temp.txt", "w") or die("Erro ao abrir arquivo temporário");

    $linha = fgets($arqAlunos); // Cabeçalho
    fwrite($arqAlunosNovo, $linha);

    while (!feof($arqAlunos)) {
        $linha = fgets($arqAlunos);
        if ($linha != "") {
            $colunaDados = explode(";", $linha);
            if ($colunaDados[0] == $matricula) {
                $linha = $matricula . ";" . $nome . ";" . $email . "\n";
            }
            fwrite($arqAlunosNovo, $linha);
        }
    }

    fclose($arqAlunos);
    fclose($arqAlunosNovo);

    rename("alunos_temp.txt", "alunos.txt");
    $msg = "Aluno alterado com sucesso!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Alteração Concluída</title>
</head>
<body>
<h1>Status da Alteração</h1>
<p><?php echo $msg; ?></p>
<br>
<a href="ListarAlunos.php">Voltar para a Lista de Alunos</a>
</body>
</html>