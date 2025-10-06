<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/loginStyl.css">
</head>

<body>
    <section>
        <h1>Login</h1>
        <form action="panel.php" method="post" class="glass">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Senha" required>
            <input type="submit" value="Entrar">
            <p>Não tem uma conta? <a href="api/register.php">Cadastra-se</a></p>
        </form>
    </section>
</body>


</html>
