<?php
    //include header
    include_once("header.php")
?>
    <section class="section">
        <h1>Sign Up Page</h1>
        <form action="includes/signup.include.php" method="post">
            <input type="text" name="name" placeholder="Full name...">
            <input type="text" name="email" placeholder="Email...">
            <input type="text" name="uid" placeholder="Username...">
            <input type="password" name="pwd" placeholder="Password...">
            <input type="password" name="pwdrepeat" placeholder="Repeat password...">
            <button type="submit" name="submit">Sign Up</button>
        </form>
        <?php
            //if a certain url inside the url
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo"<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "invaliduid"){
                    echo"<p>Choose a proper username!</p>";
                }
                else if ($_GET["error"] == "invalidemail"){
                    echo"<p>Choose a proper email!</p>";
                }
                else if ($_GET["error"] == "passwordsdontmatch"){
                    echo"<p>Passwords doesn't match!</p>";
                }
                else if ($_GET["error"] == "stmtfailed"){
                    echo"<p>Something went wrong, try again!</p>";
                }
                else if ($_GET["error"] == "usernametaken"){
                    echo"<p>Username already taken!</p>";
                }
                else if ($_GET["error"] == "none"){
                    echo"<p>You have signed up!</p>";
                }
            }
        ?>
    </section>


<?php
    //include footer
    include_once("footer.php")
?>