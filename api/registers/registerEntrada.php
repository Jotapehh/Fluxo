<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        isset($_POST['username']) &&
        isset($_POST['title']) &&
        isset($_POST['description']) &&
        isset($_POST['value-entry'])
    ) {
        $username = trim($_POST["username"]);
        $title = trim($_POST["title"]);
        $description = trim($_POST["description"]);
        $valueEntry = trim($_POST["value-entry"]);
    
        if (
            empty($username) ||
            empty($title) ||
            empty($description) ||
            empty($valueEntry)
        ) {
            header("Location: ../error.php");
        } else {
            if ($valueEntry > 0) {
                $json = file_get_contents("../models/logins.json");
                $logins = json_decode($json, true);
                
                for ($i = 0; $i < count($logins); $i++) {
                    if ($logins[$i]["user"] === $username) {
                        $arrayNovoRegistro = [
                            "titulo" => $title,
                            "descricao" => $description,
                            "valorEntrada" => $valueEntry
                        ];
                        
                        array_push($logins[$i]["historicoEntrada"], $arrayNovoRegistro);
                        $logins[$i]["entrada"] += $valueEntry;
                        $logins[$i]["saldo"] += $valueEntry;
                        $json = json_encode($logins, JSON_PRETTY_PRINT);
                        file_put_contents("../models/logins.json", $json);
                        
                        echo '
                            <form id="redirectForm" method="POST" action="../panel.php">
                            <input type="hidden" name="username" value="' . htmlspecialchars($logins[$i]["user"]) . '">
                            <input type="hidden" name="password" value="' . htmlspecialchars($logins[$i]["pass"]) . '">
                            </form>
                            <script>
                            document.getElementById("redirectForm").submit();
                            </script>
                        ';
                        break;
                    } else {
                        continue;
                    }
                }

            } else {
                echo '
                  <form id="redirectForm" method="POST" action="../panel.php">
                    <input type="hidden" name="username" value="' . htmlspecialchars($logins[$i]["user"]) . '">
                    <input type="hidden" name="password" value="' . htmlspecialchars($logins[$i]["pass"]) . '">
                  </form>
                  <script>
                    document.getElementById("redirectForm").submit();
                  </script>
              ';
            }
        }
    }
} else {
    header("Location: ../error.php");
}
