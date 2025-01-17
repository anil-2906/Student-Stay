<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $userType = $_POST['userType'];

    if (empty($email) || empty($password) || empty($userType)) {
        $_SESSION['error'] = 'All fields are required.';
        header('Location: ../views/login_view.php');
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid email format.';
        header('Location: ../views/login_view.php');
        exit;
    }

    $dummyUsers = [
        'student' => ['email' => 'student@example.com', 'password' => 'student123'],
        'admin' => ['email' => 'admin@example.com', 'password' => 'admin123'],
        'landlord' => ['email' => 'landlord@example.com', 'password' => 'landlord123']
    ];

    if (isset($dummyUsers[$userType]) &&
        $dummyUsers[$userType]['email'] === $email &&
        $dummyUsers[$userType]['password'] === $password) {
        $_SESSION['message'] = 'Login successful!';
        $_SESSION['user'] = ['email' => $email, 'userType' => $userType];
        header('Location: ../dashboard.php');
        exit;
    } else {
        $_SESSION['error'] = 'Invalid credentials. Please try again.';
        header('Location: ../views/login_view.php');
        exit;
    }
} else {
    header('Location: ../views/login_view.php');
    exit;
}
?>
