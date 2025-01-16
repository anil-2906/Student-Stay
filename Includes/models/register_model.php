<?php
class UserModel {
    private $conn;
    private $table = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function registerUser($data) {
        $query = "INSERT INTO " . $this->table . " (fullname, dob, gender, email, password,confirmpassword, phone, address) 
                  VALUES (:fullname, :dob, :gender, :email, :password,:confirmpassword, :phone, :address)";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':fullname', $data['fullname']);
        $stmt->bindParam(':dob', $data['dob']);
        $stmt->bindParam(':gender', $data['gender']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':confirmpassword', $data['confirmpassword']);
        $stmt->bindParam(':phone', $data['phone']);
        $stmt->bindParam(':address', $data['address']);

        try {
            if ($stmt->execute()) {
                return true;
            }
        } catch (Exception $e) {
            // Handle exception
            error_log($e->getMessage());
        }
        return false;
    }
}
