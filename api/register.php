<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        /* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #0984e3, #6c5ce7); /* azul -> roxo */
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Caixa central */
section {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    padding: 2.5rem 3rem;
    border-radius: 16px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
    width: 100%;
    max-width: 400px;
    text-align: center;
}

/* Título */
section h1 {
    color: white;
    font-size: 2rem;
    margin-bottom: 1.5rem;
}

/* Formulário glass */
form.glass {
    display: flex;
    flex-direction: column;
    gap: 1.2rem;
}

/* Inputs */
form.glass input[type="text"],
form.glass input[type="password"] {
    padding: 0.9rem;
    border-radius: 8px;
    border: none;
    outline: none;
    font-size: 1rem;
    background: rgba(255, 255, 255, 0.2);
    color: white;
}

form.glass input::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

/* Botão */
form.glass input[type="submit"] {
    background: #00cec9;
    color: white;
    font-weight: bold;
    padding: 0.9rem;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    transition: background 0.2s;
}

form.glass input[type="submit"]:hover {
    background: #009999;
}

form.glass a {
    margin-top: 0.5rem;
    display: inline-block;
    color: #ffeaa7;
    font-weight: bold;
    text-decoration: none;
}

form.glass a:hover {
    text-decoration: underline;
}

@media (width <= 555px) {
    section {
        width: 80%;
    }
}
    </style>
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
