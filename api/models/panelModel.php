<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel <?="$username" ?></title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background: #f4f6f9;
            color: #333;
        }

        header {
            background: #2d3436;
            color: white;
            padding: 1rem 2rem;
            text-align: center;
        }

        main {
            display: flex;
            flex-direction: column;
            padding: 2rem;
        }

        #container-saldo, #container-in-out section {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
        }

        #container-saldo h2 {
            margin: 0;
            font-size: 1.2rem;
            color: #636e72;
        }

        #container-saldo p {
            font-size: 1.8rem;
            font-weight: bold;
            color: #00b894;
        }

        #container-in-out {
            display: flex;
            gap: 1.5rem;
        }

        #container-in-out section h2 {
            margin-bottom: 0.5rem;
        }

        #container-in-out section p {
            font-size: 1.5rem;
            font-weight: bold;
        }

        #container-in-out section:first-child p {
            color: #00b894;
        }

        #container-in-out section:last-child p {
            color: #d63031;
        }

        button, a {
            background: #0984e3;
            color: white;
            padding: 0.6rem 1rem;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background 0.2s;
        }

        button:hover, a:hover {
            background: #74b9ff;
        }

        #container-historico {
            display: flex;
            gap: 2rem;
            margin-top: 1.5rem;
        }
        

        #historico-entrada, #historico-saida {
            flex: 1;
            background: white;
            padding: 1rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        #historico-entrada h3 {
            color: #3a98a7ff;
        }
        #historico-entrada section {
            max-height: 600px;
            overflow-y: auto;
            padding-right: 10px;
        }
        #historico-entrada section::-webkit-scrollbar {
            width: 8px;
        }

        #historico-entrada section::-webkit-scrollbar-thumb {
            background: #0984e3;
            border-radius: 10px;
        }

        #historico-entrada section::-webkit-scrollbar-track {
            background: #dfe6e9;
            border-radius: 10px;
        }

        #historico-saida h3 {
            color: #c14b4bff;
        }
        #historico-saida section {
            max-height: 600px;
            overflow-y: auto;
            padding-right: 10px;
        }
        #historico-saida section::-webkit-scrollbar {
            width: 8px;
        }

        #historico-saida section::-webkit-scrollbar-thumb {
            background: #0984e3;
            border-radius: 10px;
        }

        #historico-entrada section::-webkit-scrollbar-track {
            background: #dfe6e9;
            border-radius: 10px;
        }


        .card-entradas {
            background: #dff9fb;
            color: #3a98a7ff;
            padding: 0.8rem;
            border-radius: 8px;
            margin-bottom: 0.8rem;
        }
        .card-saidas {
            background: #fbdfdfff;
            color: #c14b4bff;
            padding: 0.8rem;
            border-radius: 8px;
            margin-bottom: 0.8rem;
        }

        .title-card {
            font-weight: bold;
            font-size: 1.3em;
        }

        @media (width <= 555px) {
            header {
                font-size: 0.6em;
                padding: 0.5rem 1rem;
            }

            #container-saldo h2{
                font-size: 0.9em;
            }
            #container-saldo p {
                font-size: 1em;
            }

            #container-in-out {
                justify-content: space-between;
            }

            #container-in-out section h2{
                text-align: center;
                font-size: 0.9em;
            }
            #container-in-out section p {
                font-size: 1em;
            }
            #container-in-out button[type='submit'] {
                font-size: 0.7em;
            }

            #container-historico {
                flex-direction: column;
            }
            #container-historico div h3 {
                text-align: center;
            }

            #historico-entrada section {
                max-height: 320px;
            }
             #historico-saida section {
                max-height: 320px;
            }
            

            .title-card {
                font-size: 1em;
            }
        }

    </style>
</head>

<body>
    <header>
        <h1>
            Bem vindo,
            <?php
            echo $username;
            ?>
            !
        </h1>
    </header>
    <main>
        <section id="container-saldo">
            <h2>Saldo:</h2>
            <p>
                <?php
                $json = file_get_contents("./models/logins.json");
                $logins = json_decode($json, true);
                for ($i = 0; $i < count($logins); $i++) {
                    if ($logins[$i]["user"] === $username) {
                        $saldo = $logins[$i]["saldo"];
                        break;
                    } else {
                        continue;
                    }
                }
                echo "R$" . number_format($saldo, 2, ',', '.');
                ?>
            </p>
        </section>
        <div id="container-in-out">
            <section>
                <h2>Total de entradas</h2>
                <p>
                    <?php
                    $json = file_get_contents("models/logins.json");
                    $logins = json_decode($json, true);
                    for ($i = 0; $i < count($logins); $i++) {
                        if ($logins[$i]["user"] === $username) {
                            $saldo = $logins[$i]["entrada"];
                            break;
                        } else {
                            continue;
                        }
                    }
                    echo "R$" . number_format($saldo, 2, ',', '.');
                    ?>
                </p>
                <form id="goToRegistrar" method="POST" action="registerEntry.php">
                    <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">
                    <button type="submit">Registrar Entrada</button>
                </form>
            </section>
            <section>
                <h2>Total de saídas</h2>
                <p>
                    <?php
                    $json = file_get_contents("models/logins.json");
                    $logins = json_decode($json, true);
                    for ($i = 0; $i < count($logins); $i++) {
                        if ($logins[$i]["user"] === $username) {
                            $saldo = $logins[$i]["saida"];
                            break;
                        } else {
                            continue;
                        }
                    }
                    echo "R$" . number_format($saldo, 2, ',', '.');
                    ?>
                </p>
                <form id="goToRegistrar" method="POST" action="registerOut.php">
                    <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">
                    <button type="submit">Registrar Saída</button>
                </form>
            </section>
        </div>
        <section>
            <h2>Histórico</h2>
            <div id="container-historico">
                <div id="historico-entrada">
                    <h3>Entrada</h3>
                    <section>
                        <?php
                            for ($j = count($logins[$i]["historicoEntrada"]) -1; $j >= 0; $j--) {
                                $titulo = $logins[$i]["historicoEntrada"][$j]["titulo"];
                                $descricao = $logins[$i]["historicoEntrada"][$j]["descricao"];
                                $valor = $logins[$i]["historicoEntrada"][$j]["valorEntrada"];
                                echo "<section class=\"card-entradas\">
                                    <p class=\"title-card\">$titulo</pc>
                                    <p class=\"desc-card\">$descricao</p>
                                    <p class=\"value-card\">R$" . number_format($valor, 2, ',', '.') . "</p>
                                </section>";
                            }
                        ?>
                    </section>
                </div>
                <div id="historico-saida">
                    <h3>saída</h3>
                    <section>
                        <?php
                            for ($j = count($logins[$i]["historicoSaida"]) -1; $j >= 0; $j--) {
                                $titulo = $logins[$i]["historicoSaida"][$j]["titulo"];
                                $descricao = $logins[$i]["historicoSaida"][$j]["descricao"];
                                $valor = $logins[$i]["historicoSaida"][$j]["valorSaida"];
                                echo "<section class=\"card-saidas\">
                                    <p class=\"title-card\">$titulo</p>
                                    <p class=\"desc-card\">$descricao</p>
                                    <p class=\"value-card\">-R$" . number_format($valor, 2, ',', '.') . "</p>
                                </section>";
                            }
                        ?>
                    </section>
                </div>
            </div>
        </section>
    </main>
</body>

</html>