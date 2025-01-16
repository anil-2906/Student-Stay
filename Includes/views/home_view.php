<?php
include __DIR__ . '/../../Partials/header_view.php';
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
                    // Define accommodations in an array
                    $accommodations = [
                        ['type' => 'Single Rooms', 'price' => '€500/month', 'address' => '123 Single Lane, Paris, France', 'img' => 'singleroom.jpg'],
                        ['type' => 'Sharing Rooms', 'price' => '€400/month', 'address' => '456 Sharing Street, Paris, France', 'img' => 'sharingroom.jpg'],
                        ['type' => 'Studio', 'price' => '€450/month', 'address' => '789 Studio Avenue, Paris, France', 'img' => 'studio.jpg'],
                        ['type' => 'Apartment', 'price' => '€700/month', 'address' => '101 Apartment Blvd, Paris, France', 'img' => 'apartment.jpg']
                    ];

                    // Loop through each accommodation
                    foreach ($accommodations as $accommodation) {
                        echo '<div class="accommodation-item slide" onclick="redirectToPage(\'' . strtolower(str_replace(' ', '', $accommodation['type'])) . '\')">';
                        echo '<img src="../../assets/' . $accommodation['img'] . '" alt="' . $accommodation['type'] . '">';
                        echo '<h3>' . $accommodation['type'] . '</h3>';
                        echo '<p>Starting at ' . $accommodation['price'] . '</p>';
                        echo '<p>Address: ' . $accommodation['address'] . '</p>';
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