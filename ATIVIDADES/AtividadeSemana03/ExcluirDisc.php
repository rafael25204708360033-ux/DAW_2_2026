<?php
    //coloquei o nome errado no arq
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
