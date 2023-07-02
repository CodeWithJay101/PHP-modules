<?php
    //make sure users cannot access this php file
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["pwdrepeat"];

        require_once "dbs.include.php";
        //error handling (using functions)
        require_once "functions.include.php";

        //if the user left any input empty
        if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){
            header("location: ../signup.php?error=emptyinput");
            //stop the script from running
            exit();
        }
        //if username is valid or not
        if(invalidUid($username) !== false){
            header("location: ../signup.php?error=invaliduid");
            //stop the script from running
            exit();
        }
        //if email is valid or not
        if(invalidEmail($email) !== false){
            header("location: ../signup.php?error=invalidemail");
            //stop the script from running
            exit();
        }
        //if both the passwords are the same
        if(pwdMatch($pwd, $pwdRepeat) !== false){
            header("location: ../signup.php?error=passwordsdontmatch");
            //stop the script from running
            exit();
        }
        //if the username already exist in the database (include connection to the database)
        if(uidExists($conn, $username) !== false){
            header("location: ../signup.php?error=usernametaken");
            //stop the script from running
            exit();
        }
        //signup user into the website 
        createUser($conn, $name, $email, $username, $pwd);
    }
    else{
        header("location: ../signup.php");
        //stop the script from running
        exit();
    }