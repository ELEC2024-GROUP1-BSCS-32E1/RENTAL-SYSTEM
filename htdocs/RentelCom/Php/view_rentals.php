<?php
session_start(); // Start session to persist login status

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

// Include database connection
include 'db_connection.php';

// Example equipment list (replace with your actual data)
$equipment_list = [
    ["id" => 1, "name" => "Boom Lift", "price" => "$200/day"],
    ["id" => 2, "name" => "Scissor Lift", "price" => "$150/day"],
    ["id" => 3, "name" => "Forklift", "price" => "$120/day"],
    ["id" => 4, "name" => "Single Man Lift", "price" => "$100/day"],
    ["id" => 5, "name" => "Telehandler", "price" => "$250/day"],
    ["id" => 6, "name" => "Bulldozer", "price" => "$300/day"],
    ["id" => 7, "name" => "Wheel Tractor-Scraper", "price" => "$350/day"],
    ["id" => 8, "name" => "Skid Steer Loader", "price" => "$130/day"],
    ["id" => 9, "name" => "Backhoe Loader", "price" => "$220/day"],
    ["id" => 10, "name" => "Excavator", "price" => "$500/day"],
    ["id" => 11, "name" => "Feller Buncher", "price" => "$450/day"],
    ["id" => 12, "name" => "Harvester", "price" => "$400/day"],
    ["id" => 13, "name" => "Trencher", "price" => "$320/day"],
    ["id" => 14, "name" => "Articulated Hauler", "price" => "$280/day"],
    ["id" => 15, "name" => "Off-Highway Truck", "price" => "$420/day"],
    ["id" => 16, "name" => "Asphalt Paver", "price" => "$350/day"],
    ["id" => 17, "name" => "Cold Planer", "price" => "$300/day"],
    ["id" => 18, "name" => "Motor Grader", "price" => "$360/day"],
    ["id" => 19, "name" => "Compactor", "price" => "$250/day"],
    ["id" => 20, "name" => "Drum Roller", "price" => "$220/day"],
    ["id" => 21, "name" => "Compact Track Loader", "price" => "$210/day"],
    ["id" => 22, "name" => "Skidder", "price" => "$310/day"],
    ["id" => 23, "name" => "Forwarder", "price" => "$270/day"],
    ["id" => 24, "name" => "Knuckleboom Loader", "price" => "$290/day"],
    ["id" => 25, "name" => "Towable Light Tower", "price" => "$120/day"],
    ["id" => 26, "name" => "Carry Deck Crane", "price" => "$400/day"],
    ["id" => 27, "name" => "Concrete Mixer Truck", "price" => "$350/day"],
    ["id" => 28, "name" => "Drill Rig", "price" => "$500/day"],
    ["id" => 29, "name" => "Dump Truck", "price" => "$320/day"],
    ["id" => 30, "name" => "Utility Vehicle", "price" => "$150/day"],
    ["id" => 31, "name" => "Truck-Mounted Crane", "price" => "$420/day"],
    ["id" => 32, "name" => "Walkie Stacker", "price" => "$100/day"],
    ["id" => 33, "name" => "Tunnel Boring Machine", "price" => "$600/day"],
    ["id" => 34, "name" => "Rock Breaker", "price" => "$200/day"],
    ["id" => 35, "name" => "Concrete Pump", "price" => "$250/day"],
    ["id" => 36, "name" => "Pipe Layer", "price" => "$340/day"],
    ["id" => 37, "name" => "Dragline Excavator", "price" => "$500/day"]
];
// Query to fetch rentals for the logged-in user
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM viewrent WHERE user_id = :user_id ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$rentals = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Rentals - RentEasy</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <style>
        /* Body and General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #222;
            color: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Main content should take up available space */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 4rem 2rem;
            max-width: 1200px; /* Adjust as needed */
            margin: 0 auto;
            text-align: center;
        }

        /* Rentals List Styles */
        .rentals-list {
            width: 100%;
            margin-top: 2rem;
            overflow-x: auto; /* Enable horizontal scrolling if needed */
        }

        .rentals-list table {
            width: 100%;
            border-collapse: collapse;
            background-color: #333;
            color: #fff;
        }

        .rentals-list table th,
        .rentals-list table td {
            padding: 1rem;
            border-bottom: 1px solid #444;
        }

        .rentals-list table th {
            background-color: #555;
            text-transform: uppercase;
        }

        .rentals-list table td {
            background-color: #444;
        }

        /* Footer Styles */
        .footer {
            background-color: #111;
            color: #ccc;
            padding: 2rem;
            text-align: center;
            margin-top: auto;
        }

        .footer p {
            margin: 0;
        }

        /* Listing Card Styles */
        .listing-card {
            background-color: #333;
            border-radius: 8px;
            padding: 1.5rem;
            width: 280px; /* Adjust size as needed */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s;
            margin: 1rem;
            display: inline-block;
        }

        .listing-card:hover {
            transform: scale(1.05);
        }

        .listing-card img {
            width: 100%;
            height: 200px; /* Adjust size as needed */
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .listing-card h3 {
            font-size: 1.25rem;
            color: #FF6347;
            margin-top: 1rem;
        }

        .listing-card p {
            color: #ccc;
            margin-top: 0.5rem;
        }

        .listing-card .rental-info {
            text-align: left;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="main-content">
        <section class="rentals-list">
            <h2>Your Rentals</h2>
            <?php if (empty($rentals)): ?>
                <p>No rentals found.</p>
            <?php else: ?>
                <div class="listing-grid">
                    <?php foreach ($rentals as $rental): ?>
                        <div class="listing-card">
                            <?php
                            // Find equipment details from $equipment_list
                            $equipment_id = $rental['equipment_id'];
                            $equipment = array_filter($equipment_list, function ($item) use ($equipment_id) {
                                return $item['id'] == $equipment_id;
                            });
                            $equipment = reset($equipment); // Get the first (and only) matching equipment

                            if ($equipment) {
                                // Example image path based on equipment ID
                                $image_path = "../image/{$equipment['name']}.jpg";
                            } else {
                                $image_path = ''; // Default image path if equipment not found
                            }
                            ?>
                            <img src="<?php echo $image_path; ?>" alt="<?php echo $equipment['name']; ?>">
                            <div class="rental-info">
                                <h3><?php echo $equipment['name']; ?></h3>
                                <p><strong>Start Date:</strong> <?php echo $rental['start_date']; ?></p>
                                <p><strong>End Date:</strong> <?php echo $rental['end_date']; ?></p>
                                <p><strong>Created At:</strong> <?php echo $rental['created_at']; ?></p>
                                <p><strong>Contact:</strong><br>
                                    <?php echo htmlspecialchars($rental['name']); ?><br>
                                    <?php echo htmlspecialchars($rental['email']); ?><br>
                                    <?php echo htmlspecialchars($rental['phone']); ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
    </div>

    <footer class="footer">
        <p>&copy; <?php echo date('Y'); ?> Pahiram. All rights reserved.</p>
    </footer>
</body>
</html>