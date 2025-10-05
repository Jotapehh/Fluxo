<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Entrada</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #74b9ff, #0984e3);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 2rem 3rem;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        section h1 {
            color: white;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
        }

        form.glass {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            text-align: left;
        }

        form.glass label {
            color: white;
            font-weight: 600;
        }

        form.glass input[type="text"],
        form.glass input[type="number"],
        form.glass textarea {
            padding: 0.8rem;
            border-radius: 8px;
            border: none;
            outline: none;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        form.glass input::placeholder,
        form.glass textarea::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        form.glass input[type="submit"] {
            background: #00b894;
            color: white;
            font-weight: bold;
            padding: 0.9rem;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            transition: background 0.2s;
        }

        form.glass input[type="submit"]:hover {
            background: #019874;
        }

        form.glass textarea {
            resize: none;
            min-height: 80px;
        }

        @media (width <=555px) {
            section {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <section>
        <div>
            <h1>Registro de Entrada</h1>
        </div>
        <form action="registers/registerEntrada.php" method="post" class="glass">
            <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">
            <label for="title">Titulo</label>
            <input type="text" name="title" id="title" maxlength="50" placeholder="Pix recebido" required>
            <label for="description">Descrição</label>
            <textarea name="description" id="description" maxlength="100"></textarea>
            <label for="value-entry">Valor de entrada</label>
            <input id="value-entry" name="value-entry" type="number" placeholder="R$" step="0.01" min="1" required>
            <input type="submit" value="Registrar">
        </form>
    </section>
</body>