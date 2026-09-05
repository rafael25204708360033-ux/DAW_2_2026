<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestão de Alunos</title>
</head>
<body>
    <h1>Cadastro de Alunos</h1>

    <!-- Formulário para cadastrar novos alunos -->
    <form action="CriarAluno.php" method="POST">
        Matrícula: <input type="text" name="matricula" required>
        <br><br>
        Nome: <input type="text" name="nome" required>
        <br><br>
        Email: <input type="text" name="email" required>
        <br><br>
        <input type="submit" value="Cadastrar Aluno">
    </form>

    <br>
    <hr>
    <h3>Menu de Navegação</h3>
    <ul>
        <li><a href="ListarAlunos.php">Ver Lista de Alunos Cadastrados</a></li>
    </ul>
</body>
</html>