<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sigla = $_POST["sigla"];

    $arqDisc = fopen("disciplinas.txt", "r") or die("erro ao abrir arquivo");
    $arqDiscNovo = fopen("disciplinas_temp.txt", "w") or die("erro ao abrir arquivo");

    $linha = fgets($arqDisc);
    fwrite($arqDiscNovo, $linha);

    while (!feof($arqDisc)) {
        $linha = fgets($arqDisc);
        if ($linha != "") {
            $colunaDados = explode(";", $linha);
            if ($colunaDados[1] == $sigla) {
                continue;
            }
            fwrite($arqDiscNovo, $linha);
        }
    }

    fclose($arqDisc);
    fclose($arqDiscNovo);

    rename("disciplinas_temp.txt", "disciplinas.txt");
    $msg = "Excluido com sucesso!";
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Excluir Disciplina</h1>
<form action="ExcluirDisc.php" method="POST">
    Sigla da disciplina a excluir: <input type="text" name="sigla">
    <br><br>
    <input type="submit" value="Excluir Disciplina">
</form>

<p><?php echo $msg; ?></p>
<br>
<ul>
    <li><a href="CriarDisc.php">Incluir Disciplina</a></li>
    <li><a href="ListarDisc.php">Listar Disciplinas</a></li>
    <li><a href="AlterarDisc.php">Alterar Disciplina</a></li>
</ul>
</body>
</html>