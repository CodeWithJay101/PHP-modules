<?php
    function uidExists($conn, $uid){
        //connect to the database and see if already exist
        //basic sql statement
        $sql = "SELECT * FROM users WHERE usersUid = ?;";
        //prepared statement to submit the sql statement in a proper way
        $stmt = mysqli_stmt_init($conn); //initialise prepared statement (make it more secure)
        //tie the sql statement with the prepared statement (prevent code injection)
        //if the prepared statement will fail or succeed (any mistakes)
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../add.php?error=stmtfailed");
            //stop the script from running
            exit();
        }
        //combine statement with user input ("s" indicates how many parameters you are passing into)
        mysqli_stmt_bind_param($stmt, "s", $uid);
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
    function pwdMatch($pwd, $pwdRepeat){
        if($pwd !== $pwdRepeat){
            return true;
        }
        else{
            return false;
        }
    }
    function uidUpdateExists($conn, $uid){
        //connect to the database and see if already exist
        //basic sql statement
        $sql = "SELECT * FROM users WHERE usersUid = ?;";
        //prepared statement to submit the sql statement in a proper way
        $stmt = mysqli_stmt_init($conn); //initialise prepared statement (make it more secure)
        //tie the sql statement with the prepared statement (prevent code injection)
        //if the prepared statement will fail or succeed (any mistakes)
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../update.php?error=stmtfailed");
            //stop the script from running
            exit();
        }
        //combine statement with user input ("s" indicates how many parameters you are passing into)
        mysqli_stmt_bind_param($stmt, "s", $uid);
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
    function createUser($conn, $name, $email, $uid, $pwd){
        //connect to the database and see if already exist
        //basic sql statement
        $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
        //prepared statement to submit the sql statement in a proper way
        $stmt = mysqli_stmt_init($conn); //initialise prepared statement (make it more secure)
        //tie the sql statement with the prepared statement (prevent code injection)
        //if the prepared statement will fail or succeed (any mistakes)
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../add.php?error=stmtfailed");
            //stop the script from running
            exit();
        }
        //hashing the password (default hashing algorithm)
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        //combine statement with user input ("s" indicates how many parameters you are passing into)
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $uid, $hashedPwd);
        //which statement are we executing
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../listing.php");
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