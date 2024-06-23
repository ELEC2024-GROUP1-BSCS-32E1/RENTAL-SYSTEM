<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentEasy - Listings</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/listings.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="main-content">
        <section class="listings">
            <h1>Available Equipment</h1>
        
            <div class="listing-grid">
                <?php
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

                    foreach ($equipment_list as $equipment) {
                        $image_extension = $equipment['id'] <= 26 ? 'jpg' : 'webp';
                        $image_path = "../image/{$equipment['name']}.$image_extension";
                        echo "
                        <div class='listing-card'>
                            <a href='rent_form.php?equipment_id={$equipment['id']}'>
                                <img src='$image_path' alt='{$equipment['name']}'>
                                <h3>{$equipment['name']}</h3>
                                <p>{$equipment['price']}</p>
                            </a>
                        </div>
                        ";
                    }
                ?>
            </div>
            
            <!-- Button to view rentals -->
           
        </section>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Pahiram. All rights reserved.</p>
    </footer>
</body>
</html>