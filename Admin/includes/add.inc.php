<?php
    if(isset($_POST['add'])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $uid = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $repwd = $_POST["repwd"];

        require_once "dbs.inc.php";
        require_once "functions.inc.php";

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("location: ../add.php?error=invalidemail");
            //stop the script from running
            exit();
        }
        if(pwdMatch($pwd, $repwd) !== false){
            header("location: ../add.php?error=passwordsdontmatch");
            //stop the script from running
            exit();
        }

        if(uidExists($conn, $uid) !== false){
            header("location: ../add.php?error=usernametaken");
            //stop the script from running
            exit();
        }

        createUser($conn, $name, $email, $uid, $pwd);
    }
    else{
        header("location: ../add.php");
        exit();
    }
    