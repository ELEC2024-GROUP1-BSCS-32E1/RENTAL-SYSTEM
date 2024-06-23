<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - RentEasy</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/contact.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="main-content">
        <section class="contact-form">
            <div class="form-container">
                <h1>Contact Us</h1>
                <p>Have questions or feedback? Fill out the form below and we'll get back to you as soon as possible.</p>
                <form action="send_message.php" method="post">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </section>
    </div>

    <footer class="footer">
    <p>&copy; 2024 Pahiram. All rights reserved.</p>
    </footer>
</body>
</html>