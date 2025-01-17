<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Header</title>
    <link rel="stylesheet" href="../../CSS/header.css">
    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    if ($current_page == 'about_view.php') {
        echo '<link rel="stylesheet" href="../../CSS/about.css">';
    }
    if ($current_page == 'contact_view.php') {
        echo '<link rel="stylesheet" href="../../CSS/contact.css">';
    }
    if ($current_page == 'favourites_view.php') {
        echo '<link rel="stylesheet" href="../../CSS/fav.css">';
    }
    if ($current_page == 'propertylist_view.php') {
        echo '<link rel="stylesheet" href="../../CSS/propertylist.css">';
    }
    ?>
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <div class="logo">
                <img src="../../assets/logo.png" alt="Logo" class="logo-img">
            </div>
            <ul class="nav-links">
                <li><a href="/Studentstay/Includes/views/home_view.php" aria-label="Home">Home</a></li>
                <li><a href="/Studentstay/Includes/views/propertylist_view.php" aria-label="Accommodations">Accommodations</a></li>
                <li><a href="/Studentstay/Includes/views/favourites_view.php" aria-label="Favourites">Favourites</a></li>
                <li><a href="/Studentstay/Includes/views/about_view.php" aria-label="About Us">About Us</a></li>
                <li><a href="/Studentstay/Includes/views/contact_view.php" aria-label="Contact">Contact</a></li>
                <li><a href="/Studentstay/Includes/views/login_view.php" class="btn" aria-label="Login">Login</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>