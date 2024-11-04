<?php
session_start();
require_once "../Database/database.php";
require_once "../class/User.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();
    $user_id = $user->login($username, $password);

    if ($user_id) {
        $_SESSION['user_id'] = $user_id;
        header("Location: ../modules/dashboard.php");
        exit;
    } else {
        $_SESSION['error'] = $user->getError();
        header("Location: ../login.php");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
}
?>
