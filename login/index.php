<?php

session_start();

//print_r($_SESSION);
    //session super global
if(isset($_SESSION["user_id"])){

    $mysqli = require __DIR__  . "/database.php";

    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";



    $result = $mysqli -> query($sql);
    $user = $result->fetch_assoc();

}

?>

<!DOCTYPE html>
<html lang>

<head>
    <title>
        Home
    </title>
    <meta charset = "UTF-8">
    <link rel="stylesheet" href="styles3.css">

</head>
<body class="hello">
    <h1 class="hello">Quiz System</h1>
    <!--//php if(isset($_SESSION["user_id"])): ?> -->
        
        <?php if(isset($user)):?>
        <!--check if the user id is set-->
        <!--<p>You are logged in</p>-->

        <p class="hello">Hello <?=htmlspecialchars($user["name"]) ?></p>
        <!--$user["name"] is untrusted so we have to esape it by using htmlspecialchars-->  
        <div>
         <a class="card" href="http://localhost/website/quiz/quiz.html">Quiz Catalogue</a><br><br><br>
        <br>
        <?php   
        
        

        ?>

        </div>
        
        
        <br>
        <!--<p class="hello">All Category</p><br>-->
        
        
        <p class="hello"><a class="no" href="logout.php">Log Out</a></p>

    <?php else:?>

        <p class="hello"><a class="hello" href="login.php">Login</a> or <a class="hello" href="signup.html">sign up</a></p>
        <?php endif; ?>

        <br><br><br><p class="name">ChandraBindu Saha | Md Shakh Nadir Parvej | Mohammad Shahadat Ali Mollah</p>
</body>

</html>
