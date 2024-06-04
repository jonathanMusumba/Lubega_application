<?php
// Placeholder for login/logout functionality
$loggedIn = false; // Assuming the user is not logged in initially
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        /* Header Styles */
        .header {
            background-color: #4a90e2;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .navigation {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navigation li {
            margin-right: 20px;
        }

        .navigation li a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        .navigation li a:hover {
            color: #8bc34a;
        }

        .navigation li a:visited {
            color: #8bc34a;
        }

        .active {
            color: #D2691E;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">Your Logo</div>
        <div>
            <?php
            // Placeholder for login/logout functionality
            $loggedIn = false; // Assuming the user is not logged in initially
            if ($loggedIn) {
                // If user is logged in, display logout button and username
                echo '<span>Welcome, User</span>';
                echo '<a href="#">Logout</a>';
            } else {
                // If user is not logged in, display login button
                echo '<a href="#">Login</a>';
            }
            ?>
            <span id="current-date"><?php echo date("l, F jS Y"); ?></span>
        </div>
    </div>
    <ul class="navigation">
        <li><a href="#" class="active">Home</a></li>
        <li><a href="#">Applicants</a></li>
        <li><a href="#">Courses</a></li>
        <li><a href="#">Login</a></li> <!-- Adjust this link based on login/logout status -->
    </ul>
</body>

</html>
