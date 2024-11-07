<?php
require_once "../Database/database.php";

class User extends Database {
    private $conn;
    private $error;

    public function __construct() {
        parent::__construct(); // Call the Database constructor
        $this->conn = $this->getConnection(); // Access the connection using getConnection()
    }

    // Method for registering a user
    public function register($first_name, $last_name, $username, $password) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Check if the username already exists
        $sql_check = "SELECT * FROM users WHERE username = ?";
        $stmt_check = $this->conn->prepare($sql_check);
        if (!$stmt_check) {
            die("Error preparing check statement: " . $this->conn->error);
        }

        $stmt_check->bind_param("s", $username);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            $this->error = "Username already taken";
            return false;
        }

        // Insert the new user
        $sql = "INSERT INTO users (first_name, last_name, username, password) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("Error preparing insert statement: " . $this->conn->error);
        }

        $stmt->bind_param("ssss", $first_name, $last_name, $username, $hashed_password);

        if ($stmt->execute()) {
            // Get the ID of the newly inserted user
            $user_id = $stmt->insert_id;

            // After successful user registration, insert into profiles table with default (NULL) values
            $this->insertDefaultProfile($user_id);
            
            return true; // Registration successful
        } else {
            $this->error = $stmt->error; // Capture any error
            return false; // Registration failed
        }
    }

    // Method to insert default profile data for the new user
    private function insertDefaultProfile($user_id) {
        // Insert default profile with NULL values for date_of_birth, address, phone_number, and bio
        $sql = "INSERT INTO profiles (user_id, date_of_birth, address, phone_number, bio) 
                VALUES (?, NULL, NULL, NULL, NULL)";
        
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("Error preparing insert profile statement: " . $this->conn->error);
        }
        
        $stmt->bind_param("i", $user_id);
        if ($stmt->execute()) {
            // Profile inserted successfully
            return true;
        } else {
            $this->error = $stmt->error; // Capture any error
            return false;
        }
    }

    // Method for logging in a user
    public function login($username, $password) {
        // Prepare SQL statement to check for username
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            die("Error preparing login statement: " . $this->conn->error);
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Verify password if user exists
        if ($user && password_verify($password, $user['password'])) {
            return $user['id']; // Login successful, return user ID for session
        } else {
            $this->error = "Invalid username or password";
            return false; // Login failed
        }
    }

    // Error retrieval method
    public function getError() {
        return $this->error;
    }
}
