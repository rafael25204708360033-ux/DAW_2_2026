<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mat = $_POST["matricula"];
    $cpf = $_POST["cpf"];
    $msg = "";
    echo "nome: " . $nome . " sigla: " . " carga: " . $carga;
   if (!file_exists("alunos.txt")) {
       $arqDisc = fopen("alunos.txt","w") or die("erro ao criar arquivo");
       $linha = "nome;email;matricula;cpf\n";
       fwrite($arqDisc,$linha);
       fclose($arqDisc);
   }
   $arqDisc = fopen("alunos.txt","a") or die("erro ao criar arquivo");
    $linha = $nome . ";" . $email . ";" . $mat . ";" . $cpf . "\n";
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
<h1>Adicionar Novo Aluno</h1>
<form action="CriarAlunos.php" method="POST">
    Nome: <input type="text" name="nome">
    <br><br>
    Email: <input type="text" name="email">
    <br><br>
    Matrícula: <input type="text" name="mat">
    <br><br>
    CPF: <input type="text" name="cpf">
    <input type="submit" value="Adicionar Novo Aluno">
</form>
<p><?php echo $msg ?></p>
<br>
</body>
</html>
