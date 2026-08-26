<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];
    $horas = $_POST["horas"];

    if (!file_exists("disciplinas.txt")) {
        $arqDisc = fopen("disciplinas.txt", "w") or die("Erro ao criar arquivo");
        $linha = "nome;sigla;horas\n";
        fwrite($arqDisc, $linha);
        fclose($arqDisc);
    }

    $arqDisc = fopen("disciplinas.txt", "a") or die("Erro ao abrir arquivo");
    $linha = $nome . ";" . $sigla . ";" . $horas . "\n";
    fwrite($arqDisc, $linha);
    fclose($arqDisc);

    $msg = "Deu bom!";
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Adicionar Nova Disciplina</h1>
<form action="CriarDisc.php" method="POST">
    Nome: <input type="text" name="nome">
    <br><br>
    Sigla: <input type="text" name="sigla">
    <br><br>
    Horas: <input type="text" name="horas">
    <br><br>
    <input type="submit" value="Adicionar Disciplina">
</form>
<p><?php echo $msg; ?></p>
<br>
<ul>
    <li><a href="ListarDisc.php">Listar Disciplinas</a></li>
    <li><a href="AlterarDisc.php">Alterar Disciplina</a></li>
    <li><a href="ExcluirDisc.php">Excluir Disciplina</a></li>
</ul>
</body>
</html>