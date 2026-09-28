<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID = $_POST["ID"];
    $nome = $_POST["Nome"];
    $email = $_POST["Email"];
    $senha = $_POST["Senha"];
    $acao = $_POST["acao"];

    if (!file_exists("usuarios.txt")) {
        $arq = fopen("usuarios.txt", "w");
        $linha = "ID;Nome;Email;Senha\n";
        fwrite($arq, $linha);
        fclose($arq);
    }

    // CADASTRAR
    if ($acao == "cadastrar") {
        $arq = fopen("usuarios.txt", "a");
        $linha = $ID . ";" . $nome . ";" . $email . ";" . $senha . "\n";
        fwrite($arq, $linha);
        fclose($arq);
        $msg = "Deu bom!";
    }

    // EDITAR OU EXCLUIR
    if ($acao == "editar" || $acao == "excluir") {
        $arqAntigo = fopen("usuarios.txt", "r");
        $arqNovo = fopen("usuarios_temp.txt", "w");

        while (!feof($arqAntigo)) {
            $linha = fgets($arqAntigo);
            if ($linha != "") {
                $dados = explode(";", $linha);

                if ($dados[0] == $ID) {
                    if ($acao == "editar") {
                        $linhaAtualizada = $ID . ";" . $nome . ";" . $email . ";" . $senha . "\n";
                        fwrite($arqNovo, $linhaAtualizada);
                    }
                    // Se for excluir, não faz nada (pula a gravação)
                } else {
                    fwrite($arqNovo, $linha);
                }
            }
        }

        fclose($arqAntigo);
        fclose($arqNovo);

        unlink("usuarios.txt");
        rename("usuarios_temp.txt", "usuarios.txt");

        $msg = "Deu bom!";
    }
}
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
<h1>Gerenciamento de Usuários</h1>

<form action="Usuarios.php" method="POST">
    ID: <input type="text" name="ID"><br><br>
    Nome: <input type="text" name="Nome"><br><br>
    Email: <input type="text" name="Email"><br><br>
    Senha: <input type="password" name="Senha"><br><br>
    
    Ação: 
    <select name="acao">
        <option value="cadastrar">Cadastrar</option>
        <option value="editar">Editar por ID</option>
        <option value="excluir">Excluir por ID</option>
    </select>
    <br><br>
    <input type="submit" value="Executar">
</form>

<p><?php echo $msg; ?></p>
<hr>

<h2>Usuários Cadastrados</h2>
<ul>
<?php
if (file_exists("usuarios.txt")) {
    $arq = fopen("usuarios.txt", "r");
    fgets($arq); // Pula cabeçalho

    while (!feof($arq)) {
        $linha = fgets($arq);
        if ($linha != "") {
            $dados = explode(";", $linha);
            echo "<li>ID: " . $dados[0] . " | Nome: " . $dados[1] . " | Email: " . $dados[2] . "</li>";
        }
    }
    fclose($arq);
}
?>
</ul>
</body>
</html>
