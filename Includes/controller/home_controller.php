<?php
require_once '../model/home_model.php';

$accommodations = getAccommodations();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['location'], $_GET['move_in'], $_GET['move_out'], $_GET['accommodation_type'])) {
    $location = trim($_GET['location']);
    $move_in = $_GET['move_in'];
    $move_out = $_GET['move_out'];
    $accommodation_type = $_GET['accommodation_type'];

    if (!empty($location) && !empty($move_in) && !empty($move_out) && !empty($accommodation_type)) {
        $accommodations = searchAccommodations($location, $move_in, $move_out, $accommodation_type);
    } else {
        $_SESSION['error'] = 'Please fill in all fields to search.';
        header('Location: ../views/home_view.php');
        exit;
    }
}

include '../views/home_view.php';
?>
