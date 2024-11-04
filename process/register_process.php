<?php
require_once "../Database/database.php";
require_once "../class/user.php"; 

// Instantiate User class
$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Attempt to register the user
    if ($user->register($first_name, $last_name, $username, $password)) {
        echo "Registration successful!";
        header("Location: ../modules/login.php");
        exit();
    } else {
        echo "Error: " . $user->getError();
    }
}
?>
