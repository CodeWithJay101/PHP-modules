<?php
    //if the user access the page the proper way
    if(isset($_POST["submit"])){
        $username = $_POST["name"];
        $pwd = $_POST["pwd"];
        //reference documents
        require_once("dbs.include.php");
        require_once("functions.include.php");

        if(emptyInputLogin($username, $pwd) !== false){
            header("location: ../login.php?error=emptyinput");
            //stop the script from running
            exit();
        }
        loginUser($conn, $username, $pwd);
    }
    else{
        header("location: ../login.php");
        exit();
    }