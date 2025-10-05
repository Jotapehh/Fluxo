<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $title = $_POST["title"];
  $description = $_POST["description"];
  $valueOut = $_POST["value-out"];
  
  $json = file_get_contents("../models/logins.json");
  $logins = json_decode($json, true);
  
  for ($i = 0; $i < count($logins); $i++) {
      if ($logins[$i]["user"] === $username) {
          if ($logins[$i]["saldo"] > 0 && $valueOut <= $logins[$i]["saldo"]) {
              $arrayNovoRegistro = [
                  "titulo" => $title,
                  "descricao" => $description,
                  "valorSaida" => $valueOut
              ];
  
              array_push($logins[$i]["historicoSaida"], $arrayNovoRegistro);
              $logins[$i]["saida"] += $valueOut;
              $logins[$i]["saldo"] -= $valueOut;
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
              echo '
                  <form id="redirectForm" method="POST" action="../panel.php">
                    <input type="hidden" name="username" value="' . htmlspecialchars($logins[$i]["user"]) . '">
                    <input type="hidden" name="password" value="' . htmlspecialchars($logins[$i]["pass"]) . '">
                  </form>
                  <script>
                    document.getElementById("redirectForm").submit();
                  </script>
              ';
  
              exit;
          }
      } else {
          continue;
      }
  }
} else {
  header("Location: ../error.php");
}