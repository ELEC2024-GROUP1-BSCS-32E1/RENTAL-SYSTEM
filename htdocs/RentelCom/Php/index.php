<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentEasy - Home</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <style>

        .hero {
            background-color: #222;
            color: #fff;
            padding: 4rem 2rem;
            text-align: center;
            min-height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        h1, p {
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <h1><span id="typed-heading"></span></h1>
            <p><span id="typed-text"></span></p>
        </div>
    </div>

    <!-- Featured Properties Section -->
    <section class="featured-properties">
        <h2>Construction Equipment</h2>
        <div class="properties-grid">
            <div class="property-card">
                <img src="../image/Bulldozer.jpg" alt="Property 1">
                <h3>Bulldozer</h3>
                <span class="price">$2,000/month</span>
            </div>
            <div class="property-card">
                <img src="../image/Excavator.jpg" alt="Property 2">
                <h3>Excavator</h3>
                <span class="price">$1,500/month</span>
            </div>
            <div class="property-card">
                <img src="../image/ForkLift.jpg" alt="Property 3">
                <h3>Forklift</h3>
                <span class="price">$2,500/month</span>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Pahiram. All rights reserved.</p>
    </footer>

    <!-- JavaScript for Typing Animation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const heading = document.getElementById('typed-heading');
            const text = document.getElementById('typed-text');
            const headingText = "Find Your Heavy Construction Equipment";
            const paragraphText = "Explore a wide range of heavy construction equipment for your projects";

            typeWriter(heading, headingText, 0, 100); // Typing effect for heading
            setTimeout(() => typeWriter(text, paragraphText, 0, 50), 1500); // Typing effect for paragraph after delay

            function typeWriter(element, text, index, speed) {
                if (index < text.length) {
                    element.textContent += text.charAt(index);
                    index++;
                    setTimeout(() => typeWriter(element, text, index, speed), speed);
                }
            }
        });
    </script>
</body>
</html>