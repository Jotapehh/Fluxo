<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="styles/cadastroStyl.css">
</head>
<body>    
    <section>
        <h1>Cadastro</h1>
        <form action="models/controllerCad.php" method="post" class="glass">
            <input type="text" placeholder="Nome de usuário" name="user-cad"required>
            <input type="password" placeholder="Senha" name="password-cad" required>
            <input type="submit" value="Cadastrar">
            <a href="index.php">Voltar</a>
        </form>
    </section>
</body>
</html>