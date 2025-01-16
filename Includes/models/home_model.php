<?php
// home_model.php

// Database connection configuration
$host = 'localhost';
$db = 'studentstay';
$user = 'your_username';
$pass = 'your_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}

// Function to fetch all accommodations
function getAllAccommodations($pdo) {
    $stmt = $pdo->query('SELECT * FROM accommodations');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to fetch accommodations based on filters
function getFilteredAccommodations($pdo, $location, $moveInDate, $moveOutDate, $type) {
    $sql = 'SELECT * FROM accommodations WHERE 1=1';
    $params = [];

    if (!empty($location)) {
        $sql .= ' AND location LIKE :location';
        $params[':location'] = '%' . $location . '%';
    }

    if (!empty($moveInDate)) {
        $sql .= ' AND move_in_date <= :moveInDate';
        $params[':moveInDate'] = $moveInDate;
    }

    if (!empty($moveOutDate)) {
        $sql .= ' AND move_out_date >= :moveOutDate';
        $params[':moveOutDate'] = $moveOutDate;
    }

    if (!empty($type)) {
        $sql .= ' AND type = :type';
        $params[':type'] = $type;
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// You can add more functions as needed
?>
