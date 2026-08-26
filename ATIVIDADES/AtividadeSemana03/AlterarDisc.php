<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $siglaBusca = $_POST["siglaBusca"];
    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];
    $horas = $_POST["horas"];

    $arqDisc = fopen("disciplinas.txt", "r") or die("erro ao abrir arquivo");
    $arqDiscNovo = fopen("disciplinas_temp.txt", "w") or die("erro ao abrir arquivo");

    $linha = fgets($arqDisc); // Lê cabeçalho
    fwrite($arqDiscNovo, $linha);

    while (!feof($arqDisc)) {
        $linha = fgets($arqDisc);
        if ($linha != "") {
            $colunaDados = explode(";", $linha);
            if ($colunaDados[1] == $siglaBusca) {
                $linha = $nome . ";" . $sigla . ";" . $horas . "\n";
            }
            fwrite($arqDiscNovo, $linha);
        }
    }

    fclose($arqDisc);
    fclose($arqDiscNovo);

    rename("disciplinas_temp.txt", "disciplinas.txt");
    $msg = "Deu tudo certo!!!";
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Alterar Disciplina</h1>
<form action="AlterarDisc.php" method="POST">
    Sigla da disciplina que deseja alterar: <input type="text" name="siglaBusca">
    <br><br>
    Novo Nome: <input type="text" name="nome">
    <br><br>
    Nova Sigla: <input type="text" name="sigla">
    <br><br>
    Novas Horas: <input type="text" name="horas">
    <br><br>
    <input type="submit" value="Alterar Disciplina">
</form>

<p><?php echo $msg; ?></p>
<br>
<ul>
    <li><a href="CriarDisc.php">Incluir Disciplina</a></li>
    <li><a href="ListarDisc.php">Listar Disciplinas</a></li>
    <li><a href="ExcluirDisc.php">Excluir Disciplina</a></li>
</ul>
</body>
</html>