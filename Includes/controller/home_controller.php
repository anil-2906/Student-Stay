<?php
// home_controller.php

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

// Fetch accommodations data from the database
function getAccommodations($pdo) {
    $stmt = $pdo->query('SELECT * FROM accommodations');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$accommodations = getAccommodations($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Accommodation Booking</title>
    <link rel="stylesheet" href="../../CSS/home.css">
</head>
<body>
    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="search-box">
                <div class="input-section">
                    <span class="input-label">Location</span>
                    <input type="text" placeholder="Enter a destination...">
                </div>

                <div class="divider"></div>

                <div class="input-section">
                    <span class="input-label">Move-in</span>
                    <input type="date">
                </div>

                <div class="divider"></div>

                <div class="input-section">
                    <span class="input-label">Move-out</span>
                    <input type="date">
                </div>

                <div class="divider"></div>

                <div class="input-section">
                    <label for="accommodation-type" class="input-label">Type</label>
                    <select id="accommodation-type">
                        <option value="" disabled selected>Select accommodation type</option>
                        <option value="single">Single Room</option>
                        <option value="sharing">Sharing Room</option>
                        <option value="studio">Studio</option>
                        <option value="apartment">Apartment</option>
                    </select>
                </div>

                <button type="button">Search</button>
            </div>
        </section>

        <!-- Featured Accommodations Section -->
        <section id="accommodations" class="featured">
            <h2>Featured Accommodations</h2>
            <div class="room-slider">
                <div class="accommodation-grid slides">
                    <?php
                    // Loop through each accommodation and display it
                    foreach ($accommodations as $accommodation) {
                        echo '<div class="accommodation-item slide" onclick="redirectToPage(\'' . strtolower(str_replace(' ', '', $accommodation['type'])) . '\')">';
                        echo '<img src="../../assets/' . $accommodation['img'] . '" alt="' . $accommodation['type'] . '">';
                        echo '<h3>' . htmlspecialchars($accommodation['type']) . '</h3>';
                        echo '<p>Starting at ' . htmlspecialchars($accommodation['price']) . '</p>';
                        echo '<p>Address: ' . htmlspecialchars($accommodation['address']) . '</p>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>

    <script>
        function redirectToPage(type) {
            window.location.href = `/${type}.php`;
        }
    </script>

    <?php
    // Include footer PHP file
    include __DIR__ . '/../../Partials/footer_view.php';
    ?>
</body>
</html>
