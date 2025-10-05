<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['user-cad']) && isset($_POST['password-cad'])) {
        $username = trim($_POST['user-cad']);
        $password = trim($_POST['password-cad']);

        if (empty($username) || empty($password)) {
            header("Location: ../error.php");
        } else {
            $json = file_get_contents("logins.json");
            $logins = json_decode($json, true);

            $user = [
                "user" => $username,
                "pass" => $password,
                "saldo" => doubleval(0.0),
                "entrada" => doubleval(0.0),
                "saida" => doubleval(0.0),
                "porcetagemDeGasto" => intval(0),
                "historicoEntrada" => [],
                "historicoSaida" => []
            ];

            array_push($logins, $user);

            $json = json_encode($logins, JSON_PRETTY_PRINT);

            file_put_contents("logins.json", $json);

            header("Location: ../index.php");

        }
    } else {
        header("Location: ../index.php");
    }

} else {
    header("Location: ../index.php");
}