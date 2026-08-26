<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Listar Disciplinas</h1>

<?php
if (file_exists("disciplinas.txt")) {
    $arqDisc = fopen("disciplinas.txt", "r") or die("Erro ao abrir arquivo");
    $linha = fgets($arqDisc);

    echo "<table border='1'>";
    echo "<tr><th>Nome</th><th>Sigla</th><th>Horas</th></tr>";

    while (!feof($arqDisc)) {
        $linha = fgets($arqDisc);
        if ($linha != "") {
            $colunaDados = explode(";", $linha);
            echo "<tr>";
            echo "<td>" . $colunaDados[0] . "</td>";
            echo "<td>" . $colunaDados[1] . "</td>";
            echo "<td>" . $colunaDados[2] . "</td>";
            echo "</tr>";
        }
    }
    echo "</table>";
    fclose($arqDisc);
} else {
    echo "Arquivo nao existe!";
}
?>

<br>
<ul>
    <li><a href="CriarDisc.php">Incluir Disciplina</a></li>
    <li><a href="AlterarDisc.php">Alterar Disciplina</a></li>
    <li><a href="ExcluirDisc.php">Excluir Disciplina</a></li>
</ul>
</body>
</html>