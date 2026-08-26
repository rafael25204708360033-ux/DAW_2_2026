<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];
    $horas = $_POST["horas"];
    $msg = "";
    echo "nome: " . $nome . " sigla: " . " horas: " . $horas;
   if (!file_exists("alunos.txt")) {
       $arqDisc = fopen("disciplinas.txt","w") or die("erro ao criar arquivo");
       $linha = "nome;sigla;horas\n";
       fwrite($arqDisc,$linha);
       fclose($arqDisc);
   }
   $arqDisc = fopen("disciplinas.txt","a") or die("erro ao criar arquivo");
    $linha = $nome . ";" . $sigla . ";" . $horas . "\n";
    fwrite($arqDisc,$linha);
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
    Email: <input type="text" name="sigla">
    <br><br>
    Matrícula: <input type="text" name="horas">
    <br><br>
    <input type="submit" value="Adicionar Novo Aluno">
</form>
<p><?php echo $msg ?></p>
<br>
</body>
</html>
