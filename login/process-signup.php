<?php

if(empty($_POST["name"])){

    die("name is required");

}
if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){

        die("valid email is required");

}

if(strlen($_POST["password"])<8){

    die("Password must be at least 8 characters");

}

if(! preg_match("/[a-z]/i",$_POST["password"]))
{

        die("password must contain at least 1 letter");

}

if(! preg_match('/\d/',$_POST["password"]))
{

        die("password must contain at least 1 number");

}

if($_POST["password"]!= $_POST["password_confirmation"]){

        die("Passwords must match");

}

$password_hash = password_hash($_POST["password"],PASSWORD_DEFAULT);

$mysqli = require __DIR__."/database.php";

$sql = "INSERT INTO user(name,email,password_hash)
        VALUES (?,?,?)";

$stmt = $mysqli->stmt_init();

if(! $stmt->prepare($sql)){

        die("SQL error: ".$mysqli->error);

}

$stmt->bind_param("sss",
                        $_POST["name"],
                        $_POST["email"],
                        $password_hash);

if($stmt->execute()){

        //echo "SignUp successful";
        header("Location: signup-success.html");
        exit;

}
else{
        if($mysqli->errno===1062){

                die("email already taken");
        }
        else{

                die($mysqli->error ." ".$mysqli->errno);
        }
        

}



//print_r($_POST);
//var_dump($password_hash);