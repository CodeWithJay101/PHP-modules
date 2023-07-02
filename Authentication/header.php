<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>
<body>
    <nav class="nav-container">
        <ul>
            <li><a href="index.php" >Dashboard</a></li>
            <?php
                if(isset($_SESSION["useruid"])){
                    echo "<li><a href='includes/logout.include.php'>Log Out</a></li>";
                }
                else{
                    echo '<li><a href="signup.php">Sign Up</a></li>';
                    echo '<li><a href="login.php">Log In</a></li>';
                }
            ?>
        </ul>
    </nav>