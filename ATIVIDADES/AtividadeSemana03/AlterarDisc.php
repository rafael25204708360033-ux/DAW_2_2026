<?php
    $sigla = "";
    $msg = "";
    $nome = "";
    $carga = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $sigla = $_POST["sigla"];
    $nome = $_POST["nome"];
    $carga = $_POST["carga"];
    $msg = "";
    $arqDisc = fopen("disciplinas.txt","r") or die("erro ao abrir arquivo");
    $arqDiscNovo = fopen("disciplinas.txt","w") or die("erro ao abrir arquivo");
    
    $linha = fgets($arqDisc);
    fwrite($arqDisc2,$linha);

    while(!feof($arqDisc)) {
        $linha = fgets($arqDisc);
        $colunaDados = explode(";", $linha);
        if $colunaDados[1] = $sigla {
            $linha = '$nome' . '$sigla' . '$carga' . '\n';
        }
        fwrite($arqDisc2,$linha);
     }
    fclose($arqDisc);
    fclose($arqDisc2);
    $msg = "Deu tudo certo!!!";
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Alterar Disciplina</h1>
<br>
<ul>
    <li><a href="ex03_IncluirDisciplina.php">Incluir Disciplina</a></li>
    <li><a href="ex04_listarTodasDisciplinas.php">Listar Disciplina</a></li>
    <li><a href="ex05_pedeQuemAlterar.php">Incluir Disciplina</a></li>
</ul>

<p><?php echo $msg ?></p>
<br>
</body>
</html>
