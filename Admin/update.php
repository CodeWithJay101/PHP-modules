<?php
    //include header
    include_once("header.php")
?>
<section class="sec">
    <h1>Update details</h1>
    <form action="includes/update.inc.php" method="post">
        User ID: <input type="text" name="id" required><br><br>
        New Username: <input type="text" name="name" required><br><br>
        New Email: <input type="text" name="email" required><br><br>
        New User UID: <input type="text" name="uid" required><br><br>
        <input type="submit" name="update" value="Update">
    </form>
    <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "somethingwrong"){
                echo"<p>Something went wrong!</p>";
            }
            else if($_GET["error"] == "invalidemail"){
                echo"<p>Please enter a valid email!</p>";
            }
            else if($_GET["error"] == "usernametaken"){
                echo"<p>Choose another username!</p>";
            }
        }
    ?>
</section>
<?php
    //include footer
    include_once("footer.php")
?>