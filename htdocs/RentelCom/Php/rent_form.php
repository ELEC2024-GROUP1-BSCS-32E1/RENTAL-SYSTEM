<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Equipment - RentEasy</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/rent_form.css">
    <style>
        .alert {
            padding: 20px;
            background-color: #4CAF50;
            color: white;
            margin-bottom: 15px;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
    </style>
</head>
<body>
    <?php 
        session_start(); // Start session to persist login status and manage rental success
        include 'navbar.php'; // Include navigation bar
        include 'db_connection.php'; // Include database connection

        $equipment_list = [
            1 => ["name" => "Boom Lift", "price" => "$200/day"],
            2 => ["name" => "Scissor Lift", "price" => "$150/day"],
            3 => ["name" => "Forklift", "price" => "$120/day"],
            4 => ["name" => "Single Man Lift", "price" => "$100/day"],
            5 => ["name" => "Telehandler", "price" => "$250/day"],
            6 => ["name" => "Bulldozer", "price" => "$300/day"],
            7 => ["name" => "Wheel Tractor-Scraper", "price" => "$350/day"],
            8 => ["name" => "Skid Steer Loader", "price" => "$130/day"],
            9 => ["name" => "Backhoe Loader", "price" => "$220/day"],
            10 => ["name" => "Excavator", "price" => "$500/day"],
            11 => ["name" => "Feller Buncher", "price" => "$450/day"],
            12 => ["name" => "Harvester", "price" => "$400/day"],
            13 => ["name" => "Trencher", "price" => "$320/day"],
            14 => ["name" => "Articulated Hauler", "price" => "$280/day"],
            15 => ["name" => "Off-Highway Truck", "price" => "$420/day"],
            16 => ["name" => "Asphalt Paver", "price" => "$350/day"],
            17 => ["name" => "Cold Planer", "price" => "$300/day"],
            18 => ["name" => "Motor Grader", "price" => "$360/day"],
            19 => ["name" => "Compactor", "price" => "$250/day"],
            20 => ["name" => "Drum Roller", "price" => "$220/day"],
            21 => ["name" => "Compact Track Loader", "price" => "$210/day"],
            22 => ["name" => "Skidder", "price" => "$310/day"],
            23 => ["name" => "Forwarder", "price" => "$270/day"],
            24 => ["name" => "Knuckleboom Loader", "price" => "$290/day"],
            25 => ["name" => "Towable Light Tower", "price" => "$120/day"],
            26 => ["name" => "Carry Deck Crane", "price" => "$400/day"],
            27 => ["name" => "Concrete Mixer Truck", "price" => "$350/day"],
            28 => ["name" => "Drill Rig", "price" => "$500/day"],
            29 => ["name" => "Dump Truck", "price" => "$320/day"],
            30 => ["name" => "Utility Vehicle", "price" => "$150/day"],
            31 => ["name" => "Truck-Mounted Crane", "price" => "$420/day"],
            32 => ["name" => "Walkie Stacker", "price" => "$100/day"],
            33 => ["name" => "Tunnel Boring Machine", "price" => "$600/day"],
            34 => ["name" => "Rock Breaker", "price" => "$200/day"],
            35 => ["name" => "Concrete Pump", "price" => "$250/day"],
            36 => ["name" => "Pipe Layer", "price" => "$340/day"],
            37 => ["name" => "Dragline Excavator", "price" => "$500/day"]
        ];

        // Function to check if equipment ID exists in the list
        function isValidEquipmentId($id, $equipment_list) {
            return array_key_exists($id, $equipment_list);
        }

        $equipment_id = isset($_GET['equipment_id']) ? $_GET['equipment_id'] : null;

        if (!isValidEquipmentId($equipment_id, $equipment_list)) {
            echo "<p>Invalid equipment ID.</p>";
        } else {
            $equipment = $equipment_list[$equipment_id];
            $image_extension = $equipment_id <= 26 ? 'jpg' : 'webp';
            $image_path = "../image/{$equipment['name']}.$image_extension";

            // Form submission handling
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];

                try {
                    // Start a transaction
                    $pdo->beginTransaction();

                    // Insert into userrent table
                    $stmt_userrent = $pdo->prepare("INSERT INTO userrent (equipment_id, customer_name, customer_email, phone_number, start_date, end_date, status) VALUES (?, ?, ?, ?, ?, ?, 'pending')");
                    $stmt_userrent->execute([$equipment_id, $name, $email, $phone, $start_date, $end_date]);

                    // Insert into viewrent table
                    $stmt_viewrent = $pdo->prepare("INSERT INTO viewrent (user_id, equipment_id, name, email, phone, start_date, end_date, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
                    $stmt_viewrent->execute([$_SESSION['user_id'], $equipment_id, $name, $email, $phone, $start_date, $end_date]);

                    // Commit the transaction
                    $pdo->commit();

                    // Set session variable to indicate success
                    $_SESSION['rental_success'] = true;

                    // Redirect to prevent form resubmission on refresh
                    header('Location: rent_form.php?equipment_id=' . $equipment_id);
                    exit();
                } catch (PDOException $e) {
                    // Rollback the transaction on error
                    $pdo->rollBack();
                    // Handle database errors
                    echo "Error: " . $e->getMessage();
                }
            }

            // Render the form with alert if rental was successful
            echo "
            <div class='main-content'>
                <section class='rent-form'>";

            // Check if rental was successful
            if (isset($_SESSION['rental_success']) && $_SESSION['rental_success']) {
                // Clear the session variable
                unset($_SESSION['rental_success']);

                // Display success alert
                echo "
                <div class='alert'>
                    <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
                    <strong>Success!</strong> The rental has been successfully submitted.
                </div>";
            }

            // Display equipment details and form
            echo "
                <div class='equipment-details'>
                    <img src='$image_path' alt='{$equipment['name']}'>
                    <h2>{$equipment['name']}</h2>
                    <p>Price: {$equipment['price']}</p>
                </div>";

            echo "
                <form id='rentalForm' action='rent_form.php?equipment_id=$equipment_id' method='POST'>
                    <input type='hidden' name='equipment_id' value='$equipment_id'>
                    <div class='form-group'>
                        <label for='name'>Your Name:</label>
                        <input type='text' id='name' name='name' class='form-control' required>
                    </div>
                    <div class='form-group'>
                        <label for='email'>Email:</label>
                        <input type='email' id='email' name='email' class='form-control' required>
                    </div>
                    <div class='form-group'>
                        <label for='phone'>Phone Number:</label>
                        <input type='tel' id='phone' name='phone' class='form-control' required>
                    </div>
                    <div class='form-group'>
                        <label for='start_date'>Start Date:</label>
                        <input type='date' id='start_date' name='start_date' class='form-control' required>
                    </div>
                    <div class='form-group'>
                        <label for='end_date'>End Date:</label>
                        <input type='date' id='end_date' name='end_date' class='form-control' required>
                    </div>
                    <button type='submit' class='btn btn-primary'>Submit</button>
                </form>
            </section>
        </div>";
        }
    ?>

    <footer class="footer">
        <p>&copy; 2024 Pahiram. All rights reserved.</p>
    </footer>

    <script>
        // Close the alert message when close button is clicked
        document.addEventListener('DOMContentLoaded', function() {
            var closeButtons = document.querySelectorAll('.closebtn');
            closeButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    this.parentElement.style.display = 'none';
                });
            });
        });
    </script>
</body>
</html>