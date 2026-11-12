<?php
$nome = $_GET["nome"];
$email = $_GET["email"];
$senha = $_GET["senha"];

if (!file_exists("usuarios.txt")) {
    $arqUser = fopen("usuarios.txt", "w") or die("Erro ao criar arquivo");
    $linha = "nome;email;senha\n";
    fwrite($arqUser, $linha);
    fclose($arqUser);
}

$arqUser = fopen("usuarios.txt", "a") or die("Erro ao abrir arquivo");
$linha = $nome . ";" . $email . ";" . $senha . "\n";
fwrite($arqUser, $linha);
fclose($arqUser);

echo "<p>Usuário cadastrado com sucesso!</p>";
?>