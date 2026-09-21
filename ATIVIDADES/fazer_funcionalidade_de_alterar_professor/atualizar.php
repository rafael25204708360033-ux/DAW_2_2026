<?php
    
    $msg = '';
    if($SERVER['REQUEST_METHOD'] === 'POST'){
        $matricul = $_POST['matricul'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];

        $arquivo_Professor = fopen('professor.txt', 'r');
        $arquivoTEMP = fopen('temp.txt', 'w');

        while(!feof($arquivo_Professor)){
            $linha = fgets($arquivo_Professor);
            $dados = explode(';', $linha);
            if($dados[0] == $matricul){
                $linha = $matricul . ';' . $nome . ';' . $cpf . ';' . $email . "\n";
            }
            fwrite($arquivoTEMP, $linha);
        }

        fclose($arquivo_Professor);
        fclose($arquivoTEMP);

        rename('temp.txt', 'professor.txt');
        $msg = 'Professor atualizado com sucesso!';
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="matricul">Matricula:</label>
        <input type="text" name="matricul" id="matricul" required><br>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <input type="submit" value="Atualizar">
    </form>
    <p><?php echo $msg; ?></p>
</body>
</html>
