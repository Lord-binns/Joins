<?php
class Database {
    private $server_name = "localhost";
    private $db_username = "root";
    private $db_password = "";
    private $db_name = "ADbinns";
    private $conn; // Changed from protected to private for encapsulation

    public function __construct() {
        $this->conn = new mysqli($this->server_name, $this->db_username, $this->db_password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Getter method to access the database connection
    public function getConnection() {
        return $this->conn;
    }

    public function getUserProfile($user_id) {
        $sql = "
            SELECT 
                users.id AS user_id, 
                users.first_name, 
                users.last_name, 
                users.username, 
                profiles.date_of_birth, 
                profiles.address, 
                profiles.phone_number, 
                profiles.bio 
            FROM users 
            LEFT JOIN profiles ON users.id = profiles.user_id
            WHERE users.id = ?
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    

// Existing getUsersWithProfiles() with LEFT JOIN
public function getUsersWithProfiles() {
    $sql = "
        SELECT 
            users.id AS user_id, 
            users.first_name, 
            users.last_name, 
            users.username, 
            profiles.date_of_birth, 
            profiles.address, 
            profiles.phone_number, 
            profiles.bio 
        FROM users 
        LEFT JOIN profiles ON users.id = profiles.user_id
    ";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
        $usersWithProfiles = [];
        while ($row = $result->fetch_assoc()) {
            $usersWithProfiles[] = $row;
        }
        return $usersWithProfiles;
    } else {
        return [];
    }
}

// New method for INNER JOIN
public function getUsersWithProfilesInnerJoin() {
    $sql = "
        SELECT 
            users.id AS user_id, 
            users.first_name, 
            users.last_name, 
            users.username, 
            profiles.date_of_birth, 
            profiles.address, 
            profiles.phone_number, 
            profiles.bio 
        FROM users 
        INNER JOIN profiles ON users.id = profiles.user_id
    ";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
        $usersWithProfilesInner = [];
        while ($row = $result->fetch_assoc()) {
            $usersWithProfilesInner[] = $row;
        }
        return $usersWithProfilesInner;
    } else {
        return [];
    }
}

}
