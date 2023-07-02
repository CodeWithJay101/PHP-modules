<?php

    function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
        if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
            return true;
        }
        else{
            return false;
        }
    }
    function invalidUid($username){
        if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            return true;
        }
        else{
            return false;
        }
    }
    function invalidEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        else{
            return false;
        }
    }
    function pwdMatch($pwd, $pwdRepeat){
        if($pwd !== $pwdRepeat){
            return true;
        }
        else{
            return false;
        }
    }
    function uidExists($conn, $username){
        //connect to the database and see if already exist
        //basic sql statement
        $sql = "SELECT * FROM users WHERE usersUid = ?;";
        //prepared statement to submit the sql statement in a proper way
        $stmt = mysqli_stmt_init($conn); //initialise prepared statement (make it more secure)
        //tie the sql statement with the prepared statement (prevent code injection)
        //if the prepared statement will fail or succeed (any mistakes)
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfailed");
            //stop the script from running
            exit();
        }
        //combine statement with user input ("s" indicates how many parameters you are passing into)
        mysqli_stmt_bind_param($stmt, "s", $username);
        //which statement are we executing
        mysqli_stmt_execute($stmt);

        //grab data
        $resultsData = mysqli_stmt_get_result($stmt);
        //if there is result from this statement - which is the database 
        //(fetching as an associative array)
        if($row = mysqli_fetch_assoc($resultsData)){
            return $row;
        }
        else{
            return false;
        }
        mysqli_stmt_close($stmt);
    }

    function createUser($conn, $name, $email, $username, $pwd){
        //connect to the database and see if already exist
        //basic sql statement
        $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
        //prepared statement to submit the sql statement in a proper way
        $stmt = mysqli_stmt_init($conn); //initialise prepared statement (make it more secure)
        //tie the sql statement with the prepared statement (prevent code injection)
        //if the prepared statement will fail or succeed (any mistakes)
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfailed");
            //stop the script from running
            exit();
        }
        //hashing the password (default hashing algorithm)
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        //combine statement with user input ("s" indicates how many parameters you are passing into)
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
        //which statement are we executing
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../signup.php?error=none");
        //stop the script from running
        exit();
    }
    function emptyInputLogin($username, $pwd){
        if(empty($username) || empty($pwd)){
            return true;
        }
        else{
            return false;
        }
    }
    function loginUser($conn, $username, $pwd){
        $uidExists = uidExists($conn, $username);

        if($uidExists === false){
            header("location: ../login.php?error=wronglogin");
            exit();
        }
        //grab pwd in the database
        $pwdHashed = $uidExists["usersPwd"];
        $checkPwd = password_verify($pwd, $pwdHashed);
        if($checkPwd === false){
            header("location: ../login.php?error=wronglogin");
            exit();
        }
        else if($checkPwd === true){
            //sessions
            session_start();
            //store data in the session
            $_SESSION["userid"] = $uidExists["usersId"];
            $_SESSION["useruid"] = $uidExists["usersUid"];
            header("location: ../index.php");
            exit();
        }
    }