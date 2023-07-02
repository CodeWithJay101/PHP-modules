<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>
<body>
    <section class="index-section">
        <h1 class="index-header">Admin Log In</h1>
        <form action="includes/login.inc.php" method="post" class="index-form">
            <input type="text" name="name" placeholder="Username...">
            <input type="password" name="pwd" placeholder="Password...">
            <button type="submit" name="submit">Log In</button>
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyinput"){
                        echo"<p>Fill in all fields!</p>";
                    }
                    else if ($_GET["error"] == "wrongcred"){
                        echo"<p>Incorrect login information!</p>";
                    }
                }                
            ?>
        </form>
    </section>
</body>
</html>