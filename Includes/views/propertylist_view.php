<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../../Partials/header_view.php'; ?>
    <title>Property Listings</title>
    <link rel="stylesheet" href="../../CSS/propertylist.css">
</head>
<body>
    
    <div class="container">
        <div class="filters">
            <h2>Property Type</h2>
            <label><input type="checkbox"> Room</label>
            <label><input type="checkbox"> House</label>
            <label><input type="checkbox"> Apartment</label>
            <label><input type="checkbox"> Studio</label>
            <label><input type="checkbox"> Student apartment</label>
            <h2>Total Rent</h2>
            <input type="text" placeholder="Min">
            <input type="text" placeholder="Max">
            <h2>Size (m²)</h2>
            <input type="text" placeholder="Min">
            <input type="text" placeholder="Max">
            <h2>Number of Rooms</h2>
            <input type="text" placeholder="Min">
            <input type="text" placeholder="Max">
            <button id="update-results">Update results</button>
            <button id="clear-filters">Clear All Filters</button>
        </div>
        <div class="listings">
            <div class="listing">
            <img src="../../assets/p1.jpg" alt="Property Image">
            <h3>Résidence Orion à Nanterre</h3>
            <p>409 €/month</p>
            <p>1 Place du 27 Mars 2002, 92000 Nanterre, France</p>
            <p>1 room • Room • 80 m²</p>
            <button class="favorite-btn" data-favorite="false">❤️</button>
            </div>
            <div class="listing">
                <img src="../../assets/p2.jpg" alt="Property Image">
                <h3>Location particulier à particulier Toulouse</h3>
                <p>155 €/month</p>
                <p>Toulouse, Haute-Garonne, France</p>
                <p>1 room • Studio • 11 m²</p>
                <button class="favorite-btn" data-favorite="false">❤️</button>
            </div>
            <div class="listing">
                <img src="../../assets/p3.jpg" alt="Property Image">
                <h3>Chambre dans un appartement de 4 chambres</h3>
                <p>600 €/month</p>
                <p>4 Rue Marie-Louise Taso Arnouche, 93380 Pierrefitte-sur-Seine, France</p>
                <p>1 room • House • 81 m²</p>
                <button class="favorite-btn" data-favorite="false">❤️</button>
            </div>
            <div class="listing">
                <img src="../../assets/p4.jpg" alt="Property Image">
                <h3>Location de particulier à particulier, de Om...</h3>
                <p>460 €/month</p>
                <p>Paris, France</p>
                <p>1 room • student apartment • 14 m²</p>
                <button class="favorite-btn" data-favorite="false">❤️</button>
            </div>
            <div class="listing">
                <img src="../../assets/p5.jpg" alt="Property Image">
                <h3>Appartement particulier à Marseille 08, 9...</h3>
                <p>400 €/month</p>
                <p>Paris, France</p>
                <p>1 room • Room • 18 m²</p>
                <button class="favorite-btn" data-favorite="false">❤️</button>
                
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

    // Collect selected property types
    const selectedTypes = Array.from(checkboxes).map(cb => cb.parentElement.textContent.trim());

    document.querySelectorAll('.listing').forEach(listing => {
        const type = listing.dataset.type;
        const rent = parseFloat(listing.dataset.rent);
        const size = parseFloat(listing.dataset.size);
        const rooms = parseFloat(listing.dataset.rooms);

        // Ensure all listings show if no filters are applied
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
</script>
