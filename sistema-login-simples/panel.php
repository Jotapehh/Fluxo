<?php
$perfilAutorizado = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
    }

    $json = file_get_contents("models/logins.json");
    $logins = json_decode($json, true);
    
    for ($i = 0; $i < count($logins); $i++) {
        if ($logins[$i]["user"] === $username && $logins[$i]["pass"] === $password) {
            $perfilAutorizado = true;
            break;
        } else {
            continue;
        }
    }

    if ($perfilAutorizado === true) {
        include_once "models/panelModel.php";
    } else {
        header("Location: index.php");
    }
}
else {
    header("Location: index.php");
}