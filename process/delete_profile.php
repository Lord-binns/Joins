<?php
require_once '../Database/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $db = new Database();
    $conn = $db->getConnection();

    $user_id = intval($_POST['user_id']);
    
    // Delete only from the profiles table, keeping the user record intact
    $stmt = $conn->prepare("DELETE FROM profiles WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        // Redirect back to the profiles page after deletion
        header("Location: ../class/user_profiles.php");
        exit();
    } else {
        echo "Error deleting profile: " . $conn->error;
    }
}
?>
