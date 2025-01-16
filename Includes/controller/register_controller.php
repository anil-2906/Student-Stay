<?php
require_once '../config/database.php';
require_once '../model/UserModel.php';

// Initialize message and error variables
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database();
    $db = $database->getConnection();
    $userModel = new UserModel($db);

    // Collect form data
    $userData = [
        'userType' => $_POST['userType'],
        'fullname' => $_POST['fullname'],
        'dob' => $_POST['dob'],
        'gender' => $_POST['gender'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'password' => $_POST['password'],
        'confirm_password' => $_POST['confirm_password']
    ];

    // Attempt to register user
    if ($userModel->registerUser($userData)) {
        $message = "Registration successful!";
    } else {
        $error = "Registration failed. Please try again.";
    }
}

// Include the view
include_once '../view/register.php';
