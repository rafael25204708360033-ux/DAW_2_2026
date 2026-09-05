<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    // Se o arquivo ainda não existir, cria e grava o cabeçalho
    if (!file_exists("alunos.txt")) {
        $arqAlunos = fopen("alunos.txt", "w") or die("Erro ao criar arquivo");
        $linha = "matricula;nome;email\n";
        fwrite($arqAlunos, $linha);
        fclose($arqAlunos);
    }

    // Abre em modo append (adicionar no fim)
    $arqAlunos = fopen("alunos.txt", "a") or die("Erro ao abrir arquivo");
    $linha = $matricula . ";" . $nome . ";" . $email . "\n";
    fwrite($arqAlunos, $linha);
    fclose($arqAlunos);

    $msg = "Aluno cadastrado com sucesso!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro Realizado</title>
</head>
<body>
    <h1>Status do Cadastro</h1>
    <p><?php echo $msg; ?></p>
    <br>
    <ul>
        <li><a href="Index.html">Cadastrar Outro Aluno</a></li>
        <li><a href="ListarAlunos.php">Ir para a Lista de Alunos</a></li>
    </ul>
</body>
</html>