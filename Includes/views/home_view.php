<?php
include __DIR__ . '/../../Partials/header_view.php';

// Simulating dynamic data (replace with actual data retrieval logic)
$accommodations = [
    ['img' => 'singleroom.jpg'],
    ['img' => 'sharingroom.jpg'],
    ['img' => 'studio.jpg'],
    ['img' => 'apartment.jpg'],
    ['img' => 'gar.jpg'],
    ['img' => 'gym.jpg'],
    ['img' => 'kitchen.jpg'],
    ['img' => 'swim.jpg']
];

function sanitize_output($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home - Accommodation Booking</title>
    <link rel="stylesheet" href="../../CSS/home.css">
    <style>
        /* Full-screen gallery container */
        .gallery-container {
            position: relative;
            width: 100%;
            height: 80vh; /* Full viewport height */
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            background-color: black;
        }

        /* Gallery images styles */
        .gallery-images {
            display: none;
            width: 100%;
            height: 120%;
            object-fit: fill; /* Ensure images maintain aspect ratio */
            transition: opacity 1s ease;
        }

        .active {
            display: block;
        }

        /* Navigation buttons */
        .gallery-buttons {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .prev, .next {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 15px;
            cursor: pointer;
            font-size: 18px;
            border-radius: 50%;
        }

        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

    </style>
</head>
<body>
    <main>
        <section class="hero">
            <div class="search-box">
                <form method="GET" action="search_results.php">
                    <div class="input-section">
                        <label class="input-label" for="location">Location</label>
                        <input type="text" id="location" name="location" placeholder="Enter a destination..." required>
                    </div>
                    <div class="input-section">
                        <label class="input-label" for="move_in">Move-in</label>
                        <input type="date" id="move_in" name="move_in" required>
                    </div>
                    <div class="input-section">
                        <label class="input-label" for="move_out">Move-out</label>
                        <input type="date" id="move_out" name="move_out" required>
                    </div>
                    <div class="input-section">
                        <label for="accommodation_type" class="input-label">Type</label>
                        <select id="accommodation_type" name="accommodation_type" required>
                            <option value="" disabled selected>Select accommodation type</option>
                            <option value="single">Single Room</option>
                            <option value="sharing">Sharing Room</option>
                            <option value="studio">Studio</option>
                            <option value="apartment">Apartment</option>
                        </select>
                    </div>
                    <div class="input-section">
                        <button type="submit">Search</button>
                    </div>
                </form>
            </div>
        </section>
        <section id="accommodations" class="featured">
            <h2>Featured Accommodations</h2>
            <div class="gallery-container">
                <!-- Gallery images -->
                <?php foreach ($accommodations as $index => $accommodation): ?>
                    <img class="gallery-images <?php echo $index === 0 ? 'active' : ''; ?>" src="../../assets/<?php echo sanitize_output($accommodation['img']); ?>" alt="Accommodation Image <?php echo $index + 1; ?>">
                <?php endforeach; ?>

                <!-- Navigation buttons -->
                <div class="gallery-buttons">
                    <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
                    <button class="next" onclick="changeSlide(1)">&#10095;</button>
                </div>
            </div>
        </section>
    </main>

    <script>
        let currentIndex = 0;
        const totalSlides = document.querySelectorAll('.gallery-images').length;

        // Show the slide corresponding to currentIndex
        function showSlide(index) {
            const slides = document.querySelectorAll('.gallery-images');

            // Hide all slides
            slides.forEach((slide) => slide.classList.remove('active'));

            // Show the current slide
            currentIndex = (index + totalSlides) % totalSlides;
            slides[currentIndex].classList.add('active');
        }

        // Change the slide based on step (-1 for previous, 1 for next)
        function changeSlide(step) {
            showSlide(currentIndex + step);
        }

        // Auto-slide every 5 seconds (5000ms)
        setInterval(() => {
            changeSlide(1); // Move to the next slide every 5 seconds
        }, 5000);
    </script>

    <?php
    include __DIR__ . '/../../Partials/footer_view.php';
    ?>
</body>
</html>
