<?php
    //include header
    include_once("header.php")
?>
<section class="sec">
    <h1>Add User</h1>
    <form action="includes/add.inc.php" method="post">
        Username: <input type="text" name="name" required><br><br>
        Email: <input type="text" name="email" required><br><br>
        User UID: <input type="text" name="uid" required><br><br>
        Password: <input type="password" name="pwd" required><br><br>
        Retype password: <input type="password" name="repwd" required><br><br>
        <input type="submit" name="add" value="Add">
    </form>
    <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "stmtfailed"){
                echo"<p>Something went wrong!</p>";
            }
            else if($_GET["error"] == "invalidemail"){
                echo"<p>Please enter a valid email!</p>";
            }
            else if($_GET["error"] == "usernametaken"){
                echo"<p>Choose another username!</p>";
            }
            else if($_GET["error"] == "passwordsdontmatch"){
                echo"<p>Passwords don't match!</p>";
            }
        }
    ?>
</section>
<?php
    //include footer
    include_once("footer.php")
?>