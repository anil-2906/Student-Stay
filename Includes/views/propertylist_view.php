<?php
include __DIR__ . '/../../Partials/header_view.php';  // Header inclusion

$properties = [
    ["type" => "Single Room", "rent" => 450, "size" => 60, "rooms" => 2, "location" => "92000, La defense", "image" => "../../assets/p1.jpg"],
    ["type" => "Sharing Room", "rent" => 400, "size" => 118, "rooms" => 1, "location" => "92800, Paris", "image" => "../../assets/p2.jpg"],
    ["type" => "Apartment", "rent" => 460, "size" => 1400, "rooms" => 1, "location" => "12345, Paris", "image" => "../../assets/p4.jpg"],
    ["type" => "Studio", "rent" => 600, "size" => 81, "rooms" => 2, "location" => "93380, Puteaux", "image" => "../../assets/p3.jpg"],
    ["type" => "Sharing Room", "rent" => 400, "size" => 180, "rooms" => 3, "location" => "94389, Concorde", "image" => "../../assets/p5.jpg"],
    ["type" => "Single Room", "rent" => 380, "size" => 160, "rooms" => 1, "location" => "92190, La defense", "image" => "../../assets/p1.jpg"],
    ["type" => "Sharing Room", "rent" => 400, "size" => 118, "rooms" => 2, "location" => "92820, Paris", "image" => "../../assets/p2.jpg"],
    ["type" => "Apartment", "rent" => 410, "size" => 800, "rooms" => 1, "location" => "12345, Paris", "image" => "../../assets/p4.jpg"],
    ["type" => "Studio", "rent" => 350, "size" => 95, "rooms" => 2, "location" => "93383, Puteaux", "image" => "../../assets/p3.jpg"],
    ["type" => "Sharing Room", "rent" => 500, "size" => 340, "rooms" => 3, "location" => "94386, Concorde", "image" => "../../assets/p5.jpg"],
    ["type" => "Single Room", "rent" => 480, "size" => 110, "rooms" => 1, "location" => "92160, La defense", "image" => "../../assets/p1.jpg"],
    ["type" => "Sharing Room", "rent" => 440, "size" => 148, "rooms" => 2, "location" => "92600, Paris", "image" => "../../assets/p2.jpg"],
    ["type" => "Apartment", "rent" => 360, "size" => 900, "rooms" => 1, "location" => "12344, Paris", "image" => "../../assets/p4.jpg"],
    ["type" => "Studio", "rent" => 650, "size" => 93, "rooms" => 2, "location" => "93280, Puteaux", "image" => "../../assets/p3.jpg"],
   
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Listings</title>
    <link rel="stylesheet" href="../../CSS/propertylist.css">
    
</head>
<body>

    <div class="container">
        <!-- Filters on the left side -->
        <div class="filters">
            <h2>Property Type</h2>
            <label><input type="checkbox" value="Single Room"> Single Room</label><br>
            <label><input type="checkbox" value="Sharing Room"> Sharing Room</label><br>
            <label><input type="checkbox" value="Apartment"> Apartment</label><br>
            <label><input type="checkbox" value="Studio"> Studio</label><br>
            
            <h2>Total Rent</h2>
            <input type="text" placeholder="Min"><br>
            <input type="text" placeholder="Max"><br>
            
            <h2>Size (m²)</h2>
            <input type="text" placeholder="Min"><br>
            <input type="text" placeholder="Max"><br>
            
            <h2>Number of Rooms</h2>
            <input type="text" placeholder="Min"><br>
            <input type="text" placeholder="Max"><br>
            
            <button id="update-results">Update Results</button>
            <button id="clear-filters">Clear All Filters</button>
        </div>

        <!-- Property Listings on the right side -->
        <div class="listings">
            <?php
            foreach ($properties as $property) {
                echo "
                    <div class='listing' data-type='{$property['type']}' data-rent='{$property['rent']}' data-size='{$property['size']}' data-rooms='{$property['rooms']}'>
                        <img src='{$property['image']}' alt='Property Image'>
                        <h3>{$property['type']}</h3>
                        <p>{$property['rent']} €/month</p>
                        <p>{$property['location']}</p>
                        <p>{$property['rooms']} room • {$property['size']} m²</p>
                        <button class='favorite-btn' data-favorite='false'>❤️</button>
                    </div>
                ";
            }
            ?>
        </div>
    </div>

    <script>
        document.querySelectorAll('.favorite-btn').forEach(button => {
            button.addEventListener('click', () => {
                const isFavorited = button.dataset.favorite === "true";
                button.dataset.favorite = !isFavorited;
                button.textContent = isFavorited ? "❤️" : "💖";
            });
        });

        document.getElementById('update-results').addEventListener('click', () => {
            const checkboxes = document.querySelectorAll('.filters input[type="checkbox"]:checked');
            const minRent = parseFloat(document.querySelector('.filters input[placeholder="Min"]').value) || 0;
            const maxRent = parseFloat(document.querySelector('.filters input[placeholder="Max"]').value) || Infinity;
            const minSize = parseFloat(document.querySelectorAll('.filters input[placeholder="Min"]')[1].value) || 0;
            const maxSize = parseFloat(document.querySelectorAll('.filters input[placeholder="Max"]')[1].value) || Infinity;
            const minRooms = parseFloat(document.querySelectorAll('.filters input[placeholder="Min"]')[2].value) || 0;
            const maxRooms = parseFloat(document.querySelectorAll('.filters input[placeholder="Max"]')[2].value) || Infinity;

            const selectedTypes = Array.from(checkboxes).map(cb => cb.value);

            document.querySelectorAll('.listing').forEach(listing => {
                const type = listing.dataset.type;
                const rent = parseFloat(listing.dataset.rent);
                const size = parseFloat(listing.dataset.size);
                const rooms = parseFloat(listing.dataset.rooms);

                const matchesType = selectedTypes.length === 0 || selectedTypes.includes(type);
                const matchesRent = rent >= minRent && rent <= maxRent;
                const matchesSize = size >= minSize && size <= maxSize;
                const matchesRooms = rooms >= minRooms && rooms <= maxRooms;

                if (matchesType && matchesRent && matchesSize && matchesRooms) {
                    listing.style.display = "block";
                } else {
                    listing.style.display = "none";
                }
            });
        });

        document.getElementById('clear-filters').addEventListener('click', () => {
            document.querySelectorAll('.filters input').forEach(input => input.checked = false);
            document.querySelectorAll('.listing').forEach(listing => listing.style.display = "block");
        });
    </script>

    <?php include __DIR__ . '/../../Partials/footer_view.php'; ?>  <!-- Footer inclusion -->

</body>
</html>
