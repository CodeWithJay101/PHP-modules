<?php
    //include header
    include_once("header.php")
?>
    <section class="section">
        <h1>Log In Page</h1>
        <form action="includes/login.include.php" method="post">
            <input type="text" name="name" placeholder="Username...">
            <input type="password" name="pwd" placeholder="Password...">
            <button type="submit" name="submit">Log In</button>
        </form>
        <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo"<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "wronglogin"){
                    echo"<p>Incorrect login information!</p>";
                }
            }
        ?>
    </section>
<?php
    //include footer
    include_once("footer.php")
?>