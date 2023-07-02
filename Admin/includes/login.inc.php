<?php

    if(isset($_POST["submit"])){
        $username = $_POST["name"];
        $pwd = $_POST["pwd"];

        require_once "functions.inc.php";
        if(emptyInputLogin($username, $pwd) !== false){
            header("location: ../index.php?error=emptyinput");
            //stop the script from running
            exit();
        }
        if($username !== "admin" || $pwd !== "admin"){
            header("location: ../index.php?error=wrongcred");
            exit();
        }
        session_start();
        $_SESSION['admin'] = true;
        header("location: ../listing.php");
        exit();
    }
    else{
        header("location: ../index.php");
    }