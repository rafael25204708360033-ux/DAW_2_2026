<!DOCTYPE html>
<html>
<head>
    <title>Listar Alunos</title>
</head>
<body>
<h1>Lista de Alunos</h1>

<?php
if (file_exists("alunos.txt")) {
    $arqAlunos = fopen("alunos.txt", "r") or die("Erro ao abrir arquivo");
    $linha = fgets($arqAlunos); // Pula cabeçalho

    echo "<table border='1'>";
    echo "<tr><th>Matrícula</th><th>Nome</th><th>Email</th><th>Ações</th></tr>";

    while (!feof($arqAlunos)) {
        $linha = fgets($arqAlunos);
        if ($linha != "") {
            $colunaDados = explode(";", $linha);
            $matricula = $colunaDados[0];
            $nome = $colunaDados[1];
            $email = $colunaDados[2];

            echo "<tr>";
            echo "<td>" . $matricula . "</td>";
            echo "<td>" . $nome . "</td>";
            echo "<td>" . $email . "</td>";
            echo "<td>";
            
            // Botão Alterar
            echo "<form action='MostrarAlunoAlterado.php' method='POST' style='display:inline;'>";
            echo "<input type='hidden' name='matricula' value='" . $matricula . "'>";
            echo "<input type='submit' value='Alterar'>";
            echo "</form> ";

            // Botão Excluir
            echo "<form action='ConfirmacaoExclusaoAluno.php' method='POST' style='display:inline;'>";
            echo "<input type='hidden' name='matricula' value='" . $matricula . "'>";
            echo "<input type='submit' value='Excluir'>";
            echo "</form>";

            echo "</td>";
            echo "</tr>";
        }
    }
    echo "</table>";
    fclose($arqAlunos);
} else {
    echo "Nenhum aluno cadastrado!";
}
?>

<br>
</body>
</html>