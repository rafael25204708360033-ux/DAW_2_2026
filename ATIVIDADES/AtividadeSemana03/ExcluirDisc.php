<?php
    $sigla = "";
    $msg = "";
    $nome = "";
    $horas = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $sigla = $_POST["sigla"];
    $nome = $_POST["nome"];
    $horas = $_POST["horas"];
    $msg = "";
    $arqDisc = fopen("disciplinas.txt","r") or die("erro ao abrir arquivo");
    $arqDiscNovo = fopen("disciplinas.txt","w") or die("erro ao abrir arquivo");
    
    $linha = fgets($arqDisc);
    fwrite($arqDisc2,$linha);

    while(!feof($arqDisc)) {
        $linha = fgets($arqDisc);
        $colunaDados = explode(";", $linha);
        if $colunaDados[1] = $sigla {
            $linha = fgets($arqDisc);
        }
        fwrite($arqDisc2,$linha);
     }
    fclose($arqDisc);
    fclose($arqDisc2);
    $msg = "Deu tudo certo!!!";
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
