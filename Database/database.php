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
        WHERE 
            users.first_name IS NOT NULL AND users.first_name != ''
        AND users.last_name IS NOT NULL AND users.last_name != ''
        AND profiles.bio IS NOT NULL AND profiles.bio != ''
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
