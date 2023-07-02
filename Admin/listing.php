<?php
    //include header
    include_once("header.php")
?>
<section class="listing-section">
    <h1>Users Listings</h1>
    <table border="1" style="width: 500px; text-align: center">
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>User UID</th>
        </tr>
        <?php
            include_once("includes/dbs.inc.php");
            $sql = "SELECT `usersID`, `usersName`, `usersEmail`, `usersUid` FROM `users`";
            $query = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($query);
            if ($num > 0){
                while ($result = mysqli_fetch_assoc($query)){
                    echo "
                        <tr>
                            <td>".$result["usersID"]."</td>
                            <td>".$result["usersName"]."</td>
                            <td>".$result["usersEmail"]."</td>
                            <td>".$result["usersUid"]."</td>
                        </tr>
                    ";
                }
            }
        ?>

    </table>
    <div class="btns">
        <a class="btn update-btn" href="update.php">Update Details</a>
        <a class="btn add-btn" href="add.php" >Add User</a>
    </div>    
</section>
<?php
    //include footer
    include_once("footer.php")
?>