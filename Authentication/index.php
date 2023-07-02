<?php
    //include header
    include_once("header.php")
?>
    <section class="section">
        <?php
            if(isset($_SESSION["useruid"])){
                echo"<p style='padding-top: 15px'>Hello there <span style='font-weight: 700; text-transform: capitalize'>" . $_SESSION["useruid"] . "</span>,</p>
                <h1>Your dashboard</h1>
                <p>This is your Dashboard</p>";
            }
            else{
                echo"<h1>General dashboard</h1>
                <p>This is the general Dashboard</p>";
            }
        ?>
    </section>
<?php
    //include footer
    include_once("footer.php")
?>