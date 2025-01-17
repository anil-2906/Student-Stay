<?php
require_once "../models/db.php";

class RegisterModel {
    private $conn;

    public function __construct() {
        // Establish database connection
        $db = new Database();
        $this->conn = $db->conn;
    }

    /**
     * Register a new user.
     *
     * @param array $data User registration data
     * @return bool Returns true on success, false on failure
     */
    public function registerUser($data) {
        $sql = "INSERT INTO users (userType, fullname, dob, gender, email, password, phone, address) 
                VALUES (:userType, :fullname, :dob, :gender, :email, :password, :phone, :address)";
        $stmt = $this->conn->prepare($sql);

        try {
            $stmt->execute([
                ':userType' => $data['userType'],
                ':fullname' => $data['fullname'],
                ':dob' => $data['dob'],
                ':gender' => $data['gender'],
                ':email' => $data['email'],
                ':password' => password_hash($data['password'], PASSWORD_BCRYPT),
                ':phone' => $data['phone'],
                ':address' => $data['address'],
            ]);
            return true;
        } catch (PDOException $e) {
            // Log error if needed
            error_log("Error registering user: " . $e->getMessage());
            return false;
        }
    }
}
?>
