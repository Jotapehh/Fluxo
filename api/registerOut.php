<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        if (empty($username)) {
            header('Location: error.php');
        } else {
            include_once "registers/pageRegisterOut.php";
        }
    } else {
        header('Location: error.php');
    }
} else {
    header('Location: error.php');
}