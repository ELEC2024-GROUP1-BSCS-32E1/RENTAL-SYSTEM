<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();  // Start session if not already started
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // User is not logged in
    $restricted = true;
} else {
    // User is logged in
    $restricted = false;
}
?>

<nav class="navbar">
    <div class="navbar-container">
        <a href="../php/index.php" class="navbar-logo">PAHIRAM</a>
        <ul class="navbar-menu">
            <li class="navbar-item"><a href="../php/index.php" class="navbar-link">Home</a></li>
            <?php if ($restricted) : ?>
                <li class="navbar-item"><a href="../php/login.php" class="navbar-link">Login</a></li>
                <li class="navbar-item"><a href="../php/register.php" class="navbar-link">Register</a></li>
            <?php else : ?>
                <li class="navbar-item"><a href="../php/listings.php" class="navbar-link">Listings</a></li>
                <li class="navbar-item"><a href="../php/service.php" class="navbar-link">Services</a></li>
                <li class="navbar-item"><a href="../php/about.php" class="navbar-link">About Us</a></li>
                <li class="navbar-item"><a href="../php/contact.php" class="navbar-link">Contact</a></li>
                <li class="navbar-item"><a href="../php/view_rentals.php" class="navbar-link">Rentals</a></li>
                <li class="navbar-item"><a href="../php/logout.php" class="navbar-link">Logout</a></li>
            <?php endif; ?>
        </ul>
        <div class="navbar-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
</nav>
