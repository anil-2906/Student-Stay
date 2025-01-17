<?php
class Database {
    private $host = "localhost";
    private $user = "root";  // Default username for XAMPP
    private $pass = "";      // Default password for XAMPP
    private $dbname = "studentstay"; // Database name
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
?>
