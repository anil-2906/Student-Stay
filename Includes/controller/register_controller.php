<?php
require_once "../models/register_model.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $data = [
        'userType' => $_POST['userType'],
        'fullname' => $_POST['fullname'],
        'dob' => $_POST['dob'],
        'gender' => $_POST['gender'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
    ];

    // Validate passwords
    if ($_POST['password'] !== $_POST['confirm_password']) {
        die("Error: Passwords do not match.");
    }

    // Instantiate the model
    $model = new RegisterModel();

    // Call the registerUser method
    if ($model->registerUser($data)) {
        echo "Registration successful! <a href='../views/login_view.php'>Login</a>";
    } else {
        echo "Registration failed. Please try again.";
    }
} else {
    die("Invalid request method.");
}
?>
