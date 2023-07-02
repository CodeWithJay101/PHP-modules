<?php
    if(isset($_POST['update'])){
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $uid = $_POST["uid"];

        require_once "dbs.inc.php";
        require_once "functions.inc.php";

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("location: ../update.php?error=invalidemail");
            //stop the script from running
            exit();
        }
        if(uidUpdateExists($conn, $uid) !== false){
            header("location: ../update.php?error=usernametaken");
            //stop the script from running
            exit();
        }

        $sql = "UPDATE `users` SET `usersName`='$name',`usersEmail`='$email',`usersUid`='$uid' WHERE `usersID` = '$id'";

        $result = mysqli_query($conn, $sql);

        if ($result){
            header("location: ../listing.php");
            exit();
        }
        else{
            header("location: ../update.php?error=somethingwrong");
            exit();
        }
        mysqli_close($conn);

    }
    else{
        header("location: ../update.php");
        exit();
    }
    